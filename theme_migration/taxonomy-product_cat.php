<?php
/**
 * WooCommerce Product Category Archive Template
 * Displays a product grid for each product category (e.g. /product-category/plastic-line/)
 */
get_header();

$queried = get_queried_object();
$cat_name = $queried ? $queried->name : 'Products';
$cat_desc = $queried ? $queried->description : '';
?>

<div class="breadcrumbs">
    <div class="container">
        <h1>
            <?php echo esc_html($cat_name); ?>
        </h1>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
            <li>/</li>
            <li><a href="<?php echo esc_url(home_url('/products')); ?>">Products</a></li>
            <li>/</li>
            <li>
                <?php echo esc_html($cat_name); ?>
            </li>
        </ul>
    </div>
</div>

<div class="content-wrapper">
    <main style="width:100%; max-width:1200px; margin:0 auto; padding:2rem;">

        <?php if ($cat_desc): ?>
            <p class="section-desc" style="margin-bottom:2rem;">
                <?php echo wp_kses_post($cat_desc); ?>
            </p>
        <?php endif; ?>

        <?php if (have_posts()): ?>
            <div class="product-grid">
                <?php while (have_posts()):
                    the_post();
                    $product_link = get_permalink();
                    $product_img = get_the_post_thumbnail_url(get_the_ID(), 'product-card');
                    $product_logo = get_template_directory_uri() . '/assets/images/logo-blue_green.png';
                    ?>
                    <div class="product-card reveal">
                        <div class="product-img-wrap">
                            <?php if ($product_img): ?>
                                <img src="<?php echo esc_url($product_img); ?>" alt="<?php the_title_attribute(); ?>"
                                    onerror="this.src='<?php echo esc_js($product_logo); ?>'">
                            <?php else: ?>
                                <img src="<?php echo esc_url($product_logo); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php the_title(); ?>
                            </h3>
                            <a href="<?php echo esc_url($product_link); ?>" class="link-arrow">View Details</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination" style="display:flex; justify-content:center; gap:1rem; margin-top:3rem;">
                <?php
                $pagination = paginate_links(array(
                    'prev_text' => '← Prev',
                    'next_text' => 'Next →',
                    'type' => 'array',
                ));
                if ($pagination) {
                    foreach ($pagination as $link) {
                        echo '<div>' . $link . '</div>';
                    }
                }
                ?>
            </div>

        <?php else: ?>
            <div style="text-align:center; padding:4rem 2rem;">
                <p style="color:var(--text-muted);">No products found in this category.</p>
                <a href="<?php echo esc_url(home_url('/products')); ?>" class="btn" style="margin-top:1.5rem;">
                    View All Products
                </a>
            </div>
        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>