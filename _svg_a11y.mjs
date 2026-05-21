/* SVG accessibility scan: every <svg> should either have an
 * aria-label / role="img" OR be marked aria-hidden="true" so screen
 * readers skip decorative graphics. */
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
  headless: 'new', executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', args: ['--no-sandbox'],
});

let totalUntagged = 0;
const perPage = {};
for (const slug of PAGES) {
  const pg = await browser.newPage();
  await pg.goto(`${BASE}/${slug}`, { waitUntil: 'domcontentloaded' });
  const counts = await pg.evaluate(() => {
    const all = Array.from(document.querySelectorAll('svg'));
    const decorative = all.filter((s) => s.getAttribute('aria-hidden') === 'true');
    const labeled = all.filter((s) => s.getAttribute('aria-label') || s.getAttribute('aria-labelledby') || s.getAttribute('role') === 'img' || s.querySelector('title'));
    const untagged = all.filter((s) => !decorative.includes(s) && !labeled.includes(s));
    return { total: all.length, decorative: decorative.length, labeled: labeled.length, untagged: untagged.length };
  });
  perPage[slug || 'index.html'] = counts;
  totalUntagged += counts.untagged;
  console.log(`${slug || 'index.html'}: total=${counts.total} decorative=${counts.decorative} labeled=${counts.labeled} untagged=${counts.untagged}`);
  await pg.close();
}
await browser.close();
console.log(`\nTotal untagged SVGs: ${totalUntagged}`);
fs.writeFileSync(path.join(__dirname, '_svg-a11y-report.json'), JSON.stringify(perPage, null, 2));
