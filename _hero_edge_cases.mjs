/* Test the hero animation under edge cases:
 *   1. video URL 404 (intercepted to return 404) — does the page still scroll?
 *   2. prefers-reduced-motion (emulated) — is the animation disabled / muted?
 *   3. Slow network (50 KB/s) — does the page still become interactive?
 */
import puppeteer from 'puppeteer';

const browser = await puppeteer.launch({
  headless: 'new', executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', args: ['--no-sandbox'],
});

async function test(label, setup) {
  const pg = await browser.newPage();
  await pg.setViewport({ width: 1440, height: 900 });
  if (setup) await setup(pg);
  const consoleErrors = [];
  pg.on('pageerror', (e) => consoleErrors.push(e.toString()));
  pg.on('console', (m) => { if (m.type() === 'error') consoleErrors.push(m.text()); });
  try {
    await pg.goto('http://localhost:3000', { waitUntil: 'domcontentloaded', timeout: 30000 });
  } catch (e) {
    console.log(`${label}: navigation error ${e.message}`);
    await pg.close();
    return;
  }
  await new Promise((r) => setTimeout(r, 2500));

  // Try to scroll past the hero
  const before = await pg.evaluate(() => window.scrollY);
  await pg.evaluate(() => window.scrollTo(0, 5000));
  // dispatch wheel to trigger lock release
  await pg.evaluate(() => window.dispatchEvent(new WheelEvent('wheel', { deltaY: 100 })));
  await new Promise((r) => setTimeout(r, 3500));
  const after = await pg.evaluate(() => window.scrollY);
  console.log(`${label}: scrollY ${before} → ${after}; errors: ${consoleErrors.length}`);
  if (consoleErrors.length) consoleErrors.slice(0, 3).forEach((e) => console.log(`    !${e}`));
  await pg.close();
}

// Test 1: normal
await test('normal', null);

// Test 2: video 404
await test('video 404', async (pg) => {
  await pg.setRequestInterception(true);
  pg.on('request', (r) => {
    if (r.url().endsWith('.mp4')) r.respond({ status: 404, body: 'not found' });
    else r.continue();
  });
});

// Test 3: prefers-reduced-motion
await test('reduced-motion', async (pg) => {
  await pg.emulateMediaFeatures([{ name: 'prefers-reduced-motion', value: 'reduce' }]);
});

await browser.close();
