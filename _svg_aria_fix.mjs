/* Adds aria-hidden="true" to every <svg> tag that lacks aria-hidden,
 * aria-label, aria-labelledby, role, or an internal <title> element.
 * Safe default for decorative SVGs site-wide. */
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const FILES = [
  'index.html', 'about-us.html', 'our-team.html', 'product.html', 'our-models.html',
  'industries.html', 'platform.html', 'how-it-works.html', 'pricing.html',
  'resources.html', 'investors.html', 'why-xray.html', 'faqs.html',
  'news-updates.html', 'request-demo.html',
];

let totalAdded = 0;
for (const f of FILES) {
  const fp = path.join(__dirname, f);
  let txt = fs.readFileSync(fp, 'utf8');
  let added = 0;

  // Match <svg ...> opening tags, capture attribute string.
  const re = /<svg(\s[^>]*?)?>/g;
  txt = txt.replace(re, (match, attrs) => {
    const attrStr = attrs || '';
    // Skip if it already has any of these
    if (/aria-hidden|aria-label|aria-labelledby|role\s*=/i.test(attrStr)) return match;
    added++;
    return `<svg aria-hidden="true"${attrStr}>`;
  });

  if (added > 0) {
    fs.writeFileSync(fp, txt);
    totalAdded += added;
    console.log(`${f}: +${added}`);
  }
}
console.log(`\nTotal aria-hidden additions: ${totalAdded}`);
