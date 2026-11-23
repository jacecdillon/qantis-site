<?php
$accent = qantis_propositie_accent();
$term   = qantis_propositie_term();
$badges = array_filter( array(
    get_field('niveau'),
    get_field('uren_per_week'),
) );
$intro  = has_excerpt() ? wp_trim_words( get_the_excerpt(), 18 ) : '';
?>
<a href="<?php the_permalink(); ?>" class="opdracht-card opdracht-card--<?php echo esc_attr( $accent ); ?>">
    <div class="opdracht-media">
        <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'large', array( 'class' => 'opdracht-img', 'alt' => get_the_title() ) ); ?>
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
        <?php if ( $term ) : ?>
            <span class="opdracht-term"><?php echo esc_html( $term->name ); ?></span>
        <?php endif; ?>
        <h3 class="opdracht-title"><?php the_title(); ?></h3>
        <?php if ( $intro ) : ?>
            <p class="opdracht-excerpt"><?php echo esc_html( $intro ); ?></p>
        <?php endif; ?>
    </div>
</a>
