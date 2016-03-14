<?php
/**
 * Homepage Booking Meta Box
 *
 * Booking related meta.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Homepage_Booking_Metabox.
 *
 * Homepage booking metabox array class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Homepage_Booking_Metabox' ) ) :

class VR_Homepage_Booking_Metabox {

	/**
	 * Booking Metabox.
	 *
	 * @since 1.0.0
	 */
	public function get_metabox() {
		// Prefix.
		$prefix = 'vr_homepage_';

		// Return the array.
		return array(
			'id'         => 'vr_homepage_meta_box_details_new_id',
			'title'      => __('New Details', 'VRC'),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'show'       => array(
				// List of page templates (used for page only). Array. Optional.
				// Page template file name. (if in the root)
				'template'    => array( 'page-homepage.php' ),
			),
			'fields'     => array(
				// Job Title.
	            array(
	                'id'    => "{$prefix}booking_title",
	                'type'  => 'text',
	                'name'  => __( 'Booking Title', 'VRC' ),
	                'std'	=> 'Book now'
	            ),

	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id0", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),
	        ) // Fields array ended.
	    );// array ended.
	} // Function ended.

}

endif;
