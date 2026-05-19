/* X-Ray Geoanalytics — Hero Animation Controller (GSAP ScrollTrigger v3)

   Behavior:
   ──────────────────────────────────────────────────────────────────
   1. Page load with scroll == 0  → video frozen on frame 0, headline +
      CTAs visible, the WHOLE PAGE IS SCROLL-LOCKED (per the May 2026
      "additional index instructions" doc). User cannot scroll until
      the hero animation completes.
   2. First downward gesture (wheel / arrow-down / page-down / space /
      touch / click) → fires the forward play while keeping the page
      locked, so the gesture itself does not move the document.
        • Video plays at 1.35× native speed.
        • Headline + paragraph + buttons fade up and out.
        • At the end of the clip, the 4 reveal lines fade in.
   3. When the animation completes, the scroll-lock is released AND
      the page is programmatically nudged to `PIN_SCROLL_PX + 24` so
      the user lands at the post-hero content with the reveal lines
      visible. From here scrolling works normally.
   4. User scrolls BACK UP past the trigger threshold → reverse play:
        • Reveal lines fade out.
        • Video plays in REVERSE at 1.35×. We attempt negative playbackRate
          first (Chrome/Firefox); fall back to a GSAP currentTime tween,
          fall back to rAF stepping as the last resort.
        • Headline + paragraph + buttons fade back in.
   5. Reveal lines support sticky-hover: once the user hovers within 20 px
      of a green hexagon, the body panel locks open and stays until the
      hero animation reverses past the trigger.
*/

(function () {
  'use strict';

  /* ──────────── State machine ────────────
     idle       — video at frame 0, content visible, bullets hidden.
     forward    — forward play in progress.
     completed  — forward done, freeze on last frame, bullets visible.
     reverse    — reverse play in progress (going back to frame 0). */
  let state = 'idle';
  const log = (...a) => { try { console.log('[xray-hero]', ...a); } catch (e) {} };

  function init() {
    const hero = document.querySelector('.xr-hero');
    if (!hero) return;

    const video    = hero.querySelector('.xr-hero-video');
    const content  = hero.querySelector('.xr-hero-content');
    const bullets  = hero.querySelector('.xr-hero-bullets');
    const fill     = hero.querySelector('.xr-hero-progress-fill');
    const progLbl  = hero.querySelector('.xr-hero-progress-label');
    if (!video || !content || !bullets) {
      log('missing required DOM nodes');
      return;
    }

    if (!window.gsap) {
      log('GSAP missing — inert hero');
      return;
    }

    /* ──────────── Reduced-motion fail-safe ────────────
       Honour prefers-reduced-motion: skip the scroll-lock + scrub
       entirely so the page is immediately scrollable and content
       (including reveal bullets) is shown. */
    const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduceMotion) {
      log('reduced-motion → skip hero animation');
      try { video.pause(); video.removeAttribute('autoplay'); } catch (e) {}
      bullets.classList.add('in');
      gsap.set(bullets, { autoAlpha: 1 });
      return;
    }

    /* ──────────── Tuning ──────────── */
    const PLAYBACK_RATE     = 1.35;
    const TEXT_FADE_OUT_S   = 0.6;
    const TEXT_FADE_IN_S    = 0.55;
    const BULLETS_FADE_S    = 0.55;
    const PIN_SCROLL_PX     = 720;
    const TRIGGER_SCROLL_PX = 16;

    /* Hide bullets at start. */
    gsap.set(bullets, { autoAlpha: 0 });
    bullets.classList.remove('in');

    /* ──────────── Video readiness ──────────── */
    let videoReady = false;
    function onMeta() {
      if (videoReady) return;
      videoReady = true;
      try { video.currentTime = 0; video.pause(); } catch (e) {}
      log('video ready, duration=', video.duration);
    }
    video.addEventListener('loadedmetadata', onMeta, { once: true });
    video.addEventListener('loadeddata',     onMeta, { once: true });
    if (video.readyState >= 1) onMeta();

    /* ──────────── Helpers ──────────── */
    let reverseRafId = null;
    let reverseTween = null;
    let negativeRateSupported = null; // unknown until tested
    // True during the brief unlock/scrollTo/refresh window after forward
    // completion. Blocks playReverse() from firing on a spurious onLeaveBack
    // that ScrollTrigger fires when it recalculates positions with scrollY=0.
    let settlingAfterComplete = false;

    function stopReverse() {
      if (reverseRafId) { cancelAnimationFrame(reverseRafId); reverseRafId = null; }
      if (reverseTween) { reverseTween.kill(); reverseTween = null; }
    }

    /* Try setting a negative playbackRate. If the browser doesn't
       support it, currentTime won't move (or playbackRate will get
       silently clamped to 0/positive). We measure 50ms after enabling
       reverse to see if currentTime actually decreased. */
    function tryNegativeRatePlay(from) {
      try {
        video.playbackRate = -PLAYBACK_RATE;
      } catch (e) { return false; }
      // If the browser silently rejected, playbackRate won't be negative.
      if (video.playbackRate >= 0) return false;
      try {
        video.currentTime = from;
        const p = video.play();
        if (p && typeof p.catch === 'function') p.catch(() => {});
      } catch (e) { return false; }
      return true;
    }

    /* Fallback: rAF / requestVideoFrameCallback step from `from` to 0.
       Prefer requestVideoFrameCallback in Chrome/Edge so each currentTime
       update is presented to the user before we advance — this removes
       the perceptible "stutter" where rAF outpaces the video decoder. */
    function rafRewind(from) {
      const startTs = performance.now();
      const useVFC = typeof video.requestVideoFrameCallback === 'function';
      function step(now) {
        const dt = (now - startTs) / 1000;
        const t = from - dt * PLAYBACK_RATE;
        if (t <= 0) {
          finishReverse();
          return;
        }
        try { video.currentTime = t; } catch (e) {}
        if (useVFC) {
          // Re-schedule after the next decoded frame is actually visible.
          video.requestVideoFrameCallback((nowDOMHi) => {
            reverseRafId = requestAnimationFrame(step);
          });
        } else {
          reverseRafId = requestAnimationFrame(step);
        }
      }
      reverseRafId = requestAnimationFrame(step);
    }

    function finishReverse() {
      settlingAfterComplete = false;
      try { video.currentTime = 0; video.pause(); video.playbackRate = PLAYBACK_RATE; } catch (e) {}
      stopReverse();
      state = 'idle';
      log('reverse → idle');
    }

    /* ──────────── playForward ──────────── */
    function playForward() {
      if (state === 'forward' || state === 'completed') return;
      log('playForward from', state);
      stopReverse();
      state = 'forward';

      // Lift + fade out headline / paragraph / CTAs.
      gsap.to(content, {
        y: -60,
        autoAlpha: 0,
        duration: TEXT_FADE_OUT_S,
        ease: 'power2.out',
        overwrite: 'auto',
      });

      // Play video forward at 1.35×, starting from current position.
      try {
        video.playbackRate = PLAYBACK_RATE;
        const p = video.play();
        if (p && typeof p.catch === 'function') p.catch(() => {});
      } catch (e) {}
    }

    /* ──────────── playReverse ──────────── */
    function playReverse() {
      if (state === 'idle' || state === 'reverse') return;
      if (settlingAfterComplete) return;
      log('playReverse from', state);
      stopReverse();
      state = 'reverse';

      // 1. Stop forward playback so it doesn't fight reverse.
      try { video.pause(); } catch (e) {}

      // 2. Snapshot where we are.
      const from = (Number.isFinite(video.currentTime) ? video.currentTime : (video.duration || 0));
      if (from <= 0.001) {
        finishReverse();
        return;
      }

      // 3. Fade bullets out + unlock sticky hovers.
      gsap.to(bullets, {
        autoAlpha: 0,
        duration: BULLETS_FADE_S * 0.6,
        ease: 'power1.out',
        overwrite: 'auto',
        onComplete: () => { bullets.classList.remove('in'); clearSticky(); },
      });

      // 4. Bring text back.
      gsap.to(content, {
        y: 0,
        autoAlpha: 1,
        duration: TEXT_FADE_IN_S,
        ease: 'power2.in',
        overwrite: 'auto',
      });

      // 5. Try the three reverse-play strategies in order.
      if (negativeRateSupported !== false) {
        const ok = tryNegativeRatePlay(from);
        if (ok) {
          // Watch for it to reach 0; some browsers fire 'timeupdate' during reverse.
          const stopWatcher = () => {
            if (state !== 'reverse') { video.removeEventListener('timeupdate', onTU); return; }
            if (video.currentTime <= 0.05) {
              video.removeEventListener('timeupdate', onTU);
              finishReverse();
            }
          };
          const onTU = stopWatcher;
          video.addEventListener('timeupdate', onTU);
          // Also fail-safe poll: if currentTime doesn't actually decrease within
          // ~120 ms, declare negative rate unsupported and switch strategies.
          const t0 = from;
          setTimeout(() => {
            if (state !== 'reverse') return;
            if (video.currentTime >= t0 - 0.005) {
              log('negative playbackRate not actually decreasing — fallback to GSAP tween');
              negativeRateSupported = false;
              try { video.pause(); video.playbackRate = PLAYBACK_RATE; } catch (e) {}
              video.removeEventListener('timeupdate', onTU);
              gsapRewind(video.currentTime || from);
            }
          }, 140);
          return;
        }
        negativeRateSupported = false;
      }
      gsapRewind(from);
    }

    function gsapRewind(from) {
      const dur = from / PLAYBACK_RATE;
      reverseTween = gsap.to(video, {
        currentTime: 0,
        duration: dur,
        ease: 'none',
        overwrite: 'auto',
        onComplete: () => {
          reverseTween = null;
          finishReverse();
        },
        onInterrupt: () => {
          // If GSAP tween was killed, drop to rAF for the remainder.
          reverseTween = null;
          if (state === 'reverse') {
            const cur = Number.isFinite(video.currentTime) ? video.currentTime : 0;
            if (cur > 0.001) rafRewind(cur);
            else finishReverse();
          }
        }
      });
    }

    /* ──────────── Scroll-lock (per May 2026 instruction) ────────────
       The page is unscrollable from the moment it loads at scroll-top.
       The animation fires on the user's first scroll-down gesture
       (wheel/touch/key/click) instead of from real scroll. When the
       forward animation finishes, scroll is unlocked AND the page is
       programmatically nudged to just past the pin so the user lands
       at the post-hero content. */
    let scrollLocked = false;
    function lockScroll() {
      if (scrollLocked) return;
      scrollLocked = true;
      document.documentElement.classList.add('xr-scroll-locked');
      document.body.classList.add('xr-scroll-locked');
      // Re-pin scrollY to 0 on every scroll attempt while locked.
      window.addEventListener('scroll', forceScrollTop, { passive: true });
    }
    function unlockScroll() {
      if (!scrollLocked) return;
      scrollLocked = false;
      document.documentElement.classList.remove('xr-scroll-locked');
      document.body.classList.remove('xr-scroll-locked');
      window.removeEventListener('scroll', forceScrollTop);
    }
    function forceScrollTop() {
      if (scrollLocked && window.scrollY !== 0) {
        window.scrollTo(0, 0);
      }
    }
    function eatGesture(e) {
      // Only when scroll is still locked and we're at the top.
      if (!scrollLocked) return;
      // Don't block downward scroll attempt — that's the trigger,
      // but DO prevent the page from actually scrolling.
      if (e.cancelable) e.preventDefault();
    }
    /* Initial-state lock. We only lock if the user actually loads the
       page at the top — if they followed a deep link, leave them be. */
    if (window.scrollY < 4) lockScroll();

    /* ──────────── Video-failure fail-safe ────────────
       If the video 404s, errors during decode, or never reaches the
       'have current data' state within 6 s, drop the scroll-lock and
       reveal the bullets so the page is not perma-stuck on the hero. */
    let videoFailed = false;
    function markVideoFailed(reason) {
      if (videoFailed) return;
      videoFailed = true;
      log('video failed:', reason);
      unlockScroll();
      bullets.classList.add('in');
      gsap.set(bullets, { autoAlpha: 1 });
      state = 'completed';
    }
    video.addEventListener('error', () => markVideoFailed('error event'));
    // Initial check — error may have fired before our listener was attached.
    if (video.error || video.networkState === HTMLMediaElement.NETWORK_NO_SOURCE) {
      markVideoFailed('error at init');
    }
    setTimeout(() => {
      if (!videoReady && !videoFailed) markVideoFailed('readiness timeout');
    }, 6000);

    /* First scroll-down gesture triggers playForward and lets the
       animation run while keeping the page itself locked. After the
       animation completes the lock is released and we park the user
       past the pin. */
    let firstGestureHandled = false;
    function maybeFireForward(e) {
      if (firstGestureHandled || !scrollLocked || state !== 'idle') return;
      // Filter: only "go forward" intents.
      if (e.type === 'wheel'    && e.deltaY <= 0)                                          return;
      if (e.type === 'keydown') {
        const k = e.key;
        if (!['ArrowDown','PageDown','End',' ','Spacebar'].includes(k)) return;
      }
      firstGestureHandled = true;
      // Soak this gesture so it doesn't pre-scroll the page.
      if (e.cancelable && (e.type === 'wheel' || e.type === 'touchmove' || e.type === 'keydown')) {
        e.preventDefault();
      }
      playForward();
    }
    /* Use capture phase + non-passive so we can preventDefault. */
    window.addEventListener('wheel',     (e) => { eatGesture(e); maybeFireForward(e); }, { passive: false });
    window.addEventListener('touchmove', (e) => { eatGesture(e); maybeFireForward(e); }, { passive: false });
    window.addEventListener('keydown',   maybeFireForward);
    window.addEventListener('click',     () => { if (scrollLocked) maybeFireForward({ type: 'click', deltaY: 1 }); });

    /* ──────────── Forward completion ──────────── */
    video.addEventListener('ended', () => {
      if (state !== 'forward') return;
      state = 'completed';
      settlingAfterComplete = true; // block reverse until unlock+scroll settle is done
      log('video ended → completed');
      try {
        video.currentTime = Math.max(0, (video.duration || 0) - 0.03);
        video.pause();
      } catch (e) {}
      bullets.classList.add('in');
      gsap.to(bullets, {
        autoAlpha: 1,
        duration: BULLETS_FADE_S,
        ease: 'power2.out',
        overwrite: 'auto',
        onComplete: () => {
          // Unlock scroll first, then land the user just past the trigger
          // threshold so the hero is still visible with bullets showing.
          // settlingAfterComplete stays true until after scrollTo so the
          // reverse listener cannot fire during the jump.
          unlockScroll();
          requestAnimationFrame(() => {
            window.scrollTo(0, PIN_SCROLL_PX + 24);
            requestAnimationFrame(() => {
              settlingAfterComplete = false;
              log('post-anim scroll →', window.scrollY);
            });
          });
        }
      });
    });
    /* Defensive: trigger ended near the duration to handle codec quirks. */
    video.addEventListener('timeupdate', () => {
      if (state !== 'forward') return;
      if (!Number.isFinite(video.duration)) return;
      if (video.currentTime >= video.duration - 0.08) {
        video.dispatchEvent(new Event('ended'));
      }
    });

    /* ──────────── Sticky hover ──────────── */
    const bulletEls = bullets.querySelectorAll('.xr-hero-bullet');
    function lockBullet(el) { el.classList.add('locked'); }
    function clearSticky() {
      bulletEls.forEach((el) => el.classList.remove('locked'));
    }
    bulletEls.forEach((el) => {
      el.addEventListener('mouseenter', () => lockBullet(el));
      el.addEventListener('focusin',    () => lockBullet(el));
      el.addEventListener('touchstart', () => lockBullet(el), { passive: true });
    });

    const PROXIMITY_PX = 20;
    let lastMouseMs = 0;
    function onPointerMoveHero(e) {
      const now = e.timeStamp || performance.now();
      if (now - lastMouseMs < 16) return;
      lastMouseMs = now;
      if (!bullets.classList.contains('in')) return;
      const px = e.clientX, py = e.clientY;
      for (let i = 0; i < bulletEls.length; i++) {
        const el = bulletEls[i];
        if (el.classList.contains('locked')) continue;
        const r = el.getBoundingClientRect();
        const cx = r.left + r.width / 2;
        const cy = r.top  + r.height / 2;
        const dx = px - cx, dy = py - cy;
        if (dx * dx + dy * dy <= PROXIMITY_PX * PROXIMITY_PX) lockBullet(el);
      }
    }
    window.addEventListener('pointermove', onPointerMoveHero, { passive: true });

    /* Progress bar — driven by actual video playback, not scroll position.
       This works correctly during scroll-lock (scrollY stays at 0) and
       during the reverse (currentTime decreases). */
    video.addEventListener('timeupdate', () => {
      if (!Number.isFinite(video.duration) || !video.duration) return;
      const p = video.currentTime / video.duration;
      if (fill)    fill.style.width    = (p * 100).toFixed(1) + '%';
      if (progLbl) progLbl.textContent = String(Math.round(p * 100)).padStart(2, '0') + '%';
    });

    /* Single scroll listener drives ALL state transitions.
       The hero section's CSS gives .xr-hero-pin (position:sticky) 720 px
       of scroll room — no GSAP ScrollTrigger pin needed.
       Forward trigger: subsequent plays after a reverse (the first play
         is handled by maybeFireForward above while scroll-locked).
       Reverse trigger: user scrolls back up past the trigger threshold. */
    window.addEventListener('scroll', () => {
      const sy = window.scrollY;
      if (state === 'idle' && !scrollLocked && sy >= TRIGGER_SCROLL_PX) {
        playForward();
        return;
      }
      if (state === 'completed' && !settlingAfterComplete && sy < TRIGGER_SCROLL_PX) {
        playReverse();
      }
    }, { passive: true });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init, { once: true });
  } else {
    init();
  }
})();
