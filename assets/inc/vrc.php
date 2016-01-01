<?php
/**
 * VR Core Main File
 *
 * This is the main file of VRC which controls everything in this plugin.
 *
 * @package VRC
 * @since 	0.0.1
 *
 */

/**
 * Welcome Page
 *
 * @since 0.0.1
 *
 */
// if ( file_exists( VRC_DIR . '/assets/admin/inc/welcome/welcome.php' ) ) {
//     require_once( VRC_DIR . '/assets/admin/inc/welcome/welcome.php' );
// }




/**
 * Scripts and Styles
 *
 * @since 0.0.1
 *
 */
if ( file_exists( VRC_DIR . '/assets/inc/cft_scripts_styles.php' ) ) {
    require_once( VRC_DIR . '/assets/inc/cft_scripts_styles.php' );
}
