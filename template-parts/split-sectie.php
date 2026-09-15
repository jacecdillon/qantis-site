<?php
$toon_sectie  = get_field('toon_split_sectie');
$afbeelding   = get_field('split_afbeelding');
$tag          = get_field('split_tag');
$titel        = get_field('split_titel');
$subtitel     = get_field('split_subtitel');
?>

<?php if ( $toon_sectie ) : ?>
<section class="split-sectie">
    <div class="container">
        <div class="split-wrapper">
            
            <div class="split-image-col">
                <?php if ( !empty($afbeelding) ) : ?>
                    <?php 
                    $img_url = is_array($afbeelding) ? $afbeelding['url'] : wp_get_attachment_image_url($afbeelding, 'full');
                    $img_alt = is_array($afbeelding) ? $afbeelding['alt'] : '';
                    ?>
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="content-img">
                <?php endif; ?>
            </div>

            <div class="split-content-col">
                <div class="section-header">
                    <?php if ( $tag ) : ?>
                        <span class="section-tag"><?php echo esc_html($tag); ?></span>
                    <?php endif; ?>
                    
                    <?php if ( $titel ) : ?>
                        <h2 class="section-title"><?php echo esc_html($titel); ?></h2>
                    <?php endif; ?>

                    <?php if ( $subtitel ) : ?>
                        <p class="section-subtext"><?php echo esc_html($subtitel); ?></p>
                    <?php endif; ?>
                </div>

                <?php if ( have_rows('split_items') ) : ?>
                    <div class="split-grid-wrapper">
                        <?php while ( have_rows('split_items') ) : the_row(); 
                            $kaart_titel  = get_sub_field('titel'); 
                            $kaart_tekst  = get_sub_field('beschrijving'); 
                        ?>
                            <div class="split-grid-item">
                                <span class="bullet-dot">•</span>
                                <div class="item-text">
                                    <?php if ( $kaart_titel ) : ?>
                                        <h4 class="item-titel"><?php echo esc_html($kaart_titel); ?></h4>
                                    <?php endif; ?>
                                    <?php if ( $kaart_tekst ) : ?>
                                        <p class="item-beschrijving"><?php echo esc_html($kaart_tekst); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
<?php endif; ?>