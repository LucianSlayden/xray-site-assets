/* Adds About Us (about-us.html) to the nav dropdown and the mobile menu
 * of every top-level HTML page, immediately before "Our Team". */
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

// Desktop dropdown — add About Us as first item
const DROP_OLD = `<a href="our-team.html">Our Team</a>`;
const DROP_NEW = `<a href="about-us.html">About Us</a>\n            <a href="our-team.html">Our Team</a>`;

// Mobile nav — add About Us right before Our Team
const MOBILE_OLD = `      <a href="our-team.html">Our Team</a>`;
const MOBILE_NEW = `      <a href="about-us.html">About Us</a>\n      <a href="our-team.html">Our Team</a>`;

let touched = 0;
for (const f of FILES) {
  const fp = path.join(__dirname, f);
  let txt = fs.readFileSync(fp, 'utf8');
  let changed = false;

  // Only add About Us if it isn't already present in the nav block
  // (we use a simple count check: each page should have 0 instances of
  // href="about-us.html" *before* this fix runs, and we want exactly 2 after
  // for index.html-style pages — one in dropdown, one in mobile nav.)
  const existingAboutLinks = (txt.match(/href="about-us\.html"/g) || []).length;

  if (existingAboutLinks < 2) {
    if (txt.includes(DROP_OLD) && !txt.match(/<a href="about-us\.html">About Us<\/a>\s*\n\s*<a href="our-team\.html">/)) {
      txt = txt.replace(DROP_OLD, DROP_NEW);
      changed = true;
    }
    if (txt.includes(MOBILE_OLD) && !txt.match(/<a href="about-us\.html">About Us<\/a>\s*\n\s*<a href="our-team\.html">/m)) {
      txt = txt.replace(MOBILE_OLD, MOBILE_NEW);
      changed = true;
    }
  }

  if (changed) {
    fs.writeFileSync(fp, txt);
    touched++;
    console.log('updated', f);
  } else {
    console.log('skip   ', f, '(already has about-us link or pattern not found)');
  }
}
console.log(`\nTouched ${touched} files.`);
