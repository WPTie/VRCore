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
    public function message( $heading = '', $message = '' ) {

        echo '<div class="inspiry-message">';
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
    public function delete_posts( $post_type = NULL, $post_status = 'draft' ) {

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
     * Output hierarchical select options with selection based on term id
     * @param $taxonomy_name
     * @param $taxonomy_terms
     * @param $target_term_id
     * @param string $prefix
     */
    function inspiry_hierarchical_id_options($taxonomy_name, $taxonomy_terms, $target_term_id, $prefix = " " ){

        if ( ! empty( $taxonomy_terms ) && ! is_wp_error( $taxonomy_terms ) ){

            foreach ( $taxonomy_terms as $term ) {
                if ( $target_term_id == $term->term_id ) {
                    echo '<option value="' . $term->term_id . '" selected="selected">' . $prefix . $term->name . '</option>';
                } else {
                    echo '<option value="' . $term->term_id . '">' . $prefix . $term->name . '</option>';
                }
                $child_terms = get_terms( $taxonomy_name, array(
                    'orderby'    => 'name',
                    'order'      => 'ASC',
                    'hide_empty' => false,
                    'parent'     => $term->term_id
                ) );

                if ( ! empty( $child_terms ) && !is_wp_error( $child_terms ) ){
                    /* Recursive Call */
                    inspiry_hierarchical_id_options( $taxonomy_name, $child_terms, $target_term_id, "- ".$prefix );
                }
            }

        }

    } // Function ended.


    /**
     * Inspiry generate options based on given query arguments or CPT name
     *
     * @param $post_args
     * @param int $selected
     */
    function inspiry_generate_cpt_options( $post_args, $selected = 0 ) {

        $defaults = array( 'posts_per_page' => -1 );

        if ( is_array( $post_args ) ) {
            $post_args = wp_parse_args( $post_args, $defaults );
        } else {
            $post_args = wp_parse_args( array( 'post_type' => $post_args ), $defaults );
        }

        $posts = get_posts( $post_args );
        foreach ( $posts as $post ) :
            ?><option value="<?php echo esc_attr( $post->ID ); ?>" <?php if( isset( $selected ) && ( $selected == $post->ID ) ) { echo "selected"; } ?>><?php echo esc_html( $post->post_title ); ?></option><?php
        endforeach;
    } // Function ended.


} // Class ended.

endif;
