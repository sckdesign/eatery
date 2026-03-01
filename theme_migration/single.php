<?php
/**
 * Single Post Template
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <h1>
            <?php the_title(); ?>
        </h1>
        <p>
            <?php echo get_the_date('F j, Y'); ?>
            <?php if (get_the_author()): ?>
                &mdash; by
                <?php the_author(); ?>
            <?php endif; ?>
        </p>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:800px;">
        <?php while (have_posts()):
            the_post(); ?>
            <article class="reveal active">
                <?php if (has_post_thumbnail()): ?>
                    <div style="margin-bottom:2rem;border-radius:var(--radius-lg);overflow:hidden;">
                        <?php the_post_thumbnail('large', array('style' => 'width:100%;height:auto;display:block;')); ?>
                    </div>
                <?php endif; ?>

                <?php if (has_category()): ?>
                    <div style="margin-bottom:1.5rem;">
                        <?php
                        $categories = get_the_category();
                        foreach ($categories as $cat) {
                            echo '<span style="display:inline-block;background:rgba(0,157,66,0.1);color:var(--primary);padding:0.25rem 0.75rem;border-radius:var(--radius-full);font-size:0.8rem;font-weight:600;margin-right:0.5rem;">' . esc_html($cat->name) . '</span>';
                        }
                        ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="font-size:1.05rem;line-height:1.9;color:var(--text-secondary);">
                    <?php the_content(); ?>
                </div>

                <?php if (has_tag()): ?>
                    <div style="margin-top:2rem;padding-top:1.5rem;border-top:1px solid var(--border);">
                        <strong
                            style="font-size:0.85rem;text-transform:uppercase;letter-spacing:1px;color:var(--text-muted);">Tags:</strong>
                        <?php the_tags('<span style="margin-left:0.5rem;">', ', ', '</span>'); ?>
                    </div>
                <?php endif; ?>
            </article>

            <nav
                style="display:flex;justify-content:space-between;margin-top:3rem;padding-top:2rem;border-top:1px solid var(--border);">
                <div>
                    <?php
                    $prev_post = get_previous_post();
                    if ($prev_post):
                        ?>
                        <span style="font-size:0.8rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:1px;">←
                            Previous</span>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>"
                            style="display:block;color:var(--primary);font-weight:600;margin-top:0.25rem;">
                            <?php echo esc_html($prev_post->post_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div style="text-align:right;">
                    <?php
                    $next_post = get_next_post();
                    if ($next_post):
                        ?>
                        <span style="font-size:0.8rem;color:var(--text-muted);text-transform:uppercase;letter-spacing:1px;">Next
                            →</span>
                        <a href="<?php echo get_permalink($next_post->ID); ?>"
                            style="display:block;color:var(--primary);font-weight:600;margin-top:0.25rem;">
                            <?php echo esc_html($next_post->post_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>