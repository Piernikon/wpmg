<?php
/**
 * Hero Section Template Part
 */

$hero_title = get_sub_field('hero_title') ?: 'Modelarnia Gdańska';
$hero_subtitle = get_sub_field('hero_subtitle') ?: 'Profesjonalny druk 3D i modelowanie w Gdańsku';
$hero_cta_text = get_sub_field('hero_cta_text') ?: 'Sprawdź nasze usługi';
$hero_cta_link = get_sub_field('hero_cta_link') ?: '#services';
$hero_background = get_sub_field('hero_background');
?>

<section class="hero-section" 
    <?php if ($hero_background) : ?>
        style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo esc_url($hero_background['url']); ?>');"
    <?php endif; ?>>

    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <?php echo esc_html($hero_title); ?>
            </h1>

            <?php if ($hero_subtitle) : ?>
                <p class="hero-subtitle">
                    <?php echo esc_html($hero_subtitle); ?>
                </p>
            <?php endif; ?>

            <div class="hero-actions">
                <a href="<?php echo esc_url($hero_cta_link); ?>" class="btn btn-primary btn-lg">
                    <?php echo esc_html($hero_cta_text); ?>
                </a>
                <a href="#contact" class="btn btn-secondary btn-lg">
                    Skontaktuj się
                </a>
            </div>

            <!-- Hero features -->
            <div class="hero-features">
                <div class="hero-feature">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L13.09 8.26L19 9L13.09 9.74L12 16L10.91 9.74L5 9L10.91 8.26L12 2Z"/>
                    </svg>
                    <span>Najwyższa jakość</span>
                </div>
                <div class="hero-feature">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M16.2 7.8L18.4 10L8 20.4L5.8 18.2L16.2 7.8Z"/>
                    </svg>
                    <span>Szybka realizacja</span>
                </div>
                <div class="hero-feature">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 1L3 5V11C3 16.55 6.84 21.74 12 23C17.16 21.74 21 16.55 21 11V5L12 1ZM10 17L6 13L7.41 11.59L10 14.17L16.59 7.58L18 9L10 17Z"/>
                    </svg>
                    <span>Gwarancja jakości</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="scroll-indicator">
        <button onclick="scrollToSection('#about')" aria-label="Przewiń w dół">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M7 13L12 18L17 13"/>
                <path d="M7 6L12 11L17 6"/>
            </svg>
        </button>
    </div>

</section>