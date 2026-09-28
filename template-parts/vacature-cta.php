<?php
$aantal     = qantis_open_vacatures_count();
$titel      = get_field('vacature_cta_titel') ?: 'Werken bij Qantis';
$tekst      = get_field('vacature_cta_tekst') ?: 'Op zoek naar je volgende uitdaging in IT of OT? Bekijk onze openstaande vacatures.';
$knop_tekst = get_field('vacature_cta_knop_tekst') ?: 'Bekijk vacatures';
$knop_url   = get_field('vacature_cta_knop_url') ?: get_post_type_archive_link('vacatures');

if ( $aantal > 0 ) {
    $badge = sprintf( _n( '%d open vacature', '%d open vacatures', $aantal, 'qantis' ), $aantal );
} else {
    $badge = 'Open sollicitatie welkom';
}
?>

<section class="vacature-cta-section">
    <div class="vacature-cta-container">
        <div class="vacature-cta-text">
            <span class="vacature-cta-badge"><?php echo esc_html( $badge ); ?></span>
            <h2 class="vacature-cta-title"><?php echo esc_html( $titel ); ?></h2>
            <p class="vacature-cta-description"><?php echo esc_html( $tekst ); ?></p>
        </div>
        <a href="<?php echo esc_url( $knop_url ); ?>" class="vacature-cta-btn">
            <?php echo esc_html( $knop_tekst ); ?> &rarr;
        </a>
    </div>
</section>
