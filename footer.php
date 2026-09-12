<?php
/**
 * Global Karaya-inspired footer.
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer pt-20">
        <div class="m-container text-center">
            <div class="reveal">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a class="font-display text-4xl text-moss no-underline" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <?php endif; ?>
            </div>

            <div class="footer-social reveal mt-6">
                <a href="#" aria-label="Instagram"><?php echo maisaba_icon('instagram'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
                <a href="#" aria-label="Facebook"><?php echo maisaba_icon('facebook'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
                <a href="#" aria-label="TikTok"><?php echo maisaba_icon('tiktok'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
            </div>

            <div class="reveal mx-auto mt-7 max-w-5xl space-y-2 text-sm font-light leading-relaxed lg:text-base">
                <p>Jl. Raya Kerobokan No.369, Gang Karaya, Kerobokan Kelod, Kuta Utara, Badung, Bali 80361, Indonesia</p>
                <p>Phone: +62 813 3383 3883 | Whatsapp:</p>
                <p>info@karayavillasumalas.com</p>
            </div>
        </div>

        <div class="m-container mt-10 border-t border-moss">
            <nav aria-label="<?php esc_attr_e('Footer Menu', 'maisaba'); ?>">
                <?php
                if (has_nav_menu('footer')) {
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'depth'          => 1,
                        'container'      => false,
                        'menu_class'     => 'footer-menu',
                    ]);
                } else {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'menu_id'        => 'footer-menu',
                        'depth'          => 1,
                        'container'      => false,
                        'menu_class'     => 'footer-menu',
                    ]);
                }
                ?>
            </nav>
        </div>

        <div class="m-container border-t border-moss py-12 text-center">
            <p class="display-title reveal text-[clamp(2.5rem,5vw,5rem)]">Experience the Best of Umalas</p>
        </div>

        <p class="bg-moss px-6 py-4 text-center text-xs font-light text-white">Copyright© <?php echo esc_html(wp_date('Y')); ?> Karaya Villas Umalas. All rights reserved.</p>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
