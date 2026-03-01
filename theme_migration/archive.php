<?php
/**
 * Archive Template — Blog post listing
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <h1>
            <?php
            if (is_category()) {
                single_cat_title();
            } elseif (is_tag()) {
                echo 'Tag: ';
                single_tag_title();
            } elseif (is_author()) {
                echo 'Author: ';
                the_author();
            } elseif (is_year()) {
                the_date('Y');
            } elseif (is_month()) {
                the_date('F Y');
            } else {
                _e('Archives', 'eatery-essentials');
            }
            ?>
        </h1>
        <?php if (get_the_archive_description()): ?>
            <p>
                <?php echo wp_kses_post(get_the_archive_description()); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:900px;">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <article class="reveal"
                    style="background:var(--white);padding:2.5rem;border-radius:var(--radius-lg);border:1px solid var(--border);margin-bottom:2rem;transition:box-shadow var(--transition-base);"
                    onmouseover="this.style.boxShadow='var(--shadow-lg)'" onmouseout="this.style.boxShadow='none'">
                    <?php if (has_post_thumbnail()): ?>
                        <a href="<?php the_permalink(); ?>"
                            style="display:block;border-radius:var(--radius-md);overflow:hidden;margin-bottom:1.5rem;max-height:260px;">
                            <?php the_post_thumbnail('large', array('style' => 'width:100%;height:260px;object-fit:cover;display:block;transition:transform 0.4s ease;', 'onmouseover' => "this.style.transform='scale(1.03)';", 'onmouseout' => "this.style.transform='scale(1)'")); ?>
                        </a>
                    <?php endif; ?>

                    <div style="display:flex;align-items:center;gap:1rem;margin-bottom:0.75rem;">
                        <span style="color:var(--text-muted);font-size:0.85rem;">
                            <?php echo get_the_date('F j, Y'); ?>
                        </span>
                        <?php
                        $cats = get_the_category();
                        if ($cats) {
                            foreach ($cats as $cat) {
                                echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '" style="display:inline-block;background:rgba(0,157,66,0.1);color:var(--primary);padding:0.2rem 0.65rem;border-radius:var(--radius-full);font-size:0.78rem;font-weight:600;">' . esc_html($cat->name) . '</a>';
                            }
                        }
                        ?>
                    </div>

                    <h2 style="font-size:1.4rem;margin:0 0 0.75rem;">
                        <a href="<?php the_permalink(); ?>" style="color:var(--text-primary);">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div style="color:var(--text-secondary);line-height:1.8;margin-bottom:1.25rem;">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="link-arrow" style="display:inline-flex;">Read More</a>
                </article>
            <?php endwhile; ?>

            <!-- Pagination -->
            <div style="display:flex;justify-content:center;gap:0.5rem;margin-top:2rem;">
                <?php
                $pagination = paginate_links(array(
                    'prev_text' => '← Previous',
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
            <div style="text-align:center;padding:4rem 2rem;">
                <p style="font-size:1.1rem;color:var(--text-muted);">No posts found in this archive.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn" style="margin-top:1.5rem;">Back to Home</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>