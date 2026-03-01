<?php
/**
 * Template Name: Careers Page
 */
get_header(); ?>

<section class="careers-hero"
    style="position: relative; overflow: hidden; height: 500px; display: flex; align-items: center; justify-content: center; text-align: center; color: #fff;">
    <div class="hero-overlay"></div>
    <div class="hero-bg-wrapper hero-kenburns">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/EE-factory_-_new.jpg"
            alt="Careers at Eatery Essentials" class="hero-bg">
    </div>

    <div class="container" style="position: relative; z-index: 2;">
        <span class="section-subtitle reveal-scale active"
            style="color: #fff; border-color: rgba(255,255,255,0.5);">Join Our Mission</span>
        <h1 class="reveal-delay-1 active"
            style="font-size: clamp(3rem, 7vw, 4.5rem); font-weight: 900; margin-bottom: 1.5rem; text-shadow: 0 5px 20px rgba(0,0,0,0.3);">
            Build Your Future <span class="gradient-text">With Us</span>.</h1>
        <p class="reveal-delay-2 active" style="font-size: 1.25rem; max-width: 600px; margin: 0 auto; opacity: 0.9;">We
            are actively hiring for manufacturing, sales, and operations in our state-of-the-art Dallas, TX facility.
        </p>
    </div>
</section>

<section class="section" style="position: relative; padding: 100px 0; overflow: hidden;">
    <div class="floating-blob" style="top: 10%; right: -5%; width: 400px; height: 400px;"></div>

    <div class="container">
        <div class="text-center reveal-scale">
            <span class="section-subtitle">Why Eatery Essentials?</span>
            <h2 class="section-title">A Culture of <span class="gradient-text">Excellence</span></h2>
            <p class="section-desc">We are a fast-growing company focused on innovation, quality, and sustainability.
                Our team is the backbone of everything we do.</p>
        </div>

        <div class="why-cards"
            style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2.5rem; margin-top: 5rem;">
            <div class="why-card reveal-scale glass-card" style="padding: 3rem 2rem; border-color: var(--border);">
                <div class="why-card-icon"
                    style="width: 80px; height: 80px; background: var(--accent-gradient); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.5rem; box-shadow: 0 8px 25px rgba(0,157,66,0.3);">
                    🚀</div>
                <h3 style="font-weight: 800; margin-bottom: 1rem;">Growth Opportunity</h3>
                <p style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.7;">Join a rapidly expanding
                    team with clear career pathways and professional development. We invest in our employees' future.
                </p>
            </div>
            <div class="why-card reveal-scale reveal-delay-1 glass-card"
                style="padding: 3rem 2rem; border-color: var(--border);">
                <div class="why-card-icon"
                    style="width: 80px; height: 80px; background: var(--accent-gradient); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.5rem; box-shadow: 0 8px 25px rgba(0,157,66,0.3);">
                    🤝</div>
                <h3 style="font-weight: 800; margin-bottom: 1rem;">Collaborative Culture</h3>
                <p style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.7;">Work alongside passionate
                    professionals in a supportive, team-oriented environment where every voice matters.</p>
            </div>
            <div class="why-card reveal-scale reveal-delay-2 glass-card"
                style="padding: 3rem 2rem; border-color: var(--border);">
                <div class="why-card-icon"
                    style="width: 80px; height: 80px; background: var(--accent-gradient); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.5rem; box-shadow: 0 8px 25px rgba(0,157,66,0.3);">
                    ⚙️</div>
                <h3 style="font-weight: 800; margin-bottom: 1rem;">Premium Benefits</h3>
                <p style="font-size: 0.95rem; color: var(--text-secondary); line-height: 1.7;">We offer competitive
                    compensation packages, including health insurance, retirement plans, and paid time off for our
                    valued team.</p>
            </div>
        </div>
    </div>
</section>

<!-- Open Positions via Paylocity -->
<section class="section jobs-section" style="background: var(--bg-light); padding: 120px 0;">
    <div class="container text-center reveal-scale">
        <span class="section-subtitle">Current Openings</span>
        <h2 class="section-title">Start Your <span class="gradient-text">Journey</span></h2>
        <p class="section-desc">Apply directly below or send your resume to <a
                href="mailto:recruiting@eateryessentials.com"
                style="color:var(--primary);font-weight:700;">recruiting@eateryessentials.com</a></p>

        <div class="jobs-embed-wrapper glass-card"
            style="background: #fff; border-radius: var(--radius-xl); overflow: hidden; margin-top: 4rem; min-height: 800px; padding: 1rem;">
            <iframe
                src="https://recruiting.paylocity.com/recruiting/jobs/All/3cceedc5-b5e2-4d72-a5d3-af7cfc91c613/Eatery-Essentials"
                title="Eatery Essentials Job Listings" style="width: 100%; min-height: 800px; border: none;"
                allowfullscreen></iframe>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner" style="padding: 120px 0;">
    <div class="container reveal-scale">
        <h2 style="font-size: 2.5rem; color: #fff;">Ready to Make an <span
                style="text-decoration: underline;">Impact</span>?</h2>
        <p style="font-size: 1.2rem; max-width: 600px; margin: 0 auto 3rem; opacity: 0.9;">We're looking for talented
            individuals to join our mission in Dallas, Texas.</p>
        <a href="mailto:recruiting@eateryessentials.com" class="btn btn-white">Email Your Resume</a>
    </div>
</section>

<?php get_footer(); ?>