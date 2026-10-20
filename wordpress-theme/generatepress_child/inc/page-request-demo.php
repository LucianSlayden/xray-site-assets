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
/* One column: the section runs about 2000px tall, so 'cover' stretched the
   painting to that height. Size it to the first screen and fade it out. */
@media (max-width: 980px) {
    .xr-page-hero {
        background:
            linear-gradient(180deg, rgba(14,20,27,0.88) 0%, rgba(14,20,27,0.62) 30%, rgba(14,20,27,0.9) 75%, #0E141B 100%) top / 100% 1100px no-repeat,
            url('<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/img/bg-landscape-4k.webp' ); ?>') 34% top / auto 1100px no-repeat,
            #0E141B !important;
    }
}

/* Layout: the intro and the form sit side by side, the audiences and the
   status below the intro. In one column the form comes straight after the
   intro, so phone visitors reach it without scrolling past everything. */
.demo-grid {
    display: grid; grid-template-columns: 1fr 1fr; column-gap: 64px; row-gap: 0;
    grid-template-areas: "intro form" "more form"; grid-template-rows: auto 1fr; align-items: start;
}
/* clip, not hidden, so the form can stay in view while the left column scrolls. */
#contact.xr-page-hero { overflow: hidden; overflow: clip; }
.lm-intro { grid-area: intro; }
.lm-more { grid-area: more; margin-top: 42px; }
.demo-grid > .demo-form { grid-area: form; position: relative; }
/* Keep the form in view beside the longer left column, when the whole form fits on screen. */
@media (min-width: 981px) and (min-height: 820px) { .demo-grid > .demo-form { position: sticky; top: calc(var(--xr-nav-h) + 32px); } }
@media (max-width: 980px) {
    .demo-grid { grid-template-columns: minmax(0, 1fr); grid-template-areas: "intro" "form" "more"; grid-template-rows: auto; }
    .demo-grid > .demo-form { margin-top: 40px; }
    .lm-more { margin-top: 56px; }
}

/* Who the form is for: three parallel audiences, each with a small drawing. */
.step-list { display: flex; flex-direction: column; gap: 26px; margin-bottom: 36px; }
.step-item { display: grid; grid-template-columns: 56px minmax(0, 1fr); gap: 18px; align-items: start; }
.step-art { width: 56px; height: 56px; background: #0B1118; border: 1px solid rgba(232,185,99,0.22); }
.step-art.sky { border-color: rgba(111,181,224,0.25); }
.step-art svg { width: 100%; height: 100%; display: block; }
.step-item .title { color: var(--xr-text); font-weight: 600; font-size: 15.5px; line-height: 1.5; margin: 1px 0 4px; }
.step-item .desc  { color: var(--xr-text-2); font-size: 14.5px; line-height: 1.7; text-wrap: pretty; }

.status-block {
    padding: 24px 28px; background: rgba(22,29,39,0.94);
    border: 1px solid rgba(232,185,99,0.28); border-radius: 2px;
    position: relative; overflow: hidden;
}
.status-block::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
    background: linear-gradient(90deg, var(--xr-green), transparent);
}
.status-block p { color: var(--xr-text-2); font-size: 14.5px; line-height: 1.7; margin: 0; text-wrap: pretty; }
.lm-stats { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); margin: 20px 0 0; padding: 16px 0 0; border-top: 1px solid rgba(232,185,99,0.14); }
.lm-stats > div { padding: 0 12px; border-left: 1px solid rgba(232,185,99,0.14); }
.lm-stats > div:first-child { padding-left: 0; border-left: 0; }
.lm-stats b { display: block; font-family: var(--xr-font-mono); font-weight: 700; font-size: 20px; line-height: 1.2; color: var(--xr-gold); white-space: nowrap; }
.lm-stats span { display: block; margin-top: 4px; font-family: var(--xr-font-mono); font-size: 10.5px; letter-spacing: 0.12em; text-transform: uppercase; color: var(--xr-text-muted); }
.lm-stage { margin-top: 20px; }
.lm-stage-track { display: grid; grid-template-columns: repeat(5, 1fr); gap: 4px; }
.lm-stage-track i { height: 6px; background: rgba(168,178,192,0.16); }
.lm-stage-track i.on { background: var(--xr-gold); }
.lm-stage-cap { display: flex; justify-content: space-between; gap: 12px; margin-top: 9px; font-family: var(--xr-font-mono); font-size: 10.5px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--xr-text-muted); }
.lm-stage-cap b { color: var(--xr-gold); font-weight: 600; }
@media (max-width: 480px) { .lm-stage-cap { flex-direction: column; gap: 3px; } }
@media (max-width: 420px) { .status-block { padding: 22px 20px; } .lm-stats b { font-size: 17px; } .lm-stats > div { padding: 0 8px; } .lm-stats span, .lm-stage-cap { letter-spacing: 0.06em; } }

.demo-form {
    background: var(--xr-deep); border: 1px solid rgba(232,185,99,0.28);
    border-radius: 2px; padding: 44px 40px; overflow: hidden;
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
.demo-form label small { font-size: inherit; text-transform: none; letter-spacing: 0; font-weight: 500; }
.demo-form input, .demo-form textarea, .demo-form select {
    display: block; width: 100%; padding: 12px 14px; margin: 0;
    background: var(--xr-mid); border: 1px solid rgba(232,185,99,0.22);
    border-radius: 2px; color: var(--xr-text); font-family: var(--xr-font-body);
    font-size: 15px; line-height: 1.4; transition: border-color .18s, background-color .18s, box-shadow .18s;
    box-sizing: border-box;
}
/* Inputs and the select share one height and text inset; the select gets a gold chevron. */
.demo-form input, .demo-form select { height: 46px; padding-top: 0; padding-bottom: 0; }
.demo-form select {
    -webkit-appearance: none; appearance: none; padding-right: 42px; cursor: pointer;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 8'%3E%3Cpath d='M1 1.5l5 5 5-5' fill='none' stroke='%23E8B963' stroke-width='1.6'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 16px center; background-size: 12px 8px;
}
.demo-form select option { background: var(--xr-mid); color: var(--xr-text); }
.demo-form ::placeholder { color: #8A96A6; opacity: 1; }
.demo-form input:focus, .demo-form textarea:focus, .demo-form select:focus {
    outline: none; border-color: var(--xr-gold); background-color: rgba(14,20,27,0.85);
    box-shadow: 0 0 0 3px rgba(232,185,99,0.1);
}
.demo-form textarea { resize: vertical; min-height: 120px; }
.form-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 22px 16px; margin-bottom: 22px; }
.form-row { margin-bottom: 22px; }
.form-row-last { margin-bottom: 26px; }
.lm-form-note { color: var(--xr-text-muted); font-size: 12px; text-align: center; margin: 14px 0 0; font-family: var(--xr-font-mono); letter-spacing: 0.02em; line-height: 1.6; text-wrap: balance; }
@media (max-width: 600px) { .form-grid-2 { grid-template-columns: 1fr; } .demo-form { padding: 32px 24px; } }
/* Phones: room for the longest choice, "A mining or exploration company". */
@media (max-width: 420px) {
    .demo-form { padding: 30px 20px; }
    .demo-form select { font-size: 14px; padding-right: 34px; background-position: right 13px center; }
}
@media (max-width: 370px) { .demo-form select { font-size: 13.5px; } }

/* Mission statement between the hero and the footer */
.lm-mission-sec { position: relative; z-index: 2; background: #0E141B; padding: 140px 0 150px; border-top: 1px solid rgba(232,185,99,0.12); text-align: center; }
.lm-mission-sec .xr-eyebrow { justify-content: center; }
.lm-mission-line {
    font-size: clamp(34px, 4.6vw, 64px); line-height: 1.12; letter-spacing: -0.02em; font-weight: 800;
    color: var(--xr-text); max-width: 18ch; margin: 22px auto 30px; text-wrap: balance;
}
.lm-mission-line span { color: var(--xr-gold); }
.lm-mission-body { max-width: 640px; margin: 0 auto; color: var(--xr-text-2); font-size: 17px; line-height: 1.85; text-wrap: pretty; }

/* Discoveries per year, one square per discovery. */
.lm-disc { max-width: 620px; margin: 56px auto 0; padding: 26px 28px 22px; background: rgba(22,29,39,0.6); border: 1px solid rgba(232,185,99,0.16); text-align: left; }
.lm-disc-head { font-family: var(--xr-font-mono); font-size: 11px; letter-spacing: 0.14em; text-transform: uppercase; color: var(--xr-text-2); margin-bottom: 18px; }
.lm-disc-row { display: grid; grid-template-columns: 44px minmax(0, 1fr) 44px; gap: 14px; align-items: center; }
.lm-disc-row + .lm-disc-row { margin-top: 14px; }
.lm-disc-row svg { display: block; width: 100%; height: auto; }
.lm-disc-sm { display: none !important; }
.lm-disc-yr { font-family: var(--xr-font-mono); font-size: 12px; color: var(--xr-text-muted); }
.lm-disc-n { font-family: var(--xr-font-mono); font-weight: 700; font-size: 16px; color: var(--xr-gold); text-align: right; }
.lm-disc-key { display: flex; flex-wrap: wrap; gap: 6px 18px; margin-top: 18px; padding-top: 14px; border-top: 1px solid rgba(232,185,99,0.12); font-family: var(--xr-font-mono); font-size: 10.5px; letter-spacing: 0.08em; text-transform: uppercase; color: var(--xr-text-muted); }
.lm-disc-key span { display: inline-flex; align-items: center; gap: 7px; }
.lm-disc-key i { width: 8px; height: 8px; background: var(--xr-gold); }
.lm-disc-key i.gap { background: none; outline: 1px solid rgba(168,178,192,0.45); outline-offset: -1px; }
@media (max-width: 600px) {
    .lm-mission-sec { padding: 100px 0 110px; } .lm-mission-body { font-size: 16px; }
    .lm-disc { padding: 20px 16px 18px; margin-top: 44px; }
    .lm-disc-row { grid-template-columns: 36px minmax(0, 1fr) 34px; gap: 10px; }
    .lm-disc-n { font-size: 14px; }
    .lm-disc-lg { display: none !important; }
    .lm-disc-sm { display: block !important; }
}
</style>
<?php xray_site_nav(); ?>

<section class="xr-page-hero xr-topo" id="contact">
  <div class="xr-container">
    <div class="demo-grid">
      <div class="lm-intro">
        <div class="xr-reveal"><span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Get in Touch</span></div>
        <h1 class="xr-reveal xr-d1" style="margin-top:18px;">Learn More<br><span style="color:var(--xr-gold);">About <span class="xr-nobreak">X-Ray</span></span></h1>
        <p class="xr-reveal xr-d2 xr-lede" style="margin-top:14px;max-width:480px;">We're early, and we want to hear from you. Whether you explore for minerals, invest in the space or want to work with us, send us a note and a co-founder will reply directly.</p>
      </div>

      <div class="lm-more">
        <div class="xr-reveal xr-d3 step-list">
          <div class="step-item">
            <div class="step-art" aria-hidden="true"><svg viewBox="0 0 64 64"><rect x="6" y="11" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="11.8" y="11" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="17.6" y="11" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="23.4" y="11" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="29.2" y="11" width="5" height="5" fill="#E8B963" fill-opacity="0.15"/><rect x="35" y="11" width="5" height="5" fill="#E8B963" fill-opacity="0.1"/><rect x="40.8" y="11" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="6" y="16.8" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="11.8" y="16.8" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="17.6" y="16.8" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="23.4" y="16.8" width="5" height="5" fill="#E8B963" fill-opacity="0.23"/><rect x="29.2" y="16.8" width="5" height="5" fill="#E8B963" fill-opacity="0.57"/><rect x="35" y="16.8" width="5" height="5" fill="#E8B963" fill-opacity="0.47"/><rect x="40.8" y="16.8" width="5" height="5" fill="#E8B963" fill-opacity="0.17"/><rect x="6" y="22.6" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="11.8" y="22.6" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="17.6" y="22.6" width="5" height="5" fill="#E8B963" fill-opacity="0.1"/><rect x="23.4" y="22.6" width="5" height="5" fill="#E8B963" fill-opacity="0.33"/><rect x="29.2" y="22.6" width="5" height="5" fill="#E8B963" fill-opacity="0.97"/><rect x="35" y="22.6" width="5" height="5" fill="#E8B963" fill-opacity="0.92"/><rect x="40.8" y="22.6" width="5" height="5" fill="#E8B963" fill-opacity="0.23"/><rect x="6" y="28.4" width="5" height="5" fill="#E8B963" fill-opacity="0.08"/><rect x="11.8" y="28.4" width="5" height="5" fill="#E8B963" fill-opacity="0.12"/><rect x="17.6" y="28.4" width="5" height="5" fill="#E8B963" fill-opacity="0.19"/><rect x="23.4" y="28.4" width="5" height="5" fill="#E8B963" fill-opacity="0.19"/><rect x="29.2" y="28.4" width="5" height="5" fill="#E8B963" fill-opacity="0.45"/><rect x="35" y="28.4" width="5" height="5" fill="#E8B963" fill-opacity="0.46"/><rect x="40.8" y="28.4" width="5" height="5" fill="#E8B963" fill-opacity="0.12"/><rect x="6" y="34.2" width="5" height="5" fill="#E8B963" fill-opacity="0.1"/><rect x="11.8" y="34.2" width="5" height="5" fill="#E8B963" fill-opacity="0.47"/><rect x="17.6" y="34.2" width="5" height="5" fill="#E8B963" fill-opacity="0.58"/><rect x="23.4" y="34.2" width="5" height="5" fill="#E8B963" fill-opacity="0.22"/><rect x="29.2" y="34.2" width="5" height="5" fill="#E8B963" fill-opacity="0.2"/><rect x="35" y="34.2" width="5" height="5" fill="#E8B963" fill-opacity="0.2"/><rect x="40.8" y="34.2" width="5" height="5" fill="#E8B963" fill-opacity="0.11"/><rect x="6" y="40" width="5" height="5" fill="#E8B963" fill-opacity="0.15"/><rect x="11.8" y="40" width="5" height="5" fill="#E8B963" fill-opacity="0.6"/><rect x="17.6" y="40" width="5" height="5" fill="#E8B963" fill-opacity="0.7"/><rect x="23.4" y="40" width="5" height="5" fill="#E8B963" fill-opacity="0.3"/><rect x="29.2" y="40" width="5" height="5" fill="#E8B963" fill-opacity="0.23"/><rect x="35" y="40" width="5" height="5" fill="#E8B963" fill-opacity="0.32"/><rect x="40.8" y="40" width="5" height="5" fill="#E8B963" fill-opacity="0.26"/><rect x="6" y="45.8" width="5" height="5" fill="#E8B963" fill-opacity="0.11"/><rect x="11.8" y="45.8" width="5" height="5" fill="#E8B963" fill-opacity="0.2"/><rect x="17.6" y="45.8" width="5" height="5" fill="#E8B963" fill-opacity="0.24"/><rect x="23.4" y="45.8" width="5" height="5" fill="#E8B963" fill-opacity="0.17"/><rect x="29.2" y="45.8" width="5" height="5" fill="#E8B963" fill-opacity="0.15"/><rect x="35" y="45.8" width="5" height="5" fill="#E8B963" fill-opacity="0.29"/><rect x="40.8" y="45.8" width="5" height="5" fill="#E8B963" fill-opacity="0.26"/><rect x="28.6" y="22" width="6.2" height="6.2" fill="none" stroke="#F1F4F8" stroke-opacity="1" stroke-width="1"/><rect x="17" y="39.4" width="6.2" height="6.2" fill="none" stroke="#F1F4F8" stroke-opacity="0.75" stroke-width="1"/><rect x="34.4" y="39.4" width="6.2" height="6.2" fill="none" stroke="#F1F4F8" stroke-opacity="0.55" stroke-width="1"/><rect x="49" y="16" width="3" height="3" fill="#F1F4F8" fill-opacity="1"/><rect x="49" y="21" width="9" height="1.6" fill="#E8B963"/><rect x="49" y="27" width="3" height="3" fill="#F1F4F8" fill-opacity="0.75"/><rect x="49" y="32" width="7.11" height="1.6" fill="#E8B963"/><rect x="49" y="38" width="3" height="3" fill="#F1F4F8" fill-opacity="0.55"/><rect x="49" y="43" width="3.85" height="1.6" fill="#E8B963"/><path d="M47 12V50" stroke="#A8B2C0" stroke-opacity=".3" stroke-width=".7"/></svg></div>
            <div>
              <div class="title">Exploration teams</div>
              <div class="desc">Tell us where you're exploring and what you're looking for. We'll show you how our prototype turns exploration data into a prospectivity heat map and a ranked list of drill targets.</div>
            </div>
          </div>
          <div class="step-item">
            <div class="step-art" aria-hidden="true"><svg viewBox="0 0 64 64"><g transform="translate(0 4)"><rect x="9" y="29" width="6.5" height="7" fill="#E8B963" fill-opacity="0.25"/><rect x="18.5" y="25" width="6.5" height="11" fill="#E8B963" fill-opacity="0.4"/><rect x="28" y="21" width="6.5" height="15" fill="#E8B963" fill-opacity="0.55"/><rect x="37.5" y="16" width="6.5" height="20" fill="#E8B963" fill-opacity="0.7"/><rect x="47" y="10" width="6.5" height="26" fill="#E8B963" fill-opacity="0.85"/><path d="M8 36.5H57" stroke="#A8B2C0" stroke-opacity=".5" stroke-width=".8"/><path d="M12 27L21.5 23L31 19L40.5 14L50 8.5" fill="none" stroke="#F1F4F8" stroke-opacity=".7" stroke-width=".9"/><path d="M10 48H54" stroke="#A8B2C0" stroke-opacity=".4" stroke-width="1"/><path d="M10 48H21" stroke="#E8B963" stroke-width="2"/><circle cx="10" cy="48" r="3.2" fill="#E8B963" stroke="#E8B963" stroke-opacity="1" stroke-width="1.1"/><circle cx="21" cy="48" r="2.5" fill="#0B1118" stroke="#E8B963" stroke-opacity="1" stroke-width="1.1"/><circle cx="32" cy="48" r="2.5" fill="#0B1118" stroke="#A8B2C0" stroke-opacity="0.6" stroke-width="1.1"/><circle cx="43" cy="48" r="2.5" fill="#0B1118" stroke="#A8B2C0" stroke-opacity="0.6" stroke-width="1.1"/><circle cx="54" cy="48" r="2.5" fill="#0B1118" stroke="#A8B2C0" stroke-opacity="0.6" stroke-width="1.1"/></g></svg></div>
            <div>
              <div class="title">Investors</div>
              <div class="desc">Ask about our models, our roadmap and where we're headed after lithium in the Great Basin.</div>
            </div>
          </div>
          <div class="step-item">
            <div class="step-art sky" aria-hidden="true"><svg viewBox="0 0 64 64"><rect x="5" y="6" width="15" height="14" fill="#6FB5E0" fill-opacity=".06" stroke="#6FB5E0" stroke-opacity=".55" stroke-width=".8"/><rect x="5" y="25" width="15" height="14" fill="#6FB5E0" fill-opacity=".06" stroke="#6FB5E0" stroke-opacity=".55" stroke-width=".8"/><rect x="5" y="44" width="15" height="14" fill="#6FB5E0" fill-opacity=".06" stroke="#6FB5E0" stroke-opacity=".55" stroke-width=".8"/><circle cx="8" cy="9.5" r="0.9" fill="#6FB5E0"/><circle cx="13" cy="8.5" r="1.2" fill="#6FB5E0"/><circle cx="16.5" cy="12" r="0.8" fill="#6FB5E0"/><circle cx="10.5" cy="14" r="1.3" fill="#6FB5E0"/><circle cx="15" cy="16.5" r="1" fill="#6FB5E0"/><circle cx="8" cy="17" r="0.7" fill="#6FB5E0"/><circle cx="17.5" cy="8.8" r="0.7" fill="#6FB5E0"/><ellipse cx="13" cy="32" rx="5.6" ry="4.6" fill="none" stroke="#6FB5E0" stroke-opacity="0.5" stroke-width=".8"/><ellipse cx="13" cy="32" rx="3.6" ry="2.9" fill="none" stroke="#6FB5E0" stroke-opacity="0.75" stroke-width=".8"/><ellipse cx="13" cy="32" rx="1.6" ry="1.3" fill="none" stroke="#6FB5E0" stroke-opacity="1" stroke-width=".8"/><path d="M6.5 56L12 49.5L18.5 46M8 47L14 53L17 56.5" fill="none" stroke="#6FB5E0" stroke-width="1"/><path d="M20 13C27 13 26 32 33 32" fill="none" stroke="#6FB5E0" stroke-opacity=".5" stroke-width=".8"/><path d="M20 32C27 32 26 32 33 32" fill="none" stroke="#6FB5E0" stroke-opacity=".5" stroke-width=".8"/><path d="M20 51C27 51 26 32 33 32" fill="none" stroke="#6FB5E0" stroke-opacity=".5" stroke-width=".8"/><rect x="35" y="19.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.1"/><rect x="40" y="19.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.23"/><rect x="45" y="19.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.37"/><rect x="50" y="19.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.38"/><rect x="55" y="19.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.26"/><rect x="35" y="24.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.14"/><rect x="40" y="24.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.4"/><rect x="45" y="24.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.62"/><rect x="50" y="24.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.65"/><rect x="55" y="24.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.45"/><rect x="35" y="29.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.17"/><rect x="40" y="29.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.45"/><rect x="45" y="29.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.72"/><rect x="50" y="29.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.77"/><rect x="55" y="29.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.5"/><rect x="35" y="34.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.1"/><rect x="40" y="34.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.34"/><rect x="45" y="34.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.52"/><rect x="50" y="34.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.55"/><rect x="55" y="34.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.38"/><rect x="35" y="39.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.1"/><rect x="40" y="39.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.14"/><rect x="45" y="39.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.26"/><rect x="50" y="39.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.27"/><rect x="55" y="39.5" width="4.2" height="4.2" fill="#6FB5E0" fill-opacity="0.17"/></svg></div>
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
          <p>Our Great Basin lithium model is a prototype that reaches 95% recall and 80% precision at 1×1&nbsp;km cells. Next on our roadmap: customer discovery with mining companies, finer models, and field validation against real boreholes.</p>
          <div class="lm-stats" aria-hidden="true">
            <div><b>95%</b><span>Recall</span></div>
            <div><b>80%</b><span>Precision</span></div>
            <div><b>1×1 km</b><span>Cells</span></div>
          </div>
          <div class="lm-stage" role="img" aria-label="Roadmap stage 1 of 5, the prototype. Next: finer models.">
            <div class="lm-stage-track"><i class="on"></i><i></i><i></i><i></i><i></i></div>
            <div class="lm-stage-cap"><span><b>Stage 1 of 5</b> · Prototype</span><span>Next · Finer models</span></div>
          </div>
        </div>
      </div>

      <h2 class="xr-sr-only">Contact form</h2>
      <form class="xr-reveal xr-d1 demo-form xr-contact-form" id="contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" data-nonce-url="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
        <input type="hidden" name="action" value="xray_contact">
        <input type="hidden" name="source" value="learn-more">
        <?php wp_nonce_field( 'xray_contact', 'xray_contact_nonce', false ); ?>
        <div class="xr-hp" aria-hidden="true"><label for="lm-extra">Leave this field empty</label><input type="text" id="lm-extra" name="xr_extra" value="" tabindex="-1" autocomplete="off"></div>

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

        <div class="form-row">
          <label for="company">Company <small>(optional)</small></label>
          <input type="text" id="company" name="company" placeholder="Acme Exploration Inc." autocomplete="organization">
        </div>

        <!-- Full width so the longest choice is never cut off. -->
        <div class="form-row">
          <label for="interest">I'm interested as</label>
          <select id="interest" name="interest">
            <option value="Mining or exploration company">A mining or exploration company</option>
            <option value="Investor">An investor</option>
            <option value="Partner or researcher">A partner or researcher</option>
            <option value="Other">Something else</option>
          </select>
        </div>

        <div class="form-row form-row-last">
          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="What would you like to know? If you're exploring, tell us the mineral, the area and your stage of exploration." required></textarea>
        </div>

        <button type="submit" class="xr-btn xr-btn-gold" style="width:100%;text-align:center;justify-content:center;font-size:16px;padding:15px 24px;">Send Message <span class="xr-arrow" aria-hidden="true">→</span></button>

        <p class="lm-form-note">Your message goes straight to our team. We don't share your information.</p>
      </form>
    </div>
  </div>
</section>

<section class="lm-mission-sec">
  <div class="xr-container">
    <div class="xr-reveal"><span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Our Mission</span></div>
    <h2 class="lm-mission-line xr-reveal xr-d1">Find the minerals the world needs, <span>with fewer holes drilled.</span></h2>
    <p class="lm-mission-body xr-reveal xr-d2">New mineral discoveries fell from 202 in 2009 to about 80 in 2023, and every miss costs a mining company time and money. We're building machine learning models that weigh more geological data than any team can by hand, so geologists know where to drill before they commit a rig. We're starting with lithium in the Great Basin.</p>
    <figure class="lm-disc xr-reveal xr-d3" role="img" aria-label="New mineral discoveries: 202 in 2009, about 80 in 2023.">
      <figcaption class="lm-disc-head">New mineral discoveries per year</figcaption>
      <div class="lm-disc-row" aria-hidden="true"><span class="lm-disc-yr">2009</span><svg class="lm-disc-lg" viewBox="0 0 285 33" preserveAspectRatio="xMinYMid meet"><path d="M0 0h5v5h-5zM0 7h5v5h-5zM0 14h5v5h-5zM0 21h5v5h-5zM0 28h5v5h-5zM7 0h5v5h-5zM7 7h5v5h-5zM7 14h5v5h-5zM7 21h5v5h-5zM7 28h5v5h-5zM14 0h5v5h-5zM14 7h5v5h-5zM14 14h5v5h-5zM14 21h5v5h-5zM14 28h5v5h-5zM21 0h5v5h-5zM21 7h5v5h-5zM21 14h5v5h-5zM21 21h5v5h-5zM21 28h5v5h-5zM28 0h5v5h-5zM28 7h5v5h-5zM28 14h5v5h-5zM28 21h5v5h-5zM28 28h5v5h-5zM35 0h5v5h-5zM35 7h5v5h-5zM35 14h5v5h-5zM35 21h5v5h-5zM35 28h5v5h-5zM42 0h5v5h-5zM42 7h5v5h-5zM42 14h5v5h-5zM42 21h5v5h-5zM42 28h5v5h-5zM49 0h5v5h-5zM49 7h5v5h-5zM49 14h5v5h-5zM49 21h5v5h-5zM49 28h5v5h-5zM56 0h5v5h-5zM56 7h5v5h-5zM56 14h5v5h-5zM56 21h5v5h-5zM56 28h5v5h-5zM63 0h5v5h-5zM63 7h5v5h-5zM63 14h5v5h-5zM63 21h5v5h-5zM63 28h5v5h-5zM70 0h5v5h-5zM70 7h5v5h-5zM70 14h5v5h-5zM70 21h5v5h-5zM70 28h5v5h-5zM77 0h5v5h-5zM77 7h5v5h-5zM77 14h5v5h-5zM77 21h5v5h-5zM77 28h5v5h-5zM84 0h5v5h-5zM84 7h5v5h-5zM84 14h5v5h-5zM84 21h5v5h-5zM84 28h5v5h-5zM91 0h5v5h-5zM91 7h5v5h-5zM91 14h5v5h-5zM91 21h5v5h-5zM91 28h5v5h-5zM98 0h5v5h-5zM98 7h5v5h-5zM98 14h5v5h-5zM98 21h5v5h-5zM98 28h5v5h-5zM105 0h5v5h-5zM105 7h5v5h-5zM105 14h5v5h-5zM105 21h5v5h-5zM105 28h5v5h-5zM112 0h5v5h-5zM112 7h5v5h-5zM112 14h5v5h-5zM112 21h5v5h-5zM112 28h5v5h-5zM119 0h5v5h-5zM119 7h5v5h-5zM119 14h5v5h-5zM119 21h5v5h-5zM119 28h5v5h-5zM126 0h5v5h-5zM126 7h5v5h-5zM126 14h5v5h-5zM126 21h5v5h-5zM126 28h5v5h-5zM133 0h5v5h-5zM133 7h5v5h-5zM133 14h5v5h-5zM133 21h5v5h-5zM133 28h5v5h-5zM140 0h5v5h-5zM140 7h5v5h-5zM140 14h5v5h-5zM140 21h5v5h-5zM140 28h5v5h-5zM147 0h5v5h-5zM147 7h5v5h-5zM147 14h5v5h-5zM147 21h5v5h-5zM147 28h5v5h-5zM154 0h5v5h-5zM154 7h5v5h-5zM154 14h5v5h-5zM154 21h5v5h-5zM154 28h5v5h-5zM161 0h5v5h-5zM161 7h5v5h-5zM161 14h5v5h-5zM161 21h5v5h-5zM161 28h5v5h-5zM168 0h5v5h-5zM168 7h5v5h-5zM168 14h5v5h-5zM168 21h5v5h-5zM168 28h5v5h-5zM175 0h5v5h-5zM175 7h5v5h-5zM175 14h5v5h-5zM175 21h5v5h-5zM175 28h5v5h-5zM182 0h5v5h-5zM182 7h5v5h-5zM182 14h5v5h-5zM182 21h5v5h-5zM182 28h5v5h-5zM189 0h5v5h-5zM189 7h5v5h-5zM189 14h5v5h-5zM189 21h5v5h-5zM189 28h5v5h-5zM196 0h5v5h-5zM196 7h5v5h-5zM196 14h5v5h-5zM196 21h5v5h-5zM196 28h5v5h-5zM203 0h5v5h-5zM203 7h5v5h-5zM203 14h5v5h-5zM203 21h5v5h-5zM203 28h5v5h-5zM210 0h5v5h-5zM210 7h5v5h-5zM210 14h5v5h-5zM210 21h5v5h-5zM210 28h5v5h-5zM217 0h5v5h-5zM217 7h5v5h-5zM217 14h5v5h-5zM217 21h5v5h-5zM217 28h5v5h-5zM224 0h5v5h-5zM224 7h5v5h-5zM224 14h5v5h-5zM224 21h5v5h-5zM224 28h5v5h-5zM231 0h5v5h-5zM231 7h5v5h-5zM231 14h5v5h-5zM231 21h5v5h-5zM231 28h5v5h-5zM238 0h5v5h-5zM238 7h5v5h-5zM238 14h5v5h-5zM238 21h5v5h-5zM238 28h5v5h-5zM245 0h5v5h-5zM245 7h5v5h-5zM245 14h5v5h-5zM245 21h5v5h-5zM245 28h5v5h-5zM252 0h5v5h-5zM252 7h5v5h-5zM252 14h5v5h-5zM252 21h5v5h-5zM252 28h5v5h-5zM259 0h5v5h-5zM259 7h5v5h-5zM259 14h5v5h-5zM259 21h5v5h-5zM259 28h5v5h-5zM266 0h5v5h-5zM266 7h5v5h-5zM266 14h5v5h-5zM266 21h5v5h-5zM266 28h5v5h-5zM273 0h5v5h-5zM273 7h5v5h-5zM273 14h5v5h-5zM273 21h5v5h-5zM273 28h5v5h-5zM280 0h5v5h-5zM280 7h5v5h-5z" fill="#E8B963"/></svg><svg class="lm-disc-sm" viewBox="0 0 145 68" preserveAspectRatio="xMinYMid meet"><path d="M0 0h5v5h-5zM0 7h5v5h-5zM0 14h5v5h-5zM0 21h5v5h-5zM0 28h5v5h-5zM0 35h5v5h-5zM0 42h5v5h-5zM0 49h5v5h-5zM0 56h5v5h-5zM0 63h5v5h-5zM7 0h5v5h-5zM7 7h5v5h-5zM7 14h5v5h-5zM7 21h5v5h-5zM7 28h5v5h-5zM7 35h5v5h-5zM7 42h5v5h-5zM7 49h5v5h-5zM7 56h5v5h-5zM7 63h5v5h-5zM14 0h5v5h-5zM14 7h5v5h-5zM14 14h5v5h-5zM14 21h5v5h-5zM14 28h5v5h-5zM14 35h5v5h-5zM14 42h5v5h-5zM14 49h5v5h-5zM14 56h5v5h-5zM14 63h5v5h-5zM21 0h5v5h-5zM21 7h5v5h-5zM21 14h5v5h-5zM21 21h5v5h-5zM21 28h5v5h-5zM21 35h5v5h-5zM21 42h5v5h-5zM21 49h5v5h-5zM21 56h5v5h-5zM21 63h5v5h-5zM28 0h5v5h-5zM28 7h5v5h-5zM28 14h5v5h-5zM28 21h5v5h-5zM28 28h5v5h-5zM28 35h5v5h-5zM28 42h5v5h-5zM28 49h5v5h-5zM28 56h5v5h-5zM28 63h5v5h-5zM35 0h5v5h-5zM35 7h5v5h-5zM35 14h5v5h-5zM35 21h5v5h-5zM35 28h5v5h-5zM35 35h5v5h-5zM35 42h5v5h-5zM35 49h5v5h-5zM35 56h5v5h-5zM35 63h5v5h-5zM42 0h5v5h-5zM42 7h5v5h-5zM42 14h5v5h-5zM42 21h5v5h-5zM42 28h5v5h-5zM42 35h5v5h-5zM42 42h5v5h-5zM42 49h5v5h-5zM42 56h5v5h-5zM42 63h5v5h-5zM49 0h5v5h-5zM49 7h5v5h-5zM49 14h5v5h-5zM49 21h5v5h-5zM49 28h5v5h-5zM49 35h5v5h-5zM49 42h5v5h-5zM49 49h5v5h-5zM49 56h5v5h-5zM49 63h5v5h-5zM56 0h5v5h-5zM56 7h5v5h-5zM56 14h5v5h-5zM56 21h5v5h-5zM56 28h5v5h-5zM56 35h5v5h-5zM56 42h5v5h-5zM56 49h5v5h-5zM56 56h5v5h-5zM56 63h5v5h-5zM63 0h5v5h-5zM63 7h5v5h-5zM63 14h5v5h-5zM63 21h5v5h-5zM63 28h5v5h-5zM63 35h5v5h-5zM63 42h5v5h-5zM63 49h5v5h-5zM63 56h5v5h-5zM63 63h5v5h-5zM70 0h5v5h-5zM70 7h5v5h-5zM70 14h5v5h-5zM70 21h5v5h-5zM70 28h5v5h-5zM70 35h5v5h-5zM70 42h5v5h-5zM70 49h5v5h-5zM70 56h5v5h-5zM70 63h5v5h-5zM77 0h5v5h-5zM77 7h5v5h-5zM77 14h5v5h-5zM77 21h5v5h-5zM77 28h5v5h-5zM77 35h5v5h-5zM77 42h5v5h-5zM77 49h5v5h-5zM77 56h5v5h-5zM77 63h5v5h-5zM84 0h5v5h-5zM84 7h5v5h-5zM84 14h5v5h-5zM84 21h5v5h-5zM84 28h5v5h-5zM84 35h5v5h-5zM84 42h5v5h-5zM84 49h5v5h-5zM84 56h5v5h-5zM84 63h5v5h-5zM91 0h5v5h-5zM91 7h5v5h-5zM91 14h5v5h-5zM91 21h5v5h-5zM91 28h5v5h-5zM91 35h5v5h-5zM91 42h5v5h-5zM91 49h5v5h-5zM91 56h5v5h-5zM91 63h5v5h-5zM98 0h5v5h-5zM98 7h5v5h-5zM98 14h5v5h-5zM98 21h5v5h-5zM98 28h5v5h-5zM98 35h5v5h-5zM98 42h5v5h-5zM98 49h5v5h-5zM98 56h5v5h-5zM98 63h5v5h-5zM105 0h5v5h-5zM105 7h5v5h-5zM105 14h5v5h-5zM105 21h5v5h-5zM105 28h5v5h-5zM105 35h5v5h-5zM105 42h5v5h-5zM105 49h5v5h-5zM105 56h5v5h-5zM105 63h5v5h-5zM112 0h5v5h-5zM112 7h5v5h-5zM112 14h5v5h-5zM112 21h5v5h-5zM112 28h5v5h-5zM112 35h5v5h-5zM112 42h5v5h-5zM112 49h5v5h-5zM112 56h5v5h-5zM112 63h5v5h-5zM119 0h5v5h-5zM119 7h5v5h-5zM119 14h5v5h-5zM119 21h5v5h-5zM119 28h5v5h-5zM119 35h5v5h-5zM119 42h5v5h-5zM119 49h5v5h-5zM119 56h5v5h-5zM119 63h5v5h-5zM126 0h5v5h-5zM126 7h5v5h-5zM126 14h5v5h-5zM126 21h5v5h-5zM126 28h5v5h-5zM126 35h5v5h-5zM126 42h5v5h-5zM126 49h5v5h-5zM126 56h5v5h-5zM126 63h5v5h-5zM133 0h5v5h-5zM133 7h5v5h-5zM133 14h5v5h-5zM133 21h5v5h-5zM133 28h5v5h-5zM133 35h5v5h-5zM133 42h5v5h-5zM133 49h5v5h-5zM133 56h5v5h-5zM133 63h5v5h-5zM140 0h5v5h-5zM140 7h5v5h-5z" fill="#E8B963"/></svg><span class="lm-disc-n">202</span></div>
      <div class="lm-disc-row" aria-hidden="true"><span class="lm-disc-yr">2023</span><svg class="lm-disc-lg" viewBox="0 0 285 33" preserveAspectRatio="xMinYMid meet"><path d="M0 0h5v5h-5zM0 7h5v5h-5zM0 14h5v5h-5zM0 21h5v5h-5zM0 28h5v5h-5zM7 0h5v5h-5zM7 7h5v5h-5zM7 14h5v5h-5zM7 21h5v5h-5zM7 28h5v5h-5zM14 0h5v5h-5zM14 7h5v5h-5zM14 14h5v5h-5zM14 21h5v5h-5zM14 28h5v5h-5zM21 0h5v5h-5zM21 7h5v5h-5zM21 14h5v5h-5zM21 21h5v5h-5zM21 28h5v5h-5zM28 0h5v5h-5zM28 7h5v5h-5zM28 14h5v5h-5zM28 21h5v5h-5zM28 28h5v5h-5zM35 0h5v5h-5zM35 7h5v5h-5zM35 14h5v5h-5zM35 21h5v5h-5zM35 28h5v5h-5zM42 0h5v5h-5zM42 7h5v5h-5zM42 14h5v5h-5zM42 21h5v5h-5zM42 28h5v5h-5zM49 0h5v5h-5zM49 7h5v5h-5zM49 14h5v5h-5zM49 21h5v5h-5zM49 28h5v5h-5zM56 0h5v5h-5zM56 7h5v5h-5zM56 14h5v5h-5zM56 21h5v5h-5zM56 28h5v5h-5zM63 0h5v5h-5zM63 7h5v5h-5zM63 14h5v5h-5zM63 21h5v5h-5zM63 28h5v5h-5zM70 0h5v5h-5zM70 7h5v5h-5zM70 14h5v5h-5zM70 21h5v5h-5zM70 28h5v5h-5zM77 0h5v5h-5zM77 7h5v5h-5zM77 14h5v5h-5zM77 21h5v5h-5zM77 28h5v5h-5zM84 0h5v5h-5zM84 7h5v5h-5zM84 14h5v5h-5zM84 21h5v5h-5zM84 28h5v5h-5zM91 0h5v5h-5zM91 7h5v5h-5zM91 14h5v5h-5zM91 21h5v5h-5zM91 28h5v5h-5zM98 0h5v5h-5zM98 7h5v5h-5zM98 14h5v5h-5zM98 21h5v5h-5zM98 28h5v5h-5zM105 0h5v5h-5zM105 7h5v5h-5zM105 14h5v5h-5zM105 21h5v5h-5zM105 28h5v5h-5z" fill="#E8B963"/><path d="M112.5 0.5h4v4h-4zM112.5 7.5h4v4h-4zM112.5 14.5h4v4h-4zM112.5 21.5h4v4h-4zM112.5 28.5h4v4h-4zM119.5 0.5h4v4h-4zM119.5 7.5h4v4h-4zM119.5 14.5h4v4h-4zM119.5 21.5h4v4h-4zM119.5 28.5h4v4h-4zM126.5 0.5h4v4h-4zM126.5 7.5h4v4h-4zM126.5 14.5h4v4h-4zM126.5 21.5h4v4h-4zM126.5 28.5h4v4h-4zM133.5 0.5h4v4h-4zM133.5 7.5h4v4h-4zM133.5 14.5h4v4h-4zM133.5 21.5h4v4h-4zM133.5 28.5h4v4h-4zM140.5 0.5h4v4h-4zM140.5 7.5h4v4h-4zM140.5 14.5h4v4h-4zM140.5 21.5h4v4h-4zM140.5 28.5h4v4h-4zM147.5 0.5h4v4h-4zM147.5 7.5h4v4h-4zM147.5 14.5h4v4h-4zM147.5 21.5h4v4h-4zM147.5 28.5h4v4h-4zM154.5 0.5h4v4h-4zM154.5 7.5h4v4h-4zM154.5 14.5h4v4h-4zM154.5 21.5h4v4h-4zM154.5 28.5h4v4h-4zM161.5 0.5h4v4h-4zM161.5 7.5h4v4h-4zM161.5 14.5h4v4h-4zM161.5 21.5h4v4h-4zM161.5 28.5h4v4h-4zM168.5 0.5h4v4h-4zM168.5 7.5h4v4h-4zM168.5 14.5h4v4h-4zM168.5 21.5h4v4h-4zM168.5 28.5h4v4h-4zM175.5 0.5h4v4h-4zM175.5 7.5h4v4h-4zM175.5 14.5h4v4h-4zM175.5 21.5h4v4h-4zM175.5 28.5h4v4h-4zM182.5 0.5h4v4h-4zM182.5 7.5h4v4h-4zM182.5 14.5h4v4h-4zM182.5 21.5h4v4h-4zM182.5 28.5h4v4h-4zM189.5 0.5h4v4h-4zM189.5 7.5h4v4h-4zM189.5 14.5h4v4h-4zM189.5 21.5h4v4h-4zM189.5 28.5h4v4h-4zM196.5 0.5h4v4h-4zM196.5 7.5h4v4h-4zM196.5 14.5h4v4h-4zM196.5 21.5h4v4h-4zM196.5 28.5h4v4h-4zM203.5 0.5h4v4h-4zM203.5 7.5h4v4h-4zM203.5 14.5h4v4h-4zM203.5 21.5h4v4h-4zM203.5 28.5h4v4h-4zM210.5 0.5h4v4h-4zM210.5 7.5h4v4h-4zM210.5 14.5h4v4h-4zM210.5 21.5h4v4h-4zM210.5 28.5h4v4h-4zM217.5 0.5h4v4h-4zM217.5 7.5h4v4h-4zM217.5 14.5h4v4h-4zM217.5 21.5h4v4h-4zM217.5 28.5h4v4h-4zM224.5 0.5h4v4h-4zM224.5 7.5h4v4h-4zM224.5 14.5h4v4h-4zM224.5 21.5h4v4h-4zM224.5 28.5h4v4h-4zM231.5 0.5h4v4h-4zM231.5 7.5h4v4h-4zM231.5 14.5h4v4h-4zM231.5 21.5h4v4h-4zM231.5 28.5h4v4h-4zM238.5 0.5h4v4h-4zM238.5 7.5h4v4h-4zM238.5 14.5h4v4h-4zM238.5 21.5h4v4h-4zM238.5 28.5h4v4h-4zM245.5 0.5h4v4h-4zM245.5 7.5h4v4h-4zM245.5 14.5h4v4h-4zM245.5 21.5h4v4h-4zM245.5 28.5h4v4h-4zM252.5 0.5h4v4h-4zM252.5 7.5h4v4h-4zM252.5 14.5h4v4h-4zM252.5 21.5h4v4h-4zM252.5 28.5h4v4h-4zM259.5 0.5h4v4h-4zM259.5 7.5h4v4h-4zM259.5 14.5h4v4h-4zM259.5 21.5h4v4h-4zM259.5 28.5h4v4h-4zM266.5 0.5h4v4h-4zM266.5 7.5h4v4h-4zM266.5 14.5h4v4h-4zM266.5 21.5h4v4h-4zM266.5 28.5h4v4h-4zM273.5 0.5h4v4h-4zM273.5 7.5h4v4h-4zM273.5 14.5h4v4h-4zM273.5 21.5h4v4h-4zM273.5 28.5h4v4h-4zM280.5 0.5h4v4h-4zM280.5 7.5h4v4h-4z" fill="none" stroke="#A8B2C0" stroke-opacity=".45" stroke-width="1"/></svg><svg class="lm-disc-sm" viewBox="0 0 145 68" preserveAspectRatio="xMinYMid meet"><path d="M0 0h5v5h-5zM0 7h5v5h-5zM0 14h5v5h-5zM0 21h5v5h-5zM0 28h5v5h-5zM0 35h5v5h-5zM0 42h5v5h-5zM0 49h5v5h-5zM0 56h5v5h-5zM0 63h5v5h-5zM7 0h5v5h-5zM7 7h5v5h-5zM7 14h5v5h-5zM7 21h5v5h-5zM7 28h5v5h-5zM7 35h5v5h-5zM7 42h5v5h-5zM7 49h5v5h-5zM7 56h5v5h-5zM7 63h5v5h-5zM14 0h5v5h-5zM14 7h5v5h-5zM14 14h5v5h-5zM14 21h5v5h-5zM14 28h5v5h-5zM14 35h5v5h-5zM14 42h5v5h-5zM14 49h5v5h-5zM14 56h5v5h-5zM14 63h5v5h-5zM21 0h5v5h-5zM21 7h5v5h-5zM21 14h5v5h-5zM21 21h5v5h-5zM21 28h5v5h-5zM21 35h5v5h-5zM21 42h5v5h-5zM21 49h5v5h-5zM21 56h5v5h-5zM21 63h5v5h-5zM28 0h5v5h-5zM28 7h5v5h-5zM28 14h5v5h-5zM28 21h5v5h-5zM28 28h5v5h-5zM28 35h5v5h-5zM28 42h5v5h-5zM28 49h5v5h-5zM28 56h5v5h-5zM28 63h5v5h-5zM35 0h5v5h-5zM35 7h5v5h-5zM35 14h5v5h-5zM35 21h5v5h-5zM35 28h5v5h-5zM35 35h5v5h-5zM35 42h5v5h-5zM35 49h5v5h-5zM35 56h5v5h-5zM35 63h5v5h-5zM42 0h5v5h-5zM42 7h5v5h-5zM42 14h5v5h-5zM42 21h5v5h-5zM42 28h5v5h-5zM42 35h5v5h-5zM42 42h5v5h-5zM42 49h5v5h-5zM42 56h5v5h-5zM42 63h5v5h-5zM49 0h5v5h-5zM49 7h5v5h-5zM49 14h5v5h-5zM49 21h5v5h-5zM49 28h5v5h-5zM49 35h5v5h-5zM49 42h5v5h-5zM49 49h5v5h-5zM49 56h5v5h-5zM49 63h5v5h-5z" fill="#E8B963"/><path d="M56.5 0.5h4v4h-4zM56.5 7.5h4v4h-4zM56.5 14.5h4v4h-4zM56.5 21.5h4v4h-4zM56.5 28.5h4v4h-4zM56.5 35.5h4v4h-4zM56.5 42.5h4v4h-4zM56.5 49.5h4v4h-4zM56.5 56.5h4v4h-4zM56.5 63.5h4v4h-4zM63.5 0.5h4v4h-4zM63.5 7.5h4v4h-4zM63.5 14.5h4v4h-4zM63.5 21.5h4v4h-4zM63.5 28.5h4v4h-4zM63.5 35.5h4v4h-4zM63.5 42.5h4v4h-4zM63.5 49.5h4v4h-4zM63.5 56.5h4v4h-4zM63.5 63.5h4v4h-4zM70.5 0.5h4v4h-4zM70.5 7.5h4v4h-4zM70.5 14.5h4v4h-4zM70.5 21.5h4v4h-4zM70.5 28.5h4v4h-4zM70.5 35.5h4v4h-4zM70.5 42.5h4v4h-4zM70.5 49.5h4v4h-4zM70.5 56.5h4v4h-4zM70.5 63.5h4v4h-4zM77.5 0.5h4v4h-4zM77.5 7.5h4v4h-4zM77.5 14.5h4v4h-4zM77.5 21.5h4v4h-4zM77.5 28.5h4v4h-4zM77.5 35.5h4v4h-4zM77.5 42.5h4v4h-4zM77.5 49.5h4v4h-4zM77.5 56.5h4v4h-4zM77.5 63.5h4v4h-4zM84.5 0.5h4v4h-4zM84.5 7.5h4v4h-4zM84.5 14.5h4v4h-4zM84.5 21.5h4v4h-4zM84.5 28.5h4v4h-4zM84.5 35.5h4v4h-4zM84.5 42.5h4v4h-4zM84.5 49.5h4v4h-4zM84.5 56.5h4v4h-4zM84.5 63.5h4v4h-4zM91.5 0.5h4v4h-4zM91.5 7.5h4v4h-4zM91.5 14.5h4v4h-4zM91.5 21.5h4v4h-4zM91.5 28.5h4v4h-4zM91.5 35.5h4v4h-4zM91.5 42.5h4v4h-4zM91.5 49.5h4v4h-4zM91.5 56.5h4v4h-4zM91.5 63.5h4v4h-4zM98.5 0.5h4v4h-4zM98.5 7.5h4v4h-4zM98.5 14.5h4v4h-4zM98.5 21.5h4v4h-4zM98.5 28.5h4v4h-4zM98.5 35.5h4v4h-4zM98.5 42.5h4v4h-4zM98.5 49.5h4v4h-4zM98.5 56.5h4v4h-4zM98.5 63.5h4v4h-4zM105.5 0.5h4v4h-4zM105.5 7.5h4v4h-4zM105.5 14.5h4v4h-4zM105.5 21.5h4v4h-4zM105.5 28.5h4v4h-4zM105.5 35.5h4v4h-4zM105.5 42.5h4v4h-4zM105.5 49.5h4v4h-4zM105.5 56.5h4v4h-4zM105.5 63.5h4v4h-4zM112.5 0.5h4v4h-4zM112.5 7.5h4v4h-4zM112.5 14.5h4v4h-4zM112.5 21.5h4v4h-4zM112.5 28.5h4v4h-4zM112.5 35.5h4v4h-4zM112.5 42.5h4v4h-4zM112.5 49.5h4v4h-4zM112.5 56.5h4v4h-4zM112.5 63.5h4v4h-4zM119.5 0.5h4v4h-4zM119.5 7.5h4v4h-4zM119.5 14.5h4v4h-4zM119.5 21.5h4v4h-4zM119.5 28.5h4v4h-4zM119.5 35.5h4v4h-4zM119.5 42.5h4v4h-4zM119.5 49.5h4v4h-4zM119.5 56.5h4v4h-4zM119.5 63.5h4v4h-4zM126.5 0.5h4v4h-4zM126.5 7.5h4v4h-4zM126.5 14.5h4v4h-4zM126.5 21.5h4v4h-4zM126.5 28.5h4v4h-4zM126.5 35.5h4v4h-4zM126.5 42.5h4v4h-4zM126.5 49.5h4v4h-4zM126.5 56.5h4v4h-4zM126.5 63.5h4v4h-4zM133.5 0.5h4v4h-4zM133.5 7.5h4v4h-4zM133.5 14.5h4v4h-4zM133.5 21.5h4v4h-4zM133.5 28.5h4v4h-4zM133.5 35.5h4v4h-4zM133.5 42.5h4v4h-4zM133.5 49.5h4v4h-4zM133.5 56.5h4v4h-4zM133.5 63.5h4v4h-4zM140.5 0.5h4v4h-4zM140.5 7.5h4v4h-4z" fill="none" stroke="#A8B2C0" stroke-opacity=".45" stroke-width="1"/></svg><span class="lm-disc-n">~80</span></div>
      <div class="lm-disc-key" aria-hidden="true"><span><i></i>One discovery</span><span><i class="gap"></i>Fewer than in 2009</span></div>
    </figure>
  </div>
</section>

<?php xray_site_footer(); ?>

  <?php
} );
