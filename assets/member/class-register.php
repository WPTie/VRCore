<?php
/**
 * Class: VR_Register
 *
 * Register class.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Register.
 *
 * VR Membership registeration class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Register' ) ) :

class VR_Register {

	/**
	 * Register Short.
	 *
	 * @since 1.0.0
	 */
	public function register() {

		/**
		 * Shortcode: `[vr_register]`.
		 *
		 * @since 1.0.0
		 */
		add_shortcode( 'vr_register', function () {

			/**
			 * VIEW: register.
			 *
			 * @since 1.0.0
			 */
			if ( file_exists( VRC_DIR . '/assets/member/view-register.php' ) ) {
			    require_once( VRC_DIR . '/assets/member/view-register.php' );
			}

		} );// annonymous function and action ended.

	} // Function ended.


} // Class ended.

endif;
