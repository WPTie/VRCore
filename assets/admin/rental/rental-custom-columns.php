<?php
/**
 * Custom Columns
 *
 * Custom Columns for post type `rental`.
 *
 * TODO: Create filters http://justintadlock.com/archives/2011/06/27/custom-columns-for-custom-post-types
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Rental_Custom_Columns.
 *
 * Creates custom columns for post type `rental`.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Rental_Custom_Columns' ) ) :

class VR_Rental_Custom_Columns {

	/**
	 * Register custom columns.
	 *
	 * @since 1.0.0
	 */

	public function register( $defaults ) {


		/**
		 * Register new columns.
		 */
        $new_columns = array(
			"thumb"    => __( 'Picture', 'VRC' ),
			"customid" => __( 'Custom ID', 'VRC' ),
			"price"    => __( 'Price', 'VRC')
        );

        // Default columns
        // Don't change the variable name.
        $last_columns = array();

        if ( count( $defaults ) > 5 ) {

        	// Unset the comments column.
        	unset( $defaults['comments'] );

        	// After 3rd element i.e. author, offset 3 last columns i.e. type, destination and date.
        	// so, that thumb, customid and price could be added in between them.
            $last_columns = array_splice( $defaults, 3, 3 ); // TODO: What?

    		// Rename the default columns
    		$last_columns[ 'title' ]                       = __( 'Rentals', 'VRC' );
    		$last_columns[ 'taxonomy-rental-type' ]        = __( 'Types', 'VRC' );
    		$last_columns[ 'taxonomy-rental-destination' ] = __( 'Destination', 'VRC' );
    		// $last_columns[ 'taxonomy-rental-feature' ]  = __( 'Features', 'VRC' );

        }

        // Merge the new_columns.
        $defaults = array_merge( $defaults, $new_columns );
        $defaults = array_merge( $defaults, $last_columns );

        return $defaults;

	}


	/**
	 * Display custom column.
	 *
	 * @since   1.0.0
	 */
	public function display( $column_name ) {

	    global $post;
	    switch ( $column_name ) {

	        case 'thumb':

	            if ( has_post_thumbnail ( $post->ID ) ) : ?>
		            <a 	href="<?php the_permalink(); ?>" target="_blank">
		            	<?php the_post_thumbnail( array( 130, 130 ) );?>
		            </a>
	            <?php
	            else:
	                // _e ( 'No Featured Image.', 'VRC' );
	                echo "—";

	            endif;
	            break;


	        case 'customid':

	            $rental_id = get_post_meta ( $post->ID, 'REAL_HOMES_rental_id', true );
	            if( ! empty ( $rental_id ) ) {
	                echo $rental_id;
	            } else {
	                // _e ( 'ID Not Available.', 'VRC' );
	                echo "—";
	            }
	            break;


	        case 'price':

	            $rental_price = get_post_meta ( $post->ID, 'REAL_HOMES_rental_price', true );
	            if ( !empty ( $rental_price ) ) {
	                $price_amount = doubleval( $rental_price );
	                $price_postfix = get_post_meta ( $post->ID, 'REAL_HOMES_rental_price_postfix', true );
	                echo Inspiry_Property::format_price( $price_amount, $price_postfix );
	            } else {
	                // _e ( 'Price Not Available.', 'VRC' );
	                echo "—";
	            }
	            break;


	        default:
	            break;
	    }
	}

}

endif;
