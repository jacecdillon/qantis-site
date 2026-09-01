<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <div class="header-container">

        <!-- Logo -->
        <div class="site-branding">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="nav-logo">
                <svg viewBox="0 0 230 58" xmlns="http://www.w3.org/2000/svg" style="height: 40px; width: auto; display: block;">
                    <!-- Q mark -->
                    <rect x="0" y="1" width="50" height="50" rx="10" fill="#2d2d2d"></rect>
                    <rect x="7" y="8" width="30" height="30" rx="4" fill="#0d1b2e"></rect>
                    <rect x="26" y="30" width="24" height="21" fill="#0d1b2e"></rect>
                    <rect x="39" y="30" width="11" height="9" fill="#2d2d2d"></rect>
                    <polygon points="34,38 41,38 48,50 41,50" fill="#1782C4"></polygon>
                    <text x="60" y="43" font-family="'Arial Rounded MT Bold','Arial Black',Arial,sans-serif" font-size="38" font-weight="900" fill="#d8d8d8" letter-spacing="-1">antis</text>
                    <line x1="60" y1="50" x2="152" y2="50" stroke="#1782C4" stroke-width="1.2"></line>
                    <text x="153" y="56" font-family="Arial,sans-serif" font-size="7.5" fill="#1782C4" text-anchor="end" font-style="italic">makes IT easy</text>
                </svg>
            </a>
        </div>

        <nav id="site-navigation" class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => false,
                'depth'          => 2,
            ) );
            ?>
        </nav>
        <div class="header-contact">
            <a href="tel:0883520600" class="phone-link">
            <span class="phone-icon">📞</span>
            <span>088 – 35 20 600</span>
        </a>
        </div>  
    </div>
</header>