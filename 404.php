<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
    <div class="inline-flex items-center justify-center w-24 h-24 rounded-3xl bg-primary-50 text-primary-600 mb-8 ring-8 ring-primary-50/50">
        <span class="text-4xl font-black">404</span>
    </div>

    <header class="page-header mb-4">
        <h1 class="page-title text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
            <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'maisaba'); ?>
        </h1>
    </header>

    <p class="text-slate-600 text-base sm:text-lg mb-8 max-w-md mx-auto">
        <?php esc_html_e('It looks like nothing was found at this location. Maybe try a search or head back to the homepage?', 'maisaba'); ?>
    </p>

    <div class="max-w-md mx-auto mb-10">
        <?php get_search_form(); ?>
    </div>

    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-white bg-primary-600 hover:bg-primary-700 rounded-xl shadow-xs hover:shadow-md transition-all">
        <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        <?php esc_html_e('Back to Home', 'maisaba'); ?>
    </a>
</main>

<?php
get_footer();
