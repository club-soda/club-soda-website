<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://grit-oyster.co.uk/
 * @since             1.0.0
 * @package           OSS_ClubSoda
 *
 * @wordpress-plugin
 * Plugin Name:       ClubSoda
 * Plugin URI:        http://grit-oyster.co.uk/plugins/
 * Description:       Provides customisations specific to the ClubSoda website. Requires Oystershell Core plugin.
 * Version:           1.0.0
 * Author:            Grit & Oyster
 * Author URI:        http://grit-oyster.co.uk/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       oss-clubsoda
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-oss-clubsoda-activator.php
 */
function activate_oss_clubsoda() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-oss-clubsoda-activator.php';
	Oss_ClubSoda_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-oss-clubsoda-deactivator.php
 */
function deactivate_oss_clubsoda() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-oss-clubsoda-deactivator.php';
	Oss_ClubSoda_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_oss_clubsoda' );
register_deactivation_hook( __FILE__, 'deactivate_oss_clubsoda' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-oss-clubsoda.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_oss_clubsoda() {

	$plugin = new OSS_ClubSoda();
	$plugin->run();

}
run_oss_clubsoda();
