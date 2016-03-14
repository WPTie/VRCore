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
	 * Booking Metabox.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	 private $booking_metabox;


	 /**
	  * Feature Metabox.
	  *
	  * @var 	object
	  * @since 	1.0.0
	  */
	  private $feature_metabox;


	 /**
	  * Constructor.
	  *
	  * Gets the metabox classes and assigns
	  * a local var to them.
	  *
	  * @since 1.0.0
	  */
	 public function __construct() {
	 	// Booking.
	 	$this->booking_metabox = new VR_Homepage_Booking_Metabox();

	 	// Feature.
	 	// $this->feature_metabox = new VR_Homepage_Feature_Metabox();

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

		// Booking metabox.
	    $meta_boxes[] = $this->booking_metabox->get_metabox();

    	// Feature metabox.
        // $meta_boxes[] = $this->feature_metabox->get_metabox();

	    return $meta_boxes;

	} // Register function End.

} // Class ended.

endif;
