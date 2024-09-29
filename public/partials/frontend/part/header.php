
<?php

    if(isset($_GET['cat'])){
        $cat_slug = $_GET['cat'];
    }
    if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
    }
    //echo get_current_user_id();
    $controller = new Nx_Lottie_Controller;
?>
<div class="nx-lottie-header">

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo site_url() . '/lottie-home'; ?>"><img src="<?php echo nx_lottie_common_img_url() . 'logo.png'; ?>" alt="logo"></a>
            <button class="navbar-toggler nx-lottie-navbar-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
              
                <!-- wishlist menu -->
                <li class="nav-item">
                    <?php if(is_user_logged_in()){ ?>
                    <a class="nav-link nx-lottie-wishlist-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".nx-wishlist-modal">
                        <span class="count nx-count-wishlist"><?php echo $count = nx_lottie_count_wishist_pro(); ?></span>
                        <img src="<?php echo nx_lottie_common_img_url() . 'love.svg'; ?>" alt="favorite icon">
                    </a>
                    <?php }else{ ?>
                    <a class="nav-link nx-lottie-wishlist-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".nx-lottie-signin-modal">
                        <span class="count">0</span>
                        <img src="<?php echo nx_lottie_common_img_url() . 'love.svg'; ?>" alt="favorite icon">
                    </a>
                    <?php } ?>
                </li>

                <!-- cart menu -->
                <li class="nav-item">
                    <?php if(is_user_logged_in()){ ?>
                    <a class="nav-link nx-lottie-cart-btn" href="<?php echo site_url() . '/lottie-home/lottie-cart'; ?>">
                        <span class="count nx-count-product-in-cart"><?php echo nx_lottie_count_cart_pro(); ?></span>
                        <!-- <span class="ccc">10</span> -->
                        <img src="<?php echo nx_lottie_common_img_url() . 'cart.svg'; ?>" alt="favorite icon">
                    </a>
                    <?php }else{ ?>
                    <a class="nav-link nx-lottie-cart-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target=".nx-lottie-signin-modal" >
                        <span class="count">0</span>
                        <img src="<?php echo nx_lottie_common_img_url() . 'cart.svg'; ?>" alt="favorite icon">
                    </a>
                    <?php } ?>
                </li>
                <!-- End cart menu -->

                <?php if(is_user_logged_in()): ?>
                <li class="nav-item dropdown nx-lottie-user-btn">
                    <img src="<?php echo nx_lottie_common_img_url() . 'user.svg'; ?>" alt="user icon">
                    <a href="javascrip:void(0)" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="myprofile"><a class="dropdown-item" href="#"><i class="ri-user-line"></i> My Profile</a></li>
                        <li class="mycollection"><a class="dropdown-item" href="#"><i class="ri-dashboard-line"></i> My Collection</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="logout"><a class="dropdown-item" href="<?php echo wp_logout_url( get_home_url() ); ?>" title="Logout"><i class="ri-logout-box-r-line"></i> Logout</a></li>
                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item nx-lottie-login-btn" data-bs-toggle="modal" data-bs-target=".nx-lottie-signin-modal">
                    <a class="nav-link" href="javascript:void(0)">Sign in</a>
                </li>
                <li class="nav-item nx-lottie-signup-btn" data-bs-toggle="modal" data-bs-target=".nx-lottie-signup-modal">
                    <a href="javascrip:void(0)">Sign Up</a>
                </li>
                <?php endif; ?>

                

                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> -->
               
            </ul>
            
            </div>
        </div>
    </nav>

</div>

<?php

    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'modal/show-single-product.php';
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'modal/login.php';
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'modal/signup.php';
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'modal/wishlist.php';