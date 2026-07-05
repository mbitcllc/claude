# Bespoke Virtual Concierge — WordPress rebuild

A minimal single-page WordPress theme for `bespoke-vc.com`, built to replace the
GoDaddy "Airo" site that was taken down. It reproduces the same feel (dark
hero image, bold letter-spaced header, elegant tagline, dark "Contact Us"
section, footer) with a working, spam-guarded contact form — but everything is
editable from the WordPress Customizer, no code required.

Theme location: `wp-content/themes/bespoke-vc/`

## What's included

- `front-page.php` / `index.php` — single landing page (hero + contact form + footer)
- `inc/customizer.php` — adds Customizer controls: hero image, hero heading/tagline,
  contact email/phone/intro text, footer text
- `inc/contact-form.php` — handles the contact form: nonce-verified, honeypot
  spam trap, sends via `wp_mail()` to the configured contact email, then
  redirects back with a success/error message (no resubmission on refresh)
- `style.css` — all page styling (dark theme, responsive)

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
     and tagline text
   - *Landing Page: Contact* — set the contact email (this is both the
     address shown to visitors and where form submissions are sent), phone
     (optional), and intro text
   - *Landing Page: Footer* — footer text after the copyright/site name
   - Under **Site Identity**, optionally upload a logo (replaces the plain
     text site title in the header) and set the Site Title.
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
