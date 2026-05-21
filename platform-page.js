/* X-Ray Geoanalytics — Platform Page
   Canvas: Hex Probability Grid Scanner + GSAP scroll animations
   Enqueue with dependency: ['gsap-st']
*/

/* ══ Hex Probability Grid Scanner ══════════════════════════════════════ */
(function () {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  var canvas = document.getElementById('pf-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var W, H;
  var COLS = 16, ROWS = 9;
  var GX1, GX2, GY1, GY2;
  var HEX_R, HEX_W, HEX_ROW_H;
  var SCAN_SPEED = 68;
  var scanX = 0;
  var cells = [];
  var lastTs = 0;
  var rafId;

  function hexPath(cx, cy, r) {
    ctx.beginPath();
    for (var i = 0; i < 6; i++) {
      var a = Math.PI / 180 * (60 * i - 90);
      var x = cx + r * Math.cos(a);
      var y = cy + r * Math.sin(a);
      if (i === 0) ctx.moveTo(x, y); else ctx.lineTo(x, y);
    }
    ctx.closePath();
  }

  function hexCenter(c, row) {
    var x = GX1 + HEX_W / 2 + c * HEX_W + (row % 2 === 1 ? HEX_W / 2 : 0);
    var y = GY1 + HEX_R + row * HEX_ROW_H;
    return { x: x, y: y };
  }

  function calcHexR() {
    var GW = GX2 - GX1;
    var GH = GY2 - GY1;
    var rw = GW / (Math.sqrt(3) * (COLS + 0.5));
    var rh = GH / (0.5 + 1.5 * ROWS);
    HEX_R     = Math.min(rw, rh) * 0.90;
    HEX_W     = Math.sqrt(3) * HEX_R;
    HEX_ROW_H = 1.5 * HEX_R;
  }

  function initCells() {
    cells = [];
    for (var row = 0; row < ROWS; row++) {
      for (var c = 0; c < COLS; c++) {
        var pos = hexCenter(c, row);
        cells.push({
          col: c, row: row,
          cx: pos.x, cy: pos.y,
          score: 0.12 + Math.random() * 0.88,
          alpha: 0, lit: false,
          phase: Math.random() * Math.PI * 2
        });
      }
    }
  }

  function resize() {
    W   = canvas.width  = canvas.offsetWidth;
    H   = canvas.height = canvas.offsetHeight;
    GX1 = W * 0.30;
    GX2 = W * 0.97;
    GY1 = H * 0.08;
    GY2 = H * 0.92;
    calcHexR();
    initCells();
    scanX = GX1;
  }

  function frame(ts) {
    if (!lastTs) lastTs = ts;
    var dt = Math.min((ts - lastTs) / 1000, 0.05);
    lastTs = ts;

    ctx.clearRect(0, 0, W, H);

    scanX += SCAN_SPEED * dt;
    if (scanX > GX2 + 40) {
      scanX = GX1 - 20;
      cells.forEach(function (c) {
        c.score = 0.12 + Math.random() * 0.88;
        c.alpha = 0;
        c.lit   = false;
      });
    }

    var t = ts * 0.001;

    cells.forEach(function (c) {
      if (!c.lit && c.cx < scanX - 2) { c.lit = true; }
      if (c.lit) {
        var target = c.score * 0.70 + 0.08;
        c.alpha = Math.min(c.alpha + dt * 2.8, target + Math.sin(t * 0.55 + c.phase) * 0.05);
      }
    });

    cells.forEach(function (c) {
      if (c.lit) return;
      hexPath(c.cx, c.cy, HEX_R * 0.96);
      ctx.strokeStyle = 'rgba(232,185,99,0.07)';
      ctx.lineWidth   = 0.5;
      ctx.stroke();
    });

    cells.forEach(function (c) {
      if (c.alpha < 0.02) return;
      var r, g, b;
      if      (c.score >= 0.72) { r = 232; g = 185; b = 99;  }
      else if (c.score >= 0.42) { r = 111; g = 181; b = 224; }
      else                      { r = 168; g = 178; b = 192; }

      hexPath(c.cx, c.cy, HEX_R);
      ctx.fillStyle = 'rgba(' + r + ',' + g + ',' + b + ',' + (c.alpha * 0.15) + ')';
      ctx.fill();

      hexPath(c.cx, c.cy, HEX_R * 0.97);
      ctx.strokeStyle = 'rgba(' + r + ',' + g + ',' + b + ',' + (c.alpha * 0.55) + ')';
      ctx.lineWidth   = 0.75;
      ctx.stroke();

      if (c.alpha > 0.28 && HEX_R > 18 && c.score >= 0.42) {
        ctx.fillStyle    = 'rgba(' + r + ',' + g + ',' + b + ',' + Math.min(c.alpha * 1.3, 0.85) + ')';
        ctx.font         = '700 ' + Math.min(9.5, HEX_R * 0.28) + 'px "JetBrains Mono",monospace';
        ctx.textAlign    = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(Math.round(c.score * 100) + '%', c.cx, c.cy);
      }
    });

    if (scanX > GX1 - 30 && scanX < GX2 + 30) {
      var bw   = 28;
      var beam = ctx.createLinearGradient(scanX - bw, 0, scanX + bw, 0);
      beam.addColorStop(0,   'rgba(232,185,99,0)');
      beam.addColorStop(0.3, 'rgba(232,185,99,0.10)');
      beam.addColorStop(0.5, 'rgba(232,185,99,0.36)');
      beam.addColorStop(0.7, 'rgba(232,185,99,0.10)');
      beam.addColorStop(1,   'rgba(232,185,99,0)');
      ctx.fillStyle = beam;
      ctx.fillRect(scanX - bw, GY1, bw * 2, GY2 - GY1);

      ctx.strokeStyle = 'rgba(232,185,99,0.62)';
      ctx.lineWidth   = 1.2;
      ctx.beginPath();
      ctx.moveTo(scanX, GY1);
      ctx.lineTo(scanX, GY2);
      ctx.stroke();

      ctx.strokeStyle = 'rgba(232,185,99,0.90)';
      ctx.lineWidth   = 1.5;
      ctx.beginPath();
      ctx.moveTo(scanX - 5, GY1); ctx.lineTo(scanX + 5, GY1);
      ctx.moveTo(scanX - 5, GY2); ctx.lineTo(scanX + 5, GY2);
      ctx.stroke();
    }

    var prog = Math.max(0, Math.min(1, (scanX - GX1) / (GX2 - GX1)));
    ctx.fillStyle = 'rgba(232,185,99,0.07)';
    ctx.fillRect(GX1, GY2 + 10, GX2 - GX1, 2);
    ctx.fillStyle = 'rgba(232,185,99,0.42)';
    ctx.fillRect(GX1, GY2 + 10, (GX2 - GX1) * prog, 2);

    rafId = requestAnimationFrame(frame);
  }

  resize();
  window.addEventListener('resize', resize);
  requestAnimationFrame(frame);
  window.addEventListener('pagehide', function () { cancelAnimationFrame(rafId); });
}());

/* ══ GSAP Animations ════════════════════════════════════════════════════ */
(function () {
  gsap.registerPlugin(ScrollTrigger);

  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduced) {
    document.querySelectorAll('.pf-hw-inner').forEach(function (el) { el.style.transform = 'none'; });
    document.querySelectorAll('.pf-eyebrow-wrap,.pf-lede,.pf-cta-row,.pf-hero-stats,.pf-monitor').forEach(function (el) { el.style.opacity = 1; el.style.transform = 'none'; });
    document.querySelectorAll('.pf-mon-l-bar').forEach(function (b) { b.style.width = (b.dataset.w || '0') + '%'; });
    document.querySelectorAll('.pf-src-card,.pf-step-row,.pf-sec-card').forEach(function (el) { el.style.opacity = 1; el.style.transform = 'none'; });
    return;
  }

  var heroTl = gsap.timeline({ delay: 0.15, defaults: { ease: 'power3.out' } });
  heroTl
    .to('.pf-eyebrow-wrap',      { opacity: 1, duration: 0.5, ease: 'power2.out' })
    .to('.pf-hero .pf-hw-inner', { y: '0%', duration: 0.88, stagger: 0.065 }, '-=0.2')
    .to('.pf-lede',              { opacity: 1, y: 0, duration: 0.70, ease: 'power2.out' }, '-=0.35')
    .to('.pf-cta-row',           { opacity: 1, y: 0, duration: 0.60, ease: 'power2.out' }, '-=0.50')
    .to('.pf-hero-stats',        { opacity: 1, y: 0, duration: 0.60, ease: 'power2.out' }, '-=0.45')
    .to('#pf-monitor',           { opacity: 1, y: 0, duration: 0.90, ease: 'power2.out' }, '-=0.60');

  heroTl.call(function () {
    document.querySelectorAll('.pf-mon-l-bar').forEach(function (bar) {
      gsap.to(bar, { width: (bar.dataset.w || '0') + '%', duration: 1.1, ease: 'power2.out', delay: 0.05 });
    });
  });

  var scored  = 59;
  var total   = 94;
  var infBar  = document.getElementById('pf-inf-bar');
  var infMeta = document.getElementById('pf-inf-meta');
  var etaEl   = document.getElementById('pf-eta');
  var scoreEl = document.getElementById('pf-scored-count');
  var infStat = document.getElementById('pf-inf-status');
  var delStat = document.getElementById('pf-del-status');
  var delBar  = document.getElementById('pf-del-bar');

  var ticker = setInterval(function () {
    if (scored >= total) {
      clearInterval(ticker);
      infStat.textContent = 'COMPLETE';
      infStat.className   = 'pf-mon-l-status complete';
      infMeta.textContent = '100% · ' + total + ' / ' + total + ' parcels scored';
      delStat.textContent = 'RUNNING';
      delStat.className   = 'pf-mon-l-status running';
      gsap.to(delBar, { width: '100%', duration: 4.5, ease: 'power1.inOut', onComplete: function () {
        delStat.textContent = 'COMPLETE';
        delStat.className   = 'pf-mon-l-status complete';
      }});
      etaEl.textContent = '0s';
      return;
    }
    scored++;
    var pct       = Math.round(scored / total * 100);
    var remaining = total - scored;
    var etaS      = Math.round(remaining * 1.42);
    var m         = Math.floor(etaS / 60);
    var s         = etaS % 60;

    infBar.style.width  = pct + '%';
    infMeta.textContent = pct + '% · ' + scored + ' / ' + total + ' parcels scored';
    scoreEl.textContent = scored;
    etaEl.textContent   = (m > 0 ? m + 'm ' : '') + s + 's';
  }, 480);

  ScrollTrigger.batch('.pf-src-card', {
    start: 'top 88%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.10, duration: 0.65, ease: 'power2.out' });
    }
  });

  ScrollTrigger.batch('.pf-step-row', {
    start: 'top 88%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, x: 0, stagger: 0.09, duration: 0.65, ease: 'power2.out' });
    }
  });

  ScrollTrigger.batch('.pf-sec-card', {
    start: 'top 88%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, x: 0, stagger: 0.08, duration: 0.60, ease: 'power2.out' });
    }
  });
}());
