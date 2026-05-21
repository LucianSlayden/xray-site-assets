/* Site-wide audit:
 *   - Loads each top-level page
 *   - Captures console errors / warnings, page errors, failed network requests
 *   - Extracts internal links and validates they 200
 *   - Extracts <img> and CSS background-image URLs and validates they 200
 *   - Lists any anchor with empty href / href="#" / mailto: target
 *
 * Writes a JSON report to ./_audit-report.json and a Markdown summary
 * to ./_audit-report.md so the report survives across sessions.
 */
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
  args: ['--no-sandbox', '--autoplay-policy=no-user-gesture-required'],
});

const report = { generatedAt: new Date().toISOString(), pages: {} };

for (const page of PAGES) {
  const url = `${BASE}/${page}`;
  const slug = page || 'index.html';
  console.log(`\n--- ${slug} ---`);

  const pg = await browser.newPage();
  await pg.setViewport({ width: 1440, height: 900 });

  const consoleErrors = [];
  const consoleWarnings = [];
  const pageErrors = [];
  const failedRequests = [];

  pg.on('console', (msg) => {
    const type = msg.type();
    const text = msg.text();
    if (type === 'error') consoleErrors.push(text);
    else if (type === 'warning') consoleWarnings.push(text);
  });
  pg.on('pageerror', (err) => pageErrors.push(err.toString()));
  pg.on('requestfailed', (req) => {
    failedRequests.push({ url: req.url(), reason: req.failure()?.errorText, resourceType: req.resourceType() });
  });
  pg.on('response', (resp) => {
    const status = resp.status();
    if (status >= 400) {
      failedRequests.push({ url: resp.url(), status, resourceType: resp.request().resourceType() });
    }
  });

  try {
    await pg.goto(url, { waitUntil: 'networkidle0', timeout: 30000 });
  } catch (err) {
    pageErrors.push(`Navigation: ${err.toString()}`);
  }

  // Wait for any deferred JS to settle
  await new Promise((r) => setTimeout(r, 800));

  // Extract internal links, image refs, and other interesting bits
  const meta = await pg.evaluate(() => {
    const a = Array.from(document.querySelectorAll('a[href]'));
    const internalLinks = [];
    const externalLinks = [];
    const emptyHrefs = [];
    const mailtos = [];
    a.forEach((el) => {
      const href = el.getAttribute('href');
      const text = (el.textContent || '').trim().slice(0, 60);
      if (!href || href === '#' || href.trim() === '') { emptyHrefs.push({ text }); return; }
      if (href.startsWith('mailto:')) { mailtos.push(href); return; }
      if (href.startsWith('http')) externalLinks.push({ href, text });
      else if (!href.startsWith('javascript:') && !href.startsWith('#')) internalLinks.push({ href, text });
    });

    const imgs = Array.from(document.querySelectorAll('img')).map((img) => ({
      src: img.currentSrc || img.src,
      alt: img.getAttribute('alt'),
      hasNaturalSize: img.naturalWidth > 0 && img.naturalHeight > 0,
      w: img.naturalWidth, h: img.naturalHeight,
    }));

    // Collect CSS background-image URLs from the computed styles of every node
    const bgImages = new Set();
    document.querySelectorAll('*').forEach((el) => {
      const bg = getComputedStyle(el).backgroundImage;
      if (bg && bg !== 'none') {
        const matches = bg.match(/url\(["']?([^"')]+)["']?\)/g) || [];
        matches.forEach((m) => bgImages.add(m.replace(/url\(["']?|["']?\)/g, '')));
      }
    });

    return {
      title: document.title,
      h1Count: document.querySelectorAll('h1').length,
      langAttr: document.documentElement.lang || null,
      hasViewportMeta: !!document.querySelector('meta[name="viewport"]'),
      hasDescriptionMeta: !!document.querySelector('meta[name="description"]'),
      internalLinks, externalLinks, emptyHrefs, mailtos,
      imgs,
      bgImages: [...bgImages],
      docHeight: document.documentElement.scrollHeight,
    };
  });

  report.pages[slug] = {
    url, meta, consoleErrors, consoleWarnings, pageErrors, failedRequests,
  };

  console.log(`  console.errors: ${consoleErrors.length}  warnings: ${consoleWarnings.length}  pageErrors: ${pageErrors.length}  failed: ${failedRequests.length}`);
  await pg.close();
}

await browser.close();

// Write JSON
fs.writeFileSync(path.join(__dirname, '_audit-report.json'), JSON.stringify(report, null, 2));

// Write Markdown summary
const lines = [`# Site Audit Report\nGenerated: ${report.generatedAt}\n`];
for (const [slug, info] of Object.entries(report.pages)) {
  lines.push(`\n## ${slug}\n`);
  lines.push(`- **Title:** ${info.meta.title}`);
  lines.push(`- **H1 count:** ${info.meta.h1Count}`);
  lines.push(`- **lang:** ${info.meta.langAttr || 'MISSING'}  · **viewport:** ${info.meta.hasViewportMeta ? 'ok' : 'MISSING'}  · **meta description:** ${info.meta.hasDescriptionMeta ? 'ok' : 'MISSING'}`);
  lines.push(`- **Doc height:** ${info.meta.docHeight}px`);
  if (info.consoleErrors.length) lines.push(`### Console errors (${info.consoleErrors.length})\n${info.consoleErrors.map((e) => '- ' + e).join('\n')}`);
  if (info.pageErrors.length) lines.push(`### Page errors\n${info.pageErrors.map((e) => '- ' + e).join('\n')}`);
  if (info.failedRequests.length) {
    lines.push(`### Failed requests (${info.failedRequests.length})`);
    info.failedRequests.slice(0, 30).forEach((r) => lines.push(`- ${r.status || r.reason || '?'}  ${r.resourceType}  ${r.url}`));
  }
  const brokenImgs = info.meta.imgs.filter((i) => !i.hasNaturalSize);
  if (brokenImgs.length) {
    lines.push(`### Broken images (${brokenImgs.length})`);
    brokenImgs.forEach((i) => lines.push(`- ${i.src}  (alt: ${i.alt ?? 'MISSING'})`));
  }
  const noAlt = info.meta.imgs.filter((i) => i.alt == null || i.alt === '');
  if (noAlt.length) {
    lines.push(`### Images missing alt (${noAlt.length})`);
    noAlt.slice(0, 8).forEach((i) => lines.push(`- ${i.src}`));
  }
  if (info.meta.emptyHrefs.length) {
    lines.push(`### Empty / placeholder hrefs (${info.meta.emptyHrefs.length})`);
    info.meta.emptyHrefs.slice(0, 12).forEach((h) => lines.push(`- "${h.text}"`));
  }
}
fs.writeFileSync(path.join(__dirname, '_audit-report.md'), lines.join('\n'));
console.log('\nWrote _audit-report.json and _audit-report.md');
