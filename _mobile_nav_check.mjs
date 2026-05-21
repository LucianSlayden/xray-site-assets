/* Detect mobile-nav completeness across all pages. */
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
const __dirname = path.dirname(fileURLToPath(import.meta.url));

const REQUIRED = [
  'product.html','our-models.html','industries.html','platform.html','how-it-works.html','pricing.html',
  'resources.html','investors.html','about-us.html','our-team.html','why-xray.html','news-updates.html','faqs.html',
];
const FILES = REQUIRED.concat(['index.html','request-demo.html']);

for (const f of FILES) {
  const fp = path.join(__dirname, f);
  const txt = fs.readFileSync(fp, 'utf8');
  // Extract just the mobile-nav block
  const m = txt.match(/<div class="xr-nav-mobile">([\s\S]*?)<\/div>/);
  if (!m) { console.log(`${f}: NO MOBILE NAV BLOCK`); continue; }
  const block = m[1];
  const missing = REQUIRED.filter((r) => !block.includes(`href="${r}"`));
  if (missing.length) console.log(`${f}: missing ${missing.join(', ')}`);
  else console.log(`${f}: complete`);
}
