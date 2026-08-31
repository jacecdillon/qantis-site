<?php
/**
 * Qantis Theme Functions
 */

function qantis_theme_setup() {
    add_theme_support ('title-tag');

    add_theme_support('post-thumbnails');

    register_nav_menus(array (
        'primary' => __('Hoofdmenu', 'qantis'),
        'footer' => __('Footer Menu', 'qantis'),
    ));
}

add_action('after_setup_theme', 'qantis_theme_setup');
