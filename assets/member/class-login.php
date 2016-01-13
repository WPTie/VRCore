<?php
/**
 * Class: VR_Login
 *
 * Login class.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Login.
 *
 * VR Membership login class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Login' ) ) :

class VR_Login {

	/**
	 * Register Short.
	 *
	 * @since 1.0.0
	 */
	public function login() {

		/**
		 * Shortcode: `[vr_login]`.
		 *
		 * @since 1.0.0
		 */
		add_shortcode( 'vr_login', function () {

			/**
			 * VIEW: login.
			 *
			 * @since 1.0.0
			 */
			if ( file_exists( VRC_DIR . '/assets/member/view-login.php' ) ) {
			    require_once( VRC_DIR . '/assets/member/view-login.php' );
			}

		} );// annonymous function and action ended.

	} // Function ended.


} // Class ended.

endif;
