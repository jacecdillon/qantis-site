<?php
$sectie_titel       = get_field('opdrachten_sectie_titel') ?: 'Onze opdrachten';
$bekijk_alles_tekst = get_field('opdrachten_bekijk_alles_tekst') ?: 'Bekijk alle opdrachten';
$bekijk_alles_url   = get_field('opdrachten_bekijk_alles_url') ?: get_post_type_archive_link('opdrachten');

$opdrachten_query = new WP_Query( array(
    'post_type'           => 'opdrachten',
    'post_status'         => 'publish',
    'posts_per_page'      => 3,
    'orderby'             => 'date',
    'order'               => 'DESC',
    'ignore_sticky_posts' => true,
) );
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

                <?php while ( $opdrachten_query->have_posts() ) : $opdrachten_query->the_post();
                    $badges = array_filter( array(
                        get_field('locatie'),
                        get_field('uren_per_week'),
                    ) );
                ?>
                    <a href="<?php the_permalink(); ?>" class="opdracht-card">
                        <div class="opdracht-media">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'large' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="opdracht-img">
                            <?php endif; ?>

                            <?php if ( $badges ) : ?>
                                <div class="opdracht-badges">
                                    <?php foreach ( $badges as $badge ) : ?>
                                        <span class="badge"><?php echo esc_html( $badge ); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="opdracht-content">
                            <h3 class="opdracht-title"><?php the_title(); ?></h3>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>

            <?php elseif ( have_rows('opdrachten_lijst') ) : ?>

                <?php while ( have_rows('opdrachten_lijst') ) : the_row();
                    $titel      = get_sub_field('titel');
                    $niveau     = get_sub_field('niveau') ?: 'Medior/Senior';
                    $uren       = get_sub_field('uren') ?: '36 uur';
                    $afbeelding = get_sub_field('afbeelding');
                    $link       = get_sub_field('link') ?: '#';
                ?>
                    <a href="<?php echo esc_url($link); ?>" class="opdracht-card">
                        <div class="opdracht-media">
                            <?php if ( !empty($afbeelding) ) : ?>
                                <img src="<?php echo esc_url($afbeelding['url']); ?>" alt="<?php echo esc_attr($titel); ?>" class="opdracht-img">
                            <?php endif; ?>

                            <div class="opdracht-badges">
                                <span class="badge"><?php echo esc_html($niveau); ?></span>
                                <span class="badge"><?php echo esc_html($uren); ?></span>
                            </div>
                        </div>
                        <div class="opdracht-content">
                            <h3 class="opdracht-title"><?php echo esc_html($titel); ?></h3>
                        </div>
                    </a>
                <?php endwhile; ?>

            <?php endif; ?>
        </div>

    </div>
</section>
