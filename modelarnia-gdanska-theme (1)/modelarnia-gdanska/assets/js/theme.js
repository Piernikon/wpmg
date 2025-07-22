/**
 * Main Theme JavaScript - Modelarnia Gdańska
 * Features: Dark mode, Accordions, File upload, Mobile menu, Accessibility
 */

document.addEventListener('DOMContentLoaded', function() {

    // ============================================
    // DARK MODE FUNCTIONALITY
    // ============================================

    const themeToggle = document.getElementById('theme-toggle');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');

    // Get initial theme
    function getTheme() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            return savedTheme;
        }
        return prefersDark.matches ? 'dark' : 'light';
    }

    // Set theme
    function setTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);

        // Update toggle icon
        if (themeToggle) {
            const icon = themeToggle.querySelector('svg');
            if (theme === 'dark') {
                icon.innerHTML = `
                    <circle cx="12" cy="12" r="4"></circle>
                    <path d="M12 2v2"></path>
                    <path d="M12 20v2"></path>
                    <path d="M4.93 4.93l1.41 1.41"></path>
                    <path d="M17.66 17.66l1.41 1.41"></path>
                    <path d="M2 12h2"></path>
                    <path d="M20 12h2"></path>
                    <path d="M6.34 17.66l-1.41 1.41"></path>
                    <path d="M19.07 4.93l-1.41 1.41"></path>
                `;
            } else {
                icon.innerHTML = `
                    <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                `;
            }
        }
    }

    // Initialize theme
    setTheme(getTheme());

    // Theme toggle event
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            setTheme(newTheme);
        });
    }

    // Listen for system theme changes
    prefersDark.addEventListener('change', function() {
        if (!localStorage.getItem('theme')) {
            setTheme(prefersDark.matches ? 'dark' : 'light');
        }
    });

    // ============================================
    // MOBILE MENU
    // ============================================

    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';

            menuToggle.setAttribute('aria-expanded', !isExpanded);
            navMenu.classList.toggle('active');

            // Animate hamburger
            const hamburgers = menuToggle.querySelectorAll('.hamburger');
            hamburgers.forEach((line, index) => {
                if (navMenu.classList.contains('active')) {
                    if (index === 0) line.style.transform = 'rotate(45deg) translate(8px, 8px)';
                    if (index === 1) line.style.opacity = '0';
                    if (index === 2) line.style.transform = 'rotate(-45deg) translate(8px, -8px)';
                } else {
                    if (index === 0) line.style.transform = 'none';
                    if (index === 1) line.style.opacity = '1';
                    if (index === 2) line.style.transform = 'none';
                }
            });
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!menuToggle.contains(e.target) && !navMenu.contains(e.target)) {
                navMenu.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');

                const hamburgers = menuToggle.querySelectorAll('.hamburger');
                hamburgers.forEach(line => {
                    line.style.transform = 'none';
                    line.style.opacity = '1';
                });
            }
        });
    }

    // ============================================
    // ACCORDION FAQ
    // ============================================

    const accordionButtons = document.querySelectorAll('.accordion-button');

    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            const content = document.getElementById(this.getAttribute('aria-controls'));

            // Close all other accordions
            accordionButtons.forEach(otherButton => {
                if (otherButton !== this) {
                    otherButton.setAttribute('aria-expanded', 'false');
                    const otherContent = document.getElementById(otherButton.getAttribute('aria-controls'));
                    if (otherContent) {
                        otherContent.classList.remove('active');
                    }
                }
            });

            // Toggle current accordion
            this.setAttribute('aria-expanded', !isExpanded);
            if (content) {
                content.classList.toggle('active');
            }
        });
    });

    // ============================================
    // FILE UPLOAD
    // ============================================

    const fileUploadArea = document.getElementById('file-upload-area');
    const fileInput = document.getElementById('contact_files');
    const fileList = document.getElementById('file-list');
    let uploadedFiles = [];

    if (fileUploadArea && fileInput) {
        // Click to select files
        fileUploadArea.addEventListener('click', function(e) {
            if (e.target !== fileInput) {
                fileInput.click();
            }
        });

        // Drag and drop
        fileUploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            fileUploadArea.classList.add('dragover');
        });

        fileUploadArea.addEventListener('dragleave', function() {
            fileUploadArea.classList.remove('dragover');
        });

        fileUploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            fileUploadArea.classList.remove('dragover');

            const files = e.dataTransfer.files;
            handleFileSelect(files);
        });

        // File input change
        fileInput.addEventListener('change', function() {
            handleFileSelect(this.files);
        });

        function handleFileSelect(files) {
            Array.from(files).forEach(file => {
                // Validate file type
                const allowedTypes = ['stl', 'obj', 'zip', 'rar', '3ds', 'fbx'];
                const fileExtension = file.name.split('.').pop().toLowerCase();

                if (!allowedTypes.includes(fileExtension)) {
                    alert(`Nieobsługiwany format pliku: ${file.name}\nObsługiwane formaty: STL, OBJ, ZIP, RAR, 3DS, FBX`);
                    return;
                }

                // Validate file size (100MB)
                if (file.size > 100 * 1024 * 1024) {
                    alert(`Plik ${file.name} jest za duży. Maksymalny rozmiar: 100MB`);
                    return;
                }

                uploadedFiles.push(file);
                displayFile(file);
            });
        }

        function displayFile(file) {
            if (!fileList) return;

            const fileItem = document.createElement('div');
            fileItem.className = 'file-item';

            const fileName = document.createElement('span');
            fileName.textContent = file.name;

            const fileSize = document.createElement('span');
            fileSize.textContent = formatFileSize(file.size);
            fileSize.style.color = 'var(--color-text-muted)';
            fileSize.style.fontSize = '0.8rem';

            const removeButton = document.createElement('button');
            removeButton.textContent = '×';
            removeButton.className = 'file-remove';
            removeButton.setAttribute('aria-label', `Usuń ${file.name}`);

            removeButton.addEventListener('click', function() {
                const index = uploadedFiles.indexOf(file);
                if (index > -1) {
                    uploadedFiles.splice(index, 1);
                }
                fileItem.remove();
            });

            fileItem.appendChild(fileName);
            fileItem.appendChild(fileSize);
            fileItem.appendChild(removeButton);

            fileList.appendChild(fileItem);
        }

        function formatFileSize(bytes) {
            if (bytes === 0) return '0 B';
            const k = 1024;
            const sizes = ['B', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    }

    // ============================================
    // SMOOTH SCROLLING
    // ============================================

    function scrollToSection(selector) {
        const element = document.querySelector(selector);
        if (element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }

    // Make scrollToSection globally available
    window.scrollToSection = scrollToSection;

    // Handle anchor links
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            scrollToSection(targetId);
        });
    });

    // ============================================
    // COOKIES CONSENT
    // ============================================

    window.acceptCookies = function() {
        // Set cookie for 1 year
        const expirationDate = new Date();
        expirationDate.setFullYear(expirationDate.getFullYear() + 1);
        document.cookie = `cookies_accepted=true; expires=${expirationDate.toUTCString()}; path=/`;

        // Hide notice
        const notice = document.getElementById('cookies-notice');
        if (notice) {
            notice.style.display = 'none';
        }
    };

    window.declineCookies = function() {
        // Set cookie for session only
        document.cookie = 'cookies_accepted=false; path=/';

        // Hide notice
        const notice = document.getElementById('cookies-notice');
        if (notice) {
            notice.style.display = 'none';
        }

        // Optional: disable tracking scripts
        console.log('Cookies declined - tracking disabled');
    };

    // ============================================
    // FORM ENHANCEMENTS
    // ============================================

    const contactForm = document.querySelector('.contact-form-fallback');

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // Add loading state
            const submitButton = this.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.classList.add('loading');
                submitButton.disabled = true;

                // Re-enable after 3 seconds (fallback)
                setTimeout(() => {
                    submitButton.classList.remove('loading');
                    submitButton.disabled = false;
                }, 3000);
            }
        });

        // Real-time validation
        const emailInput = contactForm.querySelector('input[type="email"]');
        if (emailInput) {
            emailInput.addEventListener('blur', function() {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (this.value && !emailRegex.test(this.value)) {
                    this.setCustomValidity('Wprowadź prawidłowy adres email');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
    }

    // ============================================
    // ACCESSIBILITY ENHANCEMENTS
    // ============================================

    // Focus management for modal-like elements
    function trapFocus(element) {
        const focusableElements = element.querySelectorAll(
            'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select'
        );

        const firstFocusable = focusableElements[0];
        const lastFocusable = focusableElements[focusableElements.length - 1];

        element.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                if (e.shiftKey) {
                    if (document.activeElement === firstFocusable) {
                        e.preventDefault();
                        lastFocusable.focus();
                    }
                } else {
                    if (document.activeElement === lastFocusable) {
                        e.preventDefault();
                        firstFocusable.focus();
                    }
                }
            }
        });
    }

    // Skip links
    const skipLink = document.querySelector('.skip-link');
    if (skipLink) {
        skipLink.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector('#main');
            if (target) {
                target.focus();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // ============================================
    // PERFORMANCE OPTIMIZATIONS
    // ============================================

    // Lazy loading images (if not supported natively)
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Preload critical resources
    function preloadResource(href, as, type) {
        const link = document.createElement('link');
        link.rel = 'preload';
        link.href = href;
        link.as = as;
        if (type) link.type = type;
        document.head.appendChild(link);
    }

    // Service Worker registration (if available)
    if ('serviceWorker' in navigator && location.protocol === 'https:') {
        navigator.serviceWorker.register('/sw.js').catch(console.error);
    }

    // ============================================
    // ANALYTICS AND TRACKING (GDPR compliant)
    // ============================================

    function initializeAnalytics() {
        // Only initialize if cookies are accepted
        const cookies = document.cookie.split(';').map(c => c.trim());
        const cookiesAccepted = cookies.some(c => c.startsWith('cookies_accepted=true'));

        if (cookiesAccepted) {
            // Initialize analytics here (Google Analytics, etc.)
            console.log('Analytics initialized');
        }
    }

    initializeAnalytics();

    console.log('🎉 Modelarnia Gdańska theme initialized successfully!');
});

// ============================================
// UTILITY FUNCTIONS
// ============================================

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function for scroll events  
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// Format currency (Polish)
function formatCurrency(amount) {
    return new Intl.NumberFormat('pl-PL', {
        style: 'currency',
        currency: 'PLN'
    }).format(amount);
}

// Format date (Polish)  
function formatDate(date) {
    return new Intl.DateTimeFormat('pl-PL', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }).format(new Date(date));
}

// Export functions for external use
window.ModelarniaTheme = {
    scrollToSection: window.scrollToSection,
    debounce,
    throttle,
    formatCurrency,
    formatDate
};