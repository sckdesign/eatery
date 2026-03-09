const fs = require('fs');
const path = require('path');

const baseDir = 'c:\\Users\\chann\\.gemini\\antigravity\\scratch\\eateryessentials\\theme_prototype';

const overlayHTML = `
    <!-- Search Overlay -->
    <div class="search-overlay">
        <div class="search-overlay-inner">
            <button class="search-close" aria-label="Close Search">&times;</button>
            <form class="search-form">
                <div class="search-input-wrap">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" class="search-input" placeholder="Search products, specs, or documents..." autocomplete="off">
                </div>
                <div class="search-results-preview"></div>
            </form>
        </div>
    </div>
`;

function walk(dir) {
    const files = fs.readdirSync(dir);
    files.forEach(file => {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            if (!['assets', 'css', 'js', 'scripts', '.git'].includes(file)) {
                walk(fullPath);
            }
        } else if (file.endsWith('.html')) {
            updateFile(fullPath);
        }
    });
}

function updateFile(filePath) {
    let content = fs.readFileSync(filePath, 'utf8');
    let updated = false;

    // 1. Inject Overlay before </body>
    if (!content.includes('class="search-overlay"')) {
        content = content.replace('</body>', `${overlayHTML}\n</body>`);
        updated = true;
    }

    // 2. Resolve depth and prefix
    const dir = path.dirname(filePath);
    const relative = path.relative(dir, baseDir);
    const depth = relative.split(path.sep).filter(p => p === '..').length;
    const prefix = '../'.repeat(depth);

    // 3. Inject search-data.js (High Priority)
    const dataTag = `<script src="${prefix}js/search-data.js"></script>`;
    if (!content.includes('search-data.js"')) {
        // Find search.js or </body>
        if (content.includes('search.js"')) {
            content = content.replace('<script src="' + prefix + 'js/search.js"></script>', `${dataTag}\n<script src="${prefix}js/search.js"></script>`);
        } else {
            content = content.replace('</body>', `${dataTag}\n</body>`);
        }
        updated = true;
    }

    // 4. Inject search.js
    const scriptTag = `<script src="${prefix}js/search.js"></script>`;
    if (!content.includes('js/search.js"')) {
        content = content.replace('</body>', `${scriptTag}\n</body>`);
        updated = true;
    }

    if (updated) {
        fs.writeFileSync(filePath, content, 'utf8');
    }
}

console.log('Propagating search overlay and scripts...');
walk(baseDir);
console.log('Propagation complete.');
