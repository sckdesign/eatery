<?php
/**
 * Sidebar Template
 * Used by products pages and any template that calls get_sidebar()
 */
?>
<aside class="sidebar">

    <?php if (is_active_sidebar('shop-sidebar')): ?>
        <?php dynamic_sidebar('shop-sidebar'); ?>
    <?php else: ?>

        <!-- Default sidebar content: category navigation -->
        <div class="sidebar-widget">
            <h3 class="widget-title">Categories</h3>
            <?php if (class_exists('WooCommerce')): ?>
                <ul class="widget-menu">
                    <?php
                    $product_cats = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'orderby' => 'name',
                        'hide_empty' => true,
                    ));
                    if (!is_wp_error($product_cats)):
                        foreach ($product_cats as $cat): ?>
                            <li><a href="<?php echo esc_url(get_term_link($cat)); ?>">
                                    <?php echo esc_html($cat->name); ?>
                                </a></li>
                        <?php endforeach;
                    endif; ?>
                </ul>
            <?php else: ?>
                <ul class="widget-menu">
                    <li style="font-weight:700;color:var(--text-primary);padding:0.3rem 0;margin-top:0.5rem;">BUT-N-LOC</li>
                    <li><a href="<?php echo esc_url(home_url('/products#tamper-evident-hinged-lid-containers')); ?>">Hinged Lid
                            Containers</a></li>
                    <li><a href="<?php echo esc_url(home_url('/products#tamper-evident-square-bowls')); ?>">Square Bowls</a>
                    </li>
                    <li><a href="<?php echo esc_url(home_url('/products#tamper-evident-square-deli-containers')); ?>">Square
                            Deli Containers</a></li>
                    <li style="font-weight:700;color:var(--text-primary);padding:0.3rem 0;margin-top:0.75rem;">KODACUP</li>
                    <li><a href="<?php echo esc_url(home_url('/products#cake-bakery-containers')); ?>">Cake & Bakery</a>
                    </li>
                    <li><a href="<?php echo esc_url(home_url('/products#clear-salad-bowls')); ?>">Clear Salad Bowls</a></li>
                    <li><a href="<?php echo esc_url(home_url('/products#deli-containers')); ?>">Deli Containers</a></li>
                    <li><a href="<?php echo esc_url(home_url('/products#pet-clear-cups')); ?>">PET Clear Cups</a></li>
                    <li><a href="<?php echo esc_url(home_url('/products#pet-cup-lids')); ?>">PET Cup Lids</a></li>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Request a Sample -->
        <div class="sidebar-widget"
            style="background:var(--accent-gradient);border-radius:var(--radius-lg);padding:1.5rem;color:#fff;margin-top:1.5rem;text-align:center;">
            <h4 style="font-size:1rem;font-weight:700;margin-bottom:0.5rem;color:#fff;">Request a Sample</h4>
            <p style="font-size:0.85rem;opacity:0.9;margin-bottom:1rem;">Get a free product sample to evaluate quality
                before ordering.</p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-white"
                style="font-size:0.82rem;padding:0.6rem 1.25rem;">Request Now</a>
        </div>

        <div class="sidebar-widget" style="margin-top:1.5rem;">
            <h3 class="widget-title">Certifications</h3>
            <div style="display:flex;flex-direction:column;gap:1rem;margin-top:1rem;align-items:center;">
                <a href="https://www.iddba.org/" target="_blank"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/IDDBAlogo-removebg-preview.png"
                        alt="IDDBA" style="max-width:240px;height:auto;"></a>
                <a href="https://www.freshproduce.com/" target="_blank"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/International-Fresh-Produce-Association-logo-removebg-preview.png"
                        alt="IFPA" style="max-width:240px;height:auto;"></a>
                <a href="https://cpma.ca/" target="_blank"><img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/CPMA-282x137-c-center-removebg-preview.png"
                        alt="CPMA" style="max-width:240px;height:auto;"></a>
            </div>
        </div>

    <?php endif; ?>
</aside>