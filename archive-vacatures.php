<?php
get_header(); ?>

<main id="primary" class="site-main">
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <span class="hero-subtitle">Werken bij Qantis</span>
                <h1 class="hero-title">Openstaande <span class="highlight-blue">Vacatures</span></h1>
                <p class="hero-description">Ontdek jouw volgende uitdaging. Bekijk onze actuele IT-vacatures en versterk ons team.</p>
            </div>
        </div>
    </section>

    <section class="prop-section">
        <div class="inner">
            <div class="vacatures-grid">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post();
                        $subtitel   = get_field( 'subtitel' );
                        $intro      = get_field( 'beschrijving__intro' );
                        $afbeelding = get_field( 'afbeelding' );

                        $tags = array_filter( array(
                            get_field( 'locatie' ),
                            get_field( 'uren_per_week' ),
                            get_field( 'opleidingsniveau' ),
                            get_field( 'salaris' ),
                        ) );
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'vacature-item' ); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="vacature-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail( 'medium' ); ?>
                                    </a>
                                </div>
                            <?php elseif ( ! empty( $afbeelding['url'] ) ) : ?>
                                <div class="vacature-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url( $afbeelding['sizes']['medium'] ?? $afbeelding['url'] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="vacature-content">
                                <h2 class="prop-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <?php if ( $subtitel ) : ?>
                                    <p class="vacature-subtitel"><?php echo esc_html( $subtitel ); ?></p>
                                <?php endif; ?>

                                <?php if ( $tags ) : ?>
                                    <div class="prop-teaser-tags">
                                        <?php foreach ( $tags as $tag ) : ?>
                                            <span><?php echo esc_html( $tag ); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="prop-description">
                                    <?php
                                    if ( $intro ) {
                                        echo '<p>' . esc_html( wp_trim_words( $intro, 30 ) ) . '</p>';
                                    } else {
                                        the_excerpt();
                                    }
                                    ?>
                                </div>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read-more">
                                Bekijk vacature &rarr;
                            </a>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Er zijn op dit moment geen openstaande vacatures.</p>
                <?php endif; ?>
            </div>

            <?php the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '&laquo; Vorige', 'qantis' ),
                'next_text' => __( 'Volgende &raquo;', 'qantis' ),
            ) ); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
