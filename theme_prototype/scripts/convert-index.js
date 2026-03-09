const fs = require('fs');
const path = require('path');

const baseDir = 'c:\\Users\\chann\\.gemini\\antigravity\\scratch\\eateryessentials\\theme_prototype';
const indexPath = path.join(baseDir, 'js', 'search-index.json');
const outputPath = path.join(baseDir, 'js', 'search-data.js');

if (fs.existsSync(indexPath)) {
    const indexData = fs.readFileSync(indexPath, 'utf8');
    const jsContent = `/* AUTO-GENERATED SEARCH DATA */\nwindow.SEARCH_INDEX = ${indexData};`;
    fs.writeFileSync(outputPath, jsContent);
    console.log('Successfully created js/search-data.js');
} else {
    console.error('search-index.json not found!');
}
