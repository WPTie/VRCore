<?php
/**
 * Membership Initializer
 *
 * Responsible for membership related stuff.
 * 		1. Registration.
 * 		2. Login.
 * 		3. Forgot your password.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Class: VR_Member.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/member/class-member.php' ) ) {
    require_once( VRC_DIR . '/assets/member/class-member.php' );
}


/**
 * Class: VR_Login.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/member/class-login.php' ) ) {
    require_once( VRC_DIR . '/assets/member/class-login.php' );
}


/**
 * Class: VR_Register.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/member/class-register.php' ) ) {
    require_once( VRC_DIR . '/assets/member/class-register.php' );
}


/**
 * Class: VR_Reset.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/member/class-reset.php' ) ) {
    require_once( VRC_DIR . '/assets/member/class-reset.php' );
}


/**
 * Actions/Filters for membership.
 *
 * Classes:
 * 			1. VR_Member
 */
if ( class_exists( 'VR_Member' ) ) {

	/**
	 * Object: VR_Member class.
	 *
	 * @since 1.0.0
	 */
	$vr_member_init = new VR_Member();

	// Register the shortcode [vr_login]
	add_action( 'init', array( $vr_member_init, 'login' ) ) ;

	// Register the shortcode [vr_register]
	add_action( 'init', array( $vr_member_init, 'register' ) ) ;

	// Register the shortcode [vr_reset]
	add_action( 'init', array( $vr_member_init, 'reset' ) ) ;

	// Enqueue scripts.
	// Static function `scripts`,
	// Object has no access to it, a call from an object
	// can lead to a Fatal error in $this context
	// So, calling it via the classname.
	add_action( 'wp_enqueue_scripts', array( 'VR_Member' , 'scripts' ) );


	// Enable the user with no privileges to request ajax login
	add_action( 'wp_ajax_nopriv_vr_ajax_login', array( $vr_member_init, 'ajax_login' ) );

	// Enable the user with no privileges to request ajax register
	add_action( 'wp_ajax_nopriv_vr_ajax_register', array( $vr_member_init, 'ajax_register' ) );

	// Enable the user with no privileges to request ajax password reset
	add_action( 'wp_ajax_nopriv_vr_ajax_reset', array( $vr_member_init, 'ajax_reset' ) );

}




/**
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */



// if( !function_exists( 'inspiry_ajax_login' ) ) :
//     /**
//      * AJAX login request handler
//      */
//     function inspiry_ajax_login() {

//         // First check the nonce, if it fails the function will break
//         check_ajax_referer( 'vr-ajax-login-nonce', 'vr-secure-login' );

//         // Nonce is checked, get the POST data and sign user on
//         inspiry_auth_user_login( $_POST['log'], $_POST['pwd'], __( 'Login', 'inspiry' ) );

//         die();
//     }

//     // Enable the user with no privileges to request ajax login
//     add_action( 'wp_ajax_nopriv_inspiry_ajax_login', 'inspiry_ajax_login' );

// endif;


// if( !function_exists( 'inspiry_auth_user_login' ) ) :
//     /**
//      * This function process login request and displays JSON response
//      *
//      * @param $user_login
//      * @param $password
//      * @param $login
//      */
//     function inspiry_auth_user_login( $user_login, $password, $login ) {

//         $info = array();
//         $info['user_login'] = $user_login;
//         $info['user_password'] = $password;
//         $info['remember'] = true;

//         $user_signon = wp_signon( $info, false );

//         if( is_wp_error( $user_signon ) ) {
//             echo json_encode( array(
//                 'success' => false,
//                 'message' => __( '* Wrong username or password.', 'inspiry' ),
//             ) );
//         } else {
//             wp_set_current_user( $user_signon->ID );
//             echo json_encode( array(
//                 'success' => true,
//                 'message' => $login . ' ' . __( 'successful. Redirecting...', 'inspiry' ),
//                 'redirect' => $_POST['redirect_to']
//             ) );
//         }

//         die();
//     }
// endif;


// if( !function_exists( 'inspiry_ajax_register' ) ) :
//     /**
//      * AJAX register request handler
//      */
//     function inspiry_ajax_register() {

//         // First check the nonce, if it fails the function will break
//         check_ajax_referer( 'vr-ajax-register-nonce', 'vr-secure-register' );

//         // Nonce is checked, Get to work
// 		$info                  = array();
// 		$info['user_nicename'] = $info['nickname'] = $info['display_name'] = $info['first_name'] = $info['user_login'] = sanitize_user( $_POST['register_username'] ) ;
// 		$info['user_pass']     = sanitize_text_field( $_POST['register_pwd'] );
// 		$info['user_email']    = sanitize_email( $_POST['register_email'] );

//         // Register the user
//         $user_register = wp_insert_user( $info );

//         if( is_wp_error( $user_register ) ) {

//             $error  = $user_register->get_error_codes()	;
//             if( in_array( 'empty_user_login', $error ) ) {
//                 echo json_encode( array(
//                     'success' => false,
//                     'message' => __( $user_register->get_error_message( 'empty_user_login' ) )
//                 ) );
//             } elseif( in_array( 'existing_user_login', $error ) ) {
//                 echo json_encode( array(
//                     'success' => false,
//                     'message' => __( 'This username already exists.', 'inspiry' )
//                 ) );
//             } elseif( in_array( 'existing_user_email', $error ) ) {
//                 echo json_encode( array(
//                     'success' => false,
//                     'message' => __( 'This email is already registered.', 'inspiry' )
//                 ) );
//             }

//         } else {
//             inspiry_auth_user_login( $info['user_login'], $info['user_pass'], __( 'Registration', 'inspiry' ) );
//         }

//         die();
//     }

//     // Enable the user with no privileges to request ajax register
//     add_action( 'wp_ajax_nopriv_inspiry_ajax_register', 'inspiry_ajax_register' );

// endif;


// if( !function_exists( 'inspiry_ajax_reset_password' ) ) :
//     /**
//      * AJAX reset password request handler
//      */
//     function inspiry_ajax_reset_password(){

//         // First check the nonce, if it fails the function will break
//         check_ajax_referer( 'vr-ajax-forgot-nonce', 'vr-secure-reset' );

//         $account = $_POST['reset_username_or_email'];
//         $error = "";
//         $get_by = "";

//         if( empty( $account ) ) {
//             $error = __( 'Provide a valid username or email address!', 'inspiry' );
//         } else {
//             if( is_email( $account ) ) {
//                 if( email_exists( $account ) ) {
//                     $get_by = 'email';
//                 } else {
//                     $error = __( 'No user found for given email!', 'inspiry' );
//                 }
//             } elseif( validate_username( $account ) ) {
//                 if( username_exists( $account ) ) {
//                     $get_by = 'login';
//                 } else {
//                     $error = __( 'No user found for given username!', 'inspiry' );
//                 }
//             } else {
//                 $error = __( 'Invalid username or email!', 'inspiry' );
//             }
//         }

//         if( empty( $error ) ) {

//             // Generate new random password
//             $random_password = wp_generate_password();

//             // Get user data by field( fields are id, slug, email or login )
//             $target_user = get_user_by( $get_by, $account );

//             $update_user = wp_update_user( array(
//                 'ID' => $target_user->ID,
//                 'user_pass' => $random_password
//             ) );

//             // if  update_user return true then send user an email containing the new password
//             if( $update_user ) {

//                 $from = get_option( 'admin_email' ); // Set whatever you want like mail@yourdomain.com

//                 if( !isset( $from ) || !is_email( $from ) ) {
//                     $site_name = strtolower( $_SERVER['SERVER_NAME'] );
//                     if( substr( $site_name, 0, 4 ) == 'www.' ) {
//                         $site_name = substr( $site_name, 4 );
//                     }
//                     $from = 'admin@' . $site_name;
//                 }

//                 $to = $target_user->user_email;
//                 $website_name = get_bloginfo( 'name' );
//                 $subject = sprintf( __('Your New Password For %s', 'inspiry'), $website_name );
//                 $sender = sprintf( __( 'From: %s <%s>', 'inspiry' ), $website_name , $from ) . "\r\n";
//                 $message = sprintf( __( 'Your new password is: %s', 'inspiry' ), $random_password );

//                 // email header
//                 $header = 'Content-type: text/html; charset=utf-8' . "\r\n";
//                 $header = apply_filters( "inspiry_password_reset_header", $header );
//                 $header .= $sender;

//                 $mail = wp_mail( $to, $subject, $message, $header );

//                 if( $mail ) {
//                     $success = __( 'Check your email for new password', 'inspiry' );
//                 } else {
//                     $error = __( 'Failed to send you new password email!', 'inspiry' );
//                 }

//             } else {
//                 $error = __( 'Oops! Something went wrong while resetting your password!', 'inspiry' );
//             }
//         }

//         if( ! empty( $error ) ){
//             echo json_encode(
//                 array(
//                     'success' => false,
//                     'message' => $error
//                 )
//             );
//         } elseif( ! empty( $success ) ) {
//             echo json_encode(
//                 array(
//                     'success' => true,
//                     'message' => $success
//                 )
//             );
//         }

//         die();
//     }

//     // Enable the user with no privileges to request ajax password reset
//     add_action( 'wp_ajax_nopriv_inspiry_ajax_forgot', 'inspiry_ajax_reset_password' );

// endif;


