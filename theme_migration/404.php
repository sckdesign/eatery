<?php
/**
 * 404 Error Page Template
 */
get_header();
?>

<section class="page-hero">
    <div class="container">
        <h1>Page Not Found</h1>
        <p>The page you're looking for doesn't exist or has been moved.</p>
    </div>
</section>

<section class="section">
    <div class="container text-center">
        <div class="reveal active" style="max-width:600px;margin:0 auto;">
            <div
                style="font-size:8rem;font-weight:900;background:var(--accent-gradient);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;line-height:1;margin-bottom:1.5rem;">
                404</div>
            <p style="font-size:1.1rem;color:var(--text-secondary);line-height:1.8;margin-bottom:2.5rem;">Sorry, we
                couldn't find what you were looking for. The page may have been removed, renamed, or is temporarily
                unavailable.</p>
            <div style="display:flex;gap:1rem;justify-content:center;flex-wrap:wrap;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn">Back to Home</a>
                <a href="<?php echo esc_url(home_url('/products')); ?>" class="btn btn-outline">View Products</a>
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-secondary">Contact Us</a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>