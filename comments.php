<?php
/**
 * The template for displaying comments
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area mt-12 pt-8 border-t border-slate-200">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title text-2xl font-bold text-slate-800 mb-6">
            <?php
            $maisaba_comment_count = get_comments_number();
            if ('1' === $maisaba_comment_count) {
                printf(
                    /* translators: 1: title. */
                    esc_html__('One thought on &ldquo;%1$s&rdquo;', 'maisaba'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    /* translators: 1: comment count number, 2: title. */
                    esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $maisaba_comment_count, 'comments title', 'maisaba')),
                    number_format_i18n($maisaba_comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list divide-y divide-slate-100 mb-8">
            <?php
            wp_list_comments([
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
                'callback'    => 'maisaba_comment_callback',
            ]);
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if (!comments_open()) :
            ?>
            <p class="no-comments py-4 text-center text-sm text-slate-500 italic bg-slate-100 rounded-xl">
                <?php esc_html_e('Comments are closed.', 'maisaba'); ?>
            </p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    $commenter     = wp_get_current_commenter();
    $user          = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';
    $req           = get_option('require_name_email');
    $aria_req      = ($req ? " aria-required='true' required" : '');

    $fields = [
        'author' => '<div class="comment-form-author mb-4">' .
            '<label for="author" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">' . esc_html__('Name', 'maisaba') . ($req ? ' <span class="text-rose-500">*</span>' : '') . '</label>' .
            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" class="w-full px-4 py-2.5 text-sm bg-white border border-slate-200 rounded-xl focus:outline-hidden focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all" ' . $aria_req . ' /></div>',

        'email' => '<div class="comment-form-email mb-4">' .
            '<label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">' . esc_html__('Email', 'maisaba') . ($req ? ' <span class="text-rose-500">*</span>' : '') . '</label>' .
            '<input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" class="w-full px-4 py-2.5 text-sm bg-white border border-slate-200 rounded-xl focus:outline-hidden focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all" ' . $aria_req . ' /></div>',

        'url' => '<div class="comment-form-url mb-4">' .
            '<label for="url" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">' . esc_html__('Website', 'maisaba') . '</label>' .
            '<input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" class="w-full px-4 py-2.5 text-sm bg-white border border-slate-200 rounded-xl focus:outline-hidden focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all" /></div>',
    ];

    comment_form([
        'fields'               => $fields,
        'comment_field'        => '<div class="comment-form-comment mb-4">' .
            '<label for="comment" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1.5">' . esc_html_x('Comment', 'noun', 'maisaba') . ' <span class="text-rose-500">*</span></label>' .
            '<textarea id="comment" name="comment" cols="45" rows="5" class="w-full px-4 py-3 text-sm bg-white border border-slate-200 rounded-xl focus:outline-hidden focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all" required></textarea></div>',
        'class_form'           => 'comment-form bg-slate-50 p-6 sm:p-8 rounded-2xl border border-slate-200/80 mt-6',
        'title_reply'          => esc_html__('Leave a Reply', 'maisaba'),
        'title_reply_to'       => esc_html__('Leave a Reply to %s', 'maisaba'),
        'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title text-xl font-bold text-slate-900 mb-2">',
        'title_reply_after'    => '</h3>',
        'cancel_reply_before'  => ' <small class="text-xs text-rose-600 ml-2 hover:underline">',
        'cancel_reply_after'   => '</small>',
        'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white text-sm font-semibold rounded-xl shadow-xs transition-colors cursor-pointer inline-flex items-center">%4$s</button>',
        'submit_field'         => '<p class="form-submit mt-6">%1$s %2$s</p>',
    ]);
    ?>
</div>
