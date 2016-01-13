<?php
/**
 * VR Core Main File
 *
 * This is the main file of VRC which controls everything in this plugin.
 *
 * @package VRC
 * @since 	0.0.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Admin Initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/admin-init.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/admin-init.php' );
}


/**
 * Member Initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/member/member-init.php' ) ) {
    require_once( VRC_DIR . '/assets/member/member-init.php' );
}
