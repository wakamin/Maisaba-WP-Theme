# Maisaba - WordPress Classic Theme with Tailwind CSS v4

A custom **WordPress Classic Theme** powered by **Tailwind CSS v4**, the first-party **Tailwind Vite plugin**, **Swiper**, and **@tailwindcss/typography**.

Designed specifically for classic theme development (not block theme/FSE), giving you full control over PHP templates and HTML semantics while enjoying modern utility-first CSS and lightning-fast asset compilation.

---

## 🚀 Features

- **WordPress Classic Architecture**: Uses traditional PHP template hierarchy (`header.php`, `footer.php`, `index.php`, `single.php`, `page.php`, `archive.php`, `search.php`, `404.php`, `comments.php`).
- **Tailwind CSS v4**: CSS-first design tokens with explicit PHP and JavaScript source detection.
- **Tailwind Typography**: Automatic, beautiful styling for `the_content()` output with `prose prose-slate lg:prose-lg max-w-none`.
- **Accessible Navigation**: Full-screen overlay using the WordPress Primary Menu, with desktop hover/focus image changes, Escape, focus trapping/restoration, and scroll lock. Mobile uses a text-only single-column menu.
- **Custom Nav Walker**: `Maisaba_Nav_Walker` seamlessly integrates WordPress menus (`wp_nav_menu`) with Tailwind utility classes.
- **Fast Build Pipeline (Vite)**: Build watch mode (`npm run dev`) and minified production builds (`npm run build`); no Vite dev server or HMR is used.
- **Cache Busting**: Compiled CSS and JS use `filemtime` versions in both development and production.
- **Homepage**: Karaya-inspired hardcoded sections, local imagery, Swiper carousels, villa hover expansion, experience accordion, and reduced-motion support. No preloader.
- **Localization**: Theme interface labels support WordPress localization; the hardcoded Karaya marketing copy is English and is not fully localized.
- **Local WP Ready**: Built and organized to work directly with Local by Flywheel.

---

## 📁 Directory Structure

```
maisaba/
├── style.css                  # WordPress Theme Declaration & metadata
├── functions.php              # Theme setup, asset enqueueing, sidebars
├── header.php                 # Header markup & metadata
├── footer.php                 # Global branded footer, contacts & Footer Menu
├── front-page.php             # Calls homepage section render functions
├── index.php                  # Main blog feed & fallback
├── single.php                 # Single post layout
├── page.php                   # Standard page layout
├── archive.php                # Category, tag, and author archives
├── search.php                 # Search results page
├── searchform.php             # Search form template
├── 404.php                    # 404 error page
├── comments.php               # Accessible comment list & reply form
├── sidebar.php                # Widget sidebar
├── inc/
│   ├── homepage-sections.php  # Hardcoded homepage renderers, copy, CTA & icons
│   ├── nav-walker.php         # Tailwind-compatible Nav Walker
│   ├── template-tags.php      # Meta, dates, authors, thumbnails, pagination
│   └── template-functions.php # Body classes, pingback, excerpt settings
├── template-parts/
│   ├── navigation.php         # Fixed header & full-screen menu overlay
│   ├── content.php            # Post summary card
│   ├── content-single.php     # Full post article
│   ├── content-page.php       # Full page article
│   ├── content-none.php       # Empty state
│   └── content-search.php     # Search result card
├── src/
│   ├── css/
│   │   └── main.css           # Tailwind directives & core WP classes
│   └── js/
│       └── main.js            # Overlay, Swiper, accordion & scroll reveals
├── assets/images/karaya/      # Local reference imagery
├── dist/                      # Compiled production assets
│   ├── css/style.css
│   ├── js/main.js
│   └── assets/               # Assets emitted by Vite, including grain texture
├── package.json
└── vite.config.js
```

---

## 🛠️ Quick Start (Local WP)

### 1. Install Dependencies
Open your terminal in the theme directory (`wp-content/themes/maisaba`):
```bash
npm ci
```

### 2. Start Development (Watch Mode)
```bash
npm run dev
```
This runs Vite in watch mode. Any edits to PHP files, `src/css/main.css`, or `src/js/main.js` will trigger an instant rebuild to `dist/`. Simply refresh your Local WP site in the browser to see the updates.

### 3. Build for Production
```bash
npm run build
```
Creates minified, purged, and optimized CSS & JS in `dist/`.

---

## 🎨 Customizing Theme Colors & Styles

### Modifying Tailwind Tokens
Open `src/css/main.css` and update the CSS-first `@theme` block:

```css
@theme {
  --color-moss: #6f8e6f;
  --color-cream: #fefdf9;
}
```

### Adding Custom Styles
Add your custom CSS or component classes directly in `src/css/main.css` inside `@layer components` or `@layer utilities`.

---

## ⚙️ Activating in WordPress
1. Launch your site in **Local WP**.
2. Go to **WP Admin > Appearance > Themes**.
3. Locate **Maisaba** and click **Activate**.
4. Set up menus under **Appearance > Menus** (assign to "Primary Menu" and "Footer Menu").
5. Set your logo and Site Icon (favicon) in the Customizer. These are WordPress settings, not bundled theme assets.
6. The homepage uses `front-page.php`; other pages retain the classic theme templates.

## Production Installation

The production ZIP contains one top-level `maisaba/` folder with the PHP templates, `inc/`, `template-parts/`, `style.css`, `screenshot.png`, `assets/`, compiled `dist/`, README, and LICENSE. It excludes `node_modules`, Git metadata, development sources/configuration, and source maps. Node.js is not needed on the production server.

1. Back up your existing theme and site before updating.
2. Upload the ZIP via **Appearance > Themes > Add New > Upload Theme**, then activate Maisaba (or replace the existing theme when prompted).
3. Assign the Primary Menu and Footer Menu. Desktop overlay images map to the first eight Primary Menu items by order; the Footer Menu falls back to Primary when unassigned.
4. Configure the logo and Site Icon. Theme ZIPs do not include the WordPress database, media uploads, menu assignments, or Customizer settings; migrate those separately when moving to a new site.
5. Smoke-test the homepage, menus, sliders, and booking links after installation.

### Important Deployment Notes

- Runtime requirements declared by the theme: WordPress 6.0+ and PHP 7.4+. Test on your actual production versions; syntax validation here uses PHP 8.2.
- Tailwind v4 browser baseline: Safari 16.4+, Chrome 111+, Firefox 128+.
- Google Fonts (`Cormorant Garamond` and `DM Sans`) are loaded remotely; reference images and Swiper are local/bundled.
- Homepage copy, contacts, copyright branding, and booking/section CTA destinations are intentionally hardcoded to Karaya. Review them in `inc/homepage-sections.php`, `template-parts/navigation.php`, and `footer.php` before publishing under Maisaba branding.
- Social links currently use `#` placeholders and need real destinations before launch. Check WordPress menu URLs as well; those are configured separately in the database.
- Confirm permission/licensing for the downloaded Karaya imagery and content before public deployment; the code LICENSE does not establish rights to third-party assets.
- Keep the development checkout for future edits. Change tokens and reusable buttons in `src/css/main.css`, rebuild with `npm run build`, then package the updated runtime files. Do not edit the generated `dist/` files directly.
