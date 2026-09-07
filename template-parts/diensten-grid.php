<?php
$sectie_tag   = get_field('diensten_tag') ?: 'WAT WIJ LEVEREN';
$sectie_titel = get_field('diensten_titel') ?: 'IT-expertise voor elke uitdaging';
$sectie_sub   = get_field('diensten_subtitel') ?: 'Van cloud-infrastructuur tot functioneel beheer — wij plaatsen de professional die jouw organisatie verder helpt.';
?>

<section class="diensten-grid-section">
    <div class="container">
        <div class="section-header">
            <?php if ( $sectie_tag ) : ?>
                <span class="section-tag"><?php echo esc_html($sectie_tag); ?></span>
            <?php endif; ?>
            <?php if ( $sectie_titel ) : ?>
                <h2 class="section-title"><?php echo esc_html($sectie_titel); ?></h2>
            <?php endif; ?>
            <?php if ( $sectie_sub ) : ?>
                <p class="section-subtext"><?php echo esc_html($sectie_sub); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( have_rows('diensten_lijst') ) : ?>
            <div class="grid-wrapper">
                <?php while ( have_rows('diensten_lijst') ) : the_row(); 
                    $icoon        = get_sub_field('icoon');
                    $dienst_titel = get_sub_field('titel');
                    $tekst        = get_sub_field('beschrijving');
                ?>
                    <div class="dienst-kaart">
                        <?php if ( $icoon ) : ?>
                            <img src="<?php echo esc_url($icoon['url']); ?>" alt="<?php echo esc_attr($icoon['alt']); ?>" class="dienst-icoon">
                        <?php else : ?>
                            <div class="dienst-icoon-placeholder"></div>
                        <?php endif; ?>

                        <?php if ( $dienst_titel ) : ?>
                            <h3 class="dienst-titel"><?php echo esc_html($dienst_titel); ?></h3>
                        <?php endif; ?>

                        <?php if ( $tekst ) : ?>
                            <p class="dienst-tekst"><?php echo esc_html($tekst); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>