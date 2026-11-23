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

    $onderdelen = array(
        'usp'     => 'template-parts/usp',
        'extra'   => 'template-parts/extra-sectie',
        'split'   => 'template-parts/split-sectie',
        'stappen' => 'template-parts/stappen',
    );
    $volgorde = get_field( 'sectie_volgorde', get_queried_object_id() ) ?: 'usp,extra,split,stappen';

    foreach ( explode( ',', $volgorde ) as $sleutel ) {
        if ( isset( $onderdelen[ $sleutel ] ) ) {
            get_template_part( $onderdelen[ $sleutel ] );
        }
    }

    get_template_part( 'template-parts/cta-banner' );
    ?>

</main>

<?php
get_footer();
