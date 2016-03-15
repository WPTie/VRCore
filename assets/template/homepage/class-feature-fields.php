<?php
/**
 * Homepage Feature fields
 *
 * Feature related fields.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Homepage_Feature_Fields.
 *
 * Homepage feature fields array class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Homepage_Feature_Fields' ) ) :

class VR_Homepage_Feature_Fields {

	/**
	 * Feature Fields array.
	 *
	 * @since 1.0.0
	 */
	public function get_fields() {
		// Prefix.
		$prefix = 'vr_homepage_';

		// Return the array.
		return array(
			// Enable/Disable Feature Section.
			array(
				'id'      => "{$prefix}is_feature_section",
				'type'    => 'radio',
				'name'    => __( 'Enable Feature section?', 'VRC' ),
				'std'     => 'yes',
				'options' => array(
					'yes' => __('Yes.', 'VRC'),
					'no'  => __('No.', 'VRC'),
			    ),
			    'columns' => 12,
			    'tab'     => 'feature'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_id0", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'feature'
			),

			// Feature Section Title.
			array(
				'id'      => "{$prefix}feature_section_title",
				'type'    => 'text',
				'name'    => __( 'Feature Section Title', 'VRC' ),
				'desc'    => 'Example Value: Features',
				'std'     => 'No Feature Section Title Added',
				'columns' => 12,
				'tab'     => 'feature'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_id1", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'feature'
			),

			// Feature Section Descripton.
			array(
				'id'      => "{$prefix}feature_section_dsc",
				'type'    => 'wysiwyg',
				'name'    => __( 'Feature Section Descripton', 'VRC' ),
				'std'     => 'No Feature section descripton added!',
				'columns' => 12,
				'tab'     => 'feature'
			),

			// Divider.
			array(
				'id'      => "{$prefix}divider_id2", // Not used, but needed.
				'type'    => 'divider',
				'columns' => 12,
				'tab'     => 'feature'
			),

			// Repeatable features.
            // Group.
            array(
				'id'         => "{$prefix}group_features",
				'type'       => 'group',
				'clone'      => true,
				// 'sort_clone' => true,
				'tab'        => 'feature',
				'fields'     => array(
					// Image Icon.
        			array(
						'id'               => "{$prefix}feature_img",
						'type'             => 'image_advanced',
						'name'             => __( 'Icon Image', 'VRC' ),
						'desc'             => "Add feature's Icon image.",
						'std'              => '//placehold.it/100/03a9f5?text=!',
						'columns'          => 6,
						'max_file_uploads' => 1
        			),

					// Name of the feature.
					array(
						'id'   => "{$prefix}feature_name",
						'type' => 'text',
						'name' => __( 'Feature Name', 'VRC' ),
						'desc' => 'Example Value: Quality',
						'columns' => 6
					),

					// Description of the feature.
					array(
						'id'      => "{$prefix}feature_dsc",
						'type'    => 'textarea',
						'name'    => __( 'Feature Descriptoin', 'VRC' ),
						'columns' => 12
					),

        		) // Sub-Fields ended.

            ), // Field Group ended.

            // Divider.
            array(
            	'id'      => "{$prefix}divider_id3", // Not used, but needed.
            	'type'    => 'divider',
            	'columns' => 12,
            	'tab'     => 'feature'
            ),

            // Button Text.
            array(
            	'id'      => "{$prefix}feature_btn_txt",
            	'type'    => 'text',
            	'name'    => __( 'Feature Section Button Text', 'VRC' ),
            	'desc'    => 'Example Value: Read More',
            	'std'     => 'Read More',
            	'columns' => 12,
            	'tab'     => 'feature'
            ),

            // Divider.
            array(
            	'id'      => "{$prefix}divider_id4", // Not used, but needed.
            	'type'    => 'divider',
            	'columns' => 12,
            	'tab'     => 'feature'
            ),

            // Button URL.
            array(
            	'id'      => "{$prefix}feature_btn_url",
            	'type'    => 'url',
            	'name'    => __( 'Feature Section Button URL', 'VRC' ),
            	'desc'    => 'Example Value: http://Google.com/',
            	'columns' => 12,
            	'tab'     => 'feature'
            ),
		); // Fields array ended.
	} // Function ended.


}

endif;
