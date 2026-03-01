<?php
/**
 * Template Name: Closing Machines
 */

get_header(); ?>

<section class="page-hero"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/cover-BUT-N-LOC-Tamper-Evident-Products.jpg'); background-size: cover; background-position: center; position: relative;">
    <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.5);"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <h1>BUT-N-LOC Line</h1>
        <p>The Industry Standard in Tamper-Evident Security</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-intro"
            style="padding:0; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div class="reveal">
                <span class="section-subtitle">Security First</span>
                <h2 style="font-size:2rem;margin-bottom:1.5rem;">Maximum Security. Absolute Confidence.</h2>
                <p>BUT-N-LOC is an innovative button-locking mechanism designed to provide superior product security.
                    Unlike traditional tamper-evident packaging that relies on tear strips, BUT-N-LOC provides an
                    auditory "click" that confirms the package is safely sealed.</p>
                <p>This design eliminates the need for extra components that end up as micro-plastic waste, making it
                    the perfect choice for environmentally conscious brands.</p>
                <ul style="list-style: none; padding: 0; margin: 1.5rem 0;">
                    <li style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem;">
                        <span style="color: var(--primary); font-weight: bold;">✓</span> Auditory "Click" Confirmation
                    </li>
                    <li style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem;">
                        <span style="color: var(--primary); font-weight: bold;">✓</span> 100% Recyclable rPET Material
                    </li>
                    <li style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem;">
                        <span style="color: var(--primary); font-weight: bold;">✓</span> No Tear Strips or Tabs to
                        Discard
                    </li>
                    <li style="margin-bottom: 0.75rem; display: flex; align-items: center; gap: 0.75rem;">
                        <span style="color: var(--primary); font-weight: bold;">✓</span> Leak-Resistant High Performance
                    </li>
                </ul>
            </div>
            <div class="reveal reveal-delay-2"
                style="display:flex;align-items:center;justify-content:center; background: #f9f9f9; padding: 2rem; border-radius: 12px;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/BUT-N-LOC-R-e1664809820691.png"
                    alt="BUT-N-LOC Technology" style="max-width:100%; border-radius: 8px;">
            </div>
        </div>
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div style="text-align: center; max-width: 800px; margin: 0 auto 3rem auto;" class="reveal">
            <span class="section-subtitle">Automation</span>
            <h2 class="section-title">VPA-200 Auto Closing Machine</h2>
            <p>Increase efficiency and ensure consistent seal integrity with the VPA-200. Designed specifically for the
                BUT-N-LOC line, our automation solutions streamline your production line.</p>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center;">
            <div class="reveal">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/but-n-loc-closing-machine.jpg"
                    alt="VPA-200 Machine" style="width: 100%; border-radius: 12px; box-shadow: var(--shadow-lg);">
            </div>
            <div class="reveal reveal-delay-2">
                <h3 style="color: var(--primary); margin-bottom: 1.5rem;">Automated Precision</h3>
                <p>The VPA-200 Auto Closing Machine is engineered for performance, providing a perfect seal every time.
                    It's the ideal companion for high-volume processors and supermarket production lines.</p>
                <div
                    style="background: var(--white); padding: 1.5rem; border-radius: 8px; border: 1px solid var(--border); margin-top: 1.5rem;">
                    <h4 style="font-size: 1rem; margin-bottom: 0.5rem;">Specifications:</h4>
                    <ul style="font-size: 0.9rem; padding-left: 1.2rem;">
                        <li>Stainless Steel Construction</li>
                        <li>High-Speed Throughput</li>
                        <li>Small Footprint</li>
                        <li>Easy Maintenance</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center" style="margin-bottom: 3rem;">
            <span class="section-subtitle">See It In Action</span>
            <h2 class="section-title">Instructional Videos</h2>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            <div class="reveal">
                <div style="background: #000; aspect-ratio: 16/9; border-radius: 8px; overflow: hidden;">
                    <video controls style="width: 100%; height: 100%;">
                        <source src="https://eateryessentials.com/wp-content/uploads/2020/12/Close-TE1-Eng.mp4"
                            type="video/mp4">
                    </video>
                </div>
                <h4 style="margin-top: 1rem; text-align: center;">BUT-N-LOC Closing Guide (English)</h4>
            </div>
            <div class="reveal reveal-delay-1">
                <div style="background: #000; aspect-ratio: 16/9; border-radius: 8px; overflow: hidden;">
                    <video controls style="width: 100%; height: 100%;">
                        <source src="https://eateryessentials.com/wp-content/uploads/2020/12/Close-TE2-Eng.mp4"
                            type="video/mp4">
                    </video>
                </div>
                <h4 style="margin-top: 1rem; text-align: center;">Advanced Application Guide</h4>
            </div>
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="container reveal">
        <h2>Ready to Secure Your Products?</h2>
        <p>Contact our sales team to request samples of the BUT-N-LOC Line or a demo of our closing machines.</p>
        <a href="<?php echo home_url('/contact'); ?>" class="btn btn-white">Get in Touch</a>
    </div>
</section>

<?php get_footer(); ?>