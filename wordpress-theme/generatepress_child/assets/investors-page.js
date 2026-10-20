/* X-Ray Geoanalytics — Investors Page
   Canvas: page-wide drifting contour lines (#iv-page-canvas, fixed)
   GSAP:     hero reveal + extensive ScrollTrigger batches
   Enqueue with dependency: ['gsap-st']
*/

(function () {
  'use strict';

  var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ── 2. GSAP HERO REVEAL + SCROLL TRIGGERS ─────────────────────────── */
  if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);

    // GSAP writes inline `translate: none` (and rotate/scale) while it animates;
    // clear them once a card lands so its CSS hover lift (on `translate`) works.
    var freeHover = function (els) {
      els.forEach(function (el) {
        el.style.removeProperty('translate');
        el.style.removeProperty('rotate');
        el.style.removeProperty('scale');
      });
    };

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
          gsap.to(batch, { opacity: 1, y: 0, duration: 0.85, ease: 'power3.out', stagger: 0.13, overwrite: true,
            onComplete: function () { freeHover(batch); } });
        },
      });

      gsap.set('.iv-founder', { opacity: 0, y: 30, scale: 0.96 });
      ScrollTrigger.batch('.iv-founder', {
        interval: 0.08, batchMax: 5, start: 'top 90%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, y: 0, scale: 1, duration: 0.7, ease: 'power3.out', stagger: 0.09, overwrite: true,
            onComplete: function () { freeHover(batch); } });
        },
      });

      gsap.set('.iv-tl-step', { opacity: 0, x: -24 });
      ScrollTrigger.batch('.iv-tl-step', {
        interval: 0.15, batchMax: 1, start: 'top 85%',
        onEnter: function (batch) {
          gsap.to(batch, { opacity: 1, x: 0, duration: 0.75, ease: 'power3.out', overwrite: true });
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

  /* Without GSAP, or with reduced motion, draw the market bars at full length. */
  if (typeof gsap === 'undefined' || reducedMotion) {
    document.querySelectorAll('.iv-bar-fill[data-target-w]').forEach(function (fill) {
      fill.style.transition = 'none';
      fill.style.width = fill.getAttribute('data-target-w') + '%';
    });
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
      var CELL = 14, W = 0, H = 0, dpr = 1, cols, rows, field, running = true, pending = false;
      var LEVELS = [];
      for (var lvl = -1.2; lvl <= 1.21; lvl += 0.2) LEVELS.push(lvl);
      var tick = (typeof requestAnimationFrame === 'function')
        ? function (f) { return requestAnimationFrame(f); }
        : function (f) { return setTimeout(function () { f(performance.now()); }, 16); };
      // Only ever one frame queued, however often the tab is hidden and shown.
      function raf(f) {
        if (pending) return;
        pending = true;
        tick(function (ts) { pending = false; f(ts); });
      }

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
        if (!W || !H) { raf(draw); return; }
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
      return { w: pc.offsetWidth, h: pc.offsetHeight, dpr: Math.min(2, window.devicePixelRatio || 1) };
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
    if (reducedMotion || !('IntersectionObserver' in window)) {
      gaugeArc.style.transition = 'none';
      gaugeArc.style.strokeDashoffset = ARC_LEN * 0.05; // 95% recall
    } else {
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
  }

  /* ── 5. TIMELINE LINE DRAW-IN ───────────────────────────────────────── */
  var tlLine = document.getElementById('iv-tl-line');
  var timeline = document.getElementById('iv-timeline');
  if (tlLine && timeline) {
    var fitLine = function () {
      var icons = timeline.querySelectorAll('.iv-tl-icon');
      var last = icons[icons.length - 1];
      if (!last || getComputedStyle(tlLine).display === 'none') return;
      var step = last.parentNode;
      var centre = step.offsetTop + last.offsetTop + last.offsetHeight / 2;
      tlLine.style.bottom = Math.max(0, timeline.clientHeight - centre) + 'px';
    };
    fitLine();
    window.addEventListener('resize', fitLine);
    window.addEventListener('load', fitLine);
    if (document.fonts && document.fonts.ready) document.fonts.ready.then(fitLine);
  }
  if (tlLine && !reducedMotion && 'IntersectionObserver' in window) {
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

  window.__xrPageReady = true;

})();
