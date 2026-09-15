<?php
$stappen_tag         = get_field('stappen_tag');
$stappen_titel       = get_field('stappen_titel');
$stappen_sub         = get_field('stappen_subtitel');
$stappen_footer_tekst = get_field('stappen_footer_tekst');
$stappen_foto        = get_field('stappen_afbeelding');
?>

<section class="stappen-section">
    <div class="container stappen-container">
        <div class="stappen-content">
            <?php if ( $stappen_tag ) : ?>
                <span class="section-tag"><?php echo esc_html($stappen_tag); ?></span>
            <?php endif; ?>
            
            <?php if ( $stappen_titel ) : ?>
                <h2 class="section-title"><?php echo esc_html($stappen_titel); ?></h2>
            <?php endif; ?>

            <?php if ( $stappen_sub ) : ?>
                <p class="section-subtext"><?php echo esc_html($stappen_sub); ?></p>
            <?php endif; ?>

            <?php if ( $stappen_footer_tekst ) : ?>
                <p class="stappen-footer-text"><?php echo esc_html($stappen_footer_tekst); ?></p>
            <?php endif; ?>

            <?php if ( have_rows('stappen_lijst') ) : ?>
                <div class="stappen-lijst">
                    <?php $i = 1; while ( have_rows('stappen_lijst') ) : the_row(); ?>
                        <div class="stap-item">
                            <div class="stap-nummer"><?php echo $i; ?></div>
                            <div class="stap-info">
                                <h4><?php echo esc_html(get_sub_field('titel')); ?></h4>
                                <p><?php echo esc_html(get_sub_field('beschrijving')); ?></p>
                            </div>
                        </div>
                    <?php $i++; endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

        <?php if ( ! empty($stappen_foto['url']) ) : ?>
            <div class="stappen-image-wrapper">
                <img src="<?php echo esc_url($stappen_foto['url']); ?>" alt="<?php echo esc_attr($stappen_foto['alt']); ?>" class="stappen-img">
            </div>
        <?php endif; ?>
    </div>
</section>