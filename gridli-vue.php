<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Gridli_Vue
 *
 * @wordpress-plugin
 * Plugin Name:       Gridli Vue
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       Gridli Vue provides custom functionality.
 * Version:           1.0.0
 * Author:            Li Li
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gridli-vue
 * Domain Path:       /languages
 *
 * {Plugin Name} is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * {Plugin Name} is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with {Plugin Name}. If not, see {License URI}.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

define( GRIDLI_VUE_VERSION, '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gridli-vue-activator.php
 */
function activate_gridli_vue() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-gridli-vue-activator.php';
  Gridli_Vue_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gridli-vue-deactivator.php
 */
function deactivate_gridli_vue() {
  require_once plugin_dir_path( __FILE__ ) . 'includes/class-gridli-vue-deactivator.php';
  Gridli_Vue_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gridli_vue' );
register_deactivation_hook( __FILE__, 'deactivate_gridli_vue' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-gridli-vue.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_gridli_vue() {

  $plugin = new Gridli_Vue();
  $plugin->run();

}
run_gridli_vue();
