<?php
/**
 * Class VR_Rental_List_Meta
 *
 * Class for page rental list meta.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'VR_Rental_List_Meta' ) ) :

/**
 * VR_Rental_List_Meta.
 *
 * Class for page rental list meta.
 *
 * @since 1.0.0
 */
class VR_Rental_List_Meta {
	/**
	 * Metaboxes.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	public $meta_boxes = array();

	/**
	 * VR_Functions object.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	public $vr_function_obj;

	/**
	 * Destination array.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	public $destinations_array = array();

	/**
	 * Feature array.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	public $feature_array = array();

	/**
	 * Type array.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	public $type_array = array();

	/**
	 * Register meta boxes related to `page-rental-list`.
	 *
	 * @param   array   $meta_boxes
	 * @return  array   $meta_boxes
	 * @since   1.0.0
	 */
	public function register( $meta_boxes ) {
		// Prefix.
		$prefix = 'vr_rental_list_';

		// Destinations array.
		if ( function_exists( 'vr_get_function_obj' ) ) {
			// Get the VR_Functions object.
			$this->vr_function_obj = vr_get_function_obj();

			// Destination.
			$this->vr_function_obj->get_terms_array( 'vr_rental-destination', $this->destinations_array );

			// Feature.
			$this->vr_function_obj->get_terms_array( 'vr_rental-feature', $this->feature_array );

			// Type.
			$this->vr_function_obj->get_terms_array( 'vr_rental-type', $this->type_array );
		}

		// Summary.
		$meta_boxes[]  = array(
			'id'         => 'vr_rental_list_metabox_summary_id',
			'title'      => __('Summary', 'VRC'),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'show'       => array(
				// List of page templates (used for page only). Array. Optional.
				// Page template file name. (if in the root)
				'template'   => array( 'page-rental-list.php' ),
			),
			'fields'     => array(
	            // Header BG Image.
	            array(
					'id'               => "{$prefix}header_bg_image",
					'type'             => 'image_advanced',
					'name'             => __('Header Background Image', 'VRC'),
					'desc'             => __( 'Consult the documentation for required image size.', 'VRC' ),
					'max_file_uploads' => 1,
	            ),
				// Summary.
				array(
					'id'      => "{$prefix}summary",
					'type'    => 'textarea',
					// 'type'    => 'wysiwyg',
					// 'raw'     => true,
					// 'options' => array(
					// 				'media_buttons' => false,
					// 				'teeny'=> true
					// 			 ),
					'name'    => __( 'Descripton', 'VRC' )
				),
			)
		);

		// Rental List.
		$meta_boxes[]  = array(
			'id'         => 'vr_rental_list_metabox_list_id',
			'title'      => __('Rental List', 'VRC'),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'show'       => array(
				// List of page templates (used for page only). Array. Optional.
				// Page template file name. (if in the root)
				'template'   => array( 'page-rental-list.php' ),
			),
			'fields'     => array(
				// Per page rentals.
				array(
					'id'   => "{$prefix}per_page",
					'name' => __( 'Number of Rentals Per Page', 'VRC' ),
					'type' => 'number',
					'step' => 1,
					'min'  => 3,
					'std'  => 6
				),

				// Order by.
				array(
					'id'          => "{$prefix}orderby",
					'name'        => __( 'Order Rentals By', 'VRC' ),
					'type'        => 'select',
					'options'     => array(
						'date_desc'     => __( 'Date Recent to Old', 'VRC' ),
						'date_asc'      => __( 'Date Old to Recent', 'VRC' ),
						'price_asc'     => __( 'Price Low to High', 'VRC' ),
						'price_desc'    => __( 'Price High to Low', 'VRC' ),
					),
					'multiple'    => false,
					'std'         => 'date_desc'
				),

				// Min beds.
				array(
					'id'   => "{$prefix}min_beds",
					'name' => __( 'Minimum Beds', 'VRC' ),
					'type' => 'number',
					'step' => 1,
					'min'  => 0,
					'std'  => 0
				),

				// Min baths.
				array(
					'id'   => "{$prefix}min_baths",
				    'name'  => __( 'Minimum Baths', 'VRC' ),
				    'type'  => 'number',
				    'step'  => 1,
				    'min'   => 0,
				    'std'   => 0
				),

				// Min baths.
				array(
					'id'   => "{$prefix}min_guests",
				    'name'  => __( 'Minimum Guests', 'VRC' ),
				    'type'  => 'number',
				    'step'  => 1,
				    'min'   => 0,
				    'std'   => 0
				),

				// Min price.
				array(
					'id'   => "{$prefix}min_price",
				    'name'  => __( 'Minimum Price', 'VRC' ),
				    'type'  => 'number',
				    'min'   => 0,
				    'std'   => 0
				),

				// Max price.
				array(
					'id'   => "{$prefix}max_price",
				    'name'  => __( 'Maximum Price', 'VRC' ),
				    'type'  => 'number',
				    'min'   => 0,
				),

				// Destination.
				array(
					'id'              => "{$prefix}destination",
					'name'            => __( 'Destination', 'VRC' ),
					'type'            => 'select',
					'options'         => $this->destinations_array,
					'multiple'        => true,
					'select_all_none' => true
				),

				// Feature.
				array(
					'id'              => "{$prefix}feature",
					'name'            => __( 'Feature', 'VRC' ),
					'type'            => 'select',
					'options'         => $this->feature_array,
					'multiple'        => true,
					'select_all_none' => true
				),

				// Type.
				array(
					'id'              => "{$prefix}type",
					'name'            => __( 'Type', 'VRC' ),
					'type'            => 'select',
					'options'         => $this->type_array,
					'multiple'        => true,
					'select_all_none' => true
				)
			)
		);

		// Return.
		return $meta_boxes;
	} // register() ended.

}

endif;
