/* =============================================
   EATERY ESSENTIALS — Main JavaScript
   ============================================= */

document.addEventListener('DOMContentLoaded', () => {

    // =========================================
    // HEADER SCROLL EFFECT
    // =========================================
    const header = document.querySelector('.site-header');
    if (header) {
        const onScroll = () => {
            header.classList.toggle('scrolled', window.scrollY > 40);
        };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // =========================================
    // MOBILE MENU
    // =========================================
    const mobileToggle = document.querySelector('.mobile-menu-toggle, .mobile-toggle');
    const mainNav = document.querySelector('.main-nav');

    if (mobileToggle && mainNav) {
        // Create overlay
        const overlay = document.createElement('div');
        overlay.className = 'nav-overlay';
        document.body.appendChild(overlay);

        const toggleMenu = () => {
            const isOpen = mainNav.classList.toggle('open');
            mobileToggle.classList.toggle('active');
            overlay.classList.toggle('show', isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
        };

        mobileToggle.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);
    }

    // =========================================
    // SCROLL REVEAL ANIMATIONS
    // =========================================
    const revealElements = document.querySelectorAll('.reveal');

    if (revealElements.length > 0) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -40px 0px'
        });

        revealElements.forEach(el => revealObserver.observe(el));
    }

    // =========================================
    // CONTACT FORM VALIDATION & SUBMISSION
    // =========================================
    const contactForm = document.getElementById('contact-form');

    if (contactForm) {
        const validators = {
            name: (v) => v.trim().length >= 2,
            email: (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v),
            company: () => true,
            phone: () => true,
            subject: (v) => v.trim().length > 0,
            message: (v) => v.trim().length >= 10,
        };

        const errorMessages = {
            name: 'Please enter your full name',
            email: 'Please enter a valid email address',
            subject: 'Please select a subject',
            message: 'Message must be at least 10 characters',
        };

        // Real-time validation on blur
        contactForm.querySelectorAll('input, textarea, select').forEach(field => {
            field.addEventListener('blur', () => validateField(field));
            field.addEventListener('input', () => {
                if (field.closest('.form-group').classList.contains('has-error')) {
                    validateField(field);
                }
            });
        });

        function validateField(field) {
            const name = field.name;
            const group = field.closest('.form-group');
            if (!group) return true;

            const validator = validators[name];
            if (!validator) return true;

            const isValid = validator(field.value);
            group.classList.toggle('has-error', !isValid);
            field.classList.toggle('error', !isValid);
            return isValid;
        }

        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            let allValid = true;
            const fields = contactForm.querySelectorAll('[name]');

            fields.forEach(field => {
                if (!validateField(field)) {
                    allValid = false;
                }
            });

            if (!allValid) {
                // Focus first error
                const firstError = contactForm.querySelector('.error');
                if (firstError) firstError.focus();
                return;
            }

            // Simulate submission
            const submitBtn = contactForm.querySelector('.btn-submit');
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';

            setTimeout(() => {
                // Show success
                contactForm.style.display = 'none';
                const successEl = document.querySelector('.form-success');
                if (successEl) {
                    successEl.classList.add('show');
                }

                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }, 1500);
        });
    }

    // =========================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // =========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // =========================================
    // HERO PARALLAX (subtle)
    // =========================================
    const heroBg = document.querySelector('.hero-bg');
    if (heroBg) {
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY;
            if (scrolled < window.innerHeight) {
                heroBg.style.transform = `scale(1.05) translateY(${scrolled * 0.15}px)`;
            }
        }, { passive: true });
    }

    // =========================================
    // LIGHTBOX / IMAGE PREVIEW
    // =========================================
    const imagesToLightbox = document.querySelectorAll('.main-image, .product-img-wrap img');
    console.log(`[Lightbox] Found ${imagesToLightbox.length} images to lightbox`);

    if (imagesToLightbox.length > 0 && !document.querySelector('.lightbox')) {
        // Create lightbox elements
        const lightbox = document.createElement('div');
        lightbox.className = 'lightbox';
        lightbox.innerHTML = `
            <div class="lightbox-content">
                <button class="lightbox-close" aria-label="Close">&times;</button>
                <img src="" alt="Preview" class="lightbox-image">
            </div>
        `;
        document.body.appendChild(lightbox);
        console.log('[Lightbox] Created lightbox elements');

        const lightboxImg = lightbox.querySelector('.lightbox-image');
        const closeBtn = lightbox.querySelector('.lightbox-close');

        const openLightbox = (src) => {
            console.log(`[Lightbox] Opening image: ${src}`);
            lightboxImg.src = src;
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        };

        const closeLightbox = () => {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
            setTimeout(() => {
                lightboxImg.src = '';
            }, 400);
        };

        imagesToLightbox.forEach(img => {
            img.style.cursor = 'zoom-in'; // Ensure cursor is set via JS too
            img.addEventListener('click', () => openLightbox(img.src));
        });

        closeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeLightbox();
        });

        lightbox.addEventListener('click', () => closeLightbox());

        // Esc key to close
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && lightbox.classList.contains('active')) {
                closeLightbox();
            }
        });
    }
});


