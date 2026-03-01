<?php
/**
 * Template Name: Products Page
 *
 * Shows WooCommerce product archive if WC is active,
 * otherwise renders the full static product catalog.
 */
get_header();
?>

<div class="breadcrumbs">
    <div class="container">
        <h1>Our Products</h1>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
            <li>/</li>
            <li>Products</li>
        </ul>
    </div>
</div>

<div class="content-wrapper">

    <!-- Sidebar -->
    <aside class="sidebar reveal">
        <h3 class="widget-title">Categories</h3>

        <?php if (class_exists('WooCommerce')): ?>
            <?php /* WooCommerce product categories */ ?>
            <?php
            $product_cats = get_terms(array(
                'taxonomy' => 'product_cat',
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => true,
            ));
            if (!is_wp_error($product_cats) && !empty($product_cats)):
                ?>
                <ul class="widget-menu">
                    <?php foreach ($product_cats as $cat): ?>
                        <li><a href="<?php echo esc_url(get_term_link($cat)); ?>">
                                <?php echo esc_html($cat->name); ?>
                            </a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php else: ?>
            <!-- Static category menu matching original site -->
            <ul class="widget-menu">
                <li style="font-weight:700;color:var(--text-primary);padding:0.3rem 0;margin-top:0.75rem;">BUT-N-LOC</li>
                <li><a href="#tamper-evident-hinged-lid-containers">Tamper Evident Hinged Lid Containers</a></li>
                <li><a href="#tamper-evident-square-bowls">Tamper Evident Square Bowls</a></li>
                <li><a href="#tamper-evident-square-deli-containers">Tamper Evident Square Deli Containers</a></li>
                <li style="font-weight:700;color:var(--text-primary);padding:0.3rem 0;margin-top:0.75rem;">GRAB & GO
                </li>
                <li><a href="#grab-go-deli-containers">Deli Containers</a></li>
                <li><a href="#grab-go-tamper-evident">Tamper Evident Square Deli Containers</a></li>
                <li style="font-weight:700;color:var(--text-primary);padding:0.3rem 0;margin-top:0.75rem;">KODACUP</li>
                <li><a href="#cake-bakery-containers">Cake & Bakery Containers</a></li>
                <li><a href="#clear-salad-bowls">Clear Salad Bowls</a></li>
                <li><a href="#deli-containers">Deli Containers</a></li>
                <li><a href="#hinged-lid-containers">Hinged Lid Containers</a></li>
                <li><a href="#pet-clear-cups">PET Clear Cups</a></li>
                <li><a href="#pet-cup-lids">PET Cup Lids</a></li>
                <li style="font-weight:700;color:var(--text-primary);padding:0.3rem 0;margin-top:0.75rem;">PLASTIC LINE</li>
                <li><a href="#plastic-line-containers">Containers</a></li>
                <li><a href="#plastic-line-cups">Cups & Lids</a></li>
            </ul>
        <?php endif; ?>
    </aside>

    <!-- Main Content -->
    <main>
        <?php if (class_exists('WooCommerce')): ?>
            <!-- WooCommerce product loop -->
            <div class="products-header">
                <span class="result-count">
                    <?php
                    $product_count = wp_count_posts('product');
                    echo esc_html($product_count->publish) . ' products';
                    ?>
                </span>
                <?php woocommerce_catalog_ordering(); ?>
            </div>
            <?php
            echo do_shortcode('[products limit="120" columns="3" orderby="title" order="ASC"]');
            ?>
        <?php else: ?>
            <!-- Static product grid — mirrors original site exactly -->
            <div class="products-header">
                <span class="result-count">Showing all 120 results</span>
                <select onchange="sortProducts(this.value)" id="product-sort">
                    <option value="">Default sorting</option>
                    <option value="name">Sort by name (A–Z)</option>
                    <option value="name-desc">Sort by name (Z–A)</option>
                </select>
            </div>

            <div class="product-grid" id="product-grid">

                <!-- BUT-N-LOC — Tamper Evident Hinged Lid Containers -->
                <div class="category-section reveal" id="tamper-evident-hinged-lid-containers"
                    style="grid-column:1/-1;margin-top:2rem;">
                    <h3 class="category-heading">BUT-N-LOC — Tamper Evident Hinged Lid Containers</h3>
                </div>
                <?php
                $hinged_products = array(
                    array('img' => 'RPTTESW-500x500.jpg', 'name' => 'RPET Tamper Evident Sandwich Wedge', 'slug' => 'rpet-tamper-evident-sandwich-wedge'),
                    array('img' => 'RPTTEWR-500x500.jpg', 'name' => 'RPET Tamper Evident Sandwich Wrap', 'slug' => 'rpet-tamper-evident-sandwich-wrap'),
                    array('img' => 'RPTTEHG-500x500.jpg', 'name' => 'RPET Tamper Evident Hoagie Container', 'slug' => 'rpet-tamper-evident-hoagie-container'),
                    array('img' => 'RPTTEFPC-09.jpg', 'name' => 'PET Tamper Evident Flat Panel Parfait Cup 9 OZ', 'slug' => 'pet-tamper-evident-flat-panel-parfait-cup-9-oz'),
                    array('img' => 'RPTTEFPC-11.jpg', 'name' => 'PET Tamper Evident Flat Panel Parfait Cup 11 OZ', 'slug' => 'pet-tamper-evident-flat-panel-parfait-cup-11-oz'),
                    array('img' => 'RPTTEFPC-IN.jpg', 'name' => 'PET Tamper Evident Flat Panel Parfait Insert', 'slug' => 'pet-tamper-evident-flat-panel-parfait-insert'),
                    array('img' => 'RPTTE20-2C.jpg', 'name' => '20 OZ 2-Compartment RPET Clear Hinged Lid Tamper Evident Container', 'slug' => '20-oz-2-compartment-rpet-hinged'),
                    array('img' => 'RPTTE20-3C.jpg', 'name' => '20 OZ 3-Compartment RPET Clear Hinged Lid Tamper Evident Container', 'slug' => '20-oz-3-compartment-rpet-hinged'),
                    array('img' => 'RPTTE20-4C.jpg', 'name' => '20 OZ 4-Compartment RPET Clear Hinged Lid Tamper Evident Container', 'slug' => '20-oz-4-compartment-rpet-hinged'),
                    array('img' => 'RPTTEFPC-13.jpg', 'name' => 'PET Tamper Evident Flat Panel Parfait Cup 13 OZ', 'slug' => 'pet-tamper-evident-flat-panel-parfait-cup-13-oz'),
                    array('img' => 'RPTTE76-16-1.jpg', 'name' => '7 X 6 16 OZ RPET Clear Hinged Lid Tamper Evident Container', 'slug' => '7-x-6-16-oz-rpet-hinged'),
                    array('img' => 'RPTTE76-24-1.jpg', 'name' => '7 x 6 24 OZ RPET Clear Hinged Lid Tamper Evident Heavy Container', 'slug' => '7-x-6-24-oz-rpet-hinged'),
                    array('img' => 'RPTTE76-32-1.jpg', 'name' => '7 X 6 32 OZ RPET Clear Hinged Lid Tamper Evident Heavy Container', 'slug' => '7-x-6-32-oz-rpet-hinged'),
                    array('img' => 'RPTTE8AD-1.jpg', 'name' => '8 OZ AD RPET Clear Hinged Lid Tamper Evident Container', 'slug' => '8-oz-ad-rpet-hinged'),
                    array('img' => 'RPTTE12SW.jpg', 'name' => '12 OZ RPET Clear Hinged Tamper Evident Smooth Wall Container', 'slug' => '12-oz-rpet-smooth-wall'),
                    array('img' => 'RPTTE16SW.jpg', 'name' => '16 OZ RPET Clear Hinged Lid TE Smooth Wall Heavy Container', 'slug' => '16-oz-rpet-smooth-wall-heavy'),
                    array('img' => 'RPTTE16TOL-1.jpg', 'name' => '16 OZ RPET Clear Hinged Tear Off Lid Tamper Evident Container', 'slug' => '16-oz-rpet-tear-off-lid'),
                    array('img' => 'RPTTE20N-V-1_800x800.jpg', 'name' => '20 OZ RPET Clear Tamper Evident Hinged Lid Container – Vented Lid', 'slug' => '20-oz-rpet-hinged-vented'),
                    array('img' => 'RPTTE24-V-1_800x800.jpg', 'name' => '24 OZ RPET Clear Tamper Evident Hinged Lid Container – Vented Lid', 'slug' => '24-oz-rpet-hinged-vented'),
                    array('img' => 'RPTTE24SW-V-1.jpg', 'name' => '24 OZ RPET Clear Hinged Vented Lid Tamper Evident Smooth Wall Container', 'slug' => '24-oz-rpet-smooth-wall-vented'),
                    array('img' => 'RPTTE6AD-N.jpg', 'name' => '6 OZ AD RPET Clear Hinged Lid Tamper Evident Container', 'slug' => '6-oz-ad-rpet-hinged'),
                    array('img' => 'RPTTE4AD-N.jpg', 'name' => '4 OZ AD RPET Clear Hinged Lid Tamper Evident Container', 'slug' => '4-oz-ad-rpet-hinged'),
                    array('img' => 'RPTTERBM24-1.jpg', 'name' => '24 OZ RPET Clear Hinged Lid Medium Round Tamper Evident Bowl', 'slug' => '24-oz-rpet-round-bowl'),
                    array('img' => 'RPTTERBL40-1.jpg', 'name' => '40 OZ RPET Clear Hinged Lid Large Round Tamper Evident Bowl', 'slug' => '40-oz-rpet-round-bowl'),
                    array('img' => 'RPTTERBL48-1.jpg', 'name' => '48 OZ RPET Clear Hinged Lid Large Round Tamper Evident Bowl', 'slug' => '48-oz-rpet-round-bowl'),
                    array('img' => 'RPTTERBL64-1.jpg', 'name' => '64 OZ RPET Clear Hinged Lid Large Round Tamper Evident Bowl', 'slug' => '64-oz-rpet-round-bowl'),
                    array('img' => 'RPTTERBL80-1.jpg', 'name' => '80 OZ RPET Clear Hinged Lid Large Round Tamper Evident Bowl', 'slug' => '80-oz-rpet-round-bowl'),
                    array('img' => 'RPTTERBM18-1_800x800.jpg', 'name' => '18 OZ RPET Clear Hinged Lid Medium Round Tamper Evident Bowl', 'slug' => '18-oz-rpet-round-bowl'),
                    array('img' => 'RPTTEHG-8R-1.jpg', 'name' => 'Tamper Evident 8″ Display Hoagie', 'slug' => 'tamper-evident-8-display-hoagie'),
                    array('img' => 'RPTTEHSL-2.jpg', 'name' => 'Halved Standing Sandwich – Large', 'slug' => 'halved-standing-sandwich-large'),
                    array('img' => 'RPTTESWR_2_800.jpg', 'name' => 'Tamper Evident Wrap Container – SM', 'slug' => 'tamper-evident-wrap-container-sm'),
                    array('img' => 'RPTTESWR-2C-1.jpg', 'name' => 'Small Tamper Evident 2 Cell Snack Container', 'slug' => 'small-2-cell-snack-container'),
                    array('img' => 'RPTTESWR-3C-1.jpg', 'name' => 'Small Tamper Evident 3 Cell Snack Container', 'slug' => 'small-3-cell-snack-container'),
                    array('img' => 'RPTTESWR-4C-1.jpg', 'name' => 'Small Tamper Evident 4 Cell Snack Container', 'slug' => 'small-4-cell-snack-container'),
                );
                foreach ($hinged_products as $p): ?>
                    <div class="product-card reveal" data-name="<?php echo esc_attr(strtolower($p['name'])); ?>">
                        <div class="product-img-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <?php
                            // Link to WC product if exists, else to static page slug
                            $wc_product = class_exists('WooCommerce') ? get_page_by_path($p['slug'], OBJECT, 'product') : null;
                            $url = $wc_product ? get_permalink($wc_product->ID) : '#';
                            ?>
                            <a href="<?php echo esc_url($url); ?>" class="link-arrow">View Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- BUT-N-LOC — Tamper Evident Square Bowls -->
                <div class="category-section reveal" id="tamper-evident-square-bowls"
                    style="grid-column:1/-1;margin-top:2rem;">
                    <h3 class="category-heading">BUT-N-LOC — Tamper Evident Square Bowls</h3>
                </div>
                <?php
                $square_bowl_products = array(
                    array('img' => 'PTTESB5-08B-500x500.jpg', 'name' => '5″ 8OZ PET Clear Tamper Evident Small Square Bowl Bulk', 'slug' => '5-8oz-pet-square-bowl-bulk'),
                    array('img' => 'PTTESB5-12B-500x500.jpg', 'name' => '5″ 12OZ PET Clear Tamper Evident Small Square Bowl Bulk', 'slug' => '5-12oz-pet-square-bowl-bulk'),
                    array('img' => 'PTTESB5-16B-500x500.jpg', 'name' => '5″ 16 OZ PET Clear Tamper Evident Small Square Bowl Bulk', 'slug' => '5-16oz-pet-square-bowl-bulk'),
                    array('img' => 'PTTESBFLID5B-500x500.jpg', 'name' => '5″ PET Clear Tamper Evident Small Square Bowl Flat Lid Bulk', 'slug' => '5-pet-square-bowl-flat-lid'),
                    array('img' => 'PTTESBDLID5B-500x500.jpg', 'name' => '5″ PET Clear Tamper Evident Small Square Bowl Dome Lid Bulk', 'slug' => '5-pet-square-bowl-dome-lid'),
                    array('img' => 'PTTESB5-08DC.jpg', 'name' => '5″ 8OZ PET Clear Tamper Evident Small Square Bowl W/Dome Lid Combo', 'slug' => '5-8oz-pet-square-bowl-dome-combo'),
                    array('img' => 'PTTESB5-08FC.jpg', 'name' => '5″ 8OZ PET Clear Tamper Evident Small Square Bowl W/Flat Lid Combo', 'slug' => '5-8oz-pet-square-bowl-flat-combo'),
                    array('img' => 'PTTESB5-12DC.jpg', 'name' => '5″ 12OZ PET Clear Tamper Evident Small Square Bowl W/Dome Lid Combo', 'slug' => '5-12oz-pet-square-bowl-dome-combo'),
                    array('img' => 'PTTESB9-LG5C2-1.jpg', 'name' => '9″ Tamper Evident 5 Compartment Platter', 'slug' => '9-tamper-evident-5-compartment-platter'),
                    array('img' => 'PTTESB9-30B-N.jpg', 'name' => '9″ 30 OZ PET Clear Tamper Evident Large Square Bowl Bulk', 'slug' => '9-30oz-pet-large-square-bowl'),
                    array('img' => 'PTTESB9-40B-2.jpg', 'name' => '9″ 40 OZ PET Clear Tamper Evident Large Square Bowl Bulk', 'slug' => '9-40oz-pet-large-square-bowl'),
                    array('img' => 'PTTESB9-48B-2.jpg', 'name' => '9″ 48 OZ PET Clear Tamper Evident Large Square Bowl Bulk', 'slug' => '9-48oz-pet-large-square-bowl'),
                    array('img' => 'PTTESB9-48B-5C.jpg', 'name' => '9″ 48 OZ 5-Compartment PET Clear Tamper Evident Large Square Bowl Bulk', 'slug' => '9-48oz-5c-pet-large-square-bowl'),
                    array('img' => 'PTTESBDLID9B-N-3.jpg', 'name' => '9″ Large PET Clear Tamper Evident Square Bowl Dome Lid Bulk', 'slug' => '9-pet-large-square-bowl-dome-lid'),
                    array('img' => 'PTTESBFLID9B-N-2.jpg', 'name' => '9″ Large PET Clear Tamper Evident Square Bowl Flat Lid Bulk', 'slug' => '9-pet-large-square-bowl-flat-lid'),
                    array('img' => 'PTTES66-32LC.jpg', 'name' => 'PET Tamper Evident 6X6″ 32 OZ Square Container & Lid Combo Pack', 'slug' => '6x6-32oz-square-container-combo'),
                    array('img' => 'PTTES66-2CRL-C-1.jpg', 'name' => 'PET Tamper Evident 6X6″ 2 Cell Square Container W/Recessed Lid Combo Pack', 'slug' => '6x6-2-cell-square-container-combo'),
                );
                foreach ($square_bowl_products as $p): ?>
                    <div class="product-card reveal" data-name="<?php echo esc_attr(strtolower($p['name'])); ?>">
                        <div class="product-img-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-arrow">Inquire for Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- BUT-N-LOC — Tamper Evident Square Deli Containers -->
                <div class="category-section reveal" id="tamper-evident-square-deli-containers"
                    style="grid-column:1/-1;margin-top:2rem;">
                    <h3 class="category-heading">BUT-N-LOC — Tamper Evident Square Deli Containers</h3>
                </div>
                <?php
                $deli_products = array(
                    array('img' => 'PTTESDCRLID-V-1_800x800.jpg', 'name' => '8–32OZ PET Clear Tamper Evident Square Deli Container Deep Recessed Vented Lid', 'slug' => '8-32oz-pet-square-deli-vented'),
                    array('img' => 'RPTTE76-48JSV-1_800x800.jpg', 'name' => '7 X 6 48OZ RPET Clear Hinged Tamper Evident Container Vented Lid', 'slug' => '7x6-48oz-rpet-hinged-vented'),
                    array('img' => 'RPTTE76-4CTV-1_800x800.jpg', 'name' => '7 X 6 35 OZ 4 Cell RPET Clear Hinged Tamper Evident Container – Vented Lid', 'slug' => '7x6-35oz-4-cell-rpet-vented'),
                    array('img' => 'RPTTE76-24HTV-1_800x800.jpg', 'name' => '7 X 6 24OZ RPET Clear Hinged Tamper Evident Container – Vented Lid', 'slug' => '7x6-24oz-rpet-hinged-vented'),
                    array('img' => 'RPTTE76-32HV-1_800x800.jpg', 'name' => '7 X 6 32OZ RPET Clear Hinged Tamper Evident Container – Vented Lid', 'slug' => '7x6-32oz-rpet-hinged-vented'),
                    array('img' => 'RPTTE16SWHV-1.jpg', 'name' => '16 OZ RPET Clear Hinged Vented Lid Tamper Evident Smooth Wall Heavy Container', 'slug' => '16-oz-rpet-smooth-wall-heavy-vented'),
                    array('img' => 'RPTTE20NSW-1.jpg', 'name' => '20 OZ RPET Clear Hinged Vented Lid Tamper Evident Smooth Wall Container', 'slug' => '20-oz-rpet-smooth-wall-vented'),
                    array('img' => 'RPTTEFPC-09V.jpg', 'name' => 'PET Tamper Evident Flat Panel Vented Parfait Cup 9 OZ', 'slug' => 'pet-flat-panel-vented-parfait-9oz'),
                    array('img' => 'RPTTEFPC-11V.png', 'name' => 'PET Tamper Evident Flat Panel Vented Parfait Cup 11 OZ', 'slug' => 'pet-flat-panel-vented-parfait-11oz'),
                    array('img' => 'RPTTEFPC-13V.jpg', 'name' => 'PET Tamper Evident Flat Panel Vented Parfait Cup 13 OZ', 'slug' => 'pet-flat-panel-vented-parfait-13oz'),
                    array('img' => 'RPTTE6AD-V-N.jpg', 'name' => '6 OZ AD RPET Clear Hinged Lid Vented Tamper Evident Container', 'slug' => '6-oz-ad-rpet-hinged-vented'),
                    array('img' => 'RPTTE4AD-V-N.jpg', 'name' => '4 OZ AD RPET Clear Hinged Lid Vented Tamper Evident Container', 'slug' => '4-oz-ad-rpet-hinged-vented'),
                );
                foreach ($deli_products as $p): ?>
                    <div class="product-card reveal" data-name="<?php echo esc_attr(strtolower($p['name'])); ?>">
                        <div class="product-img-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-arrow">Inquire for Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- KODACUP — Cake & Bakery Containers -->
                <div class="category-section reveal" id="cake-bakery-containers" style="grid-column:1/-1;margin-top:2rem;">
                    <h3 class="category-heading">KODACUP — Cake & Bakery Containers</h3>
                </div>
                <?php
                $bakery_products = array(
                    array('img' => 'KCB-6-1.jpg', 'name' => '6" Round Cake Container', 'slug' => '6-round-cake-container'),
                    array('img' => 'KCB-8-1.jpg', 'name' => '8" Round Cake Container', 'slug' => '8-round-cake-container'),
                    array('img' => 'KCB-10-1.jpg', 'name' => '10" Round Cake Container', 'slug' => '10-round-cake-container'),
                );
                foreach ($bakery_products as $p): ?>
                    <div class="product-card reveal" data-name="<?php echo esc_attr(strtolower($p['name'])); ?>">
                        <div class="product-img-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-arrow">Inquire for Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- KODACUP — Clear Salad Bowls -->
                <div class="category-section reveal" id="clear-salad-bowls" style="grid-column:1/-1;margin-top:2rem;">
                    <h3 class="category-heading">KODACUP — Clear Salad Bowls</h3>
                </div>
                <?php
                $salad_products = array(
                    array('img' => 'KCSB-32-1.jpg', 'name' => '32 OZ PET Clear Salad Bowl', 'slug' => '32-oz-pet-clear-salad-bowl'),
                    array('img' => 'KCSB-48-1.jpg', 'name' => '48 OZ PET Clear Salad Bowl', 'slug' => '48-oz-pet-clear-salad-bowl'),
                    array('img' => 'KCSB-64-1.jpg', 'name' => '64 OZ PET Clear Salad Bowl', 'slug' => '64-oz-pet-clear-salad-bowl'),
                    array('img' => 'KCSB-LID-1.jpg', 'name' => 'PET Clear Salad Bowl Lid', 'slug' => 'pet-clear-salad-bowl-lid'),
                );
                foreach ($salad_products as $p): ?>
                    <div class="product-card reveal" data-name="<?php echo esc_attr(strtolower($p['name'])); ?>">
                        <div class="product-img-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-arrow">Inquire for Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- KODACUP — Deli Containers -->
                <div class="category-section reveal" id="deli-containers" style="grid-column:1/-1;margin-top:2rem;">
                    <h3 class="category-heading">KODACUP — Deli Containers</h3>
                </div>
                <?php
                $koda_deli = array(
                    array('img' => 'KDC-08-1.jpg', 'name' => '8 OZ PET Clear Deli Container', 'slug' => '8-oz-pet-deli-container'),
                    array('img' => 'KDC-12-1.jpg', 'name' => '12 OZ PET Clear Deli Container', 'slug' => '12-oz-pet-deli-container'),
                    array('img' => 'KDC-16-1.jpg', 'name' => '16 OZ PET Clear Deli Container', 'slug' => '16-oz-pet-deli-container'),
                    array('img' => 'KDC-LID-1.jpg', 'name' => 'PET Deli Container Lid', 'slug' => 'pet-deli-container-lid'),
                );
                foreach ($koda_deli as $p): ?>
                    <div class="product-card reveal" data-name="<?php echo esc_attr(strtolower($p['name'])); ?>">
                        <div class="product-img-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-arrow">Inquire for Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- KODACUP — PET Clear Cups -->
                <div class="category-section reveal" id="pet-clear-cups" style="grid-column:1/-1;margin-top:2rem;">
                    <h3 class="category-heading">KODACUP — PET Clear Cups</h3>
                </div>
                <?php
                $pet_cups = array(
                    array('img' => 'KPC-09-1.jpg', 'name' => '9 OZ PET Clear Cup', 'slug' => '9-oz-pet-clear-cup'),
                    array('img' => 'KPC-12-1.jpg', 'name' => '12 OZ PET Clear Cup', 'slug' => '12-oz-pet-clear-cup'),
                    array('img' => 'KPC-16-1.jpg', 'name' => '16 OZ PET Clear Cup', 'slug' => '16-oz-pet-clear-cup'),
                    array('img' => 'KPC-20-1.jpg', 'name' => '20 OZ PET Clear Cup', 'slug' => '20-oz-pet-clear-cup'),
                    array('img' => 'KPC-22-1.jpg', 'name' => '22 OZ PET Clear Cup', 'slug' => '22-oz-pet-clear-cup'),
                    array('img' => 'KPC-24-1.jpg', 'name' => '24 OZ PET Clear Cup', 'slug' => '24-oz-pet-clear-cup'),
                    array('img' => 'KPC-32-1.jpg', 'name' => '32 OZ PET Clear Cup', 'slug' => '32-oz-pet-clear-cup'),
                    array('img' => 'KPC-44-1.jpg', 'name' => '44 OZ PET Clear Cup', 'slug' => '44-oz-pet-clear-cup'),
                );
                foreach ($pet_cups as $p): ?>
                    <div class="product-card reveal" data-name="<?php echo esc_attr(strtolower($p['name'])); ?>">
                        <div class="product-img-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="link-arrow">Inquire for Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- KODACUP — PET Cup Lids -->
                <div class="category-section reveal" id="pet-cup-lids" style="grid-column:1/-1;margin-top:2rem;">
                    <h3 class="category-heading">KODACUP — PET Cup Lids</h3>
                </div>
                <?php
                $pet_lids = array(
                    array('img' => 'KPL-98-1.jpg', 'name' => '98mm PET Cup Lid – Flat', 'slug' => '98mm-pet-cup-lid-flat'),
                    array('img' => 'KPL-98D-1.jpg', 'name' => '98mm PET Cup Lid – Dome', 'slug' => '98mm-pet-cup-lid-dome'),
                    array('img' => 'KPL-120-1.jpg', 'name' => '120mm PET Cup Lid', 'slug' => '120mm-pet-cup-lid'),
                );
                foreach ($pet_lids as $p): ?>
                    <div class="product-card reveal" data-name="<?php echo esc_attr(strtolower($p['name'])); ?>">
                        <div class="product-img-wrap">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($p['img']); ?>"
                                alt="<?php echo esc_attr($p['name']); ?>"
                                onerror="this.src='<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png'">
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <?php echo esc_html($p['name']); ?>
                            </h3>
                            <a href="#" class="link-arrow">View Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div><!-- /.product-grid -->

            <script>
                function sortProducts(val) {
                    const grid = document.getElementById('product-grid');
                    const cards = Array.from(grid.querySelectorAll('.product-card'));
                    if (!val) return;
                    cards.sort((a, b) => {
                        const na = a.dataset.name || '';
                        const nb = b.dataset.name || '';
                        return val === 'name-desc' ? nb.localeCompare(na) : na.localeCompare(nb);
                    });
                    cards.forEach(c => grid.appendChild(c));
                }
            </script>

        <?php endif; ?>
    </main>

</div><!-- /.content-wrapper -->

<?php get_footer(); ?>