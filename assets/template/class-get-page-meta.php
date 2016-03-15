<?php
/**
 * Get Page Meta
 *
 * Gets page related meta.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Get_Page_Meta.
 *
 * Get class for the page meta.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Get_Page_Meta' ) ) :

class VR_Get_Page_Meta {

	/**
	 * The Page_Meta ID.
	 *
	 * @var 	int
	 * @since 	1.0.0
	 */
	 public $the_page_ID;


	/**
	 * The Meta Data.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	public $the_meta_data;


	/**
	 * Constructor.
	 *
	 * Checks the page ID and assigns
	 * the meta data to $the_meta_data.
	 *
	 * @since 1.0.0
	 */
	public function __construct( $the_page_ID = NULL ) {
		// Check if there is $the_page_ID.
		if ( ! $the_page_ID ) {
			$the_page_ID = get_the_ID();
		} else {
			$the_page_ID = intval( $the_page_ID );
		}

		// Assign values to the class variables.
		if ( $the_page_ID > 0 ) {
			$this->the_page_ID = $the_page_ID;
			$this->the_meta_data = get_post_custom( $the_page_ID );
		}
	}


	/**
	 * Get Page_Meta: Meta.
	 *
	 * Gets the page meta_value if passed
	 * a meta_key through argument.
	 *
	 * @since 1.0.0
	 */
	public function get_meta( $meta_key ) {
		// Array or not?
		if ( is_array( $this->the_meta_data[ $meta_key ] ) ) {
			// Check 0th element of array
			// If meta is set then return value else return false.
			if ( isset( $this->the_meta_data[ $meta_key ][0] ) ) {
				// Returns the value of meta.
				return $this->the_meta_data[ $meta_key ][0];
			} else {
			    return false;
			}
		} else {
			// If meta is set then return value else return false.
			if ( isset( $this->the_meta_data[ $meta_key ] ) ) {
				// Returns the value of meta.
				return $this->the_meta_data[ $meta_key ][0];
			} else {
			    return false;
			}
		}
	} // get_meta() ended.


	/**
	 * Get Page_Meta: ID.
	 *
	 * @since 1.0.0
	 */
	public function get_ID() {
		return $this->$the_page_ID;
	}


	/**
	 * Get Page_Meta.
	 *
	 * Gets the page meta for provided meta key.
	 *
	 * @since 1.0.0
	 */
	public function get_page_meta( $meta_key, $maybe_unserialize = NULL, $is_image = FALSE ) {
		// Returns false if ID is not present.
		if ( ! $this->the_page_ID ) {
		    return false;
		}

		// If maybe_unserialize is true.
		if ( true == $maybe_unserialize ) {
			return maybe_unserialize( $this->get_meta( $meta_key ) );
		}

		// If image then return URL.
		if ( true == $is_image ) {
			return wp_get_attachment_url( $this->get_meta( $meta_key ) );
		}

		// General.
		return $this->get_meta( $meta_key );
	}


} // class `VR_Get_Page_Meta`  ended.

endif;



/**
 * METHOD: Get an object of VR_Get_Rental class.
 *
 * Add for themes to recognize the class and help
 * instantiate an object without any hooks.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'vr_get_page_meta_obj' ) ) {
	function vr_get_page_meta_obj( $the_page_ID ) {
		// Bails if no ID.
		if ( ! $the_page_ID ){
			return 'No Page ID provided!';
		}

		return new VR_Get_Page_Meta( $the_page_ID );
	}
}
