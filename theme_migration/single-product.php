<?php
/**
 * Single Product Template (WooCommerce)
 * Displays individual product with gallery, specs, and related products.
 */
get_header();

$queried = get_queried_object();
?>

<div class="breadcrumbs">
    <div class="container">
        <h1>
            <?php the_title(); ?>
        </h1>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
            <li>/</li>
            <li><a href="<?php echo esc_url(home_url('/products')); ?>">Products</a></li>
            <li>/</li>
            <?php
            $terms = get_the_terms(get_the_ID(), 'product_cat');
            if ($terms && !is_wp_error($terms)):
                $term = $terms[0];
                ?>
                <li><a href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a></li>
                <li>/</li>
            <?php endif; ?>
            <li>
                <?php the_title(); ?>
            </li>
        </ul>
    </div>
</div>

<section class="section">
    <div class="container">
        <?php while (have_posts()):
            the_post();
            global $product;
            ?>
            <div class="single-product-wrap reveal active">
                <!-- Product Gallery -->
                <div class="product-gallery">
                    <?php
                    $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $fallback = get_template_directory_uri() . '/assets/images/logo-blue_green.png';
                    ?>
                    <img src="<?php echo esc_url($img_url ?: $fallback); ?>" alt="<?php the_title_attribute(); ?>"
                        class="main-image" onerror="this.src='<?php echo esc_js($fallback); ?>'">
                </div>

                <!-- Product Summary -->
                <div class="product-summary">
                    <?php if ($terms && !is_wp_error($terms)): ?>
                        <span class="product-cat">
                            <?php echo esc_html($terms[0]->name); ?>
                        </span>
                    <?php endif; ?>

                    <h1>
                        <?php the_title(); ?>
                    </h1>

                    <?php if (has_excerpt()): ?>
                        <p class="product-desc">
                            <?php echo wp_kses_post(get_the_excerpt()); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($product && is_a($product, 'WC_Product')): ?>
                        <?php
                        $attributes = $product->get_attributes();
                        if (!empty($attributes)):
                            ?>
                            <table class="specs-table">
                                <tbody>
                                    <?php foreach ($attributes as $attr):
                                        $label = wc_attribute_label($attr->get_name());
                                        $values = $attr->is_taxonomy()
                                            ? implode(', ', wc_get_product_terms($product->get_id(), $attr->get_name(), array('fields' => 'names')))
                                            : implode(', ', $attr->get_options());
                                        ?>
                                        <tr>
                                            <th>
                                                <?php echo esc_html($label); ?>
                                            </th>
                                            <td>
                                                <?php echo esc_html($values); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="entry-content" style="padding:0;max-width:none;">
                        <?php the_content(); ?>
                    </div>

                    <div class="product-actions">
                        <a href="https://crm.eateryessentials.com/sample" class="btn" target="_blank">Request Sample</a>
                        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline">Contact Us</a>
                        <a href="#" class="btn btn-secondary">Spec Sheet</a>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <?php
            if ($product && is_a($product, 'WC_Product')):
                $related_ids = wc_get_related_products($product->get_id(), 3);
                if (!empty($related_ids)):
                    ?>
                    <div class="related-products reveal">
                        <h2 class="section-title" style="font-size:1.3rem;text-align:center;">Related Products</h2>
                        <div class="product-grid" style="margin-top:2rem;">
                            <?php foreach ($related_ids as $rid):
                                $rp = wc_get_product($rid);
                                if (!$rp)
                                    continue;
                                $rimg = get_the_post_thumbnail_url($rid, 'product-card');
                                $rlogo = get_template_directory_uri() . '/assets/images/logo-blue_green.png';
                                ?>
                                <div class="product-card">
                                    <div class="product-img-wrap">
                                        <?php if ($rimg): ?>
                                            <img src="<?php echo esc_url($rimg); ?>" alt="<?php echo esc_attr($rp->get_name()); ?>"
                                                onerror="this.src='<?php echo esc_js($rlogo); ?>'">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($rlogo); ?>" alt="<?php echo esc_attr($rp->get_name()); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title">
                                            <?php echo esc_html($rp->get_name()); ?>
                                        </h3>
                                        <a href="<?php echo esc_url(get_permalink($rid)); ?>" class="link-arrow">View Details</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>