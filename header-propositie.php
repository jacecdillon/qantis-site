<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header site-header-propositie">
    <div class="header-container">

        <div class="site-branding">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="nav-logo">
                <svg viewBox="0 0 230 58" xmlns="http://www.w3.org/2000/svg" style="height: 40px; width: auto; display: block;">
                    <rect x="0" y="1" width="50" height="50" rx="10" fill="#2d2d2d"></rect>
                    <rect x="7" y="8" width="30" height="30" rx="4" fill="#0d1b2e"></rect>
                    <rect x="26" y="30" width="24" height="21" fill="#0d1b2e"></rect>
                    <rect x="39" y="30" width="11" height="9" fill="#2d2d2d"></rect>
                    <polygon points="34,38 41,38 48,50 41,50" fill="var(--accent)"></polygon>
                    <text x="60" y="43" font-family="'Arial Rounded MT Bold','Arial Black',Arial,sans-serif" font-size="38" font-weight="900" fill="#d8d8d8" letter-spacing="-1">antis</text>
                    <line x1="60" y1="50" x2="152" y2="50" stroke="var(--accent)" stroke-width="1.2"></line>
                    <text x="153" y="56" font-family="Arial,sans-serif" font-size="7.5" fill="var(--accent)" text-anchor="end" font-style="italic">makes IT easy</text>
                </svg>
            </a>
        </div>

        <nav id="site-navigation" class="main-navigation propositie-navigation">
            <ul class="nav-menu">
                <?php $prop_menu = qantis_get_proposities(); ?>
                <?php while ( $prop_menu->have_posts() ) : $prop_menu->the_post(); ?>
                    <li class="<?php echo ( get_the_ID() === get_queried_object_id() ) ? 'current-menu-item' : ''; ?>">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </nav>

        <div class="header-contact">
            <a href="<?php echo esc_url( qantis_phone_href() ); ?>" class="phone-link" aria-label="<?php echo esc_attr( 'Bel ons: ' . qantis_phone_display() ); ?>">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                </svg>
                <span><?php echo esc_html( qantis_phone_display() ); ?></span>
            </a>

            <button type="button" class="nav-toggle" aria-controls="site-navigation" aria-expanded="false" aria-label="Menu openen">
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
                <span class="nav-toggle-bar"></span>
            </button>
        </div>
    </div>
</header>

<?php
$current_id = get_queried_object_id();
$tabs       = qantis_get_proposities();
?>

<div class="propositie-nav-bar theme-<?php echo esc_attr( qantis_accent_slug( $current_id ) ); ?>">
    <div class="propositie-nav-container">
        <?php $n = 1; while ( $tabs->have_posts() ) : $tabs->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="propositie-tab <?php echo ( get_the_ID() === $current_id ) ? 'is-active' : ''; ?>">
                <span class="tab-dot dot-<?php echo esc_attr( qantis_accent_slug( get_the_ID() ) ); ?>"></span>
                <span class="tab-label"><?php echo esc_html( sprintf( '%02d - %s', $n, get_the_title() ) ); ?></span>
            </a>
        <?php $n++; endwhile; wp_reset_postdata(); ?>
    </div>
</div>
