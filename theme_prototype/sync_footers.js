const fs = require('fs');
const path = require('path');

// Use index.html as the source of truth for the footer and global elements
const indexHtml = fs.readFileSync('index.html', 'utf8');
const footerMatch = indexHtml.match(/<footer class="site-footer">[\s\S]*<\/html>/);

if (!footerMatch) {
    console.log("Could not find footer in index.html.");
    process.exit(1);
}
const sourceFooterBlock = footerMatch[0];

// Function to sync footer block to a file
function syncFooter(filePath) {
    let html = fs.readFileSync(filePath, 'utf8');
    // Replace everything from the footer to the end of the file
    if (html.includes('<footer class="site-footer">')) {
        html = html.replace(/<footer class="site-footer">[\s\S]*<\/html>/, sourceFooterBlock);
        fs.writeFileSync(filePath, html);
        return true;
    }
    return false;
}

// Find all HTML files recursively
function getAllHtmlFiles(dir, fileList = []) {
    const files = fs.readdirSync(dir);
    files.forEach(file => {
        const filePath = path.join(dir, file);
        if (fs.statSync(filePath).isDirectory()) {
            if (file !== 'node_modules' && file !== '.git') {
                getAllHtmlFiles(filePath, fileList);
            }
        } else if (file.endsWith('.html') && filePath !== 'index.html' && file !== 'new_grid.html') {
            fileList.push(filePath);
        }
    });
    return fileList;
}

const allFiles = getAllHtmlFiles('.');
let count = 0;
allFiles.forEach(file => {
    if (syncFooter(file)) count++;
});

console.log(`Successfully synced footer and global elements to ${count} files.`);
