<?php
$stap = get_field('stappen');
?>

<p>
    <?php echo get_field('section_tag'); ?>
</p>
<h1>
    <?php echo get_field('titel'); ?>
</h1>
<p>
    <?php echo get_field('subtekst'); ?>
</p>
<img src="<?php echo get_field('afbeelding') ?>" alt="">
<?php foreach ($stap as $stappen) { ?>
    <div class="stap">
        <h2>
            <?php echo $stappen['titel']; ?>
        </h2>
        <p>
            <?php echo $stappen['tekst']; ?>
        </p>
    </div>

<?php } ?>