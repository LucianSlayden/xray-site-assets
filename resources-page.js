/* X-Ray Geoanalytics — Resources Page
   Canvas: Hex grid + particle constellation (fixed background)
   + scroll-reveal IntersectionObserver + nav behaviour
*/

/* ══ Hex grid + particle background canvas ══════════════════════════ */
(function () {
  'use strict';
  var canvas = document.getElementById('xr-anim-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var W, H, t = 0;
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var HEX_R = 52;
  var hexCells = [];

  function hexCorners(cx, cy, r) {
    var pts = [];
    for (var i = 0; i < 6; i++) {
      var a = (Math.PI / 180) * (60 * i);
      pts.push([cx + r * Math.cos(a), cy + r * Math.sin(a)]);
    }
    return pts;
  }

  function buildHexGrid() {
    hexCells = [];
    var colW = HEX_R * 1.5;
    var rowH = HEX_R * Math.sqrt(3);
    var cols = Math.ceil(W / colW) + 2;
    var rows = Math.ceil(H / rowH) + 2;
    for (var c = 0; c < cols; c++) {
      for (var r = 0; r < rows; r++) {
        var cx = c * colW - HEX_R;
        var cy = r * rowH + (c % 2 === 0 ? 0 : rowH * 0.5) - rowH;
        hexCells.push({ cx: cx, cy: cy, phase: Math.random() * Math.PI * 2, speed: 0.004 + Math.random() * 0.008, lit: Math.random() < 0.04, litT: 0 });
      }
    }
  }

  var N_PARTICLES = 70, particles = [], MAX_CONNECT = 160;

  function Particle() {
    this.x    = Math.random() * W;
    this.y    = Math.random() * H;
    this.vx   = (Math.random() - 0.5) * 0.22;
    this.vy   = (Math.random() - 0.5) * 0.22;
    this.gold = Math.random() > 0.4;
    this.r    = 0.8 + Math.random() * 1.4;
    this.phase = Math.random() * 6.2832;
    this.freq  = 0.014 + Math.random() * 0.018;
  }

  function initParticles() {
    particles = [];
    for (var i = 0; i < N_PARTICLES; i++) particles.push(new Particle());
  }

  function resize() {
    W = canvas.width  = window.innerWidth;
    H = canvas.height = window.innerHeight;
    buildHexGrid();
    initParticles();
  }

  var LIT_INTERVAL = 40, litTimer = 0;

  function draw() {
    requestAnimationFrame(draw);
    ctx.clearRect(0, 0, W, H);
    if (!REDUCED) t++;

    litTimer++;
    if (!REDUCED && litTimer >= LIT_INTERVAL) {
      litTimer = 0;
      var toLight = 1 + Math.floor(Math.random() * 2);
      for (var k = 0; k < toLight; k++) {
        var idx = Math.floor(Math.random() * hexCells.length);
        if (!hexCells[idx].lit) { hexCells[idx].lit = true; hexCells[idx].litT = 0; }
      }
    }

    for (var i = 0; i < hexCells.length; i++) {
      var cell = hexCells[i];
      var pts  = hexCorners(cell.cx, cell.cy, HEX_R - 1);
      if (cell.lit) {
        cell.litT++;
        var lt = cell.litT, al;
        if      (lt < 40)  al = (lt / 40) * 0.55;
        else if (lt < 100) al = 0.55;
        else if (lt < 140) al = ((140 - lt) / 40) * 0.55;
        else { cell.lit = false; al = 0; }
        if (al > 0) {
          ctx.beginPath(); ctx.moveTo(pts[0][0], pts[0][1]);
          for (var p = 1; p < 6; p++) ctx.lineTo(pts[p][0], pts[p][1]);
          ctx.closePath();
          ctx.strokeStyle = 'rgba(232,185,99,' + al + ')'; ctx.lineWidth = 1.2; ctx.stroke();
          ctx.fillStyle = 'rgba(232,185,99,' + (al * 0.06) + ')'; ctx.fill();
        }
      } else {
        var baseAl = 0.045 + 0.015 * Math.sin(cell.phase + t * cell.speed);
        ctx.beginPath(); ctx.moveTo(pts[0][0], pts[0][1]);
        for (var p = 1; p < 6; p++) ctx.lineTo(pts[p][0], pts[p][1]);
        ctx.closePath();
        ctx.strokeStyle = 'rgba(111,181,224,' + baseAl + ')'; ctx.lineWidth = 0.5; ctx.stroke();
      }
    }

    if (!REDUCED) {
      for (var i = 0; i < N_PARTICLES; i++) {
        var p = particles[i];
        p.x += p.vx; p.y += p.vy;
        if (p.x < -8) p.x = W + 8; if (p.x > W + 8) p.x = -8;
        if (p.y < -8) p.y = H + 8; if (p.y > H + 8) p.y = -8;
      }
    }

    for (var i = 0; i < N_PARTICLES; i++) {
      for (var j = i + 1; j < N_PARTICLES; j++) {
        var pi = particles[i], pj = particles[j];
        var dx = pi.x - pj.x, dy = pi.y - pj.y, d2 = dx*dx + dy*dy;
        if (d2 < MAX_CONNECT * MAX_CONNECT) {
          var d = Math.sqrt(d2), al = (1 - d / MAX_CONNECT) * 0.18;
          var col = (pi.gold && pj.gold) ? '232,185,99' : (!pi.gold && !pj.gold) ? '111,181,224' : '172,190,168';
          ctx.beginPath(); ctx.moveTo(pi.x, pi.y); ctx.lineTo(pj.x, pj.y);
          ctx.strokeStyle = 'rgba(' + col + ',' + al + ')'; ctx.lineWidth = 0.45; ctx.stroke();
        }
      }
    }

    for (var i = 0; i < N_PARTICLES; i++) {
      var p = particles[i];
      var tc = REDUCED ? 0 : t;
      var pulse = 0.70 + 0.30 * Math.sin(p.phase + tc * p.freq);
      var al = 0.50 + 0.40 * pulse, rad = p.r * (0.80 + 0.20 * pulse);
      var rgb = p.gold ? '232,185,99' : '111,181,224';
      var grd = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, rad * 6);
      grd.addColorStop(0, 'rgba(' + rgb + ',' + (al * 0.15) + ')');
      grd.addColorStop(1, 'rgba(' + rgb + ',0)');
      ctx.beginPath(); ctx.arc(p.x, p.y, rad * 6, 0, 6.2832); ctx.fillStyle = grd; ctx.fill();
      ctx.beginPath(); ctx.arc(p.x, p.y, rad, 0, 6.2832);
      ctx.fillStyle = 'rgba(' + rgb + ',' + al + ')'; ctx.fill();
    }
  }

  resize();
  window.addEventListener('resize', resize, { passive: true });
  draw();
}());

/* ══ Scroll-reveal (IntersectionObserver on .xr-reveal) ════════════ */
(function () {
  var els = document.querySelectorAll('.xr-reveal');
  if (!els.length) return;
  var obs = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) { entry.target.classList.add('in'); obs.unobserve(entry.target); }
    });
  }, { threshold: 0.08, rootMargin: '0px 0px -56px 0px' });
  els.forEach(function (el) { obs.observe(el); });
}());

/* ══ Nav scroll-state + mobile toggle ══════════════════════════════ */
(function () {
  var nav = document.querySelector('.xr-nav');
  if (nav) {
    var raf = null;
    function update() { raf = null; nav.classList.toggle('scrolled', window.scrollY > 24); }
    window.addEventListener('scroll', function () { if (!raf) raf = requestAnimationFrame(update); }, { passive: true });
    update();
  }
  var toggle = document.querySelector('.xr-nav-toggle');
  var mobile = document.querySelector('.xr-nav-mobile');
  if (toggle && mobile) {
    toggle.addEventListener('click', function () { mobile.classList.toggle('open'); });
    mobile.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', function () { mobile.classList.remove('open'); }); });
  }
}());
