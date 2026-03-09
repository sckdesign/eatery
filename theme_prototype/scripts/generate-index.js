const fs = require('fs');
const path = require('path');

const baseDir = 'c:\\Users\\chann\\.gemini\\antigravity\\scratch\\eateryessentials\\theme_prototype';
const searchIndex = [];

function walk(dir) {
    const files = fs.readdirSync(dir);
    files.forEach(file => {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            // Avoid certain directories if needed (e.g., assets, css, js)
            if (!['assets', 'css', 'js', 'scripts', '.git'].includes(file)) {
                walk(fullPath);
            }
        } else if (file.endsWith('.html')) {
            indexFile(fullPath);
        }
    });
}

function indexFile(filePath) {
    const content = fs.readFileSync(filePath, 'utf8');
    const relativePath = path.relative(baseDir, filePath).replace(/\\/g, '/');

    // Extract Title
    const titleMatch = content.match(/<title>([\s\S]*?)<\/title>/i);
    const title = titleMatch ? titleMatch[1].replace('| Eatery Essentials', '').trim() : '';

    // Extract Meta Description
    const descMatch = content.match(/<meta name="description" content="([\s\S]*?)"/i);
    const description = descMatch ? descMatch[1].trim() : '';

    // Extract Spec Table Data
    const specTableRegex = /<table class="specs-table">([\s\S]*?)<\/table>/i;
    const tableMatch = content.match(specTableRegex);
    let specs = '';
    let sku = '';
    if (tableMatch) {
        // Extract all text inside th and td
        const rowRegex = /<tr>\s*<th>([\s\S]*?)<\/th>\s*<td>([\s\S]*?)<\/td>\s*<\/tr>/gi;
        let rowMatch;
        while ((rowMatch = rowRegex.exec(tableMatch[1])) !== null) {
            const key = rowMatch[1].replace(/<[^>]+>/g, '').trim();
            const val = rowMatch[2].replace(/<[^>]+>/g, '').trim();
            specs += `${key} ${val} `;
            if (key.includes('ITEM NO.') || key.includes('SKU')) {
                sku = val;
            }
        }
    }

    // Extract PDF names
    const pdfRegex = /href="([^"]+?\.pdf)"[^>]*>([\s\S]*?)<\/a>/gi;
    let pdfs = '';
    let pdfMatch;
    while ((pdfMatch = pdfRegex.exec(content)) !== null) {
        const pdfUrl = pdfMatch[1];
        const pdfText = pdfMatch[2].replace(/<[^>]+>/g, '').trim();
        const pdfName = pdfUrl.split('/').pop();
        pdfs += `${pdfText} ${pdfName} `;
    }

    // Extract Main Heading Content (H1, H2)
    const hRegex = /<(h1|h2)>([\s\S]*?)<\/\1>/gi;
    let hContent = '';
    let hMatch;
    while ((hMatch = hRegex.exec(content)) !== null) {
        hContent += hMatch[2].replace(/<[^>]+>/g, '').trim() + ' ';
    }

    // Add to index
    searchIndex.push({
        url: relativePath,
        title: title,
        sku: sku,
        description: description,
        specs: specs.trim(),
        pdfs: pdfs.trim(),
        headings: hContent.trim(),
        // Simple full text for backup
        content: (title + ' ' + (sku ? sku + ' ' : '') + description + ' ' + specs + ' ' + pdfs + ' ' + hContent).toLowerCase()
    });
}

console.log('Starting site indexing...');
walk(baseDir);

const outputPath = path.join(baseDir, 'js', 'search-index.json');
fs.writeFileSync(outputPath, JSON.stringify(searchIndex, null, 2));
console.log(`Successfully indexed ${searchIndex.length} files to ${outputPath}`);
