<?php
/**
 * Rental List Initiializer
 *
 * Page: Rental List.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Class: VR_Rental_List_Meta.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/template/rental/list/class-vr-rental-list-meta.php' ) ) {
    require_once( VRC_DIR . '/assets/template/rental/list/class-vr-rental-list-meta.php' );
}


/**
 * Actions/Filters for homepage.
 *
 * Classes:
 * 			1. VR_Rental_List_Meta
 */
if ( class_exists( 'VR_Rental_List_Meta' ) ) {

	/**
	 * Object: VR_Rental_List_Meta class.
	 *
	 * @since 1.0.0
	 */
	$vr_page_rental_list_meta_obj = new VR_Rental_List_Meta();


	// Register homepage meta boxes.
    add_filter( 'rwmb_meta_boxes', array( $vr_page_rental_list_meta_obj, 'register' ) );


} // actions/filters ended.

