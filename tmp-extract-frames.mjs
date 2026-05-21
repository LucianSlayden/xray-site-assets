import puppeteer from 'puppeteer';
import fs from 'fs';

const browser = await puppeteer.launch({
  headless: 'new',
  executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
  args: ['--no-sandbox', '--use-gl=swiftshader', '--autoplay-policy=no-user-gesture-required'],
});
const p = await browser.newPage();
await p.setViewport({ width: 1920, height: 1080 });

// Standalone HTML that just renders the video at full size, no mask, no overlay
await p.setContent(`<!doctype html><html><body style="margin:0;background:#000">
  <video id="v" src="http://localhost:3000/website_hero.mp4" muted playsinline preload="auto" style="display:block;width:100vw;height:auto"></video>
  </body></html>`);

await p.evaluate(async () => {
  const v = document.getElementById('v');
  await new Promise((r) => { if (v.readyState >= 1) r(); else v.addEventListener('loadedmetadata', r, { once: true }); setTimeout(r, 5000); });
});

const times = [0.05, 0.5, 1.0, 1.5, 2.0, 2.5, 2.9, 3.0];
for (const t of times) {
  await p.evaluate(async (tt) => {
    const v = document.getElementById('v');
    await new Promise((r) => { v.currentTime = tt; v.addEventListener('seeked', r, { once: true }); setTimeout(r, 1500); });
  }, t);
  await new Promise((r) => setTimeout(r, 800));
  const out = `temporary screenshots/video-frame-t${t.toFixed(2)}.png`;
  await p.screenshot({ path: out, fullPage: false });
  console.log('snapped t=' + t.toFixed(2));
}

await browser.close();
