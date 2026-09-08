<?php
/*
Template Name: Propositie
*/
?>
<?php get_header();
/*echo '<pre>';
var_dump(get_fields());
echo '</pre>';*/
?>
<?php
$accentkleur = get_field('accentkleur');
$toon_extra_sectie = get_field('toon_extra_sectie');
$expertise = get_field('expertise');
$toepassingsgebieden = get_field('toepassingsgebieden');
$voordelenlijst = get_field('voordelen');
$tarievenblok = get_field('tarievenblok');
$quick_call = get_field('quick_call');
?>
<main>
    <?php get_template_part('template-parts/hero'); ?>
    <?php get_template_part('template-parts/cta'); ?>
    <p>
        Accentkleur: <?php echo $accentkleur; ?>
    </p>

    <?php get_template_part('template-parts/diensten-grid'); ?>
    <?php get_template_part('template-parts/stappen'); ?>

    <?php if ($toon_extra_sectie) { ?>
        <section class="extra-sectie">
            <?php foreach ($expertise as $item) { ?>
                <div class="expertise-item">
                    <?php echo $item['label']; ?>
                </div>
            <?php } ?>
            <?php foreach ($toepassingsgebieden as $item) { ?>
                <div class="toepassingsgebied">
                    <h2>
                        <?php echo $item['titel']; ?>
                    </h2>
                    <p>
                        <?php echo $item['tekst']; ?>
                    </p>
                </div>
            <?php } ?>
            <?php if ($quick_call) { ?>
                <div class="quick-call">
                    <h2>
                        <?php echo $quick_call['titel']; ?>
                    </h2>
                    <p>
                        <?php echo $quick_call['tekst']; ?>
                    </p>
                    <a href="<?php echo $quick_call['buttonlink']['url'] ?>">
                        <?php echo $quick_call['buttontekst'] ?>
                    </a>
                </div>
            <?php } ?>
            <?php foreach ($voordelenlijst as $item) { ?>
                <div class='voordelen'>
                    <?php echo $item['label']; ?>
                </div>
            <?php } ?>
            <?php foreach ($tarievenblok as $item) { ?>
                <div class='tarieven'>
                    <p>
                        <?php echo $item['badge']; ?>
                    </p>
                    <h2>
                        <?php echo $item['titel']; ?>
                    </h2>
                    <p>
                        <?php echo $item['tekst']; ?>
                    </p>
                    <p>
                        <?php echo $item['prijsvermelding']; ?>
                    </p>
                </div>
            <?php } ?>
        </section>
    <?php } ?>
</main>
<?php get_footer() ?>