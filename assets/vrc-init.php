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
if ( file_exists( VRC_DIR . '/assets/meta-boxes/meta-box-init.php' ) ) {
    require_once( VRC_DIR . '/assets/meta-boxes/meta-box-init.php' );
}


/**
 * Rental initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/rental/rental-init.php' ) ) {
    require_once( VRC_DIR . '/assets/rental/rental-init.php' );
}


/**
 * Booking initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/booking/booking-init.php' ) ) {
    require_once( VRC_DIR . '/assets/booking/booking-init.php' );
}


/**
 * Agent initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/agent/agent-init.php' ) ) {
    require_once( VRC_DIR . '/assets/agent/agent-init.php' );
}


/**
 * Parnter initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/partner/partner-init.php' ) ) {
    require_once( VRC_DIR . '/assets/partner/partner-init.php' );
}


/**
 * Member initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/member/member-init.php' ) ) {
    require_once( VRC_DIR . '/assets/member/member-init.php' );
}


/**
 * Favorite initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/favorite/favorite-init.php' ) ) {
    require_once( VRC_DIR . '/assets/favorite/favorite-init.php' );
}


/**
 * Admin Menu Order.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/admin-menu-order.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/admin-menu-order.php' );
}


/**
 * CLASS: VR_Scripts.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/class-scripts.php' ) ) {
    require_once( VRC_DIR . '/assets/class-scripts.php' );
}


/**
 * CLASS: VR_Functions.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/class-functions.php' ) ) {
    require_once( VRC_DIR . '/assets/class-functions.php' );
}
