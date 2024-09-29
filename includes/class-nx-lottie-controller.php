<?php

class Nx_Lottie_Controller{

    /**
     * insert lottie animation for preview
     */
    public function insert_lottie_preview($u_file_name){

        $user_id = get_current_user_id();
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        
        $data = array('user_id' => $user_id, 'file' => $u_file_name);
        $format = array('%d','%s');
        $wpdb->insert($table,$data,$format);
        $last_id = $wpdb->insert_id;

        $url = admin_url() . 'admin.php?page=add-new-product&id=' . $last_id . '&preview=yes';
        nx_lottie_js_redirect_url($url);

        $msg = 'Successfully Inserted Preview';
        nx_lottie_admin_notice__success($msg);

    }

    /**
     * Get lottie animation for preview
     */
    public function get_preview_lottie($id){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';

        $result = $wpdb->get_results("SELECT * FROM $table WHERE id = '$id' ");

        return $result;

    }

    /**
     * Remove lottie preview
     */
    public function remove_lottie_preview($id){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';

        $wpdb->delete( $table, array( 'id' => $id ) );

        $url = admin_url() . 'admin.php?page=add-new-product';
        nx_lottie_js_redirect_url($url);

        $msg = 'Successfully Removed Preview';
        nx_lottie_admin_notice__success($msg);
    }

    /**
     * Final add
     */
    // function add_new_lottie($data){

    //     global $wpdb;
    //     $table = $wpdb->prefix.'nx_lottie_product';
    //     $user_id = get_current_user_id();
    //     $status = 'approved';

    //     if($data['type'] == 'free'){
    //         $aep_file = '';
    //         $price = '';
    //     }elseif($data['type'] == 'pro'){
    //         $aep_file = $data['aep_file'];
    //         $price = $data['price'];
    //     }

    //     $dd = $wpdb->insert( $table , array(
    //         'user_id' => $user_id,
    //         'type' => $data['type'],
    //         'name' => $data['name'], 
    //         'preview_file' => $data['lottie_gif_file'],
    //         'aep_file' => $aep_file,
    //         'price' => $price, 
    //         'cat_id' => $data['category'],
    //         'tags' => $data['tags'], 
    //         'status' => $status
    //     ));
    
    //    // Redirect after inserting
    //     $url = admin_url() . 'admin.php?page=nx-lottie';
    //     nx_lottie_js_redirect_url($url);

    //     $msg = 'Successfully Added Product';
    //     nx_lottie_admin_notice__success($msg);

    // }

    /**
     * Get all approved lottie product
     */
    public function get_all_approved_product(){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $sql = $wpdb->get_results("SELECT * FROM $table WHERE user_id != 0 AND status='approved' ORDER BY id DESC", ARRAY_A);

        return $sql;
    }

    /**
     * Get all pending lottie product
     */
    public function get_all_pending_product(){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $sql = $wpdb->get_results("SELECT * FROM $table WHERE user_id != 0 AND status='pending' ORDER BY id DESC", ARRAY_A);

        return $sql;
    }

     /**
     * Get all trash lottie product
     */
    public function get_all_trash_product(){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $sql = $wpdb->get_results("SELECT * FROM $table WHERE user_id != 0 AND status='trash' ORDER BY id DESC", ARRAY_A);

        return $sql;
    }

    /**
     * Update product
     */
    public function update_product($edit_id, $name, $u_file_name, $aep_u_file_name, $price, $category, $tag, $type){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $sql = "UPDATE $table SET
            name = '$name',
            file = '$u_file_name',
            aep_file = '$aep_u_file_name',
            price = '$price', 
            cat_id = '$category', 
            tags = '$tag',
            type = '$type'
            WHERE id = '$edit_id'";
        $data = $wpdb->query($sql);

        $msg = 'Successfully Updated';
        nx_lottie_admin_notice__success($msg);
        
    }

    /**
     * Get product by product id
     */
    public function get_product_by_id($id){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $sql = $wpdb->get_results("SELECT * FROM $table WHERE id = '$id'", ARRAY_A);

        return $sql;
    }

    /**
     * add new category
     */
    public function add_category($cat_name, $cat_img){
        global $wpdb;
        $nx_add_category = $wpdb->prefix . "nx_lottie_category";
        $cat_slug = strtolower(str_replace(" ","-",$cat_name));
        $data = array('cat_name' => $cat_name, 'cat_img' => $cat_img, 'cat_slug'=> $cat_slug);
        $format = array('%s','%s','%s');
        $wpdb->insert($nx_add_category, $data, $format);

        $msg = 'Successfully Added Category';
        nx_lottie_admin_notice__success($msg);
    }

    /**
     * Get category
     */
    public function get_category(){
        global $wpdb;
        $nx_add_category = $wpdb->prefix . "nx_lottie_category";
        $sql = $wpdb->get_results("SELECT * FROM $nx_add_category ORDER BY cat_id DESC", ARRAY_A);

        return $sql;
    }

    /**
     * Count product in a category
     */
    public function count_product_each_cat($cat_id){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $sql = $wpdb->get_var( "SELECT COUNT(cat_id) FROM $table WHERE cat_id='$cat_id' AND status='approved' ");

        return $sql;
    }

    /**
     * Get product single category wise
     */
    public function get_product_cat_wise($cat_id){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $sql = $wpdb->get_results("SELECT * FROM $table WHERE cat_id ='$cat_id' AND status='approved' ORDER BY id DESC", ARRAY_A);

        return $sql;
    }

    /**
     * Show Cart page product 
     */
    public function get_cart_product(){
        global $wpdb;
        $product = $wpdb->prefix . 'nx_lottie_product';
        $cart = $wpdb->prefix . 'nx_lottie_cart';
        $user_id = get_current_user_id();
        $sql = $wpdb->get_results("SELECT * FROM $product INNER JOIN $cart ON $product.id = $cart.p_id WHERE $cart.user_id = '$user_id'");
        
        return $sql;
    }

}