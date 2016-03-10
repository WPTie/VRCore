<?php
/**
 * Get The Rental
 *
 * Gets rental related stuff likes meta.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Get_Rental.
 *
 * Get class for the rental post_type.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Get_Rental' ) ) :

class VR_Get_Rental {

	/**
	 * The Rental ID.
	 *
	 * @var 	int
	 * @since 	1.0.0
	 */
	 public $the_rental_ID;


	/**
	 * The Meta Data.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	public $the_meta_data;


	/**
	 * Meta Keys.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	private $meta_keys = array(
		// TAB                 : Basic Information.
		'price'                => 'vr_rental_price',
		'price_postfix'        => 'vr_rental_price_postfix',
		'beds'                 => 'vr_rental_bedrooms',
		'baths'                => 'vr_rental_bathrooms',
		'guests'               => 'vr_rental_guests',
		'custom_id'            => 'vr_rental_customid',
		'address'              => 'vr_rental_address',
		'location'             => 'vr_rental_location',

		// TAB                 : Gallery Images.
		'images'               => 'vr_rental_images',

		// TAB                 : Rental Video.
		'video_url'            => 'vr_rental_tour_video_url',
		'video_image'          => 'vr_rental_tour_video_image',

		// TAB                 : Additional Amenities.
		'group_amenities'      =>'vr_rental_group_amenities',
		'group_amenities_name' =>'vr_rental_group_amenities_name',
		'group_amenities_img'  =>'vr_rental_group_amenities_img',

		// TAB                 : Agent Information.
		'agent_display_option' => 'vr_rental_agent_display_option',
		'the_agent'            => 'vr_rental_the_agents',

		// TAB                 : Booking Information.
		'is_booked'            => 'vr_rental_is_booked',
		'the_booking'          => 'vr_rental_the_booking',

		// TAB                 : Miscellaneous.
		'featured'             => 'vr_rental_featured',
		'attachments'          =>'vr_rental_attachments',
		'private_note'         =>'vr_rental_private_note',

		// TAB                 : Homepage Slider.
		'is_add_in_slider'     =>'vr_rental_is_add_in_slider',
		'slider_image'         => 'vr_rental_slider_image'
	);


	 /**
	  * Constructor.
	  *
	  * Checks the rental ID and assigns
	  * the meta data to $the_meta_data.
	  *
	  * @since 1.0.0
	  */
	 public function __construct( $the_rental_ID = NULL ) {
		// Check if there is $the_rental_ID.
		if ( ! $the_rental_ID ) {
			$the_rental_ID = get_the_ID();
		} else {
			$the_rental_ID = intval( $the_rental_ID );
		}

		    // Assign values to the class variables.
		    if ( $the_rental_ID > 0 ) {
			$this->the_rental_ID = $the_rental_ID;
			$this->the_meta_data = get_post_custom( $the_rental_ID );
		}
	 }


	 /**
	  * Get Rental: Meta.
	  *
	  * Gets the rental meta_value if passed
	  * a meta_key through argument.
	  *
	  * @since 1.0.0
	  */
	 public function get_rental_meta( $meta_key ) {
		// If meta is set then return value else return false.
	 	if ( isset( $this->meta_data[ $meta_key ] ) ) {
			// Returns the value of meta.
			return $this->meta_data[ $meta_key ][0];
		} else {
		    return false;
		}
	 }


	/**
	 * Get Rental: ID.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_ID() {
		return $this->$the_rental_ID;
	}


	/**
	 * Get Rental: Price.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_price() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['price'] );
	}


	/**
	 * Get Rental: Price Postfix.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_price_postfix() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['price_postfix'] );
	}


	/**
	 * Get Rental: Price with Postfix.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_price_with_postfix() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}

		// Float value of price.
		$price_amount = floatval( get_rental_price() );

		// The price postfix
		$price_postfix = get_rental_price_postfix();

		// TODO: Add currency selection.
		// return $this->format_price( $price_amount, $price_postfix );
	}


	/**
	 * Get Rental: Beds.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_beds() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['beds'] );
	}


	/**
	 * Get Rental: Baths.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_baths() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['baths'] );
	}


	/**
	 * Get Rental: Guests.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_guests() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['guests'] );
	}


	/**
	 * Get Rental: Custom ID.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_custom_id() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['custom_id'] );
	}


	/**
	 * Get Rental: Address.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_address() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['address'] );
	}

	/**
	 * Get Rental: Location.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_location() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['location'] );
	}


	/**
	 * Get Rental: Latitude.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_latitude() {
	    // Get the location.
	    $location = $this->get_rental_location();

	    // if there is location then return 0th value.
	    if ( $location ) {
	        $lat_lng = explode( ',', $location );
	        if( is_array( $lat_lng ) && isset( $lat_lng[0] ) ) {
	            return $lat_lng[0];
	        }
	    }
	    return false;
	}


	/**
	 * Get Rental: Longitude.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_longitude() {
	    // Get the location.
	    $location = $this->get_rental_location();

	    // if there is location then return 1th value.
	    if ( $location ) {
	        $lat_lng = explode( ',', $location );
	        if( is_array( $lat_lng ) && isset( $lat_lng[1] ) ) {
	            return $lat_lng[1];
	        }
	    }
	    return false;
	}


	/**
	 * Get Rental: Images.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_images() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['images'] );
	}


	/**
	 * Get Rental: Video URL.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_video_url() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['video_url'] );
	}


	/**
	 * Get Rental: Video Image.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_video_image() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['video_image'] );
	}


	/**
	 * Get Rental: Group Amenities.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_group_amenities() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return maybe_unserialize( $this->get_rental_meta( $this->meta_keys['group_amenities'] ) );
	}


	/**
	 * Get Rental: Agent Display Optoin.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_agent_display_option() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['agent_display_option'] );
	}


	/**
	 * Get Rental: The Agent.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_the_agent() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['the_agent'] );
	}


	/**
	 * Get Rental: Is Booked.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_is_booked() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['is_booked'] );
	}


	/**
	 * Get Rental: The Booking ID.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_the_booking() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['the_booking'] );
	}


	/**
	 * Get Rental: Featured.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_featured() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['featured'] );
	}


	/**
	 * Get Rental: Attachments.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_attachments() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['attachments'] );
	}


	/**
	 * Get Rental: Private Note.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_private_note() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['private_note'] );
	}


	/**
	 * Get Rental: Is Add In Slider.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_is_add_in_slider() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}
		return $this->get_rental_meta( $this->meta_keys['is_add_in_slider'] );
	}


	/**
	 * Get Rental: Slider Image.
	 *
	 * @since 1.0.0
	 */
	public function get_rental_slider_image() {
		// Returns false if ID is not present.
		if ( ! $this->the_rental_ID ) {
		    return false;
		}

		// Slider Image ID.
		$slider_image_id = $this->get_property_meta( $this->meta_keys['slider_image'] );
		if ( $slider_image_id ) {
		    return wp_get_attachment_url( $slider_image_id );
		}
		return false;
	}


	/**
	 * Get Rental: `vr_rental-type` Taxonomy Terms.
	 *
	 * @return bool|null|string
	 */
	public function get_rental_type_terms() {
	    return $this->get_taxonomy_terms( 'vr_rental-type' );
	}


	/**
	 * Get Rental: `vr_rental-destination` Taxonomy Terms.
	 *
	 * @return bool|null|string
	 */
	public function get_rental_destination_terms() {
	    return $this->get_taxonomy_terms( 'vr_rental-destination' );
	}


	/**
	 * Get Rental: `vr_rental-feature` Taxonomy Terms.
	 *
	 * @return bool|null|string
	 */
	public function get_rental_feature_terms() {
	    return $this->get_taxonomy_terms( 'vr_rental-feature' );
	}


	/**
	 * Get Rental: Taxonomy Terms.
	 *
	 * @param 	$taxonomy
	 * @return 	bool|null|string
	 * @since 1.0.0
	 */
	public function get_taxonomy_terms( $taxonomy ) {
	    if ( ! $this->property_id || ! $taxonomy || ! taxonomy_exists( $taxonomy ) ) {
	        return false;
	    }

	    // Get the terms.
	    $taxonomy_terms = get_the_terms( $this->property_id, $taxonomy );

	    // Create a comma separated string of terms.
	    if ( ! empty( $taxonomy_terms ) && ! is_wp_error( $taxonomy_terms ) ) {
	        $terms_count = count( $taxonomy_terms );
	        $taxonomy_terms_string = '';
	        $loop_count = 1;
	        foreach ( $taxonomy_terms as $single_term ) {
	            $taxonomy_terms_string .= $single_term->name;
	            if ( $loop_count < $terms_count ) {
	                $taxonomy_terms_string .= ', ';
	            }
	            $loop_count++;
	        }
	        return $taxonomy_terms_string;
	    }
	    return null;
	}


} // class `VR_Get_Rental`  ended.

endif;
