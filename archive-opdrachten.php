<?php
get_header();

$current_term = is_tax( 'propositie' ) ? get_queried_object() : null;
$terms        = get_terms( array( 'taxonomy' => 'propositie', 'hide_empty' => true ) );
?>

<main id="primary" class="site-main">
    <section class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <span class="hero-subtitle">Portfolio & Projecten</span>
                <?php if ( $current_term ) : ?>
                    <h1 class="hero-title">Opdrachten <span class="highlight-blue"><?php echo esc_html( $current_term->name ); ?></span></h1>
                <?php else : ?>
                    <h1 class="hero-title">Onze <span class="highlight-blue">Opdrachten</span></h1>
                <?php endif; ?>
                <p class="hero-description">Bekijk een selectie van onze meest recente IT-opdrachten en uitgesproken projectresultaten.</p>
            </div>
        </div>
    </section>

    <section class="prop-section">
        <div class="inner">

            <?php if ( $terms && ! is_wp_error( $terms ) ) : ?>
                <nav class="opdrachten-filter" aria-label="Filter op propositie">
                    <a href="<?php echo esc_url( get_post_type_archive_link( 'opdrachten' ) ); ?>"
                       class="opdrachten-filter-link<?php echo $current_term ? '' : ' is-active'; ?>">Alle</a>
                    <?php foreach ( $terms as $term ) : ?>
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"
                           class="opdrachten-filter-link filter-<?php echo esc_attr( qantis_term_accent( $term ) ); ?><?php echo ( $current_term && $current_term->term_id === $term->term_id ) ? ' is-active' : ''; ?>">
                            <?php echo esc_html( $term->name ); ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>

            <div class="opdrachten-grid">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'template-parts/opdracht-card' ); ?>
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
