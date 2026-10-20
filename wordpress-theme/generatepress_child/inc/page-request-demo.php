<?php
/**
 * Moved from Code Snippets #23 "XRay — Request Demo Page Content".
 * Now the Learn More contact page (slug learn-more); the form is handled in contact-form.php.
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( array( 'request-demo', 'learn-more' ) ) ) return;
  ?>
<style>
/* Request Demo — GeneratePress wrapper resets */
#content,
#content .inside-site-content,
#content .grid-container,
#content .grid-parent,
#primary, .content-area, .grid-item,
#main, .site-main,
article, .inside-article, .entry-content {
    max-width: none !important; width: 100% !important;
    padding: 0 !important; margin: 0 !important;
    background: transparent !important; border: none !important;
    box-shadow: none !important; overflow: visible !important; float: none !important;
}
.entry-content { position: relative !important; z-index: 2 !important; }
.site, .site-wrap, .site-inner, .site-content,
.inside-site-content, .container, .inside-container { background: transparent !important; }

body { background: #0E141B !important; }

/* Override .xr-page-hero to use the hosted image */
.xr-page-hero {
    background:
        linear-gradient(180deg, rgba(14,20,27,0.88) 0%, rgba(14,20,27,0.65) 35%, rgba(14,20,27,0.92) 100%),
        url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/bg-landscape-4k.webp' ); ?>') center/cover no-repeat,
        #0E141B !important;
}

/* Demo page layout & form styles (from xray-system.css / local prototype) */
.demo-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; }
@media (max-width: 980px) { .demo-grid { grid-template-columns: 1fr; gap: 48px; } }

.step-list { position: relative; display: flex; flex-direction: column; gap: 0; }
.step-list::before {
    content: ''; position: absolute;
    left: 16px; top: 34px; bottom: 34px; width: 1px;
    background: linear-gradient(to bottom, rgba(232,185,99,0.35) 0%, rgba(232,185,99,0.08) 100%);
    pointer-events: none;
}
.step-item { display: flex; align-items: flex-start; gap: 18px; padding: 0 0 26px; }
.step-item:last-child { padding-bottom: 0; }
.step-hex {
    width: 32px; height: 32px;
    background: rgba(232,185,99,0.10); border: 1.5px solid rgba(232,185,99,0.42);
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; margin-top: 1px;
    color: var(--xr-gold); font-family: var(--xr-font-mono); font-weight: 700;
    font-size: 12px; letter-spacing: 0.04em; position: relative; z-index: 1;
}
.step-item .title { color: var(--xr-text); font-weight: 600; font-size: 15.5px; margin-bottom: 4px; }
.step-item .desc  { color: var(--xr-text-2); font-size: 14.5px; line-height: 1.7; }

.status-block {
    padding: 24px 28px; background: var(--xr-card);
    border: 1px solid rgba(232,185,99,0.28); border-radius: 2px;
    position: relative; overflow: hidden;
}
.status-block::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, var(--xr-green), transparent);
}

.demo-form {
    background: var(--xr-deep); border: 1px solid rgba(232,185,99,0.28);
    border-radius: 2px; padding: 44px 40px; position: relative; overflow: hidden;
}
.demo-form::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--xr-gold), rgba(232,185,99,0.2));
}
.demo-form label {
    display: block; color: var(--xr-text-muted); font-family: var(--xr-font-mono);
    font-size: 11px; font-weight: 600; letter-spacing: 0.16em; text-transform: uppercase;
    margin-bottom: 8px;
}
.demo-form input, .demo-form textarea, .demo-form select {
    width: 100%; padding: 12px 14px;
    background: var(--xr-mid); border: 1px solid rgba(232,185,99,0.22);
    border-radius: 2px; color: var(--xr-text); font-family: var(--xr-font-body);
    font-size: 15px; transition: border-color .18s, background .18s, box-shadow .18s;
    box-sizing: border-box;
}
.demo-form input:focus, .demo-form textarea:focus, .demo-form select:focus {
    outline: none; border-color: var(--xr-gold); background: rgba(14,20,27,0.85);
    box-shadow: 0 0 0 3px rgba(232,185,99,0.1);
}
.demo-form textarea { resize: vertical; min-height: 120px; font-family: var(--xr-font-body); }
.form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 22px; }
.form-row { margin-bottom: 22px; }
@media (max-width: 600px) { .form-grid-2 { grid-template-columns: 1fr; } .demo-form { padding: 32px 28px; } }

/* Mission statement between the hero and the footer */
.lm-mission-sec { position: relative; z-index: 2; background: #0E141B; padding: 150px 0 170px; border-top: 1px solid rgba(232,185,99,0.12); text-align: center; }
.lm-mission-sec .xr-eyebrow { justify-content: center; }
.lm-mission-line {
    font-size: clamp(34px, 4.6vw, 64px); line-height: 1.12; letter-spacing: -0.02em; font-weight: 800;
    color: var(--xr-text); max-width: 18ch; margin: 22px auto 30px;
}
.lm-mission-line span { color: var(--xr-gold); }
.lm-mission-body { max-width: 640px; margin: 0 auto; color: var(--xr-text-2); font-size: 17px; line-height: 1.85; }
@media (max-width: 600px) { .lm-mission-sec { padding: 100px 0 120px; } .lm-mission-body { font-size: 16px; } }
</style>
<?php xray_site_nav(); ?>

<section class="xr-page-hero xr-topo" id="contact">
  <div class="xr-topo-layer xr-topo-contours"></div>
  <div class="xr-topo-layer xr-topo-wash"></div>
  <div class="xr-topo-hex-tr"></div>
  <div class="xr-topo-hex-bl"></div>

  <div class="xr-container">
    <div class="demo-grid">
      <div>
        <div class="xr-reveal"><span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Get in Touch</span></div>
        <h1 class="xr-reveal xr-d1" style="margin-top:18px;">Learn More<br><span style="color:var(--xr-gold);">About <span class="xr-nobreak">X-Ray</span></span></h1>
        <p class="xr-reveal xr-d2 xr-lede" style="margin-top:14px;max-width:480px;">We're early, and we want to hear from you. Whether you explore for minerals, invest in the space or want to work with us, send us a note and a co-founder will reply directly.</p>

        <div class="xr-reveal xr-d3 step-list" style="margin-top:42px;margin-bottom:36px;">
          <div class="step-item">
            <div class="step-hex">01</div>
            <div>
              <div class="title">Exploration teams</div>
              <div class="desc">Tell us where you're exploring and what you're looking for. We'll show you how your data becomes a prospectivity heat map and a ranked list of drill targets.</div>
            </div>
          </div>
          <div class="step-item">
            <div class="step-hex">02</div>
            <div>
              <div class="title">Investors</div>
              <div class="desc">Ask about our models, our roadmap and where we're headed after lithium in the Great Basin.</div>
            </div>
          </div>
          <div class="step-item">
            <div class="step-hex">03</div>
            <div>
              <div class="title">Partners and researchers</div>
              <div class="desc">If you hold geological data or work on mineral exploration, we'd like to talk about working together.</div>
            </div>
          </div>
        </div>

        <div class="xr-reveal xr-d4 status-block">
          <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
            <span class="xr-pulse-dot"></span>
            <div class="xr-eyebrow" style="margin:0;">Current Status</div>
          </div>
          <p style="color:var(--xr-text-2);font-size:14.5px;line-height:1.7;margin:0;">Our Great Basin lithium model is a prototype that reaches 95% recall and 80% precision at 1×1&nbsp;km cells. Next on our roadmap: customer discovery with mining companies, finer models, and field validation against real boreholes.</p>
        </div>
      </div>

      <h2 class="xr-sr-only">Contact form</h2>
      <form class="xr-reveal xr-d1 demo-form xr-contact-form" id="contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
        <input type="hidden" name="action" value="xray_contact">
        <input type="hidden" name="source" value="learn-more">
        <?php wp_nonce_field( 'xray_contact', 'xray_contact_nonce', false ); ?>
        <div class="xr-hp" aria-hidden="true"><label for="website">Website</label><input type="text" id="website" name="website" tabindex="-1" autocomplete="off"></div>

        <?php echo xray_contact_notice(); ?>

        <div class="form-grid-2">
          <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Jane Smith" autocomplete="name" required>
          </div>
          <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="you@company.com" autocomplete="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="An email address like you@company.com" required>
          </div>
        </div>

        <div class="form-grid-2">
          <div>
            <label for="company">Company <span style="text-transform:none;letter-spacing:0;">(optional)</span></label>
            <input type="text" id="company" name="company" placeholder="Acme Exploration Inc." autocomplete="organization">
          </div>
          <div>
            <label for="interest">I'm interested as</label>
            <select id="interest" name="interest">
              <option value="Mining or exploration company">A mining or exploration company</option>
              <option value="Investor">An investor</option>
              <option value="Partner or researcher">A partner or researcher</option>
              <option value="Other">Something else</option>
            </select>
          </div>
        </div>

        <div class="form-row">
          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="What would you like to know? If you're exploring, tell us the mineral, the area and your stage of exploration." required></textarea>
        </div>

        <button type="submit" class="xr-btn xr-btn-gold" style="width:100%;text-align:center;justify-content:center;font-size:16px;padding:15px 24px;margin-bottom:14px;">Send Message <span class="xr-arrow">→</span></button>

        <p style="color:var(--xr-text-muted);font-size:12px;text-align:center;margin:0;font-family:var(--xr-font-mono);letter-spacing:0.02em;line-height:1.6;">Your message goes straight to our team. We don't share your information.</p>
      </form>
    </div>
  </div>
</section>

<section class="lm-mission-sec">
  <div class="xr-container">
    <div class="xr-reveal"><span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Our Mission</span></div>
    <h2 class="lm-mission-line xr-reveal xr-d1">Find the minerals the world needs, <span>with fewer holes drilled.</span></h2>
    <p class="lm-mission-body xr-reveal xr-d2">New mineral discoveries fell from 202 in 2009 to about 80 in 2023, and every miss costs a mining company time and money. We're building machine learning models that weigh more geological data than any team can by hand, so geologists know where to drill before they commit a rig. We're starting with lithium in the Great Basin.</p>
  </div>
</section>

<?php xray_site_footer(); ?>

  <?php
} );
