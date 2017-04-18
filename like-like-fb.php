<?php
/**
 * Plugin Name: Like Like Facebook
 * Description: Plugin is to make a post like feature  similar to  facebook like feature.
 * version: 1.0.0
 * Author: buddydeveloeprs
 * Author URI: http://buddydevelopers.com
 */
namespace L2F_Work;
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


if ( ! defined( 'BUDDY_L2F_PLUGINS_URL' ) ) {
	define( 'BUDDY_L2F_PLUGINS_URL',  plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'BUDDY_L2F_PLUGINS_PATH' ) ) {
	define( 'BUDDY_L2F_PLUGINS_PATH',  plugin_dir_path( __FILE__ ) );
}

require_once plugin_dir_path( __FILE__ ) . 'source/class-like-source.php';
require_once plugin_dir_path( __FILE__ ) . 'source/admin/class-l2f-settings.php';

$instance = L2f_Admin_Settings::get_instance();
$instance = L2f_Like_Source::get_instance();
