# Bespoke Virtual Concierge — WordPress rebuild

A single-page WordPress theme for `bespoke-vc.com`, built to replace the
GoDaddy "Airo" site that was taken down. The page runs, in order: a dark
photo Hero, a "What We Do" section, a numbered "Services" list, an "About Me"
section, and a "Contact Me" section with a working, spam-guarded contact
form — matching the layout/content of the business's Canva-designed site.
Everything (text, images, contact info) is editable from the WordPress
Customizer, no code required.

Theme location: `wp-content/themes/bespoke-vc/`

## What's included

- `front-page.php` / `index.php` — single landing page, sections assembled in
  `template-parts/content-landing.php`
- `inc/defaults.php` — the single source of truth for default copy (hero text,
  bio, contact info, the 8 services list items). `bespoke_vc_default( 'key' )`
  is what `inc/customizer.php` registers as each Customizer field's default;
  `bespoke_vc_get( 'key' )` is what every template file calls to read a
  setting (it wraps `get_theme_mod()` with that same default), so there's
  exactly one place to change a default and no risk of the template's
  fallback drifting from the Customizer's
- `inc/customizer.php` — Customizer controls: hero image/heading/tagline,
  What We Do image/text, About Me photo/bio, Contact name/location/email
  (with a show/hide toggle)/phone/intro text, footer text
- `inc/contact-form.php` — handles the contact form: nonce-verified, honeypot
  spam trap, sends via `wp_mail()` to the configured contact email, then
  redirects back with a success/error message (no resubmission on refresh)
- `style.css` — all page styling (dark hero, light content sections, responsive)

## Deploying to SiteGround

1. **Point the domain at SiteGround** (if not already): in SiteGround Site Tools,
   add `bespoke-vc.com` under Domain, and update the domain's nameservers/DNS
   (wherever it's registered) to SiteGround's. Issue a free SSL cert via
   Site Tools > Security > SSL Manager once DNS has propagated.
2. **Install WordPress** on that domain via Site Tools > WordPress > Install
   (if not already installed).
3. **Upload the theme**:
   - Zip the `bespoke-vc` folder (so `bespoke-vc.zip` contains `style.css`,
     `functions.php`, etc. at its root), then in wp-admin go to
     Appearance > Themes > Add New > Upload Theme, and upload the zip.
   - Or, via Site Tools File Manager / SFTP, copy the `bespoke-vc` folder
     directly into `public_html/wp-content/themes/`.
4. **Activate** the theme in Appearance > Themes.
5. Go to **Appearance > Customize** and fill in:
   - *Landing Page: Hero* — upload a hero background photo, set the heading
     and tagline text, and choose **Hero Image Fit** (Fill & Crop, Fit
     Entirely with no cropping, or Stretch to Fill) and **Hero Image
     Position** (Centered, Top, Bottom, Left, Right) to control how the
     image is framed — useful if the uploaded image isn't the same
     proportions as the full-width hero banner (e.g. a logo instead of a
     wide photo). Uncheck **Darken image with overlay** to show the image
     at full brightness/color instead of dimmed under the dark gradient
     (better for a logo than a photo).
   - *Landing Page: What We Do* — upload an image, edit the description text
   - *Landing Page: About Me* — upload a photo, edit the bio text
   - *Landing Page: Contact Me* — name, location, contact email (with a
     checkbox to show/hide it on the page — the form still sends to this
     address either way), phone (optional), and intro text
   - *Landing Page: Footer* — footer text after the copyright/site name
   - Under **Site Identity**, optionally upload a logo (replaces the plain
     text site title in the header) and set the Site Title.
   - The 8-item Services list is not in the Customizer (it's a fixed list in
     `inc/defaults.php` under `bespoke_vc_services_list()`) — ask for an edit
     if the wording needs to change.
6. Confirm **Settings > Reading** has "Your homepage displays" set to
   "Your latest posts" (default) — `front-page.php` is used automatically as
   the homepage template regardless of this setting, so no static page needs
   to be created.
7. **Test the contact form** end to end. Shared hosting's default mail
   sending is often unreliable/spam-flagged — if messages don't arrive,
   install the free **WP Mail SMTP** plugin and connect it to an email
   provider (e.g. Gmail, SiteGround email, or a transactional service) so
   `wp_mail()` sends reliably.

## Notes

- The original site's exact copy/layout wasn't recoverable in this session
  (Wayback Machine access was blocked by this environment's network policy),
  so this rebuild uses the visible branding/tagline from a screenshot of the
  live site plus clean placeholder contact copy — intentionally not an exact
  clone, per request, just something live again quickly. Swap in real copy
  any time via the Customizer.
- No theme screenshot.png is included; the theme will show a generic icon in
  Appearance > Themes, which has no effect on the live site.
