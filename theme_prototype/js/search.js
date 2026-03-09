class SearchEngine {
    constructor() {
        this.index = [];
        this.isLoaded = false;

        // Initial detection
        this.updateDOMReferences();

        // Check for index already loaded via <script>
        if (window.SEARCH_INDEX) {
            this.index = window.SEARCH_INDEX;
            this.isLoaded = true;
        }

        this.init();
    }

    updateDOMReferences() {
        this.searchOverlay = document.querySelector('.search-overlay');
        this.searchInput = document.querySelector('.search-input');
        this.resultsPreview = document.querySelector('.search-results-preview');
        this.searchForm = document.querySelector('.search-form');
        this.searchClose = document.querySelector('.search-close');
        this.searchTriggers = document.querySelectorAll('.search-icon-btn');
    }

    async init() {
        // Robust detection: Re-check if elements exist now
        this.updateDOMReferences();

        if (!this.searchOverlay) {
            // Silently wait if not on a page with search
            return;
        }

        // Event Listeners for Triggers
        this.searchTriggers.forEach(btn => {
            // Remove old listeners to prevent duplication if init is called twice
            const newBtn = btn.cloneNode(true);
            btn.parentNode.replaceChild(newBtn, btn);

            newBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.openSearch();
            });
        });

        // Re-query triggers after replacement
        this.searchTriggers = document.querySelectorAll('.search-icon-btn');

        if (this.searchClose) {
            this.searchClose.addEventListener('click', (e) => {
                e.stopPropagation();
                this.closeSearch();
            });
        }

        if (this.searchOverlay) {
            this.searchOverlay.addEventListener('mousedown', (e) => {
                if (e.target === this.searchOverlay) this.closeSearch();
            });
        }

        // Handle Input
        if (this.searchInput) {
            this.searchInput.addEventListener('input', (e) => {
                if (!this.isLoaded && window.SEARCH_INDEX) {
                    this.index = window.SEARCH_INDEX;
                    this.isLoaded = true;
                }
                this.handleSearch(e.target.value);
            });

            // Handle Keyboard
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.searchOverlay.classList.contains('active')) {
                    this.closeSearch();
                }
            });
        }

        // Handle Redirect
        if (this.searchForm) {
            this.searchForm.addEventListener('submit', (e) => {
                e.preventDefault();
                const query = this.searchInput.value.trim();
                if (query) {
                    window.location.href = `search-results.html?q=${encodeURIComponent(query)}`;
                }
            });
        }
    }

    async loadIndex() {
        if (this.isLoaded) return;

        if (window.SEARCH_INDEX) {
            this.index = window.SEARCH_INDEX;
            this.isLoaded = true;
            return;
        }

        try {
            const response = await fetch('js/search-index.json');
            const data = response.ok ? await response.json() : await this.fetchRelativeIndex();
            this.index = data;
            this.isLoaded = true;
        } catch (error) {
            console.error('Failed to load search index:', error);
        }
    }

    async fetchRelativeIndex() {
        const paths = ['js/search-index.json', '../js/search-index.json', '../../js/search-index.json'];
        for (let path of paths) {
            try {
                const res = await fetch(path);
                if (res.ok) return await res.json();
            } catch (e) { }
        }
        return [];
    }

    openSearch() {
        // Final sanity check for DOM elements
        this.updateDOMReferences();
        if (!this.searchOverlay) return;

        this.searchOverlay.classList.add('active');
        this.loadIndex();
        setTimeout(() => {
            if (this.searchInput) this.searchInput.focus();
        }, 100);
        document.body.style.overflow = 'hidden';
    }

    closeSearch() {
        if (this.searchOverlay) {
            this.searchOverlay.classList.remove('active');
        }
        document.body.style.overflow = '';
    }

    handleSearch(query) {
        if (!this.isLoaded && window.SEARCH_INDEX) {
            this.index = window.SEARCH_INDEX;
            this.isLoaded = true;
        }

        if (!query || query.length < 2) {
            if (this.resultsPreview) {
                this.resultsPreview.innerHTML = '';
                this.resultsPreview.classList.remove('active');
            }
            return;
        }

        const terms = query.toLowerCase().split(' ').filter(t => t.length > 0);
        const results = this.index
            .map(item => {
                let score = 0;
                const content = item.content.toLowerCase();
                const qLower = query.toLowerCase();

                if (item.sku && item.sku.toLowerCase() === qLower) score += 100;
                else if (item.sku && item.sku.toLowerCase().includes(qLower)) score += 50;

                terms.forEach(term => {
                    if (item.title.toLowerCase().includes(term)) score += 10;
                    if (item.sku && item.sku.toLowerCase().includes(term)) score += 20;
                    if (item.specs.toLowerCase().includes(term)) score += 5;
                    if (item.pdfs.toLowerCase().includes(term)) score += 3;
                    if (item.headings && item.headings.toLowerCase().includes(term)) score += 2;
                    if (content.includes(term)) score += 1;
                });

                return { ...item, score };
            })
            .filter(item => item.score > 0)
            .sort((a, b) => b.score - a.score)
            .slice(0, 5);

        this.renderPreview(results, query);
    }

    renderPreview(results, query) {
        if (!this.resultsPreview) return;

        if (results.length === 0) {
            this.resultsPreview.innerHTML = `<div class="search-no-results">No matches found for "${query}"</div>`;
        } else {
            let html = results.map(item => `
                <a href="${item.url}" class="search-item">
                    <div class="search-item-title">
                        ${this.highlight(item.title, query)}
                        <span>${this.getType(item.url)}</span>
                        ${item.sku ? `<span style="background: rgba(0, 149, 235, 0.08); color: var(--secondary);">${item.sku}</span>` : ''}
                    </div>
                    <div class="search-item-desc">${this.highlight(item.description || item.specs.substring(0, 100) + '...', query)}</div>
                </a>
            `).join('');

            html += `
                <div class="search-view-all">
                    <a href="search-results.html?q=${encodeURIComponent(query)}" class="btn">View All Results</a>
                </div>
            `;
            this.resultsPreview.innerHTML = html;
        }
        this.resultsPreview.classList.add('active');
    }

    highlight(text, query) {
        if (!text) return '';
        const regex = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
        return text.replace(regex, '<mark>$1</mark>');
    }

    getType(url) {
        if (url.includes('/category/')) return 'Category';
        if (url.startsWith('products/')) return 'Product';
        return 'Page';
    }
}

// Global initialization with DOM safety
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.searchEngine = new SearchEngine();
    });
} else {
    window.searchEngine = new SearchEngine();
}
