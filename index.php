<?php
/**
 * The main template file
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php if (is_home() && !is_front_page()) : ?>
        <header class="mb-10 text-center sm:text-left">
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                <?php single_post_title(); ?>
            </h1>
        </header>
    <?php endif; ?>

    <div class="grid grid-cols-1 <?php echo is_active_sidebar('sidebar-1') ? 'lg:grid-cols-12 gap-8' : ''; ?>">
        <!-- Main Content Stream -->
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

        <!-- Sidebar -->
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <div class="lg:col-span-4 mt-8 lg:mt-0">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
