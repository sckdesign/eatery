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
    // MOBILE MENU & DRILL-DOWN
    // =========================================
    const mobileToggle = document.querySelector('.mobile-menu-toggle, .mobile-toggle');
    const mainNav = document.querySelector('.main-nav');

    if (mobileToggle && mainNav) {
        const overlay = document.createElement('div');
        overlay.className = 'nav-overlay';
        document.body.appendChild(overlay);

        const resetMobileMenu = () => {
            mainNav.classList.remove('open');
            mobileToggle.classList.remove('active');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
            mainNav.querySelectorAll('.submenu-active').forEach(el => el.classList.remove('submenu-active'));
        };

        const toggleMenu = () => {
            const isOpen = mainNav.classList.toggle('open');
            mobileToggle.classList.toggle('active');
            overlay.classList.toggle('show', isOpen);
            document.body.style.overflow = isOpen ? 'hidden' : '';
            if (!isOpen) resetMobileMenu();
        };

        mobileToggle.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Submenu Drill-down Logic (Mobile Only)
        const menuItemsWithChildren = mainNav.querySelectorAll('.menu-item-has-children, .has-dropdown');
        menuItemsWithChildren.forEach(item => {
            const link = item.querySelector('a');
            const subMenu = item.querySelector('.sub-menu, .dropdown');

            if (link && subMenu) {
                link.addEventListener('click', (e) => {
                    if (window.innerWidth <= 1024) {
                        e.preventDefault();
                        // Toggle logic for mobile accordion
                        const isActive = item.classList.contains('submenu-active');
                        // Close other open submenus at the same level
                        item.parentElement.querySelectorAll('.submenu-active').forEach(el => {
                            if (el !== item) el.classList.remove('submenu-active');
                        });
                        item.classList.toggle('submenu-active', !isActive);
                    }
                });
            }
        });
    }

    // =========================================
    // SCROLL REVEAL ANIMATIONS
    // =========================================
    const revealElements = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');

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
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(el => revealObserver.observe(el));
    }

    // =========================================
    // FLOATING ELEMENT GENERATOR
    // =========================================
    const createBlobs = () => {
        const container = document.querySelector('.hero');
        if (!container) return;

        for (let i = 0; i < 3; i++) {
            const blob = document.createElement('div');
            blob.className = 'floating-blob';
            blob.style.left = `${Math.random() * 80 + 10}%`;
            blob.style.top = `${Math.random() * 60 + 20}%`;
            blob.style.animationDelay = `${Math.random() * 10}s`;
            blob.style.width = `${Math.random() * 200 + 200}px`;
            blob.style.height = blob.style.width;
            container.appendChild(blob);
        }
    };
    createBlobs();

    // =========================================
    // HERO INTERACTIVE PARALLAX (DISABLED FOR STABILITY)
    // =========================================
    const heroSect = document.querySelector('.hero');
    const heroBgElement = document.querySelector('.hero-bg');
    const heroContentInner = document.querySelector('.hero-content');

    // =========================================
    // MAGNETIC BUTTON EFFECT (DISABLED FOR STABILITY)
    // =========================================
    /*
    const magneticBtns = document.querySelectorAll('.btn-primary, .btn-white, .btn-submit');
    if (window.innerWidth > 1024) {
        magneticBtns.forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const { offsetX, offsetY, target } = e;
                const rect = target.getBoundingClientRect();

                const x = (offsetX - rect.width / 2) / 3;
                const y = (offsetY - rect.height / 2) / 3;

                target.style.transform = `translate(${x}px, ${y}px)`;
            });

            btn.addEventListener('mouseleave', (e) => {
                e.target.style.transform = `translate(0, 0)`;
            });
        });
    }
    */

    // =========================================
    // COOKIE BANNER
    // =========================================
    const cookieBanner = document.getElementById('cookie-banner');
    const acceptCookiesBtn = document.getElementById('accept-cookies');
    const rejectCookiesBtn = document.getElementById('reject-cookies');

    if (cookieBanner) {
        // Check if user has already made a preference choice
        if (!localStorage.getItem('eatery_cookies_preference')) {
            // Slight delay before showing for better UX
            setTimeout(() => {
                cookieBanner.classList.add('show');
            }, 1000);
        }

        if (acceptCookiesBtn) {
            acceptCookiesBtn.addEventListener('click', () => {
                localStorage.setItem('eatery_cookies_preference', 'accepted');
                cookieBanner.classList.remove('show');
            });
        }

        if (rejectCookiesBtn) {
            rejectCookiesBtn.addEventListener('click', () => {
                localStorage.setItem('eatery_cookies_preference', 'rejected');
                cookieBanner.classList.remove('show');
            });
        }
    }

});
