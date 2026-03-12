const fs = require('fs');
const path = require('path');

const targetDirs = [
    '.',
    './blog',
    './category'
];

function processHtmlFiles(dir) {
    fs.readdirSync(dir).forEach(file => {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) return;
        if (!file.endsWith('.html')) return;

        let content = fs.readFileSync(fullPath, 'utf8');
        let modified = false;

        // Process Products dropdown items
        
        // Find BUT-N-LOC and KODA CUP links within menu-item-has-children
        // Example structure:
        // <li class="menu-item menu-item-has-children">
        //     <a href="but-n-loc.html">BUT-N-LOC</a>
        //     <ul class="sub-menu">

        const regex = /<li class="menu-item menu-item-has-children(?: submenu-active)?">\s*<a href="([^"]+)">(.*?)<\/a>\s*<ul class="sub-menu">/g;
        
        content = content.replace(regex, (match, href, text) => {
            // Only modify specific brand or main category links if needed, or all of them.
            // The user requested BUT-N-LOC and KODA CUP brand pages. 
            // We can modify all menu-item-has-children to support split toggle.
            
            // Reconstruct with a separate toggle button
            // We add a wrapper to group the link and the toggle
            const newHtml = `<li class="menu-item menu-item-has-children split-nav-item">
                <div class="nav-item-header">
                    <a href="${href}">${text}</a>
                    <button class="submenu-toggle-btn" aria-label="Toggle submenu"><i class="fas fa-chevron-down"></i></button>
                </div>
                <ul class="sub-menu">`;
            
            modified = true;
            return newHtml;
        });

        if (modified) {
            fs.writeFileSync(fullPath, content, 'utf8');
            console.log(`Updated navigation in: ${fullPath}`);
        }
    });
}

targetDirs.forEach(dir => processHtmlFiles(dir));
