/* X-Ray Geoanalytics — News & Updates Page
   Canvas: Particle Flow Field (hero section, position:absolute) + GSAP scroll animations
   Enqueue with dependency: ['gsap-st']
*/

(function () {
  'use strict';

  /* ── 1. PARTICLE FLOW FIELD ──────────────────────────────────────────
     680 particles follow a smoothly-evolving vector field built from
     layered sine/cosine functions. Fading trails via per-frame dim.
     ~80% gold, ~20% sky-blue.
  ─────────────────────────────────────────────────────────────────────── */
  (function () {
    var canvas = document.getElementById('nu-canvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');

    var W, H;
    function resize() {
      W = canvas.width  = canvas.offsetWidth;
      H = canvas.height = canvas.offsetHeight;
    }
    resize();
    window.addEventListener('resize', function () {
      resize();
      initParticles();
    }, { passive: true });

    function fieldAngle(x, y, t) {
      var nx = x / W, ny = y / H;
      return (Math.sin(nx * 4.2 + t * 0.19) * Math.PI * 1.3)
           + (Math.cos(ny * 3.8 + t * 0.16) * Math.PI * 0.9)
           + (Math.sin((nx - ny) * 3.1 + t * 0.12) * Math.PI * 0.55)
           + (Math.cos((nx + ny) * 2.4 + t * 0.08) * Math.PI * 0.30);
    }

    var NUM = 680;
    var particles = [];

    function makeParticle(i) {
      return {
        x:     Math.random() * W,
        y:     Math.random() * H,
        speed: 0.55 + Math.random() * 0.70,
        age:   Math.floor(Math.random() * 220),
        life:  160 + Math.floor(Math.random() * 140),
        gold:  (i % 5 !== 3),
        alpha: 0.18 + Math.random() * 0.22,
        size:  0.9 + Math.random() * 0.8,
      };
    }

    function initParticles() {
      particles = [];
      for (var i = 0; i < NUM; i++) particles.push(makeParticle(i));
    }
    initParticles();

    var raf;

    function draw(ts) {
      raf = requestAnimationFrame(draw);
      var t = ts * 0.001;

      ctx.fillStyle = 'rgba(6,12,18,0.048)';
      ctx.fillRect(0, 0, W, H);

      for (var i = 0; i < particles.length; i++) {
        var p = particles[i];

        p.age++;
        if (p.age > p.life) {
          particles[i] = makeParticle(i);
          continue;
        }

        var progress = p.age / p.life;
        var fade = progress < 0.12
          ? (progress / 0.12)
          : progress > 0.80
            ? (1 - (progress - 0.80) / 0.20)
            : 1;
        var a = p.alpha * fade;

        var angle = fieldAngle(p.x, p.y, t);
        p.x += Math.cos(angle) * p.speed;
        p.y += Math.sin(angle) * p.speed;

        if (p.x < -4) p.x = W + 4;
        if (p.x > W + 4) p.x = -4;
        if (p.y < -4) p.y = H + 4;
        if (p.y > H + 4) p.y = -4;

        ctx.beginPath();
        ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
        if (p.gold) {
          ctx.fillStyle = 'rgba(232,185,99,' + a.toFixed(3) + ')';
        } else {
          ctx.fillStyle = 'rgba(111,181,224,' + (a * 0.85).toFixed(3) + ')';
        }
        ctx.fill();
      }
    }

    requestAnimationFrame(draw);
    document.addEventListener('visibilitychange', function () {
      if (document.hidden) cancelAnimationFrame(raf);
      else requestAnimationFrame(draw);
    });
  }());


  /* ── 2. GSAP HERO REVEAL ─────────────────────────────────────────── */
  (function () {
    if (typeof gsap === 'undefined') return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    gsap.registerPlugin(ScrollTrigger);

    gsap.set('#nu-eyebrow', { opacity: 0, y: 14 });
    gsap.set('#nu-edash',   { scaleX: 0, transformOrigin: 'left center' });
    gsap.set('.nu-w',       { y: '115%' });
    gsap.set('#nu-sub',     { opacity: 0, y: 18 });
    gsap.set('.nu-stat',    { opacity: 0, y: 20 });

    gsap.timeline({ delay: 0.2 })
      .to('#nu-eyebrow', { opacity: 1, y: 0, duration: 0.5,  ease: 'power2.out' })
      .to('#nu-edash',   { scaleX: 1,         duration: 0.65, ease: 'power3.out' }, '-=0.28')
      .to('.nu-w',       { y: '0%', duration: 1.0, ease: 'power4.out', stagger: 0.09 }, '-=0.45')
      .to('#nu-sub',     { opacity: 1, y: 0, duration: 0.7,  ease: 'power2.out' }, '-=0.55')
      .to('.nu-stat',    { opacity: 1, y: 0, duration: 0.55, ease: 'power2.out', stagger: 0.09 }, '-=0.45');
  }());


  /* ── 3. FEATURED IMAGE PARALLAX ──────────────────────────────────── */
  (function () {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    var wrap = document.getElementById('nu-parallax');
    if (!wrap) return;
    gsap.fromTo(wrap,
      { y: '-14%' },
      { y: '14%', ease: 'none',
        scrollTrigger: {
          trigger: '.nu-featured',
          start: 'top bottom', end: 'bottom top', scrub: true
        }
      });
  }());


  /* ── 4. CARD BATCH STAGGER ───────────────────────────────────────── */
  (function () {
    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    gsap.set('.nu-card', { opacity: 0, y: 38 });
    ScrollTrigger.batch('.nu-card', {
      interval: 0.12, batchMax: 3, start: 'top 88%',
      onEnter: function (batch) {
        gsap.to(batch, { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out', stagger: 0.12, overwrite: true });
      },
    });
  }());


  /* ── 5. TIMELINE LINE DRAW ───────────────────────────────────────── */
  (function () {
    var track = document.getElementById('nu-tl');
    if (!track) return;
    new IntersectionObserver(function (entries, io) {
      if (entries[0].isIntersecting) { track.classList.add('in'); io.disconnect(); }
    }, { threshold: 0.5 }).observe(track);
  }());

}());
