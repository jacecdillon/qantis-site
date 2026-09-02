<?php

function qantis_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary'     => __('Hoofdmenu', 'qantis'),
        'footer_menu' => __('Footer Menu', 'qantis'),
    ));
}
add_action('after_setup_theme', 'qantis_theme_setup');

function qantis_enqueue_assets() {
    wp_enqueue_style( 'qantis-style', get_stylesheet_uri(), array(), '1.0.0' );

    if ( file_exists( get_template_directory() . '/assets/css/main.css' ) ) {
        wp_enqueue_style(
            'qantis-main-style',
            get_template_directory_uri() . '/assets/css/main.css',
            array('qantis-style'),
            filemtime(get_template_directory() . '/assets/css/main.css')
        );
    }

    if ( file_exists( get_template_directory() . '/assets/css/thuisbasis.css' ) ) {
        wp_enqueue_style(
            'qantis-thuisbasis',
            get_template_directory_uri() . '/assets/css/thuisbasis.css',
            array('qantis-style'),
            filemtime(get_template_directory() . '/assets/css/thuisbasis.css')
        );
    }

    if ( file_exists( get_template_directory() . '/assets/css/over-qantis.css' ) ) {
        wp_enqueue_style(
            'qantis-over-qantis',
            get_template_directory_uri() . '/assets/css/over-qantis.css',
            array('qantis-style'),
            filemtime(get_template_directory() . '/assets/css/over-qantis.css')
        );
    }

    if ( file_exists( get_template_directory() . '/assets/css/opdrachten.css' ) ) {
        wp_enqueue_style(
            'qantis-opdrachten',
            get_template_directory_uri() . '/assets/css/opdrachten.css',
            array('qantis-style'),
            filemtime(get_template_directory() . '/assets/css/opdrachten.css')
        );
    }

    if ( file_exists( get_template_directory() . '/assets/css/cta-banner.css' ) ) {
        wp_enqueue_style(
            'qantis-cta-banner',
            get_template_directory_uri() . '/assets/css/cta-banner.css',
            array('qantis-style'),
            filemtime(get_template_directory() . '/assets/css/cta-banner.css')
        );
    }
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
