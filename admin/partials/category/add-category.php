<?php

    $controller = new Nx_Lottie_Controller;

    if(isset($_POST['add_new_category'])){
        $cat_name = $_POST['cat_name'];
        $cat_img = $_POST['cat_img'];
        $controller->add_category($cat_name, $cat_img);
    }

    $get_category = $controller->get_category();

?>
<div class="container-fluid">

    <div class="row">

        <div class="col-4">
        <form action="" method="post">
            <div class="card nx-lottie-card">
                <div class="card-body">
                    
                    <div class="mb-3">
                        <label  class="form-label">Category Name</label>
                        <input type="text" name="cat_name" required class="form-control" placeholder="Development..">
                    </div>
                    
                    <div class="mb-3">
                        <div class="cat-img mb-4">
                            <img src="<?php echo nx_lottie_common_img_url() . 'preview-img.png';?>" class="nx-lottie-preview-img" width="auto" height="80px" alt="Cat image">
                        </div>
                        <input type="hidden" name="cat_img" class="nx-lottie-img-link">
                        <button class="btn nx-lottie-img-upload-btn" type="button" > <i class="ri-camera-line"></i> Add Image</button>
                    </div>


                    <button type="submit" name="add_new_category" class="btn btn-success mt-4">Add Category</button>
                    
                </div>
            </div>
        </form>
        </div>

        <div class="col-md-8">
            
        <div class="card nx-lottie-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group"> 	<!--		Show Numbers Of Rows 		-->
                                <select class="form-control max-table-rows" name="state" id="maxRows">
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="70">70</option>
                                    <option value="100">100</option>
                                     <option value="5000">Show ALL Rows</option>
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-md-3 offset-md-7">
                            <input type="text" id="search" class="nx-lottie-search-frm form-control" placeholder="Search lottie animation..."></input>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <table class="table nx-lottie-table table-borderless table-hover display" width="100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>No. of Pro</th>
                                <th>Date</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($get_category as $data): ?>
                            <tr>
                                <td> 
                                    <img src="<?php echo ( $data['cat_img']) ? $data['cat_img'] : nx_lottie_common_img_url() . 'preview-img.png'; ?>" width="50px" height="40px" alt="Cat"> 
                                </td>
                                <td> <?php _e( $data['cat_name'], 'nx-lottie')?></td>
                                <td> <?php echo $count = $controller->count_product_each_cat($data['cat_id']); _e(' Itmes', 'nx-lottie'); ?></td>
                                <td><?php _e( $data['created_at'], 'nx-lottie')?></td>
                                <td>
                                    <a href="<?php echo site_url(). '/lottie-single-category/?cat=' . $data['cat_slug'] . '&id=' . $data['cat_id'];?>" target="_blank" title="View Category" data-toggle="tooltip" class="nx-lottie-view-icon"><i class="ri-eye-line"></i></a>
                                    <a href="" data-id="<?php _e( $data['cat_id'] )?>" title="Edit Category" data-toggle="tooltip" class="nx-lottie-edit-icon"><i class="ri-edit-box-line"></i></a>
                                    <a href="javascript:void(0)" data-id="<?php _e( $data['cat_id'] )?>" title="Delete Category" data-toggle="tooltip" class="nx-lottie-delete-icon delete-cat"><i class="ri-delete-bin-2-line"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="rows_count">Showing 11 to 20 of 91 entries</div>
                        </div>

                        <div class="col-md-6">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end nx-lottie-pagination">
                                    <!-- pagination comes from jquery -->
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
          
        </div>

    </div>
</div>