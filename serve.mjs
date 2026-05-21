import http from 'http';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const PORT = 3000;

const mime = {
  html:  'text/html; charset=utf-8',
  css:   'text/css; charset=utf-8',
  js:    'application/javascript; charset=utf-8',
  mjs:   'application/javascript; charset=utf-8',
  json:  'application/json; charset=utf-8',
  png:   'image/png',
  jpg:   'image/jpeg',
  jpeg:  'image/jpeg',
  gif:   'image/gif',
  webp:  'image/webp',
  svg:   'image/svg+xml',
  ico:   'image/x-icon',
  mp4:   'video/mp4',
  webm:  'video/webm',
  ogv:   'video/ogg',
  mp3:   'audio/mpeg',
  woff2: 'font/woff2',
  woff:  'font/woff',
  ttf:   'font/ttf',
  otf:   'font/otf',
  pdf:   'application/pdf',
  txt:   'text/plain; charset=utf-8',
};

const server = http.createServer((req, res) => {
  const urlPath = req.url.split('?')[0];
  const safeUrl = decodeURIComponent(urlPath);
  const filePath = path.join(__dirname, safeUrl === '/' ? 'index.html' : safeUrl);

  let stat;
  try {
    stat = fs.statSync(filePath);
  } catch {
    res.writeHead(404, { 'Content-Type': 'text/plain' });
    res.end('Not found');
    return;
  }
  if (stat.isDirectory()) {
    res.writeHead(404, { 'Content-Type': 'text/plain' });
    res.end('Directory listing not supported');
    return;
  }

  const ext = path.extname(filePath).slice(1).toLowerCase();
  const type = mime[ext] || 'application/octet-stream';
  const size = stat.size;
  const range = req.headers.range;

  // HTTP Range request — required for <video> seeking in Chrome/Safari/Edge.
  // Without this, browsers can't scrub through .mp4 reliably.
  if (range) {
    const m = /^bytes=(\d*)-(\d*)$/.exec(range);
    if (!m) {
      res.writeHead(416, { 'Content-Range': `bytes */${size}` });
      res.end();
      return;
    }
    const start = m[1] === '' ? size - parseInt(m[2], 10) : parseInt(m[1], 10);
    const end   = m[2] === '' ? size - 1 : Math.min(parseInt(m[2], 10), size - 1);
    if (isNaN(start) || isNaN(end) || start > end || start >= size) {
      res.writeHead(416, { 'Content-Range': `bytes */${size}` });
      res.end();
      return;
    }
    res.writeHead(206, {
      'Content-Type':   type,
      'Content-Length': end - start + 1,
      'Content-Range':  `bytes ${start}-${end}/${size}`,
      'Accept-Ranges':  'bytes',
      'Cache-Control':  'no-cache',
    });
    fs.createReadStream(filePath, { start, end }).pipe(res);
    return;
  }

  // Full-file response with Accept-Ranges advertised so browsers know to
  // request ranges on subsequent requests.
  res.writeHead(200, {
    'Content-Type':   type,
    'Content-Length': size,
    'Accept-Ranges':  'bytes',
    'Cache-Control':  'no-cache',
  });
  fs.createReadStream(filePath).pipe(res);
});

server.listen(PORT, () => console.log(`Serving on http://localhost:${PORT}`));
