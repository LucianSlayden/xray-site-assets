import puppeteer from 'puppeteer';
const browser = await puppeteer.launch({
  headless: true,
  executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
  args: ['--no-sandbox', '--disable-gpu', '--autoplay-policy=no-user-gesture-required'],
});
const p = await browser.newPage();
p.on('console', (m) => console.log('  console>', m.text()));
p.on('pageerror', (e) => console.log('  pageerror>', e.message));
await p.goto('http://localhost:3000/index.html', { waitUntil: 'networkidle0' });
const info = await p.evaluate(async () => {
  const v = document.querySelector('.xr-hero-video');
  if (!v) return { err: 'no video element' };
  await new Promise((r) => {
    if (v.readyState >= 1) { r(); return; }
    v.addEventListener('loadedmetadata', r, { once: true });
    setTimeout(r, 5000);
  });
  return { w: v.videoWidth, h: v.videoHeight, duration: v.duration, src: v.currentSrc, readyState: v.readyState, rect: v.getBoundingClientRect() };
});
console.log('video:', info);
await browser.close();
