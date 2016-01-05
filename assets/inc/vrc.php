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
 * Rental initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/rental/rental-init.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rental/rental-init.php' );
}


/**
 * Metaboxes initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/metaboxes/metabox-init.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/metaboxes/metabox-init.php' );
}

/**
 * Class: VR_Core.
 *
 * Main Class of VRC plugin.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/inc/class-vrcore.php' ) ) {
    require_once( VRC_DIR . '/assets/inc/class-vrcore.php' );
}


/**
 * Object: VR_Core class.
 *
 * @since 1.0.0
 */
$vrcore = new VR_Core();

/**
 * Object: VR_Rental_Custom_Columns class.
 *
 * @since 1.0.0
 */
$vr_rental_custom_columns = new VR_Rental_Custom_Columns();

/**
 * Object: VR_Metaboxes class.
 *
 * @since 1.0.0
 */
$vr_metaboxes = new VR_Metaboxes();


/**
 * Actions/Filters.
 */

/**
 * Actions/Filters for rental.
 */

// Create rental post type
add_action( 'init', array( $vrcore, 'create_rental' ) );

// Create fake rental content.
add_action( 'init', array( $vrcore, 'fake_rental_content' ) );

// Create rental-type CT.
add_action( 'init', array( $vrcore, 'create_rental_type' ) );

// Create rental-destination CT.
add_action( 'init', array( $vrcore, 'create_rental_destination' ) );

// Create rental-feature CT.
add_action( 'init', array( $vrcore, 'create_rental_feature' ) );

// Rental Custom Columns Registered
add_filter( 'manage_edit-rental_columns', array( $vr_rental_custom_columns, 'register' ) ) ;

// Rental Custom Columns Display custom stuff
add_action( 'manage_rental_posts_custom_column', array( $vr_rental_custom_columns, 'display' ) ) ;


/**
 * Actions/Filters for metaboxes.
 */

// Deactivate Meta Box Plugin if present.
add_action( 'init', array( $vr_metaboxes, 'disable_metabox_plugin' ) );
