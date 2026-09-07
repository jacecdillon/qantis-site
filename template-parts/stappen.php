<?php
$stappen_tag   = get_field('stappen_tag') ?: 'ONZE AANPAK';
$stappen_titel = get_field('stappen_titel') ?: 'Snel de juiste match';
$stappen_sub   = get_field('stappen_subtitel') ?: 'Open, eerlijk en transparant — van eerste gesprek tot succesvolle plaatsing.';
$stappen_foto  = get_field('stappen_afbeelding');
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

        <div class="stappen-image-wrapper">
            <?php if ( ! empty($stappen_foto['url']) ) : ?>
                <img src="<?php echo esc_url($stappen_foto['url']); ?>" alt="<?php echo esc_attr($stappen_foto['alt']); ?>" class="stappen-img">
            <?php else : ?>
                <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=1000&q=80" alt="High five team" class="stappen-img">
            <?php endif; ?>
        </div>
    </div>
</section>