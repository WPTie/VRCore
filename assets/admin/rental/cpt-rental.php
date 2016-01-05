<?php
/**
 * CPT Rental Class
 *
 * Class for CPT rental.
 *
 * @since 1.0.0
 * @package VRC
 */


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'VR_CPT_Rental' ) ) :

class VR_CPT_Rental {

	/**
	 * Post Type: rental.
	 *
	 * @since 1.0.0
	 */
	function register_cpt() {

	    $labels = array(
			'name'               => _x( 'Rentals', 'Post Type General Name', 'VRC' ),
			'singular_name'      => _x( 'Rental', 'Post Type Singular Name', 'VRC' ),
			'menu_name'          => __( 'Rentals', 'VRC' ),
			'name_admin_bar'     => __( 'Rental', 'VRC' ),
			'parent_item_colon'  => __( 'Parent Rental:', 'VRC' ),
			'all_items'          => __( 'All Rentals', 'VRC' ),
			'add_new_item'       => __( 'Add New Rental', 'VRC' ),
			'add_new'            => __( 'Add New', 'VRC' ),
			'new_item'           => __( 'New Rental', 'VRC' ),
			'edit_item'          => __( 'Edit Rental', 'VRC' ),
			'update_item'        => __( 'Update Rental', 'VRC' ),
			'view_item'          => __( 'View Rental', 'VRC' ),
			'search_items'       => __( 'Search Rental', 'VRC' ),
			'not_found'          => __( 'Not found', 'VRC' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'VRC' )
			);

		$rewrite = array(
			// 'slug'               => apply_filters( 'vr_rental_slug', __( 'rental', 'VRC' ) ),
			'slug'               => 'rental',
			'with_front'         => true,
			'pages'              => true,
			'feeds'              => true
	    );

	    $args = array(
	        'label'               => __( 'rental', 'VRC' ),
	        'description'         => __( 'Rentals', 'VRC' ),
	        'labels'              => $labels,
	        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'page-attributes', 'comments' ),
	        'hierarchical'        => true,
	        'public'              => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'menu_position'       => 5,
	        'menu_icon'           => 'dashicons-building',
	        'show_in_admin_bar'   => true,
	        'show_in_nav_menus'   => true,
	        'can_export'          => true,
	        'has_archive'         => true,
	        'exclude_from_search' => false,
	        'publicly_queryable'  => true,
	        'rewrite'             => $rewrite,
	        'capability_type'     => 'post'
	    );

	    register_post_type( 'rental', $args );

	}


	/**
	 * Create Fake Content.
	 *
	 * @since  1.0.0
	 */
	function fake_content() {

       // Check if fake content created, if not create 10 fake posts for 'rental' post type.
       if( get_option( 'created_fake_content_rental' ) ) { return; }

       $i = 0;
       while( $i < 11 ) {
           $post = array( 'post_title' => 'Rental ' . $i );
           $post['post_content'] = '<p>Testing some amazing content here...</p>';
           $post['post_type'] = 'rental';
           $post['post_status'] = 'publish';
           $new_post = wp_insert_post( $post );
           $i++;
       }
       update_option( 'created_fake_content_rental', true );

   }

}

endif;