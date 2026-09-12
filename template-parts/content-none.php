<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="no-results not-found bg-white rounded-3xl p-8 sm:p-12 text-center border border-slate-100 shadow-xs max-w-2xl mx-auto my-12">
    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 text-slate-400 mb-6">
        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>

    <header class="page-header mb-4">
        <h1 class="page-title text-2xl sm:text-3xl font-bold text-slate-800">
            <?php esc_html_e('Nothing Found', 'maisaba'); ?>
        </h1>
    </header>

    <div class="page-content text-slate-600 text-sm sm:text-base leading-relaxed">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                    __('Ready to publish your first post? <a href="%1$s" class="text-primary-600 font-semibold underline">Get started here</a>.', 'maisaba'),
                    [
                        'a' => [
                            'href'  => [],
                            'class' => [],
                        ],
                    ]
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );

        elseif (is_search()) :
            ?>
            <p class="mb-6">
                <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'maisaba'); ?>
            </p>
            <div class="max-w-md mx-auto">
                <?php get_search_form(); ?>
            </div>
        <?php else : ?>
            <p class="mb-6">
                <?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'maisaba'); ?>
            </p>
            <div class="max-w-md mx-auto">
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
