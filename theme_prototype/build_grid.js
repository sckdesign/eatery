const fs = require('fs');

const posts = [
    { file: "rPET-sustainability-food-packaging.html", dateStr: "February 10, 2026", cat: "Industry Insights" },
    { file: "2026-product-catalog-launch.html", dateStr: "February 1, 2026", cat: "Company News" },
    { file: "tamper-evident-packaging-food-safety.html", dateStr: "January 20, 2026", cat: "Food Safety" },
    { file: "grab-and-go-market-trends-2026.html", dateStr: "January 8, 2026", cat: "Market Trends" },
    { file: "pet-vs-pp-food-containers.html", dateStr: "November 12, 2025", cat: "Industry Insights" },
    { file: "choosing-the-right-deli-container.html", dateStr: "October 8, 2025", cat: "Industry Insights" },
    { file: "compostable-vs-recyclable-packaging.html", dateStr: "September 15, 2025", cat: "Sustainability" },
    { file: "packaging-supplier-evaluation-checklist.html", dateStr: "August 20, 2025", cat: "Procurement" },
    { file: "how-thermoformed-packaging-is-made.html", dateStr: "July 14, 2025", cat: "Manufacturing" },
    { file: "circular-economy-food-packaging.html", dateStr: "June 22, 2025", cat: "Sustainability" },
    { file: "custom-tooling-vs-stock-containers.html", dateStr: "April 15, 2025", cat: "Product Strategy" },
    { file: "cold-chain-packaging-integrity.html", dateStr: "March 05, 2025", cat: "Food Safety" },
    { file: "micro-market-grab-go-trends.html", dateStr: "February 12, 2025", cat: "Market Trends" }
];

let html = "";

posts.forEach(p => {
    const raw = fs.readFileSync("blog/" + p.file, "utf8");
    const m1 = raw.match(/<h1[^>]*>([\s\S]*?)<\/h1>/);
    const title = m1 ? m1[1].replace(/<[^>]+>/g, "").trim() : "No Title";

    // find the first image inside <article class="reveal active">
    let imgSrc = "";
    let imgAlt = "";
    const articleMatch = raw.match(/<article[^>]*>([\s\S]*?)<\/article>/);
    if (articleMatch) {
        const m2 = articleMatch[1].match(/<img[^>]+src="\.\.\/([^"]+)"[^>]*alt="([^"]*)"/);
        if (m2) {
            imgSrc = m2[1];
            imgAlt = m2[2];
        }
    }

    const m3 = raw.match(/<meta[^>]+name="description"[^>]+content="([^"]+)"/i)
        || raw.match(/<meta[^>]+content="([^"]+)"[^>]+name="description"/i);

    let desc = m3 ? m3[1] : "";

    const d = new Date(p.dateStr);
    const isoDate = !isNaN(d) ? d.toISOString().split("T")[0] : "";

    html += `                <!-- Post: ${title} -->
                <article class="blog-card-modern reveal"
                    style="background: var(--white); border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-md); transition: all 0.3s ease; border: 1px solid rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                    <a href="blog/${p.file}"
                        style="text-decoration:none; color:inherit; display: flex; flex-direction: column; height: 100%;">
                        <div style="overflow:hidden; height:220px;">
                            <img src="${imgSrc}" alt="${imgAlt}"
                                style="width:100%; height:100%; object-fit:cover; transition: transform 0.5s ease;">
                        </div>
                        <div style="padding: 2rem; flex-grow: 1; display: flex; flex-direction: column;">
                            <time datetime="${isoDate}"
                                style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 0.5rem; display: block;">${p.dateStr}</time>
                            <h3 style="font-size: 1.3rem; line-height: 1.3; margin-bottom: 0.75rem; font-weight: 700;">
                                ${title}</h3>
                            <p
                                style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.25rem;">
                                ${desc}</p>
                            <span class="link-arrow"
                                style="margin-top:auto; font-weight: 600; color: var(--primary);">Read More</span>
                        </div>
                    </a>
                </article>

`;
});

fs.writeFileSync("new_grid.html", html);
