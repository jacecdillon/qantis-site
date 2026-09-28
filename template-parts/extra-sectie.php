<?php
$extra_tag      = get_field('extra_tag');
$extra_titel    = get_field('extra_titel');
$extra_subtitel = get_field('extra_subtitel');
$has_items      = have_rows('extra_grid_items');

$kaart_titel  = get_field('extra_kaart_titel');
$kaart_tekst  = get_field('extra_kaart_tekst');
$kaart_knop   = get_field('extra_kaart_button_tekst');
$kaart_link   = get_field('extra_kaart_button_link');

$type = trim( explode( ':', (string) get_field('extra_sectie_type') )[0] );

if ( 'geen' === $type ) {
    return;
}
if ( '' === $type ) {
    $type = $has_items ? 'grid' : ( $kaart_titel ? 'card' : '' );
}
if ( '' === $type ) {
    return;
}
?>

<section class="extra-sectie extra-sectie--<?php echo esc_attr( $type ); ?>">
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

        <?php if ( 'card' === $type ) : ?>

            <?php if ( $kaart_titel || $kaart_tekst ) : ?>
                <div class="extra-kaart">
                    <?php if ( $kaart_titel ) : ?>
                        <h3 class="extra-kaart-titel"><?php echo esc_html($kaart_titel); ?></h3>
                    <?php endif; ?>
                    <?php if ( $kaart_tekst ) : ?>
                        <p class="extra-kaart-tekst"><?php echo nl2br( esc_html($kaart_tekst) ); ?></p>
                    <?php endif; ?>
                    <?php if ( $kaart_knop && $kaart_link ) : ?>
                        <a href="<?php echo esc_url($kaart_link); ?>" class="btn btn-primary extra-kaart-knop">
                            <?php echo esc_html($kaart_knop); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php elseif ( $has_items ) : ?>

            <div class="extra-grid-wrapper">
                <?php while ( have_rows('extra_grid_items') ) : the_row();
                    $item_titel   = get_sub_field('titel');
                    $item_tekst   = get_sub_field('beschrijving');
                    $rand_kleur   = get_sub_field('extra_kaart_rand_kleur');
                    $border_class = ( $rand_kleur && $rand_kleur !== 'geen' ) ? ' border-' . strtolower($rand_kleur) : '';
                ?>
                    <div class="extra-grid-card<?php echo esc_attr($border_class); ?>">
                        <div class="extra-card-content">
                            <?php if ( $item_titel ) : ?>
                                <h3 class="extra-card-titel"><?php echo esc_html($item_titel); ?></h3>
                            <?php endif; ?>
                            <?php if ( $item_tekst ) : ?>
                                <p class="extra-card-tekst"><?php echo esc_html($item_tekst); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php endif; ?>
    </div>
</section>
