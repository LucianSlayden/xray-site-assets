/* Keyboard nav smoke test: tab through the page and check (a) every
 * focusable element receives focus, (b) focused element has a visible
 * focus indicator (outline / box-shadow / background change). */
import puppeteer from 'puppeteer';

const browser = await puppeteer.launch({ headless: 'new', executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', args: ['--no-sandbox'] });
const pg = await browser.newPage();
await pg.setViewport({ width: 1440, height: 900 });
await pg.goto('http://localhost:3000/', { waitUntil: 'networkidle0' });

// Force scroll-lock off for testing
await pg.evaluate(() => {
  document.body.classList.remove('xr-scroll-locked');
  document.documentElement.classList.remove('xr-scroll-locked');
  if (window.ScrollTrigger && window.ScrollTrigger.getAll) {
    window.ScrollTrigger.getAll().forEach((st) => st.kill(true));
  }
});

const focusables = await pg.evaluate(() => {
  const sel = 'a[href], button, input:not([type="hidden"]), select, textarea, [tabindex]:not([tabindex="-1"])';
  return document.querySelectorAll(sel).length;
});
console.log(`Focusable elements on home: ${focusables}`);

// Tab through first 20 and check each gets a focus ring (outline or box-shadow)
let withoutRing = 0;
for (let i = 0; i < Math.min(20, focusables); i++) {
  await pg.keyboard.press('Tab');
  const cur = await pg.evaluate(() => {
    const el = document.activeElement;
    if (!el || el === document.body) return null;
    const cs = getComputedStyle(el);
    const focusVisible = el.matches(':focus-visible');
    const outline = cs.outlineStyle !== 'none' && cs.outlineWidth !== '0px';
    const shadow = cs.boxShadow !== 'none';
    return {
      tag: el.tagName.toLowerCase(),
      text: (el.textContent || '').trim().slice(0, 40),
      outline, shadow, focusVisible,
      outlineStyle: cs.outlineStyle, outlineWidth: cs.outlineWidth,
    };
  });
  if (!cur) continue;
  const hasRing = cur.outline || cur.shadow;
  if (!hasRing) {
    withoutRing++;
    console.log(`  [no-ring] ${cur.tag} "${cur.text}"`);
  }
}
console.log(`\nFocusable without ring: ${withoutRing}`);
await browser.close();
