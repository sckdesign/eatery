<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<section class="about-hero" style="position: relative; overflow: hidden;">
    <div class="hero-overlay"></div>
    <div class="hero-bg-wrapper hero-kenburns">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-subheader.jpg"
            alt="About Eatery Essentials" class="hero-bg">
    </div>

    <div class="container" style="position: relative; z-index: 2; text-align: center; color: #fff; padding: 120px 0;">
        <h1 class="reveal-scale active"
            style="font-size: clamp(3rem, 8vw, 5rem); font-weight: 900; margin-bottom: 1.5rem; text-shadow: 0 5px 20px rgba(0,0,0,0.3);">
            Our Story<span style="color: var(--primary);">.</span></h1>
        <p class="reveal-delay-1 active" style="font-size: 1.5rem; max-width: 700px; margin: 0 auto; opacity: 0.9;">A
            decade of precision engineering, sustainable innovation, and global distribution.</p>
    </div>
</section>

<section class="section" style="position: relative; padding: 100px 0; overflow: hidden;">
    <div class="floating-blob" style="top: 10%; left: -5%; width: 500px; height: 500px;"></div>

    <div class="container">
        <div class="about-intro"
            style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 6rem; align-items: center;">
            <div class="about-text-block reveal-left">
                <span class="section-subtitle">Company Overview</span>
                <h2 class="section-title">Eatery Essentials <span class="gradient-text">Inc.</span></h2>
                <p style="font-size: 1.15rem; line-height: 1.9; color: var(--text-secondary);"><strong>Eatery
                        Essentials, Inc.</strong> is a vertically integrated extrusion and thermoforming manufacturer of
                    high-quality polymers for drink cups, food containers, and advanced packaging with tamper-evident
                    technologies.</p>
                <p style="font-size: 1.15rem; line-height: 1.9; color: var(--text-secondary);">Established in 2015 and
                    based in Dallas, Texas, we have rapidly expanded to become a cornerstone of the North American
                    packaging supply chain. Our commitment to sustainability is woven into every product, utilizing 30%
                    post-consumer rPET to drive a circular economy.</p>
            </div>
            <div class="reveal-right">
                <div class="glass-card" style="padding: 3rem; border-radius: var(--radius-xl); text-align: center;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png"
                        alt="Eatery Essentials Logo"
                        style="max-width: 280px; width: 100%; transition: transform 0.3s ease;"
                        onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    <p style="margin-top: 2rem; font-weight:700; color: var(--primary);">Innovation. Quality.
                        Responsibility.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section"
    style="background: var(--dark); color: #fff; padding: 120px 0; position: relative; overflow: hidden;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 0.8fr 1.2fr; gap: 6rem; align-items: center;">
            <div class="reveal-left">
                <div class="glass-card"
                    style="position: relative; border-radius: var(--radius-xl); overflow: hidden; border-color: rgba(255,255,255,0.1); background: rgba(0,0,0,0.3);">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/EE-factory_-_new.jpg"
                        alt="Manufacturing Facility" style="width: 100%; display: block;">
                    <div
                        style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(transparent, rgba(0,0,0,0.9));">
                        <span style="font-weight: 800; font-size: 1.2rem; color: #fff;">Dallas, TX Headquarters</span>
                    </div>
                </div>
            </div>

            <div class="reveal-right">
                <span class="section-subtitle">Manufacturing Powerhouse</span>
                <h2 class="section-title" style="color: #fff; text-align: left;">Scale Meets <span
                        class="gradient-text">Precision</span></h2>
                <p style="color: rgba(255,255,255,0.7); line-height: 1.8; font-size: 1.1rem;">Our state-of-the-art
                    facility in Dallas spans over 2 million square feet of combined manufacturing and warehousing space.
                    This massive internal capacity allows us to maintain strict quality control while ensuring rapid
                    order fulfillment for our partners across North America.</p>

                <div class="stats-row" style="margin-top: 3rem; display: flex; gap: 2rem;">
                    <div style="flex: 1;">
                        <div class="stat-number" style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">2M+
                        </div>
                        <div class="stat-label"
                            style="font-size: 0.85rem; text-transform: uppercase; color: rgba(255,255,255,0.5); letter-spacing: 1px;">
                            Sq. Ft. Facility</div>
                    </div>
                    <div style="flex: 1;">
                        <div class="stat-number" style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">
                            100+</div>
                        <div class="stat-label"
                            style="font-size: 0.85rem; text-transform: uppercase; color: rgba(255,255,255,0.5); letter-spacing: 1px;">
                            Product SKUs</div>
                    </div>
                    <div style="flex: 1;">
                        <div class="stat-number" style="color: var(--primary); font-size: 2.5rem; font-weight: 900;">30%
                        </div>
                        <div class="stat-label"
                            style="font-size: 0.85rem; text-transform: uppercase; color: rgba(255,255,255,0.5); letter-spacing: 1px;">
                            rPET Material</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" style="padding: 100px 0;">
    <div class="container">
        <div class="text-center reveal-scale">
            <span class="section-subtitle">The Eatery Edge</span>
            <h2 class="section-title">Why Industry Leaders <span class="gradient-text">Choose Us</span></h2>
        </div>

        <div class="features-grid"
            style="margin-top: 5rem; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
            <div class="feature-item reveal-scale glass-card" style="background: #fff; border-color: var(--border);">
                <div class="feature-icon">💎</div>
                <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Superior Quality</h4>
                <p style="font-size: 0.9rem; opacity: 0.7;">Precision extrusion for maximum clarity and strength.</p>
            </div>
            <div class="feature-item reveal-scale reveal-delay-1 glass-card"
                style="background: #fff; border-color: var(--border);">
                <div class="feature-icon">🚀</div>
                <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Rapid R&D</h4>
                <p style="font-size: 0.9rem; opacity: 0.7;">Fast prototyping to meet custom packaging needs.</p>
            </div>
            <div class="feature-item reveal-scale reveal-delay-2 glass-card"
                style="background: #fff; border-color: var(--border);">
                <div class="feature-icon">♻️</div>
                <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Responsibility</h4>
                <p style="font-size: 0.9rem; opacity: 0.7;">Sustainable materials for a circular economy.</p>
            </div>
            <div class="feature-item reveal-scale reveal-delay-3 glass-card"
                style="background: #fff; border-color: var(--border);">
                <div class="feature-icon">🌎</div>
                <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Global Scale</h4>
                <p style="font-size: 0.9rem; opacity: 0.7;">North American distribution with global reach.</p>
            </div>
            <div class="feature-item reveal-scale reveal-delay-4 glass-card"
                style="background: #fff; border-color: var(--border);">
                <div class="feature-icon">🚚</div>
                <h4 style="font-weight: 800; margin-bottom: 0.5rem;">Integrated Logistics</h4>
                <p style="font-size: 0.9rem; opacity: 0.7;">Factory-direct shipping for on-time delivery.</p>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="cta-banner" style="padding: 120px 0;">
    <div class="container reveal-scale">
        <h2 style="font-size: 2.5rem; color: #fff;">Let's Build the Future of <span
                style="text-decoration: underline;">Your</span> Brand</h2>
        <p style="font-size: 1.2rem; max-width: 600px; margin: 0 auto 3rem; opacity: 0.9;">Join the hundreds of food
            service providers trusting our precision manufacturing.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-white">Partner With Us Today</a>
    </div>
</section>

<?php get_footer(); ?>