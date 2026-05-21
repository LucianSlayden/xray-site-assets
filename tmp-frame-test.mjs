import puppeteer from 'puppeteer';
const browser = await puppeteer.launch({
  headless: 'new',
  executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
  args: [
    '--no-sandbox',
    '--use-gl=swiftshader',
    '--enable-features=VaapiVideoDecoder',
    '--autoplay-policy=no-user-gesture-required',
  ],
});
const p = await browser.newPage();
await p.setViewport({ width: 1440, height: 900 });
await p.goto('http://localhost:3000/index.html', { waitUntil: 'networkidle0' });
await new Promise((r) => setTimeout(r, 1500));

await p.evaluate(() => {
  const v = document.querySelector('.xr-hero-video');
  v.currentTime = 1.5;
});
await new Promise((r) => setTimeout(r, 800));
const after = await p.evaluate(() => {
  const v = document.querySelector('.xr-hero-video');
  return { vTime: +v.currentTime.toFixed(3), vPaused: v.paused, vSeeking: v.seeking };
});
console.log('direct seek to 1.5 →', after);

await p.evaluate(() => window.scrollTo(0, 900));
await new Promise((r) => setTimeout(r, 1200));
const sc = await p.evaluate(() => {
  const v = document.querySelector('.xr-hero-video');
  return { vTime: +v.currentTime.toFixed(3), scrollY: window.scrollY };
});
console.log('scroll 900 →', sc);

await browser.close();
