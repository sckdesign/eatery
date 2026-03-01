<?php
/**
 * The template for displaying WooCommerce pages
 *
 * This is a catch-all template for WooCommerce content if no specific
 * archive-product.php or single-product.php exists.
 */

get_header();
?>

<div class="container" style="padding: 2rem 20px;">
    <main class="site-main">
        <?php woocommerce_content(); ?>
    </main>
</div>

<?php
get_footer();
