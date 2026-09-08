<?php
/**
 * Front Page Template
 */

get_header();
?>

<main class="front-page">   
    <section class="hero-section">
        <div class="hero-content">
            <span class="hero-subtitle">
                <?php echo esc_html( get_field('hero_subtitel') ?: 'GEVESTIGD IN ALKMAAR · NOORD-HOLLAND' ); ?>
            </span>
            <h1 class="hero-title">
                <?php 
                if ( get_field('hero_titel') ) {
                    echo wp_kses_post( get_field('hero_titel') );
                } else {
                    echo 'IT expertise<br><span class="highlight-blue">Open, eerlijk</span><br>en transparant';
                }
                ?>
            </h1>
            <p class="hero-description">
                <?php echo wp_kses_post( get_field('hero_beschrijving') ?: 'Qantis levert IT-talent en strategische regie voor organisaties in Noord-Holland en daarbuiten.' ); ?>
            </p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url( get_field('hero_primary_btn_url') ?: '#propositions' ); ?>" class="btn btn-primary">
                    <?php echo esc_html( get_field('hero_primary_btn_text') ?: 'Onze proposities' ); ?>
                </a>
                <a href="<?php echo esc_url( get_field('hero_secondary_btn_url') ?: site_url('/contact/') ); ?>" class="btn btn-secondary">
                    <?php echo esc_html( get_field('hero_secondary_btn_text') ?: 'Neem contact op' ); ?>
                </a>
            </div>
        </div>
    </section>

    <section class="prop-teaser-section">
        <div class="inner">
            <div class="prop-teaser-grid">
                <?php 
                $page_id = get_option('page_on_front') ?: get_the_ID();

                if ( have_rows('proposities', $page_id) ) : $i = 1; 
                    while ( have_rows('proposities', $page_id) ) : the_row();

                        $accent_color = get_sub_field('kleur_accent') ?: 'blue';
                        $titel_kaart  = get_sub_field('titel');
                        $beschrijving = get_sub_field('beschrijving');
                        $link         = get_sub_field('pagina_link');

                        $tags_field = get_sub_field('tags_lijst') ?: get_sub_field('bullet_points');
                        $tags       = $tags_field ? array_filter( array_map('trim', preg_split('/[\n\r,]+/', $tags_field)) ) : array();
                ?>
                    <a href="<?php echo esc_url( $link ?: '#' ); ?>" class="prop-teaser-card border-<?php echo esc_attr($accent_color); ?>">
                        <span class="prop-teaser-number"><?php echo sprintf('%02d', $i); ?></span>

                        <?php if ( $titel_kaart ) : ?>
                            <h3 class="prop-teaser-title"><?php echo esc_html($titel_kaart); ?></h3>
                        <?php endif; ?>

                        <?php if ( $beschrijving ) : ?>
                            <p class="prop-teaser-description"><?php echo esc_html($beschrijving); ?></p>
                        <?php endif; ?>

                        <?php if ( ! empty($tags) ) : ?>
                            <div class="prop-teaser-tags list-<?php echo esc_attr($accent_color); ?>">
                                <?php foreach ( $tags as $tag_item ) : ?>
                                    <span><?php echo esc_html( $tag_item ); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <span class="prop-teaser-link link-<?php echo esc_attr($accent_color); ?>">
                            Meer over <?php echo esc_html($titel_kaart); ?> <span class="arrow">&rarr;</span>
                        </span>
                    </a>
                <?php 
                        $i++; 
                    endwhile; 
                endif; 
                ?>
            </div>
        </div>
    </section>

   <section class="prop-section" id="propositions">
        <div class="inner">
            <?php 
            $tag   = get_field('proposities_section_tag', $page_id) ?: get_field('sectie_tagline', $page_id) ?: 'WAT WIJ DOEN';
            $titel = get_field('proposities_section_title', $page_id) ?: get_field('sectie_titel', $page_id) ?: 'Drie proposities. Een Qantis';
            $sub   = get_field('proposities_section_sub', $page_id) ?: get_field('sectie_subtekst', $page_id) ?: 'IT en OT leveren talent; QAAS borgt strategie tot operatie. Drie heldere proposities, één belofte: kwaliteit en snelheid.';
            ?>

            <p class="section-tag"><?php echo esc_html( $tag ); ?></p>
            <h2 class="section-title"><?php echo esc_html( $titel ); ?></h2>
            <p class="section-sub"><?php echo esc_html( $sub ); ?></p>

            <div class="prop-grid">
                <?php if ( have_rows('proposities', $page_id) ) : $i = 1; while ( have_rows('proposities', $page_id) ) : the_row(); 
                    $accent_color   = get_sub_field('kleur_accent') ?: 'blue';
                    $bullet_field   = get_sub_field('bullet_points') ?: get_sub_field('tags_lijst');
                    $bullets        = $bullet_field ? explode("\n", str_replace("\r", "", $bullet_field)) : array();
                    $titel_kaart    = get_sub_field('titel');
                    $korte_subtitel = get_sub_field('korte_subtitel');
                ?>
                    <article class="prop-card border-<?php echo esc_attr($accent_color); ?>">
                        <span class="prop-number"><?php echo sprintf('%02d', $i); ?></span>
                        
                        <?php if ( $titel_kaart ) : ?>
                            <h3 class="prop-title"><?php echo esc_html($titel_kaart); ?></h3>
                        <?php endif; ?>

                        <?php if ( $korte_subtitel ) : ?>
                            <p class="prop-subtitle"><?php echo esc_html($korte_subtitel); ?></p>
                        <?php endif; ?>

                        <p class="prop-description"><?php echo esc_html( get_sub_field('beschrijving') ); ?></p>

                        <?php if ( ! empty( $bullets ) ) : ?>
                            <div class="prop-bullets-container">
                                <ul class="prop-bullets list-<?php echo esc_attr($accent_color); ?>">
                                    <?php foreach ( $bullets as $bullet ) : if ( ! empty( trim($bullet) ) ) : ?>
                                        <li><?php echo esc_html($bullet); ?></li>
                                    <?php endif; endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if ( get_sub_field('pagina_link') ) : ?>
                            <a href="<?php echo esc_url( get_sub_field('pagina_link') ); ?>" class="prop-link link-<?php echo esc_attr($accent_color); ?>">
                                Meer over <?php echo esc_html($titel_kaart); ?> <span class="arrow">&rarr;</span>
                            </a>
                        <?php endif; ?>
                    </article>
                <?php $i++; endwhile; endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/thuisbasis'); ?>

    <?php get_template_part('template-parts/over-qantis'); ?>

    <?php get_template_part('template-parts/opdrachten'); ?>

    <?php get_template_part('template-parts/cta-banner'); ?>

</main>

<?php 
get_footer();
?>