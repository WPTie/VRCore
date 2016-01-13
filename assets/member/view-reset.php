<?php
/**
 * View: Forget File
 *
 * VR membership forget view.
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
        <span><?php _e( 'Forgot Password', 'VRC' ); ?></span>
        <button type="button" class="close close-modal-dialog" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-lg"></i></button>
    </div>

    <form id="forgot-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post" enctype="multipart/form-data">

        <div class="form-element">
            <label class="login-form-label" for="reset_username_or_email"><?php _e( 'Username or Email', 'VRC' ); ?><span>*</span></label>
            <input id="reset_username_or_email" name="reset_username_or_email" type="text" class="login-form-input login-form-input-common required"
                   title="<?php _e( '* Provide a valid username or email!', 'VRC' ); ?>"
                   placeholder="<?php _e( 'Username or Email', 'VRC' ); ?>" />
        </div>

        <div class="form-element">
            <input type="submit" id="forgot-button" name="user-submit" class="login-form-submit login-form-input-common" value="<?php _e( 'Reset Password', 'VRC' ); ?>">
            <input type="hidden" name="action" value="inspiry_ajax_forgot" />
            <input type="hidden" name="user-cookie" value="1" />
            <?php wp_nonce_field( 'vr-ajax-forgot-nonce', 'vr-secure-reset' ); ?>
            <div class="text-center">
                <div id="forgot-message" class="modal-message"></div>
                <div id="forgot-error" class="modal-error"></div>
                <img id="forgot-loader" class="modal-loader" src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" alt="Working...">
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

        <span class="login-link pull-right">
            <a href="#" class="activate-section" data-section="login-section"><?php _e( 'Login', 'VRC' ); ?></a>
        </span>

    </div>

</div>

