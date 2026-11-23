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
            $titel_r1  = get_field('hero_titel_regel_1');
            $titel_acc = get_field('hero_titel_accent');
            $titel_r3  = get_field('hero_titel_regel_3');

            if ( $titel_r1 || $titel_acc || $titel_r3 ) {
                $regels = array();
                if ( $titel_r1 )  { $regels[] = esc_html( $titel_r1 ); }
                if ( $titel_acc ) { $regels[] = '<span class="highlight-blue">' . esc_html( $titel_acc ) . '</span>'; }
                if ( $titel_r3 )  { $regels[] = esc_html( $titel_r3 ); }
                echo implode( '<br>', $regels );
            } elseif ( get_field('hero_titel') ) {
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

    <?php $page_id = get_option('page_on_front') ?: get_the_ID(); ?>

    <section class="prop-teaser-section">
        <div class="inner">
            <div class="prop-teaser-grid">
                <?php
                $proposities = qantis_get_proposities();
                $i = 1;
                while ( $proposities->have_posts() ) : $proposities->the_post();
                    $accent_color = qantis_accent_slug( get_the_ID() );
                    $teaser       = get_field('teaser_tekst') ?: wp_trim_words( (string) get_field('hero_tekst'), 22 );
                ?>
                    <a href="<?php the_permalink(); ?>" class="prop-teaser-card border-<?php echo esc_attr($accent_color); ?>">
                        <span class="prop-teaser-number"><?php echo sprintf('%02d —', $i); ?></span>

                        <h3 class="prop-teaser-title"><?php the_title(); ?></h3>

                        <?php if ( $teaser ) : ?>
                            <p class="prop-teaser-description"><?php echo esc_html($teaser); ?></p>
                        <?php endif; ?>

                        <span class="prop-teaser-link link-<?php echo esc_attr($accent_color); ?>">
                            Meer over <?php the_title(); ?> <span class="arrow">&rarr;</span>
                        </span>
                    </a>
                <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <section class="prop-section" id="propositions">
        <div class="inner">
            <?php 
            $tag   = get_field('proposities_section_tag', $page_id) ?: 'WAT WIJ DOEN';
            $titel = get_field('proposities_section_title', $page_id) ?: 'Drie proposities. Één Qantis.';
            $sub   = get_field('proposities_section_sub', $page_id) ?: 'IT en OT leveren talent; QAAS borgt strategie tot operatie. Drie heldere proposities, één belofte: kwaliteit en snelheid.';
            ?>

            <p class="section-tag"><?php echo esc_html( $tag ); ?></p>
            <h2 class="section-title"><?php echo esc_html( $titel ); ?></h2>
            <p class="section-sub"><?php echo esc_html( $sub ); ?></p>

            <div class="prop-grid">
                <?php if ( have_rows('proposities', $page_id) ) : $i = 1; while ( have_rows('proposities', $page_id) ) : the_row(); 
                    $accent_raw     = get_sub_field('kleur_accent');
                    $accent_color   = ! empty($accent_raw) ? strtolower(trim($accent_raw)) : 'blue';

                    $bullet_field   = get_sub_field('bullet_points');
                    $bullets        = $bullet_field ? explode("\n", str_replace("\r", "", $bullet_field)) : array();
                    
                    $korte_subtitel = get_sub_field('korte_subtitel');
                    $kaart_titel    = get_sub_field('kaart_titel') ?: get_sub_field('titel');
                    $beschrijving   = get_sub_field('beschrijving');
                ?>
                    <article class="prop-card border-<?php echo esc_attr($accent_color); ?>">
                        <div>
                            <span class="prop-number">
                                <?php echo sprintf('%02d', $i); ?>
                                <?php if ( $korte_subtitel ) : ?>
                                    &mdash; <?php echo esc_html($korte_subtitel); ?>
                                <?php endif; ?>
                            </span>
                            
                            <?php if ( $kaart_titel ) : ?>
                                <h3 class="prop-title"><?php echo esc_html($kaart_titel); ?></h3>
                            <?php endif; ?>

                            <?php if ( $beschrijving ) : ?>
                                <p class="prop-description"><?php echo esc_html($beschrijving); ?></p>
                            <?php endif; ?>

                            <?php if ( ! empty( $bullets ) ) : ?>
                                <div class="prop-bullets-container">
                                    <ul class="prop-bullets list-<?php echo esc_attr($accent_color); ?>">
                                        <?php foreach ( $bullets as $bullet ) : if ( ! empty( trim($bullet) ) ) : ?>
                                            <li><?php echo esc_html($bullet); ?></li>
                                        <?php endif; endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if ( get_sub_field('pagina_link') ) : ?>
                            <a href="<?php echo esc_url( get_sub_field('pagina_link') ); ?>" class="prop-link link-<?php echo esc_attr($accent_color); ?>">
                                Meer over <?php echo esc_html(get_sub_field('titel')); ?> <span class="arrow">&rarr;</span>
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

    <?php get_template_part('template-parts/vacature-cta'); ?>

    <?php get_template_part('template-parts/cta-banner'); ?>

</main>

<?php get_template_part('template-parts/contact-section'); ?>

<?php 
get_footer();
?>