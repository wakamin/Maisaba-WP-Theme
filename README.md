# Maisaba - WordPress Classic Base Theme with Tailwind CSS

A modern, developer-friendly **WordPress Classic Theme** boilerplate powered by **Tailwind CSS v3**, **Vite**, **PostCSS**, and **@tailwindcss/typography**.

Designed specifically for classic theme development (not block theme/FSE), giving you full control over PHP templates and HTML semantics while enjoying modern utility-first CSS and lightning-fast asset compilation.

---

## 🚀 Features

- **WordPress Classic Architecture**: Uses traditional PHP template hierarchy (`header.php`, `footer.php`, `index.php`, `single.php`, `page.php`, `archive.php`, `search.php`, `404.php`, `comments.php`).
- **Tailwind CSS v3**: Fully configured with content purging across all PHP and JS files.
- **Tailwind Typography**: Automatic, beautiful styling for `the_content()` output with `prose prose-slate lg:prose-lg max-w-none`.
- **Accessible Navigation**: Desktop menu with hover/keyboard dropdowns and a fully responsive slide-out mobile drawer with `aria-*` accessibility.
- **Custom Nav Walker**: `Maisaba_Nav_Walker` seamlessly integrates WordPress menus (`wp_nav_menu`) with Tailwind utility classes.
- **Fast Build Pipeline (Vite)**: Zero-config hot watch mode during development (`npm run dev`) and minified production builds (`npm run build`).
- **Cache Busting**: In development, assets are enqueued with dynamic `filemtime` timestamps so changes reflect immediately upon page refresh.
- **Clean Internationalization (i18n)**: All strings use standard WordPress localization functions (`__()`, `_e()`, `esc_html__()`).
- **Local WP Ready**: Built and organized to work directly with Local by Flywheel.

---

## 📁 Directory Structure

```
maisaba/
├── style.css                  # WordPress Theme Declaration & metadata
├── functions.php              # Theme setup, asset enqueueing, sidebars
├── header.php                 # Header markup & metadata
├── footer.php                 # Footer markup & widget columns
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
│   ├── nav-walker.php         # Tailwind-compatible Nav Walker
│   ├── template-tags.php      # Meta, dates, authors, thumbnails, pagination
│   └── template-functions.php # Body classes, pingback, excerpt settings
├── template-parts/
│   ├── navigation.php         # Navbar & mobile drawer
│   ├── content.php            # Post summary card
│   ├── content-single.php     # Full post article
│   ├── content-page.php       # Full page article
│   ├── content-none.php       # Empty state
│   └── content-search.php     # Search result card
├── src/
│   ├── css/
│   │   └── main.css           # Tailwind directives & core WP classes
│   └── js/
│       └── main.js            # Mobile drawer, dropdowns, back-to-top
├── dist/                      # Compiled production assets
│   ├── css/style.css
│   └── js/main.js
├── package.json
├── tailwind.config.js
├── postcss.config.js
└── vite.config.js
```

---

## 🛠️ Quick Start (Local WP)

### 1. Install Dependencies
Open your terminal in the theme directory (`wp-content/themes/maisaba`):
```bash
npm install
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

### Modifying Tailwind Colors
Open `tailwind.config.js` to modify the primary palette or add your own colors:

```javascript
theme: {
  extend: {
    colors: {
      primary: {
        50: '#f0fdfa',
        ...
        600: '#0d9488', // Change brand accent here
      }
    }
  }
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
5. Customize widgets under **Appearance > Widgets**.
