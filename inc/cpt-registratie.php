<?php

function qantis_register_custom_post_types() {

    $opdracht_labels = array(
        'name'               => 'Opdrachten',
        'singular_name'      => 'Opdracht',
        'menu_name'          => 'Opdrachten',
        'add_new'            => 'Nieuwe Opdracht',
        'add_new_item'       => 'Voeg Nieuwe Opdracht Toe',
        'edit_item'          => 'Bewerk Opdracht',
        'all_items'          => 'Alle Opdrachten',
        'search_items'       => 'Zoek Opdrachten',
    );

    $opdracht_args = array(
        'labels'             => $opdracht_labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'opdrachten', 'with_front' => false),
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('opdrachten', $opdracht_args);

    $tax_labels = array(
        'name'              => 'Proposities',
        'singular_name'     => 'Propositie',
        'search_items'      => 'Zoek Proposities',
        'all_items'         => 'Alle Proposities',
        'edit_item'         => 'Bewerk Propositie',
        'update_item'       => 'Update Propositie',
        'add_new_item'      => 'Voeg Nieuwe Propositie Toe',
        'new_item_name'     => 'Nieuwe Propositie Naam',
        'menu_name'         => 'Proposities',
    );

    register_taxonomy('propositie', array('opdrachten'), array(
        'hierarchical'      => true,
        'labels'            => $tax_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'propositie'),
        'show_in_rest'      => true,
    ));

    $vacature_labels = array(
        'name'               => 'Vacatures',
        'singular_name'      => 'Vacature',
        'menu_name'          => 'Vacatures',
        'add_new'            => 'Nieuwe Vacature',
        'add_new_item'       => 'Voeg Nieuwe Vacature Toe',
        'edit_item'          => 'Bewerk Vacature',
        'all_items'          => 'Alle Vacatures',
        'search_items'       => 'Zoek Vacatures',
    );

    $vacature_args = array(
        'labels'             => $vacature_labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'vacatures', 'with_front' => false),
        'menu_icon'          => 'dashicons-id',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('vacatures', $vacature_args);
}
add_action('init', 'qantis_register_custom_post_types');