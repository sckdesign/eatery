const fs = require('fs');

const cssPath = 'c:\\Users\\chann\\.gemini\\antigravity\\scratch\\eateryessentials\\theme_prototype\\css\\style.css';
let content = fs.readFileSync(cssPath, 'utf8');

const searchBlockRegex = /\/\* =+\r?\n\s*SEARCH OVERLAY\r?\n\s*=+ \*\/\r?\n\.search-overlay\s*\{[\s\S]*?\.search-overlay\.active\s*\{[\s\S]*?\}\r?\n\r?\n\.search-overlay-inner\s*\{[\s\S]*?\}\r?\n\r?\n\.search-overlay\.active\s*\.search-overlay-inner\s*\{[\s\S]*?\}/;

const newStyles = `/* =============================================
   SEARCH OVERLAY
   ============================================= */
.search-overlay {
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(10, 15, 28, 0.85);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    display: flex;
    align-items: flex-start;
    justify-content: center;
    padding-top: 15vh;
    opacity: 0;
    visibility: hidden;
    transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}

.search-overlay.active {
    opacity: 1;
    visibility: visible;
}

.search-overlay-inner {
    width: 90%;
    max-width: 800px;
    transform: translateY(-20px);
    transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    position: relative;
}

.search-overlay.active .search-overlay-inner {
    transform: translateY(0);
}

.search-close {
    position: absolute;
    top: -60px;
    right: 0;
    background: none;
    border: none;
    color: white;
    font-size: 2.5rem;
    cursor: pointer;
    transition: transform 0.3s ease;
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.search-close:hover {
    transform: rotate(90deg);
    color: var(--primary-light);
}

.search-form {
    position: relative;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
    border-radius: var(--radius-xl);
    overflow: hidden;
    background: var(--white);
    padding: 2px;
}

.search-input-wrap {
    display: flex;
    align-items: center;
    background: var(--white);
    padding: 0.5rem 1.5rem;
}

.search-input-wrap i {
    font-size: 1.5rem;
    color: var(--text-muted);
}

.search-overlay .search-input {
    width: 100%;
    border: none;
    background: transparent;
    padding: 1.5rem 1rem;
    font-size: 1.5rem;
    font-weight: 500;
    color: var(--dark);
    outline: none;
}

.search-overlay .search-input::placeholder {
    color: var(--text-muted);
}

.search-results-preview {
    max-height: 450px;
    overflow-y: auto;
    background: var(--white);
    border-top: 1px solid var(--border);
    display: none;
}

.search-results-preview.active {
    display: block;
}

.search-item {
    padding: 1.25rem 2rem;
    border-bottom: 1px solid var(--border);
    display: block;
    transition: all var(--transition-fast);
}

.search-item:last-child {
    border-bottom: none;
}

.search-item:hover {
    background: var(--bg-light);
    padding-left: 2.25rem;
}

.search-item-title {
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 0.25rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.search-item-title span {
    font-size: 0.7rem;
    text-transform: uppercase;
    background: var(--bg-light);
    padding: 0.2rem 0.5rem;
    border-radius: 4px;
    color: var(--text-muted);
    font-weight: 600;
}

.search-item-desc {
    font-size: 0.9rem;
    color: var(--text-secondary);
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.search-view-all {
    padding: 1.25rem;
    text-align: center;
    background: var(--bg-light);
    border-top: 1px solid var(--border);
}

.search-view-all .btn {
    width: 100%;
    display: inline-block;
    padding: 0.75rem 0;
    border-radius: var(--radius-md);
    background: var(--accent-gradient);
    color: white;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 0.9rem;
}

.search-no-results {
    padding: 3rem 2rem;
    text-align: center;
    color: var(--text-muted);
}`;

if (searchBlockRegex.test(content)) {
    const updated = content.replace(searchBlockRegex, newStyles);
    fs.writeFileSync(cssPath, updated, 'utf8');
    console.log('Search Overlay CSS updated successfully.');
} else {
    console.log('Could not find Search Overlay block in style.css');
}
