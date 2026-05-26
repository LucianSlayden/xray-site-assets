/* X-Ray Geoanalytics — Why X-Ray Page
   Three.js Survey Cloud + Section Ambient Canvases + GSAP scroll animations
   Enqueue with dependency: ['three-js', 'gsap-st']
*/

/* ══ Three.js Geological Survey Cloud (fixed background) ════════════════ */
(function () {
  'use strict';
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  if (!window.THREE) return;
  var canvas = document.getElementById('wx-terrain-bg');
  if (!canvas) return;

  window.__wxCam = { x: 0, y: 14, z: 145 };

  var renderer = new THREE.WebGLRenderer({ canvas: canvas, antialias: true, alpha: false, powerPreference: 'high-performance' });
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));
  renderer.setSize(window.innerWidth, window.innerHeight);
  renderer.toneMapping = THREE.ACESFilmicToneMapping;
  renderer.toneMappingExposure = 1.22;
  if (THREE.SRGBColorSpace) renderer.outputColorSpace = THREE.SRGBColorSpace;

  var scene = new THREE.Scene();
  scene.background = new THREE.Color(0x050A10);
  scene.fog = new THREE.FogExp2(0x050A10, 0.0030);

  var W = window.innerWidth, H = window.innerHeight;
  var camera = new THREE.PerspectiveCamera(56, W / H, 0.5, 700);
  camera.position.set(0, 14, 145);
  camera.lookAt(0, 0, 0);

  setTimeout(function () {

    scene.add(new THREE.AmbientLight(0x0C1E30, 8));

    var goldLight = new THREE.PointLight(0xE8B963, 100, 360, 1.4);
    goldLight.position.set(70, 65, 45);
    scene.add(goldLight);

    var blueLight = new THREE.PointLight(0x6FB5E0, 70, 300, 1.7);
    blueLight.position.set(-90, -25, 80);
    scene.add(blueLight);

    var rimLight = new THREE.PointLight(0xE8D090, 45, 240, 2.0);
    rimLight.position.set(0, -85, -55);
    scene.add(rimLight);

    /* ── 1,800 hexagonal prisms — InstancedMesh ── */
    var N = 1800;
    var hexGeo = new THREE.CylinderGeometry(0.90, 0.90, 0.38, 6);
    var hexMat = new THREE.MeshStandardMaterial({
      roughness: 0.28, metalness: 0.62,
      transparent: true, opacity: 0.92
    });
    var hexMesh = new THREE.InstancedMesh(hexGeo, hexMat, N);
    hexMesh.frustumCulled = false;

    var dummy    = new THREE.Object3D();
    var basePos  = new Float32Array(N * 3);
    var hexScale = new Float32Array(N);
    var hexRX    = new Float32Array(N);
    var hexRY    = new Float32Array(N);
    var hexRZ    = new Float32Array(N);
    var pha      = new Float32Array(N);
    var goldInstances = [];
    var tmpColor = new THREE.Color();

    for (var i = 0; i < N; i++) {
      var theta = Math.random() * Math.PI * 2;
      var phi   = Math.acos(2 * Math.random() - 1);
      var r     = Math.cbrt(Math.random());
      var bx = Math.sin(phi) * Math.cos(theta) * r * 108;
      var by = Math.cos(phi) * r * 72 - 6;
      var bz = Math.sin(phi) * Math.sin(theta) * r * 108;
      basePos[i*3] = bx; basePos[i*3+1] = by; basePos[i*3+2] = bz;

      hexRX[i] = (Math.random() - 0.5) * 0.50;
      hexRY[i] = Math.random() * Math.PI;
      hexRZ[i] = (Math.random() - 0.5) * 0.50;
      pha[i]   = Math.random() * Math.PI * 2;

      var rv = Math.random();
      var sc, cr, cg, cb;
      if (rv < 0.11) {
        sc = 0.32 + Math.random() * 0.18;
        cr = 0.91; cg = 0.72; cb = 0.38;
        goldInstances.push(i);
      } else {
        sc = 0.18 + Math.random() * 0.18;
        var br = 0.10 + Math.random() * 0.22;
        cr = br * 0.28; cg = br * 0.42; cb = br * 0.65;
      }
      hexScale[i] = sc;

      dummy.position.set(bx, by, bz);
      dummy.rotation.set(hexRX[i], hexRY[i], hexRZ[i]);
      dummy.scale.setScalar(sc);
      dummy.updateMatrix();
      hexMesh.setMatrixAt(i, dummy.matrix);
      tmpColor.setRGB(cr, cg, cb);
      hexMesh.setColorAt(i, tmpColor);
    }

    hexMesh.instanceMatrix.needsUpdate = true;
    if (hexMesh.instanceColor) hexMesh.instanceColor.needsUpdate = true;
    scene.add(hexMesh);

    /* ── Gold target connection lines ── */
    var goldIdx = goldInstances;
    var lineVerts = [];
    for (var a = 0; a < goldIdx.length; a++) {
      var ai = goldIdx[a];
      var ax = basePos[ai*3], ay = basePos[ai*3+1], az = basePos[ai*3+2];
      for (var b = a + 1; b < goldIdx.length; b++) {
        var bi = goldIdx[b];
        var dx = ax - basePos[bi*3], dy = ay - basePos[bi*3+1], dz = az - basePos[bi*3+2];
        if (Math.sqrt(dx*dx + dy*dy + dz*dz) < 40) {
          lineVerts.push(ax, ay, az, basePos[bi*3], basePos[bi*3+1], basePos[bi*3+2]);
        }
      }
    }
    var netLines = null;
    if (lineVerts.length) {
      var lGeo = new THREE.BufferGeometry();
      lGeo.setAttribute('position', new THREE.BufferAttribute(new Float32Array(lineVerts), 3));
      var lMat = new THREE.LineBasicMaterial({ color: 0xE8B963, transparent: true, opacity: 0.18, depthWrite: false });
      netLines = new THREE.LineSegments(lGeo, lMat);
      scene.add(netLines);
    }

    /* ── Horizontal scan rings ── */
    function makeRing(rx, rz, color) {
      var arr = [];
      for (var ri = 0; ri <= 128; ri++) {
        var ra = (ri / 128) * Math.PI * 2;
        arr.push(Math.cos(ra) * rx, 0, Math.sin(ra) * rz);
      }
      var geo = new THREE.BufferGeometry();
      geo.setAttribute('position', new THREE.BufferAttribute(new Float32Array(arr), 3));
      var mat = new THREE.LineBasicMaterial({ color: color, transparent: true, opacity: 0.22 });
      return { mesh: new THREE.LineLoop(geo, mat), mat: mat };
    }
    var ring1 = makeRing(114, 78, 0x6FB5E0);
    var ring2 = makeRing(58,  40, 0xE8B963);
    ring1.mesh.position.y = -72;
    ring2.mesh.position.y = -72;
    scene.add(ring1.mesh);
    scene.add(ring2.mesh);

    function onResize() {
      W = window.innerWidth; H = window.innerHeight;
      camera.aspect = W / H; camera.updateProjectionMatrix();
      renderer.setSize(W, H);
    }
    window.addEventListener('resize', onResize);

    var tick = 0;
    function animate() {
      requestAnimationFrame(animate);
      tick++;
      if (tick % 2 !== 0) return; /* ~30fps cap */
      var t   = tick * 0.00012;
      var cam = window.__wxCam;

      camera.position.x = cam.x + Math.sin(t * 0.14) * 18;
      camera.position.y = cam.y + Math.sin(t * 0.10) * 6;
      camera.position.z = cam.z;
      camera.lookAt(0, 0, 0);

      hexMesh.rotation.y = t * 0.045;
      if (netLines) netLines.rotation.y = hexMesh.rotation.y;

      if (tick % 4 === 0) {
        for (var gi = 0; gi < goldInstances.length; gi++) {
          var idx = goldInstances[gi];
          var sc = hexScale[idx] * (1.0 + Math.sin(t * 2.4 + pha[idx]) * 0.15);
          dummy.position.set(basePos[idx*3], basePos[idx*3+1], basePos[idx*3+2]);
          dummy.rotation.set(hexRX[idx], hexRY[idx] + t * 0.06, hexRZ[idx]);
          dummy.scale.setScalar(sc);
          dummy.updateMatrix();
          hexMesh.setMatrixAt(idx, dummy.matrix);
        }
        hexMesh.instanceMatrix.needsUpdate = true;
      }

      var scanY = ((t * 0.22) % 1.0) * 144 - 72;
      ring1.mesh.position.y = scanY;
      ring2.mesh.position.y = scanY - 18;
      ring1.mat.opacity = 0.14 + Math.abs(Math.sin(t * 1.4)) * 0.14;
      ring2.mat.opacity = 0.08 + Math.abs(Math.sin(t * 1.4 + 0.6)) * 0.10;

      goldLight.intensity = 92 + Math.sin(t * 0.28) * 22;
      blueLight.intensity = 62 + Math.sin(t * 0.20 + 1.5) * 16;

      scene.fog.density = 0.0028 + Math.sin(t * 0.16) * 0.0005;

      renderer.render(scene, camera);
    }
    animate();

  }, 80);
}());

/* ══ Section Ambient Canvases ═══════════════════════════════════════════ */
(function () {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
  var GOLD = '232,185,99', SKY = '111,181,224';

  /* Compare section: flowing data packet streams */
  (function () {
    var c = document.getElementById('wx-compare-canvas');
    if (!c) return;
    var ctx = c.getContext('2d');
    var W, H;
    var streams = [];
    function resize() {
      W = c.width = c.offsetWidth; H = c.height = c.offsetHeight;
      streams = [];
      for (var i = 0; i < 30; i++) {
        streams.push({
          y: Math.random() * H,
          speed: 0.30 + Math.random() * 0.55,
          len: 60 + Math.random() * 180,
          alpha: 0.10 + Math.random() * 0.14,
          x: Math.random() * W,
          lw: 0.6 + Math.random() * 0.8,
          gold: Math.random() > 0.50
        });
      }
    }
    resize();
    window.addEventListener('resize', resize);
    function draw() {
      ctx.clearRect(0, 0, W, H);
      streams.forEach(function (s) {
        var col = s.gold ? GOLD : SKY;
        var g = ctx.createLinearGradient(s.x - s.len, s.y, s.x, s.y);
        g.addColorStop(0,    'rgba('+col+',0)');
        g.addColorStop(0.5,  'rgba('+col+','+s.alpha+')');
        g.addColorStop(0.85, 'rgba('+col+','+(s.alpha*0.5)+')');
        g.addColorStop(1.0,  'rgba('+col+',0)');
        ctx.beginPath(); ctx.moveTo(s.x - s.len, s.y); ctx.lineTo(s.x, s.y);
        ctx.strokeStyle = g; ctx.lineWidth = s.lw; ctx.stroke();
        ctx.beginPath(); ctx.arc(s.x, s.y, s.lw * 1.2, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba('+col+','+(s.alpha*1.6)+')'; ctx.fill();
        s.x += s.speed;
        if (s.x - s.len > W) { s.x = -s.len * 0.5; s.y = Math.random() * H; }
      });
      requestAnimationFrame(draw);
    }
    draw();
  }());

  /* Diff section: radial sensor grid */
  (function () {
    var c = document.getElementById('wx-diff-canvas');
    if (!c) return;
    var ctx = c.getContext('2d');
    var W, H, tick = 0;
    function resize() { W = c.width = c.offsetWidth; H = c.height = c.offsetHeight; }
    resize();
    window.addEventListener('resize', resize);
    function draw() {
      ctx.clearRect(0, 0, W, H);
      var cx = W * 0.78, cy = H * 0.50;
      var spokes = 28;
      for (var i = 0; i < spokes; i++) {
        var a       = (i / spokes) * Math.PI * 2 + tick * 0.0005;
        var breathe = 0.65 + Math.sin(tick * 0.009 + i * 0.72) * 0.35;
        var len     = Math.min(W, H) * 0.65 * breathe;
        var col     = (i % 4 === 0) ? GOLD : SKY;
        var alpha   = (i % 4 === 0) ? 0.08 : 0.04;
        var g = ctx.createLinearGradient(cx, cy, cx + Math.cos(a)*len, cy + Math.sin(a)*len);
        g.addColorStop(0,   'rgba('+col+','+alpha+')');
        g.addColorStop(0.5, 'rgba('+col+','+(alpha*0.8)+')');
        g.addColorStop(1,   'rgba('+col+',0)');
        ctx.beginPath(); ctx.moveTo(cx, cy);
        ctx.lineTo(cx + Math.cos(a)*len, cy + Math.sin(a)*len);
        ctx.strokeStyle = g; ctx.lineWidth = (i%4===0) ? 0.9 : 0.5; ctx.stroke();
      }
      for (var r = 1; r <= 6; r++) {
        var rad   = r * Math.min(W,H) * 0.095;
        var pulse = 0.5 + Math.sin(tick * 0.006 + r * 1.1) * 0.5;
        ctx.beginPath(); ctx.arc(cx, cy, rad, 0, Math.PI * 2);
        ctx.strokeStyle = 'rgba('+GOLD+','+(0.030 + pulse * 0.025)+')';
        ctx.lineWidth = 0.6; ctx.stroke();
      }
      tick++;
      requestAnimationFrame(draw);
    }
    draw();
  }());

  /* Proof section: data scatter constellation */
  (function () {
    var c = document.getElementById('wx-proof-canvas');
    if (!c) return;
    var ctx = c.getContext('2d');
    var W, H, tick = 0;
    var pts = [];
    function resize() {
      W = c.width = c.offsetWidth; H = c.height = c.offsetHeight;
      pts = [];
      for (var i = 0; i < 64; i++) {
        pts.push({
          x: Math.random() * W, y: Math.random() * H,
          r: 0.8 + Math.random() * 2.0,
          phase: Math.random() * Math.PI * 2,
          spd: 0.007 + Math.random() * 0.012,
          gold: Math.random() > 0.55,
          vx: (Math.random()-0.5) * 0.12,
          vy: (Math.random()-0.5) * 0.12
        });
      }
    }
    resize();
    window.addEventListener('resize', resize);
    function draw() {
      ctx.clearRect(0, 0, W, H);
      for (var i = 0; i < pts.length; i++) {
        for (var j = i + 1; j < pts.length; j++) {
          var dx = pts[i].x - pts[j].x, dy = pts[i].y - pts[j].y;
          var dist = Math.sqrt(dx*dx + dy*dy);
          if (dist < 130) {
            var col = (pts[i].gold || pts[j].gold) ? GOLD : SKY;
            ctx.beginPath();
            ctx.moveTo(pts[i].x, pts[i].y); ctx.lineTo(pts[j].x, pts[j].y);
            ctx.strokeStyle = 'rgba('+col+','+(0.065*(1-dist/130))+')';
            ctx.lineWidth = 0.6; ctx.stroke();
          }
        }
      }
      pts.forEach(function (p) {
        var alpha = 0.18 + Math.sin(tick * p.spd + p.phase) * 0.10;
        var col = p.gold ? GOLD : SKY;
        ctx.beginPath(); ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba('+col+','+alpha+')'; ctx.fill();
        p.x += p.vx; p.y += p.vy;
        if (p.x < 0) p.x = W; if (p.x > W) p.x = 0;
        if (p.y < 0) p.y = H; if (p.y > H) p.y = 0;
      });
      tick++;
      requestAnimationFrame(draw);
    }
    draw();
  }());

  /* CTA section: expanding concentric pulse rings + grid */
  (function () {
    var c = document.getElementById('wx-cta-canvas');
    if (!c) return;
    var ctx = c.getContext('2d');
    var W, H, tick = 0;
    var rings = [];
    function resize() { W = c.width = c.offsetWidth; H = c.height = c.offsetHeight; }
    resize();
    window.addEventListener('resize', resize);
    var sources = [
      { rx:0.50, ry:0.50 },
      { rx:0.22, ry:0.35 },
      { rx:0.78, ry:0.65 },
      { rx:0.68, ry:0.28 }
    ];
    var lastSpawn = 0;
    function draw() {
      ctx.clearRect(0, 0, W, H);
      ctx.strokeStyle = 'rgba('+GOLD+',0.022)';
      ctx.lineWidth = 0.5;
      for (var ci = 0; ci <= 18; ci++) {
        var x = (ci/18)*W;
        ctx.beginPath(); ctx.moveTo(x,0); ctx.lineTo(x,H); ctx.stroke();
      }
      for (var ri = 0; ri <= 10; ri++) {
        var y = (ri/10)*H;
        ctx.beginPath(); ctx.moveTo(0,y); ctx.lineTo(W,y); ctx.stroke();
      }
      if (tick - lastSpawn > 55) {
        lastSpawn = tick;
        var src = sources[Math.floor(Math.random()*sources.length)];
        rings.push({ x: src.rx*W, y: src.ry*H, r:0, life:1.0, gold: Math.random()>0.42 });
      }
      for (var i = rings.length - 1; i >= 0; i--) {
        var rg = rings[i];
        rg.r += 1.6;
        rg.life -= 0.007;
        if (rg.life <= 0) { rings.splice(i, 1); continue; }
        var col = rg.gold ? GOLD : SKY;
        ctx.beginPath(); ctx.arc(rg.x, rg.y, rg.r, 0, Math.PI*2);
        ctx.strokeStyle = 'rgba('+col+','+(rg.life * 0.090)+')';
        ctx.lineWidth = 1.0; ctx.stroke();
      }
      tick++;
      requestAnimationFrame(draw);
    }
    draw();
  }());
}());

/* ══ GSAP Animations ════════════════════════════════════════════════════ */
(function () {
  gsap.registerPlugin(ScrollTrigger);
  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (reduced) {
    document.querySelectorAll(
      '#wx-eyebrow,#wx-lede,#wx-ctas,.wx-hw-inner,.wx-table,.wx-feat-row,.wx-proof-stat,.wx-proof-right,.wx-proof-disclaimer,.wx-cta-el,.wx-sr,.wx-diff-right'
    ).forEach(function (el) { el.style.opacity = '1'; el.style.transform = 'none'; });
    return;
  }

  /* Terrain canvas fade-in */
  gsap.fromTo('#wx-terrain-bg',
    { opacity: 0 },
    { opacity: 1, duration: 2.4, ease: 'power2.out', delay: 0.05 }
  );

  /* Scroll-driven cloud zoom — feeds window.__wxCam read by Three.js rAF */
  ScrollTrigger.create({
    trigger: 'body',
    start: 'top top',
    end: 'bottom bottom',
    scrub: 1.8,
    onUpdate: function (self) {
      if (!window.__wxCam) return;
      var p = self.progress;
      window.__wxCam.z = 145 - p * 112;
      window.__wxCam.y = 14  - p * 10;
      window.__wxCam.x = Math.sin(p * Math.PI * 1.4) * 18;
    }
  });

  /* Hero reveals */
  gsap.timeline({ delay: 0.28 })
    .to('#wx-eyebrow',  { opacity: 1, y: 0, duration: 0.52, ease: 'power3.out' })
    .to('.wx-hw-inner', { y: '0%', duration: 1.05, ease: 'power4.out', stagger: 0.11 }, '-=0.22')
    .to('#wx-lede',     { opacity: 1, y: 0, duration: 0.72, ease: 'power2.out' }, '-=0.60')
    .to('#wx-ctas',     { opacity: 1, y: 0, duration: 0.58, ease: 'power2.out' }, '-=0.50');

  /* Generic scroll-reveal text blocks */
  ScrollTrigger.batch('.wx-sr', {
    start: 'top 88%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.08, duration: 0.65, ease: 'power2.out' });
    }
  });

  /* Comparison table */
  gsap.to('.wx-table', {
    opacity: 1, y: 0, duration: 0.75, ease: 'power2.out',
    scrollTrigger: { trigger: '.wx-table', start: 'top 88%', once: true }
  });

  /* Differentiator rows — slide from left */
  ScrollTrigger.batch('.wx-feat-row', {
    start: 'top 88%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, x: 0, stagger: 0.12, duration: 0.72, ease: 'power2.out' });
    }
  });

  /* Proof stats + count-up animation */
  ScrollTrigger.batch('.wx-proof-stat', {
    start: 'top 88%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.14, duration: 0.70, ease: 'power2.out' });
      document.querySelectorAll('.wx-proof-num').forEach(function (el, idx) {
        var text     = el.textContent.trim();
        var numMatch = text.match(/\d+/);
        if (!numMatch) return;
        var target = parseInt(numMatch[0]);
        var prefix = text.slice(0, text.indexOf(numMatch[0]));
        var suffix = text.slice(text.indexOf(numMatch[0]) + numMatch[0].length);
        var obj = { val: 0 };
        gsap.to(obj, {
          val: target, duration: 1.80, ease: 'power3.out', delay: 0.18 + idx * 0.14,
          onUpdate: function () { el.textContent = prefix + Math.round(obj.val) + suffix; }
        });
      });
    }
  });

  gsap.to('.wx-proof-right', {
    opacity: 1, y: 0, duration: 0.80, ease: 'power2.out',
    scrollTrigger: { trigger: '.wx-proof-right', start: 'top 86%', once: true }
  });

  gsap.to('.wx-diff-right', {
    opacity: 1, y: 0, duration: 0.80, ease: 'power2.out',
    scrollTrigger: { trigger: '.wx-diff-right', start: 'top 86%', once: true }
  });

  gsap.to('.wx-proof-disclaimer', {
    opacity: 1, y: 0, duration: 0.6, ease: 'power2.out',
    scrollTrigger: { trigger: '.wx-proof-disclaimer', start: 'top 90%', once: true }
  });

  ScrollTrigger.batch('.wx-cta-el', {
    start: 'top 90%', once: true,
    onEnter: function (batch) {
      gsap.to(batch, { opacity: 1, y: 0, stagger: 0.10, duration: 0.60, ease: 'power2.out' });
    }
  });

  ['#wx-compare','#wx-diff','#wx-proof','#wx-cta'].forEach(function (sel) {
    ScrollTrigger.create({
      trigger: sel, start: 'top bottom',
      toggleClass: { targets: sel, className: 'wx-section-in' }
    });
  });
}());
