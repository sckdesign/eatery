<?php
/**
 * Template Name: Contact Page
 */
get_header(); ?>

<style>
    .page-hero {
        position: relative;
        height: 320px;
        margin-top: var(--nav-height);
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .page-hero__bg {
        position: absolute;
        inset: 0;
        background: url('<?php echo get_template_directory_uri(); ?>/assets/images/ee-factory-2.jpg') center / cover no-repeat;
        filter: brightness(0.45);
    }

    .page-hero__content {
        position: relative;
        z-index: 2;
        padding: 0 2rem;
        max-width: var(--max-width);
        margin: 0 auto;
        width: 100%;
    }

    .page-hero__breadcrumb {
        font-size: 0.78rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 0.75rem;
    }

    .page-hero__breadcrumb span {
        color: var(--primary);
    }

    .page-hero h1 {
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        color: #fff;
        line-height: 1.15;
        margin-bottom: 0.75rem;
    }

    .page-hero p {
        color: rgba(255, 255, 255, 0.75);
        font-size: 1.05rem;
        max-width: 550px;
    }

    .contact-body {
        padding: 5rem 2rem;
        max-width: var(--max-width);
        margin: 0 auto;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 360px 1fr;
        gap: 4rem;
        align-items: start;
    }

    .contact-sidebar-card {
        background: var(--bg-light);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 2.5rem;
    }

    .contact-sidebar-card h3 {
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 0.35rem;
    }

    .contact-sidebar-card address {
        font-style: normal;
        color: var(--text-secondary);
        line-height: 1.8;
        font-size: 0.95rem;
    }

    .contact-divider {
        border: 0;
        border-top: 1px solid var(--border);
        margin: 1.75rem 0;
    }

    .dept-label {
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--primary);
        margin-bottom: 1.5rem;
    }

    .dept-row {
        margin-bottom: 1.25rem;
    }

    .dept-row span {
        display: block;
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--dark);
        margin-bottom: 0.2rem;
    }

    .dept-row a {
        font-size: 0.9rem;
        color: var(--primary);
        text-decoration: none;
    }

    .contact-form-panel h2 {
        font-size: 2rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .contact-form-panel .lead {
        color: var(--text-secondary);
        font-size: 1rem;
        margin-bottom: 2.5rem;
        line-height: 1.6;
    }

    .form-card {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 3rem;
        box-shadow: var(--shadow-md);
    }

    .form-row-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    .field {
        margin-bottom: 1.25rem;
    }

    .field label {
        display: block;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.4rem;
    }

    .field input,
    .field select,
    .field textarea {
        width: 100%;
        padding: 0.85rem 1.1rem;
        border: 1.5px solid #e2e8f0;
        border-radius: 10px;
        font-family: inherit;
        font-size: 0.95rem;
        background: var(--bg-light);
        transition: border-color 0.2s;
        box-sizing: border-box;
    }

    .field input:focus,
    .field select:focus,
    .field textarea:focus {
        outline: none;
        border-color: var(--primary);
        background: #fff;
    }

    .field textarea {
        resize: vertical;
        min-height: 130px;
    }

    .btn-submit-contact {
        width: 100%;
        padding: 1rem 2rem;
        background: var(--accent-gradient);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 1rem;
        font-weight: 700;
        font-family: inherit;
        cursor: pointer;
        transition: opacity 0.2s, transform 0.2s;
        margin-top: 0.5rem;
    }

    .btn-submit-contact:hover {
        opacity: 0.9;
        transform: translateY(-1px);
    }

    @media (max-width: 900px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }

        .form-row-2 {
            grid-template-columns: 1fr;
        }

        .page-hero {
            height: 260px;
        }
    }
</style>

<section class="page-hero">
    <div class="page-hero__bg"></div>
    <div class="page-hero__content">
        <h1>Get in Touch</h1>
        <p>Questions about our rPET products, samples, or manufacturing capabilities? Our team is ready to help.</p>
    </div>
</section>

<div class="contact-body">
    <div class="contact-grid">

        <aside class="reveal-left">
            <div class="contact-sidebar-card">
                <h3>Dallas, Texas</h3>
                <address>
                    2425 Danieldale Rd<br>
                    Dallas, TX 75237<br><br>
                    PO Box 593<br>
                    Desoto, TX 75123
                </address>
                <p style="margin-top:1rem;"><i class="fas fa-phone"
                        style="color:var(--primary);margin-right:8px;"></i>(469) 482-9066</p>
                <p style="margin-top:0.5rem;"><i class="fas fa-fax"
                        style="color:var(--primary);margin-right:8px;"></i>(801) 742-5398</p>

                <hr class="contact-divider">

                <p class="dept-label">Departments</p>
                <div class="dept-row">
                    <span>General Inquiries / Sales</span>
                    <a href="mailto:sales@eateryessentials.com">sales@eateryessentials.com</a><br>
                    <a href="tel:+14694829066" style="color:var(--text-secondary); font-size:0.85rem;">(469)
                        482-9066</a>
                </div>
                <div class="dept-row">
                    <span>Customer Service / Orders</span>
                    <a href="mailto:po@eateryessentials.com">po@eateryessentials.com</a><br>
                    <a href="tel:+14694829066" style="color:var(--text-secondary); font-size:0.85rem;">(469)
                        482-9066</a>
                </div>
                <div class="dept-row">
                    <span>Jobs &amp; Careers</span>
                    <a href="mailto:recruiting@eateryessentials.com">recruiting@eateryessentials.com</a><br>
                    <a href="tel:+14694829066" style="color:var(--text-secondary); font-size:0.85rem;">(469)
                        482-9066</a>
                </div>
                <div class="dept-row">
                    <span>Accounting</span>
                    <a href="mailto:accounting@eateryessentials.com">accounting@eateryessentials.com</a><br>
                    <a href="tel:+14694829069" style="color:var(--text-secondary); font-size:0.85rem;">(469)
                        482-9069</a>
                </div>
            </div>
        </aside>

        <div class="contact-form-panel reveal-right">
            <h2>Send Us a Message</h2>
            <p class="lead">Whether you're setting up new product lines or sourcing rPET packaging at scale, our
                specialists will respond within one business day.</p>

            <div class="form-card">
                <?php if (shortcode_exists('contact-form-7')): ?>
                    <?php echo do_shortcode('[contact-form-7 id="contact-form" title="Contact Page Form"]'); ?>
                <?php else: ?>
                    <form id="contact-inquiry-form" novalidate>
                        <div class="form-row-2">
                            <div class="field">
                                <label for="c-first">First Name *</label>
                                <input type="text" id="c-first" name="first_name" placeholder="John" required>
                            </div>
                            <div class="field">
                                <label for="c-last">Last Name *</label>
                                <input type="text" id="c-last" name="last_name" placeholder="Doe" required>
                            </div>
                        </div>
                        <div class="form-row-2">
                            <div class="field">
                                <label for="c-email">Business Email *</label>
                                <input type="email" id="c-email" name="email" placeholder="email@company.com" required>
                            </div>
                            <div class="field">
                                <label for="c-phone">Phone</label>
                                <input type="tel" id="c-phone" name="phone" placeholder="(555) 000-0000">
                            </div>
                        </div>
                        <div class="field">
                            <label for="c-company">Company / Organization *</label>
                            <input type="text" id="c-company" name="company" placeholder="Your company name" required>
                        </div>
                        <div class="field">
                            <label for="c-subject">Nature of Inquiry</label>
                            <select id="c-subject" name="subject">
                                <option value="product">Product Inquiry (Stock Line)</option>
                                <option value="sample">Sample Request</option>
                                <option value="oem">Custom / OEM Manufacturing</option>
                                <option value="pricing">Pricing &amp; Volume Discount</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="c-message">Message *</label>
                            <textarea id="c-message" name="message" placeholder="Tell us how we can help..."
                                required></textarea>
                        </div>
                        <button type="submit" class="btn-submit-contact">Submit Inquiry &rarr;</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>