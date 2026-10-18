# GeneratePress Child theme (live site code)

This folder mirrors `wp-content/themes/generatepress_child/` on xraygeoanalytics.com.
It replaces the Code Snippets plugin and Appearance → Customize → Additional CSS.

- `functions.php` loads `inc/*.php` in the order the old snippets ran (by snippet ID).
- `inc/page-*.php` print each page's nav, content and footer on `generate_before_content`.
  The WordPress pages themselves are empty.
- `inc/enqueue-scripts.php` and `inc/global-scripts.php` load GSAP, Three.js and the
  per-page scripts from this repo through jsDelivr.
- `inc/hide-gp-chrome.php` removes the GeneratePress header and footer on the custom pages.
- `assets/xray.css` is the former Additional CSS.

## Going live

1. Copy this folder over `wp-content/themes/generatepress_child/` (the synced
   `wordpress-code` folder). With `XRAY_THEME_LIVE` false nothing changes on the site. (Switched on 2026-10-18.)
2. In wp-admin → Snippets, deactivate the X-Ray snippets (IDs 6, 7, 10–25).
3. Set `XRAY_THEME_LIVE` to `true` in `functions.php` and sync.
4. Clear Appearance → Customize → Additional CSS (it would otherwise load twice).

To roll back: set `XRAY_THEME_LIVE` to `false` and reactivate the snippets.
