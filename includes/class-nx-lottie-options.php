<?php

  // If this file is called directly, abort.
    if ( ! defined( 'WPINC' ) ) {
        die;
    }

    class nx_lottie_option{

        public function __construct() {
            
        }
        

        public static function register_setting_option() {

            /**
             * SMS API settings
             */
            register_setting( 'efsmsi_sms_settings_group', 'efsmsi_sms_gateway_name' );
        

            return true;
        }




    }
    new nx_lottie_option();
