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
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('vacature-item'); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="vacature-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="vacature-content">
                                <h2 class="prop-title">
                                    <a href="<?php the_permalink(); ?>" style="color: inherit; text-decoration: none;">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <div class="prop-teaser-tags" style="margin-bottom: 12px;">
                                    <?php if ( get_field('functieniveau') ) : 
                                        $f = get_field('functieniveau');
                                        $f_label = is_array($f) ? $f['label'] : $f;
                                    ?>
                                        <span><?php echo esc_html( $f_label ); ?></span>
                                    <?php endif; ?>

                                    <?php if ( get_field('dienstverband') ) : 
                                        $d = get_field('dienstverband');
                                        $d_label = is_array($d) ? $d['label'] : $d;
                                    ?>

                                    
                                        <span><?php echo esc_html( $d_label ); ?></span>
                                    <?php endif; ?>

                                    <?php if ( get_field('salarisindicatie') ) : ?>
                                        <span><?php echo esc_html( get_field('salarisindicatie') ); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="prop-description">
                                    <?php the_excerpt(); ?>
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

            <?php the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Vorige', 'textdomain'),
                'next_text' => __('Volgende &raquo;', 'textdomain'),
            )); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>