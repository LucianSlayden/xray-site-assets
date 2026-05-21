import puppeteer from 'puppeteer';
const browser = await puppeteer.launch({ headless: 'new', executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', args: ['--no-sandbox'] });
async function getFooter(slug) {
  const pg = await browser.newPage();
  await pg.goto(`http://localhost:3000/${slug}`, { waitUntil: 'domcontentloaded' });
  const f = await pg.evaluate(() => document.querySelector('footer.xr-footer')?.innerHTML.replace(/\s+/g, ' ').trim() || '');
  await pg.close();
  return f;
}
const baseline = await getFooter('about-us.html');
for (const slug of ['index.html','our-team.html','our-models.html','pricing.html','product.html','investors.html']) {
  const f = await getFooter(slug);
  console.log('\n=== ' + slug + ' ===');
  // Find differences as a quick character-diff
  let diff = '';
  for (let i = 0; i < Math.max(baseline.length, f.length); i++) {
    if (baseline[i] !== f[i]) {
      const start = Math.max(0, i - 40);
      const end = Math.min(f.length, i + 80);
      diff += 'pos ' + i + ': ...' + baseline.slice(start, end) + '... \n     ...' + f.slice(start, end) + '...';
      break;
    }
  }
  console.log(diff);
}
await browser.close();
