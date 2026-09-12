<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area lg:col-span-4 space-y-6">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
