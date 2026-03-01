<?php
/**
 * Generic Page Template
 * Fallback for any WordPress page without a custom template.
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <?php if (has_excerpt()): ?>
            <p><?php echo wp_kses_post(get_the_excerpt()); ?></p>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="container" style="max-width:900px;">
        <?php while (have_posts()):
            the_post(); ?>
            <article class="reveal active">
                <?php if (has_post_thumbnail()): ?>
                    <div style="margin-bottom:2.5rem;border-radius:var(--radius-lg);overflow:hidden;">
                        <?php the_post_thumbnail('large', array('style' => 'width:100%;height:auto;display:block;')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content" style="padding:0;max-width:none;">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>