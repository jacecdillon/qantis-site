<?php
$sub_titel    = get_field('thuisbasis_sub_titel') ?: 'ONZE THUISBASIS';
$titel        = get_field('thuisbasis_titel') ?: 'Geworteld in Alkmaar, actief door heel Nederland';
$beschrijving = get_field('thuisbasis_beschrijving');
$afbeelding   = get_field('thuisbasis_afbeelding');

$telefoon = get_field('telefoonnummer', 'option') ?: '088 35 20 600';
$tijden   = get_field('openingstijden', 'option') ?: '9:00 – 17:00';
?>

<section class="thuisbasis-section">
    <div class="thuisbasis-container">
        
        <div class="thuisbasis-image">
            <?php if ( !empty($afbeelding) ) : ?>
                <img src="<?php echo esc_url($afbeelding['url']); ?>" alt="<?php echo esc_attr($afbeelding['alt']); ?>">
            <?php else : ?>
                <div class="thuisbasis-placeholder"></div>
            <?php endif; ?>
        </div>

        <div class="thuisbasis-content">
            <span class="section-subtitle"><?php echo esc_html($sub_titel); ?></span>
            <h2 class="section-title"><?php echo esc_html($titel); ?></h2>
            
            <div class="section-description">
                <?php echo wp_kses_post($beschrijving); ?>
            </div>

            <div class="thuisbasis-stats">
                <div class="stat-card">
                    <span class="stat-number">3</span>
                    <span class="stat-label">Proposities onder één dak</span>
                </div>
                
                <div class="stat-card">
                    <span class="stat-number">088</span>
                    <span class="stat-label"><?php echo esc_html($telefoon); ?> — altijd bereikbaar</span>
                </div>
                
                <div class="stat-card">
                    <span class="stat-number">NHN</span>
                    <span class="stat-label">Noord-Holland Noord als thuismarkt</span>
                </div>
                
                <div class="stat-card">
                    <span class="stat-number">Ma–Vr</span>
                    <span class="stat-label"><?php echo esc_html($tijden); ?> bereikbaar</span>
                </div>
            </div>
        </div>

    </div>
</section>