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

require_once get_template_directory() . '/inc/cpt-registratie.php';
require_once get_template_directory() . '/inc/contact-handler.php';

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

    // Specifieke CSS-bestanden inladen op basis van de geopende pagina
    if ( is_front_page() ) {
        $front_styles = array('thuisbasis', 'over-qantis', 'opdrachten', 'cta-banner');
        foreach ( $front_styles as $style ) {
            $path = '/assets/css/' . $style . '.css';
            if ( file_exists( get_template_directory() . $path ) ) {
                wp_enqueue_style(
                    'qantis-' . $style,
                    get_template_directory_uri() . $path,
                    array('qantis-main-style'),
                    filemtime(get_template_directory() . $path)
                );
            }
        }
    }

    if ( is_page_template('page-propositie.php') ) {
        $path = '/assets/css/propositie.css';
        if ( file_exists( get_template_directory() . $path ) ) {
            wp_enqueue_style(
                'qantis-propositie-style',
                get_template_directory_uri() . $path,
                array('qantis-main-style'),
                filemtime(get_template_directory() . $path)
            );
        }
    }

    if ( file_exists( get_template_directory() . '/assets/js/main.js' ) ) {
        wp_enqueue_script(
            'qantis-js',
            get_template_directory_uri() . '/assets/js/main.js',
            array('jquery'),
            filemtime(get_template_directory() . '/assets/js/main.js'),
            true
        );

        wp_localize_script('qantis-js', 'qantis_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('qantis_contact_nonce')
        ));
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