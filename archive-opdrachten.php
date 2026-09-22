<?php
get_header(); ?>

<main id="primary" class="site-main">
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <span class="hero-subtitle">Portfolio & Projecten</span>
                <h1 class="hero-title">Onze <span class="highlight-blue">Opdrachten</span></h1>
                <p class="hero-description">Bekijk een selectie van onze meest recente IT-opdrachten en uitgesproken projectresultaten.</p>
            </div>
        </div>
    </section>

    <section class="prop-section">
        <div class="inner">
            <div class="opdrachten-grid">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('opdracht-item'); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="opdracht-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="opdracht-content">
                                <h2 class="prop-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <div class="prop-teaser-tags">
                                    <?php 
                                    if ( function_exists('get_field') ) :
                                        $locatie = get_field('locatie');
                                        $uren = get_field('uren_per_week');
                                        $tech = get_field('technologieen');

                                        if ( $locatie ) : ?>
                                            <span><?php echo esc_html( $locatie ); ?></span>
                                        <?php endif;

                                        if ( $uren ) : ?>
                                            <span><?php echo esc_html( $uren ); ?></span>
                                        <?php endif;

                                        if ( $tech ) : ?>
                                            <span><?php echo esc_html( $tech ); ?></span>
                                        <?php endif;
                                    endif; 
                                    ?>
                                </div>
                                
                                <div class="prop-description">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="read-more">
                                Bekijk opdracht &rarr;
                            </a>
                        </article>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Er zijn op dit moment geen opdrachten gevonden.</p>
                <?php endif; ?>
            </div>

            <?php the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Vorige', 'qantis'),
                'next_text' => __('Volgende &raquo;', 'qantis'),
            )); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>