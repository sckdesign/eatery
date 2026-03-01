<?php
/**
 * Template Name: Instructional Videos Page
 */
get_header(); ?>

<section class="video-hero">
    <div class="container reveal">
        <span class="section-subtitle" style="color: #fff; border-color: #fff;">RESOURCES</span>
        <h1>Instructional Videos</h1>
        <p>Step-by-step guides for using Eatery Essentials products and machinery.</p>
    </div>
</section>

<section class="video-section">
    <div class="container">

        <div class="product-grid" style="margin-top: 3rem;">

            <?php
            $videos = [
                [
                    'title' => 'BUT-N-LOC Instructional Videos 1 (English)',
                    'desc' => 'Watch our step-by-step guide for using BUT-N-LOC products.',
                    'src' => 'https://eateryessentials.com/wp-content/uploads/2020/12/Close-TE1-Eng.mp4',
                    'poster' => 'download-bar.jpg',
                ],
                [
                    'title' => 'BUT-N-LOC Instructional Videos 2 (English)',
                    'desc' => 'Watch our step-by-step guide for using BUT-N-LOC products.',
                    'src' => 'https://eateryessentials.com/wp-content/uploads/2020/12/Close-TE2-Eng.mp4',
                    'poster' => 'download-bar.jpg',
                ],
                [
                    'title' => 'BUT-N-LOC Instructional Videos 1 (Spanish)',
                    'desc' => 'Nuestra guía paso a paso para usar los productos BUT-N-LOC.',
                    'src' => 'https://eateryessentials.com/wp-content/uploads/2020/12/Close-TE1-Spanish.mp4',
                    'poster' => 'download-bar.jpg',
                ],
                [
                    'title' => 'BUT-N-LOC Instructional Videos 2 (Spanish)',
                    'desc' => 'Nuestra guía paso a paso para usar los productos BUT-N-LOC.',
                    'src' => 'https://eateryessentials.com/wp-content/uploads/2020/12/Close-TE2-Spanish.mp4',
                    'poster' => 'download-bar.jpg',
                ],
            ];

            foreach ($videos as $video): ?>
                <div class="product-card video-card" style="grid-column: span 2;">
                    <div class="video-container"
                        style="background:#000; border-radius:8px 8px 0 0; overflow:hidden; aspect-ratio:16/9; position:relative;">
                        <video controls
                            poster="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($video['poster']); ?>"
                            style="width:100%; height:100%; display:block; object-fit:cover;">
                            <source src="<?php echo esc_url($video['src']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    <div class="product-info">
                        <h3 class="product-title"><?php echo esc_html($video['title']); ?></h3>
                        <p style="font-size:0.9rem; color:var(--text-secondary); margin-top:0.5rem;">
                            <?php echo esc_html($video['desc']); ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="content-area" style="margin-top: 4rem;">
            <?php
            while (have_posts()):
                the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>