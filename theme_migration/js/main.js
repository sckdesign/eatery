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

        // Submenu Drill-down Logic
        const menuItemsWithChildren = mainNav.querySelectorAll('.menu-item-has-children, .has-dropdown');
        menuItemsWithChildren.forEach(item => {
            const link = item.querySelector('a');
            const subMenu = item.querySelector('.sub-menu, .dropdown');

            if (link && subMenu) {
                // Add Back Button (arrow only, no text)
                if (!subMenu.querySelector('.menu-back-btn')) {
                    const backBtn = document.createElement('li');
                    backBtn.className = 'menu-back-btn';
                    backBtn.innerHTML = '&#8592;';
                    backBtn.setAttribute('aria-label', 'Go back');
                    subMenu.insertBefore(backBtn, subMenu.firstChild);

                    backBtn.addEventListener('click', (e) => {
                        e.stopPropagation();
                        item.classList.remove('submenu-active');
                    });
                }

                link.addEventListener('click', (e) => {
                    if (window.innerWidth <= 1024) {
                        e.preventDefault();
                        item.classList.add('submenu-active');
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
    // HERO INTERACTIVE PARALLAX (REFINED)
    // =========================================
    const heroSect = document.querySelector('.hero');
    const heroBgElement = document.querySelector('.hero-bg');
    const heroContentInner = document.querySelector('.hero-content');

    if (heroSect && heroBgElement && heroContentInner) {
        // Scroll Parallax
        window.addEventListener('scroll', () => {
            const scrolled = window.scrollY;
            if (scrolled < window.innerHeight) {
                const yOffset = scrolled * 0.2;
                heroBgElement.style.transform = `translate(-50%, calc(-50% + ${yOffset}px)) scale(1.1)`;
                heroContentInner.style.transform = `translateY(${scrolled * 0.12}px)`;
                heroContentInner.style.opacity = 1 - (scrolled / (window.innerHeight * 0.95));
            }
        }, { passive: true });

        // Mouse Move depth effect (Desktop only)
        if (window.innerWidth > 1024) {
            heroSect.addEventListener('mousemove', (e) => {
                const { clientX, clientY } = e;
                const centerX = window.innerWidth / 2;
                const centerY = window.innerHeight / 2;

                const moveX = (clientX - centerX) / 60;
                const moveY = (clientY - centerY) / 60;

                const bgWrapper = heroSect.querySelector('.hero-bg-wrapper');
                if (bgWrapper) {
                    bgWrapper.style.transform = `translate(${moveX}px, ${moveY}px)`;
                }

                heroContentInner.style.transform = `translate(${moveX * -0.5}px, ${moveY * -0.5}px)`;
            });

            heroSect.addEventListener('mouseleave', () => {
                const bgWrapper = heroSect.querySelector('.hero-bg-wrapper');
                if (bgWrapper) {
                    bgWrapper.style.transform = `translate(0, 0)`;
                }
                heroContentInner.style.transform = `translate(0, 0)`;
            });
        }
    }

    // =========================================
    // MAGNETIC BUTTON EFFECT
    // =========================================
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
});
