/* X-Ray Geoanalytics — Investors Page
   Canvas 2: Page-wide drifting contour lines (#iv-page-canvas, fixed)
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
        ctx.strokeStyle = 'rgba(232,185,99,' + (0.06 + i * 0.02) + ')';
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
        ctx.fillStyle = 'rgba(232,185,99,' + (frac * 0.11) + ')';
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
      gsap.set('.iv-hw-inner',    { y: '110%' });
      gsap.set('#iv-sub',         { opacity: 0, y: 20 });
      gsap.set('#iv-cta',         { opacity: 0, y: 16 });
      gsap.set('#iv-stats',       { opacity: 0, y: 24 });

      gsap.timeline({ delay: 0.15 })
        .to('.iv-hw-inner',  { y: '0%', duration: 1.0, ease: 'power4.out', stagger: 0.07 })
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

  /* Hero shade: fades from solid at the top to clear at the stat strip. */
  (function ivHeroShade() {
    var shade = document.querySelector('.iv-hero-fog-edges');
    var strip = document.getElementById('iv-stats') || document.querySelector('.iv-stat-strip');
    var hero = document.querySelector('.iv-hero');
    if (!shade || !strip || !hero) return;
    function fit() {
      var top = strip.getBoundingClientRect().top - hero.getBoundingClientRect().top;
      shade.style.height = Math.max(0, Math.round(top)) + 'px';
    }
    fit();
    window.addEventListener('resize', fit);
    window.addEventListener('load', fit);
  })();

  /* ── 3. PAGE CONTOURS ───────────────────────────────────────────────── */
  /* Drifting topographic contour lines behind the whole page. A light pool
     wanders over the map and brightens the contours under it. The drawing
     runs in a Web Worker on an OffscreenCanvas, so it never competes with
     scrolling; browsers without OffscreenCanvas draw on the main thread. */
  (function ivPageContours() {
    var pc = document.getElementById('iv-page-canvas');
    if (!pc) return;

    // Shared drawing code: runs inside the worker, or here as a fallback.
    function contourRenderer(canvas, reduced) {
      var cx = canvas.getContext('2d');
      var CELL = 26, W = 0, H = 0, dpr = 1, cols, rows, field, running = true;
      var LEVELS = [];
      for (var lvl = -1.2; lvl <= 1.21; lvl += 0.2) LEVELS.push(lvl);
      var raf = (typeof requestAnimationFrame === 'function')
        ? function (f) { return requestAnimationFrame(f); }
        : function (f) { return setTimeout(function () { f(performance.now()); }, 16); };

      function size(w, h, ratio) {
        W = w; H = h; dpr = ratio;
        canvas.width = Math.round(W * dpr); canvas.height = Math.round(H * dpr);
        cx.setTransform(dpr, 0, 0, dpr, 0, 0);
        cx.lineJoin = 'round'; cx.lineCap = 'round';
        cols = Math.ceil(W / CELL) + 2; rows = Math.ceil(H / CELL) + 2;
        field = new Float32Array(cols * rows);
      }
      function height(x, y, t) {
        return 0.55 * Math.sin(x * 0.0052 + t * 0.21) * Math.cos(y * 0.0047 - t * 0.17)
             + 0.35 * Math.sin((x + y) * 0.0074 - t * 0.29)
             + 0.25 * Math.cos(x * 0.0113 - y * 0.0063 + t * 0.37)
             + 0.15 * Math.sin(y * 0.014 + Math.sin(x * 0.005 + t * 0.2) * 2.0);
      }
      function lerp(a, b, lv) { return (lv - a) / (b - a); }

      var last = 0;
      function draw(ts) {
        if (!running) return;
        if (ts - last < 33 && last) { raf(draw); return; } // ~30 fps is plenty for this drift
        last = ts;
        var t = ts / 1000 * 0.33;
        for (var r = 0; r < rows; r++)
          for (var c = 0; c < cols; c++) field[r * cols + c] = height(c * CELL, r * CELL, t);

        cx.clearRect(0, 0, W, H);
        var lx = W * (0.5 + 0.38 * Math.sin(t * 0.13));
        var ly = H * (0.5 + 0.32 * Math.sin(t * 0.09 + 1.3));
        var glow = cx.createRadialGradient(lx, ly, 0, lx, ly, Math.max(W, H) * 0.55);
        glow.addColorStop(0, 'rgba(232,185,99,1)');
        glow.addColorStop(0.45, 'rgba(232,185,99,0.6)');
        glow.addColorStop(1, 'rgba(232,185,99,0.3)');

        for (var li = 0; li < LEVELS.length; li++) {
          var lv = LEVELS[li];
          cx.beginPath();
          for (var r2 = 0; r2 < rows - 1; r2++) {
            for (var c2 = 0; c2 < cols - 1; c2++) {
              var i0 = r2 * cols + c2;
              var a = field[i0], b = field[i0 + 1], d = field[i0 + cols], e = field[i0 + cols + 1];
              var code = (a > lv ? 8 : 0) | (b > lv ? 4 : 0) | (e > lv ? 2 : 0) | (d > lv ? 1 : 0);
              if (code === 0 || code === 15) continue;
              var x0 = c2 * CELL, y0 = r2 * CELL;
              var top = [x0 + CELL * lerp(a, b, lv), y0];
              var rgt = [x0 + CELL, y0 + CELL * lerp(b, e, lv)];
              var bot = [x0 + CELL * lerp(d, e, lv), y0 + CELL];
              var lft = [x0, y0 + CELL * lerp(a, d, lv)];
              var segs;
              switch (code) {
                case 1: case 14: segs = [lft, bot]; break;
                case 2: case 13: segs = [bot, rgt]; break;
                case 3: case 12: segs = [lft, rgt]; break;
                case 4: case 11: segs = [top, rgt]; break;
                case 6: case 9:  segs = [top, bot]; break;
                case 7: case 8:  segs = [lft, top]; break;
                case 5:  segs = [lft, top, bot, rgt]; break;
                case 10: segs = [lft, bot, top, rgt]; break;
              }
              for (var s = 0; s < segs.length; s += 2) {
                cx.moveTo(segs[s][0], segs[s][1]);
                cx.lineTo(segs[s + 1][0], segs[s + 1][1]);
              }
            }
          }
          // Index contours (every fourth level) are brighter and sky blue.
          var index = li % 4 === 2;
          cx.globalAlpha = index ? 0.42 : 0.34;
          cx.strokeStyle = index ? 'rgba(111,181,224,0.9)' : glow;
          cx.lineWidth = index ? 1.2 : 0.9;
          cx.stroke();
        }
        cx.globalAlpha = 1;
        if (!reduced) raf(draw);
      }
      return {
        size: size,
        start: function () { if (!running) { running = true; last = 0; } raf(draw); },
        stop: function () { running = false; }
      };
    }

    function viewport() {
      return { w: pc.offsetWidth, h: pc.offsetHeight, dpr: Math.min(1.5, window.devicePixelRatio || 1) };
    }

    var worker = null;
    if (pc.transferControlToOffscreen && window.Worker && window.Blob) {
      try {
        var src = 'var R=null;var mk=' + contourRenderer.toString() + ';' +
          'onmessage=function(e){var m=e.data;' +
          'if(m.type==="init"){R=mk(m.canvas,m.reduced);R.size(m.w,m.h,m.dpr);R.start();}' +
          'else if(m.type==="size"&&R){R.size(m.w,m.h,m.dpr);if(m.reduced)R.start();}' +
          'else if(m.type==="pause"&&R){R.stop();}' +
          'else if(m.type==="resume"&&R){R.start();}};';
        var url = URL.createObjectURL(new Blob([src], { type: 'text/javascript' }));
        worker = new Worker(url);
        var off = pc.transferControlToOffscreen();
        var v = viewport();
        worker.postMessage({ type: 'init', canvas: off, w: v.w, h: v.h, dpr: v.dpr, reduced: reducedMotion }, [off]);
      } catch (err) { worker = null; }
    }

    if (worker) {
      window.addEventListener('resize', function () {
        var v = viewport();
        worker.postMessage({ type: 'size', w: v.w, h: v.h, dpr: v.dpr, reduced: reducedMotion });
      });
      document.addEventListener('visibilitychange', function () {
        worker.postMessage({ type: document.hidden ? 'pause' : 'resume' });
      });
      return;
    }

    // Fallback: same drawing on the main thread.
    var R = contourRenderer(pc, reducedMotion);
    var v0 = viewport();
    R.size(v0.w, v0.h, v0.dpr);
    R.start();
    window.addEventListener('resize', function () {
      var v = viewport(); R.size(v.w, v.h, v.dpr); if (reducedMotion) R.start();
    });
    document.addEventListener('visibilitychange', function () { document.hidden ? R.stop() : R.start(); });
  })();

  /* ── 4. ACCURACY GAUGE ──────────────────────────────────────────────── */
  var gaugeWrap = document.getElementById('iv-gauge-wrap');
  var gaugeArc  = document.getElementById('iv-gauge-arc');
  if (gaugeWrap && gaugeArc) {
    var ARC_LEN = 2 * Math.PI * 80; // hexagon pie: circle r=80 drawn with a 160 stroke
    gaugeArc.style.strokeDasharray  = ARC_LEN;
    gaugeArc.style.strokeDashoffset = ARC_LEN;

    var gaugeObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          gaugeArc.style.strokeDashoffset = ARC_LEN * 0.05; // 95% recall
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
