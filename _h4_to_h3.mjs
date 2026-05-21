/* Rename footer column h4s → h3 across all pages so the heading hierarchy
 * doesn't skip a level (page sections are h2, footer columns should be h3). */
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

const TARGETS = ['Product', 'Company', 'Resources', 'Get in Touch'];

let total = 0;
for (const f of FILES) {
  const fp = path.join(__dirname, f);
  let txt = fs.readFileSync(fp, 'utf8');
  let n = 0;
  for (const t of TARGETS) {
    const before = txt;
    txt = txt.replace(`<h4>${t}</h4>`, `<h3>${t}</h3>`);
    if (txt !== before) n++;
  }
  if (n) {
    fs.writeFileSync(fp, txt);
    total += n;
    console.log(`${f}: replaced ${n}`);
  }
}
console.log(`Total: ${total}`);
