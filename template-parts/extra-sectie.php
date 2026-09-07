<?php
$extra_tag   = get_field('extra_tag') ?: 'TECHNOLOGIE & VAKGEBIEDEN';
$extra_titel = get_field('extra_titel') ?: 'Onze expertises';
?>

<section class="extra-sectie">
    <div class="container">
        <div class="section-header">
            <?php if ( $extra_tag ) : ?>
                <span class="section-tag"><?php echo esc_html($extra_tag); ?></span>
            <?php endif; ?>
            <?php if ( $extra_titel ) : ?>
                <h2 class="section-title"><?php echo esc_html($extra_titel); ?></h2>
            <?php endif; ?>
        </div>

        <?php if ( have_rows('extra_grid_items') ) : ?>
            <div class="extra-grid-wrapper">
                <?php while ( have_rows('extra_grid_items') ) : the_row(); ?>
                    <div class="extra-grid-card">
                        <span class="bullet-dot">•</span>
                        <span class="extra-card-titel"><?php echo esc_html(get_sub_field('titel')); ?></span>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>