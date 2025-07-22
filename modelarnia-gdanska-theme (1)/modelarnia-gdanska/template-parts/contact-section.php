<?php
/**
 * Contact Section Template Part
 */
?>

<section id="contact" class="contact-section py-16">
    <div class="container">

        <div class="section-header text-center mb-8">
            <h2 class="section-title">Skontaktuj się z nami</h2>
            <p class="section-subtitle">
                Wyślij nam swój projekt, a my przygotujemy darmową wycenę
            </p>
        </div>

        <div class="contact-content grid grid-2">

            <!-- Contact Info -->
            <div class="contact-info">
                <h3>Dane kontaktowe</h3>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <strong>Telefon</strong>
                        <p>
                            <a href="tel:<?php echo str_replace(' ', '', get_theme_mod('phone_number', '+48XXXXXXXXX')); ?>">
                                <?php echo get_theme_mod('phone_number', '+48 XXX XXX XXX'); ?>
                            </a>
                        </p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <strong>Email</strong>
                        <p>
                            <a href="mailto:<?php echo get_theme_mod('email_address', 'kontakt@modelarnia-gdanska.pl'); ?>">
                                <?php echo get_theme_mod('email_address', 'kontakt@modelarnia-gdanska.pl'); ?>
                            </a>
                        </p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <div class="contact-details">
                        <strong>Adres</strong>
                        <p><?php echo get_theme_mod('business_address', 'Gdańsk, Polska'); ?></p>
                    </div>
                </div>

                <div class="contact-hours">
                    <h4>Godziny pracy</h4>
                    <div class="hours-list">
                        <div class="hours-item">
                            <span>Poniedziałek - Piątek</span>
                            <span>9:00 - 17:00</span>
                        </div>
                        <div class="hours-item">
                            <span>Sobota</span>
                            <span>10:00 - 14:00</span>
                        </div>
                        <div class="hours-item">
                            <span>Niedziela</span>
                            <span>Zamknięte</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <?php if (function_exists('gravity_form')) : ?>
                    <?php gravity_form(1, false, false, false, '', true); ?>
                <?php else : ?>
                    <!-- Fallback form if Gravity Forms is not active -->
                    <form class="contact-form-fallback" method="post" enctype="multipart/form-data">
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_name" class="form-label">
                                    Imię i nazwisko *
                                </label>
                                <input type="text" 
                                       id="contact_name" 
                                       name="contact_name" 
                                       class="form-input" 
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="contact_email" class="form-label">
                                    Adres email *
                                </label>
                                <input type="email" 
                                       id="contact_email" 
                                       name="contact_email" 
                                       class="form-input" 
                                       required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact_phone" class="form-label">
                                Numer telefonu
                            </label>
                            <input type="tel" 
                                   id="contact_phone" 
                                   name="contact_phone" 
                                   class="form-input">
                        </div>

                        <div class="form-group">
                            <label for="contact_subject" class="form-label">
                                Temat *
                            </label>
                            <select id="contact_subject" name="contact_subject" class="form-select" required>
                                <option value="">Wybierz temat</option>
                                <option value="druk-3d">Druk 3D</option>
                                <option value="modelowanie">Modelowanie 3D</option>
                                <option value="prototypowanie">Prototypowanie</option>
                                <option value="wycena">Wycena projektu</option>
                                <option value="inne">Inne</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="contact_message" class="form-label">
                                Opis projektu *
                            </label>
                            <textarea id="contact_message" 
                                      name="contact_message" 
                                      class="form-textarea" 
                                      rows="5" 
                                      required
                                      placeholder="Opisz swój projekt, wymagania, preferencje dotyczące materiału itp."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="contact_files" class="form-label">
                                Pliki 3D (STL, OBJ, ZIP)
                            </label>
                            <div class="file-upload" id="file-upload-area">
                                <input type="file" 
                                       id="contact_files" 
                                       name="contact_files[]" 
                                       class="file-input" 
                                       multiple 
                                       accept=".stl,.obj,.zip,.rar,.3ds">
                                <div class="file-upload-content">
                                    <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                                        <polyline points="14,2 14,8 20,8"/>
                                        <line x1="16" y1="13" x2="8" y2="13"/>
                                        <line x1="16" y1="17" x2="8" y2="17"/>
                                        <polyline points="10,9 9,9 8,9"/>
                                    </svg>
                                    <p><strong>Przeciągnij pliki tutaj</strong> lub kliknij aby wybrać</p>
                                    <p class="file-help">Obsługiwane formaty: STL, OBJ, ZIP, RAR, 3DS (max. 100MB)</p>
                                </div>
                            </div>
                            <div id="file-list"></div>
                        </div>

                        <div class="form-group">
                            <label class="form-checkbox">
                                <input type="checkbox" name="contact_privacy" required>
                                <span class="checkmark"></span>
                                Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z 
                                <a href="<?php echo home_url('/privacy-policy/'); ?>" target="_blank">
                                    polityką prywatności
                                </a> *
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg" name="submit_contact_form">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 2L11 13"/>
                                <polygon points="22,2 15,22 11,13 2,9"/>
                            </svg>
                            Wyślij zapytanie
                        </button>
                    </form>
                <?php endif; ?>
            </div>

        </div>

    </div>
</section>