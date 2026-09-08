<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main_menu',
                'menu_class' => 'main_menu',
                /*'walker' => new Qantis_Walker()*/
            )
        );
        ?>
    </header>