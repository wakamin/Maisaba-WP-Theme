<?php
/**
 * The template for displaying the footer
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer bg-slate-900 text-slate-400 mt-auto border-t border-slate-800">
        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) : ?>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                    <div>
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                    <div>
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                    <div>
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-800/80"></div>
        <?php endif; ?>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:flex sm:items-center sm:justify-between text-xs text-slate-500">
            <div class="site-info mb-4 sm:mb-0">
                <p>
                    &copy; <?php echo esc_html(date_i18n('Y')); ?> 
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-slate-400 hover:text-white transition-colors font-medium">
                        <?php bloginfo('name'); ?>
                    </a>. 
                    <?php esc_html_e('All rights reserved.', 'maisaba'); ?>
                </p>
            </div>

            <?php if (has_nav_menu('footer')) : ?>
                <nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', 'maisaba'); ?>">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'depth'          => 1,
                        'container'      => false,
                        'menu_class'     => 'flex flex-wrap gap-x-6 gap-y-2 text-slate-400 hover:text-slate-200',
                    ]);
                    ?>
                </nav>
            <?php endif; ?>
        </div>
    </footer>
</div><!-- #page -->

<!-- Back to Top Button -->
<button id="back-to-top" 
        type="button" 
        aria-label="<?php esc_attr_e('Back to top', 'maisaba'); ?>" 
        class="fixed bottom-6 right-6 z-30 p-3 rounded-full bg-primary-600 text-white shadow-lg hover:bg-primary-700 focus:outline-hidden focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 opacity-0 pointer-events-none transition-all duration-300">
    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>

<?php wp_footer(); ?>

</body>
</html>
