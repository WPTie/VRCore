<?php
/**
 * Class for Homepage meta boexes
 *
 * Meta boxes for homepage template.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Homepage_Meta_Boxes.
 *
 * Class for `vr_homepage` meta boxes.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Homepage_Meta_Boxes' ) ) :

class VR_Homepage_Meta_Boxes {


	/**
	 * Register meta boxes related to homepage template
	 *
	 * @param   array   $meta_boxes
	 * @return  array   $meta_boxes
	 * @since   1.0.0
	 */
	public function register( $meta_boxes ) {

	    $prefix = 'vr_homepage_';

	    $meta_boxes[] = array(
			'id'         => 'vr_homepage_meta_box_details_id',
			'title'      => __('Contact Details', 'VRC'),

			'post_types' => array( 'page' ),

			'context'    => 'normal',
			'priority'   => 'high',

			'show'   => array(
				// List of page templates (used for page only). Array. Optional.
				'template'    => array( 'page-templates/contact.php' ),
			)

			'fields'     => array(

				// Job Title.
	            array(
	                'id'    => "{$prefix}job_title",
	                'type'  => 'text',

	                'name'  => __( 'Job Title', 'VRC' )
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id0", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


	            // Email.
	            array(
	                'id'    => "{$prefix}email",
	                'type'  => 'email',

	                'name'  => __( 'Email Address', 'VRC' ),
	                'desc'  => __( "Homepage related messages from contact form on rental details page, will be sent to this email address.", "VRC" )
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id1", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


	            // Mobile Number.
	            array(
	                'id'    => "{$prefix}mobile_number",
	                'type'  => 'text',

	                'name'  => __( 'Mobile Number', 'VRC' )
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id2", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


	            // Office Number.
	            array(
	                'name'  => __('Office Number', 'VRC'),
	                'id'    => "{$prefix}office_number",
	                'type'  => 'text',
	            ),


	           // Divider.
	           array(
	           	'id'      => "{$prefix}divider_id3", // Not used, but needed.
	           	'type'    => 'divider',
	           	'columns' => 12
	           ),


	           // Fax Number.
	            array(
	                'id'    => "{$prefix}fax_number",
	                'type'  => 'text',

	                'name'  => __('Fax Number', 'VRC')
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id4", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


				// Office Address.
	            array(
	                'id'    => "{$prefix}_office_address",
	                'type'  => 'text',

	                'name'  => __( 'Office Address', 'VRC' )
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id5", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


				// Fb URL.
	            array(
	                'id'    => "{$prefix}fb_url",
	                'type'  => 'url',

	                'name'  => __('Facebook URL', 'VRC')
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id6", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


				// Twitter URL.
	            array(
	                'id'    => "{$prefix}twt_url",
	                'type'  => 'url',

	                'name'  => __('Twitter URL', 'VRC')
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id7", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


	            // G+ URL.
	            array(
	                'id'    => "{$prefix}gplus_url",
	                'type'  => 'url',

	                'name'  => __('Google Plus URL', 'VRC')
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id8", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


	            // LI URL.
	            array(
	                'id'    => "{$prefix}li_url",
	                'type'  => 'text',

	                'name'  => __('LinkedIn URL', 'VRC')
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id9", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


	            // Pin URL
	            array(
	                'id'    => "{$prefix}pin_url",
	                'type'  => 'url',

	                'name'  => __('Pinterest URL', 'VRC')
	            ),


	            // Divider.
	            array(
	            	'id'      => "{$prefix}divider_id10", // Not used, but needed.
	            	'type'    => 'divider',
	            	'columns' => 12
	            ),


	            // Insta URL
	            array(
	                'id'    => "{$prefix}insta_url",
	                'type'  => 'url',

	                'name'  => __('Instagram URL', 'VRC')
	            )

	        ) // Fields array ended.

	    );// Metboxes array ended.


		$meta_boxes[] = array(
			'id'         => 'vr_homepage_meta_box_rental_id',
			'title'      => __('Rental Properties Owner', 'VRC'),

			'post_types' => array( 'vr_homepage' ),

			'context'    => 'normal',
			'priority'   => 'high',

			'fields'     => array(

								 // Display the rental of this booking.
				array(
					'id'   => "{$prefix}rental_owner",
					'type' => 'custom_html',

					'callback' => function (){

						global $post;

						// Get the rentals where `vr_rental_the_homepage` is this homepage.
						// That is get the rentals where this homepage is the owner.
						$args = array(
							'post_type'  => 'vr_rental',
							'orderby'    => 'meta_value_num',
							'meta_key'   => 'vr_rental_the_homepage',
							'meta_value' => $post->ID
						);

						$the_rentals = new WP_Query( $args );

						echo '<div class="rwmb-field">';

							if ( $the_rentals->have_posts() ) {
								echo '<ol>';
								while ( $the_rentals->have_posts() ) {
									$the_rentals->the_post();

									// Frontend link.
									// $li_format = '<li><a href="%s"> %s </a></li>';
									// echo sprintf( $li_format, get_the_permalink() , get_the_title() );

									// Backend link.
									$li_format = '<li><a href="/wp-admin/post.php?post=%s&action=edit"> %s </a></li>';
									echo sprintf( $li_format, get_the_id() , get_the_title() );
								}
								echo '</ol>';
							} else {
								echo "No rental property owned by this homepage.";
							}

						echo '</div>';


					} // Callback function ended.

				), // Field ended.

		   ) // Fields array ended.

	    );// Metboxes array ended.

	    return $meta_boxes;

	} // Register function End.

} // Class ended.

endif;
