<?php
/**
 * The template for displaying search results pages
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <header class="page-header mb-10 pb-6 border-b border-slate-200">
        <h1 class="page-title text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            <?php
            /* translators: %s: search query. */
            printf(esc_html__('Search Results for: %s', 'maisaba'), '<span class="text-primary-600">&ldquo;' . get_search_query() . '&rdquo;</span>');
            ?>
        </h1>
        <p class="text-sm text-slate-500 mt-1">
            <?php
            global $wp_query;
            printf(
                /* translators: %d: number of results found */
                esc_html(_n('Found %d result', 'Found %d results', $wp_query->found_posts, 'maisaba')),
                (int) $wp_query->found_posts
            );
            ?>
        </p>
    </header>

    <div class="grid grid-cols-1 <?php echo is_active_sidebar('sidebar-1') ? 'lg:grid-cols-12 gap-8' : 'max-w-4xl mx-auto'; ?>">
        <div class="<?php echo is_active_sidebar('sidebar-1') ? 'lg:col-span-8' : 'w-full'; ?>">
            <?php if (have_posts()) : ?>
                <div class="space-y-6">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'search');
                    endwhile;
                    ?>
                </div>

                <?php maisaba_pagination(); ?>

            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>

        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <div class="lg:col-span-4 mt-8 lg:mt-0">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
