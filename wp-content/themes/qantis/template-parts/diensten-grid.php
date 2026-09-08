<?php
$diensten = get_field('diensten');
?>

<?php foreach ($diensten as $dienst) { ?>
    <div class="dienst">
        <img src="<?php echo $dienst['icoon']['url']; ?>" alt="">
        <h2>
            <?php echo $dienst['titel'] ?>
        </h2>
        <p>
            <?php echo $dienst['tekst'] ?>
        </p>
    </div>

<?php } ?>