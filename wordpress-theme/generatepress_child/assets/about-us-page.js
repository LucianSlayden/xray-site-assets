/* X-Ray Geoanalytics — About Us Page
   Canvas: see-through geological block model (#ab-canvas, fixed full-viewport)
   GSAP:   hero entrance + scroll reveals + principle/nav card batches
   Enqueue with dependency: ['gsap-st']
*/

/* ══ BACKGROUND: SEE-THROUGH GEOLOGICAL BLOCK MODEL (#ab-canvas) ═══════════
   A Basin and Range style block: terrain with contour lines, strata on the
   cut faces (alluvium, tuff, claystone, the lithium clay, basalt), a
   west-dipping normal fault that drops the hanging wall, and drill holes
   that light up gold where they cut the lithium clay. Everything is fixed
   geometry (no randomness). The camera drifts slowly and turns a little
   as the page scrolls. Reduced motion draws one still frame. */
(function () {
  'use strict';
  var canvas = document.getElementById('ab-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  if (!ctx) return;
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var GOLD = '232,185,99', SKY = '111,181,224', GREY = '168,178,192', RED = '217,114,95';

  // ── Model ────────────────────────────────────────────────────────────
  var X0 = -1.5, X1 = 1.5, Z0 = -1, Z1 = 1, BASE = -0.95;
  var NX = 36, NZ = 24;
  function terrain(x, z) {
    // two north-south ranges with a basin between them, plus low relief
    return 0.13 * Math.exp(-Math.pow((x - 0.8) / 0.34, 2)) * (0.85 + 0.15 * Math.cos(2.1 * z + 0.4)) +
           0.10 * Math.exp(-Math.pow((x + 1.0) / 0.3, 2)) * (0.8 + 0.2 * Math.sin(1.7 * z + 1.1)) +
           0.025 * Math.sin(5.1 * x + 1.9 * z + 0.6) + 0.018 * Math.cos(7.3 * z - 2.2 * x) + 0.02;
  }
  // contacts, top to bottom: tuff, claystone, Li-clay top, Li-clay base, basalt
  var THROW = 0.085;
  function faultX(y, z) { return 0.22 + 0.42 * y + 0.06 * z; }      // dips west: hanging wall is x < faultX
  function horizon(k, x, z) {
    var fold = 0.045 * Math.sin(1.6 * x + 0.3) + 0.03 * Math.cos(1.25 * z + 0.5) + 0.03 * x;
    var depth = [-0.13, -0.27, -0.43, -0.52, -0.66][k];
    var y = depth + fold;
    if (x < faultX(y, z)) y -= THROW;
    return y;
  }
  function clampTop(y, x, z) { var t = terrain(x, z); return y > t ? t : y; }

  // contour lines on the terrain (marching squares, computed once)
  var contours = [];
  (function () {
    var lv = [0.0, 0.03, 0.06, 0.09, 0.12, 0.15];
    var dx = (X1 - X0) / NX, dz = (Z1 - Z0) / NZ;
    function P(i, j) { return terrain(X0 + i * dx, Z0 + j * dz); }
    function lerp(a, b, va, vb, l) { var t = (l - va) / (vb - va); return a + (b - a) * t; }
    for (var li = 0; li < lv.length; li++) {
      var l = lv[li];
      for (var i = 0; i < NX; i++) for (var j = 0; j < NZ; j++) {
        var x = X0 + i * dx, z = Z0 + j * dz;
        var a = P(i, j), b = P(i + 1, j), c = P(i + 1, j + 1), d = P(i, j + 1);
        var pts = [];
        if ((a < l) !== (b < l)) pts.push([lerp(x, x + dx, a, b, l), z]);
        if ((b < l) !== (c < l)) pts.push([x + dx, lerp(z, z + dz, b, c, l)]);
        if ((c < l) !== (d < l)) pts.push([lerp(x, x + dx, d, c, l), z + dz]);
        if ((d < l) !== (a < l)) pts.push([x, lerp(z, z + dz, a, d, l)]);
        if (pts.length === 2) contours.push([pts[0][0], l, pts[0][1], pts[1][0], l, pts[1][1]]);
        else if (pts.length === 4) {
          contours.push([pts[0][0], l, pts[0][1], pts[1][0], l, pts[1][1]]);
          contours.push([pts[2][0], l, pts[2][1], pts[3][0], l, pts[3][1]]);
        }
      }
    }
  }());

  var HOLES = [[-1.12, 0.38], [-0.74, -0.42], [-0.38, 0.6], [-0.02, -0.08], [0.36, 0.58],
               [0.62, -0.5], [0.98, 0.22], [1.22, -0.26], [-0.98, -0.78], [0.18, 0.3], [-0.55, 0.05]];

  // ── Camera ───────────────────────────────────────────────────────────
  var p = [0, 0, 0], q = [0, 0, 0];
  var W, H, cx, cy, F, D = 9, yaw = -0.5, pitch = 0.44, cyaw, syaw, cp, sp;
  function setCam(y) { yaw = y; cyaw = Math.cos(yaw); syaw = Math.sin(yaw); cp = Math.cos(pitch); sp = Math.sin(pitch); }
  function proj(x, y, z, out) {
    var xr = x * cyaw - z * syaw, zr = x * syaw + z * cyaw;
    var yr = y * cp - zr * sp, zz = y * sp + zr * cp;
    var s = F / (D - zz);
    out[0] = cx + xr * s; out[1] = cy - yr * s; out[2] = zz;
    return out;
  }
  var YAW0 = -0.62;
  var tall = false;
  var lede = document.getElementById('ab-lede');
  var textCol = document.querySelector('.ab-hero-grid > div');
  // Page-space bottom of the intro, and right edge of the hero's text column.
  function ledeBottom() { return lede ? lede.getBoundingClientRect().bottom + window.scrollY : 0; }
  function textRight() { return textCol ? textCol.getBoundingClientRect().right : 0; }
  function resize() {
    W = canvas.offsetWidth || window.innerWidth;
    H = canvas.offsetHeight || window.innerHeight;
    // Small (phone-sized) canvases can afford a 3x backing store; hairlines stay crisp.
    var dpr = Math.min(W * H < 500000 ? 3 : 2, window.devicePixelRatio || 1);
    canvas.width = Math.round(W * dpr);
    canvas.height = Math.round(H * dpr);
    ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    // Fit the block into a target box once per size (at the resting yaw), so
    // the drift and scroll turn it without changing its scale.
    tall = W / H <= 1.1;
    var box;
    if (tall) {
      // On tall screens the block sits low, starting below the intro, so the
      // headline and intro read against a clear background.
      var top = Math.min(0.78 * H, Math.max(0.5 * H, ledeBottom() + 16));
      box = [-0.12 * W, 1.12 * W, top, 1.02 * H];
    } else {
      // On wide screens it sits right of the text column, clear of the intro.
      var tr = textRight(), left = 0.40 * W;
      if (tr < 0.6 * W) left = Math.max(left, tr + 32);
      box = [left, 0.97 * W, 0.2 * H, 0.9 * H];
    }
    F = 1; cx = 0; cy = 0; setCam(YAW0);
    var mnx = 1e9, mxx = -1e9, mny = 1e9, mxy = -1e9, xs = [X0, X1], zs = [Z0, Z1], ys = [0.2, BASE];
    for (var a = 0; a < 2; a++) for (var b = 0; b < 2; b++) for (var c = 0; c < 2; c++) {
      proj(xs[a], ys[c], zs[b], p);
      mnx = Math.min(mnx, p[0]); mxx = Math.max(mxx, p[0]); mny = Math.min(mny, p[1]); mxy = Math.max(mxy, p[1]);
    }
    F = Math.min((box[1] - box[0]) / (mxx - mnx), (box[3] - box[2]) / (mxy - mny));
    cx = (box[0] + box[1]) / 2 - F * (mnx + mxx) / 2;
    cy = (box[2] + box[3]) / 2 - F * (mny + mxy) / 2;
  }

  // ── Drawing helpers ──────────────────────────────────────────────────
  function line3(path, ax, ay, az, bx, by, bz) {
    proj(ax, ay, az, p); path.moveTo(p[0], p[1]);
    proj(bx, by, bz, q); path.lineTo(q[0], q[1]);
  }
  function stroke(rgb, a, w) { ctx.strokeStyle = 'rgba(' + rgb + ',' + a + ')'; ctx.lineWidth = w; ctx.stroke(); }

  // A vertical face along an edge: from (ax,az) to (bx,bz), n samples.
  function face(ax, az, bx, bz, front) {
    var n = 48, i, k, xs = [], zs = [];
    for (i = 0; i <= n; i++) { xs.push(ax + (bx - ax) * i / n); zs.push(az + (bz - az) * i / n); }
    var tops = xs.map(function (x, i) { return terrain(x, zs[i]); });
    var hz = [];
    for (k = 0; k < 5; k++) hz.push(xs.map(function (x, i) { return clampTop(horizon(k, x, zs[i]), x, zs[i]); }));
    var bounds = [tops].concat(hz).concat([xs.map(function () { return BASE; })]);
    // unit fills: alluvium, tuff, claystone, Li-clay, lower claystone, basalt
    var fills = [[GOLD, 0.035], [GREY, 0.03], [SKY, 0.045], [GOLD, 0.13], [SKY, 0.03], [GREY, 0.055]];
    var f = front ? 1 : 0.45;
    for (k = 0; k < fills.length; k++) {
      ctx.beginPath();
      for (i = 0; i <= n; i++) { proj(xs[i], bounds[k][i], zs[i], p); if (i) ctx.lineTo(p[0], p[1]); else ctx.moveTo(p[0], p[1]); }
      for (i = n; i >= 0; i--) { proj(xs[i], bounds[k + 1][i], zs[i], p); ctx.lineTo(p[0], p[1]); }
      ctx.closePath();
      ctx.fillStyle = 'rgba(' + fills[k][0] + ',' + (fills[k][1] * f) + ')';
      ctx.fill();
    }
    for (k = 0; k < bounds.length; k++) {
      ctx.beginPath();
      for (i = 0; i <= n; i++) { proj(xs[i], bounds[k][i], zs[i], p); if (i) ctx.lineTo(p[0], p[1]); else ctx.moveTo(p[0], p[1]); }
      var li = k === 3 || k === 4;
      stroke(k === 0 ? SKY : (li ? GOLD : GREY), (k === 0 ? 0.5 : (li ? 0.45 : 0.22)) * f, k === 0 ? 1 : 0.8);
    }
    // fault trace on this face
    ctx.beginPath();
    var started = false;
    for (var s = 0; s <= 40; s++) {
      var y = BASE + (0.25 - BASE) * s / 40;
      // find the point on this edge where x = faultX(y, z)
      for (i = 0; i < n; i++) {
        var g0 = xs[i] - faultX(y, zs[i]), g1 = xs[i + 1] - faultX(y, zs[i + 1]);
        if ((g0 < 0) !== (g1 < 0)) {
          var t = g0 / (g0 - g1), fx = xs[i] + (xs[i + 1] - xs[i]) * t, fz = zs[i] + (zs[i + 1] - zs[i]) * t;
          if (y > terrain(fx, fz)) break;
          proj(fx, y, fz, p);
          if (started) ctx.lineTo(p[0], p[1]); else { ctx.moveTo(p[0], p[1]); started = true; }
          break;
        }
      }
    }
    stroke(RED, 0.5 * f, 1);
  }

  function draw() {
    ctx.clearRect(0, 0, W, H);
    var i, j, x, z, path;
    var dx = (X1 - X0) / NX, dz = (Z1 - Z0) / NZ;

    // faces: back faces faint first, then the ones facing the camera
    var faces = [
      [X0, Z1, X1, Z1, [0, 0, 1]], [X1, Z1, X1, Z0, [1, 0, 0]],
      [X1, Z0, X0, Z0, [0, 0, -1]], [X0, Z0, X0, Z1, [-1, 0, 0]]
    ];
    var vis = faces.map(function (fc) {
      var n = fc[4], zr = n[0] * syaw + n[2] * cyaw;     // normal's depth component after yaw
      return zr * cp > 0.02;
    });
    for (i = 0; i < 4; i++) if (!vis[i]) face(faces[i][0], faces[i][1], faces[i][2], faces[i][3], false);

    // lithium clay surface seen through the block
    ctx.beginPath();
    for (j = 0; j <= NZ; j += 2) {
      z = Z0 + j * dz;
      for (i = 0; i <= NX; i++) {
        x = X0 + i * dx;
        proj(x, clampTop(horizon(2, x, z), x, z), z, p);
        if (i) ctx.lineTo(p[0], p[1]); else ctx.moveTo(p[0], p[1]);
      }
    }
    for (i = 0; i <= NX; i += 3) {
      x = X0 + i * dx;
      for (j = 0; j <= NZ; j++) {
        z = Z0 + j * dz;
        proj(x, clampTop(horizon(2, x, z), x, z), z, p);
        if (j) ctx.lineTo(p[0], p[1]); else ctx.moveTo(p[0], p[1]);
      }
    }
    stroke(GOLD, 0.12, 0.7);

    // terrain wireframe
    ctx.beginPath();
    for (j = 0; j <= NZ; j++) {
      z = Z0 + j * dz;
      for (i = 0; i <= NX; i++) { x = X0 + i * dx; proj(x, terrain(x, z), z, p); if (i) ctx.lineTo(p[0], p[1]); else ctx.moveTo(p[0], p[1]); }
    }
    for (i = 0; i <= NX; i++) {
      x = X0 + i * dx;
      for (j = 0; j <= NZ; j++) { z = Z0 + j * dz; proj(x, terrain(x, z), z, p); if (j) ctx.lineTo(p[0], p[1]); else ctx.moveTo(p[0], p[1]); }
    }
    stroke(GREY, 0.1, 0.6);

    // contours
    ctx.beginPath();
    for (i = 0; i < contours.length; i++) { var c = contours[i]; line3(ctx, c[0], c[1], c[2], c[3], c[4], c[5]); }
    stroke(GOLD, 0.4, 0.8);

    // fault trace on the terrain
    ctx.beginPath();
    for (j = 0; j <= NZ; j++) {
      z = Z0 + j * dz;
      var fy = 0.05, fxp = faultX(fy, z);
      for (var it = 0; it < 6; it++) { fy = terrain(fxp, z); fxp = faultX(fy, z); }
      proj(fxp, terrain(fxp, z), z, p);
      if (j) ctx.lineTo(p[0], p[1]); else ctx.moveTo(p[0], p[1]);
    }
    stroke(RED, 0.5, 1.1);

    // strike and dip symbol on the fault trace (map convention: long tick along
    // strike, short tick toward the dip direction). Values come from faultX():
    // strike N03°E (z is north), dip 67° toward the west.
    (function () {
      var zc = 0.15, fy2 = 0.05, fx2 = faultX(fy2, zc);
      for (var it2 = 0; it2 < 6; it2++) { fy2 = terrain(fx2, zc); fx2 = faultX(fy2, zc); }
      var sx = 0.06 / Math.sqrt(1 + 0.0036), sz = 1 / Math.sqrt(1 + 0.0036), L = 0.2, D = 0.11;
      var q = [0, 0], r = [0, 0], o = [0, 0];
      var ax = fx2 - sx * L, az = zc - sz * L, bx = fx2 + sx * L, bz = zc + sz * L;
      var dxp = fx2 - D, dzp = zc - 0.06 * D;
      ctx.beginPath();
      line3(ctx, ax, terrain(ax, az) + 0.004, az, bx, terrain(bx, bz) + 0.004, bz);
      line3(ctx, fx2, terrain(fx2, zc) + 0.004, zc, dxp, terrain(dxp, dzp) + 0.004, dzp);
      stroke(RED, 0.95, 1.6);
      proj(fx2, terrain(fx2, zc), zc, o); proj(dxp, terrain(dxp, dzp), dzp, r); proj(bx, terrain(bx, bz), bz, q);
      var lx = o[0] - 150, ly = o[1] - 54;
      ctx.beginPath(); ctx.moveTo(o[0], o[1]); ctx.lineTo(lx + 108, ly + 20);
      stroke(RED, 0.5, 0.8);
      ctx.font = '12px ui-monospace, SFMono-Regular, Menlo, monospace';
      ctx.fillStyle = 'rgba(244,196,184,0.95)';
      ctx.fillText('FAULT', lx, ly - 12);
      ctx.fillText('Strike N03\u00B0E', lx, ly + 2);
      ctx.fillText('Dip 67\u00B0 W', lx, ly + 16);
    })();

    // drill holes, gold where they cut the lithium clay
    for (i = 0; i < HOLES.length; i++) {
      x = HOLES[i][0]; z = HOLES[i][1];
      var top = terrain(x, z), liT = horizon(2, x, z), liB = horizon(3, x, z), end = horizon(4, x, z) - 0.07;
      ctx.beginPath(); line3(ctx, x, top, z, x, end, z); stroke(SKY, 0.55, 1);
      ctx.beginPath();
      for (var yy = top - 0.04; yy > end; yy -= 0.04) {
        proj(x, yy, z, p); ctx.moveTo(p[0] - 2.2, p[1]); ctx.lineTo(p[0] + 2.2, p[1]);
      }
      stroke(SKY, 0.35, 0.7);
      ctx.beginPath(); line3(ctx, x, liT, z, x, liB, z); stroke(GOLD, 0.9, 2.4);
      proj(x, top, z, p);
      ctx.beginPath(); ctx.arc(p[0], p[1], 2.2, 0, 6.2832);
      ctx.fillStyle = 'rgba(' + SKY + ',0.85)'; ctx.fill();
    }

    for (i = 0; i < 4; i++) if (vis[i]) face(faces[i][0], faces[i][1], faces[i][2], faces[i][3], true);

    // block edges: corners and base
    ctx.beginPath();
    var corners = [[X0, Z0], [X1, Z0], [X1, Z1], [X0, Z1]];
    for (i = 0; i < 4; i++) {
      var a = corners[i], b = corners[(i + 1) % 4];
      line3(ctx, a[0], terrain(a[0], a[1]), a[1], a[0], BASE, a[1]);
      line3(ctx, a[0], BASE, a[1], b[0], BASE, b[1]);
    }
    stroke(SKY, 0.4, 1);
  }

  // ── Loop ─────────────────────────────────────────────────────────────
  var scrollF = 0;
  function readScroll() {
    var max = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
    scrollF = Math.min(1, Math.max(0, window.scrollY / max));
  }
  // Redraw only when the turn would move the block's corners by a visible
  // amount: scrolling redraws every frame, the slow idle drift a few times a second.
  var drawnYaw = null;
  function frame(t, force) {
    var y = YAW0 + (REDUCED ? 0 : 0.1 * Math.sin(t * 0.00004)) + scrollF * 0.5;
    if (!force && drawnYaw !== null && Math.abs(y - drawnYaw) * F * 1.8 < 0.25) return;
    drawnYaw = y;
    setCam(y);
    draw();
  }
  // On tall screens the block sits behind body text once the hero has gone,
  // so it dims to half strength as the hero scrolls away.
  var hero = document.getElementById('ab-hero');
  var dimQueued = false;
  function dim() {
    dimQueued = false;
    var o = 1;
    if (!tall && W <= 880) {
      // Landscape phones: one text column runs over the whole block, so keep it faint.
      o = 0.3;
    } else if (hero && tall) {
      var end = hero.offsetTop + hero.offsetHeight;
      var k = (window.scrollY - (end - H)) / (0.7 * H);
      o = 1 - 0.5 * Math.min(1, Math.max(0, k));
    }
    canvas.style.opacity = o < 1 ? o.toFixed(3) : '';
  }
  function queueDim() { if (!dimQueued) { dimQueued = true; requestAnimationFrame(dim); } }
  function refit() { resize(); frame(performance.now(), true); dim(); }
  resize(); readScroll(); frame(0, true); dim();
  window.addEventListener('resize', refit);
  // The intro's height changes when the web font arrives; refit the block to it.
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(refit);
  window.addEventListener('scroll', queueDim, { passive: true });
  if (REDUCED) return;
  window.addEventListener('scroll', readScroll, { passive: true });
  var rafId = null;
  function loop(t) {
    rafId = requestAnimationFrame(loop);
    frame(t);
  }
  function start() { if (!rafId) rafId = requestAnimationFrame(loop); }
  document.addEventListener('visibilitychange', function () {
    if (document.hidden) { cancelAnimationFrame(rafId); rafId = null; } else start();
  });
  start();
}());

/* ══ GSAP ANIMATIONS ════════════════════════════════════════════════════ */
(function () {
  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Reduced motion, or GSAP failed to load: show everything at rest.
  if (prefersReduced || !window.gsap || !window.ScrollTrigger) {
    document.querySelectorAll(
      '.ab-h1,#ab-lede,#ab-ctas,' +
      '.ab-section-h2,.ab-section-p,.ab-prin-card,.ab-nav-card'
    ).forEach(function (el) {
      el.style.opacity   = '1';
      el.style.transform = 'none';
    });
    window.__xrPageReady = true;
    return;
  }
  gsap.registerPlugin(ScrollTrigger);

  // Headline: wrap each rendered line in a mask and slide the lines up, then
  // put the original markup back so the heading reflows normally on resize.
  function splitLines(h) {
    var original = h.innerHTML, words = [], space = false;
    (function walk(node, cls) {
      Array.prototype.slice.call(node.childNodes).forEach(function (n) {
        if (n.nodeType === 1) { walk(n, n.className || cls); return; }
        if (n.nodeType !== 3) return;
        var frag = document.createDocumentFragment();
        n.textContent.split(/(\s+)/).forEach(function (part) {
          if (!part) return;
          frag.appendChild(document.createTextNode(part));
          if (/^\s+$/.test(part)) { space = true; return; }
          var s = document.createElement('span');
          s.textContent = part;
          frag.replaceChild(s, frag.lastChild);
          words.push({ el: s, cls: cls, space: space });
          space = false;
        });
        n.parentNode.replaceChild(frag, n);
      });
    }(h, ''));
    var lines = [], top = null;
    words.forEach(function (w) {
      var t = w.el.offsetTop;
      if (top === null || Math.abs(t - top) > 4) { lines.push([]); top = t; }
      lines[lines.length - 1].push(w);
    });
    h.innerHTML = '';
    var inners = lines.map(function (ws) {
      var mask = document.createElement('span'), inner = document.createElement('span');
      mask.className = 'ab-hl';
      ws.forEach(function (w, i) {
        if (i && w.space) inner.appendChild(document.createTextNode(' '));
        var t = document.createElement('span');
        if (w.cls) t.className = w.cls;
        t.textContent = w.el.textContent;
        inner.appendChild(t);
      });
      mask.appendChild(inner);
      h.appendChild(mask);
      return inner;
    });
    return { inners: inners, restore: function () { h.innerHTML = original; } };
  }

  var h1 = document.querySelector('.ab-h1');
  var started = false;
  function hero() {
    if (started) return;
    started = true;
    var split = h1 ? splitLines(h1) : null;
    var tl = gsap.timeline({ delay: 0.05, onComplete: function () { if (split) split.restore(); } });
    if (split) tl.from(split.inners, { yPercent: 110, duration: 0.9, ease: 'power4.out', stagger: 0.08 }, 0);
    if (h1) gsap.set(h1, { opacity: 1 });
    tl.to('#ab-lede',     { opacity: 1, y: 0, duration: 0.70, ease: 'power2.out' }, 0.35)
      .to('#ab-ctas',     { opacity: 1, y: 0, duration: 0.60, ease: 'power2.out' }, 0.5);
  }
  // Measure the headline's lines with the web font in place (but don't wait long for it).
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(hero);
  setTimeout(hero, 600);

  gsap.utils.toArray('.ab-section-h2, .ab-section-p').forEach(function (el) {
    gsap.to(el, {
      opacity: 1, y: 0, duration: 0.70, ease: 'power2.out',
      scrollTrigger: { trigger: el, start: 'top 88%', once: true },
    });
  });

  // Cards fade up; the hover lift uses the separate `translate` property so
  // it never fights these tweens. GSAP writes inline `translate: none` (and
  // rotate/scale) while it animates, so clear those once the cards land.
  function freeHover(els) {
    els.forEach(function (el) {
      el.style.removeProperty('translate');
      el.style.removeProperty('rotate');
      el.style.removeProperty('scale');
    });
  }
  ScrollTrigger.batch('.ab-prin-card', {
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.09, duration: 0.70, ease: 'power3.out', onComplete: function () { freeHover(batch); } });
    },
    start: 'top 86%',
    once: true,
  });
  ScrollTrigger.batch('.ab-nav-card', {
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.10, duration: 0.65, ease: 'power2.out', onComplete: function () { freeHover(batch); } });
    },
    start: 'top 88%',
    once: true,
  });

  gsap.utils.toArray('.ab-info-box, .ab-odds').forEach(function (el) {
    gsap.from(el, {
      opacity: 0, y: 18, duration: 0.70, ease: 'power2.out',
      scrollTrigger: { trigger: el, start: 'top 88%', once: true },
    });
  });

  window.__xrPageReady = true;
}());
