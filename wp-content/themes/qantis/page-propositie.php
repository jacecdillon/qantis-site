
<?php get_header()?>

<?php 
$primaire_button = get_field('primaire_button');
$secondary_button = get_field('secondary_button');
$accentkleur = get_field('accentkleur');
$diensten = get_field('diensten');
$stap = get_field('stappen');
echo '<pre>';
print_r($primaire_button);
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
   <?php foreach($diensten as $dienst) {?>
    <h2>
        <img src="<?php echo $dienst['icoon']['url']; ?>" alt="">
        <?php echo $dienst['titel']?>
        <?php echo $dienst['tekst']?>

    </h2>
    <?php } ?>

    <p>
        <?php echo get_field('section_tag'); ?>
    </p>
    <h1>
        <?php echo get_field('titel'); ?>
    </h1>
    <p>
        <?php echo get_field('subtekst'); ?>
    </p>
    <img src="<?php echo get_field('afbeelding')?>" alt="">
    <?php foreach($stap as $stappen) {?>
    <h2><?php echo $stappen['titel']; ?></h2>
    <p><?php echo $stappen['tekst']; ?></p>
    <?php } ?>

    
</main>
<?php get_footer()?>
