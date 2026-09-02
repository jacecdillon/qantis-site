
<?php get_header()?>

<?php 
$primaire_button = get_field('primaire_button');
$secondary_button = get_field('secondary_button');
$accentkleur = get_field('accentkleur');
$diensten = get_field('diensten');
echo '<pre>';
print_r($primaire_button);
echo '</pre>';

echo '<pre>';
print_r($diensten);
echo '</pre>';
?>

<main>
    <span>
        <?php echo get_field('hero_tag'); ?>
    </span>

    <h1>
        <?php echo get_field('hero_titel'); ?>
    </h1>

    <p>
        <?php echo get_field('hero_subtekst'); ?>
    </p>
    <a href="<?php echo $primaire_button['hero_primary_button_link']['url']?>">
        <?php echo $primaire_button['hero_primary_button_text']?>
    </a>
    <?php
        echo $primaire_button['hero_primary_button_link']['url'];
    ?>
    <a href="<?php echo $secondary_button['hero_secondary_button_link']['url']?>">
        <?php echo $secondary_button['hero_secondary_button_text']?>
    </a>

    <p>
        Accentkleur: <?php echo $accentkleur; ?>
    </p>


</main>
<?php get_footer()?>
