<?php
/**
 * Metabox Initializer
 *
 * Initializes MetaBox plugin and extensions.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Embedded metabox plugin.
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'RW_Meta_Box' ) ) {

	/**
	 * Main `meta-box` plugin.
	 *
	 * @since 1.0.0
	 */
	if ( file_exists( VRC_DIR . '/assets/admin/metaboxes/meta-box/meta-box.php' ) ) {
	    require_once( VRC_DIR . '/assets/admin/metaboxes/meta-box/meta-box.php' );
	}

}


/**
 * Meta Box Plugin Extensions.
 *
 * @since 1.0.0
 */

// Columns extension.
if ( ! class_exists( 'RWMB_Columns' ) ) {
	if ( file_exists( VRC_DIR . '/assets/admin/metaboxes/metabox-extensions/meta-box-columns/meta-box-columns.php' ) ) {
	    require_once( VRC_DIR . '/assets/admin/metaboxes/metabox-extensions/meta-box-columns/meta-box-columns.php' );
	}
}

// Show Hide extension.
if ( ! class_exists( 'RWMB_Show_Hide' ) ) {
	if ( file_exists( VRC_DIR . '/assets/admin/metaboxes/metabox-extensions/meta-box-show-hide/meta-box-show-hide.php' ) ) {
	    require_once( VRC_DIR . '/assets/admin/metaboxes/metabox-extensions/meta-box-show-hide/meta-box-show-hide.php' );
	}
}

// Tabs extension.
if ( ! class_exists( 'RWMB_Tabs' ) ) {
	if ( file_exists( VRC_DIR . '/assets/admin/metaboxes/metabox-extensions/meta-box-tabs/meta-box-tabs.php' ) ) {
	    require_once( VRC_DIR . '/assets/admin/metaboxes/metabox-extensions/meta-box-tabs/meta-box-tabs.php' );
	}
}


/**
 * Class: VR_Metaboxes included.
 *
 * @since 1.0.0
 */
if ( file_exists( VRC_DIR . '/assets/admin/metaboxes/class-metaboxes.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/metaboxes/class-metaboxes.php' );
}
