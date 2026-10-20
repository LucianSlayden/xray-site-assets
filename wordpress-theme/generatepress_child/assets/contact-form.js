/* Contact forms (Learn More, Investors): keep a visitor's draft if the
 * server sends them back with an error, stop double sends, and bring the
 * result message into view. */
(function () {
  var forms = document.querySelectorAll('form.xr-contact-form');
  if (!forms.length) return;

  var FIELDS = ['name', 'email', 'company', 'interest', 'message'];
  var sent = new URLSearchParams(location.search).get('sent');
  var store = null;
  try { store = window.sessionStorage; } catch (e) {}

  function read(key) {
    try { return JSON.parse(store.getItem(key) || 'null'); } catch (e) { return null; }
  }
  function write(key, value) {
    try { value === null ? store.removeItem(key) : store.setItem(key, JSON.stringify(value)); } catch (e) {}
  }

  forms.forEach(function (form) {
    var source = form.elements.source ? form.elements.source.value : 'form';
    var key = 'xr-contact-draft:' + source;
    var button = form.querySelector('button[type="submit"]');

    if (store) {
      if (sent === '1') {
        write(key, null);
      } else if (sent) {
        var draft = read(key);
        if (draft) {
          FIELDS.forEach(function (name) {
            var el = form.elements[name];
            if (!el || el.type === 'hidden' || !draft[name]) return;
            // Choices (a select, or a radio group with no tagName) always take the draft.
            if (el.tagName === 'SELECT' || !el.tagName || !el.value) el.value = draft[name];
          });
        }
      }
    }

    // Pages can be served from cache after their nonce has lapsed, so fetch a
    // fresh one before sending. If that fails, send with the page's own.
    var nonceUrl = form.getAttribute('data-nonce-url');
    var nonceField = form.elements.xray_contact_nonce;
    var fresh = null;
    function refreshNonce() {
      if (fresh || !nonceUrl || !nonceField || !window.fetch) return fresh;
      var body = new URLSearchParams();
      body.append('action', 'xray_contact_nonce');
      fresh = fetch(nonceUrl, { method: 'POST', body: body, credentials: 'same-origin' })
        .then(function (r) { return r.ok ? r.json() : null; })
        .then(function (data) { if (data && data.nonce) nonceField.value = data.nonce; })
        .catch(function () {});
      return fresh;
    }
    form.addEventListener('focusin', refreshNonce);

    var sending = false;
    form.addEventListener('submit', function (e) {
      if (sending) return;
      var pending = refreshNonce();
      if (pending) {
        e.preventDefault();
        sending = true;
        var go = function () { HTMLFormElement.prototype.submit.call(form); };
        Promise.race([pending, new Promise(function (res) { setTimeout(res, 3000); })]).then(go, go);
      }
      if (store) {
        var draft = {};
        FIELDS.forEach(function (name) {
          var el = form.elements[name];
          if (el && el.type !== 'hidden') draft[name] = el.value;
        });
        write(key, draft);
      }
      if (button) {
        button.disabled = true;
        button.setAttribute('aria-busy', 'true');
      }
    });

    // Coming back with the browser's back button restores a disabled button.
    window.addEventListener('pageshow', function () {
      sending = false;
      if (button) {
        button.disabled = false;
        button.removeAttribute('aria-busy');
      }
    });

    var notice = form.querySelector('.lm-notice');
    if (notice) {
      form.classList.add('in');
      // Focus after the browser's own jump to #contact-form, which resets focus.
      window.addEventListener('load', function () {
        setTimeout(function () {
          notice.focus({ preventScroll: true });
          if (!location.hash) notice.scrollIntoView({ block: 'center' });
        }, 0);
      });
    }
  });
})();
