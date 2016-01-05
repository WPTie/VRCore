<?php
/**
 * Rentals data initializer
 *
 * Initializes everything related to `rental` post type.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin/Renatals.
 *
 * Rentals related files.
 *
 * @since 1.0.0
 */

// Custom Post Type: `rental`.
if ( file_exists( VRC_DIR . '/assets/admin/rental/cpt-rental.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/cpt-rental.php' );
}

// Custom Taxonomy: `rental-type`.
if ( file_exists( VRC_DIR . '/assets/admin/rental/ct-rental-type.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/ct-rental-type.php' );
}

// Custom Taxonomy: `rental-destination`.
if ( file_exists( VRC_DIR . '/assets/admin/rental/ct-rental-destination.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/ct-rental-destination.php' );
}

// Custom Taxonomy: `rental-feature`.
if ( file_exists( VRC_DIR . '/assets/admin/rental/ct-rental-feature.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/ct-rental-feature.php' );
}

// Custom columns for `rental` post type.
if ( file_exists( VRC_DIR . '/assets/admin/rental/rental-custom-columns.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/rental-custom-columns.php' );
}
