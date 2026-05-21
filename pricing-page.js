/* X-Ray Geoanalytics — Pricing Page
   Canvas: animated wireframe terrain in hero section
   Enqueue with dependency: ['gsap-st']
*/

/* ══ Wireframe terrain canvas — pricing hero ════════════════════════════ */
(function () {
  var canvas = document.getElementById('pr-terrain');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  var W, H, t = 0;
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var COLS = 48, ROWS = 32;

  function resize() {
    W = canvas.width  = canvas.offsetWidth;
    H = canvas.height = canvas.offsetHeight;
  }
  resize();
  window.addEventListener('resize', resize);

  function getH(ci, ri) {
    var x = ci / COLS, y = ri / ROWS;
    return (
      Math.sin(x * 9.4  + t * 0.78) * Math.cos(y * 6.6 + t * 0.58) * 0.50 +
      Math.sin(x * 16.2 + y * 11.8 + t * 0.38) * 0.28 +
      Math.cos(x * 4.6  + t * 0.22) * Math.sin(y * 8.3 + t * 0.16) * 0.22
    );
  }

  function project(ci, ri, ht) {
    var nx = ci / COLS;
    var nd = ri / ROWS;
    var ps  = 1.0 - nd * 0.64;
    var vpX = W * 0.50;
    var vpY = H * 0.05;
    var baseY = H * 1.02;
    var sx = vpX + (nx * W - vpX) * ps;
    var sy = vpY + (baseY - vpY) * ps - ht * H * 0.34 * ps;
    return { x: sx, y: sy };
  }

  function draw() {
    ctx.clearRect(0, 0, W, H);

    for (var ci = 0; ci <= COLS; ci++) {
      ctx.beginPath();
      var first = true;
      for (var ri = ROWS; ri >= 0; ri--) {
        var p = project(ci, ri, getH(ci, ri));
        if (first) { ctx.moveTo(p.x, p.y); first = false; }
        else ctx.lineTo(p.x, p.y);
      }
      ctx.strokeStyle = 'rgba(180,210,232,0.16)';
      ctx.lineWidth = 0.65;
      ctx.stroke();
    }

    for (var ri = ROWS; ri >= 0; ri--) {
      var nd  = ri / ROWS;
      var al  = 0.16 + (1 - nd) * 0.44;
      ctx.beginPath();
      var first2 = true;
      for (var ci = 0; ci <= COLS; ci++) {
        var p = project(ci, ri, getH(ci, ri));
        if (first2) { ctx.moveTo(p.x, p.y); first2 = false; }
        else ctx.lineTo(p.x, p.y);
      }
      ctx.strokeStyle = 'rgba(238,222,190,' + al + ')';
      ctx.lineWidth = 0.70;
      ctx.stroke();
    }

    if (!REDUCED) t += 0.0024;
    requestAnimationFrame(draw);
  }

  draw();
}());
