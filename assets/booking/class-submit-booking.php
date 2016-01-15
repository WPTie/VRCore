<?php
/**
 * Class: VR_Submit_Booking
 *
 * Reset class.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Submit_Booking.
 *
 * VR Membership booking class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Submit_Booking' ) ) :

class VR_Submit_Booking {

	/**
	 * Shortcode.
	 *
	 * @since 1.0.0
	 */
	public function vr_submit_booking() {

		/**
		 * Shortcode: `[vr_submit_booking]`.
		 *
		 * @since 1.0.0
		 */
		add_shortcode( 'vr_submit_booking', function () {

			/**
			 * VIEW: Submit booking.
			 *
			 * @since 1.0.0
			 */
			if ( file_exists( VRC_DIR . '/assets/booking/view-submit-booking.php' ) ) {
			    require_once( VRC_DIR . '/assets/booking/view-submit-booking.php' );
			}

		} );// annonymous function and action ended.

	} // Function ended.


	/**
	 * Submit Booking Function.
	 *
	 * @since 1.0.0
	 */
	public function submit() {


        // Errors array.
        $errors = array();



		// Verify the nonce.
        if( wp_verify_nonce( $_POST['vr_submit_booking_nonce'], 'vr_submit_booking' ) ) {

            // Let's set the booking title.
            $booking_title = VR_Booking::booking_title();

            // Check In date via `vr_booking_date_checkin`.
            if ( ! empty( $_POST['vr_booking_date_checkin'] ) ) {

                $user_vr_booking_date_checkin = sanitize_text_field( $_POST['vr_booking_date_checkin'] );

            }

            // Check Out date via `vr_booking_date_checkout`.
            if ( ! empty( $_POST['vr_booking_date_checkout'] ) ) {

                $user_vr_booking_date_checkout = sanitize_text_field( $_POST['vr_booking_date_checkout'] );

            }

            // Guest via `vr_booking_guests`.
            if ( ! empty( $_POST['vr_booking_date_checkin'] ) ) {

                $user_vr_booking_date_checkin = sanitize_text_field( $_POST['vr_booking_date_checkin'] );

            }


            // If everything is fine.
            if ( count( $errors ) == 0 ) {

                $submitted_booking = array(
                    'post_title'   => $booking_title,
                    'post_status'  => 'pending', // publish|Pending|draft.
                    'post_type'    => 'vr_booking'
                );

                $output_message = __( 'Yay! Your booking was successfully submitted! Awaiting confirmation!', 'VRC' );

                // Insert the booking into the database.
                // wp_insert_booking( $submitted_booking );
                // Or insert the booking and get the ID.
                $booking_id = wp_insert_post( $submitted_booking );
                // $the_submit_booking_id = ( $booking_id ) ? $booking_id : 'Unable to find the booking ID.';

                $response = array(
                    'success'            => true,
                    'message'            => $output_message
                    // 'the_submit_booking_id' => $the_submit_booking_id // Sends the booking ID.
                );
                echo json_encode( $response );
                die;
            }

        } else {

            $errors[] = __( 'Security check failed!', 'VRC' );

        } // if/else nonce ended.

        // In case of errors.
        $response = array(
			'success' => false,
			'errors'  => $errors
        );

        echo json_encode( $response );
    	die;

	} // submit function ended.


    /**
     * Santize a field and setup a variable.
     *
     * @since 1.0.0
     */
    public function set_booking_field( $variable, $data) {

        if ( ! empty( $_POST[ $data ] ) ) {

            $user_vr_booking_date_checkin = sanitize_text_field( $_POST['vr_booking_date_checkin'] );

        }

    }


} // Class ended.

endif;
