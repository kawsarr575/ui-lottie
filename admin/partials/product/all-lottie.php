<?php
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'modals/add-new-product.php';
    $controller = new Nx_Lottie_Controller;
    $get_all_approved_product = $controller->get_all_approved_product();
?>


<div class="wrap">
    <div class="row">
        
        <div class="col-md-12">
            <span><strong>Add New </strong></span> 
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".modal.nx-add-new-product" class="btn nx-button">Lottie Animation</a>

            <div class="card nx-lottie-card">
                <div class="card-body">
                    <table class="table nx-lottie-datatable table-borderless display" width="100%">
                        <thead>
                            <tr>
                                <th>Animation</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th width="15%">Date</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($get_all_approved_product as $data): ?>
                            <tr>
                                <td class="lottie" data-id="<?php _e( $data['id'] )?>">
                                    <img src="<?php _e( $data['preview_file'], 'nx-lottie')?>" alt="<?php _e( $data['name'], 'nx-lottie')?>" width="60px">
                                </td>
                                <td><a href="#"><?php _e( $data['name'], 'nx-lottie')?></a></td>
                                <td><?php _e( $data['price'], 'nx-lottie')?></td>
                                <td><?php _e( $data['status'], 'nx-lottie')?></td>
                                <td><?php _e( $data['type'], 'nx-lottie')?></td>
                                <td><?php _e( $data['created_at'], 'nx-lottie')?></td>
                                <td>
                                    <a href="" data-id="<?php _e( $data['id'] )?>" title="View Animation" data-toggle="tooltip" class="nx-lottie-view-icon"><i class="ri-eye-line"></i></a>
                                    <a href="javascript:void(0)" data-id="<?php _e( $data['id'] )?>" title="Edit Animation" data-toggle="tooltip" class="nx-lottie-edit-icon"><i class="ri-edit-box-line"></i></a>
                                    <a href="javascript:void(0)" data-id="<?php _e( $data['id'] )?>" title="Delete Animation" data-toggle="tooltip" class="nx-lottie-delete-icon product"><i class="ri-delete-bin-2-line"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                
            </div>
          
        </div>
    </div>
</div>


