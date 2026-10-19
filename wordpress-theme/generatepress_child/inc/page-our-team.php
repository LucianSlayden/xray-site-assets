<?php
/**
 * Moved from Code Snippets #19 "XRay — Our Team Page Content".
 */

/* ══ Our Team page — content + styles injection ══════════════════════
   Hook: generate_before_content (fires inside .entry-content)
   Condition: only on the /our-team/ page
   IMPORTANT: The WordPress page editor for /our-team/ should be empty
   — all content comes from this snippet.
   ════════════════════════════════════════════════════════════════════ */
add_action( 'generate_before_content', function () {
  if ( ! is_page( 'our-team' ) ) return;
  ?>
<style>
/* Our Team — GeneratePress wrapper resets (scoped to avoid hitting site header) */
#content,
#content .inside-site-content,
#content .grid-container,
#content .grid-parent,
#primary, .content-area, .grid-item,
#main, .site-main,
article, .inside-article, .entry-content {
	max-width: none !important;
	width: 100% !important;
	padding: 0 !important;
	margin: 0 !important;
	background: transparent !important;
	border: none !important;
	box-shadow: none !important;
	overflow: visible !important;
	float: none !important;
}
.entry-content { position: relative !important; z-index: 2 !important; }

/* Extended GP/WP site-level wrappers */
.site, .site-wrap, .site-inner, .site-content,
.inside-site-content, .site-header-wrap,
.container, .inside-container { background: transparent !important; }

/* Page background — only injected on Our Team */
body { background: #0E141B !important; }

/* ── Full-page fixed background ─────────────────────────────── */
#ot-page-bg {
  position: fixed;
  inset: 0;
  background: url('https://xraygeoanalytics.com/wp-content/themes/generatepress_child/assets/img/mj-team-bg-full.webp') center/cover no-repeat;
  opacity: 0 !important;
  z-index: 0;
  pointer-events: none;
}
#ot-bg-canvas {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  pointer-events: none;
  z-index: 1;
}

/* ── Hero ──────────────────────────────────────────────────── */
#ot-hero {
  position: relative;
  min-height: 100vh;
  overflow: hidden;
  background: transparent !important;
  padding: 130px 0 80px;
  z-index: 2;
}


.ot-fog-top {
  position: absolute; top: 0; left: 0; right: 0; height: 100px;
  background: linear-gradient(to bottom, #0E141B, transparent);
  z-index: 2; pointer-events: none;
}
.ot-hero-content {
  position: relative; z-index: 3;
  max-width: 620px;
}
#ot-eyebrow, #ot-lede, #ot-strip { opacity: 0; transform: translateY(18px); }
.ot-hw-inner { display: inline-block; transform: translateY(110%); }

.ot-disc-strip {
  display: flex; align-items: center; gap: 0;
  padding-top: 28px;
  border-top: 1px solid rgba(232,185,99,0.16);
  flex-wrap: wrap;
}
.ot-disc-item { padding: 0 28px; border-left: 1px solid rgba(232,185,99,0.16); }
.ot-disc-item:first-child { border-left: none; padding-left: 0; }
.ot-disc-num {
  font-family: var(--xr-font-display); font-weight: 700;
  font-size: 32px; line-height: 1;
  color: #E8B963; letter-spacing: -0.02em;
}
.ot-disc-num.sky { color: #6FB5E0; }
.ot-disc-lbl {
  color: #6F7B8B; font-size: 11px;
  letter-spacing: 0.10em; text-transform: uppercase;
  margin-top: 6px; font-weight: 700;
}

/* ── Founders section ──────────────────────────────────────── */
#ot-founders {
  position: relative;
  background: transparent !important;
  padding: 100px 0;
  z-index: 2;
}
#ot-founders .xr-container { position: relative; z-index: 1; }

.ot-team-grid { display: flex; flex-direction: column; gap: 16px; }

.ot-team-card {
  background: #2C3747;
  border: 1px solid rgba(232,185,99,0.18);
  border-radius: 2px;
  padding: 32px 36px;
  position: relative; overflow: hidden;
  display: grid;
  grid-template-columns: 160px 1fr;
  grid-template-areas: "avatar bio" "name bio" "role tags";
  gap: 0 48px;
  align-items: start;
  transition: border-color .3s, box-shadow .3s, transform .3s;
  opacity: 0; transform: translateY(24px);
}
@media (max-width: 640px) {
  .ot-team-card {
    grid-template-columns: 1fr;
    grid-template-areas: "avatar" "name" "role" "bio" "tags";
    gap: 8px 0; padding: 24px 20px;
  }
}
.ot-team-card.sky { border-color: rgba(111,181,224,0.18); }
.ot-team-card::before {
  content: '';
  position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, #E8B963, rgba(232,185,99,0.08));
}
.ot-team-card.sky::before { background: linear-gradient(90deg, #6FB5E0, rgba(111,181,224,0.08)); }
.ot-team-card:hover {
  border-color: rgba(232,185,99,0.50);
  box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 4px 16px rgba(232,185,99,0.10);
  transform: translateY(-5px);
}
.ot-team-card.sky:hover {
  border-color: rgba(111,181,224,0.50);
  box-shadow: 0 20px 60px rgba(0,0,0,0.5), 0 4px 16px rgba(111,181,224,0.10);
}

.ot-badge {
  position: absolute; top: 10px; right: 10px;
  background: rgba(232,185,99,0.16);
  border: 1px solid rgba(232,185,99,0.38);
  color: #E8B963; font-size: 9px; font-weight: 700;
  letter-spacing: 0.08em; text-transform: uppercase;
  padding: 3px 7px; border-radius: 2px;
  display: flex; align-items: center; gap: 4px;
}
.ot-badge::before {
  content: ''; width: 5px; height: 5px;
  background: #E8B963; border-radius: 50%;
  box-shadow: 0 0 7px rgba(232,185,99,0.7);
}

.ot-avatar {
  width: 80px; height: 92px;
  clip-path: polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);
  background: linear-gradient(135deg, #2C3747, #1F2835);
  border: 1.5px solid #E8B963;
  display: flex; align-items: center; justify-content: center;
  grid-area: avatar; align-self: start; margin-bottom: 16px;
  transition: box-shadow .3s;
}
.ot-team-card.sky .ot-avatar { border-color: #6FB5E0; }
.ot-team-card:hover .ot-avatar { box-shadow: 0 0 32px rgba(232,185,99,0.30); }
.ot-team-card.sky:hover .ot-avatar { box-shadow: 0 0 32px rgba(111,181,224,0.30); }
.ot-avatar-init {
  font-family: var(--xr-font-display); font-weight: 700;
  font-size: 24px; color: #E8B963; line-height: 1;
}
.ot-team-card.sky .ot-avatar-init { color: #6FB5E0; }
.ot-avatar-role {
  color: #6F7B8B; font-size: 9px; letter-spacing: 0.1em;
  text-transform: uppercase; margin-top: 3px; text-align: center; font-weight: 700;
}
.ot-name {
  font-family: var(--xr-font-display); font-weight: 700;
  font-size: 17px; letter-spacing: -0.015em;
  color: #F1F4F8; text-align: left; margin: 0 0 4px;
  grid-area: name; align-self: start;
}
.ot-role {
  color: #E8B963; font-size: 10px; font-weight: 700;
  letter-spacing: 0.12em; text-transform: uppercase;
  text-align: left; margin-bottom: 0;
  grid-area: role; align-self: start;
}
.ot-team-card.sky .ot-role { color: #6FB5E0; }
.ot-bio {
  color: #A8B2C0; font-size: 13px; line-height: 1.65;
  margin: 0; grid-area: bio; align-self: center;
}
.ot-tags { display: flex; flex-wrap: wrap; gap: 5px; grid-area: tags; align-self: end; }
.ot-tag {
  background: rgba(232,185,99,0.07);
  border: 1px solid rgba(232,185,99,0.20);
  color: #E8B963; font-size: 9.5px; font-weight: 700;
  letter-spacing: 0.04em; padding: 2px 7px; border-radius: 2px;
}
.ot-team-card.sky .ot-tag {
  background: rgba(111,181,224,0.07);
  border-color: rgba(111,181,224,0.20);
  color: #6FB5E0;
}

/* ── Join section ──────────────────────────────────────────── */
#ot-join {
  background: transparent !important;
  padding: 110px 0;
  text-align: center;
  position: relative;
  z-index: 2;
}
#ot-join .xr-container { position: relative; z-index: 1; max-width: 680px; }
.ot-join-el { opacity: 0; transform: translateY(16px); }

/* Footer z-index */
.xr-footer { z-index: 2; }

/* Ensure all containers within sections are transparent */
.xr-container { background: transparent !important; }
</style>

<?php xray_site_nav(); ?>

<div id="ot-page-bg"></div>
<canvas id="ot-bg-canvas"></canvas>

<!-- ══ HERO ══════════════════════════════════════════════════ -->
<section id="ot-hero">
  <div class="ot-fog-right"></div>
  <div class="ot-fog-bottom"></div>
  <div class="ot-fog-top"></div>
  <div class="xr-container">
    <div class="ot-hero-content">
      <div id="ot-eyebrow">
        <span class="xr-eyebrow"><span class="xr-eyebrow-hex"></span>Our Team</span>
      </div>
      <h1 style="font-family:var(--xr-font-display);font-size:clamp(38px,5vw,68px);font-weight:700;line-height:1.08;letter-spacing:-0.03em;margin:18px 0 0;color:#F1F4F8;">
        <div style="overflow:hidden;"><div class="ot-hw-inner">Four co-founders.</div></div>
        <div style="overflow:hidden;"><div class="ot-hw-inner">Equal ownership.</div></div>
        <div style="overflow:hidden;"><div class="ot-hw-inner"><span style="color:#E8B963;">One focus.</span></div></div>
      </h1>
      <p id="ot-lede" style="color:#A8B2C0;font-size:17px;line-height:1.8;margin:18px 0 40px;max-width:500px;">
        X-Ray was built by four founders who share equal ownership and cover every discipline needed to build the technology and bring it to market: geology, finance, model development, machine learning, and law.
      </p>
      <div id="ot-strip">
        <div class="ot-disc-strip">
          <div class="ot-disc-item">
            <div class="ot-disc-num">2</div>
            <div class="ot-disc-lbl">Models &amp; Machine Learning</div>
          </div>
          <div class="ot-disc-item">
            <div class="ot-disc-num sky">1</div>
            <div class="ot-disc-lbl">Geology &amp; Finance</div>
          </div>
          <div class="ot-disc-item">
            <div class="ot-disc-num">1</div>
            <div class="ot-disc-lbl">Legal &amp; IP</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══ FOUNDERS ══════════════════════════════════════════════ -->
<section id="ot-founders">
  <div class="xr-container">
    <div style="text-align:left;margin-bottom:52px;">
      <span class="xr-eyebrow ot-join-el"><span class="xr-eyebrow-hex"></span>Founders</span>
      <h2 class="ot-join-el" style="font-family:var(--xr-font-display);font-size:clamp(26px,3vw,40px);font-weight:700;letter-spacing:-0.02em;margin:16px 0 0;color:#F1F4F8;">The people behind the model.</h2>
    </div>

    <div class="ot-team-grid">

      <!-- Lucian Slayden — CEO -->
      <div class="ot-team-card">
        <span class="ot-badge">Primary Contact</span>
        <div class="ot-avatar">
          <div style="text-align:center;">
            <div class="ot-avatar-init">LS</div>
            <div class="ot-avatar-role">CEO</div>
          </div>
        </div>
        <h3 class="ot-name">Lucian Slayden</h3>
        <div class="ot-role">Chief Executive Officer</div>
        <p class="ot-bio">Leads the company's direction. Studies both accounting and geology, acts as CFO, and helps with the geotechnical side of building X-Ray's predictive models. His geology background supports long-term planning and X-Ray's standing in the mining industry.</p>
        <div class="ot-tags">
          <span class="ot-tag">Strategy</span>
          <span class="ot-tag">Finance</span>
          <span class="ot-tag">Geology</span>
        </div>
      </div>

      <!-- Ethan Lopez — CTO -->
      <div class="ot-team-card">
        <div class="ot-avatar">
          <div style="text-align:center;">
            <div class="ot-avatar-init">EL</div>
            <div class="ot-avatar-role">CTO</div>
          </div>
        </div>
        <h3 class="ot-name">Ethan Lopez</h3>
        <div class="ot-role">Chief Technology Officer</div>
        <p class="ot-bio">Leads the direction of all model development and supports the CEO on everything technical that isn't specifically geological. Works closely with Jack on the Great Basin lithium model, which has reached 95% recall and 80% precision.</p>
        <div class="ot-tags">
          <span class="ot-tag">Model Development</span>
          <span class="ot-tag">Technology</span>
          <span class="ot-tag">Models</span>
        </div>
      </div>

      <!-- Jack Hilbert — CDO -->
      <div class="ot-team-card sky">
        <div class="ot-avatar">
          <div style="text-align:center;">
            <div class="ot-avatar-init">JH</div>
            <div class="ot-avatar-role">CDO</div>
          </div>
        </div>
        <h3 class="ot-name">Jack Hilbert</h3>
        <div class="ot-role">Chief Data Officer</div>
        <p class="ot-bio">Leads development of everything related to machine learning and model training. X-Ray's lead programmer, he works closely with Ethan to turn decades of cleaned and sorted geological data into models that can learn from it.</p>
        <div class="ot-tags">
          <span class="ot-tag">Machine Learning</span>
          <span class="ot-tag">Model Training</span>
          <span class="ot-tag">Lead Programmer</span>
        </div>
      </div>

      <!-- Nick Lopez — CLO -->
      <div class="ot-team-card">
        <div class="ot-avatar">
          <div style="text-align:center;">
            <div class="ot-avatar-init">NL</div>
            <div class="ot-avatar-role">CLO</div>
          </div>
        </div>
        <h3 class="ot-name">Nick Lopez</h3>
        <div class="ot-role">Chief Legal Officer</div>
        <p class="ot-bio">Handles IP protection, corporate formation, equity agreements, contracts, and regulatory compliance. Holds a J.D. from Georgetown and passed the Florida Bar Examination in 2025.</p>
        <div class="ot-tags">
          <span class="ot-tag">IP Protection</span>
          <span class="ot-tag">Contracts</span>
          <span class="ot-tag">Compliance</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══ JOIN ══════════════════════════════════════════════════ -->
<section id="ot-join">
  <div class="xr-container">
    <span class="xr-eyebrow ot-join-el" style="justify-content:center;margin-bottom:16px;"><span class="xr-eyebrow-hex"></span>Join the team</span>
    <h2 class="ot-join-el" style="font-family:var(--xr-font-display);font-size:clamp(26px,3vw,40px);font-weight:700;letter-spacing:-0.02em;margin:0 0 16px;color:#F1F4F8;">Want to work with us?</h2>
    <p class="ot-join-el" style="color:#A8B2C0;font-size:17px;line-height:1.8;margin:0 auto 36px;max-width:500px;">We're a small, focused team, and we plan to bring on a geoscientist with proven industry experience to keep our models geologically sound. If you're a geoscientist, ML engineer, or mining-industry professional who wants to work on a genuinely hard problem, reach out.</p>
    <div class="ot-join-el" style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
      <a href="mailto:lucian@xraygeoanalytics.com" class="xr-btn xr-btn-gold">Get in Touch</a>
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-outline">Request a Demo <span class="xr-arrow">→</span></a>
    </div>
  </div>
</section>

<?php xray_site_footer(); ?>
	<?php
} );


