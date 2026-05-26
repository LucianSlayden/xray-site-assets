/* X-Ray Geoanalytics — Our Team Page
   Canvas: Particle Network (fixed background) + GSAP scroll animations
   Enqueue with dependency: ['gsap-st']
*/

/* ══ Particle Network Canvas ════════════════════════════════════════════ */
(function () {
  var canvas = document.getElementById('ot-bg-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var W, H, t = 0;
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var particles = [];
  var N = 90, MAX_D = 180;

  function Particle() {
    this.x     = Math.random() * W;
    this.y     = Math.random() * H;
    this.vx    = (Math.random() - 0.5) * 0.28;
    this.vy    = (Math.random() - 0.5) * 0.28;
    this.gold  = Math.random() > 0.36;
    this.r     = 0.8 + Math.random() * 1.5;
    this.phase = Math.random() * 6.2832;
    this.freq  = 0.016 + Math.random() * 0.020;
  }

  function init() {
    particles = [];
    for (var i = 0; i < N; i++) particles.push(new Particle());
  }

  function resize() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
    init();
  }
  resize();
  window.addEventListener('resize', resize);

  function draw() {
    ctx.clearRect(0, 0, W, H);
    if (!REDUCED) t++;

    if (!REDUCED) {
      for (var i = 0; i < N; i++) {
        var p = particles[i];
        p.x += p.vx; p.y += p.vy;
        if (p.x < -8) p.x = W + 8;
        if (p.x > W + 8) p.x = -8;
        if (p.y < -8) p.y = H + 8;
        if (p.y > H + 8) p.y = -8;
      }
    }

    for (var i = 0; i < N; i++) {
      for (var j = i + 1; j < N; j++) {
        var pi = particles[i], pj = particles[j];
        var dx = pi.x - pj.x, dy = pi.y - pj.y;
        var d2 = dx * dx + dy * dy;
        if (d2 < MAX_D * MAX_D) {
          var d  = Math.sqrt(d2);
          var al = (1 - d / MAX_D) * 0.20;
          var col;
          if      ( pi.gold &&  pj.gold) col = '232,185,99';
          else if (!pi.gold && !pj.gold) col = '111,181,224';
          else                           col = '170,188,168';
          ctx.beginPath();
          ctx.moveTo(pi.x, pi.y);
          ctx.lineTo(pj.x, pj.y);
          ctx.strokeStyle = 'rgba(' + col + ',' + al + ')';
          ctx.lineWidth = 0.50;
          ctx.stroke();
        }
      }
    }

    for (var i = 0; i < N; i++) {
      var p     = particles[i];
      var tc    = REDUCED ? 0 : t;
      var pulse = 0.70 + 0.30 * Math.sin(p.phase + tc * p.freq);
      var al    = 0.50 + 0.40 * pulse;
      var rad   = p.r  * (0.80 + 0.20 * pulse);
      var rgb   = p.gold ? '232,185,99' : '111,181,224';

      var grd = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, rad * 6);
      grd.addColorStop(0, 'rgba(' + rgb + ',' + (al * 0.16) + ')');
      grd.addColorStop(1, 'rgba(' + rgb + ',0)');
      ctx.beginPath();
      ctx.arc(p.x, p.y, rad * 6, 0, 6.2832);
      ctx.fillStyle = grd;
      ctx.fill();

      ctx.beginPath();
      ctx.arc(p.x, p.y, rad, 0, 6.2832);
      ctx.fillStyle = 'rgba(' + rgb + ',' + al + ')';
      ctx.fill();
    }

    requestAnimationFrame(draw);
  }
  draw();
}());

/* ══ GSAP Animations ════════════════════════════════════════════════════ */
(function () {
  gsap.registerPlugin(ScrollTrigger);
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReduced) {
    document.querySelectorAll(
      '#ot-eyebrow,#ot-lede,#ot-strip,.ot-hw-inner,.ot-team-card,.ot-join-el'
    ).forEach(function (el) {
      el.style.opacity = '1';
      el.style.transform = 'none';
    });
    return;
  }

  var heroTl = gsap.timeline({ delay: 0.10 });
  heroTl
    .to('#ot-eyebrow', { opacity: 1, y: 0, duration: 0.5,  ease: 'power2.out' })
    .to('.ot-hw-inner', { y: '0%', duration: 0.95, ease: 'power4.out', stagger: 0.10 }, '-=0.20')
    .to('#ot-lede',    { opacity: 1, y: 0, duration: 0.65, ease: 'power2.out' }, '-=0.50')
    .to('#ot-strip',   { opacity: 1, y: 0, duration: 0.55, ease: 'power2.out' }, '-=0.45');

  gsap.utils.toArray('.ot-join-el').forEach(function (el) {
    gsap.to(el, {
      opacity: 1, y: 0, duration: 0.65, ease: 'power2.out',
      scrollTrigger: { trigger: el, start: 'top 88%', once: true }
    });
  });

  gsap.set('.ot-team-card', { opacity: 0, y: 24 });
  ScrollTrigger.batch('.ot-team-card', {
    onEnter: function (batch) {
      gsap.to(batch, {
        opacity: 1, y: 0,
        stagger: 0.10, duration: 0.65, ease: 'power2.out'
      });
    },
    start: 'top 86%',
    once: true
  });
}());
