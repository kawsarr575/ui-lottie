<?php
    /* Template Name: Cart */

    get_header();

    include_once 'part/header.php';
?>

<div class="nx-lottie-body">
    
    <div class="nx-lottie-inner-page-hero">
        <div class="container-fluid">
            <div class="row">
                <h4 class="text-center nx-lottie-page-title">Cart</h4>
                <a href="<?php echo site_url() . '/lottie-home'; ?>" class="nx-lottie-back-to-link">Go to Home</a>
            </div>
        </div>
    </div>

    <div class="container mb-4 nx-cart-page">
        <div class="row nx-lottie-after-hero-area">
            <div class="col-md-8">
                <?php
                $get_cart_product = $controller->get_cart_product();

                if( count($get_cart_product) > 0){
                    foreach( $get_cart_product as $data ):
                    
                ?>
                    <div class="card w-100 mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="javascript:void(0)" class="nx-lottie-view-on-popup" data-id="<?php echo $data->id; ?>">
                                    <lottie-player src="<?php echo nx_lottie_json_folder_url() . $data->file; ?>" background="transparent"  speed="1"  style="width: 120px; height: 120px;"  loop autoplay></lottie-player>
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h6><?php _e( $data->name, 'nx-lottie' ); ?></h6>
                                </div>
                                <div class="col-md-4">
                                    <h6>Price : <span class="price-<?php _e( $data->cart_id,'nx-lottie') ?>"><?php _e( $data->price,'nx-lottie') ?></span></h6>
                                </div>
                            </div>
                            <i data-id="<?php _e( $data->cart_id,'nx-lottie') ?>" class="ri-close-line remove-item-from-cart"></i>
                        </div>
                    </div>

                    <?php 
                        endforeach;
                    }else{
                    ?>
                    
                    <div class="card w-100">
                        <div class="card-body">
                            <h5>Your cart is empty</h5>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item mb-2 d-flex justify-content-between align-items-center">
                        Total Product
                        <span class="rounded-pill count-total-product"><?php echo nx_lottie_count_cart_pro(); ?></span>
                    </li>
                    <!-- <li class="list-group-item mb-2 d-flex justify-content-between align-items-center">
                        Subtotal
                        <span class="rounded-pil"> <span class="currency">$</span>20</span>
                    </li> -->
                    <li class="list-group-item mb-2 d-flex justify-content-between align-items-center">
                        Total Amount
                        <span class="rounded-pill"><span class="currency">$</span><span class="total-amount"><?php echo nx_lottie_calculate_total_amount(); ?></span> </span>
                    </li>
                    
                    <li class="list-group-item">
                        <div class="alert alert-primary mb-0" role="alert">
                            <h6>Select Payment Method</h6>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input" checked type="radio" name="nx_payment_method" id="nx_paypal">
                        <label class="form-check-label" for="nx_paypal">
                            Paypal (Pay through Paypal)
                        </label>
                    </li>
                    <li class="list-group-item">
                        <input class="form-check-input" type="radio" name="nx_payment_method" id="nx_stripe">
                        <label class="form-check-label" for="nx_stripe">
                            Stipe (Pay through Card)
                        </label>
                    </li>
                    
                    
                    <li class="list-group-item">
                        <button class="ptc-btn"> <img src="<?php echo nx_lottie_common_img_url() . 'send-icon.svg';?>" alt=""> Process to checkout</button>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
    
</div>

<?php

    include_once 'modal/show-single-product.php';
    include_once 'part/footer.php';
    get_footer();
