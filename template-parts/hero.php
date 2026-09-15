<?php
$page_id = get_queried_object_id();

$hero_tag         = get_field('hero_tag', $page_id) ?: 'PROPOSITIE 01';
$hero_titel       = get_field('hero_titel', $page_id) ?: 'IT Staffing';
$hero_tekst       = get_field('hero_tekst', $page_id) ?: 'De juiste IT-professional op de juiste plek. Wij leveren gekwalificeerd IT-talent voor tijdelijke en vaste posities in Noord-Holland en heel Nederland.';
$hero_btn_1_tekst = get_field('hero_button_1_tekst', $page_id) ?: 'Neem contact op';
$hero_btn_1_link  = get_field('hero_button_1_link', $page_id) ?: '#contact';
$hero_btn_2_tekst = get_field('hero_button_2_tekst', $page_id) ?: 'Onze diensten';
$hero_btn_2_link  = get_field('hero_button_2_link', $page_id) ?: '#diensten';

$hero_afbeelding  = get_field('hero_afbeelding', $page_id);
$hero_bg_url      = '';

if ( is_array($hero_afbeelding) && ! empty($hero_afbeelding['url']) ) {
    $hero_bg_url = $hero_afbeelding['url'];
} elseif ( is_string($hero_afbeelding) && ! empty($hero_afbeelding) ) {
    $hero_bg_url = $hero_afbeelding;
} elseif ( is_numeric($hero_afbeelding) ) {
    $hero_bg_url = wp_get_attachment_image_url($hero_afbeelding, 'full');
}
?>

<section class="hero-section"<?php if ( $hero_bg_url ) : ?> style="--hero-bg: url('<?php echo esc_url( $hero_bg_url ); ?>');"<?php endif; ?>>
    <div class="container hero-container">
        <div class="hero-content">
            <?php if ( $hero_tag ) : ?>
                <span class="hero-tag"><?php echo esc_html($hero_tag); ?></span>
            <?php endif; ?>

            <?php if ( $hero_titel ) : ?>
                <h1 class="hero-title"><?php echo esc_html($hero_titel); ?></h1>
            <?php endif; ?>

            <?php if ( $hero_tekst ) : ?>
                <p class="hero-text"><?php echo nl2br(esc_html($hero_tekst)); ?></p>
            <?php endif; ?>

            <div class="hero-buttons">
                <?php if ( $hero_btn_1_tekst && $hero_btn_1_link ) : ?>
                    <a href="<?php echo esc_url($hero_btn_1_link); ?>" class="btn btn-primary">
                        <?php echo esc_html($hero_btn_1_tekst); ?>
                    </a>
                <?php endif; ?>

                <?php if ( $hero_btn_2_tekst && $hero_btn_2_link ) : ?>
                    <a href="<?php echo esc_url($hero_btn_2_link); ?>" class="btn btn-secondary">
                        <?php echo esc_html($hero_btn_2_tekst); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>