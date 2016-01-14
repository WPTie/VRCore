<?php
/**
 * Scripts and Styles
 *
 * Enqueue all the scripts and styles through this file.
 *
 * @package VRC
 * @since 	0.0.1
 */

// Abort if called directly
if ( ! defined( 'WPINC' ) ) { die; }


add_action( 'wp_enqueue_scripts', 'aa_scripts_stlyes' );
function aa_scripts_stlyes() {

    	// jQuery
        wp_enqueue_script( 'jquery' ); // Enqueue it!


        /**
         * Scripts
         *
         * Minified and concatenated scripts
         *
         *     Order is important
         *     @vendors     vendors.min,js
         *     @custom      custom.min.js
         *
         * @since 0.0.1
         *
         */
        wp_register_script( 'aa_vendorsJs', VRC_URL . '/js/vendors.min.js' ); // Custom scripts
        wp_enqueue_script( 'aa_vendorsJs' ); // Enqueue it!

        wp_register_script( 'aa_customJs', VRC_URL . '/js/custom.min.js' ); // Custom scripts
        wp_enqueue_script( 'aa_customJs' ); // Enqueue it!


        /**
         * Style
         *
         *  style.min.css contains all the minified CSS from vendors and partials
         *
         * @since 0.0.1
         */

        // CSS
        wp_register_style( 'aa_g_style', VRC_URL . '/assets/css/style.min.css', array() , '1.0', 'all' );
        wp_enqueue_style( 'aa_g_style' ); // Enqueue it!

        // Font
        wp_register_style( 'aa_g_font', 'http://fonts.googleapis.com/css?family=Roboto:300,400', array(), '1.0', 'all' );
        wp_enqueue_style( 'aa_g_font' ); // Enqueue it!




}

/**

  Admin relevant

 */

/**
 *
 * Admin only scripts/styles
 *
 * @since  0.0.1
 *
 */
// add_action( 'admin_enqueue_scripts', 'aa_admin_header_scripts' ); // Add Custom Scripts to wp_head
// function aa_admin_header_scripts() ) {

//         wp_register_style( 'aa_admin_css', VRC_URL . '/assets/admin/css/aa_admin.css' );
//         wp_enqueue_style(  'aa_admin_css' );
// }

/**
 *
 * Admin Dynamic CSS
 *
 * @since  0.0.1
 *
 */
// add_action( 'admin_head', 'aa_admin_dynamic_css' );
// function aa_admin_dynamic_css() ) {

//     if ( file_exists(  VRC_URL .'/assets/admin/css/aa_admin_css.php' )  ) {
//         require_once(  VRC_URL .'/assets/admin/css/aa_admin_css.php'  );
//     }
// }
