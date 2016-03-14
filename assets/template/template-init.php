<?php
/**
 * Template initializer.
 *
 * Initializes the templates.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Class: VR_Get_Page_Meta.
 *
 * Method: `vr_get_page_meta_obj()`.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/template/class-get-page-meta.php' ) ) {
    require_once( VRC_DIR . '/assets/template/class-get-page-meta.php' );
}


/**
 * Tempalte: Homepage initializer.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/template/homepage/homepage-init.php' ) ) {
    require_once( VRC_DIR . '/assets/template/homepage/homepage-init.php' );
}
