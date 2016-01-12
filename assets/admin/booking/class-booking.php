<?php
/**
 * Class: `VR_Booking`
 *
 * Booking related classes are intialized here.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Booking.
 *
 * Booking related classes.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Booking' ) ) :

class VR_Booking {

	/**
	 * CPT: Booking.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	public $booking;


	/**
	* Constructor.
	*/
	public function __construct() {

		$this->booking = new VR_CPT_Booking();

	}


	/**
	 * Create Booking.
	 *
	 * Custom Post type: `vr_booking`
	 *
	 * @since  1.0.0
	 */
	public function create_booking() {
		$this->booking->register();
	}


	/**
	 * Fake Booking Content.
	 *
	 * @since 1.0.0
	 */
	public function fake_booking_content() {
		$this->booking->fake_content();
	}


}

endif;
