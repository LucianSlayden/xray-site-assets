import puppeteer from 'puppeteer';
const b = await puppeteer.launch({ headless: 'new', executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', args: ['--no-sandbox'] });
const pg = await b.newPage();
await pg.goto('http://localhost:3000/why-xray.html', { waitUntil: 'networkidle0' });
const r = await pg.evaluate(() => Array.from(document.querySelectorAll('.proof-label')).map((el) => ({
  text: el.textContent.trim(),
  display: getComputedStyle(el).display,
  visibility: getComputedStyle(el).visibility,
  fontSize: getComputedStyle(el).fontSize,
  color: getComputedStyle(el).color,
  rect: el.getBoundingClientRect(),
})));
console.log(JSON.stringify(r, null, 2));
await b.close();
