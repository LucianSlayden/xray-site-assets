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
            if (el.tagName === 'SELECT' || !el.value) el.value = draft[name];
          });
        }
      }
    }

    form.addEventListener('submit', function () {
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
