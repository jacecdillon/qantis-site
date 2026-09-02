<?php

$sectie_titel = get_field('opdrachten_sectie_titel') ?: 'Onze opdrachten';
$bekijk_alles_tekst = get_field('opdrachten_bekijk_alles_tekst') ?: 'Bekijk alle opdrachten';
$bekijk_alles_url = get_field('opdrachten_bekijk_alles_url') ?: site_url('/opdrachten');

$titel = get_sub_field('titel');
$niveau = get_sub_field('niveau') ?: 'Medior/Senior';
$uren = get_sub_field('uren') ?: '36 uur';
$afbeelding = get_sub_field('afbeelding');
$link = get_sub_field('link') ?: '#';

?>

<section class="opdrachten-section">
    <div class="opdrachten-container">
        
        <div class="opdrachten-header">
            <h2 class="opdrachten-title">Onze opdrachten</h2>
            <a href="<?php echo esc_url(site_url('/opdrachten/')); ?>" class="opdrachten-link">
                Bekijk alle opdrachten &rsaquo;
            </a>
        </div>

        <div class="opdrachten-grid">
            <?php
            if ( have_rows('opdrachten_lijst') ) :
                while ( have_rows('opdrachten_lijst') ) : the_row();
                    $titel     = get_sub_field('titel');
                    $niveau    = get_sub_field('niveau') ?: 'Medior/Senior';
                    $uren      = get_sub_field('uren') ?: '36 uur';
                    $afbeelding = get_sub_field('afbeelding');
                    $link      = get_sub_field('link') ?: '#';
            ?>
                <a href="<?php echo esc_url($link); ?>" class="opdracht-card">
                    <div class="opdracht-media">
                        <?php if ( !empty($afbeelding) ) : ?>
                            <img src="<?php echo esc_url($afbeelding['url']); ?>" alt="<?php echo esc_attr($titel); ?>" class="opdracht-img">
                        <?php endif; ?>
                        
                        <div class="opdracht-badges">
                            <span class="badge"><?php echo esc_html($niveau); ?></span>
                            <span class="badge"><?php echo esc_html($uren); ?></span>
                        </div>
                    </div>
                    <div class="opdracht-content">
                        <h3 class="opdracht-title"><?php echo esc_html($titel); ?></h3>
                    </div>
                </a>
            <?php 
                endwhile;
            endif; 
            ?>
        </div>

    </div>
</section>