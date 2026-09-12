<?php
/**
 * The template for displaying all single posts
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 <?php echo is_active_sidebar('sidebar-1') ? 'lg:grid-cols-12 gap-8' : 'max-w-4xl mx-auto'; ?>">
        <div class="<?php echo is_active_sidebar('sidebar-1') ? 'lg:col-span-8' : 'w-full'; ?>">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'single');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
            endwhile;
            ?>
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
