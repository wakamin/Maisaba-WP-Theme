<?php
/**
 * The hardcoded homepage.
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

maisaba_render_home_hero();
maisaba_render_home_welcome();
maisaba_render_home_villas();
maisaba_render_home_about();
maisaba_render_home_concierge();
maisaba_render_home_map();
maisaba_render_home_experiences();
maisaba_render_home_reviews();

get_footer();
