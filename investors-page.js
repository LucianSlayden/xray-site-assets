/* X-Ray Geoanalytics — Investors Page
   Canvas 1: Radar sweep with mineral blips (#iv-canvas, hero)
   Canvas 2: Page-wide grid dots (#iv-page-canvas, fixed)
   GSAP:     hero reveal + extensive ScrollTrigger batches
   Enqueue with dependency: ['gsap-st']
*/

(function () {
  'use strict';

  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ── 1. RADAR SWEEP CANVAS ─────────────────────────────────────────── */
  (function ivRadar() {
    var canvas = document.getElementById('iv-canvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var dpr = Math.min(2, window.devicePixelRatio || 1);
    var W, H, CX, CY, R;
    var PI2 = Math.PI * 2;

    function resize() {
      var rect = canvas.getBoundingClientRect();
      W = rect.width; H = rect.height;
      canvas.width  = W * dpr;
      canvas.height = H * dpr;
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
      CX = W * 0.67;
      CY = H * 0.50;
      R  = Math.min(W * 0.42, H * 0.55);
    }
    resize();
    window.addEventListener('resize', resize);

    var GOLD  = '#E8B963';
    var SKY   = '#6FB5E0';
    var MUTED = '#6F7B8B';

    var blips = [
      { a: 0.52, d: 0.72, sym: 'Li',  col: GOLD  },
      { a: 1.18, d: 0.55, sym: 'Cu',  col: GOLD  },
      { a: 2.00, d: 0.80, sym: 'Au',  col: GOLD  },
      { a: 2.45, d: 0.60, sym: 'Ni',  col: SKY   },
      { a: 3.10, d: 0.75, sym: 'REE', col: SKY   },
      { a: 3.80, d: 0.45, sym: 'Co',  col: SKY   },
      { a: 4.30, d: 0.68, sym: 'Li',  col: GOLD  },
      { a: 5.00, d: 0.52, sym: 'Au',  col: GOLD  },
      { a: 5.60, d: 0.78, sym: 'Cu',  col: SKY   },
      { a: 0.10, d: 0.38, sym: 'Pt',  col: MUTED },
      { a: 1.85, d: 0.88, sym: 'V',   col: MUTED },
      { a: 4.70, d: 0.30, sym: 'Mn',  col: MUTED },
    ];
    blips.forEach(function (b) { b.lastPing = -9999; });

    var SPEED  = reducedMotion ? 0 : 0.0042;
    var TRAIL  = Math.PI * 0.5;
    var FADE   = 2600;
    var sweep  = -Math.PI / 2;

    function normalizeA(a) { return ((a % PI2) + PI2) % PI2; }

    function drawFrame(ts) {
      ctx.clearRect(0, 0, W, H);

      for (var i = 1; i <= 4; i++) {
        ctx.beginPath();
        ctx.arc(CX, CY, R * i / 4, 0, PI2);
        ctx.strokeStyle = 'rgba(232,185,99,' + (0.03 + i * 0.013) + ')';
        ctx.lineWidth = 0.8;
        ctx.stroke();
      }

      ctx.strokeStyle = 'rgba(232,185,99,0.055)';
      ctx.lineWidth = 0.6;
      ctx.beginPath(); ctx.moveTo(CX - R * 1.05, CY); ctx.lineTo(CX + R * 1.05, CY); ctx.stroke();
      ctx.beginPath(); ctx.moveTo(CX, CY - R * 1.05); ctx.lineTo(CX, CY + R * 1.05); ctx.stroke();

      var segs = 28;
      for (var s = 0; s < segs; s++) {
        var frac = s / segs;
        var a0 = sweep - TRAIL * (1 - frac);
        var a1 = sweep - TRAIL * (1 - (s + 1) / segs);
        ctx.beginPath();
        ctx.moveTo(CX, CY);
        ctx.arc(CX, CY, R, a0, a1);
        ctx.closePath();
        ctx.fillStyle = 'rgba(232,185,99,' + (frac * 0.048) + ')';
        ctx.fill();
      }

      var ex = CX + Math.cos(sweep) * R;
      var ey = CY + Math.sin(sweep) * R;
      var sg = ctx.createLinearGradient(CX, CY, ex, ey);
      sg.addColorStop(0,   'rgba(232,185,99,0)');
      sg.addColorStop(0.5, 'rgba(232,185,99,0.28)');
      sg.addColorStop(1,   'rgba(232,185,99,0.90)');
      ctx.beginPath(); ctx.moveTo(CX, CY); ctx.lineTo(ex, ey);
      ctx.strokeStyle = sg; ctx.lineWidth = 1.5; ctx.stroke();

      var tipG = ctx.createRadialGradient(ex, ey, 0, ex, ey, 8);
      tipG.addColorStop(0, 'rgba(232,185,99,0.8)');
      tipG.addColorStop(1, 'rgba(232,185,99,0)');
      ctx.beginPath(); ctx.arc(ex, ey, 8, 0, PI2);
      ctx.fillStyle = tipG; ctx.fill();
      ctx.beginPath(); ctx.arc(ex, ey, 2.5, 0, PI2);
      ctx.fillStyle = 'rgba(232,185,99,0.95)'; ctx.fill();

      blips.forEach(function (b) {
        var normSweep = normalizeA(sweep);
        var normBlip  = normalizeA(b.a);
        var diff = normalizeA(normSweep - normBlip);
        if (diff < SPEED * 2.5 && (ts - b.lastPing) > 4000) {
          b.lastPing = ts;
        }

        var bx = CX + Math.cos(b.a) * R * b.d;
        var by = CY + Math.sin(b.a) * R * b.d;
        var age = ts - b.lastPing;

        if (age < FADE) {
          var t = age / FADE;
          var alpha = Math.max(0, 1 - t);

          var pingR = 4 + t * 28;
          var pCol = b.col === GOLD ? ('rgba(232,185,99,' + (alpha * 0.55) + ')')
                   : b.col === SKY  ? ('rgba(111,181,224,' + (alpha * 0.55) + ')')
                   :                   ('rgba(111,123,139,' + (alpha * 0.35) + ')');
          ctx.beginPath(); ctx.arc(bx, by, pingR, 0, PI2);
          ctx.strokeStyle = pCol; ctx.lineWidth = 1; ctx.stroke();

          var pingR2 = 4 + t * 14;
          ctx.beginPath(); ctx.arc(bx, by, pingR2, 0, PI2);
          ctx.strokeStyle = pCol; ctx.lineWidth = 0.6; ctx.stroke();

          var dotCol = b.col === GOLD ? ('rgba(232,185,99,' + alpha + ')')
                     : b.col === SKY  ? ('rgba(111,181,224,' + alpha + ')')
                     :                   ('rgba(168,178,192,' + (alpha * 0.55) + ')');
          ctx.beginPath(); ctx.arc(bx, by, 2.5, 0, PI2);
          ctx.fillStyle = dotCol; ctx.fill();

          if (t < 0.65) {
            ctx.font = '600 10px "JetBrains Mono", monospace';
            ctx.fillStyle = b.col === GOLD ? ('rgba(232,185,99,' + (alpha * 0.95) + ')')
                          : b.col === SKY  ? ('rgba(111,181,224,' + (alpha * 0.95) + ')')
                          :                   ('rgba(168,178,192,' + (alpha * 0.6)  + ')');
            ctx.fillText(b.sym, bx + 7, by - 7);
          }
        } else {
          ctx.beginPath(); ctx.arc(bx, by, 1.4, 0, PI2);
          ctx.fillStyle = b.col === GOLD ? 'rgba(232,185,99,0.22)'
                        : b.col === SKY  ? 'rgba(111,181,224,0.18)'
                        :                  'rgba(111,123,139,0.14)';
          ctx.fill();
        }
      });

      var hubG = ctx.createRadialGradient(CX, CY, 0, CX, CY, 12);
      hubG.addColorStop(0, 'rgba(232,185,99,0.7)');
      hubG.addColorStop(1, 'rgba(232,185,99,0)');
      ctx.beginPath(); ctx.arc(CX, CY, 12, 0, PI2);
      ctx.fillStyle = hubG; ctx.fill();
      ctx.beginPath(); ctx.arc(CX, CY, 3, 0, PI2);
      ctx.fillStyle = 'rgba(232,185,99,0.9)'; ctx.fill();

      sweep += SPEED;
      requestAnimationFrame(drawFrame);
    }

    var now = performance.now();
    blips.forEach(function (b, i) {
      b.lastPing = now - (b.a / PI2) * FADE - FADE * 0.4 * i;
    });

    requestAnimationFrame(drawFrame);
  })();

  /* ── 2. GSAP HERO REVEAL + SCROLL TRIGGERS ─────────────────────────── */
  if (typeof gsap !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);

    if (!reducedMotion) {
      gsap.set('#iv-eyebrow',     { opacity: 0, y: 16 });
      gsap.set('.iv-hw-inner',    { y: '110%' });
      gsap.set('#iv-sub',         { opacity: 0, y: 20 });
      gsap.set('#iv-cta',         { opacity: 0, y: 16 });
      gsap.set('#iv-stats',       { opacity: 0, y: 24 });

      gsap.timeline({ delay: 0.15 })
        .to('#iv-eyebrow',   { opacity: 1, y: 0, duration: 0.55, ease: 'power2.out' })
        .to('.iv-hw-inner',  { y: '0%', duration: 1.0, ease: 'power4.out', stagger: 0.07 }, '-=0.30')
        .to('#iv-sub',       { opacity: 1, y: 0, duration: 0.7,  ease: 'power2.out' }, '-=0.55')
        .to('#iv-cta',       { opacity: 1, y: 0, duration: 0.55, ease: 'power2.out' }, '-=0.50')
        .to('#iv-stats',     { opacity: 1, y: 0, duration: 0.6,  ease: 'power2.out' }, '-=0.40');

      gsap.set('.iv-tier', { opacity: 0, y: 40 });
      ScrollTrigger.batch('.iv-tier', {
        interval: 0.1, batchMax: 3, start: 'top 88%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, y: 0, duration: 0.85, ease: 'power3.out', stagger: 0.13, overwrite: true });
        },
      });

      gsap.set('.iv-founder', { opacity: 0, y: 30, scale: 0.96 });
      ScrollTrigger.batch('.iv-founder', {
        interval: 0.08, batchMax: 5, start: 'top 90%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, y: 0, scale: 1, duration: 0.7, ease: 'power3.out', stagger: 0.09, overwrite: true });
        },
      });

      gsap.set('.iv-tl-step', { opacity: 0, x: -24 });
      ScrollTrigger.batch('.iv-tl-step', {
        interval: 0.15, batchMax: 1, start: 'top 85%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, x: 0, duration: 0.75, ease: 'power3.out', overwrite: true });
        },
      });

      gsap.set('.iv-divider', { scaleX: 0 });
      ScrollTrigger.batch('.iv-divider', {
        start: 'top 92%',
        onEnter: function (batch) {
          gsap.to(batch, { scaleX: 1, duration: 1.2, ease: 'power3.out', stagger: 0.12, overwrite: true });
        },
      });

      gsap.set('.iv-bar-row', { opacity: 0, x: -44 });
      ScrollTrigger.create({
        trigger: '#iv-bars',
        start: 'top 86%',
        once: true,
        onEnter: function () {
          gsap.to('.iv-bar-row', { opacity: 1, x: 0, duration: 0.7, ease: 'power3.out', stagger: 0.14, overwrite: true,
            onComplete: function () {
              document.querySelectorAll('.iv-bar-fill[data-target-w]').forEach(function (fill) {
                fill.style.width = fill.getAttribute('data-target-w') + '%';
              });
            }
          });
        },
      });

      gsap.set('.iv-stack-row', { opacity: 0, x: -28 });
      ScrollTrigger.batch('.iv-stack-row', {
        start: 'top 90%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, x: 0, duration: 0.6, ease: 'power3.out', stagger: 0.1, overwrite: true });
        },
      });
      gsap.set('.iv-stack-arrow', { opacity: 0 });
      ScrollTrigger.batch('.iv-stack-arrow', {
        start: 'top 92%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, duration: 0.35, ease: 'power1.out', stagger: 0.1, overwrite: true });
        },
      });

      gsap.set('.iv-tag', { opacity: 0, y: 10 });
      ScrollTrigger.batch('.iv-tags', {
        start: 'top 92%',
        onEnter: function (els) {
          els.forEach(function (wrap) {
            gsap.to(wrap.querySelectorAll('.iv-tag'), {
              opacity: 1, y: 0, duration: 0.45, ease: 'power2.out', stagger: 0.08, overwrite: true,
            });
          });
        },
      });

      gsap.set('.iv-form-row', { opacity: 0, y: 16 });
      ScrollTrigger.batch('.iv-form-row', {
        start: 'top 94%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, y: 0, duration: 0.5, ease: 'power2.out', stagger: 0.1, overwrite: true });
        },
      });

      gsap.set('.iv-tl-icon', { opacity: 0, scale: 0.78 });
      ScrollTrigger.batch('.iv-tl-icon', {
        start: 'top 88%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, scale: 1, duration: 0.55, ease: 'back.out(1.4)', stagger: 0.14, overwrite: true });
        },
      });
    }
  }

  /* ── 3. PAGE GRID DOTS ──────────────────────────────────────────────── */
  (function ivPageDots() {
    var pc = document.getElementById('iv-page-canvas');
    if (!pc) return;
    var cx = pc.getContext('2d');
    var GRID = 54, W, H;

    function resize() {
      W = pc.width  = pc.offsetWidth;
      H = pc.height = pc.offsetHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    var SYMS = ['Li','Cu','Au','Ni','REE','Co','Pt','Ag','U','Zn','Mo','V','Mn','Sn','W','Pd'];
    var COLS = 30, ROWS = 190, COUNT = 160;
    var nodes = [], used = {}, tries = 0;
    while (nodes.length < COUNT && tries < 3000) {
      tries++;
      var c = Math.floor(Math.random() * COLS);
      var r = Math.floor(Math.random() * ROWS);
      var k = c + ',' + r;
      if (used[k]) continue;
      used[k] = true;
      var rv = Math.random();
      nodes.push({
        gx: c * GRID, gy: r * GRID,
        sym: SYMS[Math.floor(Math.random() * SYMS.length)],
        color: rv < 0.52 ? 'g' : rv < 0.82 ? 's' : 'm',
        pinging: false, pingStart: 0,
        nextPing: Math.random() * 5000,
        interval: 7000 + Math.random() * 11000,
      });
    }

    var PING_DUR = 1900;
    function rgba(n, a) {
      if (n.color === 'g') return 'rgba(232,185,99,'  + a.toFixed(3) + ')';
      if (n.color === 's') return 'rgba(111,181,224,' + a.toFixed(3) + ')';
      return                      'rgba(168,178,192,' + a.toFixed(3) + ')';
    }

    function drawDots(ts) {
      cx.clearRect(0, 0, W, H);
      var sy0 = window.scrollY || 0;

      for (var i = 0; i < nodes.length; i++) {
        var n = nodes[i];
        var sx = n.gx, sy = n.gy - sy0;
        if (sx < -60 || sx > W + 60 || sy < -60 || sy > H + 60) continue;

        if (!n.pinging && ts >= n.nextPing) {
          n.pinging = true; n.pingStart = ts;
          n.nextPing = ts + n.interval;
        }

        if (n.pinging) {
          var age = ts - n.pingStart;
          if (age >= PING_DUR) { n.pinging = false; }
          else {
            var p = age / PING_DUR, a = 1 - p;
            cx.beginPath(); cx.arc(sx, sy, 3 + p * 22, 0, Math.PI * 2);
            cx.strokeStyle = rgba(n, a * 0.42); cx.lineWidth = 0.9; cx.stroke();
            cx.beginPath(); cx.arc(sx, sy, 3 + p * 11, 0, Math.PI * 2);
            cx.strokeStyle = rgba(n, a * 0.28); cx.lineWidth = 0.6; cx.stroke();
            cx.beginPath(); cx.arc(sx, sy, 2.2, 0, Math.PI * 2);
            cx.fillStyle = rgba(n, Math.min(1, a * 1.3 + 0.15)); cx.fill();
            if (p < 0.58) {
              cx.font = '600 10px "JetBrains Mono",monospace';
              cx.fillStyle = rgba(n, a * 0.88);
              cx.fillText(n.sym, sx + 8, sy - 7);
            }
            continue;
          }
        }
        cx.beginPath(); cx.arc(sx, sy, 1.5, 0, Math.PI * 2);
        cx.fillStyle = rgba(n, 0.22); cx.fill();
      }
      if (!reducedMotion) requestAnimationFrame(drawDots);
    }
    requestAnimationFrame(drawDots);
  })();

  /* ── 4. ACCURACY GAUGE ──────────────────────────────────────────────── */
  var gaugeWrap = document.getElementById('iv-gauge-wrap');
  var gaugeArc  = document.getElementById('iv-gauge-arc');
  if (gaugeWrap && gaugeArc) {
    var ARC_LEN = 282.7;
    gaugeArc.style.strokeDasharray  = ARC_LEN;
    gaugeArc.style.strokeDashoffset = ARC_LEN;

    var gaugeObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          gaugeArc.style.strokeDashoffset = ARC_LEN * 0.1;
          gaugeObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });
    gaugeObs.observe(gaugeWrap);
  }

  /* ── 5. TIMELINE LINE DRAW-IN ───────────────────────────────────────── */
  var tlLine = document.getElementById('iv-tl-line');
  if (tlLine) {
    tlLine.style.transform = 'scaleY(0)';
    tlLine.style.transition = 'transform 1.8s cubic-bezier(0.22,1,0.36,1)';
    var lineObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          tlLine.style.transform = 'scaleY(1)';
          lineObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.05 });
    lineObs.observe(document.getElementById('iv-timeline') || tlLine);
  }

})();
