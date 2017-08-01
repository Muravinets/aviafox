<?php

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

define( 'MDLD', __DIR__ . '/../../../models' );
define( 'Z_THEME_PATH', __DIR__ );

require_once MDLD . '/WP/Router/PageRoute.php';
add_action(WP_Router_Utility::PLUGIN_INIT_HOOK, array('PageRoute', 'init'), 1, 0);