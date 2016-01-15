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
	 * Submit Booking.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	public $submit_booking;


	/**
	* Constructor.
	*/
	public function __construct() {

		$this->booking        = new VR_CPT_Booking();
		$this->submit_booking = new VR_Submit_Booking();

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


	/**
	 * Generate the booking title.
	 *
	 * @since 1.0.0
	 */
	public function generate_title() {
		$this->booking->set_booking_title();
	}


	/**
	 * Shortcode for Submit Booking.
	 *
	 * Shortcode: `[vr_submit_booking]`.
	 *
	 * @since  1.0.0
	 */
	public function submit_booking() {
		$this->submit_booking->vr_submit_booking();
	}

	/**
	 * Submit Booking.
	 *
	 * @since  1.0.0
	 */
	public function submit() {
		$this->submit_booking->submit();
	}


	/**
	 * Swap `Published` with `Confirmed`.
	 *
	 * @since 1.0.0
	 */
	public function published_to_confirmed( $views ) {

	    $views['all'] = str_replace( 'All ', 'All Bookings', $views['all'] );

	    if( isset( $views['publish'] ) ){
	        $views['publish'] = str_replace( 'Published ', 'Confirmed ', $views['publish'] );
	    }

        // unset( $views['draft'] );

	    return $views;
	}


	/**
	 * Generate Unique Title.
	 *
	 * @since 1.0.0
	 */
	public function booking_title() {

		// Generate a random number with 8 length.
		$id_length = 8;
		$uniqueid  = crypt( uniqid( rand(), 1 ) );
		$uniqueid  = strip_tags( stripslashes( $uniqueid ) );
		$uniqueid  = str_replace( ".","",$uniqueid );
		$uniqueid  = strrev( str_replace( "/","",$uniqueid ) );
		$uniqueid  = substr( $uniqueid, 0, $id_length );
		$uniqueid  = strtoupper( $uniqueid );

		// Format the title.
		$title = 'Booking: #' . $uniqueid . ' - ' . date( 'd-m-Y' );

		// Return the title.
		return $title;

	}

}

endif;
