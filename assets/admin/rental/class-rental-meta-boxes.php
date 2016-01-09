<?php
/**
 * Rental related metaboxes
 *
 * Metaboxes for `vr_rental` post type.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Rental_Meta_Boxes.
 *
 * Rental related metaboxes class.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Rental_Meta_Boxes' ) ) :

class VR_Rental_Meta_Boxes {

	/**
	 * Register meta boxes related to `rental` post type.
	 *
	 * TODO: Needs major refactoring!
	 *
	 * @param   array   $meta_boxes
	 * @return  array   $meta_boxes
	 * @since   1.0.0
	 */
	public function register( $meta_boxes ) {

	    $prefix = 'vr_';

	    // Agents
	    $agents_array = array( -1 => __( 'None', 'VRC' ) );
	    $agents_posts = get_posts( array (
			'post_type'        => 'vr_rental', // TODO: Add `vr_agent` CPT.
			'posts_per_page'   => -1,
			'suppress_filters' => 0,
	        ) );
	    if ( ! empty ( $agents_posts ) ) {
	        foreach ( $agents_posts as $agent_post ) {
	            $agents_array[ $agent_post->ID ] = $agent_post->post_title;
	        }
	    }

	    // Rental Details Meta Box
		// $default_desc        = __( 'Consult theme documentation for required image size.', 'VRC' );
		// $gallery_images_desc = apply_filters( 'inspiry_gallery_description', $default_desc );
		// $video_image_desc    = apply_filters( 'inspiry_video_description', $default_desc );

		$default_desc        = __( 'Consult theme documentation for required image size.', 'VRC' );
		$gallery_images_desc = __( 'Consult theme documentation for required image size.', 'VRC' );
		$video_image_desc    = __( 'Consult theme documentation for required image size.', 'VRC' );
		$slider_image_desc   = __( 'Consult theme documentation for required image size.', 'VRC' );

	    $meta_boxes[] = array(
			'id'         => 'vr_rental_meta_box_details_id',
			'title'      => __('Rental Details', 'VRC'),

			'post_types' => array('vr_rental'),

			'context'    => 'normal',
			'priority'   => 'high',

			/**
			 * TABS.
			 */

			'tabs'  => array(
	            'details' => array(
					'label' => __('Basic Information', 'VRC'),
					'icon'  => 'dashicons-admin-home'
	            ),
	            'gallery' => array(
					'label' => __('Gallery Images', 'VRC'),
					'icon'  => 'dashicons-format-gallery'
	            ),
	            'video' => array(
					'label' => __('Rental Video', 'VRC'),
					'icon'  => 'dashicons-format-video'
	            ),
                'amenities' => array(
    				'label' => __('Additional Amenities', 'VRC'),
    				'icon'  => 'dashicons-palmtree'
                ),
	            'agent' => array(
					'label' => __('Agent Information', 'VRC'),
					'icon'  => 'dashicons-businessman'
	            ),
	            'booking' => array(
					'label' => __('Booking Information', 'VRC'),
					'icon'  => 'dashicons-calendar'
	            ),
	            'misc' => array(
					'label' => __('Miscellaneous', 'VRC'),
					'icon'  => 'dashicons-lightbulb'
	            ),
	            'home-slider' => array(
					'label' => __('Homepage Slider', 'VRC'),
					'icon'  => 'dashicons-images-alt'
	            )
	        ),
			'tab_style' => 'left',
			'fields'    => array(

	        	/**
	        	 * Tab: `details`
	        	 * 		Basic Information
	        	 *
	        	 * @since 1.0.0
	        	 */

				// Price.
				array(

					'id'      => "{$prefix}rental_price",
					'type'    => 'text',

					'name'    => __('Price: Rent  ( Only digits )', 'VRC'),
					'desc'    => __('Example Value: 450', 'VRC'),

					'std'     => "",

					'columns' => 6,
					'tab'     => 'details'
				),


				//  Price Postfix.
				array(
					'id'      => "{$prefix}rental_price_postfix",
					'type'    => 'text',

					'name'    => __('Price Postfix', 'VRC'),
					'desc'    => __('Example Value: Per Day', 'VRC'),

					'std'     => "",
					'columns' => 6,
					'tab'     => 'details'
				),


				// Divider.
				array(
					'id'      => '{$prefix}price_divider', // Not used, but needed.
					'type'    => 'divider',
					'columns' => 12,
					'tab'     => 'details'
				),


				// Bedrooms.
				array(
					'id'      => "{$prefix}rental_bedrooms",
					'type'    => 'text',

					'name'    => __('Bedrooms', 'VRC'),
					'desc'    => __('Example Value: 4', 'VRC'),

					'std'     => "",
					'columns' => 6,
					'tab'     => 'details'
				),


				// Bathrooms.
				array(
					'id'      => "{$prefix}rental_bathrooms",
					'type'    => 'text',

					'name'    => __('Bathrooms', 'VRC'),
					'desc'    => __('Example Value: 2', 'VRC'),

					'std'     => "",
					'columns' => 6,
					'tab'     => 'details'
				),


				// Divider.
				array(
					'id'      => '{$prefix}bed_bath_divider', // Not used, but needed.
					'type'    => 'divider',
					'columns' => 12,
					'tab'     => 'details'
				),


				// Guests.
				array(
					'id'      => "{$prefix}rental_guests",
					'type'    => 'text',

					'name'    => __('Guests', 'VRC'),
					'desc'    => __('Example Value: 2', 'VRC'),

					'std'     => "",
					'columns' => 6,
					'tab'     => 'details'
				),


				// Rental ID.
				array(
					'id'      => "{$prefix}rental_customid",
					'type'    => 'text',

					'name'    => __('Rental ID', 'VRC'),
					'desc'    => __('Optional: It will help you search a rental directly.', 'VRC'),

					'std'     => "",
					'columns' => 6,
					'tab'     => 'details'
				),


				// Divider.
				array(
					'id'      => '{$prefix}google_map_divider', // Not used, but needed.
					'type'    => 'divider',
					'columns' => 12,
					'tab'     => 'details'
				),


				// Address on Google Maps.
				array(
					'id'      => "{$prefix}rental_address",
					'type'    => 'text',

					'name'    => __('Rental Address', 'VRC'),
					'desc'    => __('Leaving it empty will hide the google map on rental detail page.', 'VRC'),

					// 'std'  => 'Miami, FL, USA',
					'columns' => 12,
					'tab'     => 'details'
				),


				// Google Maps.
				array(
					'id'            => "{$prefix}rental_location",
					'type'          => 'map',

					'name'          => __('Rental Location at Google Map*', 'VRC'),
					'desc'          => __('Drag the google map marker to point your rental location. You can also use the address field above to search for your rental.', 'VRC'),

					'std'           => '25.761680,-80.191790,14',   // 'latitude,longitude[,zoom]' (zoom is optional)
					'style'         => 'width: 95%; height: 400px',

					'address_field' => "{$prefix}rental_address",
					'columns'       => 12,
					'tab'           => 'details'
				),


				/**
				 * Tab: `gallery`
				 * 		Gallery Images
				 *
				 * @since 1.0.0
				 */

				// Gallery Images.
	            array(
					'id'               => "{$prefix}rental_images",
					'type'             => 'image_advanced',

					'name'             => __('Rental Gallery Images', 'VRC'),
					'desc'             => $gallery_images_desc,

					'max_file_uploads' => 48,
					'columns'          => 12,
					'tab'              => 'gallery'
	            ),


	            /**
	             * Tab: `video`
	             * 		Rental Video
	             *
	             * @since 1.0.0
	             */

	            // Rental Video.
	            array(
					'id'      => "{$prefix}tour_video_url",
					'type'    => 'text',

					'name'    => __('Virtual Tour Video URL', 'VRC'),
					'desc'    => __('Provide virtual tour video URL. YouTube, Vimeo, SWF File and MOV File are supported', 'VRC'),

					'columns' => 12,
					'tab'     => 'video'
	            ),


	            // Divider.
	            array(
					'id'      => '{$prefix}video_divider', // Not used, but needed.
					'type'    => 'divider',
					'columns' => 12,
					'tab'     => 'video'
	            ),


	            // Video Image.
	            array(
					'id'               => "{$prefix}tour_video_image",
					'type'             => 'image_advanced',

					'name'             => __('Virtual Tour Video Image', 'VRC'),
					'desc'             => $video_image_desc,

					'max_file_uploads' => 1,
					'columns'          => 12,
					'tab'              => 'video'
	            ),


                /**
                 * Tab: `amenities`
                 * 		Additional Amenities
                 *
                 * @since 1.0.0
                 */

                // Group.
                array(
					'id'         => '{$prefix}group_amenities',
					'type'       => 'group',

					'clone'      => true,
					// 'sort_clone' => true,

					'tab'        => 'amenities',
					'fields'     => array(

            			// Name of the amenity.
            			array(
							'id'   => '{$prefix}group_amenities_name',
							'type' => 'text',

							'name' => __( 'Name', 'rwmb' ),
							'desc' => 'Example Value: Pool',

							'columns' => 6
            			),

						// Image Icon.
            			array(
							'id'               => '{$prefix}group_amenities_img',
							'type'             => 'image_advanced',

							'name'             => __( 'Icon Image', 'rwmb' ),
							'desc'             => "Add amenity's Icon image.",

							'columns'          => 6,
							'max_file_uploads' => 1
            			)

            		) // Sub-Fields ended.

                ), // Field Group ended.


                /**
	             * Tab: `agent`
	             * 		Agent Information
	             *
	             * @since 1.0.0
	             */

	            // Dispaly Agents or Not.
	            array(
					'id'      => "{$prefix}agent_display_option",
					'type'    => 'radio',

					'name'    => __('What should be displayed in the Agent Information box?', 'VRC'),

					'std'     => 'none',
					'options' => array(
						'my_profile_info' => __('Author of this rental.', 'VRC'),
						'agent_info'      => __('Agent Information. ( Select the agent below )', 'VRC'),
						'none'            => __('Nothing. ( Hide information box )', 'VRC'),
	                ),
					'columns' => 12,
					'tab'     => 'agent'
	            ),


                // Divider.
                array(
    				'id'      => '{$prefix}agent_divider', // Not used, but needed.
    				'type'    => 'divider',
    				'columns' => 12,
    				'tab'     => 'agent'
                ),


	            // Select the agent.
	            array(
				    'id'      => "{$prefix}agents",
				    'type'    => 'select',

				    'name'    => __('Agent', 'VRC'),

				    'options' => $agents_array,
				    'columns' => 12,
				    'tab'     => 'agent'
	            ),


	            /**
	             * Tab: `booking`
	             * 		Booking Information
	             *
	             * @since 1.0.0
	             */

	            // Booked or not.
	            array(
					'id'      => "{$prefix}is_booked",
					'type'    => 'radio',

					'name'    => __('Is this property booked?', 'VRC'),

					'std'     => 'none',
					'options' => array(
						'0' => __('Not Booked.', 'VRC'),
						'1' => __('Booked. (Select the booking below)', 'VRC'),
	                ),
					'columns' => 12,
					'tab'     => 'booking'
	            ),


                // Divider.
                array(
    				'id'      => '{$prefix}booking_divider', // Not used, but needed.
    				'type'    => 'divider',
    				'columns' => 12,
    				'tab'     => 'booking'
                ),


	            // Select the booking.
	            array(
				    'id'      => "{$prefix}bookings",
				    'type'    => 'select',

				    'name'    => __('Select the Booking ', 'VRC'),
				    'desc'    => __('Select only if the rental is booked.', 'VRC'),

				    'options' => $agents_array,
				    'columns' => 12,
				    'tab'     => 'booking'
	            ),


	            /**
	             * Tab: `misc`
	             * 		Miscellaneous
	             *
	             * @since 1.0.0
	             */

	            // Featured rental.
	            array(
					'id'      => "{$prefix}featured",
					'type'    => 'radio',

					'name'    => __('Mark this rental as featured?', 'VRC'),

					'std'     => 0,
					'options' => array(
						1 => __('Yes ', 'VRC'),
						0 => __('No', 'VRC')
	                ),

					'columns' => 12,
					'tab'     => 'misc'
	            ),


	            // Divider.
	            array(
	            	'id'      => '{$prefix}misc_one_divider', // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12,
	            	'tab'     => 'misc'
	            ),


	            // Attachments.
	            array(
					'id'        => "{$prefix}attachments",
					'type'      => 'file_advanced',

					'name'      => __('Attachments', 'VRC'),
					'desc'      => __('You can attach PDF files, Map images OR other documents to provide further details related to this rental property.', 'VRC'),

					'mime_type' => '',
					'columns'   => 12,
					'tab'       => 'misc'
	            ),


	            // Divider.
	            array(
	            	'id'      => '{$prefix}misc_two_divider', // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12,
	            	'tab'     => 'misc'
	            ),


	            // Private Notes.
	            array(
					'id'      => "{$prefix}rental_private_note",
					'type'    => 'textarea',

					'name'    => __('Private Note', 'VRC'),
					'desc'    => __('Keep a private note about this rental property. This field will not be displayed anywhere else.', 'VRC'),

					'std'     => "",
					'columns' => 12,
					'tab'     => 'misc'
	            ),


	            /**
	             * Tab: `home-slider`
	             * 		Home Slider
	             *
	             * @since 1.0.0
	             */

	            // Homepage Slider
	            array(
					'id'      => "{$prefix}is_add_in_slider",
					'type'    => 'radio',

					'name'    => __('Do you want to add this rental in the Homepage Slider?', 'VRC'),
					'desc'    => __('If yes, then you need to provide a slider image below.', 'VRC'),

					'std'     => 'no',
					'options' => array(
						'1' => __('Yes ', 'VRC'),
						'0' => __('No', 'VRC')
	                ),

					'columns' => 12,
					'tab'     => 'home-slider'
	            ),


	            // Divider.
	            array(
	            	'id'      => '{$prefix}slider_divider', // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12,
	            	'tab'     => 'home-slider'
	            ),


	            // Slider Image.
	            array(
					'id'               => "{$prefix}slider_image",
					'type'             => 'image_advanced',

					'name'             => __('Slider Image', 'VRC'),
					'desc'             => $slider_image_desc,

					'max_file_uploads' => 1,
					'columns'          => 12,
					'tab'              => 'home-slider'
	            )



	        ) // Fields ended.

	    ); // Metboxes array ended.

	    return $meta_boxes;

	} // Register function End.



	/**
	 * Add More Amenities Button.
	 *
	 * @since 1.0.0
	 */
	public function amenities_button( $text, $field ) {
		    return __( '+ Add New Amenity', 'VRC' );
	}


} // Class end.

endif;
