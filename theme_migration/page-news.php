<?php
/**
 * Template Name: News Page
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <h1>News & Industry Blog</h1>
        <p>Company updates, market insights, and food packaging expertise from our team in Dallas, TX</p>
    </div>
</section>

<!-- Category Filter -->
<div style="background:var(--white);border-bottom:1px solid var(--border);position:sticky;top:72px;z-index:100;">
    <div class="container">
        <div class="blog-filter-tabs" style="display:flex;gap:0;overflow-x:auto;white-space:nowrap;">
            <button class="blog-tab active" data-filter="all" onclick="filterBlog(this,'all')"
                style="padding:1rem 1.5rem;background:none;border:none;border-bottom:3px solid var(--primary);font-weight:600;font-size:0.9rem;cursor:pointer;color:var(--primary);white-space:nowrap;">All
                Posts</button>
            <button class="blog-tab" data-filter="news" onclick="filterBlog(this,'news')"
                style="padding:1rem 1.5rem;background:none;border:none;border-bottom:3px solid transparent;font-weight:500;font-size:0.9rem;cursor:pointer;color:var(--text-muted);white-space:nowrap;">News
                & Industry</button>
            <button class="blog-tab" data-filter="food-safety" onclick="filterBlog(this,'food-safety')"
                style="padding:1rem 1.5rem;background:none;border:none;border-bottom:3px solid transparent;font-weight:500;font-size:0.9rem;cursor:pointer;color:var(--text-muted);white-space:nowrap;">Food
                Safety</button>
            <button class="blog-tab" data-filter="sustainability" onclick="filterBlog(this,'sustainability')"
                style="padding:1rem 1.5rem;background:none;border:none;border-bottom:3px solid transparent;font-weight:500;font-size:0.9rem;cursor:pointer;color:var(--text-muted);white-space:nowrap;">Sustainability</button>
        </div>
    </div>
</div>

<section class="section">
    <div class="container" style="max-width:1000px;">
        <div id="blog-grid" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(290px,1fr));gap:1.75rem;">
            <?php
            // Pull latest blog posts if any exist
            $news_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 12,
                'post_status' => 'publish',
            ));

            if ($news_query->have_posts()):
                while ($news_query->have_posts()):
                    $news_query->the_post();
                    $categories = get_the_category();
                    $cat_slugs = '';
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            $cat_slugs .= ' ' . esc_attr($category->slug);
                        }
                    }
                    ?>
                    <article class="blog-card reveal <?php echo $cat_slugs; ?>" data-category="<?php echo trim($cat_slugs); ?>"
                        style="background:var(--white);border-radius:var(--radius-lg);border:1px solid var(--border);overflow:hidden;transition:box-shadow 0.3s,transform 0.3s;">
                        <a href="<?php the_permalink(); ?>" style="text-decoration:none;color:inherit;">
                            <?php if (has_post_thumbnail()): ?>
                                <div style="overflow:hidden;height:190px;">
                                    <?php the_post_thumbnail('medium_large', array('style' => 'width:100%;height:100%;object-fit:cover;transition:transform 0.4s;')); ?>
                                </div>
                            <?php else: ?>
                                <div
                                    style="overflow:hidden;height:190px;background:#f5f5f5;display:flex;align-items:center;justify-content:center;">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue_green.png"
                                        alt="Eatery Essentials" style="width:120px;opacity:0.3;">
                                </div>
                            <?php endif; ?>
                            <div style="padding:1.5rem;">
                                <div style="display:flex;gap:0.5rem;flex-wrap:wrap;margin-bottom:0.75rem;">
                                    <?php
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            echo '<span style="background:#f0f7ff;color:var(--primary);font-size:0.72rem;font-weight:700;padding:0.2rem 0.6rem;border-radius:50px;text-transform:uppercase;">' . esc_html($category->name) . '</span>';
                                        }
                                    }
                                    ?>
                                </div>
                                <span style="color:var(--text-muted);font-size:0.8rem;"><?php echo get_the_date(); ?></span>
                                <h3 style="font-size:1.1rem;line-height:1.35;margin:0.5rem 0 0.75rem;"><?php the_title(); ?>
                                </h3>
                                <div style="color:var(--text-secondary);font-size:0.9rem;line-height:1.65;">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                </div>
                                <span class="link-arrow" style="margin-top:1rem;display:inline-flex;font-size:0.9rem;">Read More
                                    →</span>
                            </div>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                // Error state or empty
                echo '<p id="blog-empty" style="text-align:center;padding:4rem 0;">No news posts found.</p>';
            endif;
            ?>
        </div>

        <!-- Empty state for JS filtering -->
        <div id="blog-empty-js" style="display:none;text-align:center;padding:4rem 0;color:var(--text-muted);">
            <p style="font-size:1.1rem;">No posts in this category yet. <a href="javascript:void(0)"
                    onclick="filterBlog(document.querySelector('[data-filter=all]'),'all');return false;"
                    style="color:var(--primary);">View all posts</a></p>
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="container reveal">
        <h2>Stay Connected</h2>
        <p>Contact us for the latest product updates and industry news.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-white">Get in Touch</a>
    </div>
</section>

<script>
    function filterBlog(btn, cat) {
        document.querySelectorAll('.blog-tab').forEach(t => {
            t.style.borderBottomColor = 'transparent';
            t.style.color = 'var(--text-muted)';
            t.style.fontWeight = '500';
        });
        btn.style.borderBottomColor = 'var(--primary)';
        btn.style.color = 'var(--primary)';
        btn.style.fontWeight = '600';

        const cards = document.querySelectorAll('.blog-card');
        let visible = 0;
        cards.forEach(c => {
            const cats = (c.dataset.category || '').split(' ');
            const show = cat === 'all' || cats.includes(cat);
            c.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        document.getElementById('blog-empty-js').style.display = visible === 0 ? 'block' : 'none';

        // Re-trigger reveal animation for visible cards
        if (typeof reveal === 'function') {
            reveal();
        }
    }

    document.querySelectorAll('.blog-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.boxShadow = '0 12px 40px rgba(0,0,0,0.10)';
            card.style.transform = 'translateY(-4px)';
            const img = card.querySelector('img');
            if (img) img.style.transform = 'scale(1.05)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.boxShadow = '';
            card.style.transform = '';
            const img = card.querySelector('img');
            if (img) img.style.transform = '';
        });
    });
</script>

<?php get_footer(); ?>