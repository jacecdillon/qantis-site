<?php
$sub_titel    = get_field('thuisbasis_sub_title') ?: 'ONZE THUISBASIS';
$titel        = get_field('thuisbasis_title') ?: 'Geworteld in Alkmaar, actief door heel Nederland';
$beschrijving = get_field('thuisbasis_beschrijving');
$afbeelding   = get_field('thuisbasis_image');

$telefoon = get_field('telefoonnummer', 'option') ?: '088 35 20 600';
$tijden   = get_field('openingstijden', 'option') ?: '9:00 – 17:00';

$stats = array();
if ( have_rows('thuisbasis_stats') ) {
    while ( have_rows('thuisbasis_stats') ) {
        the_row();
        $getal = get_sub_field('getal');
        $label = get_sub_field('label');
        if ( $getal || $label ) {
            $stats[] = array( $getal, $label );
        }
    }
}
if ( empty( $stats ) ) {
    $aantal_prop = qantis_get_proposities()->post_count ?: 3;
    $stats = array(
        array( (string) $aantal_prop, 'Proposities onder één dak' ),
        array( '088', $telefoon . ' — altijd bereikbaar' ),
        array( 'NHN', 'Noord-Holland Noord als thuismarkt' ),
        array( 'Ma–Vr', $tijden . ' bereikbaar' ),
    );
}
?>

<section class="thuisbasis-section">
    <div class="thuisbasis-container">
        
        <div class="thuisbasis-media">
            <?php if ( !empty($afbeelding) ) : ?>
                <img src="<?php echo esc_url($afbeelding['url']); ?>" alt="<?php echo esc_attr($afbeelding['alt'] ?: $titel); ?>">
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
                <?php foreach ( $stats as $stat ) : ?>
                    <div class="stat-card">
                        <span class="stat-number"><?php echo esc_html( $stat[0] ); ?></span>
                        <span class="stat-label"><?php echo esc_html( $stat[1] ); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>