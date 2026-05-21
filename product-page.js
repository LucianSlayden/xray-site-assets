/* X-Ray Geoanalytics — Product Page
   Canvas: Three-Layer Geological Scanner + GSAP scroll animations
   Enqueue with dependency: ['gsap-st']
*/

/* ══ Three-Layer Geological Scanner ════════════════════════════════════ */
(function () {
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var canvas  = document.getElementById('pdt-bg-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  if (!ctx) return;

  var COLS = 60, ROWS = 42, PF = 0.68, EMAX = 0.20;

  var LDEFS = [
    { yOff: 0.22,  alBase: 0.20, r: 111, g: 181, b: 224 },
    { yOff: 0.00,  alBase: 0.30, r: 148, g: 192, b: 218 },
    { yOff: -0.20, alBase: 0.46, r: 232, g: 185, b:  99 },
  ];

  var elevGrids = LDEFS.map(function (def, li) {
    var raw = [], mn = Infinity, mx = -Infinity;
    var ox = li * 3.7, oz = li * 2.1;
    for (var ri = 0; ri <= ROWS; ri++) {
      raw.push([]);
      for (var ci = 0; ci <= COLS; ci++) {
        var x = (ci / COLS - 0.5) * 9.0 + ox;
        var z = (ri / ROWS) * 6.5 + oz;
        var e = Math.sin(x * 0.80)          * 0.48
              + Math.sin(z * 0.65)          * 0.38
              + Math.sin((x + z) * 0.45)    * 0.26
              + Math.cos(x * 2.0 + z * 1.5) * 0.17
              + Math.cos(x * 0.30 + z * 0.42) * 0.40;
        raw[ri].push(e);
        if (e < mn) mn = e;
        if (e > mx) mx = e;
      }
    }
    var g = [];
    for (var ri = 0; ri <= ROWS; ri++) {
      g.push([]);
      for (var ci = 0; ci <= COLS; ci++) g[ri].push((raw[ri][ci] - mn) / (mx - mn));
    }
    return g;
  });

  var NP = 52;
  var ppx = new Float32Array(NP), ppy = new Float32Array(NP);
  var pvy = new Float32Array(NP), psz = new Float32Array(NP);
  var pal = new Float32Array(NP), pgl = new Uint8Array(NP);
  for (var i = 0; i < NP; i++) {
    ppx[i] = Math.random();
    ppy[i] = Math.random();
    pvy[i] = 0.00014 + Math.random() * 0.00018;
    psz[i] = 0.9 + Math.random() * 1.5;
    pal[i] = 0.22 + Math.random() * 0.38;
    pgl[i] = Math.random() > 0.5 ? 1 : 0;
  }

  var scanY = 0.28, scanDir = 1;

  function resize() {
    canvas.width  = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;
  }
  window.addEventListener('resize', resize);
  resize();

  var scrollP = 0, targetP = 0;
  window.addEventListener('scroll', function () {
    var max = document.documentElement.scrollHeight - window.innerHeight;
    targetP = max > 0 ? window.scrollY / max : 0;
  }, { passive: true });

  var t = 0;

  function frame() {
    requestAnimationFrame(frame);
    if (!REDUCED) {
      t       += 0.0018;
      scrollP += (targetP - scrollP) * 0.028;
      scanY   += scanDir * 0.00068;
      if (scanY > 0.86) { scanY = 0.86; scanDir = -1; }
      if (scanY < 0.06) { scanY = 0.06; scanDir =  1; }
      for (var i = 0; i < NP; i++) {
        ppy[i] -= pvy[i];
        if (ppy[i] < -0.03) { ppy[i] = 1.04 + Math.random() * 0.12; ppx[i] = Math.random(); }
      }
    }

    var W = canvas.width, H = canvas.height;
    ctx.clearRect(0, 0, W, H);

    var ep = scrollP < 0.5
      ? 2 * scrollP * scrollP
      : 1 - Math.pow(-2 * scrollP + 2, 2) / 2;

    var vpX    = W * 0.50 + Math.sin(t * 0.20) * W * 0.024;
    var vpY    = H * (0.07 + ep * 0.38);
    var base   = H * 1.08;
    var scanPxY = scanY * H;

    for (var li = 0; li < LDEFS.length; li++) {
      var ld   = LDEFS[li];
      var grid = elevGrids[li];
      var r0 = ld.r, g0 = ld.g, b0 = ld.b;
      var lYOff = ld.yOff * H;

      for (var ri = 0; ri <= ROWS; ri++) {
        var nd    = 1.0 - ri / ROWS;
        var ps    = 1.0 - nd * PF;
        var sy0   = vpY + (base - vpY) * (1.0 - nd) + lYOff;
        var dist  = Math.abs(sy0 - scanPxY);
        var boost = Math.max(0, 1 - dist / (H * 0.10));
        var al    = (0.52 - nd * 0.38) * ld.alBase;
        var finalAl = Math.min(0.90, al + boost * 0.50);

        ctx.beginPath();
        for (var ci = 0; ci <= COLS; ci++) {
          var ne0  = grid[ri][ci];
          var anim = Math.sin(t * 1.0 + ci * 0.15 + ri * 0.12 + li * 1.4) * 0.048
                   + Math.cos(t * 0.7 - ci * 0.10 + ri * 0.18 + li * 0.8) * 0.028;
          var ne   = Math.max(0, Math.min(1, ne0 + anim));
          var ePx  = ne * H * EMAX * ps;
          var sx   = vpX + (ci / COLS - 0.5) * W * ps;
          var sy   = sy0 - ePx;
          if (ci === 0) ctx.moveTo(sx, sy); else ctx.lineTo(sx, sy);
        }
        ctx.strokeStyle = 'rgba(' + r0 + ',' + g0 + ',' + b0 + ',' + finalAl + ')';
        ctx.lineWidth   = nd < 0.35 ? 0.45 : (0.70 + boost * 0.65);
        ctx.stroke();

        if (boost > 0.55) {
          for (var ci = 0; ci <= COLS; ci += 3) {
            var ne2  = Math.max(0, Math.min(1, grid[ri][ci]));
            var ePx2 = ne2 * H * EMAX * ps;
            var sxD  = vpX + (ci / COLS - 0.5) * W * ps;
            var syD  = sy0 - ePx2;
            ctx.beginPath();
            ctx.arc(sxD, syD, 1.4 * boost, 0, 6.2832);
            ctx.fillStyle = 'rgba(' + r0 + ',' + g0 + ',' + b0 + ',' + (boost * 0.7) + ')';
            ctx.fill();
          }
        }
      }

      if (li === LDEFS.length - 1) {
        for (var ci = 0; ci <= COLS; ci++) {
          ctx.beginPath();
          for (var ri2 = ROWS; ri2 >= 0; ri2--) {
            var nd2  = 1.0 - ri2 / ROWS;
            var ps2  = 1.0 - nd2 * PF;
            var ne2  = Math.max(0, Math.min(1, grid[ri2][ci]));
            var ePx2 = ne2 * H * EMAX * ps2;
            var sxC  = vpX + (ci / COLS - 0.5) * W * ps2;
            var syC  = vpY + (base - vpY) * (1.0 - nd2) + lYOff - ePx2;
            if (ri2 === ROWS) ctx.moveTo(sxC, syC); else ctx.lineTo(sxC, syC);
          }
          ctx.strokeStyle = 'rgba(' + r0 + ',' + g0 + ',' + b0 + ',0.12)';
          ctx.lineWidth   = 0.50;
          ctx.stroke();
        }
      }
    }

    var sg = ctx.createLinearGradient(0, scanPxY - 55, 0, scanPxY + 55);
    sg.addColorStop(0,    'rgba(232,185,99,0)');
    sg.addColorStop(0.35, 'rgba(232,185,99,0.030)');
    sg.addColorStop(0.50, 'rgba(232,185,99,0.075)');
    sg.addColorStop(0.65, 'rgba(232,185,99,0.030)');
    sg.addColorStop(1,    'rgba(232,185,99,0)');
    ctx.fillStyle = sg;
    ctx.fillRect(0, scanPxY - 55, W, 110);
    ctx.beginPath();
    ctx.moveTo(0, scanPxY); ctx.lineTo(W, scanPxY);
    ctx.strokeStyle = 'rgba(232,185,99,0.14)';
    ctx.lineWidth = 1.0;
    ctx.stroke();

    for (var i = 0; i < NP; i++) {
      var px2 = ppx[i] * W, py2 = ppy[i] * H;
      var ns  = Math.max(0, 1 - Math.abs(py2 - scanPxY) / (H * 0.13));
      var a2  = pal[i] * (0.45 + ns * 0.55);
      ctx.fillStyle = pgl[i] === 1
        ? 'rgba(232,185,99,' + a2.toFixed(2) + ')'
        : 'rgba(111,181,224,' + a2.toFixed(2) + ')';
      ctx.beginPath();
      ctx.arc(px2, py2, psz[i] * (1 + ns * 0.6), 0, 6.2832);
      ctx.fill();
    }
  }

  frame();
}());

/* ══ GSAP animations ════════════════════════════════════════════════════ */
(function () {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    document.querySelectorAll('.pdt-hw-inner').forEach(function (el) { el.style.transform = 'translateY(0)'; });
    document.querySelectorAll('.pdt-lede,.pdt-cta-row,.pdt-hero-stats,.pdt-output-panel').forEach(function (el) { el.style.opacity = '1'; });
    document.querySelectorAll('.pdt-arch-card,.pdt-proof-stat,.pdt-proof-quote,.pdt-status-row').forEach(function (el) { el.style.opacity = '1'; el.style.transform = 'none'; });
    return;
  }

  gsap.registerPlugin(ScrollTrigger);

  var tl = gsap.timeline({ defaults: { ease: 'power3.out' } });
  tl.from('.pdt-eyebrow-wrap .xr-eyebrow', { y: 22, opacity: 0, duration: 0.6 })
    .to('.pdt-hw-inner',    { y: '0%', duration: 0.72, stagger: 0.065, ease: 'power3.out' }, '-=0.4')
    .to('.pdt-lede',        { opacity: 1, y: 0, duration: 0.7,  ease: 'power2.out' }, '-=0.35')
    .to('.pdt-cta-row',     { opacity: 1, y: 0, duration: 0.6,  ease: 'power2.out' }, '-=0.5')
    .to('.pdt-hero-stats',  { opacity: 1, y: 0, duration: 0.6,  ease: 'power2.out' }, '-=0.45')
    .to('#pdt-op',          { opacity: 1, y: 0, duration: 0.9,  ease: 'power2.out' }, '-=0.55');

  tl.add(function () {
    document.querySelectorAll('.pdt-op-bar-fill[data-w]').forEach(function (el, i) {
      setTimeout(function () { el.style.width = el.dataset.w + '%'; }, i * 120 + 200);
    });
  });

  ScrollTrigger.batch('.pdt-arch-card',  { start: 'top 86%', onEnter: function (b) { gsap.to(b, { opacity: 1, y: 0, stagger: 0.15, duration: 0.70, ease: 'power2.out' }); } });
  ScrollTrigger.batch('.pdt-proof-stat', { start: 'top 88%', onEnter: function (b) { gsap.to(b, { opacity: 1, y: 0, stagger: 0.12, duration: 0.68, ease: 'power2.out' }); } });
  ScrollTrigger.create({ trigger: '.pdt-proof-quote', start: 'top 88%', onEnter: function () { gsap.to('.pdt-proof-quote', { opacity: 1, y: 0, duration: 0.7, ease: 'power2.out' }); } });
  ScrollTrigger.batch('.pdt-status-row', { start: 'top 88%', onEnter: function (b) { gsap.to(b, { opacity: 1, x: 0, stagger: 0.10, duration: 0.65, ease: 'power2.out' }); } });
  ScrollTrigger.batch('.xr-reveal',      { start: 'top 88%', onEnter: function (b) { gsap.to(b, { opacity: 1, y: 0, stagger: 0.08, duration: 0.6,  ease: 'power2.out' }); } });
}());
