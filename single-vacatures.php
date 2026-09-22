<?php

get_header(); ?>

<main id="primary" class="site-main">
    <div class="single-vacature-container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <span class="section-tag">Vacature</span>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="vacature-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="vacature-meta-box">
                    <ul>
                        <?php if ( get_field('functieniveau') ) : 
                            $functieniveau = get_field('functieniveau');
                            $functieniveau_label = is_array($functieniveau) ? $functieniveau['label'] : $functieniveau;
                        ?>
                            <li>
                                <strong>Functieniveau</strong>
                                <?php echo esc_html( $functieniveau_label ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( get_field('dienstverband') ) : 
                            $dienstverband = get_field('dienstverband');
                            $dienstverband_label = is_array($dienstverband) ? $dienstverband['label'] : $dienstverband;
                        ?>
                            <li>
                                <strong>Dienstverband</strong>
                                <?php echo esc_html( $dienstverband_label ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( get_field('salarisindicatie') ) : ?>
                            <li>
                                <strong>Salarisindicatie</strong>
                                <?php echo esc_html( get_field('salarisindicatie') ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( get_field('locatie') ) : ?>
                            <li>
                                <strong>Standplaats / Locatie</strong>
                                <?php echo esc_html( get_field('locatie') ); ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>