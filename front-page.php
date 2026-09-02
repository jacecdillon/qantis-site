<?php
get_template_part('template-parts/header');
?>

<main>  
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
                <?php echo esc_html( get_field('hero_beschrijving') ?: 'Qantis levert IT-talent en strategische regie voor organisaties in Noord-Holland en daarbuiten.' ); ?>
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

    <section class="propositions-section">
        <div class="propositions-container">
            <?php if ( have_rows('proposities') ) : ?>
                <?php $i = 1; while ( have_rows('proposities') ) : the_row(); 
                    $accent = get_sub_field('kleur_accent') ?: 'blue';
                    $tags = get_sub_field('tags_lijst'); 
                    $titel = get_sub_field('titel');
                ?>
                    <article class="prop-card border-<?php echo esc_attr($accent); ?>">
                        <span class="prop-number"><?php echo sprintf('%02d', $i); ?></span>
                        <h2 class="prop-title"><?php echo esc_html($titel); ?></h2>
                        <p class="prop-description"><?php echo esc_html( get_sub_field('beschrijving') ); ?></p>
                        
                        <?php if ( $tags ) : 
                            $tags_array = explode(',', $tags);
                        ?>
                            <div class="prop-tags">
                                <?php foreach ( $tags_array as $tag ) : ?>
                                    <span class="tag"><?php echo esc_html( trim($tag) ); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <a href="<?php echo esc_url( get_sub_field('pagina_link') ); ?>" class="prop-link link-<?php echo esc_attr($accent); ?>">
                            Meer over <?php echo esc_html($titel); ?> &rarr;
                        </a>
                    </article>
                <?php $i++; endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

    <section class="prop-section" id="propositions">
        <div class="inner">
            <p class="section-tag"><?php echo esc_html( get_field('proposities_section_tag') ); ?></p>
            <h2 class="section-title"><?php echo esc_html( get_field('proposities_section_title') ); ?></h2>
            <p class="section-sub"><?php echo esc_html( get_field('proposities_section_sub') ); ?></p>

            <div class="prop-grid">
                <?php if( have_rows('proposities') ): while( have_rows('proposities') ): the_row(); 
                    $accent_color = get_sub_field('kleur_accent') ?: 'blue';
                    $bullet_field = get_sub_field('bullet_points');
                    $bullets = $bullet_field ? explode("\n", str_replace("\r", "", $bullet_field)) : [];
                    $subtitel = get_sub_field('subtitel') ?: get_sub_field('korte_subtitel');
                    $titel = get_sub_field('titel');
                ?>
                    <div class="prop-card border-<?php echo esc_attr($accent_color); ?>">
                        <?php if ( $subtitel ) : ?>
                            <span class="prop-number"><?php echo esc_html($subtitel); ?></span>
                        <?php endif; ?>
                        
                        <h3 class="prop-title"><?php echo esc_html($titel); ?></h3>
                        <p class="prop-description"><?php echo esc_html( get_sub_field('beschrijving') ); ?></p>

                        <?php if ( !empty($bullets) ) : ?>
                            <div class="prop-bullets-container">
                                <ul class="prop-bullets list-<?php echo esc_attr($accent_color); ?>">
                                    <?php foreach($bullets as $bullet): if(!empty(trim($bullet))): ?>
                                        <li><?php echo esc_html($bullet); ?></li>
                                    <?php endif; endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <a href="<?php echo esc_url( get_sub_field('pagina_link') ); ?>" class="prop-link link-<?php echo esc_attr($accent_color); ?>">
                            Meer over <?php echo esc_html($titel); ?> <span class="arrow">&rarr;</span>
                        </a>
                    </div>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/thuisbasis'); ?>

    <?php get_template_part('template-parts/over-qantis'); ?>

    <?php get_template_part('template-parts/opdrachten'); ?>

    <?php get_template_part('template-parts/cta-banner'); ?>

</main>

<?php
get_template_part('template-parts/footer');
?>