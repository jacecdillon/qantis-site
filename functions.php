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

function qantis_enqueue_assets() {
    wp_enqueue_style( 
        'qantis-main-style', 
        get_template_directory_uri() . '/assets/css/main.css', 
        array(), 
        filemtime( get_template_directory() . '/assets/css/main.css' ) 
    );
}
add_action( 'wp_enqueue_scripts', 'qantis_enqueue_assets' );

add_action('after_setup_theme', 'qantis_theme_setup');
add_action('wp_enqueue_scripts', 'qantis_enqueue_assets');
