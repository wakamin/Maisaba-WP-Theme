<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-3xl p-6 sm:p-10 lg:p-12 border border-slate-100 shadow-xs'); ?>>
    <header class="entry-header mb-8 pb-6 border-b border-slate-100">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900 leading-tight">
            <?php the_title(); ?>
        </h1>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-thumbnail mb-10 rounded-2xl overflow-hidden shadow-sm">
            <?php the_post_thumbnail('full', ['class' => 'w-full h-auto max-h-[480px] object-cover']); ?>
        </div>
    <?php endif; ?>

    <div class="entry-content prose prose-slate lg:prose-lg max-w-none 
                prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-slate-900
                prose-a:text-primary-600 prose-a:font-semibold hover:prose-a:text-primary-700
                prose-img:rounded-2xl prose-img:shadow-sm">
        <?php
        the_content();

        wp_link_pages([
            'before' => '<div class="page-links mt-8 pt-4 border-t border-slate-100 flex items-center space-x-2 text-sm font-semibold">' . esc_html__('Pages:', 'maisaba'),
            'after'  => '</div>',
        ]);
        ?>
    </div>

    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer mt-10 pt-6 border-t border-slate-100">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'maisaba'),
                        [
                            'span' => [
                                'class' => [],
                            ],
                        ]
                    ),
                    wp_kses_post(get_the_title())
                ),
                '<span class="text-xs text-slate-400 hover:text-slate-600 font-medium">',
                '</span>'
            );
            ?>
        </footer>
    <?php endif; ?>
</article>
