<?php
/**
 * Template Name: Documents Page
 */
get_header(); ?>

<section class="section">
    <div class="container reveal">
        <span class="section-subtitle">Resources</span>
        <h2 class="section-title">Documents</h2>
        <p class="section-desc">Additional Resources</p>

        <div class="product-grid" style="margin-top: 3rem;">

            <?php
            $documents = [
                [
                    'title' => '2026 Eatery Essentials Product Catalog',
                    'img' => '2026-Eatery-Essentials-Product-Catalog_cover.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2026/02/2026-Eatery-Essentials-Product-Catalog_8.5x11in_0205.pdf',
                ],
                [
                    'title' => 'Grab & Go Containers',
                    'img' => 'cover-Grab-N-Go.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/09/Sales-Sheet-Grab-N-Go.pdf',
                ],
                [
                    'title' => 'BUT-N-LOC Tamper Evident Products',
                    'img' => 'cover-BUT-N-LOC-Tamper-Evident-Products.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2026/02/Sales-Sheet-BUT-N-LOC-Tamper-Evident-Products.pdf',
                ],
                [
                    'title' => 'BUT-N-LOC Auto Closing Machine',
                    'img' => 'cover-Auto-Closing-Machine.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/05/Sales-Sheet-Auto-Closing-Machine.pdf',
                ],
                [
                    'title' => 'Tamper Evident Square Bowls',
                    'img' => 'cover-Tamper-Evident-Square-Bowls.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/11/Sales-Sheet-Tamper-Evident-Square-Bowls.pdf',
                ],
                [
                    'title' => 'Tamper Evident Round Bowls',
                    'img' => 'cover-Tamper-Evident-Round-Bowls.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/10/Sales-Sheet-Tamper-Evident-Round-Bowls-1.pdf',
                ],
                [
                    'title' => 'Flat Panel Hinged Lid Parfait Cups',
                    'img' => 'cover-Parfait-Cups.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/05/Sales-Sheet-Parfait-Cups.pdf',
                ],
                [
                    'title' => 'Clear Hinged Lid Deli Containers',
                    'img' => 'cover-Clear-Hinged-Lid-Deli-Containers.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/05/Sales-Sheet-Clear-Hinged-Lid-Deli-Containers.pdf',
                ],
                [
                    'title' => 'PET Film Seal Containers',
                    'img' => 'cover-PET-Film-Seal-Containers.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/09/Sales-Sheet-PET-Film-Seal-Containers.pdf',
                ],
                [
                    'title' => 'PET Deli Containers & Salad Bowls',
                    'img' => 'cover-PET-Deli-Containers-Salad-Bowls.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/05/Sales-Sheet-PET-Deli-Containers-Salad-Bowls.pdf',
                ],
                [
                    'title' => 'Cake & Bakery Containers',
                    'img' => 'cover-Cake-Bakery-Containers.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/05/Sales-Sheet-Cake-Bakery-Containers.pdf',
                ],
                [
                    'title' => 'PET Clear Cups & All Lids',
                    'img' => 'cover-PET-Clear-Cups-All-Lids.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/05/Sales-Sheet-PET-Clear-Cups-All-Lids.pdf',
                ],
                [
                    'title' => 'PLA Cups & Lids',
                    'img' => 'cover-PLA-Cups-Lids.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2025/07/Sales-Sheet-PLA-Cups-Lids.pdf',
                ],
                [
                    'title' => 'Custom Printing',
                    'img' => 'Sales-Sheet-Custom-printing1024_1.jpg',
                    'pdf' => 'https://eateryessentials.com/wp-content/uploads/2023/05/Sales-Sheet-Custom-printing.pdf',
                ],
            ];

            foreach ($documents as $doc): ?>
                <div class="product-card">
                    <div class="product-img-wrap">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($doc['img']); ?>"
                            alt="<?php echo esc_attr($doc['title']); ?>"
                            onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><?php echo esc_html($doc['title']); ?></h3>
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