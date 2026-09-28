<?php
/**
 * Template Name: Propositie Pagina
 */

get_header('propositie');

?>

<main class="propositie-main">

    <?php
    get_template_part( 'template-parts/hero' );
    get_template_part( 'template-parts/diensten-grid' );
    get_template_part( 'template-parts/dienstmodel' );

    if ( is_page( 'ot-civiel-industrie' ) ) :
        get_template_part( 'template-parts/extra-sectie' );
        get_template_part( 'template-parts/usp' );
        get_template_part( 'template-parts/split-sectie' );
        get_template_part( 'template-parts/stappen' );
    elseif ( is_page( 'it-staffing' ) ) :
        get_template_part( 'template-parts/stappen' );
        get_template_part( 'template-parts/extra-sectie' );
        get_template_part( 'template-parts/split-sectie' );
    else :
        get_template_part( 'template-parts/usp' );
        get_template_part( 'template-parts/extra-sectie' );
        get_template_part( 'template-parts/split-sectie' );
        get_template_part( 'template-parts/stappen' );
    endif;

    get_template_part( 'template-parts/cta-banner' );
    ?>

</main>

<?php
get_footer();
