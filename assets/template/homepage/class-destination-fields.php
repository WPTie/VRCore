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
				'raw'     => true,
				'options' => array(
								'media_buttons' => false,
								// 'teeny'=> true
							 ),
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
			array(
				'id'                   => "{$prefix}the_destinations",
				'type'                 => 'taxonomy_advanced',
				'name'                 => __( 'Select Popular Destinations', 'VRC' ),
				'desc'                 => 'Note: Looks best when 4 or 7 destinations are selected.',
				// Taxonomy name.
				'taxonomy'             => 'vr_rental-destination',

				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional.
				'field_type'           => 'checkbox_list',

				// Additional arguments for get_terms() function. Optional.
				'query_args'           => array(),
				'columns'              => 12,
				'tab'                  => 'destination'
			),

			array(
				'id'      => "{$prefix}destination_note_for_images",
				'type'    => 'custom_html',
				'columns' => 12,
				'tab'     => 'destination',
				// HTML content.
				'std'     => '<p
							style="
								padding: 1rem;
								background: #dedede;
							">
							You can add images to the destinations via <a href="/wp-admin/edit-tags.php?taxonomy=vr_rental-destination&post_type=vr_rental">Destinations Page</a>.
							</br>
							Make sure you have added feature images to these desitnations you selected here.
						</p>',
			), // Field ended.
		); // Fields array ended.
	} // Function ended.


}

endif;
