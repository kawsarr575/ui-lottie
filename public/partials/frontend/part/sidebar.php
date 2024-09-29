

<ul class="list-group nx-lottie-sidebar-category-list">

    <!-- Product type filter -->
    <div class="title mt-4 mb-3">
        <h4><img src="<?php echo nx_lottie_common_img_url() . 'sort.svg'?>" alt=""> Sort By Type</h4>
    </div>
    <li class="list-group-item nx-lottie-filter-cat d-flex justify-content-between align-items-center" data-id="<?php echo $data['cat_id']; ?>">
        <div class="form-check">
            <input class="form-check-input common_selector type" id="filter_type_free" type="checkbox" value="free" >
            <label class="form-check-label" for="filter_type_free">
                <?php _e( 'Free', 'nx-lottie' ); ?>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input common_selector type" id="filter_type_pro" type="checkbox" value="pro" >
            <label class="form-check-label" for="filter_type_pro">
                <?php _e( 'Premium', 'nx-lottie' ); ?>
            </label>
        </div>
    </li>
    
    <!-- Category filter -->
    <div class="title mt-4 mb-3">
        <h4><img src="<?php echo nx_lottie_common_img_url() . 'sort.svg'?>" alt=""> Sort By Category</h4>
    </div>
    <?php 
        foreach($controller->get_category() as $data):
        $cat_id = $data['cat_id'];
        $count_cat = $controller->count_product_each_cat($cat_id);
        if($count_cat != 0):
    ?>
        <li class="list-group-item nx-lottie-filter-cat d-flex justify-content-between align-items-center" data-id="<?php echo $data['cat_id']; ?>">
     
            <div class="form-check">
                <input class="form-check-input common_selector cat_id" type="checkbox" value="<?php _e( $data['cat_id'], 'nx-lottie' ); ?>" id="cat_id_<?php _e( $data['cat_id'], 'nx-lottie' ); ?>">
                <label class="form-check-label" for="cat_id_<?php _e( $data['cat_id'], 'nx-lottie' ); ?>">
                    <?php _e( $data['cat_name'], 'nx-lottie' ); ?>
                </label>
            </div>
            <span class="badge bg-primary rounded-pill"><?php echo $count_cat; ?></span>
        </li>
    <?php 
        endif;
        endforeach; 
    ?>

</ul>