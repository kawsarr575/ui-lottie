<?php

    /**
     * Redirect url by jquery
     */
    function nx_lottie_js_redirect_url($url){
        ?>
            <script>
                window.location.href = "<?php echo $url; ?>";
            </script>
        <?php 
    }

    add_action( 'admin_notices', 'nx_lottie_admin_notice__success' );
    function nx_lottie_admin_notice__success($msg) {
        if($msg){
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e( $msg, 'nx-lottie' ); ?></p>
        </div>
        <?php
        }
    }
    

    // Hide admin bar from lottie user
    add_action('init', 'nx_lottie_hide_admin_bar');
    function nx_lottie_hide_admin_bar() {

        if(current_user_can('nx_lottie_customer')){
            show_admin_bar(false);
        }
    }

    /**
     * Return json file folder url
     * @return url
     */
    function nx_lottie_json_folder_url(){

        return plugin_dir_url( __FILE__ ) . '../../lottie-files/';

    }

    
    /**
     * Return common folder file , img url
     * @return forlder url
     */
    function nx_lottie_common_img_url(){

        return plugin_dir_url( __FILE__ ) . '../common/img/';
    }

    /**
     * Check add to cart product already exist or not
     * @return product_id
     */
    function nx_lottie_check_atc_pro($p_id){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_cart';
        $user_id = get_current_user_id();

        $query = $wpdb->get_results("SELECT * FROM $table WHERE p_id='$p_id' AND user_id='$user_id'", ARRAY_A);

        foreach($query as $data){
            return $data['p_id'];
        }
        
    }

    /**
     * count total product in cart
     * @return int
     */
    function nx_lottie_count_cart_pro(){

        global $wpdb;
        $table = $wpdb->prefix . 'nx_lottie_cart';
        $user_id = get_current_user_id();

        $sql = $wpdb->get_var("SELECT COUNT(cart_id) FROM $table WHERE user_id='$user_id'");

        return $sql;

    } 

    /**
     * Sum cart product price
     * @return int
     */
    function nx_lottie_calculate_total_amount(){
    
        global $wpdb;
        $product = $wpdb->prefix . 'nx_lottie_product';
        $cart = $wpdb->prefix . 'nx_lottie_cart';
        $user_id = get_current_user_id();

        $sql = $wpdb->get_var("SELECT SUM(price) FROM $product INNER JOIN $cart ON $product.id = $cart.p_id WHERE $cart.user_id = '$user_id'");
        
        return $sql;

    }
    
    /**
     * Check add to wishlist product already exist or not
     * @return product_id
     */
    function nx_lottie_check_wishlist($p_id){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_wishlist';
        $user_id = get_current_user_id();

        $query = $wpdb->get_results("SELECT * FROM $table WHERE p_id='$p_id' AND user_id='$user_id'", ARRAY_A);

        foreach($query as $data){
            return $data['p_id'];
        }
    }

    /**
     * Count total product in wishlist
     */
    function nx_lottie_count_wishist_pro(){

        global $wpdb;
        $table = $wpdb->prefix . 'nx_lottie_wishlist';
        $user_id = get_current_user_id();

        $sql = $wpdb->get_var("SELECT COUNT(wish_id) FROM $table WHERE user_id='$user_id'");

        return $sql;

    }

    /**
     * Form control url
     * @return url
     */
    function nx_lottie_form_control_url(){

        $url = plugin_dir_url( __FILE__ ) . 'includes/class-nx-lottie-form-control.php';
        return $url;
        
    }

    /**
     * Get product category name by category id
     * @param int
     * @return string category name
     */
    function nx_lottie_get_cat_name(){
        
    }