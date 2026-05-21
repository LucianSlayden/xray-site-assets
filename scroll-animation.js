/* X-Ray Geoanalytics — Shared Animation Layer
   Loaded by every page. Powers reveal-on-scroll, counters, nav scroll-state,
   mobile menu toggle, and any other animation that isn't the hero scroll-scrub
   (that lives in xray-hero.js).
   Production deploy: merged into wordpress-deploy/scroll-animation.js. */

(function () {
  'use strict';

  // ─── 1. REVEAL ON SCROLL ─────────────────────────────────────────────
  const revealEls = document.querySelectorAll('.xr-reveal');
  if (revealEls.length) {
    const obs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -56px 0px' });
    revealEls.forEach((el) => obs.observe(el));
  }

  // ─── 2. NUMERIC COUNTERS ─────────────────────────────────────────────
  function animateCount(el) {
    const target = parseFloat(el.dataset.target);
    if (!Number.isFinite(target)) return;
    const prefix = el.dataset.prefix || '';
    const suffix = el.dataset.suffix || '';
    const decimals = el.dataset.decimals ? parseInt(el.dataset.decimals, 10) : (Number.isInteger(target) ? 0 : 1);
    const duration = parseInt(el.dataset.duration, 10) || 1800;
    const start = performance.now();
    function tick(now) {
      const p = Math.min((now - start) / duration, 1);
      const ease = 1 - Math.pow(1 - p, 3);
      const val = (target * ease).toFixed(decimals);
      el.textContent = prefix + val + suffix;
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }
  const countEls = document.querySelectorAll('[data-target]');
  if (countEls.length) {
    const countObs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCount(entry.target);
          countObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.45 });
    countEls.forEach((el) => countObs.observe(el));
  }

  // ─── 3. PROGRESS BARS (data-bar-fill) ────────────────────────────────
  const bars = document.querySelectorAll('[data-bar-fill]');
  if (bars.length) {
    const barObs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const pct = entry.target.dataset.barFill;
          entry.target.style.width = pct + '%';
          barObs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });
    bars.forEach((el) => barObs.observe(el));
  }

  // ─── 4. NAV SCROLL STATE ─────────────────────────────────────────────
  const nav = document.querySelector('.xr-nav');
  if (nav) {
    let raf = null;
    function update() {
      raf = null;
      if (window.scrollY > 24) nav.classList.add('scrolled');
      else nav.classList.remove('scrolled');
    }
    window.addEventListener('scroll', () => {
      if (raf == null) raf = requestAnimationFrame(update);
    }, { passive: true });
    update();
  }

  // ─── 5. MOBILE NAV TOGGLE ───────────────────────────────────────────
  const toggle = document.querySelector('.xr-nav-toggle');
  const mobile = document.querySelector('.xr-nav-mobile');
  if (toggle && mobile) {
    toggle.addEventListener('click', () => mobile.classList.toggle('open'));
    mobile.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => mobile.classList.remove('open')));
  }

  // ─── 6. HEX PROBABILITY GRID (canvas demo) ───────────────────────────
  // Reusable across any page that places a <canvas data-xr-hex-grid> element.
  document.querySelectorAll('canvas[data-xr-hex-grid]').forEach((canvas) => {
    const ctx = canvas.getContext('2d');
    const dpr = Math.max(1, window.devicePixelRatio || 1);

    function resize() {
      const rect = canvas.getBoundingClientRect();
      canvas.width = rect.width * dpr;
      canvas.height = rect.height * dpr;
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }
    resize();
    window.addEventListener('resize', resize);

    const hexW = parseFloat(canvas.dataset.hexW) || 44;
    const hexH = hexW * 0.866;
    let cells = [];

    function build() {
      const rect = canvas.getBoundingClientRect();
      const cols = Math.ceil(rect.width / (hexW * 0.75)) + 2;
      const rows = Math.ceil(rect.height / hexH) + 2;
      cells = [];
      const focalX = parseFloat(canvas.dataset.focalX) || 0.62;
      const focalY = parseFloat(canvas.dataset.focalY) || 0.48;
      for (let r = 0; r < rows; r++) {
        for (let c = 0; c < cols; c++) {
          const cx = c * hexW * 0.75 + (r % 2 ? hexW * 0.375 : 0);
          const cy = r * hexH * 0.5;
          const dx = cx / rect.width - focalX;
          const dy = cy / rect.height - focalY;
          const dist = Math.sqrt(dx * dx + dy * dy);
          const prob = Math.max(0, 1 - dist * 2.2 + (Math.random() - 0.5) * 0.32);
          cells.push({ cx, cy, prob, phase: Math.random() * Math.PI * 2, speed: 0.35 + Math.random() * 0.6 });
        }
      }
    }
    build();
    window.addEventListener('resize', build);

    function drawHex(x, y, w, h) {
      const hw = w / 2, hh = h / 2;
      ctx.beginPath();
      ctx.moveTo(x - hw * 0.5, y - hh);
      ctx.lineTo(x + hw * 0.5, y - hh);
      ctx.lineTo(x + hw, y);
      ctx.lineTo(x + hw * 0.5, y + hh);
      ctx.lineTo(x - hw * 0.5, y + hh);
      ctx.lineTo(x - hw, y);
      ctx.closePath();
    }

    let t = 0;
    function draw() {
      const rect = canvas.getBoundingClientRect();
      ctx.clearRect(0, 0, rect.width, rect.height);
      t += 0.012;
      cells.forEach((cell) => {
        const pulse = Math.sin(t * cell.speed + cell.phase) * 0.16;
        const alpha = Math.max(0, Math.min(1, cell.prob + pulse));
        if (alpha < 0.05) return;
        drawHex(cell.cx, cell.cy, hexW - 3, hexH - 3);
        if (alpha > 0.55) {
          const grad = ctx.createRadialGradient(cell.cx, cell.cy, 0, cell.cx, cell.cy, hexW * 0.6);
          grad.addColorStop(0, `rgba(232,185,99,${alpha * 0.9})`);
          grad.addColorStop(1, `rgba(232,185,99,${alpha * 0.35})`);
          ctx.fillStyle = grad;
          ctx.fill();
          ctx.strokeStyle = `rgba(232,185,99,${alpha})`;
          ctx.lineWidth = 1;
          ctx.stroke();
        } else if (alpha > 0.25) {
          ctx.fillStyle = `rgba(111,181,224,${alpha * 0.32})`;
          ctx.fill();
          ctx.strokeStyle = `rgba(111,181,224,${alpha * 0.55})`;
          ctx.lineWidth = 1;
          ctx.stroke();
        } else {
          ctx.strokeStyle = `rgba(232,185,99,${alpha * 0.4})`;
          ctx.lineWidth = 0.5;
          ctx.stroke();
        }
      });
      const peak = cells.reduce((a, b) => (a.prob > b.prob ? a : b));
      ctx.strokeStyle = 'rgba(232,185,99,0.92)';
      ctx.lineWidth = 1.2;
      const cl = 14;
      ctx.beginPath(); ctx.moveTo(peak.cx - cl, peak.cy); ctx.lineTo(peak.cx + cl, peak.cy); ctx.stroke();
      ctx.beginPath(); ctx.moveTo(peak.cx, peak.cy - cl); ctx.lineTo(peak.cx, peak.cy + cl); ctx.stroke();
      ctx.beginPath(); ctx.arc(peak.cx, peak.cy, 7, 0, Math.PI * 2);
      ctx.strokeStyle = 'rgba(232,185,99,0.7)'; ctx.stroke();

      requestAnimationFrame(draw);
    }
    draw();
  });

  // ─── 7. NEVADA OUTLINE SELF-DRAW ─────────────────────────────────────
  document.querySelectorAll('svg[data-xr-draw]').forEach((svg) => {
    const paths = svg.querySelectorAll('path, polyline, polygon');
    paths.forEach((p) => {
      try {
        const len = p.getTotalLength();
        p.style.strokeDasharray = len;
        p.style.strokeDashoffset = len;
        p.style.transition = 'stroke-dashoffset 2.8s cubic-bezier(0.22,1,0.36,1)';
      } catch (e) { /* polygon may not have getTotalLength */ }
    });
    const obs = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          paths.forEach((p) => { p.style.strokeDashoffset = '0'; });
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.3 });
    obs.observe(svg);
  });

  // ─── 8. MAGNETIC HOVER (subtle, on .xr-magnetic) ────────────────────
  document.querySelectorAll('.xr-magnetic').forEach((el) => {
    el.addEventListener('mousemove', (e) => {
      const rect = el.getBoundingClientRect();
      const x = (e.clientX - rect.left - rect.width / 2) / rect.width;
      const y = (e.clientY - rect.top - rect.height / 2) / rect.height;
      el.style.transform = `translate(${x * 6}px, ${y * 6}px)`;
    });
    el.addEventListener('mouseleave', () => { el.style.transform = ''; });
  });

  // ─── 9. PARALLAX BACKGROUND STRIPS ───────────────────────────────────
  // Any element matching .parallax-strip moves its first
  // [data-parallax] / .parallax-strip-bg child upward at half the page-
  // scroll rate while the strip is in view. Produces a smooth depth feel
  // without resorting to background-attachment: fixed.
  (function parallaxStrips() {
    const strips = Array.from(document.querySelectorAll('.parallax-strip'));
    if (!strips.length) return;

    const PARALLAX_RATE = 0.45;   // bg moves at 45 % of the page scroll

    function update() {
      strips.forEach((strip) => {
        const bg = strip.querySelector('.parallax-strip-bg');
        if (!bg) return;
        const rect = strip.getBoundingClientRect();
        // distance the strip has scrolled past the top of the viewport
        // Clamp to >= 0 — before the strip reaches the top of the viewport
        // we leave parallax-y at 0 so the bg sits at its declared `top: -20vh`
        // and visually bridges the previous section. (Otherwise a positive
        // translateY would push the bg DOWN out of the seam, creating a
        // dark void band between Solution and Proof.)
        const passed = Math.max(0, -rect.top);
        const offset = passed * PARALLAX_RATE;
        bg.style.setProperty('--parallax-y', -offset.toFixed(1) + 'px');
      });
    }
    let raf = null;
    function schedule() {
      if (raf) return;
      raf = requestAnimationFrame(() => { raf = null; update(); });
    }
    window.addEventListener('scroll', schedule, { passive: true });
    window.addEventListener('resize', schedule);
    update();
  })();

})();
