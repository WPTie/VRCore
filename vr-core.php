<?php
/**
 * Plugin Name: VR Core
 * Plugin URI: http://WPTie.com/
 * Description: VR Core.
 * Author: mrahmadawais, WPTie
 * Author URI: http://WPTie.com/
 * Text Domain: VR
 * Version: 0.0.1
 * License: GPL v2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package VRC
 */

/*
    Copyright 2015-2020 WPTie ( email: support at wptie.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    ( at your option ) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

/**
 * Define global constants
 *
 * @package VRC
 * @since 0.0.1
 */
if ( ! defined( 'VRC_VERSION' ) ) {
    define( 'VRC_VERSION', '0.0.1' );
}

if ( ! defined( 'VRC_NAME' ) ) {
    define( 'VRC_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined('VRC_DIR' ) ) {
    define( 'VRC_DIR', WP_PLUGIN_DIR . '/' . VRC_NAME );
}

if ( ! defined('VRC_URL' ) ) {
    define( 'VRC_URL', WP_PLUGIN_URL . '/' . VRC_NAME );
}

/**
 * AA Main File
 *
 * This is the main file of AA which controls everything in this plugin
 *
 * @since 0.0.1
 */
if ( file_exists( VRC_DIR . '/assets/inc/vrc.php' ) ) {
    require_once( VRC_DIR . '/assets/inc/vrc.php' );
}

/**
 * Plugin Activation
 *
 * @since 0.0.1
 */
// register_activation_hook( __FILE__, 'aa_welcome_screen_activate' );
// function aa_welcome_screen_activate() {
//   set_transient( '_welcome_redirect', true );
// }
