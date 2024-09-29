

<div class="container-fluid">
<form action="<?php echo nx_lottie_form_control_url(); ?>" method="post" id="nx_lottie_add_frm" class="was-validated" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-6">
            
            <div class="card nx-lottie-card">
                <div class="card-body text-center">
                    
                    <div class="holder mb-4">
                        <img src="<?php echo nx_lottie_common_img_url() . 'demo-preview.gif'; ?>" class="nx-lottie-preview-gif" width="100%" height="400px" alt="animation">
                    </div>

                    <div class="input-group">
                        <input type="text"  class="form-control nx-lottie-gif-link readonly" name="lottie_gif_file" required>
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
                                    <?php foreach($controller->get_category() as $data):?>
                                        <option value="<?php _e( $data['cat_id'] ); ?>"><?php _e( $data['cat_name'], 'nx-lottie'); ?></option>
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

                    <button type="submit" name="add_new_lottie" class="btn btn-primary">Add Product</button>
                    
                </div>
            </div>
            
        </div>
    </div>
</form>
</div>

