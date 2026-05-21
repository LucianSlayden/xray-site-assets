/* Inject Open Graph + Twitter card meta tags into every top-level page.
 * Pulls page title from <title> and description from <meta name="description">.
 * Inserts the OG block immediately after the description meta tag. */
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const FILES = [
  ['index.html',            'https://xraygeoanalytics.com/'],
  ['about-us.html',         'https://xraygeoanalytics.com/about-us.html'],
  ['our-team.html',         'https://xraygeoanalytics.com/our-team.html'],
  ['product.html',          'https://xraygeoanalytics.com/product.html'],
  ['our-models.html',       'https://xraygeoanalytics.com/our-models.html'],
  ['industries.html',       'https://xraygeoanalytics.com/industries.html'],
  ['platform.html',         'https://xraygeoanalytics.com/platform.html'],
  ['how-it-works.html',     'https://xraygeoanalytics.com/how-it-works.html'],
  ['pricing.html',          'https://xraygeoanalytics.com/pricing.html'],
  ['resources.html',        'https://xraygeoanalytics.com/resources.html'],
  ['investors.html',        'https://xraygeoanalytics.com/investors.html'],
  ['why-xray.html',         'https://xraygeoanalytics.com/why-xray.html'],
  ['faqs.html',             'https://xraygeoanalytics.com/faqs.html'],
  ['news-updates.html',     'https://xraygeoanalytics.com/news-updates.html'],
  ['request-demo.html',     'https://xraygeoanalytics.com/request-demo.html'],
];

const OG_IMAGE = 'https://xraygeoanalytics.com/brand_assets/mj-canyon-8k.jpg';

let total = 0;
for (const [f, url] of FILES) {
  const fp = path.join(__dirname, f);
  let txt = fs.readFileSync(fp, 'utf8');

  // Skip if already has og:title
  if (txt.includes('property="og:title"')) {
    console.log('skip ', f, '(already has og meta)');
    continue;
  }

  const titleMatch = txt.match(/<title>([^<]+)<\/title>/);
  const descMatch = txt.match(/<meta name="description" content="([^"]+)"\s*\/?>/);
  if (!titleMatch || !descMatch) {
    console.log('skip ', f, '(missing title or description)');
    continue;
  }
  const title = titleMatch[1].trim();
  const desc = descMatch[1].trim();

  const ogBlock = `
  <meta property="og:title" content="${title}">
  <meta property="og:description" content="${desc}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="${url}">
  <meta property="og:image" content="${OG_IMAGE}">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:site_name" content="X-Ray Geoanalytics">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="${title}">
  <meta name="twitter:description" content="${desc}">
  <meta name="twitter:image" content="${OG_IMAGE}">`;

  // Insert immediately after the description meta tag
  const fullDescTag = descMatch[0];
  const idx = txt.indexOf(fullDescTag);
  if (idx < 0) { console.log('skip ', f, '(could not locate description)'); continue; }
  txt = txt.slice(0, idx + fullDescTag.length) + ogBlock + txt.slice(idx + fullDescTag.length);

  fs.writeFileSync(fp, txt);
  total++;
  console.log('ok   ', f);
}
console.log(`\nTouched ${total} files.`);
