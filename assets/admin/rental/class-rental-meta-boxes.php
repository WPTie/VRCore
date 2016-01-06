<?php
/**
 * Rental related metaboxes
 *
 * Metaboxes for `rental` post type.
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
	 * @since   1.0.0
	 * @return  array   $meta_boxes
	 */
	// public function register( $meta_boxes ) {

	 //    $prefix = 'vr_';

	 //    // Agents
	 //    // $agents_array = array( -1 => __( 'None', 'VRC' ) );
	 //    // $agents_posts = get_posts( array (
	 //    //     'post_type' => 'agent',
	 //    //     'posts_per_page' => -1,
	 //    //     'suppress_filters' => 0,
	 //    //     ) );
	 //    // if ( ! empty ( $agents_posts ) ) {
	 //    //     foreach ( $agents_posts as $agent_post ) {
	 //    //         $agents_array[ $agent_post->ID ] = $agent_post->post_title;
	 //    //     }
	 //    // }

	 //    // Property Details Meta Box
		// // $default_desc        = __( 'Consult theme documentation for required image size.', 'VRC' );
		// // $gallery_images_desc = apply_filters( 'inspiry_gallery_description', $default_desc );
		// // $video_image_desc    = apply_filters( 'inspiry_video_description', $default_desc );

		// $default_desc        = __( 'Consult theme documentation for required image size.', 'VRC' );
		// $gallery_images_desc = __( 'Consult theme documentation for required image size.', 'VRC' );
		// $video_image_desc    = __( 'Consult theme documentation for required image size.', 'VRC' );
		// $slider_image_desc   = __( 'Consult theme documentation for required image size.', 'VRC' );

	 //    $meta_boxes[] = array(
		// 	'id'         => 'property-meta-box',
		// 	'title'      => __('Property', 'VRC'),
		// 	'post_types' => array('rental'),
		// 	'context'    => 'normal',
		// 	'priority'   => 'high',

		// 	/**
		// 	 * TABS
		// 	 */

		// 	'tabs'  => array(
	 //            'details' => array(
		// 			'label' => __('Basic Information', 'VRC'),
		// 			'icon'  => 'dashicons-admin-home',
	 //            ),
	 //            'gallery' => array(
		// 			'label' => __('Gallery Images', 'VRC'),
		// 			'icon'  => 'dashicons-format-gallery',
	 //            ),
	 //            'video' => array(
		// 			'label' => __('Property Video', 'VRC'),
		// 			'icon'  => 'dashicons-format-video',
	 //            ),
	 //            'agent' => array(
	 //                'label' => __('Agent Information', 'VRC'),
	 //                'icon' => 'dashicons-businessman',
	 //            ),
	 //            'misc' => array(
	 //                'label' => __('Misc', 'VRC'),
	 //                'icon' => 'dashicons-lightbulb',
	 //            ),
	 //            'home-slider' => array(
	 //                'label' => __('Homepage Slider', 'VRC'),
	 //                'icon' => 'dashicons-images-alt',
	 //            ),
	 //            'banner' => array(
	 //                'label' => __('Top Banner', 'VRC'),
	 //                'icon' => 'dashicons-format-image',
	 //            ),
	 //        ),
	 //        'tab_style' => 'left',
	 //        'fields' => array(

	 //            // Details
	 //            array(
	 //                'id' => "{$prefix}property_price",
	 //                'name' => __('Sale or Rent Price ( Only digits )', 'VRC'),
	 //                'desc' => __('Example Value: 435000', 'VRC'),
	 //                'type' => 'text',
	 //                'std' => "",
	 //                'columns' => 6,
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_price_postfix",
	 //                'name' => __('Price Postfix', 'VRC'),
	 //                'desc' => __('Example Value: Per Month', 'VRC'),
	 //                'type' => 'text',
	 //                'std' => "",
	 //                'columns' => 6,
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_size",
	 //                'name' => __('Area Size ( Only digits )', 'VRC'),
	 //                'desc' => __('Example Value: 2500', 'VRC'),
	 //                'type' => 'text',
	 //                'std' => "",
	 //                'columns' => 6,
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_size_postfix",
	 //                'name' => __('Size Postfix', 'VRC'),
	 //                'desc' => __('Example Value: Sq Ft', 'VRC'),
	 //                'type' => 'text',
	 //                'std' => "",
	 //                'columns' => 6,
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_bedrooms",
	 //                'name' => __('Bedrooms', 'VRC'),
	 //                'desc' => __('Example Value: 4', 'VRC'),
	 //                'type' => 'text',
	 //                'std' => "",
	 //                'columns' => 6,
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_bathrooms",
	 //                'name' => __('Bathrooms', 'VRC'),
	 //                'desc' => __('Example Value: 2', 'VRC'),
	 //                'type' => 'text',
	 //                'std' => "",
	 //                'columns' => 6,
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_garage",
	 //                'name' => __('Garages', 'VRC'),
	 //                'desc' => __('Example Value: 1', 'VRC'),
	 //                'type' => 'text',
	 //                'std' => "",
	 //                'columns' => 6,
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_id",
	 //                'name' => __('Property ID', 'VRC'),
	 //                'desc' => __('It will help you search a property directly.', 'VRC'),
	 //                'type' => 'text',
	 //                'std' => "",
	 //                'columns' => 6,
	 //                'tab' => 'details',
	 //            ),


	 //            // Map
	 //            array(
	 //                'type' => 'divider',
	 //                'columns' => 12,
	 //                'id' => 'google_map_divider', // Not used, but needed
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_address",
	 //                'name' => __('Property Address', 'VRC'),
	 //                'desc' => __('Leaving it empty will hide the google map on property detail page.', 'VRC'),
	 //                'type' => 'text',
	 //                // 'std' => 'Miami, FL, USA',
	 //                'columns' => 12,
	 //                'tab' => 'details',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_location",
	 //                'name' => __('Property Location at Google Map*', 'VRC'),
	 //                'desc' => __('Drag the google map marker to point your property location. You can also use the address field above to search for your property.', 'VRC'),
	 //                'type' => 'map',
	 //                'std' => '25.761680,-80.191790,14',   // 'latitude,longitude[,zoom]' (zoom is optional)
	 //                'style' => 'width: 95%; height: 400px',
	 //                'address_field' => "{$prefix}property_address",
	 //                'columns' => 12,
	 //                'tab' => 'details',
	 //            ),

	 //            array(
	 //                'name' => __('Property Gallery Images', 'VRC'),
	 //                'id' => "{$prefix}property_images",
	 //                'desc' => $gallery_images_desc,
	 //                'type' => 'image_advanced',
	 //                'max_file_uploads' => 48,
	 //                'columns' => 12,
	 //                'tab' => 'gallery',
	 //            ),


	 //            // Property Video
	 //            array(
	 //                'id' => "{$prefix}tour_video_url",
	 //                'name' => __('Virtual Tour Video URL', 'VRC'),
	 //                'desc' => __('Provide virtual tour video URL. YouTube, Vimeo, SWF File and MOV File are supported', 'VRC'),
	 //                'type' => 'text',
	 //                'columns' => 12,
	 //                'tab' => 'video',
	 //            ),
	 //            array(
	 //                'name' => __('Virtual Tour Video Image', 'VRC'),
	 //                'id' => "{$prefix}tour_video_image",
	 //                'desc' => $video_image_desc,
	 //                'type' => 'image_advanced',
	 //                'max_file_uploads' => 1,
	 //                'columns' => 12,
	 //                'tab' => 'video',
	 //            ),

	 //            // Agents
	 //            array(
	 //                'name' => __('What to display in agent information box ?', 'VRC'),
	 //                'id' => "{$prefix}agent_display_option",
	 //                'type' => 'radio',
	 //                'std' => 'none',
	 //                'options' => array(
	 //                    'my_profile_info' => __('Author information.', 'VRC'),
	 //                    'agent_info' => __('Agent Information. ( Select the agent below )', 'VRC'),
	 //                    'none' => __('None. ( Hide information box )', 'VRC'),
	 //                ),
	 //                'columns' => 12,
	 //                'tab' => 'agent',
	 //            ),
	 //            array(
	 //                'name' => __('Agent', 'VRC'),
	 //                'id' => "{$prefix}agents",
	 //                'type' => 'select',
	 //                // 'options' => $agents_array,
	 //                'columns' => 12,
	 //                'tab' => 'agent',
	 //            ),

	 //            // Misc
	 //            array(
	 //                'name' => __('Mark this property as featured ?', 'VRC'),
	 //                'id' => "{$prefix}featured",
	 //                'type' => 'radio',
	 //                'std' => 0,
	 //                'options' => array(
	 //                    1 => __('Yes ', 'VRC'),
	 //                    0 => __('No', 'VRC')
	 //                ),
	 //                'columns' => 12,
	 //                'tab' => 'misc',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}attachments",
	 //                'name' => __('Attachments', 'VRC'),
	 //                'desc' => __('You can attach PDF files, Map images OR other documents to provide further details related to property.', 'VRC'),
	 //                'type' => 'file_advanced',
	 //                'mime_type' => '',
	 //                'columns' => 12,
	 //                'tab' => 'misc',
	 //            ),
	 //            array(
	 //                'id' => "{$prefix}property_private_note",
	 //                'name' => __('Private Note', 'VRC'),
	 //                'desc' => __('In this textarea, You can write your private note about this property. This field will not be displayed anywhere else.', 'VRC'),
	 //                'type' => 'textarea',
	 //                'std' => "",
	 //                'columns' => 12,
	 //                'tab' => 'misc',
	 //            ),

	 //            // Homepage Slider
	 //            array(
	 //                'name' => __('Do you want to add this property in Homepage Slider ?', 'VRC'),
	 //                'desc' => __('If Yes, Then you need to provide a slider image below.', 'VRC'),
	 //                'id' => "{$prefix}add_in_slider",
	 //                'type' => 'radio',
	 //                'std' => 'no',
	 //                'options' => array(
	 //                    'yes' => __('Yes ', 'VRC'),
	 //                    'no' => __('No', 'VRC')
	 //                ),
	 //                'columns' => 12,
	 //                'tab' => 'home-slider',
	 //            ),
	 //            array(
	 //                'name' => __('Slider Image', 'VRC'),
	 //                'id' => "{$prefix}slider_image",
	 //                'desc' => $slider_image_desc,
	 //                'type' => 'image_advanced',
	 //                'max_file_uploads' => 1,
	 //                'columns' => 12,
	 //                'tab' => 'home-slider',
	 //            ),

	 //            // Top Banner
	 //            array(
	 //                'name' => __('Top Banner Image', 'VRC'),
	 //                'id' => "{$prefix}page_banner_image",
	 //                'desc' => __('Upload the banner image, If you want to change it for this property. Otherwise default banner image uploaded from theme options will be displayed. Image should have minimum width of 2000px and minimum height of 230px.', 'VRC'),
	 //                'type' => 'image_advanced',
	 //                'max_file_uploads' => 1,
	 //                'columns' => 12,
	 //                'tab' => 'banner',
	 //            )

	 //        ) // Fields ended.
	 //    ); // Metboxes array ended.

	 //    return $meta_boxes;

	// } // Regist function End.


	public function register_test( $meta_boxes ) {
	    $meta_boxes[] = array(
	        'title'      => __( 'Test Meta Box', 'textdomain' ),
	        'post_types' => 'rental',
	        'fields'     => array(
	            array(
	                'id'   => 'name',
	                'name' => __( 'Name', 'textdomain' ),
	                'type' => 'text',
	            ),
	            array(
	                'id'      => 'gender',
	                'name'    => __( 'Gender', 'textdomain' ),
	                'type'    => 'radio',
	                'options' => array(
	                    'm' => __( 'Male', 'textdomain' ),
	                    'f' => __( 'Female', 'textdomain' ),
	                ),
	            ),
	            array(
	                'id'   => 'email',
	                'name' => __( 'Email', 'textdomain' ),
	                'type' => 'email',
	            ),
	            array(
	                'id'   => 'bio',
	                'name' => __( 'Biography', 'textdomain' ),
	                'type' => 'textarea',
	            ),
	        ),
	    );
	    return $meta_boxes;
	}
} // Class end.

endif;
