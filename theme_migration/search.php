<?php
/**
 * Search Results Template
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <h1>Search Results</h1>
        <?php if (get_search_query()): ?>
            <p>Results for: <strong>"
                    <?php echo esc_html(get_search_query()); ?>"
                </strong></p>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:900px;">

        <!-- Search form -->
        <div class="reveal" style="margin-bottom:3rem;">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>"
                style="display:flex;gap:0.75rem;max-width:600px;margin:0 auto;">
                <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>"
                    placeholder="Search products, news..."
                    style="flex:1;padding:0.85rem 1.25rem;border:1px solid var(--border);border-radius:var(--radius-full);font-size:1rem;outline:none;transition:border-color var(--transition-fast);"
                    onfocus="this.style.borderColor='var(--primary)'" onblur="this.style.borderColor='var(--border)'">
                <button type="submit" class="btn" style="white-space:nowrap;">Search</button>
            </form>
        </div>

        <?php if (have_posts()): ?>
            <p style="color:var(--text-muted);font-size:0.9rem;margin-bottom:2rem;">
                Found
                <?php echo esc_html($wp_query->found_posts); ?> result
                <?php echo $wp_query->found_posts !== 1 ? 's' : ''; ?>
            </p>

            <?php while (have_posts()):
                the_post(); ?>
                <article class="reveal"
                    style="background:var(--white);padding:2rem 2.5rem;border-radius:var(--radius-lg);border:1px solid var(--border);margin-bottom:1.5rem;">
                    <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.5rem;">
                        <span
                            style="background:rgba(0,157,66,0.1);color:var(--primary);padding:0.2rem 0.65rem;border-radius:var(--radius-full);font-size:0.75rem;font-weight:700;text-transform:uppercase;letter-spacing:0.5px;">
                            <?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?>
                        </span>
                        <span style="color:var(--text-muted);font-size:0.82rem;">
                            <?php echo get_the_date('F j, Y'); ?>
                        </span>
                    </div>
                    <h2 style="font-size:1.2rem;margin:0 0 0.6rem;">
                        <a href="<?php the_permalink(); ?>" style="color:var(--text-primary);">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div style="color:var(--text-secondary);font-size:0.95rem;line-height:1.7;margin-bottom:1rem;">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="link-arrow" style="display:inline-flex;">View</a>
                </article>
            <?php endwhile; ?>

            <!-- Pagination -->
            <div style="display:flex;justify-content:center;gap:0.5rem;margin-top:2rem;">
                <?php
                $pagination = paginate_links(array(
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'type' => 'array',
                    'add_args' => array('s' => get_search_query()),
                ));
                if ($pagination) {
                    foreach ($pagination as $link) {
                        echo '<div>' . $link . '</div>';
                    }
                }
                ?>
            </div>

        <?php else: ?>
            <div style="text-align:center;padding:4rem 2rem;">
                <div style="font-size:5rem;margin-bottom:1rem;">🔍</div>
                <h2 style="margin-bottom:0.75rem;">No results found</h2>
                <p style="color:var(--text-secondary);margin-bottom:2rem;">
                    We couldn't find anything matching <strong>"
                        <?php echo esc_html(get_search_query()); ?>"
                    </strong>.<br>
                    Try different keywords, or browse our products and news pages.
                </p>
                <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                    <a href="<?php echo esc_url(home_url('/products')); ?>" class="btn">Browse Products</a>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline">Contact Us</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>