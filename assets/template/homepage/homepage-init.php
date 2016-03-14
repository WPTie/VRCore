<?php
/**
 * Homepage Initializer
 *
 * Homepage template meta.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Class: `VR_Homepage_Meta_Boxes`.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/template/homepage/class-homepage-meta-boxes.php' ) ) {
    require_once( VRC_DIR . '/assets/template/homepage/class-homepage-meta-boxes.php' );
}


/**
 * Actions/Filters for homepage.
 *
 * Classes:
 * 			1. VR_Homepage_Meta_Boxes
 */
if ( class_exists( 'VR_Homepage_Meta_Boxes' ) ) {

	/**
	 * Object: VR_Homepage_Meta_Boxes class.
	 *
	 * @since 1.0.0
	 */
	$vr_homepage_meta_boxes_init = new VR_Homepage_Meta_Boxes();


	// Register homepage meta boxes.
    add_filter( 'rwmb_meta_boxes', array( $vr_homepage_meta_boxes_init, 'register' ) );


}

