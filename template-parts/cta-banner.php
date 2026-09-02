<?php

$cta_titel = get_field('cta_titel') ?: 'Op zoek naar een nieuwe uitdaging';
$cta_beschrijving = get_field('cta_beschrijving') ?: 'Bekijk onze openstaande vacatures in Alkmaar en omgeving';
$cta_knop_tekst = get_field('cta_knop_tekst') ?: 'Bekijk onze vacatures';
$cta_knop_url = get_field('cta_knop_url') ?: site_url('/vacatures/');

?>

<section class="cta-banner-section">
    <div class="cta-banner-container">
        <div class="cta-banner-header">
            <h2 class="cta-banner-title"><?php echo esc_html($cta_titel); ?></h2>
        </div>

        <div class="cta-banner-tekst">
            <p><?php echo esc_html($cta_beschrijving); ?></p>
        </div>

        <div class="cta-banner-btn">
            <a href="<?php echo esc_url($cta_knop_url); ?>" class="vacatures-link">
                <?php echo esc_html($cta_knop_tekst); ?>
            </a>
        </div>
    </div>
</section>