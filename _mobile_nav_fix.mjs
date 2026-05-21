/* Replace every page's <div class="xr-nav-mobile"> block with a single
 * canonical mobile-nav that lists all 13 secondary pages + the Request
 * Demo CTA. Resolves the cross-page mobile-nav inconsistency. */
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
const __dirname = path.dirname(fileURLToPath(import.meta.url));

const FILES = [
  'index.html','about-us.html','our-team.html','product.html','our-models.html',
  'industries.html','platform.html','how-it-works.html','pricing.html',
  'resources.html','investors.html','why-xray.html','faqs.html',
  'news-updates.html','request-demo.html',
];

// Canonical block — preserves the indentation style used in index.html.
const CANONICAL = `<div class="xr-nav-mobile">
      <a href="product.html">Product</a>
      <a href="our-models.html">Our Models</a>
      <a href="industries.html">Industries</a>
      <a href="platform.html">Platform</a>
      <a href="how-it-works.html">How it Works</a>
      <a href="pricing.html">Pricing</a>
      <a href="resources.html">Resources</a>
      <a href="investors.html">Investors</a>
      <a href="about-us.html">About Us</a>
      <a href="our-team.html">Our Team</a>
      <a href="why-xray.html">Why X-Ray</a>
      <a href="news-updates.html">News &amp; Updates</a>
      <a href="faqs.html">FAQs</a>
      <a href="request-demo.html" class="xr-btn xr-btn-gold">Request Demo</a>
    </div>`;

let touched = 0;
for (const f of FILES) {
  const fp = path.join(__dirname, f);
  let txt = fs.readFileSync(fp, 'utf8');
  const re = /<div class="xr-nav-mobile">[\s\S]*?<\/div>/;
  if (!re.test(txt)) { console.log('skip ', f, '(no mobile nav block)'); continue; }
  const newTxt = txt.replace(re, CANONICAL);
  if (newTxt !== txt) {
    fs.writeFileSync(fp, newTxt);
    touched++;
    console.log('ok   ', f);
  } else {
    console.log('same ', f);
  }
}
console.log(`\nTouched ${touched} files.`);
