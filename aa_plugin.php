<?php
/**
 * The plugin bootstrap file
 *
 * @link    http://example.com
 * @since   0.0.1
 * @package AA (Globals) or aa (file name and namespace) // Replace these
 *
 * @wordpress-plugin
 * Plugin Name: Contact Form 7 Themes
 * Plugin URI : http://WPTie.com/
 * Description: Contact Form 7 Themes.
 * Author     : WPTie, mrahmadawais
 * Author URI : http://WPTie.com/
 * Text Domain: contact-form-7-themes
 * Version    : 0.0.1
 * License    : GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 */

/*  Copyright 2015-2020 WPTie ( email: support at wptie.com )

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
 * @package AA
 * @since 0.0.1
 *
 */

if ( ! defined( 'AA_NAME' ) ) {
    define( 'AA_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined('AA_DIR' ) ) {
    define( 'AA_DIR', WP_PLUGIN_DIR . '/' . AA_NAME );
}

if ( ! defined('AA_URL' ) ) {
    define( 'AA_URL', WP_PLUGIN_URL . '/' . AA_NAME );
}

// Assets Path
$cft_assets  = AA_URL . '/assets/';


/**
 * AA Main File
 *
 * This is the main file of AA which controls everything in this plugin
 *
 * @since 0.0.1
 *
 */
if ( file_exists( AA_DIR . '/assets/inc/aa.php' ) ) {
    require_once( AA_DIR . '/assets/inc/aa.php' );
}