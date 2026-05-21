import puppeteer from 'puppeteer';

const pages = [
  'index', 'investors', 'our-team', 'our-models', 'product', 'how-it-works',
  'industries', 'platform', 'pricing', 'why-xray', 'faqs', 'news-updates',
  'resources', 'request-demo', 'about-us',
];

const browser = await puppeteer.launch({
  headless: 'new',
  executablePath: 'C:\\Program Files\\Google\\Chrome\\Application\\chrome.exe',
  args: ['--no-sandbox', '--disable-setuid-sandbox', '--use-gl=swiftshader'],
});

let totalErrors = 0;

for (const page of pages) {
  const p = await browser.newPage();
  const errors = [];
  const failedReqs = [];
  p.on('console', (m) => { if (m.type() === 'error') errors.push(m.text()); });
  p.on('pageerror', (e) => errors.push('JS ERROR: ' + e.message));
  p.on('requestfailed', (r) => failedReqs.push(`${r.url()} (${r.failure()?.errorText})`));

  await p.goto(`http://localhost:3000/${page}.html`, { waitUntil: 'networkidle2', timeout: 30000 });
  await new Promise((r) => setTimeout(r, 600));

  // Collect anchor href targets for cross-link audit
  const linkInfo = await p.evaluate(() => {
    const internal = Array.from(document.querySelectorAll('a[href]'))
      .map((a) => a.getAttribute('href'))
      .filter((h) => h && !h.startsWith('http') && !h.startsWith('mailto:') && !h.startsWith('#'));
    return [...new Set(internal)];
  });

  const issues = [];
  if (errors.length) issues.push(`${errors.length} console errors: ${errors.slice(0,3).join(' | ')}`);
  if (failedReqs.length) issues.push(`${failedReqs.length} failed requests: ${failedReqs.slice(0,3).join(' | ')}`);
  totalErrors += errors.length + failedReqs.length;

  console.log(`${page}: ${issues.length ? '✗ ' + issues.join('; ') : '✓ clean'} (${linkInfo.length} internal links)`);

  await p.close();
}

await browser.close();
console.log(`\nTotal issues found: ${totalErrors}`);
