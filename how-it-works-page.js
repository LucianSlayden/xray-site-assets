/* X-Ray Geoanalytics — How It Works Page
   Canvas: 3D data-fusion network with strata & hex wireframes
   GSAP:   hero word-reveal + step-header + panel ScrollTrigger batches
   Enqueue with dependency: ['gsap-st']
*/

/* ══ Canvas: 3D data-fusion network ════════════════════════════════════ */
(function () {
  'use strict';
  var canvas = document.getElementById('hiw-canvas');
  if (!canvas) return;
  var ctx = canvas.getContext('2d');
  if (!ctx) return;
  var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var W, H, CX, CY, FOV;

  function resize() {
    W  = canvas.offsetWidth  || window.innerWidth;
    H  = canvas.offsetHeight || window.innerHeight;
    canvas.width  = W;
    canvas.height = H;
    CX = W * 0.5; CY = H * 0.5;
    FOV = Math.max(W, H) * 0.50;
  }
  resize();
  window.addEventListener('resize', resize);

  var _seed = 7331;
  function rng() {
    _seed = (_seed * 1664525 + 1013904223) & 0xffffffff;
    return (_seed >>> 0) / 0xffffffff;
  }
  function rnd(a, b) { return a + rng() * (b - a); }

  function rotY(v, a) {
    var c = Math.cos(a), s = Math.sin(a);
    return [v[0]*c + v[2]*s, v[1], -v[0]*s + v[2]*c];
  }
  function rotX(v, a) {
    var c = Math.cos(a), s = Math.sin(a);
    return [v[0], v[1]*c - v[2]*s, v[1]*s + v[2]*c];
  }

  function proj(v) {
    var d = v[2] + 80;
    if (d < 2) return null;
    var s = FOV / d;
    return [CX + v[0]*s, CY - v[1]*s, s, d];
  }

  var TCOLS = 15, TROWS = 12;
  var tVerts = [], tEdgeH = [], tEdgeV = [];
  (function () {
    for (var row = 0; row < TROWS; row++) {
      for (var col = 0; col < TCOLS; col++) {
        var tx = (col / (TCOLS-1) - 0.5) * 136;
        var tz = -6 - (row / (TROWS-1)) * 56;
        var ty = -23 + Math.sin(tx * 0.054) * 2.8 + Math.sin(tz * 0.076) * 2.4;
        tVerts.push([tx, ty, tz]);
      }
    }
    for (var row = 0; row < TROWS; row++) {
      for (var col = 0; col < TCOLS-1; col++) {
        tEdgeH.push(row*TCOLS + col, row*TCOLS + col + 1);
      }
    }
    for (var row = 0; row < TROWS-1; row++) {
      for (var col = 0; col < TCOLS; col++) {
        tEdgeV.push(row*TCOLS + col, (row+1)*TCOLS + col);
      }
    }
  })();

  var hexVerts = [], hexEdges = [];
  (function () {
    for (var i = 0; i < 6; i++) {
      var a = i * Math.PI / 3;
      hexVerts.push([Math.cos(a), 0.5, Math.sin(a)]);
    }
    for (var i = 0; i < 6; i++) {
      var a = i * Math.PI / 3;
      hexVerts.push([Math.cos(a), -0.5, Math.sin(a)]);
    }
    for (var i = 0; i < 6; i++) hexEdges.push(i, (i+1)%6);
    for (var i = 0; i < 6; i++) hexEdges.push(6+i, 6+(i+1)%6);
    for (var i = 0; i < 6; i++) hexEdges.push(i, 6+i);
  })();

  var hexInst = [
    { pos: [ 26,  8, -25], r: 11, h:  7, ry0: rng()*6.28, spd: 0.30, col: 0, al: 0.10 },
    { pos: [-32, -5, -40], r: 15, h: 10, ry0: rng()*6.28, spd: 0.22, col: 1, al: 0.09 },
    { pos: [ 12,-13, -54], r: 20, h: 14, ry0: rng()*6.28, spd: 0.15, col: 0, al: 0.08 },
    { pos: [-15, 11, -18], r:  9, h:  6, ry0: rng()*6.28, spd: 0.44, col: 1, al: 0.10 },
    { pos: [ 40, -7, -46], r: 17, h: 12, ry0: rng()*6.28, spd: 0.19, col: 0, al: 0.07 },
    { pos: [-28,  3, -32], r: 13, h:  9, ry0: rng()*6.28, spd: 0.27, col: 1, al: 0.08 }
  ];

  var COLORS = [[232,185,99],[111,181,224],[168,178,192]];

  var nodes = [];
  for (var i = 0; i < 82; i++) {
    var isTarget = i < 12;
    var type = isTarget ? 0 : (i < 48 ? 1 : 2);
    nodes.push({
      pos:      [rnd(-52, 52), rnd(-30, 30), rnd(-50, 8)],
      vel:      [rnd(-0.9, 0.9) * (isTarget ? 0.6 : 1.0),
                 rnd(-0.7, 0.7) * (isTarget ? 0.6 : 1.0),
                 rnd(-0.5, 0.5)],
      type:     type,
      isTarget: isTarget,
      r:        isTarget ? rnd(1.9, 3.0) : rnd(0.7, 1.8),
      alpha:    rnd(0.40, 0.82),
      phase:    rng() * Math.PI * 2
    });
  }

  var CONN2 = 24 * 24;
  var t = 0, lastTS = 0;

  function tick(ts) {
    var dt = Math.min((ts - lastTS) / 1000, 0.05);
    lastTS = ts;
    if (!REDUCED) t += dt * 0.25;
    ctx.clearRect(0, 0, W, H);

    var ry = t * 0.021 + Math.sin(t * 0.10) * 0.13;
    var rx = Math.sin(t * 0.08) * 0.17;

    if (!REDUCED) {
      for (var i = 0; i < nodes.length; i++) {
        var n = nodes[i];
        n.pos[0] += n.vel[0] * dt * 0.08;
        n.pos[1] += n.vel[1] * dt * 0.08;
        n.pos[2] += n.vel[2] * dt * 0.05;
        if (Math.abs(n.pos[0]) > 54) n.vel[0] *= -1;
        if (Math.abs(n.pos[1]) > 32) n.vel[1] *= -1;
        if (n.pos[2] > 10 || n.pos[2] < -52) n.vel[2] *= -1;
      }
    }

    var tPr = tVerts.map(function(v) {
      return proj(rotX(rotY(v, ry), rx));
    });
    ctx.beginPath();
    for (var k = 0; k < tEdgeH.length; k += 2) {
      var pa = tPr[tEdgeH[k]], pb = tPr[tEdgeH[k+1]];
      if (!pa || !pb) continue;
      ctx.moveTo(pa[0], pa[1]); ctx.lineTo(pb[0], pb[1]);
    }
    ctx.strokeStyle = 'rgba(111,181,224,0.07)';
    ctx.lineWidth = 0.50; ctx.stroke();

    ctx.beginPath();
    for (var k = 0; k < tEdgeV.length; k += 2) {
      var pa = tPr[tEdgeV[k]], pb = tPr[tEdgeV[k+1]];
      if (!pa || !pb) continue;
      ctx.moveTo(pa[0], pa[1]); ctx.lineTo(pb[0], pb[1]);
    }
    ctx.strokeStyle = 'rgba(232,185,99,0.05)';
    ctx.lineWidth = 0.45; ctx.stroke();

    var hexOrder = [0,1,2,3,4,5].sort(function(a,b) {
      return hexInst[a].pos[2] - hexInst[b].pos[2];
    });
    for (var hi = 0; hi < hexOrder.length; hi++) {
      var inst = hexInst[hexOrder[hi]];
      var localRY = inst.ry0 + (REDUCED ? 0 : t * inst.spd);
      var hPr = hexVerts.map(function(bv) {
        var sv = [bv[0]*inst.r, bv[1]*inst.h, bv[2]*inst.r];
        var lv = rotY(sv, localRY);
        var wv = [lv[0]+inst.pos[0], lv[1]+inst.pos[1], lv[2]+inst.pos[2]];
        return proj(rotX(rotY(wv, ry), rx));
      });
      var cP  = proj(rotX(rotY(inst.pos, ry), rx));
      var fog = cP ? Math.max(0, Math.min(1, (cP[3] - 38) / 52)) : 1;
      var al  = inst.al * (1.0 - fog * 0.68);
      if (al < 0.01) continue;
      var col = COLORS[inst.col];
      ctx.beginPath();
      for (var k = 0; k < hexEdges.length; k += 2) {
        var pa = hPr[hexEdges[k]], pb = hPr[hexEdges[k+1]];
        if (!pa || !pb) continue;
        ctx.moveTo(pa[0], pa[1]); ctx.lineTo(pb[0], pb[1]);
      }
      ctx.strokeStyle = 'rgba('+col[0]+','+col[1]+','+col[2]+','+al+')';
      ctx.lineWidth = 0.80; ctx.stroke();
    }

    var pr = nodes.map(function(n) {
      return proj(rotX(rotY(n.pos, ry), rx));
    });
    var edTarget = [], edSky = [], edNorm = [];
    for (var i = 0; i < nodes.length; i++) {
      if (!pr[i]) continue;
      for (var j = i + 1; j < nodes.length; j++) {
        if (!pr[j]) continue;
        var dx = nodes[i].pos[0]-nodes[j].pos[0];
        var dy = nodes[i].pos[1]-nodes[j].pos[1];
        var dz = nodes[i].pos[2]-nodes[j].pos[2];
        if (dx*dx + dy*dy + dz*dz > CONN2) continue;
        if      (nodes[i].isTarget || nodes[j].isTarget)     edTarget.push(i, j);
        else if (nodes[i].type===1 && nodes[j].type===1)     edSky.push(i, j);
        else                                                  edNorm.push(i, j);
      }
    }
    function drawEdges(pairs, r, g, b, alpha, lw) {
      if (!pairs.length) return;
      ctx.beginPath();
      for (var k = 0; k < pairs.length; k += 2) {
        var pi = pr[pairs[k]], pj = pr[pairs[k+1]];
        if (!pi || !pj) continue;
        ctx.moveTo(pi[0], pi[1]); ctx.lineTo(pj[0], pj[1]);
      }
      ctx.strokeStyle = 'rgba('+r+','+g+','+b+','+alpha+')';
      ctx.lineWidth = lw; ctx.stroke();
    }
    drawEdges(edNorm,   168, 178, 192, 0.08, 0.55);
    drawEdges(edSky,    111, 181, 224, 0.13, 0.62);
    drawEdges(edTarget, 232, 185,  99, 0.23, 0.72);

    var order = [];
    for (var i = 0; i < nodes.length; i++) { if (pr[i]) order.push(i); }
    order.sort(function(a, b) { return pr[b][3] - pr[a][3]; });

    for (var k = 0; k < order.length; k++) {
      var i   = order[k];
      var n   = nodes[i];
      var p   = pr[i];
      var col = COLORS[n.type];
      var fog = Math.max(0, Math.min(1, (p[3] - 38) / 52));
      var al  = n.alpha * (1.0 - fog * 0.68);
      if (al < 0.02) continue;
      var sr = n.isTarget
        ? Math.min(n.r * p[2] * 0.65, 34)
        : Math.min(n.r * p[2] * 0.65, 16);
      if (sr < 0.4) continue;

      if (n.isTarget) {
        var pulse = 0.5 + 0.5 * Math.sin(t * 1.8 + n.phase);
        var glowR = sr * (4.2 + pulse * 2.4);
        var gr    = ctx.createRadialGradient(p[0], p[1], 0, p[0], p[1], glowR);
        var gal   = al * (0.30 + pulse * 0.24);
        gr.addColorStop(0, 'rgba('+col[0]+','+col[1]+','+col[2]+','+gal+')');
        gr.addColorStop(1, 'rgba('+col[0]+','+col[1]+','+col[2]+',0)');
        ctx.beginPath();
        ctx.arc(p[0], p[1], glowR, 0, Math.PI*2);
        ctx.fillStyle = gr; ctx.fill();
      }

      var hlx = p[0] - sr * 0.35, hly = p[1] - sr * 0.38;
      var br  = [Math.min(col[0]+45,255), Math.min(col[1]+36,255), Math.min(col[2]+20,255)];
      var dk  = [Math.floor(col[0]*0.24), Math.floor(col[1]*0.24), Math.floor(col[2]*0.20)];
      var sg  = ctx.createRadialGradient(hlx, hly, sr*0.04, p[0], p[1], sr);
      sg.addColorStop(0.00, 'rgba('+br[0]+','+br[1]+','+br[2]+','+al+')');
      sg.addColorStop(0.45, 'rgba('+col[0]+','+col[1]+','+col[2]+','+al+')');
      sg.addColorStop(1.00, 'rgba('+dk[0]+','+dk[1]+','+dk[2]+','+(al*0.44)+')');
      ctx.beginPath();
      ctx.arc(p[0], p[1], sr, 0, Math.PI*2);
      ctx.fillStyle = sg; ctx.fill();
    }
  }

  tick(0);
  function loop(ts) { requestAnimationFrame(loop); tick(ts); }
  requestAnimationFrame(loop);
}());

/* ══ GSAP Animations ════════════════════════════════════════════════════ */
(function () {
  gsap.registerPlugin(ScrollTrigger);
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (reduced) {
    document.querySelectorAll('.hiw-hw-inner').forEach(function (el) { el.style.transform = 'none'; });
    document.querySelectorAll('.hiw-eyebrow-wrap,.hiw-lede,.hiw-cta-wrap').forEach(function (el) { el.style.opacity = '1'; el.style.transform = 'none'; });
    document.querySelectorAll('.hiw-panel,.hiw-step-hdr').forEach(function (el) { el.style.opacity = '1'; el.style.transform = 'none'; });
    return;
  }

  gsap.timeline({ delay: 0.12, defaults: { ease: 'power3.out' } })
    .to('.hiw-eyebrow-wrap',       { opacity: 1, duration: 0.5, ease: 'power2.out' })
    .to('.hiw-hero .hiw-hw-inner', { y: '0%', duration: 0.95, stagger: 0.065 }, '-=0.2')
    .to('.hiw-lede',               { opacity: 1, y: 0, duration: 0.70, ease: 'power2.out' }, '-=0.42')
    .to('.hiw-cta-wrap',           { opacity: 1, y: 0, duration: 0.60, ease: 'power2.out' }, '-=0.48');

  ScrollTrigger.batch('.hiw-step-hdr', {
    start: 'top 90%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, x: 0, stagger: 0.10, duration: 0.70, ease: 'power2.out' });
    }
  });

  ScrollTrigger.batch('.hiw-panel', {
    start: 'top 88%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.12, duration: 0.65, ease: 'power2.out' });
    }
  });
}());
