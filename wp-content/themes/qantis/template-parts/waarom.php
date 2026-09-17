<?php
$waarom = get_field('waarom');
?>

<?php if ($waarom) { ?>
    <section class="waarom">
        <div class="waar-inner">
            <p class="s-tag"><?php echo $waarom['tag'] ?></p>
            <h2 class="s-titel"><?php echo $waarom['label'] ?></h2>
            <p class="s-sub"><?php echo $waarom['tekst'] ?></p>
            <div class="waar-grid">
                <?php foreach ($waarom['repeater'] as $object) { ?>
                    <article class="waar-art">
                        <h1 class="waar-number"><?php echo $object['num'] ?></h1>
                        <h3 class="field-lab"><?php echo $object['label'] ?></h3>
                        <p class="tarieven-tekst"><?php echo $object['tekst'] ?></p>
                    </article>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>