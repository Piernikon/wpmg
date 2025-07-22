    <footer class="site-footer" role="contentinfo">
        <div class="container">
            <div class="footer-content">

                <div class="footer-section">
                    <h3>Modelarnia Gdańska</h3>
                    <p>Profesjonalny druk 3D i modelowanie w Gdańsku. Wysokiej jakości usługi w konkurencyjnych cenach.</p>
                </div>

                <div class="footer-section">
                    <h3>Kontakt</h3>
                    <div class="contact-info">
                        <p>
                            <strong>Telefon:</strong> 
                            <a href="tel:<?php echo str_replace(' ', '', get_theme_mod('phone_number', '+48XXXXXXXXX')); ?>">
                                <?php echo get_theme_mod('phone_number', '+48 XXX XXX XXX'); ?>
                            </a>
                        </p>
                        <p>
                            <strong>Email:</strong> 
                            <a href="mailto:<?php echo get_theme_mod('email_address', 'kontakt@modelarnia-gdanska.pl'); ?>">
                                <?php echo get_theme_mod('email_address', 'kontakt@modelarnia-gdanska.pl'); ?>
                            </a>
                        </p>
                        <p>
                            <strong>Adres:</strong> 
                            <?php echo get_theme_mod('business_address', 'Gdańsk, Polska'); ?>
                        </p>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Usługi</h3>
                    <ul class="footer-menu">
                        <li><a href="<?php echo home_url('/druk-3d/'); ?>">Druk 3D</a></li>
                        <li><a href="<?php echo home_url('/modelowanie/'); ?>">Modelowanie 3D</a></li>
                        <li><a href="<?php echo home_url('/prototypowanie/'); ?>">Prototypowanie</a></li>
                        <li><a href="<?php echo home_url('/skanowanie-3d/'); ?>">Skanowanie 3D</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Informacje</h3>
                    <ul class="footer-menu">
                        <li><a href="<?php echo home_url('/about/'); ?>">O nas</a></li>
                        <li><a href="<?php echo home_url('/portfolio/'); ?>">Portfolio</a></li>
                        <li><a href="<?php echo home_url('/contact/'); ?>">Kontakt</a></li>
                        <li><a href="<?php echo home_url('/privacy-policy/'); ?>">Polityka prywatności</a></li>
                        <li><a href="<?php echo home_url('/terms/'); ?>">Regulamin</a></li>
                    </ul>
                </div>

            </div>

            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="copyright">
                        &copy; <?php echo date('Y'); ?> Modelarnia Gdańska. 
                        Wszelkie prawa zastrzeżone.
                    </p>

                    <div class="footer-social">
                        <!-- Social media links can be added here -->
                    </div>

                    <p class="powered-by">
                        Napędzane przez <a href="https://wordpress.org" target="_blank" rel="noopener">WordPress</a>
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <!-- Cookie notice -->
    <?php if (!isset($_COOKIE['cookies_accepted'])) : ?>
        <div id="cookies-notice" class="cookies-notice" role="alert" aria-live="polite">
            <div class="container">
                <div class="cookies-content">
                    <p>
                        Ta strona używa plików cookies aby zapewnić najlepsze doświadczenia użytkownika. 
                        Kontynuując korzystanie ze strony wyrażasz zgodę na ich użycie.
                        <a href="<?php echo home_url('/privacy-policy/'); ?>" class="cookies-link">
                            Dowiedz się więcej
                        </a>
                    </p>
                    <div class="cookies-actions">
                        <button onclick="acceptCookies()" class="btn btn-primary btn-sm">
                            Akceptuję
                        </button>
                        <button onclick="declineCookies()" class="btn btn-secondary btn-sm">
                            Odrzuć
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php wp_footer(); ?>

    <!-- Critical inline script for theme toggle -->
    <script>
        // Prevent flash of incorrect theme
        (function() {
            const theme = localStorage.getItem('theme') || 
                          (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

</body>
</html>