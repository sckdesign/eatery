const fs = require('fs');
const p = 'c:/Users/chann/.gemini/antigravity/scratch/eateryessentials/theme_prototype/';
let html = fs.readFileSync(p + 'news.html', 'utf8');
const grid = fs.readFileSync(p + 'new_grid.html', 'utf8');

const startStr = '<div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 2.5rem;">';
const endStr = '            </div>\r\n        </div>\r\n    </section>\r\n\r\n    <section class="section" style="border-top:';

const idx1 = html.indexOf(startStr);
if (idx1 !== -1) {
    const pre = html.substring(0, idx1 + startStr.length);
    // Find where the end bracket is
    let idx2 = html.indexOf('            </div>\n        </div>\n    </section>', idx1);
    if (idx2 === -1) idx2 = html.indexOf('            </div>\r\n        </div>\r\n    </section>', idx1);

    if (idx2 !== -1) {
        const post = html.substring(idx2);
        fs.writeFileSync(p + 'news.html', pre + '\n' + grid + '\n' + post);
        console.log("Success");
    } else {
        console.log("Could not find end marker");
    }
} else {
    console.log("Could not find start marker");
}
