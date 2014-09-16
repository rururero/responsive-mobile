<?php
/**
 * Main Function
 *
 * Load functions and classes
 *
 * @package      Responsive_II
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the Responsive_II Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$template_directory = get_template_directory();

/**
 * Basic theme functionality
*/
require $template_directory . '/includes/functions.php';

/**
 * Theme Options
 */
require $template_directory . '/libraries/class-responsive-options.php';
require $template_directory . '/includes/functions-theme-options.php';
require $template_directory . '/includes/functions-theme-options-page.php';

/**
 * Meta Box Options
 */
require $template_directory . '/libraries/class-meta-box.php';
require $template_directory . '/includes/functions-meta-box.php';

/**
 * Custom template tags for this theme.
 */
require $template_directory . '/includes/functions-template-tags.php';

/**
 * Support THA Theme hooks through Responsives own functions.
 */
require $template_directory . '/core/tha-theme-hooks.php';
require $template_directory . '/includes/responsive-hooks.php';

/**
 * Theme Upsell
 */
require $template_directory . '/core/functions-theme-upsell.php';

/**
 * Create header items that hook into header.php
 */
require $template_directory . '/includes/functions-header.php';

/**
 * Implement the Custom Header feature.
 */
require $template_directory . '/includes/functions-custom-header.php';

/**
 * Custom functions that act independently to the theme templates.
 */
require $template_directory . '/includes/functions-extras.php';
require $template_directory . '/includes/functions-extentions.php';
require $template_directory . '/includes/functions-layout.php';
require $template_directory . '/includes/functions-front.php';

/**
 * Register Menus
 */
require $template_directory . '/includes/functions-menu.php';

/**
 * Register Sidebars
 */
require $template_directory . '/includes/functions-sidebar.php';

/**
 * Plugin compatibility
 */
require $template_directory . '/includes/functions-plugins.php';

/**
 * Theme Update
 */
require $template_directory . '/includes/functions-update.php';

/**
 * Plugin dependency
 */
require $template_directory . '/core/functions-install.php';

/**
 * Admin functionality
 */
require $template_directory . '/core/functions-admin.php';
