<?php
get_header(); ?>

<main id="primary" class="site-main">
    <div class="single-vacature-container">
        <?php while ( have_posts() ) : the_post();
            $subtitel   = get_field( 'subtitel' );
            $intro      = get_field( 'beschrijving__intro' );
            $afbeelding = get_field( 'afbeelding' );

            $meta = array(
                'Locatie'          => get_field( 'locatie' ),
                'Uren per week'    => get_field( 'uren_per_week' ),
                'Opleidingsniveau' => get_field( 'opleidingsniveau' ),
                'Salaris'          => get_field( 'salaris' ),
            );
            $meta = array_filter( $meta );
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <span class="section-tag">Vacature</span>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php if ( $subtitel ) : ?>
                        <p class="vacature-subtitel"><?php echo esc_html( $subtitel ); ?></p>
                    <?php endif; ?>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="vacature-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php elseif ( ! empty( $afbeelding['url'] ) ) : ?>
                    <div class="vacature-thumbnail">
                        <img src="<?php echo esc_url( $afbeelding['sizes']['large'] ?? $afbeelding['url'] ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                    </div>
                <?php endif; ?>

                <?php if ( $meta ) : ?>
                    <div class="vacature-meta-box">
                        <ul>
                            <?php foreach ( $meta as $label => $waarde ) : ?>
                                <li>
                                    <strong><?php echo esc_html( $label ); ?></strong>
                                    <?php echo esc_html( $waarde ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if ( $intro ) : ?>
                    <p class="vacature-intro"><?php echo nl2br( esc_html( $intro ) ); ?></p>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <?php
                $solliciteer_url = get_field( 'sollicitatielink' ) ?: home_url( '/#contact' );
                ?>
                <div class="vacature-apply">
                    <a href="<?php echo esc_url( $solliciteer_url ); ?>" class="btn-apply">Solliciteer op deze vacature</a>
                </div>

            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
