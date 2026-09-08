<?php
function qantis_styles()
{
    wp_enqueue_style(
        'qantis-style',
        get_stylesheet_uri()
    );
}

add_action('wp_enqueue_scripts', 'qantis_styles');

require_once get_template_directory() . '/assets/class-qantis-walker.php';
function qantis_menus()
{
    register_nav_menus(
        array(
            'main-menu' => 'Hoofdmenu'
        )
    );
}
add_action('after_setup_theme', 'qantis_menus');