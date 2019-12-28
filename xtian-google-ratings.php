<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Xtian_Google_Ratings
 *
 * @wordpress-plugin
 * Plugin Name:       Google Ratings
 * Plugin URI:        https://github.com/e1cerebro/xtian-google-ratings
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Christian Uche
 * Author URI:        #
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       xtian-google-ratings
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'XTIAN_GOOGLE_RATINGS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-xtian-google-ratings-activator.php
 */
function activate_xtian_google_ratings() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-xtian-google-ratings-activator.php';
	Xtian_Google_Ratings_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-xtian-google-ratings-deactivator.php
 */
function deactivate_xtian_google_ratings() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-xtian-google-ratings-deactivator.php';
	Xtian_Google_Ratings_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_xtian_google_ratings' );
register_deactivation_hook( __FILE__, 'deactivate_xtian_google_ratings' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-xtian-google-ratings.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_xtian_google_ratings() {

	$plugin = new Xtian_Google_Ratings();
	$plugin->run();

}
run_xtian_google_ratings();
