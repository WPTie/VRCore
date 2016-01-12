<?php
/**
 * Admin Initializer
 *
 * All the admin related functionality is initialized here.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


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
 * Booking initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/booking/booking-init.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/booking/booking-init.php' );
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


/**
 * Admin Menu Order.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/admin-menu-order.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/admin-menu-order.php' );
}
