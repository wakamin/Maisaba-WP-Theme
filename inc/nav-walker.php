<?php
/**
 * Custom Navigation Walker for Tailwind CSS
 *
 * @package Maisaba
 */

if (!defined('ABSPATH')) {
    exit;
}

class Maisaba_Nav_Walker extends Walker_Nav_Menu {
    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $classes = 'sub-menu hidden absolute left-0 top-full mt-2 w-48 rounded-xl bg-white p-2 shadow-lg ring-1 ring-slate-900/5 focus:outline-none z-50 transition-all duration-150 ease-out';
        $output .= "\n$indent<ul class=\"$classes\">\n";
    }

    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Starts the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $has_children = !empty($args->walker->has_children);

        $li_classes = ['menu-item'];
        if ($has_children) {
            $li_classes[] = 'menu-item-has-children relative group';
        }
        if (in_array('current-menu-item', $item->classes ?? [])) {
            $li_classes[] = 'current-menu-item';
        }

        $class_names = implode(' ', array_filter($li_classes));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . '>';

        $atts = [];
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        if ('_blank' === $item->target && empty($item->xfn)) {
            $atts['rel'] = 'noopener';
        } else {
            $atts['rel'] = $item->xfn;
        }
        $atts['href'] = !empty($item->url) ? $item->url : '';

        // Base styling for nav links
        $link_classes = 'inline-flex items-center text-sm font-medium transition-colors duration-150 ';
        if ($depth === 0) {
            if (in_array('current-menu-item', $item->classes ?? [])) {
                $link_classes .= 'text-primary-600 font-semibold ';
            } else {
                $link_classes .= 'text-slate-700 hover:text-primary-600 ';
            }
            $link_classes .= 'py-2 px-3 rounded-lg hover:bg-slate-100';
        } else {
            if (in_array('current-menu-item', $item->classes ?? [])) {
                $link_classes .= 'text-primary-600 font-semibold bg-primary-50 ';
            } else {
                $link_classes .= 'text-slate-700 hover:text-primary-600 hover:bg-slate-50 ';
            }
            $link_classes .= 'w-full px-3 py-2 rounded-lg';
        }

        $atts['class'] = $link_classes;

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before ?? '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= ($args->link_before ?? '') . $title . ($args->link_after ?? '');

        if ($has_children && $depth === 0) {
            $item_output .= '<svg class="ml-1 h-4 w-4 text-slate-400 group-hover:text-primary-600 transition-transform duration-150 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>';
        }

        $item_output .= '</a>';

        if ($has_children) {
            $item_output .= '<button type="button" class="dropdown-toggle lg:hidden ml-1 p-1 text-slate-400 hover:text-slate-600" aria-expanded="false" aria-label="' . esc_attr__('Toggle dropdown', 'maisaba') . '"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg></button>';
        }

        $item_output .= $args->after ?? '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * Ends the element output.
     */
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}
