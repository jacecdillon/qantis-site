<?php
$tagline      = get_field('over_qantis_tagline') ?: 'OVER QANTIS';
$titel        = get_field('over_qantis_titel') ?: 'Open, eerlijk en transparant';
$beschrijving = get_field('over_qantis_beschrijving');
$knop_tekst   = get_field('over_qantis_knop_tekst') ?: 'Meer over ons';
$knop_url     = get_field('over_qantis_knop_url') ?: site_url('/over-ons/');
$afbeelding   = get_field('over_qantis_afbeelding');
?>

<section class="over-qantis-section">
    <div class="over-qantis-container">
        
        <div class="over-qantis-content">
            <span class="section-subtitle"><?php echo esc_html($tagline); ?></span>
            <h2 class="section-title"><?php echo esc_html($titel); ?></h2>
            <div class="section-description">
                <?php echo wp_kses_post($beschrijving); ?>
            </div>
            <a href="<?php echo esc_url($knop_url); ?>" class="btn btn-outline">
                <?php echo esc_html($knop_tekst); ?>
            </a>
        </div>

        <div class="over-qantis-media">
            <?php if ( !empty($afbeelding) ) : ?>
                <img src="<?php echo esc_url($afbeelding['url']); ?>" alt="<?php echo esc_attr($afbeelding['alt']); ?>">
            <?php endif; ?>
        </div>

    </div>
</section>