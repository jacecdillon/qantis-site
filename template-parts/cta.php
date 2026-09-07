<?php
$cta_titel = get_field('cta_titel') ?: 'Op zoek naar IT-talent?';
$cta_tekst = get_field('cta_tekst') ?: 'Vertel ons wat je nodig hebt. We reageren binnen één werkdag.';
$cta_btn   = get_field('cta_button_tekst') ?: 'Plan een kennismakingsgesprek';
$cta_link  = get_field('cta_button_link') ?: '#contact';
?>

<section class="cta-banner">
    <div class="container cta-container">
        <h2 class="cta-title"><?php echo esc_html($cta_titel); ?></h2>
        <p class="cta-text"><?php echo esc_html($cta_tekst); ?></p>
        <a href="<?php echo esc_url($cta_link); ?>" class="btn btn-cta">
            <?php echo esc_html($cta_btn); ?>
        </a>
    </div>
</section>