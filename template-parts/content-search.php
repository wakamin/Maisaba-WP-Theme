<?php
/**
 * Template part for displaying results in search pages
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('p-6 bg-white rounded-2xl border border-slate-200/80 hover:border-primary-200 shadow-xs hover:shadow-md transition-all'); ?>>
    <header class="entry-header mb-3">
        <div class="flex items-center space-x-2 text-xs text-slate-400 mb-1.5 uppercase tracking-wider font-semibold">
            <span><?php echo esc_html(get_post_type()); ?></span>
            <span>&bull;</span>
            <?php maisaba_posted_on(); ?>
        </div>
        <h2 class="text-xl font-bold text-slate-900 hover:text-primary-600 transition-colors leading-snug">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
    </header>

    <div class="entry-summary text-sm text-slate-600 leading-relaxed">
        <?php the_excerpt(); ?>
    </div>

    <footer class="entry-footer mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
        <a href="<?php the_permalink(); ?>" class="text-primary-600 font-semibold hover:text-primary-700 inline-flex items-center">
            <?php esc_html_e('Read full article', 'maisaba'); ?>
            <svg class="w-3.5 h-3.5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </footer>
</article>
