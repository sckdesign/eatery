import re

try:
    with open('theme_prototype/css/style.css', 'r', encoding='utf-8') as f:
        content = f.read()
except UnicodeDecodeError:
    with open('theme_prototype/css/style.css', 'r', encoding='utf-16') as f:
        content = f.read()

# Reveal base
content = re.sub(r'transform:\s*translateY\([^\)]+\);\r?\n\s*transition:\s*opacity[^\n;]+, transform[^\n;]+;', 'transition: opacity var(--transition-slow);', content)
content = re.sub(r'transform:\s*translateY\(0\);\r?\n\s*', '', content)

# fadeInUp
content = re.sub(r'transform:\s*translateY\([^\)]+\);\r?\n\s*', '', content)

# Left/Right/Scale reveal
content = re.sub(r'transform:\s*translateX\([^\)]+\);\r?\n\s*', '', content)
content = re.sub(r'transform:\s*scale\([^\)]+\);\r?\n\s*', '', content)

# Buttons
content = re.sub(r'transform:\s*translateY\([^\)]+\);\r?\n\s*', '', content)

with open('theme_prototype/css/style.css', 'w', encoding='utf-8') as f:
    f.write(content)

print("Done replacing.")
