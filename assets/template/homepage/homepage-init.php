<?php
/**
 * Homepage Initializer
 *
 * Homepage template meta.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



/**
 * Class: `VR_Homepage_Meta_Boxes`.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/template/homepage/class-homepage-meta-boxes.php' ) ) {
    require_once( VRC_DIR . '/assets/template/homepage/class-homepage-meta-boxes.php' );
}


/**
 * Class: `VR_Homepage_BookingForm_Fields`.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/template/homepage/class-bookingform-fields.php' ) ) {
    require_once( VRC_DIR . '/assets/template/homepage/class-bookingform-fields.php' );
}


/**
 * Class: `VR_Homepage_Feature_Fields`.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/template/homepage/class-feature-fields.php' ) ) {
    require_once( VRC_DIR . '/assets/template/homepage/class-feature-fields.php' );
}


/**
 * Actions/Filters for homepage.
 *
 * Classes:
 * 			1. VR_Homepage_Meta_Boxes
 */
if ( class_exists( 'VR_Homepage_Meta_Boxes' ) ) {

	/**
	 * Object: VR_Homepage_Meta_Boxes class.
	 *
	 * @since 1.0.0
	 */
	$vr_homepage_meta_boxes_init = new VR_Homepage_Meta_Boxes();


	// Register homepage meta boxes.
    add_filter( 'rwmb_meta_boxes', array( $vr_homepage_meta_boxes_init, 'register' ) );


    /**
     * Hide Editor on Homepage Template.
     *
     * @since 1.0.0
     */
    add_action('admin_head', 'vr_hide_homepage_editor');
    if ( ! function_exists( 'vr_hide_homepage_editor' ) ) {
    	function vr_hide_homepage_editor() {
			// Get the pagenow.
			global $pagenow;

			// Bail if post.php
		    if( ! ( 'post.php' == $pagenow ) ) {
				return;
			}

			// Get the Post ID.
			$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

			// Bail if no post_id.
			if( ! isset( $post_id ) ) {
				return;
			}

			// Hide the editor on a page with a homepage template.
			$template_filename = get_post_meta( $post_id, '_wp_page_template', true );

			// Remove the editor.
			if( $template_filename == 'page-homepage.php' ) {
				remove_post_type_support('page', 'editor');
			}
    	} // vr_hide_homepage_editor() ended.
    } // function_exists() ended.


} // actions/filters ended.

