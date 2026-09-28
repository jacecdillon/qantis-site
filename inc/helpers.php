<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function qantis_option( $name, $default = '' ) {
    if ( ! function_exists( 'get_field' ) ) {
        return $default;
    }
    $value = get_field( $name, 'option' );
    return ( null !== $value && false !== $value && '' !== $value ) ? $value : $default;
}

function qantis_phone_display() {
    return qantis_option( 'telefoonnummer', '088 – 35 20 600' );
}

function qantis_phone_href() {
    return 'tel:' . preg_replace( '/[^0-9+]/', '', qantis_phone_display() );
}

function qantis_term_accent( $term ) {
    if ( ! $term || is_wp_error( $term ) ) {
        return 'blue';
    }
    $raw = function_exists( 'get_field' ) ? get_field( 'accent_kleur', $term ) : '';
    $key = strtolower( trim( (string) $raw ) );
    if ( in_array( $key, array( 'blue', 'orange', 'green' ), true ) ) {
        return $key;
    }
    if ( false !== strpos( $term->slug, 'qaas' ) ) {
        return 'green';
    }
    if ( 0 === strpos( $term->slug, 'ot' ) ) {
        return 'orange';
    }
    return 'blue';
}

function qantis_propositie_term( $post_id = null ) {
    $terms = get_the_terms( $post_id ?: get_the_ID(), 'propositie' );
    return ( $terms && ! is_wp_error( $terms ) ) ? reset( $terms ) : null;
}

function qantis_propositie_accent( $post_id = null ) {
    return qantis_term_accent( qantis_propositie_term( $post_id ) );
}

function qantis_get_opdrachten( $args = array() ) {
    return new WP_Query( wp_parse_args( $args, array(
        'post_type'           => 'opdrachten',
        'post_status'         => 'publish',
        'posts_per_page'      => 3,
        'orderby'             => 'date',
        'order'               => 'DESC',
        'ignore_sticky_posts' => true,
    ) ) );
}

function qantis_open_vacatures_count() {
    $counts = wp_count_posts( 'vacatures' );
    return isset( $counts->publish ) ? (int) $counts->publish : 0;
}
