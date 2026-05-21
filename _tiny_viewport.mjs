/* 320 px viewport — smallest common mobile (iPhone SE 1st gen). Detect
 * overflow / wide-element issues. */
import puppeteer from 'puppeteer';
const PAGES = [
  '', 'about-us.html', 'our-team.html', 'product.html', 'our-models.html',
  'industries.html', 'platform.html', 'how-it-works.html', 'pricing.html',
  'resources.html', 'investors.html', 'why-xray.html', 'faqs.html',
  'news-updates.html', 'request-demo.html',
];
const b = await puppeteer.launch({ headless: 'new', executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe', args: ['--no-sandbox'] });
let totalOverflow = 0;
for (const slug of PAGES) {
  const pg = await b.newPage();
  await pg.setViewport({ width: 320, height: 568 });
  await pg.goto(`http://localhost:3000/${slug}`, { waitUntil: 'networkidle0', timeout: 30000 });
  await new Promise((r) => setTimeout(r, 400));
  await pg.evaluate(() => {
    if (window.ScrollTrigger?.getAll) window.ScrollTrigger.getAll().forEach((st) => st.kill(true));
    document.body.classList.remove('xr-scroll-locked');
    document.documentElement.classList.remove('xr-scroll-locked');
  });
  const r = await pg.evaluate(() => {
    const vw = window.innerWidth;
    const docW = document.documentElement.scrollWidth;
    const wides = [];
    document.querySelectorAll('main *, section *, header *, footer *, .xr-hero *').forEach((el) => {
      const rect = el.getBoundingClientRect();
      if (rect.width > vw + 1 && rect.width < 5000) {
        wides.push({ tag: el.tagName.toLowerCase(), cls: el.className?.toString().slice(0, 50) || '', w: Math.round(rect.width) });
      }
    });
    wides.sort((a, b) => b.w - a.w);
    return { vw, docW, overflow: docW > vw + 1, wides: wides.slice(0, 3) };
  });
  if (r.overflow) {
    totalOverflow++;
    console.log(`${slug || 'index'}: vw=${r.vw} docW=${r.docW} overflow=YES wides=${JSON.stringify(r.wides)}`);
  } else {
    console.log(`${slug || 'index'}: ok`);
  }
  await pg.close();
}
await b.close();
console.log(`\nTotal overflow at 320px: ${totalOverflow}`);
