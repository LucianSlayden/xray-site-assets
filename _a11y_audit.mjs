/* Accessibility audit: alt-text presence, button/label association,
 * heading hierarchy, contrast-ratio sampling (foreground/background).
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
  args: ['--no-sandbox'],
});

const report = { generatedAt: new Date().toISOString(), pages: {} };

for (const slug of PAGES) {
  const pg = await browser.newPage();
  await pg.setViewport({ width: 1440, height: 900 });
  try {
    await pg.goto(`${BASE}/${slug}`, { waitUntil: 'networkidle0', timeout: 30000 });
  } catch (e) { continue; }
  await new Promise((r) => setTimeout(r, 500));

  const a11y = await pg.evaluate(() => {
    function relLum(r,g,b){const a=[r,g,b].map(v=>{v/=255;return v<=0.03928?v/12.92:Math.pow((v+0.055)/1.055,2.4);});return 0.2126*a[0]+0.7152*a[1]+0.0722*a[2];}
    function parseRGB(s){const m=s.match(/\d+(\.\d+)?/g);return m?m.slice(0,3).map(Number):null;}
    function contrastRatio(fg,bg){const l1=relLum(...fg),l2=relLum(...bg);const [a,b]=l1>l2?[l1,l2]:[l2,l1];return (a+0.05)/(b+0.05);}
    function effectiveBg(el){let n=el;while(n){const bg=getComputedStyle(n).backgroundColor;if(bg&&bg!=='rgba(0, 0, 0, 0)'&&bg!=='transparent'){const rgb=parseRGB(bg);if(rgb)return rgb;}n=n.parentElement;}return [14,20,27];}

    // 1. Buttons without accessible names
    const buttonsNoName = [];
    document.querySelectorAll('button').forEach((b) => {
      const txt = (b.textContent || '').trim();
      const aria = b.getAttribute('aria-label') || b.getAttribute('aria-labelledby');
      if (!txt && !aria) buttonsNoName.push(b.outerHTML.slice(0, 100));
    });

    // 2. Links without text or aria-label
    const linksNoName = [];
    document.querySelectorAll('a').forEach((a) => {
      const txt = (a.textContent || '').trim();
      const aria = a.getAttribute('aria-label');
      const hasIcon = a.querySelector('svg');
      if (!txt && !aria) linksNoName.push((a.outerHTML || '').slice(0, 120));
    });

    // 3. Inputs without labels
    const inputsNoLabel = [];
    document.querySelectorAll('input, textarea, select').forEach((i) => {
      if (i.type === 'hidden' || i.type === 'submit') return;
      const id = i.id;
      const label = id && document.querySelector(`label[for="${id}"]`);
      const aria = i.getAttribute('aria-label');
      const placeholder = i.getAttribute('placeholder');
      if (!label && !aria) inputsNoLabel.push({ id, name: i.name, placeholder });
    });

    // 4. Heading hierarchy skips (h1 -> h3 etc.)
    const headings = Array.from(document.querySelectorAll('h1,h2,h3,h4,h5,h6')).map((h) => ({
      level: +h.tagName[1], text: (h.textContent || '').trim().slice(0, 50)
    }));
    const hierarchyJumps = [];
    for (let i = 1; i < headings.length; i++) {
      if (headings[i].level > headings[i-1].level + 1) {
        hierarchyJumps.push({ from: `h${headings[i-1].level}`, to: `h${headings[i].level}`, text: headings[i].text });
      }
    }

    // 5. Low contrast: sample p elements, headings, small text
    const lowContrast = [];
    document.querySelectorAll('p, span, h1, h2, h3, h4, h5, h6, a, li, button').forEach((el) => {
      // skip hidden
      const cs = getComputedStyle(el);
      if (cs.visibility === 'hidden' || cs.display === 'none' || cs.opacity === '0') return;
      const fg = parseRGB(cs.color);
      if (!fg) return;
      const bg = effectiveBg(el);
      const cr = contrastRatio(fg, bg);
      const fontSizePx = parseFloat(cs.fontSize);
      const isBold = parseInt(cs.fontWeight, 10) >= 700;
      const isLargeText = fontSizePx >= 24 || (fontSizePx >= 18.66 && isBold);
      const threshold = isLargeText ? 3.0 : 4.5;
      if (cr < threshold) {
        lowContrast.push({
          tag: el.tagName.toLowerCase(),
          fontSize: fontSizePx,
          isLarge: isLargeText,
          contrast: cr.toFixed(2),
          required: threshold,
          fg: cs.color, bg: `rgb(${bg.join(',')})`,
          text: (el.textContent || '').trim().slice(0, 40),
        });
      }
    });
    // Dedupe by text+tag
    const seen = new Set();
    const lc = lowContrast.filter((i) => {
      const k = i.tag + '|' + i.text + '|' + i.fg;
      if (seen.has(k)) return false;
      seen.add(k); return true;
    });

    return { buttonsNoName, linksNoName, inputsNoLabel, hierarchyJumps, lowContrast: lc.slice(0, 30) };
  });

  report.pages[slug || 'index.html'] = a11y;
  await pg.close();
}

await browser.close();

fs.writeFileSync(path.join(__dirname, '_a11y-report.json'), JSON.stringify(report, null, 2));

// Markdown
const lines = [`# Accessibility Audit\nGenerated: ${report.generatedAt}\n`];
for (const [slug, a] of Object.entries(report.pages)) {
  lines.push(`\n## ${slug}\n`);
  if (a.buttonsNoName.length) {
    lines.push(`### Buttons with no accessible name (${a.buttonsNoName.length})`);
    a.buttonsNoName.forEach((b) => lines.push('- ' + b));
  }
  if (a.linksNoName.length) {
    lines.push(`### Links with no text or aria-label (${a.linksNoName.length})`);
    a.linksNoName.slice(0, 8).forEach((l) => lines.push('- ' + l));
  }
  if (a.inputsNoLabel.length) {
    lines.push(`### Inputs without label (${a.inputsNoLabel.length})`);
    a.inputsNoLabel.forEach((i) => lines.push(`- ${i.name || i.id || '?'} (placeholder: ${i.placeholder ?? '—'})`));
  }
  if (a.hierarchyJumps.length) {
    lines.push(`### Heading hierarchy jumps (${a.hierarchyJumps.length})`);
    a.hierarchyJumps.forEach((j) => lines.push(`- ${j.from} → ${j.to}  "${j.text}"`));
  }
  if (a.lowContrast.length) {
    lines.push(`### Low-contrast text (top ${a.lowContrast.length})`);
    a.lowContrast.slice(0, 12).forEach((c) => lines.push(`- ${c.contrast} (need ${c.required}) · ${c.tag} ${c.fontSize}px · "${c.text}"`));
  }
}
fs.writeFileSync(path.join(__dirname, '_a11y-report.md'), lines.join('\n'));
console.log('Wrote _a11y-report.json and _a11y-report.md');
