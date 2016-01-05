<?php
/**
 * VR Core Main File
 *
 * This is the main file of VRC which controls everything in this plugin.
 *
 * @package VRC
 * @since 	0.0.1
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Welcome Page.
 *
 * @since 0.0.1
 */

// if ( file_exists( VRC_DIR . '/assets/admin/inc/welcome/welcome.php' ) ) {
//     require_once( VRC_DIR . '/assets/admin/inc/welcome/welcome.php' );
// }


/**
 * Admin/Renatals.
 *
 * Rentals related files.
 *
 * @since 1.0.0
 */

if ( file_exists( VRC_DIR . '/assets/admin/rentals/cpt-rental.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rentals/cpt-rental.php' );
}

if ( file_exists( VRC_DIR . '/assets/admin/rentals/ct-rental-type.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rentals/ct-rental-type.php' );
}

if ( file_exists( VRC_DIR . '/assets/admin/rentals/ct-rental-destination.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rentals/ct-rental-destination.php' );
}

if ( file_exists( VRC_DIR . '/assets/admin/rentals/ct-rental-feature.php' ) ) {
    require_once( VRC_DIR . '/assets/admin/rentals/ct-rental-feature.php' );
}

/**
 * Scripts and Styles
 *
 * @since 0.0.1
 */
if ( file_exists( VRC_DIR . '/assets/inc/cft_scripts_styles.php' ) ) {
    require_once( VRC_DIR . '/assets/inc/cft_scripts_styles.php' );
}

/**
 * VR Core Class.
 *
 * Class that handles all the classes.
 *
 * Methods:
 * 			1. Rentals - Deals with all the rentals related stuff.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Core' ) ) :

class VR_Core {

	/**
	 * VR Rentals Object.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	private $rental;


	/**
	 * Rental Type Object.
	 *
	 * @var 	object
	 * @since 	1.0.0
	 */
	 public $rental_type;


	 /**
	  * Rental Destination Object.
	  *
	  * @var 	object
	  * @since 	1.0.0
	  */
	  public $rental_destination;


	  /**
	   * Rental Features Object.
	   *
	   * @var 		object
	   * @since 	1.0.0
	   */
	   public $rental_feature;



	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->rental             = new VR_CPT_Rental();
		$this->rental_type        = new VR_CT_Rental_Type();
		$this->rental_destination = new VR_Rental_Destination();
		$this->rental_feature     = new VR_Rental_Feature();

	}


	/**
	 * Create Rental.
	 *
	 * Custom Post type: `rental`
	 *
	 * @since  1.0.0
	 */
	public function create_rental() {
		$this->rental->register_cpt();
	}


	/**
	 * Fake Rental Content.
	 *
	 * @since 1.0.0
	 */
	public function fake_rental_content() {
		$this->rental->fake_content();
	}


	/**
	 * Create CT Rental Type.
	 *
	 * @since 1.0.0
	 */
	public function create_rental_type() {
		$this->rental_type->register();
	}


	/**
	 * Create CT Rental Destination.
	 *
	 * @since 1.0.0
	 */
	public function create_rental_destination() {
		$this->rental_destination->register();
	}


	/**
	 * Create CT Rental Feature.
	 *
	 * @since 1.0.0
	 */
	public function create_rental_feature() {
		$this->rental_feature->register();
	}


}

endif;

/**
 * VR Core Object.
 */
$vrcore = new VR_Core();


/**
 * VRC Actions.
 */

// Create rental post type
add_action( 'init', array( $vrcore, 'create_rental' ) );

// Create fake rental content.
add_action( 'init', array( $vrcore, 'fake_rental_content' ) );

// Create rental-type CT.
add_action( 'init', array( $vrcore, 'create_rental_type' ) );

// Create rental-destination CT.
add_action( 'init', array( $vrcore, 'create_rental_destination' ) );

// Create rental-feature CT.
add_action( 'init', array( $vrcore, 'create_rental_feature' ) );
