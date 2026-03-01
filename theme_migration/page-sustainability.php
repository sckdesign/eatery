<?php
/**
 * Template Name: Sustainability Page
 */
get_header(); ?>

<section class="sustainability-hero" style="position: relative; overflow: hidden;">
    <div class="hero-overlay"></div>
    <div class="hero-bg-wrapper hero-kenburns">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sustainability-hero.jpg"
            alt="Sustainable Packaging" class="hero-bg">
    </div>

    <div class="container" style="position: relative; z-index: 2; text-align: center; color: #fff; padding: 120px 0;">
        <h1 class="reveal-scale active"
            style="font-size: clamp(3rem, 8vw, 5rem); font-weight: 900; margin-bottom: 1.5rem; text-shadow: 0 5px 20px rgba(0,0,0,0.3);">
            Sustainability<span style="color: var(--primary);">.</span></h1>
        <p class="reveal-delay-1 active" style="font-size: 1.5rem; max-width: 700px; margin: 0 auto; opacity: 0.9;">
            Pioneering a circular economy through advanced rPET manufacturing and zero-waste initiatives.</p>
    </div>
</section>

<section class="section" style="position: relative; padding: 100px 0; overflow: hidden;">
    <div class="floating-blob"
        style="top: 20%; right: -10%; background: radial-gradient(circle, rgba(0, 157, 66, 0.2) 0%, transparent 70%);">
    </div>

    <div class="container">
        <div class="about-intro"
            style="padding:0; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 6rem; align-items: center;">
            <div class="about-text-block reveal-left">
                <span class="section-subtitle">Our Pledge</span>
                <h2 class="section-title">A Commitment to <span class="gradient-text">Our Planet</span></h2>
                <p style="font-size: 1.15rem; line-height: 1.9; color: var(--text-secondary);">At Eatery Essentials, we
                    are passionate about creating a better future for our planet and the generations to come. Our
                    mission is to provide sustainable and responsible solutions for your business needs.</p>
                <p style="font-size: 1.15rem; line-height: 1.9; color: var(--text-secondary);">We understand the impact
                    of our products on the environment and are actively striving to reduce our carbon footprint and
                    protect natural resources. Our rPET materials use 30% post-consumer recycled plastic, creating a
                    bridge between high-performance packaging and environmental stewardship.</p>
            </div>
            <div class="reveal-right">
                <div class="glass-card"
                    style="padding: 3rem; border-radius: var(--radius-xl); text-align: center; background: rgba(0, 157, 66, 0.05);">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-recyclable.png"
                        alt="Recyclable" style="max-width:200px; width:100%; animation: float 6s ease-in-out infinite;">
                    <h3 style="margin-top: 2rem; color: var(--primary); font-weight: 800;">100% Recyclable</h3>
                    <p style="font-size: 0.9rem; opacity: 0.8;">Every product we manufacture is designed for the
                        circular economy.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About rPET Section -->
<section class="section"
    style="background: var(--dark); color: #fff; padding: 120px 0; position: relative; overflow: hidden;">
    <div class="container">
        <div class="sustainability-grid"
            style="display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; align-items: center;">
            <div class="reveal-left">
                <span class="section-subtitle">Material Science</span>
                <h2 class="section-title" style="color: #fff; text-align:left; margin-bottom:1.5rem;">The Power of <span
                        class="gradient-text">rPET</span></h2>
                <p style="color: rgba(255,255,255,0.7); line-height: 1.8; font-size: 1.1rem;">rPET is created by melting
                    down used PET bottles and containers, reforming them into new, high-performance products. This
                    process conserves natural resources and significantly reduces greenhouse gas emissions compared to
                    virgin plastic production.</p>

                <div style="margin-top: 3rem; display: grid; gap: 1.5rem;">
                    <div class="glass-card"
                        style="background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: var(--radius-lg); border-color: rgba(255,255,255,0.1);">
                        <h4
                            style="color: #fff; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
                            <span style="color: var(--primary);">✓</span> 30% PCR Content
                        </h4>
                        <p style="font-size: 0.9rem; color: rgba(255,255,255,0.6); margin: 0;">Post-consumer recycled
                            content in every sheet.</p>
                    </div>
                    <div class="glass-card"
                        style="background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: var(--radius-lg); border-color: rgba(255,255,255,0.1);">
                        <h4
                            style="color: #fff; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.75rem;">
                            <span style="color: var(--primary);">✓</span> Lower Carbon Footprint
                        </h4>
                        <p style="font-size: 0.9rem; color: rgba(255,255,255,0.6); margin: 0;">Reduced energy
                            consumption during manufacturing.</p>
                    </div>
                </div>
            </div>

            <div class="reveal-right">
                <div class="glass-card"
                    style="padding: 4rem; border-radius: var(--radius-xl); border-color: rgba(255,255,255,0.1); background: rgba(255,255,255,0.02);">
                    <h3 style="color: #fff; margin-bottom: 2rem; font-weight: 800;">True Circularity</h3>
                    <div style="display: flex; flex-direction: column; gap: 2rem;">
                        <div style="display: flex; gap: 1.5rem;">
                            <div style="font-size: 2rem;">♻️</div>
                            <div>
                                <h4 style="color: #fff;">Infinite Lifecycle</h4>
                                <p style="font-size: 0.9rem; color: rgba(255,255,255,0.6);">PET can be recycled multiple
                                    times without losing its clarity or strength.</p>
                            </div>
                        </div>
                        <div style="display: flex; gap: 1.5rem;">
                            <div style="font-size: 2rem;">🏭</div>
                            <div>
                                <h4 style="color: #fff;">In-House Recycling</h4>
                                <p style="font-size: 0.9rem; color: rgba(255,255,255,0.6);">We regrind 100% of our
                                    internal scrap to ensure zero manufacturing waste.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section bg-light" style="padding: 100px 0;">
    <div class="container text-center">
        <span class="section-subtitle">Impact Dashboard</span>
        <h2 class="section-title">Environmental <span class="gradient-text">Benchmarks</span></h2>
        <div class="stats-row reveal-scale" style="margin-top: 4rem;">
            <div class="stat-item glass-card" style="background: #fff; padding: 3rem;">
                <div class="stat-number gradient-text">30%</div>
                <div class="stat-label">PCR Content</div>
            </div>
            <div class="stat-item glass-card" style="background: #fff; padding: 3rem;">
                <div class="stat-number gradient-text">100%</div>
                <div class="stat-label">Recyclable</div>
            </div>
            <div class="stat-item glass-card" style="background: #fff; padding: 3rem;">
                <div class="stat-number gradient-text">Zero</div>
                <div class="stat-label">Plastic Waste</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner" style="padding: 120px 0;">
    <div class="container reveal-scale">
        <h2 style="font-size: 3rem;">Ready for <span style="color: #fff; text-decoration: underline;">Brighter</span>
            Packaging?</h2>
        <p style="font-size: 1.25rem; max-width: 700px; margin: 0 auto 3rem; opacity: 0.9;">Join our mission to reduce
            environmental impact without compromising on quality or performance.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-white">Partner With Us</a>
    </div>
</section>

<?php get_footer(); ?>