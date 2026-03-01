<?php
/**
 * Custom Search Form (used by get_search_form())
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div
        style="display:flex; max-width:560px; margin:0 auto; background:white; border-radius:999px; overflow:hidden; box-shadow:0 8px 25px rgba(0,0,0,0.15);">
        <label class="screen-reader-text" for="s">
            <?php esc_html_e('Search for:', 'eateryessentials'); ?>
        </label>
        <input type="search" id="s" name="s" value="<?php echo esc_attr(get_search_query()); ?>"
            placeholder="<?php esc_attr_e('Search products, pages…', 'eateryessentials'); ?>"
            style="flex:1; padding:0.9rem 1.5rem; border:none; outline:none; font-size:1rem; font-family:inherit; color:#1a1a2e; background:transparent;">
        <button type="submit"
            style="padding:0.9rem 1.5rem; background:var(--primary); border:none; color:white; cursor:pointer; font-size:1rem; transition:background 0.2s;"
            onmouseover="this.style.background='var(--secondary)'" onmouseout="this.style.background='var(--primary)'"
            aria-label="<?php esc_attr_e('Search', 'eateryessentials'); ?>">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
        </button>
    </div>
</form>