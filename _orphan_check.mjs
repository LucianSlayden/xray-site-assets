import puppeteer from 'puppeteer';
const ALL = [
  'index.html', 'about-us.html', 'our-team.html', 'product.html', 'our-models.html',
  'industries.html', 'platform.html', 'how-it-works.html', 'pricing.html',
  'resources.html', 'investors.html', 'why-xray.html', 'faqs.html',
  'news-updates.html', 'request-demo.html',
];
const browser = await puppeteer.launch({
  headless: 'new', executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', args: ['--no-sandbox'],
});
const reached = new Set();
for (const p of ALL) {
  const pg = await browser.newPage();
  await pg.goto(`http://localhost:3000/${p === 'index.html' ? '' : p}`, { waitUntil: 'domcontentloaded' });
  const hrefs = await pg.evaluate(() => Array.from(document.querySelectorAll('a[href]')).map((a) => a.getAttribute('href')));
  hrefs.forEach((h) => { if (h && !h.startsWith('http') && !h.startsWith('#') && !h.startsWith('mailto:') && !h.startsWith('javascript:')) reached.add(h.split('#')[0]); });
  await pg.close();
}
await browser.close();
const reachedNorm = new Set([...reached].map((h) => h === '' || h === '/' ? 'index.html' : h.replace(/^\.\//, '')));
console.log('Reached files:');
[...reachedNorm].sort().forEach((r) => console.log('  ', r));
const orphans = ALL.filter((p) => !reachedNorm.has(p));
console.log('\nOrphans (pages NOT linked from anywhere):');
orphans.forEach((o) => console.log('  ', o));
