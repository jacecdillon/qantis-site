<?php
$page_id = get_queried_object_id();

if ( is_page_template( 'page-propositie.php' ) ) {
    $cta_titel        = get_field( 'cta_titel', $page_id );
    $cta_beschrijving = get_field( 'cta_tekst', $page_id );
    $cta_knop_tekst   = get_field( 'cta_button_tekst', $page_id );
    $cta_knop_url     = get_field( 'cta_button_link', $page_id );
} else {
    $cta_titel        = get_field( 'cta_titel', $page_id );
    $cta_beschrijving = get_field( 'cta_beschrijving', $page_id );
    $cta_knop_tekst   = get_field( 'cta_knop_tekst', $page_id );
    $cta_knop_url     = get_field( 'cta_knop_url', $page_id );
}

$cta_titel        = $cta_titel        ?: 'Op zoek naar IT-talent?';
$cta_beschrijving = $cta_beschrijving ?: 'Vertel ons wat je nodig hebt. We reageren binnen één werkdag.';
$cta_knop_tekst   = $cta_knop_tekst   ?: 'Plan een kennismakingsgesprek';
$cta_knop_url     = $cta_knop_url     ?: home_url( '/#contact' );
?>

<section class="cta-banner-section">
    <div class="cta-banner-container">
        <h2 class="cta-banner-title"><?php echo esc_html( $cta_titel ); ?></h2>

        <?php if ( $cta_beschrijving ) : ?>
            <p class="cta-banner-tekst"><?php echo esc_html( $cta_beschrijving ); ?></p>
        <?php endif; ?>

        <div class="cta-banner-btn">
            <a href="<?php echo esc_url( $cta_knop_url ); ?>" class="btn-cta">
                <?php echo esc_html( $cta_knop_tekst ); ?>
            </a>
        </div>
    </div>
</section>
