<?php
/**
 * Class for Homepage meta boexes
 *
 * Meta boxes for homepage template.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Homepage_Meta_Boxes.
 *
 * Class for `vr_homepage` meta boxes.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Homepage_Meta_Boxes' ) ) :

class VR_Homepage_Meta_Boxes {


	/**
	 * Booking form fields.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	private $bookingform_fields_array;


	/**
	 * Feature Fields.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	private $feature_fields;


	/**
	 * Constructor.
	 *
	 * Gets the metabox classes and assigns
	 * a local var to them.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		// Booking Form.
		$this->bookingform_fields_array = new VR_Homepage_BookingForm_Fields();

		// Features.
		$this->feature_fields           = new VR_Homepage_Feature_Fields();
	}



	/**
	 * Register meta boxes related to homepage template
	 *
	 * @param   array   $meta_boxes
	 * @return  array   $meta_boxes
	 * @since   1.0.0
	 */
	public function register( $meta_boxes ) {
		// Now inside the metabox classes.
	    // $prefix = 'vr_homepage_';

	    // Booking Form.
	    $vr_booking_fields = $this->bookingform_fields_array->get_fields();

	    // Feature Form.
	    $vr_feature_fields = $this->feature_fields->get_fields();

	    $vr_tmp_array = array(
			$vr_booking_fields,
			$vr_feature_fields
	    );

	    // Fields array.
	    $vr_homepage_fields = array();

	    // Merge all arrays with $vr_homepage_fields array.
	    foreach ( $vr_tmp_array as $field_array ) {
		    $vr_homepage_fields = array_merge( $vr_homepage_fields, $field_array );
	    }

	    // For Debugging.
	    // $debug_var = $vr_homepage_fields;
	    // echo "<pre>";
	    // var_dump($debug_var);
	    // echo "</pre>";
	    // exit();


		// Main metabox
	    $meta_boxes[] = array(
			'id'          => 'vr_homepage_meta_box_id',
			'title'       => __('Page Settings', 'VRC'),
			'post_types'  => array( 'page' ),
			'context'     => 'normal',
			'priority'    => 'high',
			'tabs'        => array(
				'bookingform' => array(
					'label'   => __('Booking Form', 'VRC'),
					'icon' => 'dashicons-admin-home'
				),
				'feature'     => array(
					'label' => __('Feature Section', 'VRC'),
					'icon'  => 'dashicons-format-gallery'
				)
			),
			'tab_style'   => 'left',
			'show'        => array(
				// List of page templates (used for page only). Array. Optional.
				// Page template file name. (if in the root)
				'template'    => array( 'page-homepage.php' ),
			),
			'fields'      => $vr_homepage_fields
		); // Metbox ended.

	    return $meta_boxes;

	} // Register function End.

} // Class ended.

endif;
