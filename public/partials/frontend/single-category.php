<?php
    /* Template Name: Lottie Single Category */

    //echo $user_id = get_current_user_id();
    get_header();
    include_once 'part/header.php';

    $get_product_cat_wise = $controller->get_product_cat_wise($cat_id);
?>

<div class="nx-lottie-body">
    <div class="container-fluid">

        <div class="lottie-hero-area">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="nx-lottie-home-search">
                        <!-- <select class="form-select" name="" id="">
                            <option value="">Category</option>
                            <?php //foreach($controller->get_category() as $data): ?>
                            <option value="<?php //echo $data['cat_id']; ?>"><?php //_e( $data['cat_name'], 'nx-lottie' )?></option>
                            <?php //endforeach; ?>
                        </select> -->
                        <input type="text" name="nx_lottie_search" class="form-control nx-lottie-search-box" placeholder="Looking for something type here..." aria-label="Text input with dropdown button">
                    </div>
                </div>
            </div>
        </div>

        <div class="row nx-lottie-after-hero-area">
            <div class="col-3">
                <div class="nx-lottie-sidebar">
                    <?php include_once 'part/sidebar.php';?>
                </div>
            </div>
            <div class="col-9">

                <div class="row">
                    <div class="nx-lottie-show-search-result">
                        <!-- show ajax search result here -->
                    </div>
                </div>

                <div class="row">
                    <?php foreach( $get_product_cat_wise as $data ): ?>
                    <div class="col-3 mb-4">
                        <div class="card nx-lottie-product-card text-center">
                            <lottie-player src="<?php echo nx_lottie_json_folder_url() . $data['file'] ; ?>"  background="transparent"  speed="1"  style="width: 100%; height: 150px;"  loop autoplay></lottie-player>

                            <div class="card-body">
                                <h6 class="card-title mb-4"><?php _e( $data['name'], 'nx-lottie' ); ?></h6>
                                <div class="nx-lottie-ani-meta">
                                    <span class="price"><span class="currency">$</span><?php _e( $data['price'], 'nx-lottie' ); ?></span>
                                    <a href="#" class="card-link buy-btn">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
    include_once 'part/footer.php';
    get_footer();
