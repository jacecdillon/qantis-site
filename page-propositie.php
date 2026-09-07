<?php

/**
 * Template Name: Propositie Pagina
 */


get_header();

$accent_kleur = get_field('accent_kleur');

if ( empty( $accent_kleur ) ) {
    $accent_kleur = '#0056b3'; 
}
?>

<main class="propositie-page" style="--accent: <?php echo esc_attr( $accent_kleur ); ?>;">

    <?php
    get_template_part( 'template-parts/propositie-nav' );
    get_template_part( 'template-parts/hero' );
    get_template_part( 'template-parts/diensten-grid' );
    get_template_part( 'template-parts/stappen' );
    get_template_part( 'template-parts/extra-sectie' );
    get_template_part( 'template-parts/cta' );
    ?>

</main>

<?php 
get_footer();