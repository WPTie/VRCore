<?php
/**
 * Method Get Rental
 *
 * Methods for VR_Get_Rental class.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get Price.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'vr_get_rental_price' ) ) {
	function vr_get_rental_price( $the_rental_ID ) {
		return VR_Get_The_Rental_Plugin( $the_rental_ID )::get_rental_price();
	}
}
