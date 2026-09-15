<?php
$proposities = new WP_Query(array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'meta_key' => '_wp_page_template',
    'meta_value' => 'page-propositie.php',
    'post__not_in' => array(get_page_by_path('propositie')->ID),
    'orderby' => 'menu_order',
    'order' => 'ASC',
));
?>

<nav class="propositie-nav">

    <?php if ($proposities->have_posts()): ?>

        <?php while ($proposities->have_posts()):
            $proposities->the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="<?php echo get_the_ID() === get_queried_object_id() ? 'active' : ''; ?>">
                <?php the_title(); ?>
            </a>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php endif; ?>

</nav>