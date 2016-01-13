<?php
/**
 * View: Login File
 *
 * VR membership login view.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="form-wrapper">

    <div class="form-heading clearfix">
        <span><i class="fa fa-sign-in"></i><?php _e( 'Login', 'VRC' ); ?></span>
        <button type="button" class="close close-modal-dialog " data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-lg"></i></button>
    </div>

    <form id="login-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" enctype="multipart/form-data">

        <div class="form-element">
            <label class="login-form-label" for="login-username"><?php _e( 'Username', 'VRC' ); ?></label>
            <input id="login-username" name="log" type="text" class="login-form-input login-form-input-common required"
                   title="<?php _e( '* Provide your username', 'VRC' ); ?>"
                   placeholder="<?php _e( 'Username', 'VRC' ); ?>" />
        </div>

        <div class="form-element">
            <label class="login-form-label" for="password"><?php _e( 'Password', 'VRC' ); ?></label>
            <input id="password" name="pwd" type="password" class="login-form-input login-form-input-common required"
                   title="<?php _e( '* Provide your password', 'VRC' ); ?>"
                   placeholder="<?php _e( 'Password', 'VRC' ); ?>" />
        </div>

        <div class="form-element clearfix">
            <input type="submit" id="login-button" class="login-form-submit login-form-input-common" value="<?php _e( 'Login', 'VRC' ); ?>" />
            <input type="hidden" name="action" value="inspiry_ajax_login" />
            <input type="hidden" name="user-cookie" value="1" />
            <?php
            // nonce for security
            wp_nonce_field( 'vr-ajax-login-nonce', 'vr-secure-login' );

            if ( is_page() || is_single() ) {
                ?><input type="hidden" name="redirect_to" value="<?php wp_reset_postdata(); global $post; the_permalink( $post->ID ); ?>" /><?php
            } else {
                ?><input type="hidden" name="redirect_to" value="<?php echo esc_url( home_url( '/' ) ); ?>" /><?php
            }

            ?>
            <div class="text-center">
                <div id="login-message" class="modal-message"></div>
                <div id="login-error" class="modal-error"></div>
                <img id="login-loader" class="modal-loader" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" alt="Working...">
            </div>
        </div>

    </form>

    <div class="clearfix">
        <?php
        if( get_option( 'users_can_register' ) ) :
            ?>
            <span class="sign-up pull-left">
                <?php _e( 'Not a Member?', 'VRC' ); ?>
                <a href="#" class="activate-section" data-section="register-section"><?php _e( 'Sign up now', 'VRC' ); ?></a>
            </span>
            <?php
        endif;
        ?>
        <span class="forgot-password pull-right">
            <a href="#" class="activate-section" data-section="password-section"><?php _e( 'Forgot Password?', 'VRC' ); ?></a>
        </span>
    </div>

</div>
