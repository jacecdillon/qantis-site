<?php
/**
 * Template Name: Propositie Pagina
 */

get_header('propositie');

$accent_kleur = get_field('accent_kleur') ?: '#1582CA';
?>

<main class="propositie-page" style="--accent: <?php echo esc_attr( $accent_kleur ); ?>;">

    <?php
    get_template_part( 'template-parts/hero' );
    get_template_part( 'template-parts/diensten-grid' ); // Diensten sectie
    get_template_part( 'template-parts/dienstmodel' ); // Dienstmodel sectie
    get_template_part('template-parts/usp');
    get_template_part('template-parts/split-sectie');
    get_template_part( 'template-parts/stappen' ); // Stappen sectie
    get_template_part( 'template-parts/extra-sectie' ); // Technologie & vakgebieden
    get_template_part('template-parts/cta-banner'); // Call to action banner
    ?>

</main>

<?php 
get_footer();