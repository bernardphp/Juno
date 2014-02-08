# Build file for sphinx

import sphinx_bernard_theme

html_theme = "sphinx_bernard_theme"
html_theme_path = [sphinx_bernard_theme.get_html_theme_path()]

master_doc = 'contents'

project = u'Juno'
copyright = u'MIT'
