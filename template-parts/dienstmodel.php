<?php
$subtitle   = get_sub_field('dienstmodel_subtitle') ?: get_field('dienstmodel_subtitle');
$title      = get_sub_field('dienstmodel_title') ?: get_field('dienstmodel_title');
$intro      = get_sub_field('dienstmodel_intro') ?: get_field('dienstmodel_intro');

if ( ! $title ) return;
?>

<section class="dienstmodel-section">
    <div class="container">
        <span class="hero-subtitle"><?php echo esc_html( $subtitle ); ?></span>
        <h2><?php echo esc_html( $title ); ?></h2>
        <p><?php echo esc_html( $intro ); ?></p>

        <?php if( have_rows('dienstmodel_kaarten') ): ?>
            <div class="dienstmodel-grid">
                <?php while ( have_rows('dienstmodel_kaarten') ) : the_row(); ?>
                    <div class="dienstmodel-card">
                        <div class="dienstmodel-card-content">
                            <span class="badge"><?php echo esc_html( get_sub_field('badge_tekst') ); ?></span>
                            <h3><?php echo esc_html( get_sub_field('titel') ); ?></h3>
                            <p><?php echo esc_html( get_sub_field('beschrijving') ); ?></p>
                        </div>
                        <div class="frequency">
                            <?php echo esc_html( get_sub_field('frequentie') ); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if ( get_field('quick_scan') ): ?>
            <div class="quick-scan-box">
                <div class="quick-scan-text">
                    <h3><?php echo esc_html( get_field('quick_scan_titel') ); ?></h3>
                    <p><?php echo esc_html( get_field('quick_scan_tekst') ); ?></p>
                </div>
                <div class="quick-scan-action">
                    <a href="<?php echo esc_url( get_field('quick_scan_link') ); ?>" class="btn btn-white">Plan een Quick Scan</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>