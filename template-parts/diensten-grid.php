<?php
$sectie_tag   = get_field('diensten_tag');
$sectie_titel = get_field('diensten_titel');
$sectie_sub   = get_field('badge_tekst');

$accent_kleur = get_field('accent_kleur') ?: 'blue';

$iconen = array(
    // (IT-Staffing)
    'wolk'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 109 20h9a5 5 0 000-10z"></path></svg>',
    'schild'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>',
    'pijlen'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
    'database'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
    'scherm'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>',
    'mensen'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 00-3-3.87"></path><path d="M16 3.13a4 4 0 010 7.75"></path></svg>',

    // (OT Civiel/Industrie)
    'huis'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
    'document'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>',
    'klok'        => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 8v4l3 3"></path></svg>',
    'waarschuwing'=> '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>',
    'kalender'    => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>',
    'grafiek'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>',
);
?>

<section class="diensten-grid-section theme-<?php echo esc_attr($accent_kleur); ?>">
    <div class="container">
        <div class="section-header">
            <?php if ( $sectie_tag ) : ?>
                <span class="section-tag"><?php echo esc_html($sectie_tag); ?></span>
            <?php endif; ?>
            
            <?php if ( $sectie_titel ) : ?>
                <h2 class="section-title"><?php echo esc_html($sectie_titel); ?></h2>
            <?php endif; ?>
            
            <?php if ( $sectie_sub ) : ?>
                <p class="section-subtext"><?php echo esc_html($sectie_sub); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( have_rows('diensten_lijst') ) : ?>
            <div class="grid-wrapper">
                <?php while ( have_rows('diensten_lijst') ) : the_row(); 
                    $icoon        = get_sub_field('icoon');
                    $icoon_type   = get_sub_field('icoon_type');
                    $dienst_titel = get_sub_field('titel');
                    $tekst        = get_sub_field('beschrijving');
                    
                    $kaart_kleur  = get_sub_field('kaart_kleur'); 
                ?>
                    <div class="dienst-kaart <?php echo esc_attr($kaart_kleur); ?>">
                        <?php if ( $icoon_type && isset($iconen[$icoon_type]) ) : ?>
                            <div class="dienst-icoon"><?php echo $iconen[$icoon_type]; ?></div>
                        <?php elseif ( $icoon ) : ?>
                            <img src="<?php echo esc_url($icoon['url']); ?>" alt="<?php echo esc_attr($icoon['alt']); ?>" class="dienst-icoon-img">
                        <?php else : ?>
                            <div class="dienst-icoon-placeholder"></div>
                        <?php endif; ?>

                        <?php if ( $dienst_titel ) : ?>
                            <h3 class="dienst-titel"><?php echo esc_html($dienst_titel); ?></h3>
                        <?php endif; ?>

                        <?php if ( $tekst ) : ?>
                            <p class="dienst-tekst"><?php echo esc_html($tekst); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>