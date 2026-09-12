<?php
/**
 * Custom template tags for this theme
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('maisaba_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function maisaba_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated hidden" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        echo '<span class="inline-flex items-center text-xs text-slate-500"><svg class="w-3.5 h-3.5 mr-1 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>' . $time_string . '</span>';
    }
endif;

if (!function_exists('maisaba_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function maisaba_posted_by() {
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x('%s', 'post author', 'maisaba'),
            '<a class="font-medium text-slate-700 hover:text-primary-600 transition-colors" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
        );

        $avatar = get_avatar(get_the_author_meta('ID'), 24, '', '', ['class' => 'rounded-full inline-block mr-1.5']);

        echo '<span class="inline-flex items-center text-xs text-slate-600">' . $avatar . $byline . '</span>';
    }
endif;

if (!function_exists('maisaba_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function maisaba_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(', ');
            if ($categories_list) {
                echo '<div class="text-xs text-slate-500 mb-2">';
                echo '<span class="font-semibold text-slate-700 mr-1">' . esc_html__('Categories:', 'maisaba') . '</span>';
                echo $categories_list;
                echo '</div>';
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('<span class="inline-flex flex-wrap gap-1.5 mt-2">', '', '</span>');
            if ($tags_list) {
                echo '<div class="mt-4">';
                echo '<span class="block text-xs font-semibold text-slate-700 mb-1.5">' . esc_html__('Tags:', 'maisaba') . '</span>';
                echo get_the_tag_list('<span class="inline-flex flex-wrap gap-1.5"><span class="px-2.5 py-1 text-xs font-medium bg-slate-100 text-slate-600 rounded-full hover:bg-primary-50 hover:text-primary-600 transition-colors">', '</span><span class="px-2.5 py-1 text-xs font-medium bg-slate-100 text-slate-600 rounded-full hover:bg-primary-50 hover:text-primary-600 transition-colors">', '</span></span>');
                echo '</div>';
            }
        }

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
            '<div class="mt-4 text-xs font-medium text-slate-400">',
            '</div>'
        );
    }
endif;

if (!function_exists('maisaba_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     */
    function maisaba_post_thumbnail($size = 'post-thumbnail', $classes = '') {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
            ?>
            <div class="post-thumbnail mb-8 rounded-2xl overflow-hidden shadow-sm <?php echo esc_attr($classes); ?>">
                <?php the_post_thumbnail($size, ['class' => 'w-full h-auto object-cover max-h-[500px]']); ?>
            </div>
        <?php else : ?>
            <a class="post-thumbnail block overflow-hidden rounded-xl bg-slate-100 <?php echo esc_attr($classes); ?>" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    $size,
                    [
                        'class' => 'w-full aspect-[16/9] object-cover transition-transform duration-300 group-hover:scale-105',
                        'alt'   => the_title_attribute([
                            'echo' => false,
                        ]),
                    ]
                );
                ?>
            </a>
        <?php
        endif;
    }
endif;

if (!function_exists('maisaba_pagination')) :
    /**
     * Renders modern numeric pagination styled with Tailwind CSS
     */
    function maisaba_pagination() {
        global $wp_query;

        $total_pages = $wp_query->max_num_pages;

        if ($total_pages <= 1) {
            return;
        }

        $current_page = max(1, get_query_var('paged'));

        $paginate_links = paginate_links([
            'base'      => esc_url_raw(str_replace(999999999, '%#%', get_pagenum_link(999999999))),
            'format'    => '?paged=%#%',
            'current'   => $current_page,
            'total'     => $total_pages,
            'type'      => 'array',
            'prev_text' => '<svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>' . esc_html__('Previous', 'maisaba'),
            'next_text' => esc_html__('Next', 'maisaba') . '<svg class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>',
        ]);

        if (empty($paginate_links)) {
            return;
        }

        echo '<nav class="flex items-center justify-center my-10" aria-label="' . esc_attr__('Posts navigation', 'maisaba') . '">';
        echo '<ul class="inline-flex items-center space-x-1 sm:space-x-2 text-sm">';

        foreach ($paginate_links as $link) {
            $active = strpos($link, 'current') !== false;
            $dots   = strpos($link, 'dots') !== false;

            if ($active) {
                $styled_link = str_replace(
                    'class="page-numbers current"',
                    'class="px-3.5 py-2 font-semibold text-white bg-primary-600 rounded-lg shadow-sm"',
                    $link
                );
            } elseif ($dots) {
                $styled_link = str_replace(
                    'class="page-numbers dots"',
                    'class="px-2 py-2 text-slate-400"',
                    $link
                );
            } else {
                $styled_link = str_replace(
                    'class="page-numbers',
                    'class="px-3.5 py-2 font-medium text-slate-700 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-primary-600 transition-colors inline-flex items-center shadow-xs page-numbers',
                    $link
                );
            }

            echo '<li>' . $styled_link . '</li>';
        }

        echo '</ul>';
        echo '</nav>';
    }
endif;
