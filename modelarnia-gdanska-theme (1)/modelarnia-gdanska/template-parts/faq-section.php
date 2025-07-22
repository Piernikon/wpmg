<?php
/**
 * FAQ Section Template Part
 */

$faq_title = get_sub_field('faq_title') ?: 'Często zadawane pytania';
$faq_items = get_sub_field('faq_items');
?>

<section id="faq" class="faq-section py-16">
    <div class="container">

        <div class="section-header text-center mb-8">
            <h2 class="section-title">
                <?php echo esc_html($faq_title); ?>
            </h2>
            <p class="section-subtitle">
                Odpowiedzi na najczęściej zadawane pytania o nasze usługi
            </p>
        </div>

        <div class="faq-content">
            <div class="accordion" role="tablist">

                <?php if ($faq_items) : ?>
                    <?php foreach ($faq_items as $index => $faq) : ?>
                        <div class="accordion-item">
                            <button class="accordion-button" 
                                    role="tab"
                                    aria-expanded="false" 
                                    aria-controls="faq-content-<?php echo $index; ?>"
                                    id="faq-button-<?php echo $index; ?>">
                                <span><?php echo esc_html($faq['faq_question']); ?></span>
                                <svg class="accordion-icon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M6 9l6 6 6-6"/>
                                </svg>
                            </button>

                            <div class="accordion-content" 
                                 role="tabpanel"
                                 aria-labelledby="faq-button-<?php echo $index; ?>"
                                 id="faq-content-<?php echo $index; ?>">
                                <?php echo wp_kses_post($faq['faq_answer']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?php else : ?>

                    <!-- Default FAQ items -->
                    <div class="accordion-item">
                        <button class="accordion-button" role="tab" aria-expanded="false" aria-controls="faq-content-1" id="faq-button-1">
                            <span>Jakie materiały używacie do druku 3D?</span>
                            <svg class="accordion-icon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="accordion-content" role="tabpanel" aria-labelledby="faq-button-1" id="faq-content-1">
                            <p>Używamy szerokiej gamy materiałów w tym: PLA, ABS, PETG, TPU, oraz materiały specjalistyczne jak drewno, metal, czy kompozyty węglowe. Dostępne są różne kolory i wykończenia.</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-button" role="tab" aria-expanded="false" aria-controls="faq-content-2" id="faq-button-2">
                            <span>Ile kosztuje druk 3D?</span>
                            <svg class="accordion-icon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="accordion-content" role="tabpanel" aria-labelledby="faq-button-2" id="faq-content-2">
                            <p>Cena zależy od wielkości modelu, materiału i złożoności. Podstawowe materiały to 2-3 zł za gram, specjalistyczne 5-10 zł za gram. Przygotowujemy darmową wycenę dla każdego projektu.</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-button" role="tab" aria-expanded="false" aria-controls="faq-content-3" id="faq-button-3">
                            <span>Jak długo trwa realizacja zamówienia?</span>
                            <svg class="accordion-icon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="accordion-content" role="tabpanel" aria-labelledby="faq-button-3" id="faq-content-3">
                            <p>Standardowy czas realizacji to 24-72 godziny w zależności od wielkości i złożoności modelu. W przypadku dużych zamówień może to potrwać do tygodnia. Oferujemy również ekspresową realizację w 12 godzin.</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-button" role="tab" aria-expanded="false" aria-controls="faq-content-4" id="faq-button-4">
                            <span>Jakie formaty plików przyjmujecie?</span>
                            <svg class="accordion-icon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="accordion-content" role="tabpanel" aria-labelledby="faq-button-4" id="faq-content-4">
                            <p>Przyjmujemy pliki w formatach: STL, OBJ, 3MF, PLY. Pliki mogą być przesłane w archiwach ZIP lub RAR. Maksymalny rozmiar pliku to 100MB.</p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <button class="accordion-button" role="tab" aria-expanded="false" aria-controls="faq-content-5" id="faq-button-5">
                            <span>Czy oferujecie modelowanie 3D?</span>
                            <svg class="accordion-icon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>
                        <div class="accordion-content" role="tabpanel" aria-labelledby="faq-button-5" id="faq-content-5">
                            <p>Tak! Oferujemy profesjonalne modelowanie 3D od podstaw. Możemy stworzyć model na podstawie Twojego szkicu, zdjęcia, opisu lub pomysłu. Koszt zależy od złożoności i wynosi od 50 zł za godzinę pracy.</p>
                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>

        <div class="faq-footer text-center mt-8">
            <p>Nie znalazłeś odpowiedzi na swoje pytanie?</p>
            <a href="#contact" class="btn btn-primary">Skontaktuj się z nami</a>
        </div>

    </div>
</section>