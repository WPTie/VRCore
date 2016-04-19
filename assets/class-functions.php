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

function cpid() {


    return get_current_screen()->id;


}


// dbgx_trace_var( get_current_screen()->id, $var_name = false );









// /*
//  * Course tabs
//  */
// add_action( 'all_admin_notices', 'learn_press_course_tabs' );
// function learn_press_course_tabs() {
//     if ( !is_admin() ) {
//         return;
//     }
//     $admin_tabs = apply_filters(
//         'learn_press_admin_tabs_info',
//         array(

//             10 => array(
//                 "link" => "edit.php?post_type=vr_rental",
//                 "name" => __( "Courses", "vr_rental" ),
//                 "id"   => "edit-vr_rental",
//             ),

//             20 => array(
//                 "link" => "edit-tags.php?taxonomy=cvr_rental-destination&post_type=vr_rental",
//                 "name" => __( "Categories", "vr_rental" ),
//                 "id"   => "edit-vr_rental-destination",
//             ),
//             // 30 => array(
//             //     "link" => "edit-tags.php?taxonomy=course_tag&post_type=vr_rental",
//             //     "name" => __( "Tags", "vr_rental" ),
//             //     "id"   => "edit-course_tag",
//             // ),

//         )
//     );
//     ksort( $admin_tabs );
//     $tabs = array();
//     foreach ( $admin_tabs as $key => $value ) {
//         array_push( $tabs, $key );
//     }
//     $pages              = apply_filters(
//         'learn_press_admin_tabs_on_pages',
//         array( 'edit-lp_course', 'edit-course_category', 'edit-course_tag', 'vr_rental' )
//     );
//     $admin_tabs_on_page = array();
//     foreach ( $pages as $page ) {
//         $admin_tabs_on_page[$page] = $tabs;
//     }


//     $current_page_id = get_current_screen()->id;
//     $current_user    = wp_get_current_user();
//     if ( !in_array( 'administrator', $current_user->roles ) ) {
//         return;
//     }
//     if ( !empty( $admin_tabs_on_page[$current_page_id] ) && count( $admin_tabs_on_page[$current_page_id] ) ) {
//         echo '<h2 class="nav-tab-wrapper lp-nav-tab-wrapper">';
//         foreach ( $admin_tabs_on_page[$current_page_id] as $admin_tab_id ) {

//             $class = ( $admin_tabs[$admin_tab_id]["id"] == $current_page_id ) ? "nav-tab nav-tab-active" : "nav-tab";
//             echo '<a href="' . admin_url( $admin_tabs[$admin_tab_id]["link"] ) . '" class="' . $class . ' nav-tab-' . $admin_tabs[$admin_tab_id]["id"] . '">' . $admin_tabs[$admin_tab_id]["name"] . '</a>';
//         }
//         echo '</h2>';
//     }
// }



// /**
//  * Register for menu for admin
//  */
// function lp_admin_menu() {
//     $capacity = 'manage_options';
//     add_menu_page(
//         __( 'Learning Management System', 'learnpress' ),
//         __( 'LearnPress', 'learnpress' ),
//         $capacity,
//         'vr_rental',
//         '',
//         'dashicons-welcome-learn-more',
//         '3.14'
//     );

//     $menu_items = array(
//         'bookings' => array(
//             'vr_rental',
//             __( 'Bookings', 'learnpress' ),
//             __( 'Bookings', 'learnpress' ),
//             $capacity,
//             'learn_press_statistics',
//             array( $this, 'menu_page' )
//         ),
//         'settings'   => array(
//             'options-general.php',
//             __( 'LearnPress Settings', 'learnpress' ),
//             __( 'LearnPress', 'learnpress' ),
//             'manage_options',
//             'learn_press_settings',
//             'learn_press_settings_page'
//         ),
//     );

//     // Third-party can be add more items
//     $menu_items = apply_filters( 'learn_press_menu_items', $menu_items );

//     if ( $menu_items ) foreach ( $menu_items as $item ) {
//         call_user_func_array( 'add_submenu_page', $item );
//     }
// }
// add_action( 'admin_menu', 'lp_admin_menu' );
