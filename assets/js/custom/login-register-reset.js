/**
 * Login Register Reset JS
 *
 * Login Register Reset JS for memberships stuff.
 *
 * @since 	1.0.0
 * @package VRC
 */

jQuery( function( $ ) {


	    /**
	     * AJAX Login Form Handling.
	     *
	     * @since 1.0.0
	     */
	    var loginButton     = $('#login-button'),
			loginAjaxLoader = $('#login-loader'),
			loginError      = $("#login-error" ),
			loginMessage    = $('#login-message');

			// No loader to begin with.
            loginAjaxLoader.fadeOut(); // TODO: WHY?


	    var loginOptions = {
	        beforeSubmit: function () {
	            loginButton.attr('disabled', 'disabled');
	            loginAjaxLoader.fadeIn('fast');
	            loginMessage.fadeOut('fast');
	            loginError.fadeOut('fast');
	        },
	        success: function ( ajax_response, statusText, xhr, $form ) {
	            var response = $.parseJSON( ajax_response );
	            loginAjaxLoader.fadeOut('fast');
	            loginButton.removeAttr('disabled');
	            if ( response.success ) {
	                loginMessage.html( response.message ).fadeIn('fast');
	                document.location.href = response.redirect;
	            } else {
	                loginError.html( response.message ).fadeIn('fast');
	            }
	        }
	    };

	    $('#login-form').validate({
	        submitHandler: function ( form ) {
	            $(form).ajaxSubmit( loginOptions );
	        }
	    });


	    /**
	     * AJAX Registeration Form Handling.
	     *
	     * @since 1.0.0
	     */
	    var registerButton     = $('#register-button'),
			registerAjaxLoader = $('#register-loader'),
			registerError      = $("#register-error" ),
			registerMessage    = $('#register-message');

            registerAjaxLoader.fadeOut('fast'); // TODO: WHY?


	    var registerOptions = {
	        beforeSubmit: function () {
	            registerButton.attr('disabled', 'disabled');
	            registerAjaxLoader.fadeIn('fast');
	            registerMessage.fadeOut('fast');
	            registerError.fadeOut('fast');
	        },
	        success: function (ajax_response, statusText, xhr, $form) {
	            var response = $.parseJSON( ajax_response );
	            registerAjaxLoader.fadeOut('fast');
	            registerButton.removeAttr('disabled');
	            if ( response.success ) {
	                registerMessage.html( response.message ).fadeIn('fast');
	                document.location.href = response.redirect;
	            } else {
	                registerError.html( response.message ).fadeIn('fast');
	            }
	        }
	    };

	    $('#register-form').validate({
	        rules: {
	            register_username: {
	                required: true
	            },
	            register_email: {
	                required: true,
	                email: true
	            },
	            register_pwd: {
	                required: true
	            },
	            register_pwd2: {
	                equalTo: "#register_pwd"
	            }
	        },
	        submitHandler: function ( form ) {
	            $(form).ajaxSubmit( registerOptions );
	        }
	    });


	    /**
	     * AJAX Reset pass Form Handling.
	     *
	     * @since 1.0.0
	     */
	    var forgotButton     = $('#forgot-button'),
			forgotAjaxLoader = $('#forgot-loader'),
			forgotError      = $("#forgot-error" ),
			forgotMessage    = $('#forgot-message');

            forgotAjaxLoader.fadeOut('fast'); // TODO: WHY?


	    var forgotOptions = {
	        beforeSubmit: function () {
	            forgotButton.attr('disabled', 'disabled');
	            forgotAjaxLoader.fadeIn('fast');
	            forgotMessage.fadeOut('fast');
	            forgotError.fadeOut('fast');
	        },
	        success: function (ajax_response, statusText, xhr, $form) {
	            var response = $.parseJSON( ajax_response );
	            forgotAjaxLoader.fadeOut('fast');
	            forgotButton.removeAttr('disabled');
	            if ( response.success ) {
	                forgotMessage.html( response.message ).fadeIn('fast');
	                $form.resetForm();
	            } else {
	                forgotError.html( response.message ).fadeIn('fast');
	            }
	        }
	    };

	    $('#forgot-form').validate({
	        submitHandler: function ( form ) {
	            $(form).ajaxSubmit( forgotOptions );
	        }
	    });

} ); // EOF.
