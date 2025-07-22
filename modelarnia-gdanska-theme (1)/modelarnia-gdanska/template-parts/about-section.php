<?php
/**
 * About Section Template Part
 */

$about_title = get_sub_field('about_title') ?: 'O Modelarni Gdańskiej';
$about_content = get_sub_field('about_content');
$about_image = get_sub_field('about_image');
?>

<section id="about" class="about-section py-16">
    <div class="container">
        <div class="grid grid-2">

            <div class="about-content">
                <h2 class="section-title">
                    <?php echo esc_html($about_title); ?>
                </h2>

                <?php if ($about_content) : ?>
                    <div class="about-text">
                        <?php echo wp_kses_post($about_content); ?>
                    </div>
                <?php else : ?>
                    <div class="about-text">
                        <p>
                            Jesteśmy zespołem pasjonatów technologii 3D z wieloletnim doświadczeniem w branży. 
                            Specjalizujemy się w profesjonalnym druku 3D, modelowaniu oraz prototypowaniu 
                            dla klientów indywidualnych i biznesowych.
                        </p>
                        <p>
                            Nasza misja to dostarczanie najwyższej jakości usług w dziedzinie druku 3D, 
                            pomagając naszym klientom wcielać w życie ich pomysły i projekty.
                        </p>
                    </div>
                <?php endif; ?>

                <div class="about-stats">
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Zrealizowanych projektów</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">5</span>
                        <span class="stat-label">Lat doświadczenia</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">24h</span>
                        <span class="stat-label">Średni czas realizacji</span>
                    </div>
                </div>

                <a href="<?php echo home_url('/about/'); ?>" class="btn btn-primary">
                    Dowiedz się więcej
                </a>
            </div>

            <div class="about-image">
                <?php if ($about_image) : ?>
                    <img src="<?php echo esc_url($about_image['url']); ?>" 
                         alt="<?php echo esc_attr($about_image['alt'] ?: $about_title); ?>"
                         loading="lazy">
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-placeholder.jpg" 
                         alt="<?php echo esc_attr($about_title); ?>"
                         loading="lazy">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>