(function () {
    'use strict';
    const _path = window.location.pathname;
    const _protoIdx = _path.indexOf('/theme_prototype/');
    let BASE = '';
    let CAT = 'category/';
    if (window.SEARCH_ROOT_OVERRIDE) {
        BASE = '';
        CAT = 'category/';
    } else if (_protoIdx !== -1) {
        const _rel = _path.slice(_protoIdx + '/theme_prototype/'.length);
        const _depth = (_rel.match(/\/|\\/g) || []).length;
        BASE = '../'.repeat(_depth);
        CAT = BASE + 'category/';
    }
    const SEARCH_INDEX = [
        { type: 'page', title: 'Home', url: BASE + "index.html", keywords: 'home eatery essentials packaging' },
        { type: 'page', title: 'Products', url: BASE + "products.html", keywords: 'products all containers cups bowls' },
        { type: 'page', title: 'About Us', url: BASE + "about.html", keywords: 'about company history team' },
        { type: 'page', title: 'Sustainability', url: BASE + "sustainability.html", keywords: 'sustainability eco green rPET recycled' },
        { type: 'page', title: 'Careers', url: BASE + "careers.html", keywords: 'careers jobs work employment' },
        { type: 'page', title: 'News', url: BASE + "news.html", keywords: 'news blog articles updates' },
        { type: 'page', title: 'Contact Us', url: BASE + "contact.html", keywords: 'contact sales samples request quote' },
        { type: 'resource', title: '2026 Product Catalog', url: BASE + "catalog.html", keywords: 'catalog 2026 download PDF' },
        { type: 'resource', title: 'Sales Documents', url: BASE + "sales-documents.html", keywords: 'sales documents PDF download product info' },
        { type: 'resource', title: 'Customer Reference Documents', url: BASE + "customer-reference-documents.html", keywords: 'certification BRC FSSC SQF reference guide' },
        { type: 'resource', title: 'Instructional Videos', url: BASE + "instructional-videos.html", keywords: 'video instructional how-to BUT-N-LOC English Spanish tutorial' },
        { type: 'category', title: 'BUT-N-LOC — Tamper Evident Hinged lid Containers', url: CAT + "but-n-loc-tamper-evident-hinged-lid-containers.html", keywords: 'Hinged Containers' },
        { type: 'category', title: 'BUT-N-LOC — Tamper Evident Square Bowls', url: CAT + "but-n-loc-tamper-evident-square-bowls.html", keywords: 'Square Bowls' },
        { type: 'category', title: 'BUT-N-LOC — Tamper Evident Square Deli Containers', url: CAT + "but-n-loc-tamper-evident-square-deli-containers.html", keywords: 'Deli Containers' },
        { type: 'category', title: 'But-N-Loc Line', url: CAT + "but-n-loc.html", keywords: 'bundles tamper evident' },
        { type: 'category', title: 'Grab & Go', url: CAT + "grab-go.html", keywords: 'sandwich wraps multi-compartment' },
        { type: 'category', title: 'Film Seal', url: CAT + "film-seal.html", keywords: 'packaging' },
        { type: 'category', title: 'Koda Cup Line — Cake and Bakery Containers', url: CAT + "kodacup-cake-bakery-containers.html", keywords: 'plastic line bakery' },
        { type: 'category', title: 'Koda Cup Line — Plastic Salad Bowls', url: CAT + "kodacup-clear-salad-bowls.html", keywords: 'plastic line salad' },
        { type: 'category', title: 'Koda Cup Line — Round Deli Containers', url: CAT + "kodacup-deli-containers.html", keywords: 'plastic line deli' },
        { type: 'category', title: 'Koda Cup Line — RPET Hinged Lid Deli Containers', url: CAT + "kodacup-hinged-lid-containers.html", keywords: 'plastic line hinged' },
        { type: 'category', title: 'Koda Cup Line — PET Clear Cups', url: CAT + "kodacup-pet-clear-cups.html", keywords: 'plastic line cup' },
        { type: 'category', title: 'Koda Cup Line', url: CAT + "plastic-line.html", keywords: 'plastic line' },
        { type: 'product', title: '10 OZ PET CLEAR CUP', url: BASE + "products/10-oz-pet-clear-cup.html", keywords: ' gen-1010' },
        { type: 'product', title: '10" PET CAKE CONTAINER DOUBLE LAYER', url: BASE + "products/10-pet-cake-container-double-layer.html", keywords: ' gen-1028' },
        { type: 'product', title: '12/14 OZ PET CLEAR CUP', url: BASE + "products/12-14-oz-pet-clear-cup.html", keywords: ' gen-1214' },
        { type: 'product', title: '12 OZ RPET CLEAR HINGED TAMPER EVIDENT SMOOTH WALL CONTAINER', url: BASE + "products/12-oz-rpet-clear-hinged-tamper-evident-smooth-wall-container.html", keywords: ' rptte12sw' },
        { type: 'product', title: '12 OZ TALL PET CLEAR CUP', url: BASE + "products/12-oz-tall-pet-clear-cup.html", keywords: ' gen-1212t' },
        { type: 'product', title: '16 OZ PET CLEAR CUP', url: BASE + "products/16-oz-pet-clear-cup.html", keywords: ' gen-1616' },
        { type: 'product', title: '16 OZ RPET CLEAR HINGED LID TE SMOOTH WALL HEAVY CONTAINER', url: BASE + "products/16-oz-rpet-clear-hinged-lid-te-smooth-wall-heavy-container.html", keywords: ' rptte16swh' },
        { type: 'product', title: '16 OZ RPET CLEAR HINGED TEAR OFF LID TAMPER EVIDENT CONTAINER', url: BASE + "products/16-oz-rpet-clear-hinged-tear-off-lid-tamper-evident-container.html", keywords: ' gen-4600' },
        { type: 'product', title: '16 OZ RPET CLEAR HINGED VENTED LID TAMPER EVIDENT SMOOTH WALL HEAVY CONTAINER', url: BASE + "products/16-oz-rpet-clear-hinged-vented-lid-tamper-evident-smooth-wall-heavy-container.html", keywords: ' gen-4675' },
        { type: 'product', title: '16 OZ TALL PET CLEAR CUP', url: BASE + "products/16-oz-tall-pet-clear-cup.html", keywords: ' gen-1616t' },
        { type: 'product', title: '18 OZ PET CLEAR SALAD BOWL', url: BASE + "products/18-oz-pet-clear-salad-bowl.html", keywords: ' gen-1056' },
        { type: 'product', title: '18OZ RPET CLEAR HINGED LID MEDIUM ROUND TAMPER EVIDENT BOWL', url: BASE + "products/18oz-rpet-clear-hinged-lid-medium-round-tamper-evident-bowl.html", keywords: ' gen-4542' },
        { type: 'product', title: '18OZ RPET CLEAR HINGED VENTED LID MEDIUM ROUND TAMPER EVIDENT BOWL', url: BASE + "products/18oz-rpet-clear-hinged-vented-lid-medium-round-tamper-evident-bowl.html", keywords: ' gen-4543' },
        { type: 'product', title: '20 OZ 2-COMPARTMENT RPET CLEAR HINGED LID TAMPER EVIDENT CONTAINER', url: BASE + "products/20-oz-2-compartment-rpet-clear-hinged-lid-tamper-evident-container.html", keywords: ' gen-3912' },
        { type: 'product', title: '20 OZ 3-COMPARTMENT RPET CLEAR HINGED LID TAMPER EVIDENT CONTAINER', url: BASE + "products/20-oz-3-compartment-rpet-clear-hinged-lid-tamper-evident-container.html", keywords: ' gen-3913' },
        { type: 'product', title: '20 OZ 4-COMPARTMENT RPET CLEAR HINGED LID TAMPER EVIDENT CONTAINER', url: BASE + "products/20-oz-4-compartment-rpet-clear-hinged-lid-tamper-evident-container.html", keywords: ' gen-3914' },
        { type: 'product', title: '20 OZ PET CLEAR CUP', url: BASE + "products/20-oz-pet-clear-cup.html", keywords: ' gen-2020' },
        { type: 'product', title: '20 OZ RPET CLEAR HINGED VENTED LID TAMPER EVIDENT SMOOTH WALL CONTAINER', url: BASE + "products/20-oz-rpet-clear-hinged-vented-lid-tamper-evident-smooth-wall-container.html", keywords: ' gen-4625' },
        { type: 'product', title: '20 OZ RPET CLEAR TAMPER EVIDENT HINGED LID CONTAINER - VENTED LID', url: BASE + "products/20-oz-rpet-clear-tamper-evident-hinged-lid-container-vented-lid.html", keywords: ' gen-4616' },
        { type: 'product', title: '40 OZ PET CLEAR SALAD BOWL', url: BASE + "products/40-oz-pet-clear-salad-bowl.html", keywords: ' gen-1055' },
        { type: 'product', title: '48 OZ PET CLEAR SALAD BOWL', url: BASE + "products/48-oz-pet-clear-salad-bowl.html", keywords: ' ptsb48-d175' },
        { type: 'product', title: '64 OZ PET CLEAR SALAD BOWL', url: BASE + "products/64-oz-pet-clear-salad-bowl.html", keywords: ' ptsb64-d255' },
        { type: 'product', title: '24 OZ PET CLEAR CUP', url: BASE + "products/24-oz-pet-clear-cup.html", keywords: ' gen-2424' },
        { type: 'product', title: '24 OZ PET CLEAR SALAD BOWL', url: BASE + "products/24-oz-pet-clear-salad-bowl.html", keywords: ' gen-1057' },
        { type: 'product', title: '24 OZ RPET CLEAR HINGED LID MEDIUM ROUND TAMPER EVIDENT BOWL', url: BASE + "products/24-oz-rpet-clear-hinged-lid-medium-round-tamper-evident-bowl.html", keywords: ' gen-4535' },
        { type: 'product', title: '24 OZ RPET CLEAR HINGED VENTED LID MEDIUM ROUND TAMPER EVIDENT BOWL', url: BASE + "products/24-oz-rpet-clear-hinged-vented-lid-medium-round-tamper-evident-bowl.html", keywords: ' gen-4544' },
        { type: 'product', title: '24 OZ RPET CLEAR HINGED VENTED LID TAMPER EVIDENT SMOOTH WALL CONTAINER', url: BASE + "products/24-oz-rpet-clear-hinged-vented-lid-tamper-evident-smooth-wall-container.html", keywords: ' gen-4622' },
        { type: 'product', title: '24 OZ RPET CLEAR TAMPER EVIDENT HINGED LID CONTAINER - VENTED LID', url: BASE + "products/24-oz-rpet-clear-tamper-evident-hinged-lid-container-vented-lid.html", keywords: ' gen-4618' },
        { type: 'product', title: '32 OZ PET CLEAR CUP', url: BASE + "products/32-oz-pet-clear-cup.html", keywords: ' gen-3232' },
        { type: 'product', title: '32 OZ PET CLEAR SALAD BOWL', url: BASE + "products/32-oz-pet-clear-salad-bowl.html", keywords: ' gen-1058' },
        { type: 'product', title: '32 OZ PREMIER PET CLEAR DOME LID', url: BASE + "products/32-oz-premier-pet-clear-dome-lid.html", keywords: ' ptlid-d107' },
        { type: 'product', title: '32 OZ PREMIER PET CLEAR FLAT LID', url: BASE + "products/32-oz-premier-pet-clear-flat-lid.html", keywords: ' ptlid-f107' },
        { type: 'product', title: '32 OZ RPET CLEAR HINGED LID MEDIUM ROUND TAMPER EVIDENT BOWL', url: BASE + "products/32-oz-rpet-clear-hinged-lid-medium-round-tamper-evident-bowl.html", keywords: ' gen-4545' },
        { type: 'product', title: '32 OZ RPET CLEAR HINGED VENTED LID MEDIUM ROUND TAMPER EVIDENT BOWL', url: BASE + "products/32-oz-rpet-clear-hinged-vented-lid-medium-round-tamper-evident-bowl.html", keywords: ' gen-4546' },
        { type: 'product', title: '4 OZ AD RPET CLEAR HINGED LID TAMPER EVIDENT CONTAINER', url: BASE + "products/4-oz-ad-rpet-clear-hinged-lid-tamper-evident-container.html", keywords: ' gen-4664' },
        { type: 'product', title: '4 OZ AD RPET CLEAR HINGED LID VENTED TAMPER EVIDENT CONTAINER', url: BASE + "products/4-oz-ad-rpet-clear-hinged-lid-vented-tamper-evident-container.html", keywords: ' gen-4662' },
        { type: 'product', title: '4 OZ PET CLEAR DEEP INSERT FOR 92MM CUPS', url: BASE + "products/4-oz-pet-clear-deep-insert-for-92mm-cups.html", keywords: ' gen-4234' },
        { type: 'product', title: '4 OZ PET CLEAR INSERT FOR 92MM CUPS', url: BASE + "products/4-oz-pet-clear-insert-for-92mm-cups.html", keywords: ' gen-4234' },
        { type: 'product', title: '40 OZ PET CLEAR SALAD BOWL', url: BASE + "products/40-oz-pet-clear-salad-bowl.html", keywords: ' gen-1059' },
        { type: 'product', title: '40 OZ RPET CLEAR HINGED LID LARGE ROUND TAMPER EVIDENT BOWL', url: BASE + "products/40-oz-rpet-clear-hinged-lid-large-round-tamper-evident-bowl.html", keywords: ' gen-4537' },
        { type: 'product', title: '40 OZ RPET CLEAR HINGED VENTED LID LARGE ROUND TAMPER EVIDENT BOWL', url: BASE + "products/40-oz-rpet-clear-hinged-vented-lid-large-round-tamper-evident-bowl.html", keywords: ' gen-4548' },
        { type: 'product', title: '48 OZ RPET CLEAR HINGED LID LARGE ROUND TAMPER EVIDENT BOWL', url: BASE + "products/48-oz-rpet-clear-hinged-lid-large-round-tamper-evident-bowl.html", keywords: ' gen-4538' },
        { type: 'product', title: '48 OZ RPET CLEAR HINGED VENTED LID LARGE ROUND TAMPER EVIDENT BOWL', url: BASE + "products/48-oz-rpet-clear-hinged-vented-lid-large-round-tamper-evident-bowl.html", keywords: ' gen-4549' },
        { type: 'product', title: '5" 12OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL BULK', url: BASE + "products/5-12oz-pet-clear-tamper-evident-small-square-bowl-bulk.html", keywords: ' gen-2023' },
        { type: 'product', title: '5" 12OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL W/DOME LID COMBO', url: BASE + "products/5-12oz-pet-clear-tamper-evident-small-square-bowl-w-dome-lid-combo.html", keywords: ' gen-3902' },
        { type: 'product', title: '5" 12OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL W/FLAT LID COMBO', url: BASE + "products/5-12oz-pet-clear-tamper-evident-small-square-bowl-w-flat-lid-combo.html", keywords: ' gen-3903' },
        { type: 'product', title: '5" 16 OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL BULK', url: BASE + "products/5-16-oz-pet-clear-tamper-evident-small-square-bowl-bulk.html", keywords: ' gen-2025' },
        { type: 'product', title: '5" 16OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL W/DOME LID COMBO', url: BASE + "products/5-16oz-pet-clear-tamper-evident-small-square-bowl-w-dome-lid-combo.html", keywords: ' gen-3904' },
        { type: 'product', title: '5" 16OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL W/FLAT LID COMBO', url: BASE + "products/5-16oz-pet-clear-tamper-evident-small-square-bowl-w-flat-lid-combo.html", keywords: ' gen-3905' },
        { type: 'product', title: '5" 8OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL BULK', url: BASE + "products/5-8oz-pet-clear-tamper-evident-small-square-bowl-bulk.html", keywords: ' gen-2022' },
        { type: 'product', title: '5" 8OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL W/DOME LID COMBO', url: BASE + "products/5-8oz-pet-clear-tamper-evident-small-square-bowl-w-dome-lid-combo.html", keywords: ' gen-3900' },
        { type: 'product', title: '5" 8OZ PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL W/FLAT LID COMBO', url: BASE + "products/5-8oz-pet-clear-tamper-evident-small-square-bowl-w-flat-lid-combo.html", keywords: ' gen-3901' },
        { type: 'product', title: '5" PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL DOME LID BULK', url: BASE + "products/5-pet-clear-tamper-evident-small-square-bowl-dome-lid-bulk.html", keywords: ' gen-2028' },
        { type: 'product', title: '5" PET CLEAR TAMPER EVIDENT SMALL SQUARE BOWL FLAT LID BULK', url: BASE + "products/5-pet-clear-tamper-evident-small-square-bowl-flat-lid-bulk.html", keywords: ' gen-2027' },
        { type: 'product', title: '5 OZ PET CLEAR INSERT FOR 98MM CUPS', url: BASE + "products/5-oz-pet-clear-insert-for-98mm-cups.html", keywords: ' gen-5235' },
        { type: 'product', title: '6.5" 18 OZ PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/6-5-18-oz-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-65-18b' },
        { type: 'product', title: '6.5" 24 OZ PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/6-5-24-oz-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-65-24b' },
        { type: 'product', title: '6.5" 32 OZ PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/6-5-32-oz-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-65-32b' },
        { type: 'product', title: '6.5" 48 OZ PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/6-5-48-oz-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-65-48b' },
        { type: 'product', title: '6.5" PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL DOME LID BULK', url: BASE + "products/6-5-pet-clear-tamper-evident-medium-square-bowl-dome-lid-bulk.html", keywords: ' esb-dlid65b' },
        { type: 'product', title: '6.5" PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL FLAT LID BULK', url: BASE + "products/6-5-pet-clear-tamper-evident-medium-square-bowl-flat-lid-bulk.html", keywords: ' esb-flid65b' },
        { type: 'product', title: '6 OZ AD RPET CLEAR HINGED LID TAMPER EVIDENT CONTAINER', url: BASE + "products/6-oz-ad-rpet-clear-hinged-lid-tamper-evident-container.html", keywords: ' gen-4660' },
        { type: 'product', title: '6 OZ AD RPET CLEAR HINGED LID VENTED TAMPER EVIDENT CONTAINER', url: BASE + "products/6-oz-ad-rpet-clear-hinged-lid-vented-tamper-evident-container.html", keywords: ' gen-4658' },
        { type: 'product', title: '6" PETITE PET CAKE CONTAINER', url: BASE + "products/6-petite-pet-cake-container.html", keywords: ' gen-1029' },
        { type: 'product', title: '64 OZ RPET CLEAR HINGED LID LARGE ROUND TAMPER EVIDENT BOWL', url: BASE + "products/64-oz-rpet-clear-hinged-lid-large-round-tamper-evident-bowl.html", keywords: ' gen-4539' },
        { type: 'product', title: '64 OZ RPET CLEAR HINGED VENTED LID LARGE ROUND TAMPER EVIDENT BOWL', url: BASE + "products/64-oz-rpet-clear-hinged-vented-lid-large-round-tamper-evident-bowl.html", keywords: ' gen-4550' },
        { type: 'product', title: '6X6" PET CLEAR 4-COMPARTMENT SNACK CONTAINER & LID', url: BASE + "products/6x6-pet-clear-4-compartment-snack-container-038-lid.html", keywords: ' gen-1101' },
        { type: 'product', title: '6X6" PET CLEAR 4-COMPARTMENT SNACK CONTAINER LID', url: BASE + "products/6x6-pet-clear-4-compartment-snack-container-lid.html", keywords: ' gen-3921' },
        { type: 'product', title: '6X6" PET CLEAR 4-COMPARTMENT SNACK CONTAINER', url: BASE + "products/6x6-pet-clear-4-compartment-snack-container.html", keywords: ' gen-3919' },
        { type: 'product', title: '7.5" 18 OZ PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/7-5-18-oz-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-75-18b' },
        { type: 'product', title: '7.5" 24 OZ 4-COMP. PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/7-5-24-oz-4-comp-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-75-24-4b' },
        { type: 'product', title: '7.5" 24 OZ PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/7-5-24-oz-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-75-24b' },
        { type: 'product', title: '7.5" 32 OZ PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/7-5-32-oz-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-75-32b' },
        { type: 'product', title: '7.5" 48 OZ PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL BULK', url: BASE + "products/7-5-48-oz-pet-clear-tamper-evident-medium-square-bowl-bulk.html", keywords: ' esb-75-48b' },
        { type: 'product', title: '7.5" PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL DOME LID BULK', url: BASE + "products/7-5-pet-clear-tamper-evident-medium-square-bowl-dome-lid-bulk.html", keywords: ' esb-dlid75b' },
        { type: 'product', title: '7.5" PET CLEAR TAMPER EVIDENT MEDIUM SQUARE BOWL FLAT LID BULK', url: BASE + "products/7-5-pet-clear-tamper-evident-medium-square-bowl-flat-lid-bulk.html", keywords: ' esb-flid75b' },
        { type: 'product', title: '7 OZ PET CLEAR CUP', url: BASE + "products/7-oz-pet-clear-cup.html", keywords: ' gen-7007' },
        { type: 'product', title: '7 X 6 16 OZ RPET CLEAR HINGED LID TAMPER EVIDENT CONTAINER', url: BASE + "products/7-x-6-16-oz-rpet-clear-hinged-lid-tamper-evident-container.html", keywords: ' rptte76-16' },
        { type: 'product', title: '7 x 6 24 OZ RPET CLEAR HINGED LID TAMPER EVIDENT HEAVY CONTAINER', url: BASE + "products/7-x-6-24-oz-rpet-clear-hinged-lid-tamper-evident-heavy-container.html", keywords: ' rptte76-24h' },
        { type: 'product', title: '7 X 6 24OZ RPET CLEAR HINGED TAMPER EVIDENT CONTAINER - VENTED LID', url: BASE + "products/7-x-6-24oz-rpet-clear-hinged-tamper-evident-container-vented-lid.html", keywords: ' gen-4606' },
        { type: 'product', title: '7 X 6 32 OZ RPET CLEAR HINGED LID TAMPER EVIDENT HEAVY CONTAINER', url: BASE + "products/7-x-6-32-oz-rpet-clear-hinged-lid-tamper-evident-heavy-container.html", keywords: ' rptte76-32h' },
        { type: 'product', title: '7 X 6 32OZ RPET CLEAR HINGED TAMPER EVIDENT CONTAINER - VENTED LID', url: BASE + "products/7-x-6-32oz-rpet-clear-hinged-tamper-evident-container-vented-lid.html", keywords: ' gen-4656' },
        { type: 'product', title: '7 X 6 35 OZ 4 CELL RPET CLEAR HINGED TAMPER EVIDENT CONTAINER - VENTED LID', url: BASE + "products/7-x-6-35-oz-4-cell-rpet-clear-hinged-tamper-evident-container-vented-lid.html", keywords: ' gen-4604' },
        { type: 'product', title: '7 X 6 48OZ RPET CLEAR HINGED TAMPER EVIDENT CONTAINER VENTED LID', url: BASE + "products/7-x-6-48oz-rpet-clear-hinged-tamper-evident-container-vented-lid.html", keywords: ' gen-4602' },
        { type: 'product', title: '8-32 OZ PET CLEAR TAMPER EVIDENT SQUARE DELI CONTAINER RECESSED LOCK LID', url: BASE + "products/8-32-oz-pet-clear-tamper-evident-square-deli-container-recessed-lock-lid.html", keywords: ' gen-1105 PTTESDCLID' },
        { type: 'product', title: '8-32OZ PET CLEAR TAMPER EVIDENT DEEP SQUARE DELI CONTAINER DEEP RECESSED LID', url: BASE + "products/8-32oz-pet-clear-tamper-evident-deep-square-deli-container-deep-recessed-lid.html", keywords: ' gen-3910' },
        { type: 'product', title: '8-32OZ PET CLEAR TAMPER EVIDENT SQUARE DELI CONTAINER DEEP RECESSED VENTED LID', url: BASE + "products/8-32oz-pet-clear-tamper-evident-square-deli-container-deep-recessed-vented-lid.html", keywords: ' gen-4627' },
        { type: 'product', title: '8" PLUS BLACK BASE/CLEAR TOP PET CAKE CONTAINER DOUBLE LAYER', url: BASE + "products/8-plus-black-base-clear-top-pet-cake-container-double-layer.html", keywords: ' gen-3897' },
        { type: 'product', title: '8" PLUS BLACK BASE/CLEAR TOP PET CAKE CONTAINER SINGLE LAYER', url: BASE + "products/8-plus-black-base-clear-top-pet-cake-container-single-layer.html", keywords: ' gen-3898' },
        { type: 'product', title: '8 OZ AD RPET CLEAR HINGED LID TAMPER EVIDENT CONTAINER', url: BASE + "products/8-oz-ad-rpet-clear-hinged-lid-tamper-evident-container.html", keywords: ' gen-4196' },
        { type: 'product', title: '8 OZ PET CLEAR CUP', url: BASE + "products/8-oz-pet-clear-cup.html", keywords: ' gen-8008' },
        { type: 'product', title: '80 OZ RPET CLEAR HINGED LID LARGE ROUND TAMPER EVIDENT BOWL', url: BASE + "products/80-oz-rpet-clear-hinged-lid-large-round-tamper-evident-bowl.html", keywords: ' gen-4540' },
        { type: 'product', title: '80 OZ RPET CLEAR HINGED VENTED LID LARGE ROUND TAMPER EVIDENT BOWL', url: BASE + "products/80-oz-rpet-clear-hinged-vented-lid-large-round-tamper-evident-bowl.html", keywords: ' gen-4551' },
        { type: 'product', title: '8X9X2.5" BAKERY HINGED CONTAINER', url: BASE + "products/8x9x2-5-bakery-hinged-container.html", keywords: ' gen-4239' },
        { type: 'product', title: '9" 40 OZ PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-40-oz-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' esb-9-40b' },
        { type: 'product', title: '9" 48 OZ 4-COMP. PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-48-oz-4-comp-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' esb-9-48-4b' },
        { type: 'product', title: '9" 48 OZ PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-48-oz-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' esb-9-48b' },
        { type: 'product', title: '9" 64 OZ 4-COMP. PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-64-oz-4-comp-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' esb-9-64-4b' },
        { type: 'product', title: '9" 64 OZ PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-64-oz-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' esb-9-64b' },
        { type: 'product', title: '9" 30 OZ PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-30-oz-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' gen-4639' },
        { type: 'product', title: '9" 40 OZ PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-40-oz-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' gen-4637' },
        { type: 'product', title: '9" 48 OZ 5-COMPARTMENT PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-48-oz-5-compartment-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' gen-4633' },
        { type: 'product', title: '9" 48 OZ PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL BULK', url: BASE + "products/9-48-oz-pet-clear-tamper-evident-large-square-bowl-bulk.html", keywords: ' gen-4635' },
        { type: 'product', title: '9" LARGE PET CLEAR TAMPER EVIDENT SQUARE BOWL DOME LID BULK', url: BASE + "products/9-large-pet-clear-tamper-evident-square-bowl-dome-lid-bulk.html", keywords: ' gen-4629' },
        { type: 'product', title: '9" LARGE PET CLEAR TAMPER EVIDENT SQUARE BOWL FLAT LID BULK (180 PIECES)', url: BASE + "products/9-large-pet-clear-tamper-evident-square-bowl-flat-lid-bulk-180-pieces.html", keywords: ' gen-4631' },
        { type: 'product', title: '9" TAMPER EVIDENT 5 COMPARTMENT PLATTER LID – VENTED', url: BASE + "products/9-tamper-evident-5-compartment-platter-lid-vented.html", keywords: ' gen-4652' },
        { type: 'product', title: '9" TAMPER EVIDENT 5 COMPARTMENT PLATTER LID', url: BASE + "products/9-tamper-evident-5-compartment-platter-lid.html", keywords: ' gen-4654' },
        { type: 'product', title: '9" TAMPER EVIDENT 5 COMPARTMENT PLATTER', url: BASE + "products/9-tamper-evident-5-compartment-platter.html", keywords: ' gen-4650' },
        { type: 'product', title: '9 OZ SQUAT PET CLEAR CUP (SMOOTH WALL)', url: BASE + "products/9-oz-squat-pet-clear-cup-smooth-wall.html", keywords: ' gen-9009' },
        { type: 'product', title: '9" PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL DOME LID BULK', url: BASE + "products/9-pet-clear-tamper-evident-large-square-bowl-dome-lid-bulk.html", keywords: ' esb-dlid9b' },
        { type: 'product', title: '9" PET CLEAR TAMPER EVIDENT LARGE SQUARE BOWL FLAT LID BULK', url: BASE + "products/9-pet-clear-tamper-evident-large-square-bowl-flat-lid-bulk.html", keywords: ' esb-flid9b' },
        { type: 'product', title: '9" PET PIE CONTAINER', url: BASE + "products/9-pet-pie-container.html", keywords: ' gen-1030' },
        { type: 'product', title: 'FILM SEAL 8.7"X6.6" 35OZ TRAY', url: BASE + "products/film-seal-8-7-x6-6-35oz-tray.html", keywords: ' gen-4670' },
        { type: 'product', title: 'FILM SEAL 8.7"X6.6" 47OZ TRAY', url: BASE + "products/film-seal-8-7-x6-6-47oz-tray.html", keywords: ' gen-4672' },
        { type: 'product', title: 'FILM SEAL 9.6"X7.3" 73OZ 2 CELL TRAY', url: BASE + "products/film-seal-9-6-x7-3-73oz-2-cell-tray.html", keywords: ' gen-4668' },
        { type: 'product', title: 'FILM SEAL 9.6"X7.3" 73OZ TRAY', url: BASE + "products/film-seal-9-6-x7-3-73oz-tray.html", keywords: ' gen-4666' },
        { type: 'product', title: 'HALVED STANDING SANDWICH - LARGE', url: BASE + "products/halved-standing-sandwich-large.html", keywords: ' gen-4612' },
        { type: 'product', title: 'PCR PET HINGED 6X6X3 BAKERY HINGED CONTAINER', url: BASE + "products/pcr-pet-hinged-6x6x3-bakery-hinged-container.html", keywords: ' gen-4064' },
        { type: 'product', title: 'PCR PET HINGED 8X8X3 BAKERY HINGED CONTAINER', url: BASE + "products/pcr-pet-hinged-8x8x3-bakery-hinged-container.html", keywords: ' gen-4066' },
        { type: 'product', title: 'PCR PET HINGED 9X8X3 BAKERY HINGED CONTAINER', url: BASE + "products/pcr-pet-hinged-9x8x3-bakery-hinged-container.html", keywords: ' gen-4070' },
        { type: 'product', title: 'PET 3 COMP. COOKIES CONTAINER BULK', url: BASE + "products/pet-3-comp-cookies-container-bulk.html", keywords: ' ptcook3-b' },
        { type: 'product', title: 'PET 3 COMP. COOKIES CONTAINER LID BULK', url: BASE + "products/pet-3-comp-cookies-container-lid-bulk.html", keywords: ' ptcook3-l' },
        { type: 'product', title: 'PET 9X5 2.25" BAKERY HINGED CONTAINER', url: BASE + "products/pet-9x5-2-25-bakery-hinged-container.html", keywords: ' gen-4046' },
        { type: 'product', title: 'PET BAKERY HINGED 9×9 2.25 RIB', url: BASE + "products/pet-bakery-hinged-9x9-2-25-rib.html", keywords: ' pth99-rib' },
        { type: 'product', title: 'PET BUTTER LETTUCE SINGLE HINGED LID CONTAINER W/TEXTURED BOTTOM', url: BASE + "products/pet-butter-lettuce-single-hinged-lid-container-w-textured-bottom.html", keywords: ' gen-3906' },
        { type: 'product', title: 'PET CLEAR DOME LID W/ ROUND HOLE (FITS 12/14, 16, 20, 24 OZ)', url: BASE + "products/pet-clear-dome-lid-w-round-hole-fits-12-14-16-20-24-oz.html", keywords: ' ptlid-d98rh' },
        { type: 'product', title: 'PET CLEAR DOME LID W/ ROUND HOLE (FITS 12OZ TALL, 16OZ TALL)', url: BASE + "products/pet-clear-dome-lid-w-round-hole-fits-12oz-tall-16oz-tall.html", keywords: ' ptlid-d92rh' },
        { type: 'product', title: 'PET CLEAR FLAT LID W/ STRAW SLOT (FITS 12/14, 16, 20, 24 OZ)', url: BASE + "products/pet-clear-flat-lid-w-straw-slot-fits-12-14-16-20-24-oz.html", keywords: ' ptlid-f98ss' },
        { type: 'product', title: 'PET CLEAR FLAT LID W/ STRAW SLOT (FITS 12OZ TALL, 16OZ TALL)', url: BASE + "products/pet-clear-flat-lid-w-straw-slot-fits-12oz-tall-16oz-tall.html", keywords: ' ptlid-f92ss' },
        { type: 'product', title: 'PET CLEAR RECTANGULAR HINGED CONTAINER', url: BASE + "products/pet-clear-rectangular-hinged-container.html", keywords: ' gen-3609' },
        { type: 'product', title: 'PET CLEAR ROUND DELI SNACK CUP W/ DOME LID', url: BASE + "products/pet-clear-round-deli-snack-cup-w-dome-lid.html", keywords: ' gen-1557' },
        { type: 'product', title: 'PET CLEAR STRAWLESS SIP LID (FITS 12/14, 16, 20, 24 OZ)', url: BASE + "products/pet-clear-strawless-sip-lid-fits-12-14-16-20-24-oz.html", keywords: ' ptlid-s98' },
        { type: 'product', title: 'PET CLEAR STRAWLESS SIP LID (FITS 12OZ TALL, 16OZ TALL)', url: BASE + "products/pet-clear-strawless-sip-lid-fits-12oz-tall-16oz-tall.html", keywords: ' ptlid-s92' },
        { type: 'product', title: 'PET CLEAR TAMPER 8.5X8 2C DOME LID BULK', url: BASE + "products/pet-clear-tamper-8-5x8-2c-dome-lid-bulk.html", keywords: ' gen-4184' },
        { type: 'product', title: 'PET CLEAR TAMPER EVIDENT 6X6" 2 CELL SQUARE CONTAINER COMBO PACK', url: BASE + "products/pet-clear-tamper-evident-6x6-2-cell-square-container-combo-pack.html", keywords: ' gen-2262' },
        { type: 'product', title: 'PET CLEAR TAMPER EVIDENT 6X6" 32OZ SQUARE CONTAINER', url: BASE + "products/pet-clear-tamper-evident-6x6-32oz-square-container.html", keywords: ' gen-2721' },
        { type: 'product', title: 'PET CLEAR TAMPER EVIDENT 6X6" 4 CELL SQUARE CONTAINER COMBO PACK', url: BASE + "products/pet-clear-tamper-evident-6x6-4-cell-square-container-combo-pack.html", keywords: ' gen-1947' },
        { type: 'product', title: 'PET CLEAR TAMPER EVIDENT 6X6" SQUARE 4 CELL LID', url: BASE + "products/pet-clear-tamper-evident-6x6-square-4-cell-lid.html", keywords: ' gen-2727' },
        { type: 'product', title: 'PET CLEAR TAMPER EVIDENT 6X6" SQUARE 4 CELL', url: BASE + "products/pet-clear-tamper-evident-6x6-square-4-cell.html", keywords: ' gen-2725' },
        { type: 'product', title: 'PET CLEAR TAMPER EVIDENT 6X6" SQUARE RECESSED LID', url: BASE + "products/pet-clear-tamper-evident-6x6-square-recessed-lid.html", keywords: ' gen-2729' },
        { type: 'product', title: 'PET CLEAR TAMPER EVIDENT 8.5X8X1.75" 2C/LID COMBO PACK', url: BASE + "products/pet-clear-tamper-evident-8-5x8x1-75-2c-lid-combo-pack.html", keywords: ' gen-2735' },
        { type: 'product', title: 'PET STRAWBERRY LONG BAR CAKE CONTAINER', url: BASE + "products/pet-strawberry-long-bar-cake-container.html", keywords: ' ptsb-long' },
        { type: 'product', title: 'PET TAMPER 8.5X8X1.75 2C BLACK BULK', url: BASE + "products/pet-tamper-8-5x8x1-75-2c-black-bulk.html", keywords: ' gen-4188' },
        { type: 'product', title: 'PET TAMPER 8.5X8X1.75 2C BULK', url: BASE + "products/pet-tamper-8-5x8x1-75-2c-bulk.html", keywords: ' gen-3907' },
        { type: 'product', title: 'PET TAMPER EVIDENT 6X6 24OZ SQUARE CONTAINER', url: BASE + "products/pet-tamper-evident-6x6-24oz-square-container.html", keywords: ' gen-4157' },
        { type: 'product', title: 'PET TAMPER EVIDENT 6X6 60 OZ SQUARE CONTAINER', url: BASE + "products/pet-tamper-evident-6x6-60-oz-square-container.html", keywords: ' gen-4356' },
        { type: 'product', title: 'PET TAMPER EVIDENT 6X6" 2 CELL SQUARE CONTAINER W/RECESSED LID COMBO PACK', url: BASE + "products/pet-tamper-evident-6x6-2-cell-square-container-w-recessed-lid-combo-pack.html", keywords: ' gen-4643' },
        { type: 'product', title: 'PET TAMPER EVIDENT 6X6" 32 OZ SQUARE CONTAINER & LID COMBO PACK', url: BASE + "products/pet-tamper-evident-6x6-32-oz-square-container-038-lid-combo-pack.html", keywords: ' gen-4641' },
        { type: 'product', title: 'PET TAMPER EVIDENT 6X6" SQUARE 2 CELL', url: BASE + "products/pet-tamper-evident-6x6-square-2-cell.html", keywords: ' gen-3605' },
        { type: 'product', title: 'PET TAMPER EVIDENT 6X6" SQUARE 2CELL W/RECESSED LID COMBO PACK', url: BASE + "products/pet-tamper-evident-6x6-square-2cell-w-recessed-lid-combo-pack.html", keywords: ' gen-3893' },
        { type: 'product', title: 'PET TAMPER EVIDENT 6X6" SQUARE 4 CELL COMBO PACK', url: BASE + "products/pet-tamper-evident-6x6-square-4-cell-combo-pack.html", keywords: ' gen-3890' },
        { type: 'product', title: 'PET TAMPER EVIDENT FLAT PANEL PARFAIT CUP 11 OZ', url: BASE + "products/pet-tamper-evident-flat-panel-parfait-cup-11-oz.html", keywords: ' gen-3531' },
        { type: 'product', title: 'PET TAMPER EVIDENT FLAT PANEL PARFAIT CUP 13 OZ', url: BASE + "products/pet-tamper-evident-flat-panel-parfait-cup-13-oz.html", keywords: ' gen-3543' },
        { type: 'product', title: 'PET TAMPER EVIDENT FLAT PANEL PARFAIT CUP 9 OZ', url: BASE + "products/pet-tamper-evident-flat-panel-parfait-cup-9-oz.html", keywords: ' gen-3528' },
        { type: 'product', title: 'PET TAMPER EVIDENT FLAT PANEL PARFAIT INSERT 2C', url: BASE + "products/pet-tamper-evident-flat-panel-parfait-insert-2c.html", keywords: ' gen-3538' },
        { type: 'product', title: 'PET TAMPER EVIDENT FLAT PANEL PARFAIT INSERT', url: BASE + "products/pet-tamper-evident-flat-panel-parfait-insert.html", keywords: ' gen-3535' },
        { type: 'product', title: 'PET TAMPER EVIDENT FLAT PANEL VENTED PARFAIT CUP 11 OZ', url: BASE + "products/pet-tamper-evident-flat-panel-vented-parfait-cup-11-oz.html", keywords: ' gen-4346' },
        { type: 'product', title: 'PET TAMPER EVIDENT FLAT PANEL VENTED PARFAIT CUP 13 OZ', url: BASE + "products/pet-tamper-evident-flat-panel-vented-parfait-cup-13-oz.html", keywords: ' gen-3918' },
        { type: 'product', title: 'PET TAMPER EVIDENT FLAT PANEL VENTED PARFAIT CUP 9 OZ', url: BASE + "products/pet-tamper-evident-flat-panel-vented-parfait-cup-9-oz.html", keywords: ' gen-4348' },
        { type: 'product', title: 'PET 8X8″ 3 CELL CLEAR HINGED LID BAKERY CONTAINER', url: BASE + "products/pth-8x8-3-cell-clear-hinged-lid-bakery-container.html", keywords: ' pth88-3c' },
        { type: 'product', title: 'PET 8X8″ 9 CELL CLEAR HINGED LID BAKERY CONTAINER', url: BASE + "products/pth-8x8-9-cell-clear-hinged-lid-bakery-container.html", keywords: ' pth88-9c' },
        { type: 'product', title: 'RPET TAMPER EVIDENT HOAGIE CONTAINER', url: BASE + "products/rpet-tamper-evident-hoagie-container.html", keywords: ' gen-2711' },
        { type: 'product', title: 'RPET TAMPER EVIDENT SANDWICH WEDGE', url: BASE + "products/rpet-tamper-evident-sandwich-wedge.html", keywords: ' gen-1102' },
        { type: 'product', title: 'RPET TAMPER EVIDENT SANDWICH WRAP', url: BASE + "products/rpet-tamper-evident-sandwich-wrap.html", keywords: ' gen-1556' },
        { type: 'product', title: 'SMALL TAMPER EVIDENT 2 CELL SNACK CONTAINER', url: BASE + "products/small-tamper-evident-2-cell-snack-container.html", keywords: ' gen-4646' },
        { type: 'product', title: 'SMALL TAMPER EVIDENT 3 CELL SNACK CONTAINER', url: BASE + "products/small-tamper-evident-3-cell-snack-container.html", keywords: ' gen-4608' },
        { type: 'product', title: 'SMALL TAMPER EVIDENT 4 CELL SNACK CONTAINER', url: BASE + "products/small-tamper-evident-4-cell-snack-container.html", keywords: ' gen-4648' },
        { type: 'product', title: 'TAMPER EVIDENT 8" DISPLAY HOAGIE', url: BASE + "products/tamper-evident-8-display-hoagie.html", keywords: ' gen-4529' },
        { type: 'product', title: 'TAMPER EVIDENT WRAP CONTAINER- SM', url: BASE + "products/tamper-evident-wrap-container-sm.html", keywords: ' gen-4689' }
    ];
    const TYPE_LABELS = { page: 'Page', resource: 'Resource', category: 'Category', product: 'Product' };
    function score(item, query) {
        const q = query.toLowerCase().trim();
        if (!q) return 0;
        const t = (item.title || '').toLowerCase();
        const k = (item.keywords || '').toLowerCase();
        if (t === q) return 100;
        if (t.startsWith(q)) return 80;
        if (t.includes(q)) return 60;
        if (k.includes(q)) return 40;
        const words = q.split(' ');
        const hit = words.every(w => t.includes(w) || k.includes(w));
        return hit ? 20 : 0;
    }
    function search(query) {
        return SEARCH_INDEX.map(item => ({ item, s: score(item, query) })).filter(r => r.s > 0).sort((a, b) => b.s - a.s).slice(0, 10).map(r => r.item);
    }
    function highlight(text, query) {
        if (!query) return text;
        const escaped = query.replace(/[.*+?^${}( )|[\]\\]/g, '\\$&');
        const re = new RegExp('(' + escaped + ')', 'gi');
        return text.replace(re, '<mark>$1</mark>');
    }
    const overlayHTML = `<div id="search-overlay" role="dialog" aria-modal="true" aria-label="Site Search"><div id="search-overlay-inner"><button id="search-close" aria-label="Close search">✕</button><div id="search-box-wrap"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg><input type="text" id="search-input" placeholder="Search products, pages, resources…" autocomplete="off" spellcheck="false"><kbd id="search-esc-hint">ESC</kbd></div><div id="search-results" role="listbox"></div><p id="search-hint">Start typing to search across all products and pages</p></div></div>`;
    const overlayStyles = `#search-overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); backdrop-filter: blur(6px); z-index: 9999; padding: 2rem 1rem; } #search-overlay.active { display: flex; align-items: flex-start; justify-content: center; } #search-overlay-inner { background: #fff; border-radius: 12px; width: 100%; max-width: 640px; padding: 1.5rem; margin-top: 6rem; box-shadow: 0 25px 60px rgba(0,0,0,0.35); position: relative; } #search-close { position: absolute; top: 1rem; right: 1rem; background: none; border: none; font-size: 1.2rem; cursor: pointer; color: #888; } #search-box-wrap { display: flex; align-items: center; gap: 0.75rem; border-bottom: 2px solid #e0e0e0; padding-bottom: 1rem; margin-bottom: 1rem; } #search-input { flex: 1; border: none; outline: none; font-size: 1.1rem; color: #1a1a2e; background: transparent; } #search-results { list-style: none; margin: 0; padding: 0; max-height: 360px; overflow-y: auto; } .search-result-item { display: flex; align-items: center; gap: 0.75rem; padding: 0.75rem 0.5rem; border-radius: 6px; cursor: pointer; text-decoration: none; color: inherit; } .search-result-badge { font-size: 0.65rem; font-weight: 600; text-transform: uppercase; padding: 2px 7px; border-radius: 999px; } .badge-page { background: #e8f0fe; color: #1a73e8; } .badge-resource { background: #e6f4ea; color: #188038; } .badge-category { background: #fce8e6; color: #c5221f; } .badge-product { background: #fef7e0; color: #b06000; } .search-result-title { font-size: 0.95rem; font-weight: 500; } .search-result-title mark { background: #fff3cd; } #search-hint { text-align: center; color: #aaa; font-size: 0.85rem; margin-top: 0.5rem; }`;

    function init() {
        const s = document.createElement('style'); s.textContent = overlayStyles; document.head.appendChild(s);
        document.body.insertAdjacentHTML('beforeend', overlayHTML);
        const o = document.getElementById('search-overlay'), i = document.getElementById('search-input'), r = document.getElementById('search-results'), close = document.getElementById('search-close');
        const toggle = document.querySelector('.search-icon-btn');
        if (toggle) toggle.addEventListener('click', e => { e.preventDefault(); o.classList.add('active'); setTimeout(() => i.focus(), 50); });
        close.addEventListener('click', () => { o.classList.remove('active'); i.value = ''; r.innerHTML = ''; });
        document.addEventListener('keydown', e => { if ((e.ctrlKey || e.metaKey) && e.key === 'k') { e.preventDefault(); o.classList.add('active'); i.focus(); } if (e.key === 'Escape') { o.classList.remove('active'); i.value = ''; r.innerHTML = ''; } });
        i.addEventListener('input', () => {
            const val = i.value;
            r.innerHTML = ''; if (!val.trim()) return;
            const matches = search(val);
            matches.forEach(item => {
                const a = document.createElement('a'); a.className = 'search-result-item'; a.href = item.url;
                const title = item.title || '';
                a.innerHTML = `<span class="search-result-badge badge-${item.type}">${TYPE_LABELS[item.type]}</span><span class="search-result-title">${highlight(title, val)}</span>`;
                r.appendChild(a);
            });
        });
    }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init); else init();
})();