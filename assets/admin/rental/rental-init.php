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


/**
 * Class: VR_Rental.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/rental/class-rental.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/class-rental.php' );
}


/**
 * Class: VR_Rental_Meta_Boxes.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/rental/class-rental-meta-boxes.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/class-rental-meta-boxes.php' );
}


/**
 * Actions/Filters for rental.
 *
 * Classes:
 * 			1. VR_Rental
 * 			2. VR_Rental_Custom_Columns
 * 			3. VR_Rental_Meta_Boxes
 */
if ( class_exists( 'VR_Rental' ) ) {

	/**
	 * Object: VR_Rental class.
	 *
	 * @since 1.0.0
	 */
	$vr_rental = new VR_Rental();


	// Create rental post type
	add_action( 'init', array( $vr_rental, 'create_rental' ) );

	// Create fake rental content.
	add_action( 'init', array( $vr_rental, 'fake_rental_content' ) );

	// Create rental-type CT.
	add_action( 'init', array( $vr_rental, 'create_rental_type' ) );

	// Create rental-destination CT.
	add_action( 'init', array( $vr_rental, 'create_rental_destination' ) );

	// Create rental-feature CT.
	add_action( 'init', array( $vr_rental, 'create_rental_feature' ) );

}


if ( class_exists( 'VR_Rental_Custom_Columns' ) ) {


	/**
	 * Object: VR_Rental_Custom_Columns class.
	 *
	 * @since 1.0.0
	 */
	$vr_rental_custom_columns = new VR_Rental_Custom_Columns();

	// Rental Custom Columns Registered
	add_filter( 'manage_edit-rental_columns', array( $vr_rental_custom_columns, 'register' ) ) ;

	// Rental Custom Columns Display custom stuff
	add_action( 'manage_rental_posts_custom_column', array( $vr_rental_custom_columns, 'display' ) ) ;

	// Meta-boxes for rental.
	// add_filter( 'rwmb_meta_boxes', $vr_rental_meta_boxes, 'register' );

}



if ( class_exists( 'VR_Rental_Meta_Boxes' ) ) {


	/**
	 * Object: VR_Rental_Metaboxes class.
	 *
	 * @since 1.0.0
	 */
	$vr_rental_meta_boxes = new VR_Rental_Meta_Boxes();

	// Register rental meta boxes.
    // add_filter( 'rwmb_meta_boxes', $vr_rental_meta_boxes, 'register' );
    add_filter( 'rwmb_meta_boxes', array( $vr_rental_meta_boxes, 'register' ) );

}
