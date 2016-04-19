<?php
/**
 * Functions
 *
 * Base usable functions.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * VR_Functions.
 *
 * VR Base Functions.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'VR_Functions' ) ) :

class VR_Functions {

	/**
     * Outputs given message.
     *
     * @param string $heading
     * @param string $message
     */
    public static function message( $heading = '', $message = '' ) {

        echo '<div class="message">';
        if ( !empty( $heading ) ) {
            echo '<h3>' . $heading . '</h3>';
        }
        if ( !empty( $message ) ) {
            echo '<p>' . $message . '</p>';
        }
        echo '</div>';
    }


    /**
     * Delete all posts.
     *
     * Manual unit testing.
     *
     * @since 1.0.0
     */
    public static function delete_posts( $post_type = NULL, $post_status = 'draft' ) {

        $args = array(
            'post_type'   => $post_type,
            'post_status' => $post_status
            );
        $posts = get_posts( $args );
        foreach( $posts as $post ) {
         wp_delete_post( $post->ID, true);
        }

    }


    /**
     * Get terms array for Rental List Meta.
     *
     * Returns terms array for a given taxonomy
     * containing key(slug) value(name) pair.
     *
     * @param string $tax_name
     * @param variable that is returned $terms_array
     * @since  1.0.0
     */
    public static function get_terms_array( $tax_name, &$terms_array ) {
        $tax_terms = get_terms( $tax_name, array (
            'hide_empty' => false,
        ) );
        VR_Functions::add_term_children( 0, $tax_terms, $terms_array );
    }

    /**
     * Add term children to array.
     *
     * A recursive function to add children terms to given array.
     *
     * @param   int $parent_id
     * @param   array $tax_terms
     * @param   array variable $terms_array
     * @param   string $prefix
     * @since   1.0.0
     */
    public static function add_term_children( $parent_id, $tax_terms, &$terms_array, $prefix = '' ) {
        if ( ! empty( $tax_terms ) && ! is_wp_error( $tax_terms ) ) {
            foreach ( $tax_terms as $term ) {
                if ( $term->parent ==  $parent_id ) {
                    $terms_array[ $term->slug ] = $prefix . $term->name;
                    VR_Functions::add_term_children( $term->term_id, $tax_terms, $terms_array, $prefix . '- ' );
                }
            }
        }
    }

} // Class ended.

endif;


/**
 * METHOD: Get an object of VR_Functions class.
 *
 * Add for themes to recognize the class and help
 * instantiate an object without any hooks.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'vr_get_function_obj' ) ) {
    function vr_get_function_obj() {
        return new VR_Functions();
    }
}

// // Admin menu.
// add_action( 'admin_menu', 'vr_menu_new' );
// function vr_menu_new() {
//     add_menu_page( 'Page', 'Menu', 'manage_options', 'vr_menu_new', '', '', 3.005 );
// }

