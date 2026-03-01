<?php
/**
 * The front page template file
 */
get_header(); ?>

<section class="hero glass-card">
    <div class="hero-overlay"></div>
    <div class="hero-bg-wrapper hero-kenburns">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cover-Grab-N-Go.jpg"
            alt="Innovating Food Service Packaging" class="hero-bg">
    </div>

    <div class="hero-content reveal-scale active">
        <span class="section-subtitle" style="color: #fff; border-color: rgba(255,255,255,0.5);">Precision
            Manufacturing</span>
        <h1 class="reveal-delay-1">Building the <span class="gradient-text gradient-text-animated">Future</span>
            of Food Packaging</h1>
        <p class="reveal-delay-2">Eatery Essentials is a vertically integrated manufacturer of high-quality disposable
            packaging solutions for food service, processors, and retail. Based in Dallas, TX.</p>
        <div class="hero-btns reveal-delay-3">
            <a href="<?php echo esc_url(home_url('/products')); ?>" class="btn">Explore Products</a>
            <a href="<?php echo esc_url(home_url('/about')); ?>" class="btn btn-white">Our Story</a>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
        <div class="arrows">
            <span></span>
            <span></span>
        </div>
    </div>
</section>

<section class="intro-section" style="position: relative; overflow: hidden; padding: 100px 0;">
    <div class="floating-blob" style="top: 10%; left: -5%; width: 400px; height: 400px;"></div>
    <div class="floating-blob" style="bottom: 10%; right: -5%; width: 300px; height: 300px; animation-delay: -5s;">
    </div>

    <div class="container">
        <div class="intro-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div class="intro-text reveal-left">
                <span class="section-subtitle">Who We Are</span>
                <h2 class="section-title">A Vision Driven by <span class="gradient-text">Innovation</span></h2>
                <p>Established in 2015, Eatery Essentials specializes in the manufacturing of rPET disposable and
                    recyclable food packaging. Based in Dallas, Texas, we have quickly grown to provide distribution
                    capabilities throughout North America.</p>
                <p>Our commitment to sustainability and reducing environmental impact is at our core. Our rPET materials
                    use 30% post-consumer recycled plastic, making us a responsible choice for modern food service
                    businesses.</p>

                <div class="stats-row reveal-scale reveal-delay-2" style="margin-top: 3rem;">
                    <div class="stat-item glass-card" style="padding: 2rem; border-radius: var(--radius-lg);">
                        <div class="stat-number">2M+</div>
                        <div class="stat-label">Sq. Ft. Facility</div>
                    </div>
                    <div class="stat-item glass-card" style="padding: 2rem; border-radius: var(--radius-lg);">
                        <div class="stat-number">100+</div>
                        <div class="stat-label">Products</div>
                    </div>
                    <div class="stat-item glass-card" style="padding: 2rem; border-radius: var(--radius-lg);">
                        <div class="stat-number">30%</div>
                        <div class="stat-label">rPET Content</div>
                    </div>
                </div>
            </div>

            <div class="intro-image reveal-right">
                <div class="glass-card"
                    style="padding: 1rem; border-radius: var(--radius-xl); position: relative; overflow: visible;">
                    <div style="overflow: hidden; border-radius: var(--radius-lg); box-shadow: var(--shadow-xl);">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/EE-factory_-_new.jpg"
                            alt="Eatery Essentials Manufacturing" style="width: 100%; transition: transform 0.5s ease;"
                            onmouseover="this.style.transform='scale(1.05)'"
                            onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div class="floating-badge"
                        style="position: absolute; bottom: -30px; right: -30px; background: var(--accent-gradient); color: #fff; padding: 2rem; border-radius: var(--radius-xl); box-shadow: var(--shadow-xl); animation: float 4s ease-in-out infinite; z-index: 2;">
                        <span
                            style="font-size: 2.5rem; font-weight: 900; display: block; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">10+</span>
                        <span
                            style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 2px; font-weight: 700;">Years
                            of Excellence</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section bg-light" id="featured-brands" style="padding: 100px 0;">
    <div class="container text-center">
        <span class="section-subtitle">Our Portfolios</span>
        <h2 class="section-title">Industry-Leading <span class="gradient-text">Brands</span></h2>
        <p class="section-desc">Discover our specialized product lines designed for performance and presentation.</p>

        <div class="brand-grid">
            <div class="brand-card reveal-scale" style="border-radius: var(--radius-xl); overflow: hidden;">
                <div class="brand-img-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cover-Koda-Cups.jpg"
                        alt="Koda Cup Line">
                    <div class="brand-overlay"
                        style="background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 50%, transparent 100%);">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/kodaCup.png" alt="Koda Logo"
                            class="brand-logo" style="max-width: 120px;">
                        <p>Premium paper and plastic cups, lids, and containers for cold beverages.</p>
                        <a href="<?php echo esc_url(home_url('/products')); ?>" class="link-arrow">View Collection</a>
                    </div>
                </div>
            </div>
            <div class="brand-card reveal-scale reveal-delay-1"
                style="border-radius: var(--radius-xl); overflow: hidden;">
                <div class="brand-img-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cover-Grab-N-Go.jpg"
                        alt="But-N-Loc Line">
                    <div class="brand-overlay"
                        style="background: linear-gradient(0deg, rgba(10,15,28,0.95) 0%, rgba(10,15,28,0.5) 50%, transparent 100%);">
                        <div class="logo-text"
                            style="font-size: 1.75rem; font-weight: 900; color: #fff; margin-bottom: 0.5rem; letter-spacing: -1px;">
                            BUT-N-LOC<span style="color: var(--primary);">.</span></div>
                        <p>Innovative tamper-evident button locking technology for maximum product security.</p>
                        <a href="<?php echo esc_url(home_url('/product-category/but-n-loc/')); ?>"
                            class="link-arrow">Security Tech</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section"
    style="background: var(--dark); color: #fff; overflow: hidden; padding: 120px 0; position: relative;">
    <div class="floating-blob"
        style="top: 50%; left: 50%; transform: translate(-50%, -50%); width: 600px; height: 600px; background: radial-gradient(circle, rgba(0, 157, 66, 0.1) 0%, transparent 70%);">
    </div>

    <div class="container">
        <div class="reveal text-center" style="margin-bottom: 5rem;">
            <span class="section-subtitle">Our Advantage</span>
            <h2 class="section-title" style="color: #fff;">Supply Chain <span class="gradient-text">Solutions</span>
            </h2>
        </div>

        <div class="features-grid">
            <div class="feature-item reveal-scale glass-card"
                style="background: rgba(255,255,255,0.03); color: #fff; border-color: rgba(255,255,255,0.1); padding: 3rem 2rem;">
                <div class="feature-icon"
                    style="background: rgba(255,255,255,0.08); color: #fff; box-shadow: 0 0 20px rgba(255,255,255,0.05);">
                    📦</div>
                <h3 style="color: #fff;">Optimized Logistics</h3>
                <p style="color: rgba(255,255,255,0.65);">Our vertical integration and smart designs maximize shipping
                    efficiency and reduce overall carbon footprint.</p>
            </div>
            <div class="feature-item reveal-scale reveal-delay-1 glass-card"
                style="background: rgba(255,255,255,0.03); color: #fff; border-color: rgba(255,255,255,0.1); padding: 3rem 2rem;">
                <div class="feature-icon"
                    style="background: rgba(255,255,255,0.08); color: #fff; box-shadow: 0 0 20px rgba(255,255,255,0.05);">
                    🌱</div>
                <h3 style="color: #fff;">Sustainable Impact</h3>
                <p style="color: rgba(255,255,255,0.65);">Utilizing 30% post-consumer rPET materials to help our
                    partners meet ambitious ESG and sustainability goals.</p>
            </div>
            <div class="feature-item reveal-scale reveal-delay-2 glass-card"
                style="background: rgba(255,255,255,0.03); color: #fff; border-color: rgba(255,255,255,0.1); padding: 3rem 2rem;">
                <div class="feature-icon"
                    style="background: rgba(255,255,255,0.08); color: #fff; box-shadow: 0 0 20px rgba(255,255,255,0.05);">
                    ⚡</div>
                <h3 style="color: #fff;">Rapid Innovation</h3>
                <p style="color: rgba(255,255,255,0.65);">State-of-the-art thermoforming and extrusion capabilities
                    allow for lightning-fast prototyping and deployment.</p>
            </div>
        </div>
    </div>
</section>

<!-- Certifications -->
<section class="section bg-light" style="padding: 80px 0;">
    <div class="container text-center">
        <span class="section-subtitle">Verified Quality</span>
        <h2 class="section-title">Industry <span class="gradient-text">Standard</span></h2>
        <div class="cert-grid reveal-scale" style="gap: 5rem; margin-top: 3rem;">
            <a href="https://www.freshproduce.com/" target="_blank"
                style="filter: drop-shadow(0 5px 15px rgba(0,0,0,0.05));"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/International-Fresh-Produce-Association-logo-removebg-preview.png"
                    alt="IFPA Certification" style="max-height: 200px;"></a>
            <a href="https://cpma.ca/" target="_blank" style="filter: drop-shadow(0 5px 15px rgba(0,0,0,0.05));"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/CPMA-282x137-c-center-removebg-preview.png"
                    alt="CPMA Certification" style="max-height: 180px;"></a>
            <a href="https://www.iddba.org/" target="_blank"
                style="filter: drop-shadow(0 5px 15px rgba(0,0,0,0.05));"><img
                    src="<?php echo get_template_directory_uri(); ?>/assets/images/IDDBAlogo-removebg-preview.png"
                    alt="IDDBA Certification" style="max-height: 180px;"></a>
        </div>
    </div>
</section>

<!-- Lead Capture Section -->
<section class="section" id="contact" style="background: var(--bg-cream); padding: 120px 0; position: relative;">
    <div class="container">
        <div class="contact-form-inner"
            style="display: grid; grid-template-columns: 1fr 1.2fr; gap: 6rem; align-items: start;">
            <div class="contact-text reveal-left">
                <span class="section-subtitle">Partner With Us</span>
                <h2 class="section-title">Request Samples & <span class="gradient-text">Custom Solutions</span></h2>
                <p style="font-size: 1.15rem; line-height: 1.8;">Ready to elevate your packaging? Connect directly with
                    our Dallas-based manufacturing team for periodic updates on new rPET product launches and request
                    sample kits for your testing.</p>

                <div style="margin-top: 3rem; display: grid; gap: 1.5rem;">
                    <div class="glass-card"
                        style="display: flex; align-items: center; gap: 1.5rem; padding: 1.5rem; border-radius: var(--radius-lg);">
                        <div
                            style="width: 50px; height: 50px; background: var(--accent-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 1.2rem; flex-shrink: 0; box-shadow: 0 5px 15px rgba(0,157,66,0.3);">
                            ✓</div>
                        <div style="font-weight: 600; color: var(--text-primary);">Factory-Direct B2B Wholesale Pricing
                        </div>
                    </div>
                    <div class="glass-card"
                        style="display: flex; align-items: center; gap: 1.5rem; padding: 1.5rem; border-radius: var(--radius-lg);">
                        <div
                            style="width: 50px; height: 50px; background: var(--accent-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 1.2rem; flex-shrink: 0; box-shadow: 0 5px 15px rgba(0,157,66,0.3);">
                            ✓</div>
                        <div style="font-weight: 600; color: var(--text-primary);">Sustainable rPET Material
                            Specialization</div>
                    </div>
                    <div class="glass-card"
                        style="display: flex; align-items: center; gap: 1.5rem; padding: 1.5rem; border-radius: var(--radius-lg);">
                        <div
                            style="width: 50px; height: 50px; background: var(--accent-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 1.2rem; flex-shrink: 0; box-shadow: 0 5px 15px rgba(0,157,66,0.3);">
                            ✓</div>
                        <div style="font-weight: 600; color: var(--text-primary);">Rapid Prototype & Custom Design Kits
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrapper reveal-right glass-card"
                style="background: #fff; padding: 3.5rem; border-radius: var(--radius-xl); box-shadow: var(--shadow-xl);">
                <form action="#" id="contact-form" class="reveal">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label>Work Email</label>
                            <input type="email" name="email" placeholder="john@company.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="company" placeholder="Eatery Essentials" required>
                    </div>
                    <div class="form-group">
                        <label>Inquiry Type</label>
                        <select name="subject">
                            <option value="samples">Requesting Product Samples</option>
                            <option value="quote">Bulk Wholesale Quote</option>
                            <option value="custom">Custom R&D Solution</option>
                            <option value="factory">Factory Tour / Visit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Project Details</label>
                        <textarea name="message" placeholder="Tell us about your needs..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"
                        style="width: 100%; padding: 1.25rem; font-size: 1.1rem;">Submit Request</button>
                    <div class="form-success"
                        style="margin-top: 1.5rem; text-align: center; color: var(--primary); font-weight: 700;">
                        ✓ Request Sent Successfully!
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Banner -->
<section class="cta-banner" style="padding: 120px 0;">
    <div class="container reveal-scale">
        <h2 style="font-size: 3rem;">Ready to Revolutionize Your <span
                style="color: #fff; text-decoration: underline;">Packaging</span>?</h2>
        <p style="font-size: 1.25rem; max-width: 700px; margin: 0 auto 3rem; opacity: 0.9;">Join hundreds of food
            processors and service providers across North America trusting Eatery Essentials.</p>
        <div style="display: flex; gap: 1.5rem; justify-content: center;">
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-white">Get Custom Quote</a>
            <a href="mailto:sales@eateryessentials.com" class="btn btn-secondary"
                style="border-color: rgba(255,255,255,0.3); color: #fff; background: rgba(255,255,255,0.1); backdrop-filter: blur(5px);">Email
                Sales</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>