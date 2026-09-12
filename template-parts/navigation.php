<?php
/**
 * Global Karaya-inspired header and fullscreen navigation.
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

$maisaba_booking_url = 'https://booking.guirez.com/?property=kvu';
$maisaba_menu_images = [
    'menu-01.jpg', 'menu-02.webp', 'menu-03.webp', 'menu-04.png',
    'menu-05.png', 'menu-06.png', 'menu-07.png', 'menu-08.webp',
];
?>
<header id="site-header" class="site-header" data-site-header>
    <div class="site-header__brand">
        <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <a class="font-display text-3xl text-current no-underline" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
        <?php endif; ?>
    </div>
    <a class="btn btn-light header-book" href="<?php echo esc_url($maisaba_booking_url); ?>">Book <span class="hidden sm:inline">Now</span></a>
    <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="site-menu-overlay" aria-label="<?php esc_attr_e('Open main menu', 'maisaba'); ?>" data-menu-open>
        <svg viewBox="0 0 52 36" fill="none" aria-hidden="true"><path d="M1 2H51M1 18H51M1 34H51" stroke="currentColor" stroke-width="2"/></svg>
    </button>
</header>

<div id="site-menu-overlay" class="menu-overlay" role="dialog" aria-modal="true" aria-hidden="true" aria-label="<?php esc_attr_e('Main navigation', 'maisaba'); ?>" data-menu-overlay>
    <div class="menu-overlay__top">
        <div class="menu-overlay__logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a class="font-display text-3xl text-white no-underline" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
        </div>
        <a class="btn btn-light header-book" href="<?php echo esc_url($maisaba_booking_url); ?>">Book <span class="hidden sm:inline">Now</span></a>
        <button class="menu-toggle menu-overlay__close" type="button" aria-label="<?php esc_attr_e('Close main menu', 'maisaba'); ?>" data-menu-close>
            <svg viewBox="0 0 44 44" fill="none" aria-hidden="true"><path d="M6 6L38 38M38 6L6 38" stroke="currentColor" stroke-width="2"/></svg>
        </button>
    </div>
    <div class="menu-overlay__body">
        <div class="menu-overlay__media" aria-hidden="true">
            <?php foreach ($maisaba_menu_images as $maisaba_index => $maisaba_filename) : ?>
                <img class="menu-overlay__image<?php echo 0 === $maisaba_index ? ' is-active' : ''; ?>" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/karaya/' . $maisaba_filename); ?>" alt="" width="1600" height="1000" decoding="async" <?php echo 0 === $maisaba_index ? '' : 'loading="lazy"'; ?> data-menu-image="<?php echo esc_attr($maisaba_index); ?>">
            <?php endforeach; ?>
        </div>
        <nav class="menu-overlay__nav" aria-label="<?php esc_attr_e('Primary Menu', 'maisaba'); ?>">
            <?php
            if (has_nav_menu('primary')) {
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_id'        => 'overlay-primary-menu',
                    'container'      => false,
                    'menu_class'     => 'overlay-menu',
                    'depth'          => 1,
                ]);
            } else {
                echo '<ul class="overlay-menu">';
                wp_list_pages(['title_li' => '', 'depth' => 1]);
                echo '</ul>';
            }
            ?>
        </nav>
    </div>
    <div class="menu-overlay__footer" aria-label="<?php esc_attr_e('Social media', 'maisaba'); ?>">
        <a href="#" aria-label="Instagram"><?php echo maisaba_icon('instagram'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
        <a href="#" aria-label="Facebook"><?php echo maisaba_icon('facebook'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
        <a href="#" aria-label="TikTok"><?php echo maisaba_icon('tiktok'); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></a>
    </div>
</div>
