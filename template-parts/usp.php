<?php
$tag   = get_field('usp_tag');
$title = get_field('usp_titel');
$intro = get_field('usp_intro');

if ( ! $title ) return;
?>

<section class="usp-grid-section">
    <div class="container">
        <?php if ( $tag ): ?>
            <span class="hero-subtitle"><?php echo esc_html( $tag ); ?></span>
        <?php endif; ?>
        
        <h2><?php echo esc_html( $title ); ?></h2>
        
        <?php if ( $intro ): ?>
            <p><?php echo esc_html( $intro ); ?></p>
        <?php endif; ?>

        <?php if( have_rows('usp_kaarten') ): ?>
            <div class="usp-grid">
                <?php while ( have_rows('usp_kaarten') ) : the_row(); ?>
                    <div class="usp-card">
                        <span class="usp-number"><?php echo esc_html( get_sub_field('nummer') ); ?></span>
                        <h3><?php echo esc_html( get_sub_field('titel') ); ?></h3>
                        <p><?php echo esc_html( get_sub_field('beschrijving') ); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>