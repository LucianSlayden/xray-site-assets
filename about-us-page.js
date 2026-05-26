/* X-Ray Geoanalytics — About Us Page
   Canvas 1: 3D floating hex field (#ab-canvas, fixed full-viewport)
   Canvas 2: Drifting data particles (#ab-mission-canvas, hidden via CSS)
   Canvas 3: Animated hex-grid tessellation (#ab-prin-canvas, hidden via CSS)
   GSAP:     hero timeline + scroll reveals + principle/nav card batches
   Enqueue with dependency: ['gsap-st']
*/

/* ══ 3D FLOATING HEX FIELD ══════════════════════════════════════════════ */
(function () {
  'use strict';
  var canvas = document.getElementById('ab-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  if (!ctx) return;
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var W, H, CX, CY, FOV;
  function resize() {
    W   = canvas.offsetWidth  || window.innerWidth;
    H   = canvas.offsetHeight || window.innerHeight;
    canvas.width  = W;
    canvas.height = H;
    CX  = W * 0.5;
    CY  = H * 0.5;
    FOV = Math.max(W, H) * 0.52;
  }
  resize();
  window.addEventListener('resize', resize);

  function rotXYZ(v, rx, ry, rz) {
    var x = v[0], y = v[1], z = v[2], ny, nz, nx;
    ny = y * Math.cos(rx) - z * Math.sin(rx); nz = y * Math.sin(rx) + z * Math.cos(rx); y = ny; z = nz;
    nx = x * Math.cos(ry) + z * Math.sin(ry); nz = -x * Math.sin(ry) + z * Math.cos(ry); x = nx; z = nz;
    nx = x * Math.cos(rz) - y * Math.sin(rz); ny = x * Math.sin(rz) + y * Math.cos(rz);
    return [nx, ny, z];
  }
  function proj(v, cx, cy) {
    var d = v[2] + 68;
    if (d < 1) return null;
    var s = FOV / d;
    return [cx + v[0] * s, cy - v[1] * s, d];
  }

  function makePrism(r, h) {
    var verts = [], edges = [];
    for (var i = 0; i < 6; i++) {
      var a = Math.PI / 3 * i + Math.PI / 6;
      verts.push([r * Math.cos(a),  h * 0.5, r * Math.sin(a)]);
      verts.push([r * Math.cos(a), -h * 0.5, r * Math.sin(a)]);
    }
    for (var i = 0; i < 6; i++) {
      edges.push([i * 2,     ((i + 1) % 6) * 2]);
      edges.push([i * 2 + 1, ((i + 1) % 6) * 2 + 1]);
      edges.push([i * 2,     i * 2 + 1]);
    }
    return { verts: verts, edges: edges };
  }
  function makeRing(r) {
    var verts = [], edges = [];
    for (var i = 0; i < 6; i++) {
      var a = Math.PI / 3 * i + Math.PI / 6;
      verts.push([r * Math.cos(a), 0, r * Math.sin(a)]);
      edges.push([i, (i + 1) % 6]);
    }
    return { verts: verts, edges: edges };
  }

  var GOLD = '#E8B963', BLUE = '#6FB5E0';
  var shapes = [];
  function rnd(a, b) { return a + Math.random() * (b - a); }

  for (var i = 0; i < 18; i++) {
    shapes.push({
      geo: makePrism(rnd(1.2, 4.8), 0.14),
      pos: [rnd(-26, 26), rnd(-20, 20), rnd(-46, -5)],
      rot: [rnd(0, Math.PI * 2), rnd(0, Math.PI * 2), rnd(0, Math.PI * 2)],
      rv:  [rnd(-4e-4, 4e-4), rnd(-6e-4, 6e-4), rnd(-3e-4, 3e-4)],
      driftY: rnd(0, Math.PI * 2), driftS: rnd(0.28, 0.62), driftA: rnd(1.2, 2.8),
      color: Math.random() > 0.32 ? GOLD : BLUE,
      alpha: rnd(0.42, 0.85),
    });
  }
  for (var i = 0; i < 12; i++) {
    shapes.push({
      geo: makePrism(rnd(0.26, 0.78), rnd(3.5, 9.0)),
      pos: [rnd(-26, 26), rnd(-20, 20), rnd(-48, -8)],
      rot: [rnd(0, Math.PI * 2), rnd(0, Math.PI * 2), rnd(0, Math.PI * 2)],
      rv:  [rnd(-5e-4, 5e-4), rnd(-7e-4, 7e-4), rnd(-4e-4, 4e-4)],
      driftY: rnd(0, Math.PI * 2), driftS: rnd(0.20, 0.50), driftA: rnd(0.6, 1.8),
      color: Math.random() > 0.50 ? GOLD : BLUE,
      alpha: rnd(0.32, 0.72),
    });
  }
  for (var i = 0; i < 12; i++) {
    shapes.push({
      geo: makeRing(rnd(2.6, 8.0)),
      pos: [rnd(-26, 26), rnd(-20, 20), rnd(-48, -8)],
      rot: [rnd(0, Math.PI * 2), rnd(0, Math.PI * 2), rnd(0, Math.PI * 2)],
      rv:  [rnd(-3e-4, 3e-4), rnd(-5e-4, 5e-4), rnd(-2e-4, 2e-4)],
      driftY: rnd(0, Math.PI * 2), driftS: rnd(0.18, 0.44), driftA: rnd(1.0, 2.4),
      color: Math.random() > 0.40 ? GOLD : BLUE,
      alpha: rnd(0.32, 0.78),
    });
  }

  function drawShape(s, t, cx, cy) {
    var dy  = Math.sin(s.driftY + t * s.driftS) * s.driftA;
    var geo = s.geo, rot = s.rot, pos = s.pos;
    var pts = new Array(geo.verts.length);
    var sumD = 0, cnt = 0;
    for (var i = 0; i < geo.verts.length; i++) {
      var r = rotXYZ(geo.verts[i], rot[0], rot[1], rot[2]);
      var p = proj([r[0] + pos[0], r[1] + pos[1] + dy, r[2] + pos[2]], cx, cy);
      pts[i] = p;
      if (p) { sumD += p[2]; cnt++; }
    }
    if (!cnt) return;
    var avgD  = sumD / cnt;
    var fog   = avgD < 40 ? 1.0 : Math.max(0, 1 - (avgD - 40) / 50);
    var alpha = s.alpha * fog;
    if (alpha < 0.02) return;
    var lw = Math.max(0.5, Math.min(2.2, FOV / avgD * 0.014));
    ctx.save();
    ctx.strokeStyle  = s.color;
    ctx.globalAlpha  = alpha;
    ctx.lineWidth    = lw;
    ctx.lineCap      = 'round';
    for (var e = 0; e < geo.edges.length; e++) {
      var a = pts[geo.edges[e][0]], b = pts[geo.edges[e][1]];
      if (!a || !b) continue;
      ctx.beginPath();
      ctx.moveTo(a[0], a[1]);
      ctx.lineTo(b[0], b[1]);
      ctx.stroke();
    }
    ctx.restore();
  }

  var t = 0, lastTS = 0;
  function tick(ts) {
    var dt = Math.min((ts - lastTS) / 1000, 0.05);
    lastTS = ts;
    ctx.clearRect(0, 0, W, H);
    var cx = CX + (REDUCED ? 0 : Math.sin(t * 0.021) * 22);
    var cy = CY + (REDUCED ? 0 : Math.cos(t * 0.014) * 14);
    if (!REDUCED) {
      t += dt;
      for (var i = 0; i < shapes.length; i++) {
        var s = shapes[i];
        s.rot[0] += s.rv[0];
        s.rot[1] += s.rv[1];
        s.rot[2] += s.rv[2];
      }
    }
    var sorted = shapes.slice().sort(function (a, b) { return a.pos[2] - b.pos[2]; });
    for (var i = 0; i < sorted.length; i++) drawShape(sorted[i], t, cx, cy);
  }
  tick(0);
  function loop(ts) { requestAnimationFrame(loop); tick(ts); }
  requestAnimationFrame(loop);
}());

/* ══ MISSION CANVAS — Drifting data particles ═══════════════════════════ */
(function () {
  var canvas = document.getElementById('ab-mission-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var W, H;
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (REDUCED) return;

  var N = 68, particles = [];
  function makeParticle(startRandom) {
    return {
      x: Math.random() * (W || 1),
      y: startRandom ? Math.random() * (H || 1) : (H || 1) + 6,
      vy: -(0.18 + Math.random() * 0.44),
      vx: (Math.random() - 0.5) * 0.10,
      r:  0.7 + Math.random() * 1.7,
      alpha: 0.06 + Math.random() * 0.18,
      gold: Math.random() > 0.38,
    };
  }
  function init() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
    particles = [];
    for (var i = 0; i < N; i++) particles.push(makeParticle(true));
  }
  init();
  window.addEventListener('resize', init);

  function draw() {
    ctx.clearRect(0, 0, W, H);
    for (var i = 0; i < N; i++) {
      var p = particles[i];
      p.x += p.vx; p.y += p.vy;
      if (p.y < -6) particles[i] = makeParticle(false);
      if (p.x < -4) p.x = W + 4;
      if (p.x > W + 4) p.x = -4;
      var col = p.gold ? '232,185,99' : '111,181,224';
      ctx.fillStyle = 'rgba(' + col + ',' + p.alpha + ')';
      ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2); ctx.fill();
    }
    for (var i = 0; i < N; i++) {
      for (var j = i + 1; j < N; j++) {
        var dx = particles[i].x - particles[j].x;
        var dy = particles[i].y - particles[j].y;
        var dist = Math.sqrt(dx * dx + dy * dy);
        if (dist < 75) {
          var alpha = (1 - dist / 75) * 0.055;
          ctx.strokeStyle = 'rgba(232,185,99,' + alpha.toFixed(4) + ')';
          ctx.lineWidth = 0.35;
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.stroke();
        }
      }
    }
    requestAnimationFrame(draw);
  }
  draw();
}());

/* ══ PRINCIPLES CANVAS — Animated hex-grid tessellation ════════════════ */
(function () {
  var canvas = document.getElementById('ab-prin-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var W, H, t = 0;
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function resize() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
  }
  resize();
  window.addEventListener('resize', resize);

  function hexPath(cx, cy, r) {
    ctx.beginPath();
    for (var i = 0; i < 6; i++) {
      var angle = (i * 60 - 90) * Math.PI / 180;
      var x = cx + r * Math.cos(angle);
      var y = cy + r * Math.sin(angle);
      if (i === 0) ctx.moveTo(x, y); else ctx.lineTo(x, y);
    }
    ctx.closePath();
  }

  function draw() {
    ctx.clearRect(0, 0, W, H);
    var r    = 30;
    var colW = r * Math.sqrt(3);
    var rowH = r * 1.5;
    var cols = Math.ceil(W / colW) + 2;
    var rows = Math.ceil(H / rowH) + 2;
    for (var row = -1; row < rows; row++) {
      for (var col = -1; col < cols; col++) {
        var cx    = col * colW + (row % 2 === 0 ? 0 : colW * 0.5);
        var cy    = row * rowH;
        var phase = col * 0.28 + row * 0.55 + t;
        var alpha = 0.022 + Math.sin(phase) * 0.014 + 0.014;
        var isAlt = (Math.abs(col + row) % 3 === 0);
        var col32 = isAlt ? '111,181,224' : '232,185,99';
        hexPath(cx, cy, r - 1.5);
        ctx.strokeStyle = 'rgba(' + col32 + ',' + Math.max(0, alpha).toFixed(4) + ')';
        ctx.lineWidth = 0.5;
        ctx.stroke();
      }
    }
    if (!REDUCED) t += 0.0035;
    requestAnimationFrame(draw);
  }
  draw();
}());

/* ══ GSAP ANIMATIONS ════════════════════════════════════════════════════ */
(function () {
  gsap.registerPlugin(ScrollTrigger);
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReduced) {
    document.querySelectorAll(
      '#ab-eyebrow,#ab-lede,#ab-ctas,#ab-snapshot,.ab-hw-inner,' +
      '.ab-section-eyebrow,.ab-section-h2,.ab-section-p,' +
      '.ab-prin-card,.ab-nav-card'
    ).forEach(function (el) {
      el.style.opacity   = '1';
      el.style.transform = 'none';
    });
    return;
  }

  var heroTl = gsap.timeline({ delay: 0.15 });
  heroTl
    .to('#ab-eyebrow',  { opacity: 1, y: 0, duration: 0.55, ease: 'power2.out' })
    .to('.ab-hw-inner', { y: '0%',    duration: 1.0,  ease: 'power4.out', stagger: 0.10 }, '-=0.25')
    .to('#ab-lede',     { opacity: 1, y: 0, duration: 0.70, ease: 'power2.out' }, '-=0.55')
    .to('#ab-ctas',     { opacity: 1, y: 0, duration: 0.60, ease: 'power2.out' }, '-=0.50')
    .to('#ab-snapshot', { opacity: 1, y: 0, duration: 0.75, ease: 'power2.out' }, '-=0.55');

  function revealOnScroll(selectors) {
    selectors.forEach(function (sel) {
      gsap.utils.toArray(sel).forEach(function (el) {
        gsap.to(el, {
          opacity: 1, y: 0, duration: 0.70, ease: 'power2.out',
          scrollTrigger: { trigger: el, start: 'top 88%', once: true },
        });
      });
    });
  }
  revealOnScroll(['.ab-section-eyebrow', '.ab-section-h2', '.ab-section-p']);

  gsap.set('.ab-prin-card', { opacity: 0, y: 28 });
  ScrollTrigger.batch('.ab-prin-card', {
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.09, duration: 0.70, ease: 'power3.out' });
    },
    start: 'top 86%',
    once: true,
  });

  gsap.set('.ab-nav-card', { opacity: 0, y: 22 });
  ScrollTrigger.batch('.ab-nav-card', {
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.10, duration: 0.65, ease: 'power2.out' });
    },
    start: 'top 88%',
    once: true,
  });

  gsap.utils.toArray('.ab-info-box').forEach(function (el, i) {
    gsap.from(el, {
      opacity: 0, x: -28, duration: 0.70, ease: 'power2.out',
      scrollTrigger: { trigger: el, start: 'top 88%', once: true },
      delay: i * 0.12,
    });
  });

  gsap.utils.toArray('.ab-discipline-row').forEach(function (el, i) {
    gsap.from(el, {
      opacity: 0, y: 10, duration: 0.50, ease: 'power2.out',
      scrollTrigger: { trigger: el, start: 'top 90%', once: true },
      delay: i * 0.08,
    });
  });
}());
