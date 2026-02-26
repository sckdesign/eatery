/**
 * spec-sheet.js
 * Eatery Essentials — Dynamic Spec Sheet Viewer
 * Reads the existing specs-table data from the page and renders
 * a full-screen modal with a printable spec sheet.
 */
(function () {
    'use strict';

    /* ─── Inject modal HTML once ─────────────────────────────────── */
    const modalHTML = `
  <div id="spec-modal" role="dialog" aria-modal="true" aria-label="Product Spec Sheet"
    style="display:none;position:fixed;inset:0;z-index:9999;background:rgba(0,0,0,0.55);
           backdrop-filter:blur(4px);overflow-y:auto;padding:2rem 1rem;">
    <div id="spec-modal-inner"
      style="max-width:780px;margin:0 auto;background:#fff;border-radius:16px;
             box-shadow:0 24px 80px rgba(0,0,0,0.22);overflow:hidden;font-family:Inter,sans-serif;">

      <!-- Header bar -->
      <div style="background:linear-gradient(135deg,#16a34a,#0891b2);padding:1.75rem 2rem;display:flex;align-items:center;justify-content:space-between;">
        <div>
          <img id="ss-logo" src="" alt="Eatery Essentials"
            style="height:38px;object-fit:contain;filter:brightness(0) invert(1);">
        </div>
        <div style="text-align:right;color:#fff;">
          <div style="font-size:0.75rem;opacity:0.8;letter-spacing:0.08em;text-transform:uppercase;">Product Specification Sheet</div>
          <div id="ss-date" style="font-size:0.8rem;opacity:0.7;margin-top:0.2rem;"></div>
        </div>
      </div>

      <!-- Body -->
      <div style="padding:2rem;">
        <div style="display:flex;gap:2rem;align-items:flex-start;flex-wrap:wrap;">

          <!-- Product image -->
          <div style="flex:0 0 200px;max-width:200px;">
            <img id="ss-image" src="" alt=""
              style="width:100%;border-radius:10px;border:1px solid #e5e7eb;object-fit:contain;background:#f8fafc;padding:1rem;">
          </div>

          <!-- Product info -->
          <div style="flex:1;min-width:220px;">
            <div id="ss-cat" style="font-size:0.75rem;font-weight:700;letter-spacing:0.08em;text-transform:uppercase;color:#16a34a;margin-bottom:0.5rem;"></div>
            <h2 id="ss-title" style="font-size:1.35rem;font-weight:800;line-height:1.25;margin:0 0 0.4rem;color:#111827;"></h2>
            <div id="ss-sku" style="font-size:0.85rem;color:#6b7280;margin-bottom:1rem;font-weight:500;"></div>
            <p id="ss-desc" style="font-size:0.93rem;color:#374151;line-height:1.65;margin-bottom:1.25rem;"></p>

            <!-- Spec table -->
            <div style="border:1px solid #e5e7eb;border-radius:10px;overflow:hidden;">
              <table id="ss-table" style="width:100%;border-collapse:collapse;font-size:0.88rem;">
              </table>
            </div>
          </div>
        </div>

        <!-- Certifications & footer -->
        <div style="margin-top:1.75rem;padding-top:1.5rem;border-top:1px solid #f0f0f0;display:flex;align-items:center;justify-content:space-between;flex-wrap:gap:1rem 0;">
          <div style="display:flex;gap:0.5rem;flex-wrap:wrap;">
            <span style="background:#dcfce7;color:#166534;font-size:0.72rem;font-weight:700;padding:0.3rem 0.75rem;border-radius:50px;">✓ RPET / PCR Compliant</span>
            <span style="background:#dbeafe;color:#1e40af;font-size:0.72rem;font-weight:700;padding:0.3rem 0.75rem;border-radius:50px;">✓ FDA Food-Contact Safe</span>
            <span style="background:#ede9fe;color:#5b21b6;font-size:0.72rem;font-weight:700;padding:0.3rem 0.75rem;border-radius:50px;">✓ Fully Recyclable</span>
          </div>
          <div style="font-size:0.78rem;color:#9ca3af;text-align:right;">
            eateryessentials.com &nbsp;|&nbsp; (469) 482-9066 &nbsp;|&nbsp; sales@eateryessentials.com
          </div>
        </div>

      </div>

      <!-- Actions -->
      <div style="background:#f9fafb;border-top:1px solid #e5e7eb;padding:1.25rem 2rem;display:flex;gap:0.75rem;justify-content:flex-end;flex-wrap:wrap;">
        <button id="ss-print-btn"
          style="padding:0.6rem 1.4rem;background:linear-gradient(135deg,#16a34a,#0891b2);color:#fff;border:none;border-radius:50px;font-weight:700;font-size:0.88rem;cursor:pointer;letter-spacing:0.02em;">
          ⬇ Download / Print
        </button>
        <button id="ss-close-btn"
          style="padding:0.6rem 1.4rem;background:#fff;color:#374151;border:1px solid #d1d5db;border-radius:50px;font-weight:600;font-size:0.88rem;cursor:pointer;">
          Close
        </button>
      </div>
    </div>
  </div>`;

    document.body.insertAdjacentHTML('beforeend', modalHTML);

    /* ─── Find all "Spec Sheet" buttons on the page ───────────────── */
    function findSpecBtn() {
        return [...document.querySelectorAll('a, button')].filter(el =>
            el.textContent.trim().toLowerCase() === 'spec sheet'
        );
    }

    /* ─── Gather product data from the page ─────────────────────────*/
    function scrapeProduct() {
        const title = document.querySelector('h1')?.textContent?.trim() ?? 'Product';
        const cat = document.querySelector('.product-cat')?.textContent?.trim() ?? '';
        const desc = document.querySelector('.product-desc')?.textContent?.trim() ?? '';
        const sku = (() => {
            const allDescs = document.querySelectorAll('.product-desc');
            for (const d of allDescs) {
                if (d.textContent.includes('SKU:')) return d.textContent.trim();
            }
            return '';
        })();
        const imgSrc = document.querySelector('.product-gallery img, .main-image')?.src ?? '';
        const rows = [...(document.querySelector('.specs-table')?.querySelectorAll('tr') ?? [])];

        // Determine logo path (handle different page depths)
        const depth = window.location.pathname.split('/').filter(Boolean).length;
        const logoPath = depth >= 3
            ? '../../assets/images/logo-blue_green.png'
            : '../assets/images/logo-blue_green.png';

        return { title, cat, desc, sku, imgSrc, rows, logoPath };
    }

    /* ─── Populate and open modal ─────────────────────────────────── */
    function openModal() {
        const { title, cat, desc, sku, imgSrc, rows, logoPath } = scrapeProduct();

        document.getElementById('ss-logo').src = logoPath;
        document.getElementById('ss-title').textContent = title;
        document.getElementById('ss-cat').textContent = cat;
        document.getElementById('ss-desc').textContent = sku ? desc : desc;
        document.getElementById('ss-sku').textContent = sku;
        document.getElementById('ss-image').src = imgSrc;
        document.getElementById('ss-image').alt = title;
        document.getElementById('ss-date').textContent =
            'Generated: ' + new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

        // Build spec table
        const table = document.getElementById('ss-table');
        table.innerHTML = '';
        rows.forEach((row, i) => {
            const th = row.querySelector('th');
            const td = row.querySelector('td');
            if (!th || !td) return;
            const tr = document.createElement('tr');
            tr.style.background = i % 2 === 0 ? '#f9fafb' : '#fff';
            tr.innerHTML = `
        <td style="padding:0.6rem 1rem;font-weight:700;color:#374151;width:42%;border-bottom:1px solid #e5e7eb;">${th.textContent}</td>
        <td style="padding:0.6rem 1rem;color:#111827;border-bottom:1px solid #e5e7eb;">${td.textContent}</td>
      `;
            table.appendChild(tr);
        });

        // Show modal
        const modal = document.getElementById('spec-modal');
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
        // Scroll to top of modal
        setTimeout(() => { modal.scrollTop = 0; }, 10);
    }

    /* ─── Close modal ─────────────────────────────────────────────── */
    function closeModal() {
        document.getElementById('spec-modal').style.display = 'none';
        document.body.style.overflow = '';
    }

    /* ─── Print handler ───────────────────────────────────────────── */
    function printSheet() {
        const inner = document.getElementById('spec-modal-inner');
        const win = window.open('', '_blank', 'width=850,height=1100');
        win.document.write(`
      <!DOCTYPE html>
      <html>
      <head>
        <meta charset="UTF-8">
        <title>Spec Sheet — ${document.title}</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
        <style>
          * { box-sizing: border-box; margin: 0; padding: 0; }
          body { font-family: Inter, sans-serif; padding: 2cm; color: #111827; }
          @media print { body { padding: 0; } @page { margin: 1.5cm; } }
        </style>
      </head>
      <body>${inner.innerHTML}</body>
      </html>
    `);
        win.document.close();
        setTimeout(() => { win.focus(); win.print(); }, 600);
    }

    /* ─── Bind events after DOM ready ─────────────────────────────── */
    function init() {
        const btns = findSpecBtn();
        btns.forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                openModal();
            });
        });

        document.getElementById('ss-close-btn').addEventListener('click', closeModal);
        document.getElementById('ss-print-btn').addEventListener('click', printSheet);

        // Close on backdrop click
        document.getElementById('spec-modal').addEventListener('click', function (e) {
            if (e.target === this) closeModal();
        });

        // Close on Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeModal();
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
