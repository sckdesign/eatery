<?php
/**
 * Category Archive Template
 * Used for blog post category archives.
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <h1><?php single_cat_title(); ?></h1>
        <?php if (category_description()): ?>
            <p><?php echo wp_kses_post(category_description()); ?></p>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:900px;">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article class="reveal" style="background:var(--white);padding:2.5rem;border-radius:var(--radius-lg);border:1px solid var(--border);margin-bottom:2rem;">
                    <span style="color:var(--text-muted);font-size:0.85rem;"><?php echo get_the_date('F j, Y'); ?></span>
                    <h2 style="font-size:1.4rem;margin:0.5rem 0 1rem;">
                        <a href="<?php the_permalink(); ?>" style="color:var(--text-primary);"><?php the_title(); ?></a>
                    </h2>
                    <div style="color:var(--text-secondary);line-height:1.8;margin-bottom:1rem;">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="link-arrow" style="display:inline-flex;">Read More</a>
                </article>
            <?php endwhile; ?>

            <div style="display:flex;justify-content:center;gap:0.5rem;margin-top:2rem;">
                <?php
                $pagination = paginate_links(array(
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'type'      => 'array',
                ));
                if ($pagination) { foreach ($pagination as $link) { echo '<div>' . $link . '</div>'; } }
                ?>
            </div>

        <?php else: ?>
            <div style="text-align:center;padding:4rem 2rem;">
                <p style="color:var(--text-muted);">No posts found in this category.</p>
                <a href="<?php echo esc_url(home_url('/news')); ?>" class="btn" style="margin-top:1.5rem;">View All News</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
