<?php
$extra_tag      = get_field('extra_tag');
$extra_titel    = get_field('extra_titel');
$extra_subtitel = get_field('extra_subtitel');
$extra_items    = have_rows('extra_grid_items');

if ( $extra_tag || $extra_titel || $extra_subtitel || $extra_items ) :
?>

<section class="extra-sectie">
    <div class="container">
        <?php if ( $extra_tag || $extra_titel || $extra_subtitel ) : ?>
            <div class="section-header">
                <?php if ( $extra_tag ) : ?>
                    <span class="section-tag"><?php echo esc_html($extra_tag); ?></span>
                <?php endif; ?>
                
                <?php if ( $extra_titel ) : ?>
                    <h2 class="section-title"><?php echo esc_html($extra_titel); ?></h2>
                <?php endif; ?>

                <?php if ( $extra_subtitel ) : ?>
                    <p class="section-subtext"><?php echo esc_html($extra_subtitel); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ( $extra_items ) : ?>
            <div class="extra-grid-wrapper">
                <?php while ( have_rows('extra_grid_items') ) : the_row(); 
                    $kaart_titel  = get_sub_field('titel'); 
                    $kaart_tekst  = get_sub_field('beschrijving'); 
                    $rand_kleur   = get_sub_field('extra_kaart_rand_kleur'); // Aangepast naar sub_field (of laat get_field als hij erbuiten staat)
                    $border_class = ( $rand_kleur && $rand_kleur !== 'geen' ) ? ' border-' . strtolower($rand_kleur) : '';
                ?>
                    <div class="extra-grid-card<?php echo esc_attr($border_class); ?>">
                        <div class="extra-card-content">
                            <?php if ( $kaart_titel ) : ?>
                                <h3 class="extra-card-titel"><?php echo esc_html($kaart_titel); ?></h3>
                            <?php endif; ?>
                            <?php if ( $kaart_tekst ) : ?>
                                <p class="extra-card-tekst"><?php echo esc_html($kaart_tekst); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php endif; ?>