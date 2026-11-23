<?php

get_header();
?>

<main id="primary" class="site-main">
    <div class="single-post-container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    
                    <div class="entry-meta">
                        <span class="posted-on">Gepubliceerd op: <?php echo get_the_date(); ?></span>
                        <span class="byline"> door <?php the_author(); ?></span>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail( 'large' ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pagina\'s:', 'qantis' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php
                    $categories_list = get_the_category_list( ', ' );
                    if ( $categories_list ) {
                        printf( '<span class="cat-links">Categorieën: %1$s</span><br>', $categories_list );
                    }

                    $tags_list = get_the_tag_list( '', ', ' );
                    if ( $tags_list ) {
                        printf( '<span class="tags-links">Tags: %1$s</span>', $tags_list );
                    }
                    ?>
                </footer>
            </article>

            <nav class="navigation post-navigation">
                <div class="nav-previous"><?php previous_post_link( '%link', '&laquo; %title' ); ?></div>
                <div class="nav-next"><?php next_post_link( '%link', '%title &raquo;' ); ?></div>
            </nav>

            <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();