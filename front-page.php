<?php
/**
 * Template Name: Pagina Template
 */

get_header(); 
?>

<main id="primary" class="site-main">
    <div class="container">
        <h1><?php the_title() ?></h1>
        <?php 
        while ( have_posts()) : 
            the_post();
            the_content();
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();