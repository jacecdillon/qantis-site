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
    get_template_part( 'template-parts/diensten-grid' );
    get_template_part( 'template-parts/dienstmodel' );

    if ( is_page( 'ot-civiel-industrie' ) ) :
        get_template_part( 'template-parts/extra-sectie' );
        get_template_part( 'template-parts/usp' );
    elseif ( is_page( 'it-staffing' ) ) :
        get_template_part( 'template-parts/extra-sectie' );
        get_template_part( 'template-parts/usp' );
    else :
        get_template_part( 'template-parts/usp' );
        get_template_part( 'template-parts/extra-sectie' );
    endif;

    get_template_part( 'template-parts/split-sectie' );
    get_template_part( 'template-parts/stappen' );
    get_template_part('template-parts/cta-banner');
    ?>

</main>

<?php 
get_footer();