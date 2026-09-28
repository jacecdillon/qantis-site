<?php
$sectie_titel       = get_field('opdrachten_sectie_titel') ?: 'Onze opdrachten';
$bekijk_alles_tekst = get_field('opdrachten_bekijk_alles_tekst') ?: 'Bekijk alle opdrachten';
$bekijk_alles_url   = get_field('opdrachten_bekijk_alles_url') ?: get_post_type_archive_link('opdrachten');

$opdrachten_query = qantis_get_opdrachten( array( 'posts_per_page' => 3 ) );
?>

<section class="opdrachten-section">
    <div class="opdrachten-container">

        <div class="opdrachten-header">
            <h2 class="opdrachten-title"><?php echo esc_html($sectie_titel); ?></h2>
            <a href="<?php echo esc_url($bekijk_alles_url); ?>" class="opdrachten-link">
                <?php echo esc_html($bekijk_alles_tekst); ?> &rsaquo;
            </a>
        </div>

        <div class="opdrachten-grid">
            <?php if ( $opdrachten_query->have_posts() ) : ?>
                <?php while ( $opdrachten_query->have_posts() ) : $opdrachten_query->the_post(); ?>
                    <?php get_template_part( 'template-parts/opdracht-card' ); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="opdrachten-leeg">Er zijn op dit moment geen opdrachten.</p>
            <?php endif; ?>
        </div>

    </div>
</section>
