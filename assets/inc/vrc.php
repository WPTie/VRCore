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
 * Meta boxes initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/meta-boxes/meta-box-init.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/meta-boxes/meta-box-init.php' );
}


/**
 * Rental initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/rental/rental-init.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/rental-init.php' );
}


/**
 * Agent initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/agent/agent-init.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/agent/agent-init.php' );
}


/**
 * Parnter initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/partner/partner-init.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/partner/partner-init.php' );
}
