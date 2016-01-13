<?php
/**
 * Member Class File
 *
 * Main class for all membership related classes.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Member Class.
 *
 * Class that handles all things membership.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Member' ) ) :

class VR_Member {

	/**
	 * VR_Login Object.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	public $login;


	/**
	 * VR_Register Object.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	public $register;


	/**
	 * VR_Reset Object.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	public $reset;


	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->login    = new VR_Login();
		$this->register = new VR_Register();
		$this->reset    = new VR_Reset();

	}


	/**
	 * Login.
	 *
	 * Shortcode: `[vr_login]`
	 *
	 * @since  1.0.0
	 */
	public function login() {
		$this->login->login();
	}


	/**
	 * Register.
	 *
	 * Shortcode: `[vr_register]`
	 *
	 * @since  1.0.0
	 */
	public function register() {
		$this->register->register();
	}


	/**
	 * Reset.
	 *
	 * Shortcode: `[vr_reset]`
	 *
	 * @since  1.0.0
	 */
	public function reset() {
		$this->reset->reset();
	}


	/**
	 * Scripts.
	 *
	 * Static public function. Object has no access to it
	 * and a call from an object can lead to a Fatal error
	 * in $this context.
	 *
	 * @since 1.0.0
	 */
	public static function scripts() {

    	if ( ! is_admin() ) :

    		// Enqueue jQuery.
    		wp_enqueue_script('jquery');


    		// jQuery Form Plugin.
    		wp_enqueue_script(
    		    'vr_form',
    		    VRC_URL . '/assets/member/js/jquery.form.js',
    		    array( 'jquery' ),
    		    '3.51.0',
    		    true
    		);


    		// Bootstrap: `modal.js`.
    		wp_enqueue_script(
    		    'vr_modal',
    		    VRC_URL . '/assets/member/js/modal.js',
    		    array( 'jquery' ),
    		    '3.3.4',
    		    true
    		);


    		// jQuery Validation Plugin.
    		wp_enqueue_script(
    		    'vr_validate',
    		    VRC_URL . '/assets/member/js/jquery.validate.min.js',
    		    array( 'jquery' ),
    		    '1.13.1',
    		    true
    		);


		endif;

	} // Function ended.

} // Class ended.

endif;
