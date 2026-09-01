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
                ?>
                    <article class="prop-card border-<?php echo esc_attr($accent); ?>">
                        <span class="prop-number"><?php echo sprintf('%02d', $i); ?></span>
                        <h2 class="prop-title"><?php echo esc_html( get_sub_field('titel') ); ?></h2>
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
                            Meer over <?php echo esc_html( get_sub_field('titel') ); ?> &rarr;
                        </a>
                    </article>
                <?php $i++; endwhile; ?>
            <?php else : ?>
                <article class="prop-card border-blue">
                    <span class="prop-number">01</span>
                    <h2 class="prop-title">IT Staffing</h2>
                    <p class="prop-description">De juiste IT-professional op de juiste plek. Van cloud-engineer tot functioneel beheerder.</p>
                    <div class="prop-tags">
                        <span class="tag">Cloud</span><span class="tag">Security</span><span class="tag">Infrastructuur</span>
                    </div>
                    <a href="<?php echo esc_url( site_url( '/it-staffing/' ) ); ?>" class="prop-link link-blue">Meer over IT Staffing &rarr;</a>
                </article>
                <article class="prop-card border-orange">
                    <span class="prop-number">02</span>
                    <h2 class="prop-title">OT Civiel & Industrie</h2>
                    <p class="prop-description">Waar ICT en industrie elkaar ontmoeten. Bruggen, sluizen, tunnels en gemalen.</p>
                    <div class="prop-tags">
                        <span class="tag">Projectmanagement</span><span class="tag">Risicomanagement</span>
                    </div>
                    <a href="<?php echo esc_url( site_url( '/ot-civiel-industrie/' ) ); ?>" class="prop-link link-orange">Meer over OT Civiel &rarr;</a>
                </article>
                <article class="prop-card border-green">
                    <span class="prop-number">03</span>
                    <h2 class="prop-title">QAAS MKB</h2>
                    <p class="prop-description">Trusted advisor voor het MKB. Senior ICT-expertise op flexibele basis.</p>
                    <div class="prop-tags">
                        <span class="tag">Strategisch</span><span class="tag">Tactisch</span>
                    </div>
                    <a href="<?php echo esc_url( site_url( '/qaas-mkb/' ) ); ?>" class="prop-link link-green">Meer over QAAS &rarr;</a>
                </article>
            <?php endif; ?>
        </div>
    </section>

    <section class="section prop-section" id="propositions">
        <div class="inner">
            <p class="section-tag"><?php echo esc_html( get_field('proposities_section_tag') ?: 'Wat wij doen' ); ?></p>
            <h2 class="section-title"><?php echo esc_html( get_field('proposities_section_title') ?: 'Drie proposities. Een Qantis' ); ?></h2>
            <p class="section-sub"><?php echo esc_html( get_field('proposities_section_sub') ?: 'IT en OT leveren talent; QAAS borgt strategie tot operatie. Drie heldere proposities, één belofte: kwaliteit en snelheid.' ); ?></p>
        </div>

        <div class="inner prop-grid">
            <?php if ( have_rows('proposities') ) : ?>
                <?php while ( have_rows('proposities') ) : the_row(); 
                    $accent = get_sub_field('kleur_accent') ?: 'blue';
                    $bullets = get_sub_field('bullet_points');
                ?>
                    <article class="prop-card card-<?php echo esc_attr($accent); ?>">
                        <p class="prop-num"><?php echo esc_html( get_sub_field('subtitel') ); ?></p>
                        <h3 class="prop-title"><?php echo esc_html( get_sub_field('titel') ); ?></h3>
                        <p class="prop-desc"><?php echo esc_html( get_sub_field('beschrijving') ); ?></p>
                    
                        <?php if ( $bullets ) : 
                            $bullets_array = explode("\n", str_replace("\r", "", $bullets));
                        ?>
                            <ul class="prop-list">
                                <?php foreach ( $bullets_array as $bullet ) : 
                                    if ( trim($bullet) === '' ) continue;
                                ?>
                                    <li><?php echo esc_html( trim($bullet) ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <a href="<?php echo esc_url( get_sub_field('pagina_link') ); ?>" class="prop-link">
                            Meer over <?php echo esc_html( get_sub_field('titel') ); ?> &rarr;
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_template_part('template-parts/footer');
?>