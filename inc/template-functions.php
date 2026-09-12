<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function maisaba_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    $classes[] = 'bg-cream text-ink font-sans min-h-screen flex flex-col antialiased';

    return $classes;
}
add_filter('body_class', 'maisaba_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function maisaba_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'maisaba_pingback_header');

/**
 * Custom excerpt ellipsis
 */
function maisaba_excerpt_more($more) {
    if (is_admin()) {
        return $more;
    }
    return '&hellip;';
}
add_filter('excerpt_more', 'maisaba_excerpt_more');

/**
 * Custom excerpt length
 */
function maisaba_excerpt_length($length) {
    if (is_admin()) {
        return $length;
    }
    return 24;
}
add_filter('excerpt_length', 'maisaba_excerpt_length', 999);

/**
 * Custom comment callback for Tailwind styled comments
 */
function maisaba_comment_callback($comment, $args, $depth) {
    $tag = ('div' === $args['style']) ? 'div' : 'li';
    ?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('comment border-b border-slate-200 py-6 last:border-b-0'); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="flex items-start space-x-3 mb-3">
                <div class="flex-shrink-0">
                    <?php
                    if ($args['avatar_size'] != 0) {
                        echo get_avatar($comment, 44, '', '', ['class' => 'rounded-full border-2 border-white shadow-xs']);
                    }
                    ?>
                </div>
                <div class="min-w-0 flex-1">
                    <div class="flex items-center justify-between">
                        <h4 class="text-sm font-semibold text-slate-800">
                            <?php echo get_comment_author_link($comment); ?>
                        </h4>
                        <span class="text-xs text-slate-400">
                            <a href="<?php echo esc_url(get_comment_link($comment, $args)); ?>">
                                <?php
                                printf(
                                    /* translators: 1: date, 2: time */
                                    esc_html__('%1$s at %2$s', 'maisaba'),
                                    get_comment_date('', $comment),
                                    get_comment_time()
                                );
                                ?>
                            </a>
                        </span>
                    </div>

                    <?php if ('0' == $comment->comment_approved) : ?>
                        <em class="comment-awaiting-moderation block text-xs text-amber-600 my-1 bg-amber-50 px-2 py-1 rounded">
                            <?php esc_html_e('Your comment is awaiting moderation.', 'maisaba'); ?>
                        </em>
                    <?php endif; ?>

                    <div class="prose prose-sm prose-slate max-w-none text-slate-600 mt-2">
                        <?php comment_text(); ?>
                    </div>

                    <div class="mt-3 flex items-center space-x-4 text-xs">
                        <?php
                        comment_reply_link(
                            array_merge(
                                $args,
                                [
                                    'add_below' => 'div-comment',
                                    'depth'     => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'reply_text' => '<span class="font-medium text-primary-600 hover:text-primary-700 transition-colors">' . esc_html__('Reply', 'maisaba') . '</span>',
                                ]
                            )
                        );
                        ?>
                        <?php edit_comment_link(esc_html__('Edit', 'maisaba'), '<span class="text-slate-400 hover:text-slate-600">', '</span>'); ?>
                    </div>
                </div>
            </div>
        </article>
    <?php
}
