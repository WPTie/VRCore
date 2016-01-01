<?php
/**
 * AA Main File
 *
 * This is the main file of AA which controls everything in this plugin
 *
 * @package AA
 * @since 	0.0.1
 *
 */

/**
 * Welcome Page
 *
 * @since 0.0.1
 *
 */
// if ( file_exists( AA_DIR . '/assets/admin/inc/welcome/welcome.php' ) ) {
//     require_once( AA_DIR . '/assets/admin/inc/welcome/welcome.php' );
// }




/**
 * Scripts and Styles
 *
 * @since 0.0.1
 *
 */
if ( file_exists( AA_DIR . '/assets/inc/cft_scripts_styles.php' ) ) {
    require_once( AA_DIR . '/assets/inc/cft_scripts_styles.php' );
}
