<?php
/**
 * Homepage Destination fields
 *
 * Destination related fields.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Homepage_Destination_Fields.
 *
 * Homepage destination fields array class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Homepage_Destination_Fields' ) ) :

class VR_Homepage_Destination_Fields {

	/**
	 * Destination Fields array.
	 *
	 * @since 1.0.0
	 */
	public function get_fields() {
		// Prefix.
		$prefix = 'vr_homepage_';

		// Return the array.
		return array(
			// Enable/Disable Destination Section.
			array(
				'id'      => "{$prefix}is_destination_section",
				'type'    => 'radio',
				'name'    => __( 'Enable Destination section?', 'VRC' ),
				'std'     => 'yes',
				'options' => array(
					'yes' => __('Yes.', 'VRC'),
					'no'  => __('No.', 'VRC'),
			    ),
			    'columns' => 12,
			    'tab'     => 'destination'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_destination", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'destination'
			),

			// Destination Section Title.
			array(
				'id'      => "{$prefix}destination_section_title",
				'type'    => 'text',
				'name'    => __( 'Destination Section Title', 'VRC' ),
				'desc'    => 'Example Value: Popular Destination',
				'std'     => 'Popular Destination',
				'columns' => 12,
				'tab'     => 'destination'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_destination", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'destination'
			),

			// Destination Section Descripton.
			array(
				'id'      => "{$prefix}destination_section_dsc",
				'type'    => 'wysiwyg',
				'name'    => __( 'Destination Section Descripton', 'VRC' ),
				'columns' => 12,
				'tab'     => 'destination'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_destination", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'destination'
			),

			// Select Popular Destionat #1
			// array(
			// 	'id'      => "{$prefix}divider_destination",
			// 	'type'    => 'taxonomy_advanced',
			// 	'name'    => __( 'Popular Destination #1', 'VRC' ),
			// 	// Taxonomy name
			// 	'taxonomy' => 'vr_rental-destination',

			// 	// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
			// 	'field_type'     => 'select_advanced',

			// 	// Additional arguments for get_terms() function. Optional
			// 	'query_args'     => array(),
			// ),


			// array(
			// 	'id'          => "{$prefix}destination_1",
			// 	'type'        => 'post',

			// 	'post_type'   => 'vr_agent',
			// 	'field_type'  => 'select_advanced',

			// 	'name'        => __( 'Select the Agent', 'VRC' ),
			// 	'placeholder' => __( 'Select the agent', 'VRC' ),

			// 	// Query arguments (optional). No settings means get all published posts.
			// 	'query_args'  => array(
			// 		'post_status'    => 'publish',
			// 		'posts_per_page' => - 1,
			// 	),

			// 	'columns' => 12,
			//     'tab'     => 'agent'
			// ),
		); // Fields array ended.
	} // Function ended.


}

endif;
