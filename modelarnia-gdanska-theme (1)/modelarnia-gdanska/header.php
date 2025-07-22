<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Preload critical resources -->
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/css/theme.css" as="style">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/assets/js/theme.js" as="script">

    <!-- DNS prefetch -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Meta tags for SEO -->
    <meta name="robots" content="index, follow">
    <meta name="author" content="Modelarnia Gdańska">

    <?php if (is_front_page()) : ?>
        <meta name="description" content="Profesjonalny druk 3D w Gdańsku. Modelowanie, prototypowanie i druk 3D wysokiej jakości. Skontaktuj się z nami już dziś!">
        <meta property="og:title" content="Modelarnia Gdańska - Profesjonalny druk 3D">
        <meta property="og:description" content="Specjalizujemy się w profesjonalnym druku 3D i modelowaniu. Wysokiej jakości usługi w konkurencyjnych cenach.">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo home_url(); ?>">
        <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og-image.jpg">
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <a href="#main" class="skip-link">Przejdź do treści głównej</a>

    <?php wp_body_open(); ?>

    <!-- Theme toggle button -->
    <button class="theme-toggle no-print" aria-label="Przełącz tryb ciemny/jasny" id="theme-toggle">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
        </svg>
        <span class="sr-only">Przełącz motyw</span>
    </button>

    <header class="site-header" role="banner">
        <div class="container">
            <div class="header-content">

                <!-- Logo -->
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <div class="custom-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <h1 class="site-title">
                            <a href="<?php echo home_url(); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <?php 
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) : ?>
                            <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <!-- Navigation -->
                <nav class="main-navigation" role="navigation" aria-label="Menu główne">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="hamburger"></span>
                        <span class="hamburger"></span>
                        <span class="hamburger"></span>
                        <span class="sr-only">Menu</span>
                    </button>

                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>

            </div>
        </div>
    </header>