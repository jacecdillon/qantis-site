<?php
$current_page_id = get_the_ID();

$propositie_query = new WP_Query(array(
    'post_type'      => 'page',
    'meta_key'       => '_wp_page_template',
    'meta_value'     => 'page-propositie.php',
    'posts_per_page' => 3,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));
?>

<nav class="propositie-nav-bar">
    <div class="container">
        <ul class="propositie-nav-list">
            <?php if ( $propositie_query->have_posts() ) : ?>
                <?php while ( $propositie_query->have_posts() ) : $propositie_query->the_post(); ?>
                    <?php $is_active = ( get_the_ID() === $current_page_id ) ? 'is-active' : ''; ?>
                    <li class="propositie-nav-item <?php echo esc_attr($is_active); ?>">
                        <a href="<?php the_permalink(); ?>" class="propositie-nav-link">
                            <?php the_title(); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <li class="propositie-nav-item">
                    <a href="<?php echo esc_url( site_url('/it-staffing/') ); ?>">IT Staffing</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>