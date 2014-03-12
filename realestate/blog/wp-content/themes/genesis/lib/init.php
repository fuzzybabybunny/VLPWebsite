<?php
/**
 * This file initializes the framework by doing some
 * basic things like defining constants, and loading
 * framework components from the /lib directory.
 *
 * @package Genesis
 *
 **/

/**
 * Define Theme Name/Version Constants
 * 
 **/
define('PARENT_THEME_NAME', apply_filters('parent_theme_name', 'Genesis'));
define('PARENT_THEME_VERSION', '1.0.2');

/**
 * Define Directory Location Constants
 */
define('PARENT_DIR', TEMPLATEPATH);
define('CHILD_DIR', STYLESHEETPATH);
define('GENESIS_IMAGES_DIR', PARENT_DIR.'/images');
define('GENESIS_LIB_DIR', PARENT_DIR.'/lib');
define('GENESIS_ADMIN_DIR', GENESIS_LIB_DIR.'/admin');
define('GENESIS_ADMIN_IMAGES_DIR', GENESIS_LIB_DIR.'/admin/images');
define('GENESIS_JS_DIR', GENESIS_LIB_DIR.'/js');
define('GENESIS_CSS_DIR', GENESIS_LIB_DIR.'/css');
define('GENESIS_FUNCTIONS_DIR', GENESIS_LIB_DIR.'/functions');
define('GENESIS_LANGUAGES_DIR', GENESIS_LIB_DIR.'/languages');
define('GENESIS_TOOLS_DIR', GENESIS_LIB_DIR.'/tools');
define('GENESIS_WIDGETS_DIR', GENESIS_LIB_DIR.'/widgets');

/**
 * Define URL Location Constants
 */
define('PARENT_URL', get_bloginfo('template_directory'));
define('CHILD_URL', get_bloginfo('stylesheet_directory'));
define('GENESIS_IMAGES_URL', PARENT_URL.'/images');
define('GENESIS_LIB_URL', PARENT_URL.'/lib');
define('GENESIS_ADMIN_URL', GENESIS_LIB_URL.'/admin');
define('GENESIS_ADMIN_IMAGES_URL', GENESIS_LIB_URL.'/admin/images');
define('GENESIS_JS_URL', GENESIS_LIB_URL.'/js');
define('GENESIS_CSS_URL', GENESIS_LIB_URL.'/css');
define('GENESIS_FUNCTIONS_URL', GENESIS_LIB_URL.'/functions');
define('GENESIS_LANGUAGES_URL', GENESIS_LIB_URL.'/languages');
define('GENESIS_TOOLS_URL', GENESIS_LIB_URL.'/tools');
define('GENESIS_WIDGETS_URL', GENESIS_LIB_URL.'/widgets');

/**
 * Define Settings Field Constants (for DB storage)
 */
define('GENESIS_SETTINGS_FIELD', apply_filters('genesis_settings_field', 'genesis-settings'));
define('GENESIS_SEO_SETTINGS_FIELD', apply_filters('genesis_seo_settings_field', 'genesis-seo-settings'));


/**
 * Load Framework Components
 *
 **/
//	Load Functions
require_once(GENESIS_FUNCTIONS_DIR.'/hooks.php');
require_once(GENESIS_FUNCTIONS_DIR.'/compatibility_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/general_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/options_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/image_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/admin_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/output_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/menu_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/layout_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/seo_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/widgetize_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/comment_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/feed_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/I18n_functions.php');
require_once(GENESIS_FUNCTIONS_DIR.'/deprecated_functions.php');

// Load Admin
require_once(GENESIS_ADMIN_DIR.'/menu.php');
require_once(GENESIS_ADMIN_DIR.'/theme_settings.php');
require_once(GENESIS_ADMIN_DIR.'/seo_settings.php');
require_once(GENESIS_ADMIN_DIR.'/purchase_themes.php');

// Load Javascript
require_once(GENESIS_JS_DIR.'/load_scripts.php');

// Load CSS
require_once(GENESIS_CSS_DIR.'/load_styles.php');
 
// Load Widgets
require_once(GENESIS_WIDGETS_DIR.'/user-profile-widget.php');
require_once(GENESIS_WIDGETS_DIR.'/enews-widget.php');
require_once(GENESIS_WIDGETS_DIR.'/featured-post-widget.php');
require_once(GENESIS_WIDGETS_DIR.'/featured-page-widget.php');
require_once(GENESIS_WIDGETS_DIR.'/menu-categories-widget.php');
require_once(GENESIS_WIDGETS_DIR.'/menu-pages-widget.php');
require_once(GENESIS_WIDGETS_DIR.'/latest-tweets-widget.php');

// Load Tools
//require_once(GENESIS_TOOLS_DIR.'/post_templates.php'); // don't load post_templates.php by default
require_once(GENESIS_TOOLS_DIR.'/custom_field_redirect.php');
/* breadcrumbs are loaded conditionally via output_functions.php

/**
 * Run the genesis_init() action hook
 *
 **/
genesis_init();