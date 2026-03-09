const fs = require('fs');
const path = require('path');

const baseDir = 'c:\\Users\\chann\\.gemini\\antigravity\\scratch\\eateryessentials\\theme_prototype';

const replacements = [
    { target: 'BUT-N-LOC (Tamper Evident)', replacement: 'BUT-N-LOC' },
    { target: 'KODA CUP (General Packaging)', replacement: 'KODA CUP' },
    { target: 'KODA CUP (Clear PET)', replacement: 'KODA CUP' }
];

function walk(dir) {
    const files = fs.readdirSync(dir);
    files.forEach(file => {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            if (!['assets', 'css', 'js', 'scripts', '.git'].includes(file)) {
                walk(fullPath);
            }
        } else if (file.endsWith('.html')) {
            refineMenu(fullPath);
        }
    });
}

function refineMenu(filePath) {
    let content = fs.readFileSync(filePath, 'utf8');
    let updated = false;

    replacements.forEach(pair => {
        if (content.includes(pair.target)) {
            // Using a simple split/join for global replacement without regex escaping issues
            content = content.split(pair.target).join(pair.replacement);
            updated = true;
        }
    });

    if (updated) {
        fs.writeFileSync(filePath, content, 'utf8');
    }
}

console.log('Refining menu text (removing parentheticals) sitewide...');
walk(baseDir);
console.log('Menu refinement complete.');
