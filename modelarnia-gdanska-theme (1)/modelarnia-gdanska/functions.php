<?php
/**
 * Functions and definitions
 * 
 * @package ModelarniaGdanska
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function modelarnia_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'modelarnia-gdanska'),
        'footer' => __('Footer Menu', 'modelarnia-gdanska'),
    ));
}
add_action('after_setup_theme', 'modelarnia_setup');

/**
 * Enqueue scripts and styles
 */
function modelarnia_scripts() {
    // Main stylesheet
    wp_enqueue_style('modelarnia-style', get_stylesheet_uri(), array(), '1.0.0');

    // Theme CSS
    wp_enqueue_style('modelarnia-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), '1.0.0');

    // Theme JavaScript
    wp_enqueue_script('modelarnia-theme', get_template_directory_uri() . '/assets/js/theme.js', array(), '1.0.0', true);

    // Localize script for AJAX
    wp_localize_script('modelarnia-theme', 'modelarnia_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('modelarnia_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'modelarnia_scripts');

/**
 * Security headers
 */
function modelarnia_security_headers() {
    // HSTS
    header('Strict-Transport-Security: max-age=63072000; includeSubDomains; preload');

    // Content Security Policy
    $csp = "default-src 'self'; ";
    $csp .= "script-src 'self' 'unsafe-inline' https://www.google.com https://www.gstatic.com; ";
    $csp .= "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; ";
    $csp .= "font-src 'self' https://fonts.gstatic.com; ";
    $csp .= "img-src 'self' data: https:; ";
    $csp .= "frame-src 'self' https://www.google.com; ";
    $csp .= "connect-src 'self' https:; ";
    $csp .= "object-src 'none'; ";
    $csp .= "base-uri 'self'; ";
    $csp .= "form-action 'self'; ";
    $csp .= "frame-ancestors 'none';";

    header("Content-Security-Policy: " . $csp);

    // Other security headers
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: DENY');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=()');

    // Remove WordPress version
    remove_action('wp_head', 'wp_generator');
}
add_action('send_headers', 'modelarnia_security_headers');

/**
 * Hide WordPress version
 */
function modelarnia_remove_version() {
    return '';
}
add_filter('the_generator', 'modelarnia_remove_version');

/**
 * ACF Pro fields setup
 */
function modelarnia_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {

        // Homepage flexible content
        acf_add_local_field_group(array(
            'key' => 'group_homepage_sections',
            'title' => 'Sekcje strony głównej',
            'fields' => array(
                array(
                    'key' => 'field_homepage_sections',
                    'label' => 'Sekcje',
                    'name' => 'homepage_sections',
                    'type' => 'flexible_content',
                    'layouts' => array(
                        // Hero Section
                        'hero_banner' => array(
                            'key' => 'layout_hero',
                            'name' => 'hero_banner',
                            'label' => 'Sekcja Hero',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_hero_title',
                                    'label' => 'Tytuł główny',
                                    'name' => 'hero_title',
                                    'type' => 'text',
                                    'required' => 1,
                                ),
                                array(
                                    'key' => 'field_hero_subtitle',
                                    'label' => 'Podtytuł',
                                    'name' => 'hero_subtitle',
                                    'type' => 'textarea',
                                ),
                                array(
                                    'key' => 'field_hero_cta_text',
                                    'label' => 'Tekst przycisku CTA',
                                    'name' => 'hero_cta_text',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_hero_cta_link',
                                    'label' => 'Link CTA',
                                    'name' => 'hero_cta_link',
                                    'type' => 'url',
                                ),
                                array(
                                    'key' => 'field_hero_background',
                                    'label' => 'Obrazek tła',
                                    'name' => 'hero_background',
                                    'type' => 'image',
                                ),
                            ),
                        ),

                        // About Section
                        'about_section' => array(
                            'key' => 'layout_about',
                            'name' => 'about_section',
                            'label' => 'Sekcja O nas',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_about_title',
                                    'label' => 'Tytuł',
                                    'name' => 'about_title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_about_content',
                                    'label' => 'Treść',
                                    'name' => 'about_content',
                                    'type' => 'wysiwyg',
                                ),
                                array(
                                    'key' => 'field_about_image',
                                    'label' => 'Zdjęcie',
                                    'name' => 'about_image',
                                    'type' => 'image',
                                ),
                            ),
                        ),

                        // Services Grid
                        'services_grid' => array(
                            'key' => 'layout_services',
                            'name' => 'services_grid',
                            'label' => 'Siatka usług',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_services_title',
                                    'label' => 'Tytuł sekcji',
                                    'name' => 'services_title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_services_items',
                                    'label' => 'Usługi',
                                    'name' => 'services_items',
                                    'type' => 'repeater',
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'field_service_title',
                                            'label' => 'Nazwa usługi',
                                            'name' => 'service_title',
                                            'type' => 'text',
                                        ),
                                        array(
                                            'key' => 'field_service_description',
                                            'label' => 'Opis',
                                            'name' => 'service_description',
                                            'type' => 'textarea',
                                        ),
                                        array(
                                            'key' => 'field_service_icon',
                                            'label' => 'Ikona',
                                            'name' => 'service_icon',
                                            'type' => 'text',
                                            'instructions' => 'Nazwa ikony z biblioteki Lucide',
                                        ),
                                        array(
                                            'key' => 'field_service_price',
                                            'label' => 'Cena od',
                                            'name' => 'service_price',
                                            'type' => 'text',
                                        ),
                                    ),
                                ),
                            ),
                        ),

                        // FAQ Section  
                        'faq_section' => array(
                            'key' => 'layout_faq',
                            'name' => 'faq_section',
                            'label' => 'Sekcja FAQ',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_faq_title',
                                    'label' => 'Tytuł',
                                    'name' => 'faq_title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_faq_items',
                                    'label' => 'Pytania i odpowiedzi',
                                    'name' => 'faq_items',
                                    'type' => 'repeater',
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'field_faq_question',
                                            'label' => 'Pytanie',
                                            'name' => 'faq_question',
                                            'type' => 'text',
                                        ),
                                        array(
                                            'key' => 'field_faq_answer',
                                            'label' => 'Odpowiedź',
                                            'name' => 'faq_answer',
                                            'type' => 'wysiwyg',
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'front-page.php',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'modelarnia_acf_fields');

/**
 * Gravity Forms customization
 */
function modelarnia_gform_file_upload_path($path_info, $form_id) {
    // Custom path for 3D files
    $path_info['path'] = '/uploads/3d-files/' . date('Y/m/');
    $path_info['url'] = home_url('/wp-content/uploads/3d-files/' . date('Y/m/'));

    return $path_info;
}
add_filter('gform_upload_path', 'modelarnia_gform_file_upload_path', 10, 2);

/**
 * File upload validation for 3D files
 */
function modelarnia_validate_3d_files($result, $value, $form, $field) {
    if ($field->type == 'fileupload') {
        $allowed_extensions = array('stl', 'obj', 'zip', 'rar', '3ds', 'fbx');
        $uploaded_files = json_decode($value);

        if ($uploaded_files) {
            foreach ($uploaded_files as $file) {
                $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                if (!in_array($file_extension, $allowed_extensions)) {
                    $result['is_valid'] = false;
                    $result['message'] = 'Dozwolone formaty plików: STL, OBJ, ZIP, RAR, 3DS, FBX';
                    break;
                }

                // Check file size (max 100MB)
                $file_path = GFFormsModel::get_upload_root() . GFFormsModel::get_upload_path($form['id']) . '/' . $file;
                if (file_exists($file_path) && filesize($file_path) > 100 * 1024 * 1024) {
                    $result['is_valid'] = false;
                    $result['message'] = 'Maksymalny rozmiar pliku: 100MB';
                    break;
                }
            }
        }
    }

    return $result;
}
add_filter('gform_field_validation', 'modelarnia_validate_3d_files', 10, 4);

/**
 * Custom excerpt length
 */
function modelarnia_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'modelarnia_excerpt_length');

/**
 * GDPR compliance - cookies notice
 */
function modelarnia_cookies_notice() {
    if (!isset($_COOKIE['cookies_accepted'])) {
        echo '<div id="cookies-notice" class="cookies-notice" role="alert">';
        echo '<div class="container">';
        echo '<p>Ta strona używa plików cookies aby zapewnić najlepsze doświadczenia. ';
        echo '<a href="' . home_url('/privacy-policy/') . '">Dowiedz się więcej</a></p>';
        echo '<button onclick="acceptCookies()" class="btn btn-primary">Akceptuję</button>';
        echo '</div>';
        echo '</div>';
    }
}
add_action('wp_footer', 'modelarnia_cookies_notice');

/**
 * Schema.org structured data
 */
function modelarnia_structured_data() {
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        'name' => 'Modelarnia Gdańska',
        'description' => 'Profesjonalny druk 3D i modelowanie w Gdańsku',
        'url' => home_url(),
        'telephone' => '+48 XXX XXX XXX',
        'address' => array(
            '@type' => 'PostalAddress',
            'addressLocality' => 'Gdańsk',
            'addressCountry' => 'PL'
        ),
        'priceRange' => '$$',
        'openingHours' => 'Mo-Fr 09:00-17:00'
    );

    echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';
}
add_action('wp_head', 'modelarnia_structured_data');

/**
 * Customizer options
 */
function modelarnia_customize_register($wp_customize) {
    // Contact section
    $wp_customize->add_section('modelarnia_contact', array(
        'title' => 'Dane kontaktowe',
        'priority' => 30,
    ));

    // Phone number
    $wp_customize->add_setting('phone_number');
    $wp_customize->add_control('phone_number', array(
        'label' => 'Numer telefonu',
        'section' => 'modelarnia_contact',
        'type' => 'text',
    ));

    // Email
    $wp_customize->add_setting('email_address');
    $wp_customize->add_control('email_address', array(
        'label' => 'Adres email',
        'section' => 'modelarnia_contact',
        'type' => 'email',
    ));

    // Address
    $wp_customize->add_setting('business_address');
    $wp_customize->add_control('business_address', array(
        'label' => 'Adres firmy',
        'section' => 'modelarnia_contact',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'modelarnia_customize_register');

/**
 * Breadcrumbs function
 */
function modelarnia_breadcrumbs() {
    if (!is_front_page()) {
        echo '<nav aria-label="breadcrumb" class="breadcrumbs">';
        echo '<a href="' . home_url() . '">Strona główna</a>';

        if (is_page()) {
            echo ' » <span aria-current="page">' . get_the_title() . '</span>';
        }

        echo '</nav>';
    }
}

/**
 * Performance optimizations
 */
// Remove emoji scripts
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove unnecessary WordPress features
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

// Defer non-critical CSS
function modelarnia_defer_css($html, $handle) {
    if ('modelarnia-theme' === $handle) {
        $html = str_replace("rel='stylesheet'", "rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'"", $html);
    }
    return $html;
}
add_filter('style_loader_tag', 'modelarnia_defer_css', 10, 2);
?>