<?php
/**
 * The template for displaying archive pages
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
        <?php
        the_archive_title('<h1 class="page-title text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">', '</h1>');
        the_archive_description('<div class="archive-description text-slate-600 mt-2 text-base max-w-3xl leading-relaxed">', '</div>');
        ?>
    </header>

    <div class="grid grid-cols-1 <?php echo is_active_sidebar('sidebar-1') ? 'lg:grid-cols-12 gap-8' : ''; ?>">
        <div class="<?php echo is_active_sidebar('sidebar-1') ? 'lg:col-span-8' : 'w-full'; ?>">
            <?php if (have_posts()) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', get_post_type());
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
