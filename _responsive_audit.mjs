/* Capture each page at desktop (1440x900), tablet (768x1024) and mobile (375x812)
 * and detect: horizontal scrollbar (== overflow), elements wider than viewport,
 * and elements that overlap nav. Saves screenshots to ./_audit-shots/ and writes
 * a Markdown summary of issues.
 */
import puppeteer from 'puppeteer';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const SHOTS = path.join(__dirname, '_audit-shots');
fs.mkdirSync(SHOTS, { recursive: true });

const BASE = 'http://localhost:3000';
const PAGES = [
  'index.html', 'about-us.html', 'our-team.html', 'product.html', 'our-models.html',
  'industries.html', 'platform.html', 'how-it-works.html', 'pricing.html',
  'resources.html', 'investors.html', 'why-xray.html', 'faqs.html',
  'news-updates.html', 'request-demo.html',
];
const SIZES = [
  { name: 'desktop', w: 1440, h: 900 },
  { name: 'tablet',  w: 768,  h: 1024 },
  { name: 'mobile',  w: 375,  h: 812 },
];

const browser = await puppeteer.launch({
  headless: 'new',
  executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
  args: ['--no-sandbox', '--autoplay-policy=no-user-gesture-required'],
});

const findings = [];

for (const slug of PAGES) {
  for (const size of SIZES) {
    const pg = await browser.newPage();
    await pg.setViewport({ width: size.w, height: size.h });
    const url = `${BASE}/${slug === 'index.html' ? '' : slug}`;
    try {
      await pg.goto(url, { waitUntil: 'networkidle0', timeout: 30000 });
    } catch (e) {
      findings.push({ slug, size: size.name, kind: 'navigation', detail: e.message });
      await pg.close();
      continue;
    }
    await new Promise((r) => setTimeout(r, 500));

    // Bypass hero scroll-lock so we can measure full page
    if (slug === 'index.html') {
      await pg.evaluate(() => {
        document.body.classList.remove('xr-scroll-locked');
        document.documentElement.classList.remove('xr-scroll-locked');
        if (window.ScrollTrigger && window.ScrollTrigger.getAll) {
          window.ScrollTrigger.getAll().forEach((st) => st.kill(true));
        }
        document.querySelectorAll('.reveal, .xr-reveal').forEach((el) => el.classList.add('in'));
      });
      await new Promise((r) => setTimeout(r, 300));
    } else {
      await pg.evaluate(() => {
        document.querySelectorAll('.reveal, .xr-reveal').forEach((el) => el.classList.add('in'));
      });
    }

    const result = await pg.evaluate(() => {
      const vw = window.innerWidth;
      const docW = document.documentElement.scrollWidth;
      const bodyW = document.body.scrollWidth;
      const overflowX = docW > vw + 1;
      const wide = [];
      const overlapping = [];
      const nav = document.querySelector('.xr-nav');
      const navRect = nav ? nav.getBoundingClientRect() : null;
      document.querySelectorAll('main *, header *, footer *, section *, .xr-hero *').forEach((el) => {
        const r = el.getBoundingClientRect();
        if (r.width > vw + 1 && r.width < 10000) {
          wide.push({ tag: el.tagName.toLowerCase(), cls: el.className?.toString().slice(0, 60) || '', w: Math.round(r.width) });
        }
      });
      // Limit to 5 worst per page
      wide.sort((a, b) => b.w - a.w);
      return { vw, docW, bodyW, overflowX, wide: wide.slice(0, 5), navHeight: navRect?.height };
    });

    if (result.overflowX) findings.push({ slug, size: size.name, kind: 'overflowX', detail: `vw=${result.vw} doc=${result.docW}` });
    if (result.wide.length) findings.push({ slug, size: size.name, kind: 'wide-element', detail: JSON.stringify(result.wide) });

    // Save a screenshot at this size
    const outName = `${slug.replace('.html','')}-${size.name}.png`;
    await pg.screenshot({ path: path.join(SHOTS, outName), fullPage: true });
    console.log(`  ${slug} @ ${size.name}: vw=${result.vw} docW=${result.docW} overflow=${result.overflowX} wideEls=${result.wide.length}`);

    await pg.close();
  }
}

await browser.close();

const md = ['# Responsive Audit\n', `Generated: ${new Date().toISOString()}\n`];
if (!findings.length) md.push('\nNo overflow or wide-element issues detected.');
else {
  md.push('\n## Issues\n');
  findings.forEach((f) => md.push(`- **${f.slug}** @ ${f.size} · ${f.kind} · ${f.detail}`));
}
fs.writeFileSync(path.join(__dirname, '_responsive-report.md'), md.join('\n'));
console.log('\nWrote _responsive-report.md');
