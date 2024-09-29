<?php
    /* Template Name: Lottie Home */

    //echo $user_id = get_current_user_id();
    get_header();

    
    include_once 'part/header.php';
    
?>

<div class="nx-lottie-body">
    

    <div class="nx-lottie-hero-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="nx-lottie-home-search">
                        <input type="text"   class="form-control nx-lottie-search-box" placeholder="Searching Lottie..." aria-label="Text input with dropdown button">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-4">
        <div class="row nx-lottie-after-hero-area">
            <div class="col-md-3">
                <div class="nx-lottie-sidebar">
                    <?php include_once 'part/sidebar.php';?>
                </div>
            </div>
            <div class="col-md-9 nx-lottie-product-area">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <ul class="list-group p-0 nx-box-shadow">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0">
                                <h5 class="nx-count-show"></h5>
                                <input type="text" id="nx_lottie_search_box" name="nx_lottie_search" class="form-control border form-control-sm nx-lottie-search-box" placeholder="Searching Lottie...">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="nx-lottie-show-search-result">
                    <!-- Show data by ajax -->
                </div>
            </div>
        </div>
    </div>
    
</div>

<?php

    include_once 'part/footer.php';
    get_footer();
