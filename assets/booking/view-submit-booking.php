<?php
/**
 * View: Submit Booking
 *
 * VR booking submit-booking view.
 *
 * @since 	1.0.0
 * @package VRC
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


<div class="white-box user-profile-wrapper">

    <?php

    if( ! is_user_logged_in() ) {

        echo "Login Required! You need to login to be able book a rental!";

    } else {

        // Get user information.
        global $current_user;
        get_currentuserinfo();
        $current_user_meta = get_user_meta( $current_user->ID );

        ?>

        <form
            id      ="vr-submit-booking"
            method  ="post"
            class   ="submit-booking-form"
            enctype ="multipart/form-data" >


            <div class="form-option">

                <div>
                    <label for="vr_booking_date_checkin">
                        <?php _e('Check In:', 'VRC'); ?>
                    </label>

                    <input
                        type  ="date"
                        name  ="vr_booking_date_checkin"
                        id    ="vr_booking_date_checkin"
                        class ="rwmb-date hasDatepicker"
                        data-options="{ 'dateFormat':'dd-mm-yy',
                                        'showButtonPanel':false,
                                        'appendText':' (Day-Month-Year)',
                                        'autoSize':true,
                                        'numberOfMonths':2
                                        }"
                    />

                </div>

                <div>
                    <label for="vr_booking_date_checkout">
                        <?php _e('Check Out:', 'VRC'); ?>
                    </label>
                    <input
                        type  ="date"
                        name  ="vr_booking_date_checkout"
                        id    ="vr_booking_date_checkout"
                        class ="rwmb-date hasDatepicker"
                        data-options="{ 'dateFormat':'dd-mm-yy',
                                        'showButtonPanel':false,
                                        'appendText':' (Day-Month-Year)',
                                        'autoSize':true,
                                        'numberOfMonths':2
                                        }"
                    />
                </div>

                <!-- Hidden Meta -->
                <div>
                    <label for="vr_booking_date_checkout">
                        <?php _e('Guests:', 'VRC'); ?>
                    </label>
                    <input
                        type  ="number"
                        name  ="vr_booking_guests"
                        id    ="vr_booking_guests"
                        step  ="1"
                        class ="rwmb-number"
                    />
                </div>


                <div>
                    <input
                        type  ="hidden"
                        name  ="vr_booking_name"
                        id    ="vr_booking_name"
                        value  ="<?php echo $current_user->display_name; ?>"
                    />

                    <input
                        type  ="hidden"
                        name  ="vr_booking_email"
                        id    ="vr_booking_email"
                        value  ="<?php echo esc_attr( $current_user->user_email ); ?>"
                    />
                </div>

            </div>




            <!-- Form Hidden Data -->
            <div class="form-option">

                <input
                    type  = "submit"
                    name  = "submit_booking"
                    id    = "submit-booking"
                    class = "btn-small btn-orange"
                    value = "<?php _e( 'Submit Booking', 'VRC' ); ?>"
                />

                <img
                    src ="<?php echo VRC_URL; ?>/assets/img/ajax-loader.gif"
                    id  ="ajax-loader"
                    alt ="Loading..."
                />

                <input
                    type  ="hidden"
                    name  ="action"
                    value ="vr_submit_booking_action"
                />

                <?php wp_nonce_field( 'vr_submit_booking', 'vr_submit_booking_nonce' ); ?>
            </div>

            <p id="form-message"></p>
            <p id="form-bookingid"></p>
            <ul id="form-errors"></ul>

        </form>
        <!-- #vr-submit-booking -->

    <?php } // Else ended. ?>

</div>
<!-- .user-profile-wrapper -->
