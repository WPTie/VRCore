<?php
/**
 * Class: VR_Reset
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
 * VR_Reset.
 *
 * VR Membership reset pass class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Reset' ) ) :

class VR_Reset {

	/**
	 * Reset Short.
	 *
	 * @since 1.0.0
	 */
	public function reset() {

		/**
		 * Shortcode: `[vr_reset]`.
		 *
		 * @since 1.0.0
		 */
		add_shortcode( 'vr_reset', function () {

			/**
			 * VIEW: reset.
			 *
			 * @since 1.0.0
			 */
			if ( file_exists( VRC_DIR . '/assets/member/view-reset.php' ) ) {
			    require_once( VRC_DIR . '/assets/member/view-reset.php' );
			}

		} );// annonymous function and action ended.

	} // Function ended.


} // Class ended.

endif;
