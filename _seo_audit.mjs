import puppeteer from 'puppeteer';
const PAGES = [
  '', 'about-us.html', 'our-team.html', 'product.html', 'our-models.html',
  'industries.html', 'platform.html', 'how-it-works.html', 'pricing.html',
  'resources.html', 'investors.html', 'why-xray.html', 'faqs.html',
  'news-updates.html', 'request-demo.html',
];
const b = await puppeteer.launch({ headless: 'new', executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', args: ['--no-sandbox'] });
for (const slug of PAGES) {
  const pg = await b.newPage();
  await pg.goto(`http://localhost:3000/${slug}`, { waitUntil: 'domcontentloaded' });
  const data = await pg.evaluate(() => {
    const title = document.title;
    const desc = document.querySelector('meta[name="description"]')?.getAttribute('content') || '';
    const h1 = document.querySelector('h1')?.textContent?.replace(/\s+/g, ' ').trim() || '';
    const wordCount = document.body.textContent.split(/\s+/).filter((w) => w.length > 1).length;
    return { title, titleLen: title.length, desc, descLen: desc.length, h1, h1Len: h1.length, wordCount };
  });
  await pg.close();
  const issues = [];
  if (data.titleLen > 70) issues.push('title >70ch');
  if (data.titleLen < 25) issues.push('title <25ch');
  if (data.descLen > 165) issues.push('desc >165ch');
  if (data.descLen < 70) issues.push('desc <70ch');
  if (data.h1Len > 120) issues.push('h1 long');
  if (!data.h1) issues.push('no h1');
  if (data.wordCount < 100) issues.push('thin content');
  console.log(`${slug || 'index'}: title=${data.titleLen}ch desc=${data.descLen}ch h1=${data.h1Len}ch words=${data.wordCount}  ${issues.length ? '⚠ ' + issues.join(', ') : 'ok'}`);
}
await b.close();
