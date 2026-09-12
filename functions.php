<?php
/**
 * Maisaba functions and definitions
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!defined('MAISABA_VERSION')) {
    define('MAISABA_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function maisaba_setup() {
    // Make theme available for translation.
    load_theme_textdomain('maisaba', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(1200, 675, true);
    add_image_size('maisaba-card', 720, 405, true);

    // Register navigation menus.
    register_nav_menus([
        'primary' => esc_html__('Primary Menu', 'maisaba'),
        'footer'  => esc_html__('Footer Menu', 'maisaba'),
    ]);

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', [
        'default-color' => 'f8fafc',
    ]);

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo.
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Add support for responsive embeds & wide blocks.
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'maisaba_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function maisaba_content_width() {
    $GLOBALS['content_width'] = apply_filters('maisaba_content_width', 1140);
}
add_action('after_setup_theme', 'maisaba_content_width', 0);

/**
 * Register widget area.
 */
function maisaba_widgets_init() {
    register_sidebar([
        'name'          => esc_html__('Main Sidebar', 'maisaba'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'maisaba'),
        'before_widget' => '<section id="%1$s" class="widget %2$s bg-white p-6 rounded-2xl border border-slate-100 shadow-xs mb-6">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title text-base font-bold text-slate-800 pb-3 mb-4 border-b border-slate-100">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Footer Column 1', 'maisaba'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in footer column 1.', 'maisaba'),
        'before_widget' => '<div id="%1$s" class="widget %2$s text-sm text-slate-400">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="text-sm font-semibold uppercase tracking-wider text-slate-200 mb-4">',
        'after_title'   => '</h4>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Footer Column 2', 'maisaba'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here to appear in footer column 2.', 'maisaba'),
        'before_widget' => '<div id="%1$s" class="widget %2$s text-sm text-slate-400">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="text-sm font-semibold uppercase tracking-wider text-slate-200 mb-4">',
        'after_title'   => '</h4>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Footer Column 3', 'maisaba'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here to appear in footer column 3.', 'maisaba'),
        'before_widget' => '<div id="%1$s" class="widget %2$s text-sm text-slate-400">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="text-sm font-semibold uppercase tracking-wider text-slate-200 mb-4">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'maisaba_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function maisaba_scripts() {
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();

    // Google Fonts alternatives for the Karaya-inspired visual system.
    wp_enqueue_style(
        'maisaba-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500&family=DM+Sans:wght@300;400;500&display=swap',
        [],
        null
    );

    // Theme CSS
    $css_path = '/dist/css/style.css';
    $css_version = file_exists($theme_dir . $css_path) ? filemtime($theme_dir . $css_path) : MAISABA_VERSION;
    wp_enqueue_style('maisaba-tailwind', $theme_uri . $css_path, ['maisaba-fonts'], $css_version);

    // Root style.css fallback/child theme support
    wp_enqueue_style('maisaba-style', get_stylesheet_uri(), ['maisaba-tailwind'], MAISABA_VERSION);

    // Theme JS
    $js_path = '/dist/js/main.js';
    $js_version = file_exists($theme_dir . $js_path) ? filemtime($theme_dir . $js_path) : MAISABA_VERSION;
    wp_enqueue_script('maisaba-main', $theme_uri . $js_path, [], $js_version, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'maisaba_scripts');

/**
 * Include helper files
 */
require_once get_template_directory() . '/inc/nav-walker.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/homepage-sections.php';
