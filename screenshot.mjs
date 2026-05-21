import puppeteer from 'puppeteer';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const dir = path.join(__dirname, 'temporary screenshots');
if (!fs.existsSync(dir)) fs.mkdirSync(dir, { recursive: true });

/*
  Usage:
    node screenshot.mjs <url>                                 — full page
    node screenshot.mjs <url> <label>                          — full page, label suffix
    node screenshot.mjs <url> <label> viewport                 — viewport-only (no scroll)
    node screenshot.mjs <url> <label> viewport <scrollPx>      — viewport at scrollY=<scrollPx>
    node screenshot.mjs <url> <label> viewport <scrollPx> <w>x<h>   — custom viewport size
*/

const url = process.argv[2] || 'http://localhost:3000';
const label = process.argv[3] ? `-${process.argv[3]}` : '';
const mode = process.argv[4] || 'full';           // 'full' | 'viewport'
const scrollY = parseInt(process.argv[5], 10) || 0;
const sizeArg = process.argv[6] || '1440x900';
const [vw, vh] = sizeArg.split('x').map((n) => parseInt(n, 10));

let n = 1;
while (fs.existsSync(path.join(dir, `screenshot-${n}${label}.png`))) n++;
const outPath = path.join(dir, `screenshot-${n}${label}.png`);

const browser = await puppeteer.launch({
  headless: 'new',
  executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
  args: [
    '--no-sandbox',
    '--disable-setuid-sandbox',
    '--use-gl=swiftshader',
    '--enable-features=VaapiVideoDecoder',
    '--autoplay-policy=no-user-gesture-required',
  ],
});
const page = await browser.newPage();
await page.setViewport({ width: vw || 1440, height: vh || 900, deviceScaleFactor: 1 });
await page.goto(url, { waitUntil: 'load', timeout: 60000 });
await new Promise((r) => setTimeout(r, 900));

// Force all scroll-reveal animations to end state so the screenshot reflects final visual.
// Hero bullets are NOT forced — they only appear after scroll-scrub passes threshold,
// which is the correct natural behavior. Pass a `bullets` flag if you need them on.
const forceBullets = process.argv.includes('--bullets');
await page.evaluate((forceBullets) => {
  document.querySelectorAll('.reveal, .xr-reveal').forEach((el) => el.classList.add('in'));
  if (forceBullets) {
    document.querySelectorAll('.xr-hero-bullets').forEach((el) => el.classList.add('in'));
  }
  // Counter end values
  document.querySelectorAll('[data-target]').forEach((el) => {
    const target = el.dataset.target;
    const prefix = el.dataset.prefix || '';
    const suffix = el.dataset.suffix || '';
    el.textContent = prefix + target + suffix;
  });
  // Progress bar fills
  document.querySelectorAll('[data-bar-fill]').forEach((el) => {
    el.style.width = el.dataset.barFill + '%';
  });
  const accBar = document.getElementById('acc-bar');
  if (accBar) accBar.classList.add('animate');
}, forceBullets);

// Wait for any <video> elements to have decoded a frame
await page.evaluate(async () => {
  const videos = Array.from(document.querySelectorAll('video'));
  await Promise.all(videos.map((v) => new Promise((resolve) => {
    if (v.readyState >= 2) { resolve(); return; }
    const done = () => { v.removeEventListener('loadeddata', done); v.removeEventListener('canplay', done); resolve(); };
    v.addEventListener('loadeddata', done);
    v.addEventListener('canplay', done);
    setTimeout(resolve, 4000);
  })));
});

if (mode === 'viewport') {
  if (scrollY) await page.evaluate((y) => window.scrollTo(0, y), scrollY);
  // Allow the rAF-driven hero scrub to land on its scroll-mapped frame before snapping.
  await new Promise((r) => setTimeout(r, 1100));
  await page.screenshot({ path: outPath, fullPage: false });
} else {
  await new Promise((r) => setTimeout(r, 600));
  await page.screenshot({ path: outPath, fullPage: true });
}

await browser.close();
console.log(`Saved: ${outPath}`);
