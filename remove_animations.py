import re

with open('theme_prototype/css/style.css', 'r', encoding='utf-8') as f:
    content = f.read()

# Remove transform from reveal classes
content = re.sub(r'transform: translateY\(30px\);\r?\n\s*', '', content)
content = re.sub(r'transform: translateX\(-50px\);\r?\n\s*', '', content)
content = re.sub(r'transform: translateX\(50px\);\r?\n\s*', '', content)
content = re.sub(r'transform: scale\(0.9\);\r?\n\s*', '', content)
content = re.sub(r'transform: translateY\(0\);\r?\n\s*', '', content)
content = re.sub(r'transform: translateX\(0\);\r?\n\s*', '', content)
content = re.sub(r'transform: scale\(1\);\r?\n\s*', '', content)
content = re.sub(r'transition: opacity var\(--transition-slow\), transform var\(--transition-slow\);', r'transition: opacity var(--transition-slow);', content)

# Remove button hover jump
content = re.sub(r'transform: translateY\(-2px\);\r?\n\s*', '', content)

with open('theme_prototype/css/style.css', 'w', encoding='utf-8') as f:
    f.write(content)
