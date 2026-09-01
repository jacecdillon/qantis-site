<?php
/**
 * Qantis Theme Functions
 */

function qantis_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Menulocaties registreren
    register_nav_menus(array(
        'primary'     => __('Hoofdmenu', 'qantis'),
        'footer_menu' => __('Footer Menu', 'qantis'),
    ));
}
add_action('after_setup_theme', 'qantis_theme_setup');

function qantis_enqueue_assets() {
    wp_enqueue_style(
        'qantis-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        filemtime(get_template_directory() . '/assets/css/main.css')
    );
}
add_action('wp_enqueue_scripts', 'qantis_enqueue_assets');

if ( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Site Opties',
        'menu_title' => 'Site Opties',
        'menu_slug'  => 'site-options',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}