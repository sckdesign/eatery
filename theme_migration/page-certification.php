<?php
/**
 * Template Name: Certification Page
 */
get_header(); ?>

<style>
    .cert-hero {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo get_template_directory_uri(); ?>/assets/images/certification-subheader.jpg') no-repeat center center;
        background-size: cover;
        padding: 8rem 0;
        text-align: center;
        color: var(--white);
    }

    .cert-hero h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .intro-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 4rem;
        align-items: center;
    }

    .cert-card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 3rem;
    }

    .cert-card {
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        text-align: center;
    }

    .cert-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
    }

    .cert-img-wrap {
        padding: 2rem;
        background: #f9fafb;
        height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .cert-img-wrap img {
        max-height: 100%;
        width: auto;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .cert-info {
        padding: 1.5rem;
    }

    .factory-gallery {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
        margin-top: 4rem;
    }

    .factory-img {
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-md);
    }

    .factory-img img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        display: block;
    }

    .compliance-box {
        background: var(--bg-light);
        padding: 3rem;
        border-radius: var(--radius-xl);
        margin-top: 4rem;
        border-left: 5px solid var(--secondary);
    }

    @media (max-width: 992px) {

        .intro-grid,
        .factory-gallery {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .intro-grid div:nth-child(2) {
            text-align: center !important;
            order: -1;
        }

        .cert-hero h1 {
            font-size: 2.25rem;
        }

        .compliance-box {
            padding: 2rem 1.5rem;
        }

        .factory-img img {
            height: 300px;
        }
    }
</style>

<!-- Page Hero -->
<section class="cert-hero">
    <div class="container">
        <h1>Certifications</h1>
        <p style="font-size: 1.25rem; opacity: 0.9;">Global Standards of Excellence in Food Safety</p>
    </div>
</section>

<div class="content-wrapper" style="padding: 5rem 0;">
    <div class="container">
        <!-- Intro Section -->
        <div class="intro-grid">
            <div class="reveal">
                <span class="section-subtitle">Food Safety First</span>
                <h2 class="section-title">Quality Control & Manufacturing Standards</h2>
                <p style="margin-bottom: 1.5rem;">We take quality control seriously. We manufacture our products
                    with state of the art equipment, highest quality raw materials, and implement the highest
                    standards of Good Manufacturing Practices. Our labs test product from each production run to
                    ensure our customers receive product that meet promised expectations.</p>
                <p>In order to provide a packaging solution customized to various needs and requirements, our
                    production facility is certified and accredited with BRC, ISO-22000, FSSC-22000, and HACCP
                    standard operating system and quality fundamentals. <strong>FSS-C22000 & BRC Certifications make
                        us Global Food Safety Initiative (GFSI) certified.</strong></p>
            </div>
            <div class="reveal reveal-delay-2" style="text-align: right;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png"
                    alt="<?php bloginfo('name'); ?>" style="max-width: 280px;">
            </div>
        </div>

        <!-- Certification Cards -->
        <div class="cert-card-grid">
            <div class="cert-card reveal">
                <div class="cert-img-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/REC27-P_Certificate_BRC-PK-173_2025_Final-scaled.jpg"
                        alt="BRC Certification"
                        onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                </div>
                <div class="cert-info">
                    <h4 style="font-weight: 700;">BRC Certification</h4>
                    <p style="font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 1rem;">Eatery
                        Essentials BRCGS for Packaging Materials</p>
                    <a href="https://eateryessentials.com/wp-content/uploads/2025/10/REC27-P_Certificate_BRC-PK-173_2025_Final.pdf"
                        class="btn btn-secondary btn-sm" target="_blank">View Certificate</a>
                </div>
            </div>

            <div class="cert-card reveal reveal-delay-1">
                <div class="cert-img-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Page-from-NJ-RC-Certification.png"
                        alt="NJ Recycled Content"
                        onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                </div>
                <div class="cert-info">
                    <h4 style="font-weight: 700;">NJ Recycled Registration</h4>
                    <p style="font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 1rem;">New Jersey
                        Recycled Content Registration</p>
                    <a href="https://eateryessentials.com/wp-content/uploads/2024/09/NJ-RC-Certification.pdf"
                        class="btn btn-secondary btn-sm" target="_blank">View Certificate</a>
                </div>
            </div>

            <div class="cert-card reveal reveal-delay-2">
                <div class="cert-img-wrap">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ASI-Certificate-EE-Dallas-QB-10.09.2025.jpg"
                        alt="SQF Certification"
                        onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                </div>
                <div class="cert-info">
                    <h4 style="font-weight: 700;">SQF Certification</h4>
                    <p style="font-size: 0.85rem; color: var(--text-secondary); margin-bottom: 1rem;">Eatery
                        Essentials SQF Food Safety Code</p>
                    <a href="https://eateryessentials.com/wp-content/uploads/2025/11/ASI-Certificate-EE-Dallas-QB-10.09.2025.pdf"
                        class="btn btn-secondary btn-sm" target="_blank">View Certificate</a>
                </div>
            </div>
        </div>

        <!-- Compliance Section -->
        <div class="compliance-box reveal">
            <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">FDA Compliance</h3>
            <p style="font-size: 1.1rem; line-height: 1.8;">Both the paperboard and plastic resins we buy from
                outside sources are all <strong>U.S. FDA certified for direct food contact</strong> (21CFR177.2600 &
                21CFR176.170). We ensure every material used in our process meets or exceeds federal safety
                requirements for your peace of mind.</p>
        </div>

        <!-- Factory Gallery -->
        <div class="factory-gallery">
            <div class="factory-img reveal">
                <img src="https://eateryessentials.com/wp-content/uploads/2020/04/ee-factory-2.jpg"
                    alt="Factory Production Line">
            </div>
            <div class="factory-img reveal reveal-delay-1">
                <img src="https://eateryessentials.com/wp-content/uploads/2020/04/ee-factory-3.jpg"
                    alt="Automated Manufacturing">
            </div>
        </div>

        <!-- WordPress Content -->
        <div class="wordpress-content" style="margin-top: 4rem;">
            <?php
            while (have_posts()):
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</div>

<!-- CTA Section -->
<section class="section" style="background: var(--primary); color: var(--white); text-align: center; padding: 6rem 0;">
    <div class="container reveal">
        <h2 style="font-size: 2.5rem; margin-bottom: 1.5rem;">Committed to Your Safety</h2>
        <p style="max-width: 700px; margin: 0 auto 2.5rem; opacity: 0.9;">We continue to invest in our facilities
            and certifications to remain the leader in sustainable, safe food packaging across North America.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-white">Contact Our Quality Team</a>
    </div>
</section>

<?php get_footer(); ?>