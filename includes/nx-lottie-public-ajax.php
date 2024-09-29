<?php

    add_action("wp_ajax_nx_filter_show_search", "nx_filter_show_search");
    add_action("wp_ajax_nopriv_nx_filter_show_search", "nx_filter_show_search");

    function nx_filter_show_search(){

        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';

        $query = "SELECT * FROM $table WHERE status='approved' ";
        
        // Category filter
        if(isset($_POST["cat_id"])){
            $category = implode("','", $_POST["cat_id"]);
            $query .= " AND cat_id IN('".$category."') ";
        }

        // Category filter
        if(isset($_POST["type"])){
            $type = implode("','", $_POST["type"]);
            $query .= " AND type IN('".$type."') ";
        }

        // Search filter
        if($_POST['search'] != ''){
            $query .= 'AND (name LIKE "%'.$_POST['search'].'%") ';
        }

        $query .= 'ORDER BY id DESC ';

        $result = $wpdb->get_results($query, ARRAY_A);
        
        $count_total_row =  $wpdb->num_rows;
       

        ob_start();
        ?>
        
        <div class="row">
            
        <?php 
        
        if( $count_total_row > 0 ){
            foreach($result as $data):
            ?>
            <div class="col-md-3 mb-4">
                <div class="card nx-lottie-product-card">

                    <!-- Wishlist -->
                    <?php if(is_user_logged_in()){ ?>
                        <a href="javascript:void(0)" data-id="<?php echo $data['id']; ?>" title="<?php echo (nx_lottie_check_wishlist($data['id'])) ? 'Remove from wishlist' : 'Add to wishlist';?>" data-toggle="tooltip" class="nx-wishlist addwishlist <?php echo (nx_lottie_check_wishlist($data['id'])) ? 'nx-remove-wishlist' : '';?>">
                            <i class="ri-heart-<?php echo (nx_lottie_check_wishlist($data['id'])) ? 'fill' : 'line';?>"></i>
                        </a>
                    <?php }else{ ?>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".nx-lottie-signin-modal" title="Add to wishlist" data-toggle="tooltip" class="addwishlist">
                            <i class="ri-heart-line"></i>
                        </a>
                    <?php } ?>
                    
                    <a href="javascript:void(0)" class="nx-lottie-view-on-popup" data-id="<?php echo $data['id']; ?>">
                        <img src="<?php echo $data['preview_file']; ?>" alt="">
                    </a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="meta-left">
                                    <span class="price"><span class="currency">$</span><?php echo $data['price']; ?></span>
                                    <!-- <span class="free">Free</span> -->
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="meta-right">
                                    <?php if($data['type'] == 'free'){ ?>

                                        <a href="<?php echo nx_lottie_json_folder_url() . $data['file'] ?>" download data-id="<?php echo $data['id']; ?>" class="download-icon" title="Download" data-toggle="tooltip"><i class="ri-download-cloud-2-line"></i></a> |
                                    
                                    <?php }elseif($data['type'] == 'pro'){ ?>

                                        <?php if(is_user_logged_in()){ ?>
                                            
                                            <a href="<?php echo ( nx_lottie_check_atc_pro($data['id']) ) ? site_url() . '/lottie-cart' : 'javascript:void(0)' ?>" 
                                                data-id="<?php echo $data['id']; ?>" 
                                                class="cart-icon <?php echo ( nx_lottie_check_atc_pro($data['id']) ) ? 'nx-view-cart' : 'nx-add-to-cart' ?>" 
                                                title="<?php echo ( nx_lottie_check_atc_pro($data['id']) ) ? 'View Cart' : 'Add to cart' ?>" data-toggle="tooltip">
                                                
                                                <i class="ri-<?php echo ( nx_lottie_check_atc_pro($data['id']) ) ? 'eye-line' : 'shopping-cart-2-line' ?>"></i>
                                            </a> |
                                            
                                        <?php }else{ ?>

                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".nx-lottie-signin-modal" class="cart-icon nx-add-to-cart" title="Add to cart" data-toggle="tooltip"><i class="ri-shopping-cart-2-line"></i></a> |

                                        <?php } ?>

                                    <?php } ?>
                                    
                                    <a href="#" class="share-icon" title="Share" data-toggle="tooltip"><i class="ri-share-line"></i></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php endforeach; }else{ ?>
            <div class="nx-lottie-no-product-found">
                <img src="<?php echo nx_lottie_common_img_url() . 'no-product.png'; ?>" alt="">
            </div>
            <?php } ?>

        </div>
        <script>
            (function( $ ) {
	        'use strict';

                var count = "Total Products : <?php echo $count_total_row; ?>";
                $('.nx-count-show').html(count);

            })( jQuery );
        </script>
        
        <?php
        $content = ob_get_clean();
        echo $content;
        die();
        
    }


    /**
     * Ajax search lottie product
     */
    add_action("wp_ajax_nx_lottie_show_on_popup", "nx_lottie_show_on_popup");
    add_action("wp_ajax_nopriv_nx_lottie_show_on_popup", "nx_lottie_show_on_popup");

    function nx_lottie_show_on_popup(){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $id = $_POST['dataid']; 

        $sql = $wpdb->get_results("SELECT * FROM $table WHERE id='$id'", ARRAY_A);

        ob_start();
        
            foreach($sql as $data);
                
            ?>
                <div class="">
                    <lottie-player src="<?php echo nx_lottie_json_folder_url() . $data['file'] ; ?>"  background="transparent"  speed="1"  style="width: 100%; height: auto;"  loop autoplay></lottie-player>
                </div>
            <?php
           
        
        $content = ob_get_clean();
	
        echo $content;
        die();

    }

    /**
     * Add to cart product
     */
    add_action("wp_ajax_nx_lottie_add_to_cart", "nx_lottie_add_to_cart");
    add_action("wp_ajax_nopriv_nx_lottie_add_to_cart", "nx_lottie_add_to_cart");

    function nx_lottie_add_to_cart(){
        global $wpdb;
        $table = $wpdb->prefix . 'nx_lottie_cart';
        $p_id = $_POST['dataid'];
        $user_id = get_current_user_id();

        $wpdb->insert( $table, array(
            'user_id' => $user_id,
            'p_id' => $p_id,
        ));

        die();
    } 
    
    
    /**
     * Remove product from the cart or cart page
     */
    add_action("wp_ajax_nx_lottie_remove_item_from_cart", "nx_lottie_remove_item_from_cart");
    add_action("wp_ajax_nopriv_nx_lottie_remove_item_from_cart", "nx_lottie_remove_item_from_cart");

    function nx_lottie_remove_item_from_cart(){
        global $wpdb;
        $table = $wpdb->prefix . 'nx_lottie_cart';
        $id = $_POST['dataid'];

        $wpdb->delete( $table, array(
            'cart_id' => $id
        ));

        $controller = new Nx_Lottie_Controller;
        ob_start();

        include('../public/partials/frontend/part/cart.php');

        $content = ob_get_clean();

        echo $content;

        die();
    }   
    

    /**
     * Add to wishlist
     */
    add_action("wp_ajax_nx_lottie_add_to_wishlist", "nx_lottie_add_to_wishlist");
    add_action("wp_ajax_nopriv_nx_lottie_add_to_wishlist", "nx_lottie_add_to_wishlist");

    function nx_lottie_add_to_wishlist(){
        global $wpdb;
        $table = $wpdb->prefix . 'nx_lottie_wishlist';
        $p_id = $_POST['dataid'];
        $user_id = get_current_user_id();

        $wpdb->insert( $table, array(
            'user_id' => $user_id,
            'p_id' => $p_id
        ));

        die();
    }
    
    /**
     * Show wishist on modal
     */
    add_action("wp_ajax_nx_lottie_show_wishlist_on_modal", "nx_lottie_show_wishlist_on_modal");
    add_action("wp_ajax_nopriv_nx_lottie_show_wishlist_on_modal", "nx_lottie_show_wishlist_on_modal");

    function nx_lottie_show_wishlist_on_modal(){

        global $wpdb;
        $product = $wpdb->prefix . 'nx_lottie_product';
        $wish = $wpdb->prefix . 'nx_lottie_wishlist';
        $user_id = get_current_user_id();
        $sql = $wpdb->get_results("SELECT * FROM $product INNER JOIN $wish ON $product.id = $wish.p_id WHERE $wish.user_id = '$user_id'");
        
        ob_start();

        foreach($sql as $data):

        ?>
        
        <div class="card w-100 mb-4 nx-cart-page nx-wishlist-on-modal">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="javascript:void(0)" class="nx-lottie-view-on-popup" data-id="<?php echo $data->wish_id; ?>">
                        <lottie-player src="<?php echo nx_lottie_json_folder_url() . $data->file; ?>" background="transparent"  speed="1"  style="width: 120px; height: 120px;"  loop autoplay></lottie-player>
                        </a>
                    </div>
                    <div class="col-md-5">
                        <h6><?php _e( $data->name, 'nx-lottie' ); ?></h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Price : <?php _e( $data->price,'nx-lottie') ?></h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="download-cart">
                            <?php if($data->type == 'free'):?>
                                <a href="<?php echo nx_lottie_json_folder_url() . $data->file; ?>" download >Download</a>
                            <?php elseif($data->type == 'pro'):?>
                                <a href="<?php echo nx_lottie_check_atc_pro($data->p_id) ? site_url() . '/lottie-cart/': 'javascript:void(0)'; ?>" data-id="<?php _e( $data->p_id,'nx-lottie') ?>" class="<?php echo nx_lottie_check_atc_pro($data->p_id) ? 'added-to-cart' : 'add-to-cart'; ?>" ><?php echo nx_lottie_check_atc_pro($data->p_id) ? 'View Cart' : 'Add to Cart'; ?></a>
                            <?php endif;?>
                        </h6>
                    </div>
                </div>
                <i data-id="<?php _e( $data->p_id,'nx-lottie') ?>" class="ri-close-line remove-wishlist-from-modal"></i>
            </div>
        </div>

        
        <?php
        endforeach;

        $content = ob_get_clean();
        echo $content;
        wp_die();
    }
       
    
    /**
     * Remove from wishlist
     */
    add_action("wp_ajax_nx_lottie_remove_from_wishlist", "nx_lottie_remove_from_wishlist");
    add_action("wp_ajax_nopriv_nx_lottie_remove_from_wishlist", "nx_lottie_remove_from_wishlist");

    function nx_lottie_remove_from_wishlist(){
        global $wpdb;
        $table = $wpdb->prefix . 'nx_lottie_wishlist';
        $p_id = $_POST['dataid'];
        $user_id = get_current_user_id();

        $wpdb->delete( $table, array(
            'user_id' => $user_id,
            'p_id' => $p_id
        ));

        die();
    }


    /**
     * User or custom singup
     */
    add_action("wp_ajax_nx_lottie_user_signup", "nx_lottie_user_signup");
    add_action("wp_ajax_nopriv_nx_lottie_user_signup", "nx_lottie_user_signup");

    function nx_lottie_user_signup(){
        global $wpdb;

        $email = $wpdb->escape($_POST['user_email']);
        $password = $wpdb->escape($_POST['user_pass']);
        // user name
        $exp_email = explode("@",$email);
        $username = $exp_email[0];

        if(empty($email)){
            $error = "Email is required";
            echo json_encode(array(
                "status"	=>	0,
                "message"	=>	$error,
            ));
        }
        elseif(email_exists($email)) {

            $error = "Email already Exits " . ( $email );
            echo json_encode(array(
                "status"	=>	0,
                "message"	=>	$error,
            ));

        }elseif(empty($password)){
            $error = "Password is required";
            echo json_encode(array(
                "status"	=>	0,
                "message"	=>	$error,
            ));
        }elseif(strlen($password) < 6 ){
            $error = "Password is min 6 word";
            echo json_encode(array(
                "status"	=>	0,
                "message"	=>	$error,
            ));
        }else{

            $user_id = wp_create_user($username, $password, $email);
            $user_id_role = new WP_User($user_id);
            $user_id_role->set_role('nx_lottie_customer');

            if($wpdb->insert_id > 0){
                echo json_encode(array(
                    "status"	=>	1,
                    "message"	=>	"You have sign up successfully! Now login"
                ));
            }else{
                echo json_encode(array(
                    "status"	=>	0,
                    "message"	=>	"Sign Up failed"
                ));
            }
        }
        
        wp_die();
    }


    // user or customer sign in
    add_action("wp_ajax_nx_lottie_user_signin", "nx_lottie_user_signin");
    add_action("wp_ajax_nopriv_nx_lottie_user_signin", "nx_lottie_user_signin");

    function nx_lottie_user_signin(){

        $info = array();
        $info['user_login'] = $_POST['user_email'];
        $info['user_password'] = $_POST['user_pass'];
        $info['remember'] = true;

        $user_signon = wp_signon( $info, false );
        if ( is_wp_error($user_signon) ){
            echo json_encode(array(
                'status'=>  0, 
                'message'=>__('Wrong username or password.')
            ));
        } else {
            echo json_encode(array(
                'status'=> 1, 
                'message'=>__('Login successful, Redirecting...')
            ));
        }

        die();
    }