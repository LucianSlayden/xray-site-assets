/* X-Ray Geoanalytics — home page hero animation.

   Behaviour:
   1. Page loads at the top with the video on frame 0 and the headline
      visible. The page is held in place (no scrolling).
   2. Once the user has scrolled down a little (TRIGGER_DELTA of wheel,
      touch or key movement), the video plays forward while the page stays
      held. The headline lifts and fades out.
   3. When the video ends it stays on its last frame, the four hexagon
      labels fade in and the page is released where it is (no jump). The
      hero stays pinned for DWELL_PX of scrolling before it moves up
      (the room comes from .xr-hero's height in xray.css).
   4. Scrolling back up to the top holds the page again and plays the
      video in reverse; the headline returns. The user can then scroll
      down again, and so on. Changing direction mid-play turns the video
      around.

   Reverse playback: browsers can't play video backwards smoothly by
   seeking. If the <video> has data-reverse-src (the same clip encoded
   back to front), that clip is played forwards instead, swapped in on
   the matching frame. Without it we fall back to stepping currentTime.

   The page is held by cancelling wheel/touch/key scrolling rather than by
   overflow:hidden, so the scrollbar never disappears and nothing on the
   page shifts when it is released. */

(function () {
  'use strict';

  const RATE            = 1.35;  // playback speed, both directions
  const TRIGGER_DELTA   = 140;   // px of deliberate scrolling needed to start a play
  const GESTURE_RESET   = 650;   // ms of no scrolling before the count restarts
  const TEXT_FADE_OUT_S = 0.6;
  const TEXT_FADE_IN_S  = 0.55;
  const BULLETS_FADE_S  = 0.55;
  const TOP_EPS         = 2;     // px from the top that counts as "at the top"
  const STALL_MS        = 8000;  // give up if the video never starts playing

  const log = (...a) => { try { console.log('[xray-hero]', ...a); } catch (e) {} };

  function init() {
    const hero = document.querySelector('.xr-hero');
    if (!hero) return;

    const fwd     = hero.querySelector('.xr-hero-video');
    const content = hero.querySelector('.xr-hero-content');
    const bullets = hero.querySelector('.xr-hero-bullets');
    if (!fwd || !content || !bullets) { log('missing required DOM nodes'); return; }

    const showBullets = () => { bullets.classList.add('in'); if (window.gsap) gsap.set(bullets, { autoAlpha: 1 }); };

    if (!window.gsap) { log('GSAP missing, inert hero'); showBullets(); return; }

    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      log('reduced motion, skip animation');
      try { fwd.pause(); } catch (e) {}
      showBullets();
      return;
    }

    // Always start a visit at the top so the animation begins from frame 0.
    if ('scrollRestoration' in history) history.scrollRestoration = 'manual';

    gsap.set(bullets, { autoAlpha: 0 });
    bullets.classList.remove('in');

    /* ──────────── Videos ──────────── */
    let rev = null;
    const revSrc = fwd.getAttribute('data-reverse-src');
    if (revSrc) {
      rev = document.createElement('video');
      rev.className = fwd.className + ' xr-hero-video-rev';
      rev.muted = true;
      rev.playsInline = true;
      rev.preload = 'auto';
      rev.setAttribute('muted', '');
      rev.setAttribute('playsinline', '');
      rev.setAttribute('disableremoteplayback', '');
      rev.setAttribute('aria-hidden', 'true');
      rev.src = revSrc;
      fwd.after(rev);
      rev.addEventListener('error', () => { log('reverse clip failed, using fallback'); rev.remove(); rev = null; });
    }
    let showingRev = false;
    function show(which) {
      showingRev = which === 'rev';
      if (rev) rev.classList.toggle('is-active', showingRev);
    }

    const duration = () => (Number.isFinite(fwd.duration) && fwd.duration > 0 ? fwd.duration : 0);
    // Position on the forward timeline, whichever clip is on screen.
    const position = () => (showingRev && rev ? Math.max(0, duration() - rev.currentTime) : fwd.currentTime || 0);

    function seek(v, t) {
      return new Promise((resolve) => {
        if (Math.abs((v.currentTime || 0) - t) < 0.001) { resolve(); return; }
        const done = () => { v.removeEventListener('seeked', done); resolve(); };
        v.addEventListener('seeked', done);
        try { v.currentTime = t; } catch (e) { done(); }
      });
    }
    function play(v) {
      try {
        v.playbackRate = RATE;
        const p = v.play();
        if (p && typeof p.catch === 'function') p.catch(() => {});
      } catch (e) {}
    }

    /* ──────────── State ──────────── */
    // idle: frame 0, held at top · forward: playing forward, held
    // completed: last frame, released · reverse: playing back, held
    let state = 'idle';
    let token = 0;           // bumps on every direction change; stale callbacks check it
    let stepRaf = null;      // fallback reverse stepping
    let stallTimer = null;

    function stopStepping() { if (stepRaf) { cancelAnimationFrame(stepRaf); stepRaf = null; } }

    /* ──────────── Holding the page ──────────── */
    let held = false;
    let heldY = 0;
    function hold() {
      if (held) return;
      held = true;
      heldY = window.scrollY;
      document.documentElement.classList.add('xr-hero-held');
    }
    function release() {
      held = false;
      document.documentElement.classList.remove('xr-hero-held');
    }

    /* ──────────── Forward ──────────── */
    function playForward() {
      if (state === 'forward' || state === 'completed') return;
      log('forward from', state);
      const my = ++token;
      const from = position();
      state = 'forward';
      hold();
      stopStepping();

      gsap.to(bullets, { autoAlpha: 0, duration: 0.2, overwrite: true, onComplete: () => bullets.classList.remove('in') });
      gsap.to(content, { y: -60, autoAlpha: 0, duration: TEXT_FADE_OUT_S, ease: 'power2.out', overwrite: true });

      if (showingRev && rev) {
        rev.pause();
        seek(fwd, from).then(() => {
          if (my !== token) return;
          show('fwd');
          play(fwd);
        });
      } else {
        play(fwd);
      }

      clearTimeout(stallTimer);
      stallTimer = setTimeout(() => {
        if (state === 'forward' && my === token && (fwd.currentTime || 0) < 0.05) fail('video did not start');
      }, STALL_MS);
    }

    function forwardDone() {
      if (state !== 'forward') return;
      log('forward done');
      clearTimeout(stallTimer);
      state = 'completed';
      leftTop = false;
      try { fwd.pause(); } catch (e) {}
      bullets.classList.add('in');
      gsap.to(bullets, { autoAlpha: 1, duration: BULLETS_FADE_S, ease: 'power2.out', overwrite: true });
      release();
    }
    fwd.addEventListener('ended', forwardDone);
    fwd.addEventListener('playing', () => clearTimeout(stallTimer));

    /* ──────────── Reverse ──────────── */
    function playReverse() {
      if (state === 'idle' || state === 'reverse') return;
      log('reverse from', state);
      const my = ++token;
      const from = position();
      state = 'reverse';
      hold();
      clearTimeout(stallTimer);
      try { fwd.pause(); } catch (e) {}

      gsap.to(bullets, {
        autoAlpha: 0, duration: BULLETS_FADE_S * 0.6, ease: 'power1.out', overwrite: true,
        onComplete: () => { bullets.classList.remove('in'); clearSticky(); },
      });
      // Bring the headline back as the video nears frame 0, mirroring the forward fade.
      const remaining = from / RATE;
      gsap.to(content, {
        y: 0, autoAlpha: 1, duration: TEXT_FADE_IN_S, ease: 'power2.out', overwrite: true,
        delay: Math.max(0, remaining - TEXT_FADE_IN_S - 0.15),
      });

      if (from <= 0.01) { reverseDone(my); return; }

      if (rev && rev.readyState >= 2 && duration()) {
        seek(rev, Math.max(0, duration() - from)).then(() => {
          if (my !== token) return;
          show('rev');
          play(rev);
        });
      } else {
        stepBack(from, my);
      }
    }

    function reverseDone(my) {
      if (my !== token || state !== 'reverse') return;
      log('reverse done');
      stopStepping();
      if (rev) rev.pause();
      seek(fwd, 0).then(() => {
        if (my !== token) return;
        show('fwd');
        state = 'idle';
        // Still at the top and still held: the next scroll down plays it again.
      });
    }
    if (rev) rev.addEventListener('ended', () => reverseDone(token));

    // Fallback when no reverse clip: step currentTime back, waiting for each
    // frame to be presented before asking for the next one.
    function stepBack(from, my) {
      const start = performance.now();
      const useVFC = typeof fwd.requestVideoFrameCallback === 'function';
      function step(now) {
        if (my !== token) return;
        const t = from - ((now - start) / 1000) * RATE;
        if (t <= 0) { reverseDone(my); return; }
        try { fwd.currentTime = t; } catch (e) {}
        if (useVFC) fwd.requestVideoFrameCallback(() => { stepRaf = requestAnimationFrame(step); });
        else stepRaf = requestAnimationFrame(step);
      }
      stepRaf = requestAnimationFrame(step);
    }

    /* ──────────── Failure ──────────── */
    let failed = false;
    function fail(reason) {
      if (failed) return;
      failed = true;
      log('video failed:', reason);
      ++token;
      stopStepping();
      state = 'completed';
      release();
      showBullets();
    }
    fwd.addEventListener('error', () => fail('error event'));
    if (fwd.error) fail('error at init');

    /* ──────────── Scroll gestures ──────────── */
    let acc = 0, accDir = 0, lastGesture = 0;
    let leftTop = false; // has the user scrolled away since the forward play finished?

    function gesture(dy, e) {
      if (!dy || failed) return;
      const now = performance.now();
      const dir = dy > 0 ? 1 : -1;
      if (now - lastGesture > GESTURE_RESET || dir !== accDir) { acc = 0; accDir = dir; }
      lastGesture = now;
      acc += Math.abs(dy);
      const eat = () => { if (e && e.cancelable) e.preventDefault(); };
      const atTop = window.scrollY <= TOP_EPS;

      if (state === 'idle') {
        eat();
        if (dir > 0 && acc >= TRIGGER_DELTA) { acc = 0; playForward(); }
      } else if (state === 'forward') {
        eat();
        if (dir < 0 && acc >= TRIGGER_DELTA) { acc = 0; playReverse(); }
      } else if (state === 'reverse') {
        eat();
        if (dir > 0 && acc >= TRIGGER_DELTA) { acc = 0; playForward(); }
      } else if (state === 'completed' && atTop && dir < 0) {
        eat();
        if (acc >= TRIGGER_DELTA) { acc = 0; playReverse(); }
      }
    }

    window.addEventListener('wheel', (e) => {
      if (e.ctrlKey) return; // pinch / ctrl-zoom
      let dy = e.deltaY;
      if (e.deltaMode === 1) dy *= 16;
      else if (e.deltaMode === 2) dy *= window.innerHeight;
      gesture(dy, e);
    }, { passive: false });

    let touchY = null;
    window.addEventListener('touchstart', (e) => { touchY = e.touches[0] ? e.touches[0].clientY : null; }, { passive: true });
    window.addEventListener('touchmove', (e) => {
      if (touchY == null || !e.touches[0]) return;
      const y = e.touches[0].clientY;
      gesture(touchY - y, e);
      touchY = y;
    }, { passive: false });
    window.addEventListener('touchend', () => { touchY = null; }, { passive: true });

    const KEY_DELTA = {
      ArrowDown: 60, ArrowUp: -60,
      PageDown: 9999, PageUp: -9999, ' ': 9999, Spacebar: 9999,
      End: 9999, Home: -9999,
    };
    window.addEventListener('keydown', (e) => {
      const t = e.target;
      if (t && (t.isContentEditable || /^(INPUT|TEXTAREA|SELECT)$/.test(t.tagName))) return;
      let d = KEY_DELTA[e.key];
      if (d == null) return;
      if (e.key === ' ' && e.shiftKey) d = -d;
      gesture(d, e);
    });

    // Scrollbar drags and anything else that moves the page.
    window.addEventListener('scroll', () => {
      const y = window.scrollY;
      if (held) {
        if (y !== heldY) window.scrollTo({ top: heldY, left: 0, behavior: 'instant' });
        return;
      }
      if (state !== 'completed') return;
      if (y > TOP_EPS) leftTop = true;
      else if (leftTop) playReverse(); // came back up to the top
    }, { passive: true });

    /* ──────────── Initial state ──────────── */
    function onReady() { if (state === 'idle' && fwd.currentTime > 0) fwd.currentTime = 0; }
    if (fwd.readyState >= 1) onReady(); else fwd.addEventListener('loadedmetadata', onReady, { once: true });
    if (window.scrollY <= TOP_EPS) hold();
    else {
      // Landed part way down (e.g. a #link): show the finished hero.
      state = 'completed';
      leftTop = true;
      gsap.set(content, { y: -60, autoAlpha: 0 });
      showBullets();
      const toEnd = () => { try { fwd.currentTime = duration(); } catch (e) {} };
      if (fwd.readyState >= 1) toEnd(); else fwd.addEventListener('loadedmetadata', toEnd, { once: true });
    }

    /* ──────────── Hexagon labels: sticky hover ──────────── */
    const bulletEls = bullets.querySelectorAll('.xr-hero-bullet');

    // Pin each label to its hexagon. Centres are fractions of the video
    // frame (measured on the final frame), mapped onto where the frame is
    // actually drawn: object-fit: contain, anchored right, centred vertically.
    const HEX_CENTRES = [[0.3454, 0.2750], [0.4461, 0.4000], [0.5117, 0.5687], [0.5638, 0.7979]];
    const mobile = window.matchMedia('(max-width: 980px)');
    function placeBullets() {
      if (mobile.matches) { bulletEls.forEach((el) => { el.style.left = ''; el.style.top = ''; }); return; }
      const bw = fwd.clientWidth, bh = fwd.clientHeight;
      const vw = fwd.videoWidth || 16, vh = fwd.videoHeight || 9;
      if (!bw || !bh) return;
      const scale = Math.min(bw / vw, bh / vh);
      const cw = vw * scale, ch = vh * scale;
      const x0 = bw - cw, y0 = (bh - ch) / 2;
      bulletEls.forEach((el, i) => {
        const c = HEX_CENTRES[i];
        if (!c) return;
        el.style.left = (x0 + c[0] * cw).toFixed(1) + 'px';
        el.style.top  = (y0 + c[1] * ch).toFixed(1) + 'px';
      });
    }
    placeBullets();
    fwd.addEventListener('loadedmetadata', placeBullets);
    window.addEventListener('resize', placeBullets, { passive: true });

    // One panel open at a time now that panels sit over the hexagons.
    function lockBullet(el) {
      bulletEls.forEach((other) => { if (other !== el) other.classList.remove('locked'); });
      el.classList.add('locked', 'seen');
    }
    function clearSticky() { bulletEls.forEach((el) => el.classList.remove('locked', 'seen')); }
    bulletEls.forEach((el) => {
      el.addEventListener('mouseenter', () => lockBullet(el));
      el.addEventListener('focusin',    () => lockBullet(el));
      el.addEventListener('touchstart', () => lockBullet(el), { passive: true });
    });

    // Open a panel when the pointer comes within 20 px of a hexagon centre.
    const PROXIMITY_PX = 20;
    let lastMove = 0;
    window.addEventListener('pointermove', (e) => {
      const now = e.timeStamp || performance.now();
      if (now - lastMove < 16) return;
      lastMove = now;
      if (!bullets.classList.contains('in')) return;
      for (let i = 0; i < bulletEls.length; i++) {
        const el = bulletEls[i];
        if (el.classList.contains('locked')) continue;
        const r = el.getBoundingClientRect();
        const dx = e.clientX - (r.left + r.width / 2);
        const dy = e.clientY - (r.top + r.height / 2);
        if (dx * dx + dy * dy <= PROXIMITY_PX * PROXIMITY_PX) lockBullet(el);
      }
    }, { passive: true });

    window.__xrHero = { get state() { return state; }, get held() { return held; }, position };
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init, { once: true });
  else init();
})();
