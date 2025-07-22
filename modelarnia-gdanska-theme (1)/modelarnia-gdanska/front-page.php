<?php
/**
 * Front page template
 *
 * @package ModelarniaGdanska  
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="main-content" role="main">

    <?php if (function_exists('get_field') && have_rows('homepage_sections')) : ?>

        <?php while (have_rows('homepage_sections')) : the_row(); ?>

            <?php
            $layout = get_row_layout();

            switch ($layout) :
                case 'hero_banner':
                    get_template_part('template-parts/hero-section');
                    break;

                case 'about_section':  
                    get_template_part('template-parts/about-section');
                    break;

                case 'services_grid':
                    get_template_part('template-parts/services-section');
                    break;

                case 'faq_section':
                    get_template_part('template-parts/faq-section');
                    break;

            endswitch;
            ?>

        <?php endwhile; ?>

    <?php else : ?>

        <!-- Default content if ACF is not available -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content text-center">
                    <h1>Modelarnia Gdańska</h1>
                    <p>Profesjonalny druk 3D i modelowanie</p>
                    <a href="#contact" class="btn btn-primary">Skontaktuj się z nami</a>
                </div>
            </div>
        </section>

        <section class="about-section py-16">
            <div class="container">
                <div class="grid grid-2">
                    <div class="about-content">
                        <h2>O nas</h2>
                        <p>Specjalizujemy się w profesjonalnym druku 3D i modelowaniu dla klientów indywidualnych i biznesowych.</p>
                    </div>
                    <div class="about-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about.jpg" alt="O nas" loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <section class="services-section py-16">
            <div class="container">
                <h2 class="text-center mb-8">Nasze usługi</h2>
                <div class="grid grid-3">
                    <div class="service-card">
                        <h3>Druk 3D</h3>
                        <p>Wysokiej jakości druk 3D w różnych materiałach.</p>
                    </div>
                    <div class="service-card">
                        <h3>Modelowanie</h3>
                        <p>Profesjonalne modelowanie 3D od podstaw.</p>
                    </div>
                    <div class="service-card">
                        <h3>Prototypowanie</h3>
                        <p>Szybkie prototypowanie produktów i komponentów.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact-section py-16">
            <div class="container">
                <h2 class="text-center mb-8">Kontakt</h2>
                <div class="grid grid-2">
                    <div class="contact-info">
                        <h3>Skontaktuj się z nami</h3>
                        <p>Tel: <?php echo get_theme_mod('phone_number', '+48 XXX XXX XXX'); ?></p>
                        <p>Email: <?php echo get_theme_mod('email_address', 'kontakt@modelarnia-gdanska.pl'); ?></p>
                        <p>Adres: <?php echo get_theme_mod('business_address', 'Gdańsk, Polska'); ?></p>
                    </div>
                    <div class="contact-form">
                        <!-- Gravity Form will be inserted here -->
                        <?php if (function_exists('gravity_form')) {
                            gravity_form(1, false, false);
                        } ?>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

</main>

<?php get_footer(); ?>