<?php
/**
 * Template Name: Customer Reference Documents Page
 */
get_header(); ?>

<section class="section">
    <div class="container reveal">
        <span class="section-subtitle">Resources</span>
        <h2 class="section-title">Customer Reference Documents</h2>
        <p class="section-desc">Certifications & Guides</p>

        <div class="product-grid" style="margin-top: 3rem;">
            <?php
            $docs = [
                [
                    'title' => 'Eatery Essentials BRC Certification',
                    'img' => 'REC27-P_Certificate_BRC-PK-173_2025_Final-scaled.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/10/REC27-P_Certificate_BRC-PK-173_2025_Final.pdf',
                ],
                [
                    'title' => 'New Jersey Recycled Content Registration',
                    'img' => 'Page-from-NJ-RC-Certification.png',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2024/09/NJ-RC-Certification.pdf',
                ],
                [
                    'title' => 'Eatery Essentials FSSC-22000 Certification',
                    'img' => 'VIGOUR-PLASTIC-FSSC-22000-V5.1-Certificated-有效期20260518.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/05/VIGOUR-PLASTIC-FSSC-22000-V5.1-Certificated-有效期20260518.pdf',
                ],
                [
                    'title' => 'Eatery Essentials SQF Certification',
                    'img' => 'ASI-Certificate-EE-Dallas-QB-10.09.2025.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/11/ASI-Certificate-EE-Dallas-QB-10.09.2025.pdf',
                ],
                [
                    'title' => 'Customer Reference Guide',
                    'img' => 'CRG-04.16.25-scaled.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/12/Customer-Reference-Guide-12.23.2025.pdf',
                ],
                [
                    'title' => 'VPA200 Operation Manual',
                    'img' => 'VPA200-Operation-Manual-Cover-scaled.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2024/10/VPA200-Operation-Manual_v2-002-10.21.24.pdf',
                ],
            ];

            foreach ($docs as $doc): ?>
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $doc['img']; ?>"
                            alt="<?php echo esc_attr($doc['title']); ?>"
                            onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title">
                            <?php echo esc_html($doc['title']); ?>
                        </h3>
                        <a href="<?php echo esc_url($doc['pdf']); ?>" class="link-arrow" target="_blank">📄 Download PDF</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="content-area" style="margin-top: 4rem;">
            <?php
            while (have_posts()):
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>