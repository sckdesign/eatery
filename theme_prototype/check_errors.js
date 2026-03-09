const fs = require('fs');
const jsdom = require("jsdom");
const { JSDOM } = jsdom;

const checkPage = (file) => {
    const html = fs.readFileSync(file, 'utf8');
    const dom = new JSDOM(html, {
        runScripts: "dangerously",
        resources: "usable",
        url: "file://c:/Users/chann/.gemini/antigravity/scratch/eateryessentials/theme_prototype/" + file
    });

    dom.window.onerror = function (msg, source, lineno, colno, error) {
        console.log(`[${file}] Error: ${msg} at ${source}:${lineno}:${colno}`);
    };

    dom.window.console.error = function (msg) {
        console.log(`[${file}] Console Error: ${msg}`);
    }
};

checkPage('index.html');
checkPage('news.html');
checkPage('blog/compostable-vs-recyclable-packaging.html');
console.log("Checks complete.");
