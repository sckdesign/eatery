<?php
/**
 * Template Name: Catalog Page
 */
get_header(); ?>

<section class="section text-center">
    <div class="container reveal">
        <span class="section-subtitle">2026 Edition</span>
        <h2 class="section-title">Product Catalog</h2>
        <p class="section-desc">Download our complete collection of rPET cups, containers, and lids.</p>

        <div style="max-width: 600px; margin: 4rem auto;">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2026-Eatery-Essentials-Product-Catalog_cover.jpg"
                alt="2026 Catalog Cover"
                style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); margin-bottom: 3rem;"
                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
            <a href="https://eateryessentials.com/wp-content/uploads/2026/02/2026-Eatery-Essentials-Product-Catalog_8.5x11in_0205.pdf"
                class="btn btn-primary" style="padding: 1.2rem 3rem; font-size: 1.1rem;" target="_blank">
                Download 2026 Catalog (PDF)
            </a>
        </div>

        <div class="content-area" style="margin-top: 4rem; text-align: left;">
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