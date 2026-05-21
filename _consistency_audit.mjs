/* Cross-page consistency audit: extract the nav HTML, footer HTML,
 * and document the hash of each so we can spot drift. */
import puppeteer from 'puppeteer';
import fs from 'fs';
import path from 'path';
import crypto from 'crypto';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const BASE = 'http://localhost:3000';
const PAGES = [
  '', 'about-us.html', 'our-team.html', 'product.html', 'our-models.html',
  'industries.html', 'platform.html', 'how-it-works.html', 'pricing.html',
  'resources.html', 'investors.html', 'why-xray.html', 'faqs.html',
  'news-updates.html', 'request-demo.html',
];

const browser = await puppeteer.launch({
  headless: 'new',
  executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
  args: ['--no-sandbox'],
});

function hash(s) { return crypto.createHash('sha1').update(s).digest('hex').slice(0, 12); }

const navHashes = {}, footerHashes = {};
const navHrefs = {}, footerHrefs = {};

for (const slug of PAGES) {
  const pg = await browser.newPage();
  await pg.goto(`${BASE}/${slug}`, { waitUntil: 'domcontentloaded' });
  const data = await pg.evaluate(() => {
    const nav = document.querySelector('nav.xr-nav');
    const footer = document.querySelector('footer.xr-footer');
    return {
      nav: nav?.innerHTML.replace(/\s+/g, ' ').trim() || '',
      footer: footer?.innerHTML.replace(/\s+/g, ' ').trim() || '',
      navLinks: Array.from(nav?.querySelectorAll('a[href]') || []).map((a) => a.getAttribute('href')),
      footerLinks: Array.from(footer?.querySelectorAll('a[href]') || []).map((a) => a.getAttribute('href')),
    };
  });
  navHashes[slug || 'index.html'] = hash(data.nav);
  footerHashes[slug || 'index.html'] = hash(data.footer);
  navHrefs[slug || 'index.html'] = data.navLinks;
  footerHrefs[slug || 'index.html'] = data.footerLinks;
  await pg.close();
}
await browser.close();

const md = ['# Cross-page Consistency Audit\n', `Generated: ${new Date().toISOString()}\n`];
md.push('\n## Nav HTML hashes\n');
const navByHash = {};
for (const [p, h] of Object.entries(navHashes)) {
  navByHash[h] = (navByHash[h] || []);
  navByHash[h].push(p);
  md.push(`- ${p}: \`${h}\``);
}
md.push(`\n${Object.keys(navByHash).length} distinct nav variants across ${PAGES.length} pages.`);

md.push('\n\n## Footer HTML hashes\n');
const footByHash = {};
for (const [p, h] of Object.entries(footerHashes)) {
  footByHash[h] = (footByHash[h] || []);
  footByHash[h].push(p);
  md.push(`- ${p}: \`${h}\``);
}
md.push(`\n${Object.keys(footByHash).length} distinct footer variants across ${PAGES.length} pages.`);

// Identify the most-common variant and list pages that differ
function mode(map) {
  const groups = {};
  for (const [p, h] of Object.entries(map)) (groups[h] ||= []).push(p);
  return Object.entries(groups).sort((a, b) => b[1].length - a[1].length);
}

md.push('\n\n## Nav groups\n');
for (const [h, pages] of mode(navHashes)) md.push(`- (${pages.length}) \`${h}\`: ${pages.join(', ')}`);

md.push('\n\n## Footer groups\n');
for (const [h, pages] of mode(footerHashes)) md.push(`- (${pages.length}) \`${h}\`: ${pages.join(', ')}`);

// Per-page nav-href diff vs index
const indexNav = JSON.stringify(navHrefs['index.html']);
const indexFooter = JSON.stringify(footerHrefs['index.html']);
md.push('\n\n## Nav-href diff vs index.html\n');
for (const [p, links] of Object.entries(navHrefs)) {
  if (p === 'index.html') continue;
  if (JSON.stringify(links) !== indexNav) {
    md.push(`- ${p}: different`);
    const missing = navHrefs['index.html'].filter((l) => !links.includes(l));
    const extra = links.filter((l) => !navHrefs['index.html'].includes(l));
    if (missing.length) md.push(`  - missing: ${missing.join(', ')}`);
    if (extra.length) md.push(`  - extra: ${extra.join(', ')}`);
  }
}
md.push('\n\n## Footer-href diff vs index.html\n');
for (const [p, links] of Object.entries(footerHrefs)) {
  if (p === 'index.html') continue;
  if (JSON.stringify(links) !== indexFooter) {
    md.push(`- ${p}: different`);
    const missing = footerHrefs['index.html'].filter((l) => !links.includes(l));
    const extra = links.filter((l) => !footerHrefs['index.html'].includes(l));
    if (missing.length) md.push(`  - missing: ${missing.join(', ')}`);
    if (extra.length) md.push(`  - extra: ${extra.join(', ')}`);
  }
}

fs.writeFileSync(path.join(__dirname, '_consistency-report.md'), md.join('\n'));
console.log('Wrote _consistency-report.md');
