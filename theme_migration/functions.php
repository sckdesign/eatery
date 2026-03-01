<?php
/**
 * Eatery Essentials Theme Functions
 */

// === Theme Setup ===
function eatery_setup()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 55,
        'width' => 200,
        'flex-width' => true,
        'flex-height' => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));

    // WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'eatery-essentials'),
        'footer-menu' => __('Footer Menu', 'eatery-essentials'),
    ));
}
add_action('after_setup_theme', 'eatery_setup');

// === Enqueue Styles & Scripts ===
function eatery_scripts()
{
    // Google Fonts
    wp_enqueue_style(
        'eatery-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@600;700;800;900&display=swap',
        array(),
        null
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        array(),
        '6.5.0'
    );

    // Main Stylesheet
    wp_enqueue_style('eatery-style', get_stylesheet_uri(), array('eatery-google-fonts'), '2.0.0');

    // Main JS
    wp_enqueue_script('eatery-main', get_template_directory_uri() . '/js/main.js', array(), '2.0.0', true);

    // Search overlay (sitewide)
    wp_enqueue_script('eatery-search', get_template_directory_uri() . '/js/search.js', array(), '2.0.0', true);
    wp_localize_script('eatery-search', 'eaterySearchData', array(
        'index' => eatery_get_search_index()
    ));

    // Spec Sheet JS (Conditional for products)
    if (is_singular('product') || is_page_template('page-products.php') || is_tax('product_cat')) {
        wp_enqueue_script('eatery-spec-sheet', get_template_directory_uri() . '/js/spec-sheet.js', array(), '2.0.0', true);
        wp_localize_script('eatery-spec-sheet', 'eateryData', array(
            'themeUrl' => get_template_directory_uri(),
            'logoUrl' => get_template_directory_uri() . '/assets/images/logo-blue_green.png'
        ));
    }
}
add_action('wp_enqueue_scripts', 'eatery_scripts');

/**
 * Generate Search Index for client-side search
 */
function eatery_get_search_index()
{
    $index = array();

    // Static Pages
    $pages = get_pages();
    foreach ($pages as $p) {
        $index[] = array(
            'type' => 'page',
            'title' => $p->post_title,
            'url' => get_permalink($p->ID),
            'keywords' => strtolower($p->post_title) . ' page'
        );
    }

    // Categories (Product Categories)
    $cats = get_terms(array('taxonomy' => 'product_cat', 'hide_empty' => false));
    if (!is_wp_error($cats)) {
        foreach ($cats as $c) {
            $index[] = array(
                'type' => 'category',
                'title' => $c->name,
                'url' => get_term_link($c),
                'keywords' => strtolower($c->name) . ' group section'
            );
        }
    }

    // Products
    $products = get_posts(array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
    foreach ($products as $p) {
        $sku = get_post_meta($p->ID, '_sku', true);
        $index[] = array(
            'type' => 'product',
            'title' => $p->post_title,
            'url' => get_permalink($p->ID),
            'keywords' => strtolower($p->post_title) . ' ' . strtolower($sku)
        );
    }

    return $index;
}

// === Widget Areas ===
function eatery_widgets()
{
    register_sidebar(array(
        'name' => __('Footer Column 1', 'eatery-essentials'),
        'id' => 'footer-1',
        'before_widget' => '<div class="footer-col">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column 2', 'eatery-essentials'),
        'id' => 'footer-2',
        'before_widget' => '<div class="footer-col">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Footer Column 3', 'eatery-essentials'),
        'id' => 'footer-3',
        'before_widget' => '<div class="footer-col">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'name' => __('Shop Sidebar', 'eatery-essentials'),
        'id' => 'shop-sidebar',
        'before_widget' => '<aside class="sidebar-widget reveal">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'eatery_widgets');

// === Custom Excerpt Length & More ===
function eatery_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'eatery_excerpt_length');

function eatery_excerpt_more($more)
{
    return '&hellip;';
}
add_filter('excerpt_more', 'eatery_excerpt_more');

// === Custom Search Form ===
function eatery_search_form($form)
{
    $form = '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <div style="display:flex;gap:0.5rem;">
            <input type="search" class="search-field"
                   placeholder="' . esc_attr__('Search&hellip;', 'eatery-essentials') . '"
                   value="' . get_search_query() . '"
                   name="s"
                   style="flex:1;padding:0.65rem 1rem;border:1px solid var(--border);border-radius:var(--radius-full);font-size:0.9rem;" />
            <button type="submit" class="btn" style="padding:0.65rem 1.25rem;font-size:0.9rem;">' . esc_html__('Search', 'eatery-essentials') . '</button>
        </div>
    </form>';
    return $form;
}
add_filter('get_search_form', 'eatery_search_form');

// === Yoast / SEO: Move title tag meta so WP title-tag handles it ===
function eatery_wp_title($title, $sep)
{
    global $paged, $page;
    if (is_feed())
        return $title;
    $title .= get_bloginfo('name', 'display');
    $site_desc = get_bloginfo('description', 'display');
    if ($site_desc && (is_home() || is_front_page())) {
        $title .= " $sep $site_desc";
    }
    if ($paged >= 2 || $page >= 2) {
        $title .= " $sep " . sprintf(__('Page %s', 'eatery-essentials'), max($paged, $page));
    }
    return $title;
}
add_filter('wp_title', 'eatery_wp_title', 10, 2);

/**
 * Global SEO Meta Tags & JSON-LD
 */
function eatery_seo_meta()
{
    $site_name = get_bloginfo('name');
    $description = get_bloginfo('description');
    $url = get_permalink();
    $image = get_template_directory_uri() . '/assets/images/cover-Grab-N-Go.jpg';

    if (is_front_page()) {
        $description = "Eatery Essentials is a vertically integrated manufacturer of high-quality disposable food service packaging — cups, containers & tamper-evident lids — for food service, processors, supermarkets and C-Stores. Dallas, TX.";
    } elseif (is_singular()) {
        global $post;
        if (!empty($post->post_excerpt)) {
            $description = wp_strip_all_tags($post->post_excerpt);
        } else {
            $description = wp_trim_words(wp_strip_all_tags($post->post_content), 25);
        }
        if (has_post_thumbnail()) {
            $image = get_the_post_thumbnail_url($post->ID, 'large');
        }
    } elseif (is_tax() || is_category()) {
        $term = get_queried_object();
        if ($term && !empty($term->description)) {
            $description = wp_strip_all_tags($term->description);
        }
    }
    ?>
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <meta name="keywords"
        content="disposable packaging, food service packaging, rPET containers, tamper evident lids, plastic cups, food containers, Dallas TX manufacturer">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo esc_attr($site_name); ?>">
    <meta property="og:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta property="og:description" content="<?php echo esc_attr($description); ?>">
    <meta property="og:url" content="<?php echo esc_url($url); ?>">
    <meta property="og:image" content="<?php echo esc_url($image); ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr(wp_get_document_title()); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($description); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($image); ?>">

    <!-- JSON-LD: Breadcrumb -->
    <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "<?php echo esc_url(home_url('/')); ?>"
                }<?php if (!is_front_page()): ?>, {
                            "@type": "ListItem",
                            "position": 2,
                            "name": "<?php echo esc_attr(wp_get_document_title()); ?>",
                            "item": "<?php echo esc_url($url); ?>"
                        }
                <?php endif; ?>]
            }
        </script>

    <?php if (is_front_page()): ?>
        <!-- JSON-LD: LocalBusiness -->
        <script type="application/ld+json">
                    {
                        "@context": "https://schema.org",
                        "@type": "LocalBusiness",
                        "name": "Eatery Essentials, Inc.",
                        "url": "<?php echo esc_url(home_url('/')); ?>",
                        "logo": "<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png",
                        "image": "<?php echo esc_url($image); ?>",
                        "description": "Vertically integrated manufacturer of high-quality disposable food service packaging including rPET cups, containers, and tamper-evident lids.",
                        "address": {
                            "@type": "PostalAddress",
                            "streetAddress": "2425 Danieldale Rd",
                            "addressLocality": "Dallas",
                            "addressRegion": "TX",
                            "postalCode": "75237",
                            "addressCountry": "US"
                        },
                        "telephone": "+14694829066",
                        "email": "sales@eateryessentials.com",
                        "foundingDate": "2015",
                        "areaServed": "North America"
                    }
                </script>
    <?php endif; ?>
<?php
}
add_action('wp_head', 'eatery_seo_meta', 5);

// === Add body class for template ===
function eatery_body_classes($classes)
{
    if (is_page_template('page-products.php')) {
        $classes[] = 'has-sidebar';
    }
    return $classes;
}
add_filter('body_class', 'eatery_body_classes');

// === Image sizes ===
add_image_size('product-card', 500, 500, true);
add_image_size('news-thumbnail', 800, 480, true);
