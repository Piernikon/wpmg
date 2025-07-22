<?php
/**
 * Services Section Template Part  
 */

$services_title = get_sub_field('services_title') ?: 'Nasze usługi';
$services_items = get_sub_field('services_items');
?>

<section id="services" class="services-section py-16">
    <div class="container">

        <div class="section-header text-center mb-8">
            <h2 class="section-title">
                <?php echo esc_html($services_title); ?>
            </h2>
            <p class="section-subtitle">
                Oferujemy kompleksowe usługi w dziedzinie druku 3D i modelowania
            </p>
        </div>

        <div class="services-grid grid grid-3">

            <?php if ($services_items) : ?>
                <?php foreach ($services_items as $service) : ?>
                    <div class="service-card">

                        <div class="service-icon">
                            <?php 
                            $icon = $service['service_icon'] ?: 'box';
                            echo '<svg class="lucide-' . esc_attr($icon) . '" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2">';

                            // Simple icon mapping
                            switch ($icon) {
                                case 'printer':
                                    echo '<path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"/>';
                                    echo '<rect x="6" y="14" width="12" height="8"/>';
                                    echo '<path d="M6 14h12"/>';
                                    break;
                                case 'box':
                                default:
                                    echo '<rect x="3" y="3" width="18" height="18" rx="2"/>';
                                    echo '<path d="M9 9h6v6H9z"/>';
                                    break;
                            }

                            echo '</svg>';
                            ?>
                        </div>

                        <h3 class="service-title">
                            <?php echo esc_html($service['service_title']); ?>
                        </h3>

                        <p class="service-description">
                            <?php echo esc_html($service['service_description']); ?>
                        </p>

                        <?php if (!empty($service['service_price'])) : ?>
                            <div class="service-price">
                                <span class="price-label">Od:</span>
                                <span class="price-value"><?php echo esc_html($service['service_price']); ?></span>
                            </div>
                        <?php endif; ?>

                        <a href="#contact" class="btn btn-primary btn-sm">
                            Zamów usługę
                        </a>

                    </div>
                <?php endforeach; ?>

            <?php else : ?>

                <!-- Default services -->
                <div class="service-card">
                    <div class="service-icon">
                        <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="6" y="4" width="4" height="16"/>
                            <rect x="14" y="4" width="4" height="16"/>
                            <path d="M6 2v2M14 2v2"/>
                        </svg>
                    </div>
                    <h3>Druk 3D FDM</h3>
                    <p>Wysokiej jakości druk 3D w technologii FDM. Szeroki wybór materiałów i kolorów.</p>
                    <div class="service-price">
                        <span class="price-label">Od:</span>
                        <span class="price-value">2 zł/g</span>
                    </div>
                    <a href="#contact" class="btn btn-primary btn-sm">Zamów usługę</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 3V21M9 6h6M9 10h6M9 14h6M9 18h6"/>
                        </svg>
                    </div>
                    <h3>Druk 3D SLA</h3>
                    <p>Precyzyjny druk 3D w technologii SLA. Idealne dla detali i małych elementów.</p>
                    <div class="service-price">
                        <span class="price-label">Od:</span>
                        <span class="price-value">5 zł/g</span>
                    </div>
                    <a href="#contact" class="btn btn-primary btn-sm">Zamów usługę</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <h3>Modelowanie 3D</h3>
                    <p>Profesjonalne modelowanie 3D od podstaw. Tworzenie modeli na bazie szkiców lub opisów.</p>
                    <div class="service-price">
                        <span class="price-label">Od:</span>
                        <span class="price-value">50 zł/h</span>
                    </div>
                    <a href="#contact" class="btn btn-primary btn-sm">Zamów usługę</a>
                </div>

            <?php endif; ?>

        </div>

        <div class="services-footer text-center mt-8">
            <p>Nie widzisz usługi której szukasz?</p>
            <a href="#contact" class="btn btn-secondary">Skontaktuj się z nami</a>
        </div>

    </div>
</section>