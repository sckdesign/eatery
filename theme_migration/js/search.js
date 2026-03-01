/**
 * Eatery Essentials — Client-Side Search Engine (WP Version)
 * Uses localized index from PHP (eaterySearchData.index)
 */

(function () {
    'use strict';

    /* ─── Search Index ───────────────────────────────────────────────── */
    // eaterySearchData is provided via wp_localize_script in functions.php
    const SEARCH_INDEX = (typeof eaterySearchData !== 'undefined' && eaterySearchData.index)
        ? eaterySearchData.index
        : [];

    /* ─── Category labels ────────────────────────────────────────────── */
    const TYPE_LABELS = {
        page: 'Page',
        resource: 'Resource',
        category: 'Category',
        product: 'Product',
    };

    /* ─── Score & filter ─────────────────────────────────────────────── */
    function score(item, query) {
        const q = query.toLowerCase().trim();
        if (!q) return 0;
        const t = item.title.toLowerCase();
        const k = item.keywords.toLowerCase();
        if (t === q) return 100;
        if (t.startsWith(q)) return 80;
        if (t.includes(q)) return 60;
        if (k.includes(q)) return 40;

        const words = q.split(' ');
        const hit = words.every(w => t.includes(w) || k.includes(w));
        return hit ? 20 : 0;
    }

    function search(query) {
        return SEARCH_INDEX
            .map(item => ({ item, s: score(item, query) }))
            .filter(r => r.s > 0)
            .sort((a, b) => b.s - a.s)
            .slice(0, 10)
            .map(r => r.item);
    }

    function highlight(text, query) {
        if (!query) return text;
        const re = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
        return text.replace(re, '<mark>$1</mark>');
    }

    /* ─── Overlay HTML ───────────────────────────────────────────────── */
    const overlayHTML = `
    <div id="search-overlay" role="dialog" aria-modal="true" aria-label="Site Search">
        <div id="search-overlay-inner">
            <button id="search-close" aria-label="Close search">✕</button>
            <div id="search-box-wrap">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text" id="search-input" placeholder="Search products, pages, resources…" autocomplete="off" spellcheck="false">
                <kbd id="search-esc-hint">ESC</kbd>
            </div>
            <div id="search-results" role="listbox"></div>
            <p id="search-hint">Start typing to search across all products and pages</p>
        </div>
    </div>`;

    const overlayStyles = `
    #search-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.75);
        backdrop-filter: blur(6px);
        z-index: 9999;
        padding: 2rem 1rem;
        animation: searchFadeIn 0.15s ease;
    }
    #search-overlay.active { display: flex; align-items: flex-start; justify-content: center; }
    @keyframes searchFadeIn { from { opacity:0; } to { opacity:1; } }
    #search-overlay-inner {
        background: #fff;
        border-radius: 12px;
        width: 100%;
        max-width: 640px;
        padding: 1.5rem;
        margin-top: 6rem;
        box-shadow: 0 25px 60px rgba(0,0,0,0.35);
        position: relative;
    }
    #search-close {
        position: absolute;
        top: 1rem; right: 1rem;
        background: none; border: none;
        font-size: 1.2rem; cursor: pointer;
        color: #888; line-height: 1;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
    }
    #search-close:hover { background: #f0f0f0; color: #333; }
    #search-box-wrap {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border-bottom: 2px solid #e0e0e0;
        padding-bottom: 1rem;
        margin-bottom: 1rem;
    }
    #search-box-wrap svg { flex-shrink: 0; color: #999; }
    #search-input {
        flex: 1;
        border: none;
        outline: none;
        font-size: 1.1rem;
        font-family: inherit;
        color: #1a1a2e;
        background: transparent;
    }
    #search-esc-hint {
        background: #f4f4f4;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 2px 6px;
        font-size: 0.7rem;
        color: #999;
        font-family: monospace;
    }
    #search-results { list-style: none; margin: 0; padding: 0; max-height: 360px; overflow-y: auto; }
    .search-result-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 0.5rem;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
        transition: background 0.1s;
    }
    .search-result-item:hover,
    .search-result-item.active { background: #f0f8ff; }
    .search-result-badge {
        font-size: 0.65rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 2px 7px;
        border-radius: 999px;
        white-space: nowrap;
        flex-shrink: 0;
    }
    .badge-page     { background: #e8f0fe; color: #1a73e8; }
    .badge-resource { background: #e6f4ea; color: #188038; }
    .badge-category { background: #fce8e6; color: #c5221f; }
    .badge-product  { background: #fef7e0; color: #b06000; }
    .search-result-title { font-size: 0.95rem; font-weight: 500; }
    .search-result-title mark { background: #fff3cd; border-radius: 2px; }
    #search-hint { text-align: center; color: #aaa; font-size: 0.85rem; margin-top: 0.5rem; }
    #search-no-results { text-align: center; color: #999; padding: 2rem; font-size: 0.95rem; }
    .search-icon-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.4rem;
        color: inherit;
        display: flex;
        align-items: center;
        opacity: 0.8;
        transition: opacity 0.2s;
    }
    .search-icon-btn:hover { opacity: 1; }
    `;

    /* ─── Init ───────────────────────────────────────────────────────── */
    function init() {
        const existingOverlay = document.getElementById('search-overlay');
        if (existingOverlay) return;

        const style = document.createElement('style');
        style.id = 'search-overlay-styles';
        style.textContent = overlayStyles;
        document.head.appendChild(style);

        document.body.insertAdjacentHTML('beforeend', overlayHTML);

        const overlay = document.getElementById('search-overlay');
        const input = document.getElementById('search-input');
        const results = document.getElementById('search-results');
        const hint = document.getElementById('search-hint');
        const closeBtn = document.getElementById('search-close');

        // Search icon click listener
        document.addEventListener('click', e => {
            if (e.target.closest('.search-icon-btn')) {
                e.preventDefault();
                openOverlay();
            }
        });

        document.addEventListener('keydown', e => {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') { e.preventDefault(); openOverlay(); }
            if (e.key === 'Escape') closeOverlay();
        });

        closeBtn.addEventListener('click', closeOverlay);
        overlay.addEventListener('click', e => { if (e.target === overlay) closeOverlay(); });

        let debounceTimer;
        input.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => renderResults(input.value), 120);
        });

        input.addEventListener('keydown', e => {
            const items = results.querySelectorAll('.search-result-item');
            const active = results.querySelector('.search-result-item.active');
            if (e.key === 'ArrowDown') {
                e.preventDefault();
                const next = active ? active.nextElementSibling : items[0];
                if (next) { active && active.classList.remove('active'); next.classList.add('active'); next.scrollIntoView({ block: 'nearest' }); }
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                const prev = active ? active.previousElementSibling : items[items.length - 1];
                if (prev) { active && active.classList.remove('active'); prev.classList.add('active'); prev.scrollIntoView({ block: 'nearest' }); }
            } else if (e.key === 'Enter') {
                const target = active || items[0];
                if (target) { target.click(); }
            }
        });

        function openOverlay() {
            overlay.classList.add('active');
            setTimeout(() => input.focus(), 50);
        }

        function closeOverlay() {
            overlay.classList.remove('active');
            input.value = '';
            results.innerHTML = '';
            hint.style.display = '';
        }

        function renderResults(query) {
            results.innerHTML = '';
            if (!query.trim()) {
                hint.style.display = '';
                return;
            }
            hint.style.display = 'none';
            const matches = search(query);
            if (!matches.length) {
                results.innerHTML = `<div id="search-no-results">No results found for "<strong>${escHtml(query)}</strong>"</div>`;
                return;
            }
            matches.forEach(item => {
                const a = document.createElement('a');
                a.className = 'search-result-item';
                a.href = item.url;
                a.innerHTML = `
                    <span class="search-result-badge badge-${item.type}">${TYPE_LABELS[item.type]}</span>
                    <span class="search-result-title">${highlight(escHtml(item.title), escHtml(query))}</span>
                `;
                results.appendChild(a);
            });
        }

        function escHtml(s) {
            return s.replace(/&/g, '&').replace(/</g, '&lt;').replace(/>/g, '&gt;');
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
