<?php
/**
 * Moved from Code Snippets #16 "Pricing Page".
 */

add_action( 'generate_before_content', function () {
  if ( ! is_page( 'pricing' ) ) return;
  ?>

<?php xray_site_nav(); ?>

<section class="pr-hero">
  <canvas id="pr-terrain"></canvas>
  <div class="pr-hero-bg"></div>
  <div class="pr-hero-inner">
    <h1>Three annual tiers. <span class="accent">Matched to your program.</span></h1>
    <p>X-Ray is sold as an annual software subscription. Pick the tier that fits the scale of your exploration: <strong>a single commodity and project</strong>, or <strong>multiple commodities and projects</strong>. Contact us for exact pricing.</p>
  </div>
</section>

<section class="plan-section">
  <div class="plan-inner">
    <div class="plan-grid">

      <div class="plan-card">
        <span class="plan-soon-badge">Single Project</span>
        <div class="plan-name">Tier 1</div>
        <div class="plan-price" style="font-size:36px;">Contact us</div>
        <p class="plan-sub">Billed annually. One commodity, one project. Built for junior explorers running a focused lithium program in the Great Basin.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>One commodity model · Great Basin lithium</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>One exploration project</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Upload your own exploration data</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Prospectivity heat map &amp; ranked drill targets</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>3D visualization of your target area</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Compartmentalized data · never trains other customers' models</span></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-outline plan-cta" style="justify-content:center;">Contact Us</a>
      </div>

      <div class="plan-card featured">
        <span class="plan-badge">Multi-Project · Multi-Commodity</span>
        <div class="plan-name" style="margin-top:18px;">Tier 2</div>
        <div class="plan-price" style="font-size:36px;">Contact us</div>
        <p class="plan-sub">Billed annually. Expands to multiple commodities and multiple projects for teams running more than one program.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Everything in Tier 1</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Multiple exploration projects</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Multiple commodity models as they are released (nickel is next)</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Keep uploading drill data as your program moves</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Continuous updates as model accuracy improves</span></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold plan-cta" style="justify-content:center;">Request a Demo</a>
      </div>

      <div class="plan-card">
        <span class="plan-soon-badge">Broadest Scope</span>
        <div class="plan-name">Tier 3</div>
        <div class="plan-price" style="font-size:36px;">Contact us</div>
        <p class="plan-sub">Billed annually. Our widest coverage of commodities and projects, scoped with you to the scale and risk of your portfolio.</p>
        <hr class="plan-divider">
        <div class="plan-feats">
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Everything in Tier 2</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>More commodities and projects under one subscription</span></div>
          <div class="plan-feat"><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E8B963" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg><span>Scope set to match your exploration investment</span></div>
        </div>
        <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-outline plan-cta" style="justify-content:center;">Contact Us</a>
      </div>

    </div>
  </div>
</section>

<section class="faq-section">
  <div class="faq-inner">
    <h2>How the <span class="accent">tiers</span> actually work.</h2>
    <details class="q" open>
      <summary>What's the difference between the tiers?</summary>
      <div class="q-body">Scope. Tier 1 covers a single commodity and a single project. Tiers 2 and 3 expand to multiple commodities and multiple projects. The point is to let you match your investment to the scale and risk of your exploration.</div>
    </details>
    <details class="q">
      <summary>Why don't you list prices?</summary>
      <div class="q-body">Pricing depends on how many commodities and projects you need, and we're still refining it with input from exploration teams. <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>">Request a demo</a> or email <a href="mailto:info@xraygeoanalytics.com">info@xraygeoanalytics.com</a> and we'll walk you through it.</div>
    </details>
    <details class="q">
      <summary>Which commodities are available?</summary>
      <div class="q-body">Lithium in the Great Basin today. Our Great Basin lithium model reaches 95% recall and 80% precision at 1x1 km cells. Nickel is the next model we're building, because our customers already explore for it alongside lithium. More commodities follow as each model is ready.</div>
    </details>
    <details class="q">
      <summary>Why an annual subscription?</summary>
      <div class="q-body">Exploration projects run for years. An annual subscription gives you continuous access to the platform and to updates as we improve model accuracy and add features, and you can keep uploading drilling data as your program progresses.</div>
    </details>
    <details class="q">
      <summary>What do I get from the platform?</summary>
      <div class="q-body">Your geologists upload their exploration data and get back a prospectivity heat map, a ranked list of drill targets and a 3D visualization of the area being targeted.</div>
    </details>
    <details class="q">
      <summary>Is my data used to train anyone else's model?</summary>
      <div class="q-body">No. Each customer's data is compartmentalized. Everything you upload is used only for your own predictions and is never used to train other customers' models.</div>
    </details>
  </div>
</section>

<section class="pr-cta">
  <div class="pr-cta-bg"></div>
  <div class="pr-cta-inner">
    <h2>Spend less finding <span class="accent">where to drill</span>.</h2>
    <p>Target generation runs $30K–$90K per project a year, and drilling can cost up to $500K per site. X-Ray helps you drill fewer holes before you make a discovery.</p>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
      <a href="<?php echo esc_url( home_url( '/request-demo/' ) ); ?>" class="xr-btn xr-btn-gold" style="font-size:16px;padding:16px 36px;">Request a Demo</a>
      <a href="<?php echo esc_url( home_url( '/why-xray/' ) ); ?>" class="xr-btn xr-btn-outline" style="font-size:16px;padding:16px 36px;">Why X-Ray <span class="xr-arrow">→</span></a>
    </div>
  </div>
</section>

<?php xray_site_footer(); ?>

  <?php
} );
