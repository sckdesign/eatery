<!-- CTA Banner -->
<section class="cta-banner">
    <div class="container reveal">
        <h2>Ready to Find the Right Packaging?</h2>
        <p>Contact our team to discuss your specific requirements and receive a custom quote.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-white">Get in Touch</a>
    </div>
</section>

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-col">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-white.png"
                    alt="<?php bloginfo('name'); ?>" class="footer-logo">
                <p>Innovative disposable packaging solutions for food service, processors, supermarkets and C-Stores.
                </p>
                <p style="margin-top: 1rem;">2425 Danieldale Rd<br>Dallas, TX 75237</p>
                <p>info@eateryessentials.com</p>
                <div class="social-links">
                    <a href="https://facebook.com/eateryessentials" target="_blank" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://linkedin.com/company/eateryessentials" target="_blank" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a href="https://twitter.com/eateryessentials" target="_blank" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Products</h4>
                <?php if (is_active_sidebar('footer-1')): ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url(home_url('/product-category/plastic-line')); ?>">Plastic Line</a>
                    <a href="<?php echo esc_url(home_url('/products')); ?>">Paper Line</a>
                    <a href="<?php echo esc_url(home_url('/product-category/grab-go')); ?>">Grab & Go</a>
                    <a href="<?php echo esc_url(home_url('/product-category/but-n-loc')); ?>">Closing Machines</a>
                <?php endif; ?>
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <?php if (is_active_sidebar('footer-2')): ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a>
                    <a href="<?php echo esc_url(home_url('/sustainability')); ?>">Sustainability</a>
                    <a href="<?php echo esc_url(home_url('/careers')); ?>">Careers</a>
                    <a href="<?php echo esc_url(home_url('/news')); ?>">News</a>
                <?php endif; ?>
            </div>
            <div class="footer-col">
                <h4>Resources</h4>
                <?php if (is_active_sidebar('footer-3')): ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else: ?>
                    <a href="<?php echo esc_url(home_url('/catalog')); ?>">Catalog</a>
                    <a href="<?php echo esc_url(home_url('/sales-sheets')); ?>">Sales Sheets</a>
                    <a href="<?php echo esc_url(home_url('/instructional-videos')); ?>">Videos</a>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="copyright">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>