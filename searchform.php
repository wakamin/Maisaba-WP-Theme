<?php
/**
 * Custom search form template
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<form role="search" method="get" class="search-form relative flex items-center w-full" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field-<?php echo esc_attr(uniqid()); ?>" class="screen-reader-text">
        <?php esc_html_e('Search for:', 'maisaba'); ?>
    </label>
    <div class="relative w-full">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input type="search" 
               id="search-field-<?php echo esc_attr(uniqid()); ?>" 
               class="search-field block w-full pl-10 pr-20 py-2 text-sm text-slate-800 placeholder-slate-400 bg-slate-50 hover:bg-slate-100/80 focus:bg-white border border-slate-200 rounded-xl focus:outline-hidden focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all" 
               placeholder="<?php echo esc_attr_x('Search articles, pages...', 'placeholder', 'maisaba'); ?>" 
               value="<?php echo get_search_query(); ?>" 
               name="s" />
        <button type="submit" class="search-submit absolute inset-y-1 right-1 px-3 bg-primary-600 hover:bg-primary-700 text-white text-xs font-semibold rounded-lg shadow-xs transition-colors flex items-center">
            <?php echo esc_html_x('Search', 'submit button', 'maisaba'); ?>
        </button>
    </div>
</form>
