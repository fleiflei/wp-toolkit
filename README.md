Flei WP Toolkit
===============

@version 0.1.1

Useful tools & snippets for WP theme development.

Installation
------------

Clone this repository to a subfolder in your theme folder. Copy "flei_wp_toolkit.example.php" to a location outside of this folder but within your theme folder. Include it i.e. by using `require_once('flei_wp_toolkit.php')` in your functions.php file. 

Adjust the paths and comment those components from your "my_flei_wp_toolkit.php" that you don't need.

To include snippets copy the respective .example.php files from snippets/ to a location in your theme folder and change their content according to your needs.

Tools & Improvements:
---------------------

#### admin-bar-env-ribbon.php

Adds an alerting red/yellow ribbon background to the WP admin bar when the production environment is detected, so the admin knows he's working on the live version..

#### clean-up.php
Removes various information in `<head></head>` that are output by default:

- wp_generator
- wlwmanifest_link
- rsd_link
- wp_shortlink_wp_head
- adjacent_posts_rel_link_wp_head
- print_emoji_styles
- feed_links_extra
- wp_set_comment_cookies

#### disable-comments.php
Just that.

#### disable-google-fonts-in-backend.php
Disables loading Google Fonts from Google servers in the admin area.

#### disable-json-api.php
Just that, too.

#### enable-svg-upload.php
Adds mime type so .svg images can be uploaded to media library.

#### excerpt.php
Adds excerpt ability to pages and adjusts excerpt "more" text output. 

#### nav-wpml-lang-item.php
Adds an extra item for every language to menu at location "primary_navigation" (language switcher).

#### remove-emojis.php
Removes emoji shyte.

#### wp-env-body-class.php
Adds a class "env-development" to `<body>` if env == 'development'.

#### menu-editor-custom-fields.php
Allows to add custom fields to menu items in the menu editor in the WP admin area.

Snippets:
---------
@TODO

Usage:
------
@TODO

