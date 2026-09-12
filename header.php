<?php
/**
 * The header for our theme
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen flex flex-col">
    <a class="screen-reader-text skip-link" href="#primary"><?php esc_html_e('Skip to content', 'maisaba'); ?></a>

    <?php get_template_part('template-parts/navigation'); ?>

    <div id="content" class="site-content flex-grow<?php echo is_front_page() ? '' : ' pt-28 pb-12'; ?>">
