const fs = require('fs');
const path = require('path');

const goodFile = fs.readFileSync('blog/rPET-sustainability-food-packaging.html', 'utf8');
const footerMatch = goodFile.match(/<footer class="site-footer">[\s\S]*<\/html>/);
if (!footerMatch) {
    console.log("Could not find footer in source file.");
    process.exit(1);
}
const goodFooter = footerMatch[0];

const files = fs.readdirSync('blog').filter(f => f.endsWith('.html'));
for (const f of files) {
    const filePath = path.join('blog', f);
    let html = fs.readFileSync(filePath, 'utf8');
    html = html.replace(/<footer class="site-footer">[\s\S]*<\/html>/, goodFooter);
    fs.writeFileSync(filePath, html);
}
console.log('Successfully standardized all blog footers.');

// Check for unbalances
for (const f of files) {
    const html = fs.readFileSync(path.join('blog', f), 'utf8');
    const divsMatch = html.match(/<div/g);
    const divEndMatch = html.match(/<\/div>/g);
    const diff = (divsMatch ? divsMatch.length : 0) - (divEndMatch ? divEndMatch.length : 0);
    if (diff !== 0) {
        console.log(f, 'DIV Diff:', diff);
    }
}
