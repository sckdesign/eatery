$newNavTemplate = @'
            <nav class="main-nav">
                <ul class="menu">
                    <li class="menu-item"><a href="{BASE}news.html">NEWS</a></li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{BASE}products.html">PRODUCTS</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{BASE}products.html">All Products</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="{BASE}products.html">Shop By Type</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="{BASE}category/kodacup-pet-clear-cups.html">Clear Cups</a></li>
                                    <li class="menu-item"><a href="{BASE}category/kodacup-deli-containers.html">Round Deli Containers</a></li>
                                    <li class="menu-item"><a href="{BASE}category/kodacup-hinged-lid-containers.html">Hinged Containers</a></li>
                                    <li class="menu-item"><a href="{BASE}category/kodacup-clear-salad-bowls.html">Plastic Salad Bowls</a></li>
                                    <li class="menu-item"><a href="{BASE}category/kodacup-cake-bakery-containers.html">Cake & Bakery</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="{BASE}category/but-n-loc.html">Shop By Lid</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="{BASE}category/but-n-loc.html">Tamper Evident</a></li>
                                    <li class="menu-item"><a href="{BASE}category/kodacup-hinged-lid-containers.html">Hinged Lid</a></li>
                                    <li class="menu-item"><a href="{BASE}products.html#vented-lids">Vented Lid</a></li>
                                    <li class="menu-item"><a href="{BASE}products.html#dome-flat-lids">Dome & Flat Lids</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="{BASE}products.html#size-medium">Shop By Size</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="{BASE}products.html#size-small">Under 10 oz</a></li>
                                    <li class="menu-item"><a href="{BASE}products.html#size-medium">12 oz - 16 oz</a></li>
                                    <li class="menu-item"><a href="{BASE}products.html#size-large">20 oz - 32 oz</a></li>
                                    <li class="menu-item"><a href="{BASE}products.html#size-xl">40 oz +</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="{BASE}but-n-loc-closing-machine.html">BUT-N-LOC Closing Machine</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="{BASE}sustainability.html">SUSTAINABILITY</a></li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{BASE}catalog.html">RESOURCES</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{BASE}catalog.html">Catalog</a></li>
                            <li class="menu-item"><a href="{BASE}sales-documents.html">Sales Documents</a></li>
                            <li class="menu-item"><a href="{BASE}customer-reference-documents.html">Customer Reference Documents</a></li>
                            <li class="menu-item"><a href="{BASE}instructional-videos.html">Instructional Videos</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children">
                        <a href="{BASE}about.html">ABOUT</a>
                        <ul class="sub-menu">
                            <li class="menu-item"><a href="{BASE}about.html">Company Info</a></li>
                            <li class="menu-item"><a href="{BASE}certification.html">Certification</a></li>
                        </ul>
                    </li>
                    <li class="menu-item"><a href="{BASE}contact.html">CONTACT</a></li>
                    <li class="menu-item"><a href="{BASE}careers.html">CAREERS</a></li>
                </ul>
            </nav>
'@

function Get-RelativeBase($filePath) {
    # Get the path relative to the current directory
    $relativePath = $filePath.Replace($pwd.Path, "").TrimStart('\')
    # Count the number of directory separators to determine depth
    $depth = ($relativePath.Split([char[]]@('\', '/')) | Where-Object { $_ }).Count - 1
    if ($depth -le 0) { return "" }
    return ("../" * $depth)
}

$files = Get-ChildItem -Recurse -Filter *.html
foreach ($file in $files) {
    Write-Host "Updating $($file.FullName)..."
    $content = Get-Content $file.FullName -Raw -Encoding UTF8
    
    $base = Get-RelativeBase $file.FullName
    $newNav = $newNavTemplate.Replace("{BASE}", $base)
    
    # Update Nav
    $navRegex = '(?s)<nav class="main-nav">.*?</nav>'
    if ($content -match $navRegex) {
        $content = [Regex]::Replace($content, $navRegex, $newNav)
    }

    # Update Footer Links
    $content = $content -replace '<a href=".*sales-sheets\.html">Sales Sheets</a>', "<a href=""$($base)sales-documents.html"">Sales Documents</a>"
    $content = $content -replace '<a href=".*documents\.html">Documents</a>', "<a href=""$($base)sales-documents.html"">Sales Documents</a>"

    # Inject Privacy Policy Link into Footer (Company section)
    if ($content -notmatch 'privacy-policy\.html') {
        $content = $content -replace '(<a href="[^"]*news\.html">News</a>)', "`$1`n                    <a href=""$($base)privacy-policy.html"">Privacy Policy</a>"
    }

    # Update Cookie Banner
    $newCookieBanner = @"
    <!-- Cookie Banner -->
    <div id="cookie-banner" class="cookie-banner">
        <div class="cookie-content">
            <div class="cookie-icon"><i class="fas fa-cookie-bite"></i></div>
            <p>We use cookies to enhance your experience, analyze site traffic, and serve tailored content. By continuing to browse, you agree to our use of cookies as described in our <a href="$($base)privacy-policy.html">Privacy Policy</a>.</p>
            <div class="cookie-actions">
                <button id="reject-cookies" class="btn btn-outline cookie-btn-reject">Reject</button>
                <button id="accept-cookies" class="btn cookie-btn-accept">Accept</button>
            </div>
        </div>
    </div>
"@

    $oldBannerPattern1 = '(?is)<!-- Cookie Banner -->\s*<div id="cookie-banner"[\s\S]*?</div>\s*</div>\s*</div>'
    $oldBannerPattern2 = '(?is)<div id="cookie-banner"[\s\S]*?</div>\s*</div>\s*</div>'
    
    if ($content -match $oldBannerPattern1) {
        $content = [Regex]::Replace($content, $oldBannerPattern1, '')
    }
    elseif ($content -match $oldBannerPattern2) {
        $content = [Regex]::Replace($content, $oldBannerPattern2, '')
    }

    $content = $content -replace '</body>', "$newCookieBanner`n</body>"

    [System.IO.File]::WriteAllText($file.FullName, $content, (New-Object System.Text.UTF8Encoding($false)))
}
Write-Host "Done!"
