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
	 * VR_Edit_Profile Object.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	public $edit_profile;


	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->login          = new VR_Login();
		$this->register       = new VR_Register();
		$this->reset          = new VR_Reset();
		$this->edit_profile   = new VR_Edit_Profile();

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
	 * AJAX Login.
	 *
	 * @since  1.0.0
	 */
	public function ajax_login() {
		$this->login->ajax_login();
	}


	/**
	 * AJAX User Authentication.
	 *
	 * @since  1.0.0
	 */
	public function ajax_user_authenticate( $user_login, $password, $login ) {
		$this->login->ajax_user_authenticate( $user_login, $password, $login );
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
	 * AJAX Register.
	 *
	 * @since  1.0.0
	 */
	public function ajax_register() {
		$this->register->ajax_register();
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
	 * AJAX Reset.
	 *
	 * @since  1.0.0
	 */
	public function ajax_reset() {
		$this->reset->ajax_reset();
	}


	/**
	 * Edit Profile.
	 *
	 * Shortcode: `[vr_edit_profile]`.
	 *
	 * @since  1.0.0
	 */
	public function edit_profile() {
		$this->edit_profile->edit_profile();
	}


	/**
	 * Edit Profile Update.
	 *
	 * @since  1.0.0
	 */
	public function update() {
		$this->edit_profile->update_profile();
	}


	/**
	 * Upload Profile Image.
	 *
	 * @since  1.0.0
	 */
	public function upload_profile_image() {
		$this->edit_profile->upload_profile_image();
	}


	/**
	 * Get Profile Image URL.
	 *
	 * @since  1.0.0
	 */
	public function get_profile_image_url() {
		$this->edit_profile->get_profile_image_url();
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
    		    VRC_URL . '/assets/js/vendor/jquery.form.js',
    		    array( 'jquery' ),
    		    '3.51.0',
    		    true
    		);


    		// Bootstrap: `modal.js`.
    		wp_enqueue_script(
    		    'vr_modal',
    		    VRC_URL . '/assets/js/vendor/modal.js',
    		    array( 'jquery' ),
    		    '3.3.4',
    		    true
    		);


    		// jQuery Validation Plugin.
    		wp_enqueue_script(
    		    'vr_validate',
    		    VRC_URL . '/assets/js/vendor/jquery.validate.min.js',
    		    array( 'jquery' ),
    		    '1.13.1',
    		    true
    		);


    		// login-register-reset.js.
    		wp_enqueue_script(
    		    'vr_member_customJS',
    		    VRC_URL . '/assets/js/custom/login-register-reset.js',
    		    array( 'jquery', 'vr_form', 'vr_modal', 'vr_validate' ),
    		    'VRC_VERSION',
    		    true
    		);


    		// Edit Profile JS.
    		// TODO: has_shortcode() check.
            wp_enqueue_script( 'plupload' );

    		wp_enqueue_script(
    		    'vr_edit_profileJS',
    		    VRC_URL . '/assets/js/custom/edit-profile.js',
    		    array( 'jquery', 'plupload' ),
    		    'VRC_VERSION',
    		    true
    		);

    		$edit_profile_data = array(
				'ajaxURL'       => admin_url( 'admin-ajax.php' ),
				'uploadNonce'   => wp_create_nonce ( 'vr_allow_upload_profile_image' ),
				'fileTypeTitle' => __( 'Valid file formats.', 'inspiry' ),
    		);

    		wp_localize_script( 'vr_edit_profileJS', 'editProfile', $edit_profile_data );



		endif;

	} // Function ended.

} // Class ended.

endif;
