<?php 
$primaire_button = get_field('primaire_button');
$secondary_button = get_field('secondary_button');
?>
<span>

        <?php
        $vacatures_count = wp_count_posts('vacature')->publish;
        ?>

        <p>
            Bekijk onze <?php echo $vacatures_count; ?> vacatures
        </p>
        <?php echo get_field('hero_tag'); ?>
    </span>

    <h1>
        <?php echo get_field('hero_titel'); ?>
    </h1>

    <p>
        <?php echo get_field('hero_subtekst'); ?>
    </p>
    <a href="<?php echo $primaire_button['hero_primary_button_link']['url'] ?>">
        <?php echo $primaire_button['hero_primary_button_text'] ?>
    </a><br>

    <a href="<?php echo $secondary_button['hero_secondary_button_link']['url'] ?>">
        <?php echo $secondary_button['hero_secondary_button_text'] ?>
    </a>
</span>
