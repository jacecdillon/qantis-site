<?php
$hero_tag         = get_field('hero_tag') ?: 'PROPOSITIE 01';
$hero_titel       = get_field('hero_titel') ?: 'IT Staffing';
$hero_tekst       = get_field('hero_tekst') ?: 'De juiste IT-professional op de juiste plek. Wij leveren gekwalificeerd IT-talent voor tijdelijke en vaste posities in Noord-Holland en heel Nederland.';
$hero_btn_1_tekst = get_field('hero_button_1_tekst') ?: 'Neem contact op';
$hero_btn_1_link  = get_field('hero_button_1_link') ?: '#contact';
$hero_btn_2_tekst = get_field('hero_button_2_tekst') ?: 'Onze diensten';
$hero_btn_2_link  = get_field('hero_button_2_link') ?: '#diensten';
$hero_afbeelding  = get_field('hero_afbeelding');
?>

<section class="hero-section">
    <div class="container hero-container">
        <div class="hero-content">
            <?php if ( $hero_tag ) : ?>
                <span class="hero-tag"><?php echo esc_html($hero_tag); ?></span>
            <?php endif; ?>

            <?php if ( $hero_titel ) : ?>
                <h1 class="hero-title"><?php echo esc_html($hero_titel); ?></h1>
            <?php endif; ?>

            <?php if ( $hero_tekst ) : ?>
                <p class="hero-text"><?php echo esc_html($hero_tekst); ?></p>
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

        <div class="hero-image-wrapper">
            <?php if ( ! empty($hero_afbeelding['url']) ) : ?>
                <img src="<?php echo esc_url($hero_afbeelding['url']); ?>" alt="<?php echo esc_attr($hero_afbeelding['alt']); ?>" class="hero-img">
            <?php else : ?>
                <img src="" alt="Hero team" class="hero-img">
            <?php endif; ?>
        </div>
    </div>
</section>