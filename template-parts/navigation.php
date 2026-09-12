<?php
/**
 * Header Navigation Template Part
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 transition-shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-18">
            <!-- Brand Logo / Site Title -->
            <div class="flex-shrink-0 flex items-center">
                <?php if (has_custom_logo()) : ?>
                    <div class="site-logo">
                        <?php the_custom_logo(); ?>
                    </div>
                <?php else : ?>
                    <div class="site-title-wrap">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-xl sm:text-2xl font-black tracking-tight text-slate-900 hover:text-primary-600 transition-colors">
                            <?php bloginfo('name'); ?>
                        </a>
                        <?php
                        $maisaba_description = get_bloginfo('description', 'display');
                        if ($maisaba_description || is_customize_preview()) :
                            ?>
                            <p class="text-xs text-slate-500 font-normal hidden md:block"><?php echo esc_html($maisaba_description); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Desktop Navigation Menu -->
            <nav class="hidden lg:flex items-center space-x-1" aria-label="<?php esc_attr_e('Primary Menu', 'maisaba'); ?>">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'menu_class'     => 'flex items-center space-x-1',
                        'walker'         => new Maisaba_Nav_Walker(),
                    ]);
                } else {
                    echo '<ul class="flex items-center space-x-4 text-sm font-medium text-slate-600">';
                    wp_list_pages([
                        'title_li' => '',
                        'depth'    => 1,
                    ]);
                    echo '</ul>';
                }
                ?>
            </nav>

            <!-- Right Actions: Search trigger & Mobile Menu button -->
            <div class="flex items-center space-x-2">
                <!-- Search Button (triggers search or links to search) -->
                <button type="button" 
                        onclick="const form = document.getElementById('header-search-bar'); form.classList.toggle('hidden'); if(!form.classList.contains('hidden')) form.querySelector('input').focus();"
                        class="p-2 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-lg transition-colors"
                        aria-label="<?php esc_attr_e('Search', 'maisaba'); ?>">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Mobile Hamburger Button -->
                <button type="button" 
                        id="mobile-menu-toggle"
                        class="lg:hidden p-2 text-slate-600 hover:text-slate-900 hover:bg-slate-100 rounded-lg focus:outline-hidden focus:ring-2 focus:ring-primary-500" 
                        aria-controls="mobile-menu" 
                        aria-expanded="false"
                        aria-label="<?php esc_attr_e('Open main menu', 'maisaba'); ?>">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Dropdown Search Bar -->
        <div id="header-search-bar" class="hidden py-3 border-t border-slate-100">
            <?php get_search_form(); ?>
        </div>
    </div>

    <!-- Mobile Drawer Navigation -->
    <div id="mobile-menu" class="hidden lg:hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs transition-opacity" role="dialog" aria-modal="true">
        <div class="fixed inset-y-0 right-0 max-w-xs w-full bg-white shadow-2xl p-6 flex flex-col justify-between overflow-y-auto">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-slate-100 mb-6">
                    <span class="text-base font-bold text-slate-800"><?php esc_html_e('Menu', 'maisaba'); ?></span>
                    <button type="button" id="mobile-menu-close" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg" aria-label="<?php esc_attr_e('Close menu', 'maisaba'); ?>">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mobile-nav-container">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'menu_id'        => 'mobile-primary-menu',
                            'container'      => false,
                            'menu_class'     => 'space-y-1',
                            'walker'         => new Maisaba_Nav_Walker(),
                        ]);
                    } else {
                        echo '<ul class="space-y-2 text-sm font-medium text-slate-700">';
                        wp_list_pages([
                            'title_li' => '',
                            'depth'    => 2,
                        ]);
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 mt-6">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</header>
