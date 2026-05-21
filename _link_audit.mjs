/* Internal-link validator: pulls every href from every top-level page,
 * resolves to localhost URLs, HEAD-checks each unique target. */
import http from 'http';
import puppeteer from 'puppeteer';
import fs from 'fs';
import path from 'path';
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

const linksByPage = {};
for (const slug of PAGES) {
  const pg = await browser.newPage();
  await pg.goto(`${BASE}/${slug}`, { waitUntil: 'domcontentloaded', timeout: 20000 });
  const found = await pg.evaluate(() => Array.from(document.querySelectorAll('a[href]')).map((a) => ({
    href: a.getAttribute('href'), text: (a.textContent || '').trim().slice(0, 60),
  })));
  linksByPage[slug || 'index.html'] = found;
  await pg.close();
}
await browser.close();

// Collect unique internal targets
const targets = new Set();
for (const list of Object.values(linksByPage)) {
  for (const { href } of list) {
    if (!href || href === '#' || href.startsWith('mailto:') || href.startsWith('http') || href.startsWith('javascript:')) continue;
    // strip hash
    const cleaned = href.split('#')[0];
    if (cleaned) targets.add(cleaned);
  }
}

function headCheck(url) {
  return new Promise((resolve) => {
    const u = new URL(url, BASE);
    const req = http.request({ host: u.hostname, port: u.port, path: u.pathname + u.search, method: 'HEAD' }, (res) => {
      resolve({ url, status: res.statusCode });
    });
    req.on('error', (e) => resolve({ url, status: 'ERR', err: e.message }));
    req.end();
  });
}

const checks = await Promise.all([...targets].map((t) => headCheck(t)));

const issues = checks.filter((c) => c.status === 404 || c.status === 'ERR' || (typeof c.status === 'number' && c.status >= 400));

const md = ['# Internal Link Audit\n', `Generated: ${new Date().toISOString()}\n`];
md.push(`\nChecked ${checks.length} unique internal targets.\n`);
if (issues.length === 0) md.push('\nAll internal links resolve successfully.');
else {
  md.push('\n## Broken targets\n');
  issues.forEach((i) => md.push(`- ${i.status}  ${i.url}`));
  // Show source pages for each broken target
  md.push('\n## Source pages\n');
  for (const issue of issues) {
    md.push(`\n### ${issue.url}`);
    for (const [slug, list] of Object.entries(linksByPage)) {
      const matches = list.filter((l) => (l.href || '').split('#')[0] === issue.url);
      if (matches.length) {
        md.push(`- **${slug}**:`);
        matches.forEach((m) => md.push(`  - "${m.text}"`));
      }
    }
  }
}

fs.writeFileSync(path.join(__dirname, '_links-report.md'), md.join('\n'));
console.log(`Checked ${checks.length} links. ${issues.length} issue(s). Wrote _links-report.md`);
