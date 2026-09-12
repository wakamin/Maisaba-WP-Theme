<?php
/**
 * Template part for displaying single post content
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-3xl p-6 sm:p-10 lg:p-12 border border-slate-100 shadow-xs'); ?>>
    <header class="entry-header mb-8 pb-8 border-b border-slate-100">
        <!-- Categories -->
        <?php
        $categories = get_the_category();
        if (!empty($categories)) :
            ?>
            <div class="flex flex-wrap gap-2 mb-4">
                <?php foreach ($categories as $category) : ?>
                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-primary-50 text-primary-700 hover:bg-primary-100 transition-colors">
                        <?php echo esc_html($category->name); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Main Title -->
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-slate-900 mb-6 leading-tight">
            <?php the_title(); ?>
        </h1>

        <!-- Post Meta -->
        <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-sm text-slate-500">
            <div class="flex items-center">
                <?php maisaba_posted_by(); ?>
            </div>
            <div>
                <?php maisaba_posted_on(); ?>
            </div>
            <?php if (comments_open()) : ?>
                <div class="inline-flex items-center text-xs text-slate-500">
                    <svg class="w-3.5 h-3.5 mr-1 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <a href="#comments" class="hover:text-primary-600 transition-colors">
                        <?php comments_number(__('0 comments', 'maisaba'), __('1 comment', 'maisaba'), __('% comments', 'maisaba')); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </header>

    <!-- Featured Hero Image -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="entry-thumbnail mb-10 rounded-2xl overflow-hidden shadow-sm">
            <?php the_post_thumbnail('full', ['class' => 'w-full h-auto max-h-[520px] object-cover']); ?>
        </div>
    <?php endif; ?>

    <!-- Post Body / Content with Tailwind Typography Prose -->
    <div class="entry-content prose prose-slate lg:prose-lg max-w-none 
                prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-slate-900
                prose-a:text-primary-600 prose-a:font-semibold hover:prose-a:text-primary-700
                prose-img:rounded-2xl prose-img:shadow-sm
                prose-pre:bg-slate-900 prose-pre:text-slate-100 prose-pre:rounded-xl">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'maisaba'),
                    [
                        'span' => [
                            'class' => [],
                        ],
                    ]
                ),
                wp_kses_post(get_the_title())
            )
        );

        wp_link_pages([
            'before' => '<div class="page-links mt-8 pt-4 border-t border-slate-100 flex items-center space-x-2 text-sm font-semibold">' . esc_html__('Pages:', 'maisaba'),
            'after'  => '</div>',
        ]);
        ?>
    </div>

    <!-- Tags and Edit Footer -->
    <footer class="entry-footer mt-10 pt-6 border-t border-slate-100">
        <?php maisaba_entry_footer(); ?>
    </footer>

    <!-- Author Box -->
    <?php if (get_the_author_meta('description')) : ?>
        <div class="author-bio mt-10 p-6 sm:p-8 bg-slate-50 rounded-2xl border border-slate-100 flex flex-col sm:flex-row items-center sm:items-start gap-5">
            <div class="flex-shrink-0">
                <?php echo get_avatar(get_the_author_meta('ID'), 80, '', '', ['class' => 'rounded-full ring-4 ring-white shadow-sm']); ?>
            </div>
            <div class="text-center sm:text-left">
                <span class="text-xs uppercase tracking-wider font-bold text-primary-600"><?php esc_html_e('Written by', 'maisaba'); ?></span>
                <h3 class="text-lg font-bold text-slate-900 mt-1">
                    <?php echo esc_html(get_the_author()); ?>
                </h3>
                <p class="text-sm text-slate-600 mt-2 leading-relaxed">
                    <?php the_author_meta('description'); ?>
                </p>
                <div class="mt-3">
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-xs font-semibold text-primary-600 hover:text-primary-700">
                        <?php
                        printf(
                            /* translators: %s: Author name */
                            esc_html__('View all articles by %s &rarr;', 'maisaba'),
                            esc_html(get_the_author())
                        );
                        ?>
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</article>

<!-- Single Post Navigation (Previous / Next) -->
<?php
$prev_post = get_previous_post();
$next_post = get_next_post();

if ($prev_post || $next_post) :
    ?>
    <nav class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8" aria-label="<?php esc_attr_e('Posts', 'maisaba'); ?>">
        <?php if ($prev_post) : ?>
            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="group p-5 bg-white rounded-2xl border border-slate-100 hover:border-primary-200 shadow-xs hover:shadow-md transition-all flex flex-col">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-primary-600 flex items-center mb-1">
                    <svg class="w-3.5 h-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    <?php esc_html_e('Previous Post', 'maisaba'); ?>
                </span>
                <span class="text-sm sm:text-base font-semibold text-slate-800 group-hover:text-primary-600 line-clamp-1 transition-colors">
                    <?php echo esc_html(get_the_title($prev_post->ID)); ?>
                </span>
            </a>
        <?php else : ?>
            <div></div>
        <?php endif; ?>

        <?php if ($next_post) : ?>
            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="group p-5 bg-white rounded-2xl border border-slate-100 hover:border-primary-200 shadow-xs hover:shadow-md transition-all flex flex-col text-right sm:items-end">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-400 group-hover:text-primary-600 flex items-center justify-end mb-1">
                    <?php esc_html_e('Next Post', 'maisaba'); ?>
                    <svg class="w-3.5 h-3.5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </span>
                <span class="text-sm sm:text-base font-semibold text-slate-800 group-hover:text-primary-600 line-clamp-1 transition-colors">
                    <?php echo esc_html(get_the_title($next_post->ID)); ?>
                </span>
            </a>
        <?php endif; ?>
    </nav>
<?php endif; ?>
