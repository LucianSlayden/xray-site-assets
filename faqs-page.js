/* X-Ray Geoanalytics — FAQs Page
   Canvas: Full-page Hexagon Probability Grid (position:fixed) + GSAP scroll animations
   Enqueue with dependency: ['gsap-st']
*/

/* ══ Full-page Hexagon Probability Canvas ════════════════════════════ */
(function () {
  'use strict';
  var canvas = document.getElementById('fq-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var W, H;

  var R     = 18;
  var HEX_DX = R * Math.sqrt(3);
  var HEX_DY = R * 1.5;

  var HSC = [
    { nx: 0.14, ny: 0.22, pk: 0.94, sg: 0.13 },
    { nx: 0.74, ny: 0.17, pk: 0.88, sg: 0.11 },
    { nx: 0.42, ny: 0.54, pk: 0.80, sg: 0.14 },
    { nx: 0.88, ny: 0.62, pk: 0.68, sg: 0.09 },
    { nx: 0.24, ny: 0.76, pk: 0.84, sg: 0.12 },
    { nx: 0.60, ny: 0.36, pk: 0.55, sg: 0.08 },
  ];

  function hotProb(nx, ny) {
    var p = 0;
    for (var i = 0; i < HSC.length; i++) {
      var h = HSC[i], dx = nx - h.nx, dy = ny - h.ny;
      var c = h.pk * Math.exp(-(dx * dx + dy * dy) / (2 * h.sg * h.sg));
      if (c > p) p = c;
    }
    return Math.min(1, p);
  }

  var SYMS_HIGH = ['Au', 'Cu', 'REE'];
  var SYMS_MED  = ['Ni', 'Co', 'Mo', 'Pt'];

  var cells = [];
  function buildCells() {
    cells = [];
    var COLS = Math.ceil(W / HEX_DX) + 2;
    var ROWS = Math.ceil(H / HEX_DY) + 2;
    for (var r = 0; r < ROWS; r++) {
      for (var c = 0; c < COLS; c++) {
        var cx = c * HEX_DX + (r % 2 === 1 ? HEX_DX * 0.5 : 0) + HEX_DX * 0.5;
        var cy = r * HEX_DY + R;
        var v  = hotProb(cx / W, cy / H);
        var sym = null;
        if (v > 0.78 && Math.random() < 0.45) sym = SYMS_HIGH[Math.floor(Math.random() * SYMS_HIGH.length)];
        else if (v > 0.52 && Math.random() < 0.20) sym = SYMS_MED[Math.floor(Math.random() * SYMS_MED.length)];
        cells.push({
          cx: cx, cy: cy, v: v, sym: sym,
          ph: Math.random() * Math.PI * 2,
          spd: 0.22 + Math.random() * 0.30,
          ring: v > 0.72 && Math.random() < 0.45,
        });
      }
    }
  }

  function resize() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
    buildCells();
  }
  resize();
  window.addEventListener('resize', resize);

  function hexPath(cx, cy, r) {
    ctx.beginPath();
    for (var i = 0; i < 6; i++) {
      var a = (Math.PI / 180) * (60 * i + 90);
      var px = cx + r * Math.cos(a);
      var py = cy + r * Math.sin(a);
      if (i === 0) ctx.moveTo(px, py); else ctx.lineTo(px, py);
    }
    ctx.closePath();
  }

  function probRGB(v) {
    var r, g, b;
    if (v < 0.15) {
      r = 8; g = 14; b = 20;
    } else if (v < 0.50) {
      var t = (v - 0.15) / 0.35;
      r = Math.round(8   + t * 224);
      g = Math.round(14  + t * 171);
      b = Math.round(20  + t * 69);
    } else if (v < 0.72) {
      r = 232; g = 185; b = 89;
    } else {
      var t2 = (v - 0.72) / 0.28;
      r = Math.round(232 - t2 * 100);
      g = Math.round(185 - t2 * 80);
      b = Math.round(89  - t2 * 50);
    }
    return [r, g, b];
  }

  function cellAlpha(v) {
    if (v < 0.08) return 0.04;
    if (v < 0.20) return 0.04 + (v - 0.08) / 0.12 * 0.14;
    if (v < 0.50) return 0.18 + (v - 0.20) / 0.30 * 0.54;
    return 0.72 + (v - 0.50) / 0.50 * 0.10;
  }

  var sweepX = 0.0, sweepDir = 1;
  var SWEEP_SPD = REDUCED ? 0 : 0.0022;

  function draw(ts) {
    ctx.clearRect(0, 0, W, H);
    var t = ts * 0.001;

    if (!REDUCED) {
      sweepX += SWEEP_SPD * sweepDir;
      if (sweepX >= 1) { sweepX = 1; sweepDir = -1; }
      if (sweepX <= 0) { sweepX = 0; sweepDir =  1; }
    }
    var sx = sweepX * W;

    ctx.font = 'bold 8px "JetBrains Mono",monospace';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';

    for (var i = 0; i < cells.length; i++) {
      var cell = cells[i];
      var v    = cell.v;
      var pulse = REDUCED ? 0 : Math.sin(t * cell.spd + cell.ph) * 0.06;
      var alp   = Math.max(0.02, Math.min(0.82, cellAlpha(v) + pulse));
      var rgb   = probRGB(v);
      var sweepMod = (cell.cx > sx + 2) ? 0.72 : 1.0;

      hexPath(cell.cx, cell.cy, R - 1);
      ctx.fillStyle = 'rgba(' + rgb[0] + ',' + rgb[1] + ',' + rgb[2] + ',' + (alp * sweepMod).toFixed(3) + ')';
      ctx.fill();

      var ba = Math.max(0.04, v * 0.24) * sweepMod;
      hexPath(cell.cx, cell.cy, R - 1);
      ctx.strokeStyle = 'rgba(232,185,99,' + ba.toFixed(3) + ')';
      ctx.lineWidth = 0.5;
      ctx.stroke();

      if (cell.sym && v > 0.52 && sweepMod > 0.9) {
        var la = Math.min(0.88, (v - 0.52) / 0.35 * 0.88);
        ctx.fillStyle = v > 0.80
          ? 'rgba(255,235,160,' + la.toFixed(3) + ')'
          : 'rgba(232,185,99,'  + la.toFixed(3) + ')';
        ctx.fillText(cell.sym, cell.cx, cell.cy);
      }

      if (!REDUCED && cell.ring && sweepMod > 0.9) {
        var p  = (Math.sin(t * cell.spd * 0.65 + cell.ph) + 1) / 2;
        var pr = R * 0.75 + p * R * 0.85;
        ctx.beginPath();
        ctx.arc(cell.cx, cell.cy, pr, 0, Math.PI * 2);
        ctx.strokeStyle = 'rgba(232,185,99,' + (0.22 * (1 - p)).toFixed(3) + ')';
        ctx.lineWidth = 0.8;
        ctx.stroke();
      }
    }

    var glowG = ctx.createLinearGradient(sx - 28, 0, sx + 28, 0);
    glowG.addColorStop(0,   'rgba(232,185,99,0)');
    glowG.addColorStop(0.5, 'rgba(232,185,99,0.055)');
    glowG.addColorStop(1,   'rgba(232,185,99,0)');
    ctx.fillStyle = glowG;
    ctx.fillRect(sx - 28, 0, 56, H);

    var lineG = ctx.createLinearGradient(0, 0, 0, H);
    lineG.addColorStop(0,   'rgba(232,185,99,0)');
    lineG.addColorStop(0.2, 'rgba(232,185,99,0.38)');
    lineG.addColorStop(0.8, 'rgba(232,185,99,0.38)');
    lineG.addColorStop(1,   'rgba(232,185,99,0)');
    ctx.fillStyle = lineG;
    ctx.fillRect(sx - 0.5, 0, 1, H);

    requestAnimationFrame(draw);
  }
  requestAnimationFrame(draw);
}());

/* ══ GSAP Animations ════════════════════════════════════════════════ */
(function () {
  gsap.registerPlugin(ScrollTrigger);
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReduced) {
    document.querySelectorAll(
      '#fq-eyebrow,#fq-lede,.fq-hw-inner,.fq-side-card,.fq-sr'
    ).forEach(function (el) {
      el.style.opacity = '1';
      el.style.transform = 'none';
    });
    return;
  }

  gsap.timeline({ delay: 0.10 })
    .to('#fq-eyebrow', { opacity: 1, y: 0, duration: 0.5,  ease: 'power2.out' })
    .to('.fq-hw-inner', { y: '0%', duration: 0.95, ease: 'power4.out', stagger: 0.12 }, '-=0.20')
    .to('#fq-lede',    { opacity: 1, y: 0, duration: 0.65, ease: 'power2.out' }, '-=0.50');

  gsap.utils.toArray('.fq-sr').forEach(function (el) {
    gsap.to(el, {
      opacity: 1, y: 0, duration: 0.60, ease: 'power2.out',
      scrollTrigger: { trigger: el, start: 'top 88%', once: true }
    });
  });

  ScrollTrigger.batch('.fq-side-card', {
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.12, duration: 0.65, ease: 'power2.out' });
    },
    start: 'top 88%', once: true
  });
}());
