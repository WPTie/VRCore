<?php
/**
 * Homepage BookingForm fields
 *
 * BookingForm related fields.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Homepage_BookingForm_Fields.
 *
 * Homepage booking fields array class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Homepage_BookingForm_Fields' ) ) :

class VR_Homepage_BookingForm_Fields {

	/**
	 * BookingForm Fields array.
	 *
	 * @since 1.0.0
	 */
	public function get_fields() {
		// Prefix.
		$prefix = 'vr_homepage_';

		// Return the array.
		return array(
			// Enable/Disable Booking Form.
			array(
				'id'      => "{$prefix}is_bookingform",
				'type'    => 'radio',
				'name'    => __( 'Enable booking form?', 'VRC' ),
				'std'     => 'yes',
				'options' => array(
					'yes' => __('Yes.', 'VRC'),
					'no'  => __('No.', 'VRC'),
			    ),
			    'columns' => 12,
			    'tab'     => 'bookingform'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_id0", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'bookingform'
			),

			// Booking form Title.
			array(
				'id'      => "{$prefix}bookingform_title",
				'type'    => 'text',
				'name'    => __( 'Booking Form Title', 'VRC' ),
				'desc'    => 'Example Value: Book Now',
				'std'     => 'Book now',
				'columns' => 12,
				'tab'     => 'bookingform'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_id1", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'bookingform'
			),

			// Checkin Checkout Date.
			array(
				'id'      => "{$prefix}is_checkinout_search",
				'type'    => 'radio',
				'name'    => __( 'Enable search with Checkin/Checkout Date?', 'VRC' ),
				'std'     => 'yes',
				'options' => array(
					'yes'  => __('Yes.', 'VRC'),
					'no' => __('No.', 'VRC'),
			    ),
			    'columns' => 12,
			    'tab'     => 'bookingform'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_id2", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'bookingform'
			),


			// Search Button Text.
			array(
				'id'      => "{$prefix}search_btn_txt",
				'type'    => 'text',
				'name'    => __( 'Search Button Text', 'VRC' ),
				'desc'    => 'Example Value: Check Availablity',
				'std'     => 'Check Availablity',
				'columns' => 12,
				'tab'     => 'bookingform'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_id2", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'bookingform'
			),


			// Search Page URL.
			array(
				'id'             => "{$prefix}search_page_id",
				'type'           => 'post',
				'post_type'      => 'page',
				'field_type'     => 'select_advanced',
				'name'           => __( 'Select Rental Search Page', 'VRC' ),
				'desc'           => __( 'Select Rental Search Page that you have published with Renta Search VR page template.', 'VRC' ),
				'placeholder'    => __( 'Select Rental Search Page', 'VRC' ),
				'columns' => 12,
				'tab'     => 'bookingform',
				// Query arguments (optional). No settings means get all published posts.
				'query_args'     => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				)
			)
		); // Fields array ended.
	} // Function ended.

}

endif;
