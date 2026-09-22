<?php

get_header(); ?>

<main id="primary" class="site-main">
    <div class="single-opdracht-container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <span class="section-tag">Opdracht</span>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="opdracht-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="opdracht-meta-box">
                    <ul>
                        <?php if ( get_field('opdrachtgever') ) : ?>
                            <li>
                                <strong>Opdrachtgever</strong>
                                <?php echo esc_html( get_field('opdrachtgever') ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( get_field('locatie') ) : ?>
                            <li>
                                <strong>Locatie</strong>
                                <?php echo esc_html( get_field('locatie') ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( get_field('doorlooptijd') ) : ?>
                            <li>
                                <strong>Doorlooptijd</strong>
                                <?php echo esc_html( get_field('doorlooptijd') ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( get_field('uren_per_week') ) : ?>
                            <li>
                                <strong>Uren per week</strong>
                                <?php echo esc_html( get_field('uren_per_week') ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( get_field('startdatum') ) : ?>
                            <li>
                                <strong>Startdatum</strong>
                                <?php echo esc_html( get_field('startdatum') ); ?>
                            </li>
                        <?php endif; ?>

                        <?php if ( get_field('technologieen') ) : ?>
                            <li>
                                <strong>Technologieën / Tags</strong>
                                <?php echo esc_html( get_field('technologieen') ); ?>
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