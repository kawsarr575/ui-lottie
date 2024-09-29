<?php


    /**
     * Insert new product
     */
    add_action("wp_ajax_nx_lottie_insert_new_product", "nx_lottie_insert_new_product");
    add_action("wp_ajax_nopriv_nx_lottie_insert_new_product", "nx_lottie_insert_new_product");

    function nx_lottie_insert_new_product(){

        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $user_id = get_current_user_id();

        $status = 'approved';

        if($_POST['type'] == 'free'){

            $aep_file = '';
            $price = '';

        }elseif($_POST['type'] == 'pro'){

            $aep_file = $_POST['aep_file'];
            $price = $_POST['price'];

        }

        $wpdb->insert( $table , array(

            'user_id'       =>      $user_id,
            'type'          =>      $_POST['type'],
            'name'          =>      $_POST['name'], 
            'preview_file'  =>      $_POST['lottie_gif_file'],
            'aep_file'      =>      $aep_file,
            'price'         =>      $price, 
            'cat_id'        =>      $_POST['category'],
            'tags'          =>      serialize($_POST['tags']), 
            'status'        =>      $status

        ));

        wp_die();
    
    } 

    /**
     * trash product
     */
    add_action("wp_ajax_nx_lottie_show_product_data_on_modal", "nx_lottie_show_product_data_on_modal");
    add_action("wp_ajax_nopriv_nx_lottie_show_product_data_on_modal", "nx_lottie_show_product_data_on_modal");

    function nx_lottie_show_product_data_on_modal(){

        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $id = $_POST['dataid'];

        $sql = $wpdb->get_results("SELECT * FROM $table WHERE id='$id'", ARRAY_A);

        ob_start();
        
            foreach($sql as $data);
        ?>
        <form action="javascript:void(0)" method="post" id="nx_lottie_add_frm" class="was-validated" enctype="multipart/form-data">
            <div class="row">

                <div class="col-md-6">
                    
                    <div class="card nx-lottie-card">
                        <div class="card-body text-center">
                            
                            <div class="holder mb-4">
                                <img src="<?php echo nx_lottie_common_img_url() . 'demo-preview.gif'; ?>" class="nx-lottie-preview-gif" width="100%" height="400px" alt="animation">
                            </div>

                            <div class="input-group">
                                <input type="text" value="<?php echo $data->file_preview; ?>" class="form-control nx-lottie-gif-link readonly" name="lottie_gif_file" required>
                                <button class="btn btn-outline-primary nx-lottie-gif-upload-btn" type="button">Add Preview Gif</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    
                    <div class="card nx-lottie-card">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 nx-box-shadow">
                                        <label  class="form-label">Select Animation Type</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input anitypefree" checked type="radio" name="type" id="anitypefree" value="free">
                                            <label class="form-check-label" for="anitypefree">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input anitypepremium" type="radio" name="type" id="anitypepremium" value="pro">
                                            <label class="form-check-label" for="anitypepremium">Premium</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 nx-box-shadow">
                                        <label  class="form-label">Animation Name</label>
                                        <input type="text" name="name" class="form-control" required placeholder="Running girl">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3 nx-box-shadow">
                                        <label  class="form-label">Animation Price</label>
                                        <input type="number" name="price" step="0.01" readonly class="form-control price-field" placeholder="2.99">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3 nx-box-shadow">
                                        <label  class="form-label">Category</label><br>
                                        <select class="form-control" name="category" required>
                                            <option selected disabled value="" >Select Category</option>
                                            <?php foreach($controller->get_category() as $cat):?>
                                                <option value="<?php _e( $cat['cat_id'] ); ?>"><?php _e( $cat['cat_name'], 'nx-lottie'); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 nx-box-shadow ae-file-field">
                                        <label  class="form-label" data-toggle="tooltip" title="Please zip JSON and AEP file of this animation">AEP File <i class="ri-question-fill"></i></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control nx-lottie-aep-file-link readonly" name="aep_file">
                                            <button class="btn btn-outline-primary nx-lottie-aep-file-upload-btn" disabled type="button">Add AEP & JSON</button>
                                            <small>
                                                <strong>Note:</strong>
                                                Please zip JSON and AEP file of this animation and then upload zip file here
                                            </small>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3 form-group nx-box-shadow">
                                <label  class="form-label">Animation Tags</label><br>
                                <select class="form-select nx-lottie-select-two" name="tags[]" multiple="multiple" required>
                                    
                                </select><br>
                                <small>Type animation tags ex=> maketing</small>
                            </div>

                            <button type="submit" name="add_new_lottie" class="btn nx-button nx-submit-btn">Add Animation</button>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
        <?php

        $content = ob_get_clean();
            
        echo $content;
        die();

    }  
    
    /**
     * trash product
     */
    add_action("wp_ajax_nx_lottie_trash_product", "nx_lottie_trash_product");
    add_action("wp_ajax_nopriv_nx_lottie_trash_product", "nx_lottie_trash_product");

    function nx_lottie_trash_product(){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $id = $_POST['id'];

        $sql = "UPDATE $table SET status = 'trash' WHERE id='$id'";

		$wpdb->query($sql);
    } 
    
    /**
     * Delete category
     */
    add_action("wp_ajax_nx_lottie_delete_category", "nx_lottie_delete_category");
    add_action("wp_ajax_nopriv_nx_lottie_delete_category", "nx_lottie_delete_category");

    function nx_lottie_delete_category(){
        global $wpdb;
        $table = $wpdb->prefix.'nx_lottie_product';
        $id = $_POST['id'];

        $sql = "UPDATE $table SET status = 'trash' WHERE id='$id'";

		$wpdb->query($sql);
    }

