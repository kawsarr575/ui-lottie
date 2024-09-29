(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

    // show, search, filter =========================
    $(document).ready(function(){

        filter_data();
    
        function filter_data(search = '')
        {
            $('.nx-lottie-product-card').html('<div class="nx-lottie-loading"></div>');
           
            // var minimum_price = $('#hidden_minimum_price').val();
            // var maximum_price = $('#hidden_maximum_price').val();
            var cat_id = get_filter('cat_id');
            var type = get_filter('type'); // Type free and premium
            var storage = get_filter('storage');
            $.ajax({
                url : nx_lottie_public_ajax_url.ajaxurl,
                method :"POST",
                data :{
                    action  : 'nx_filter_show_search',
                    cat_id  : cat_id,
                    type    : type,
                    search  : search
                },

                success:function(data){
                    $('.nx-lottie-show-search-result').html(data);
                }
            });
        }
    
        function get_filter(class_name)
        {
            var filter = [];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }
    
        $('.common_selector').click(function(){
            filter_data();
        });

        $('#nx_lottie_search_box').keyup(function(){
            var search = $('#nx_lottie_search_box').val();
            filter_data(search);
        });
    
    });
     // End show, search, filter =========================
   
    

    //Lottie animation show on popup ======================================
    $(document).on('click','a.nx-lottie-view-on-popup', function(){
        var dataid = $(this).attr('data-id');
        $.ajax({
            url : nx_lottie_public_ajax_url.ajaxurl,
            method :"POST",
            data :{
                action  : 'nx_lottie_show_on_popup',
                dataid  : dataid
            },
            success:function(data){
                $('.nx-modal .modal-body').html(data);
                $('.nx-modal').modal('show');
            }
        });
    });
    //End Lottie animation show on popup ===============================

    // Add to cart ================================================
    $(document).on('click', 'a.nx-add-to-cart', function(e){
        e.preventDefault();
        var dataid = $(this).attr('data-id');

        var tt = bootstrap.Tooltip.getInstance(this);
            tt.dispose();
            this.setAttribute('title', 'Added to cart')
            tt = bootstrap.Tooltip.getOrCreateInstance(this);
            tt.show();
            $(this).html('<i class="ri-eye-line"></i>');
            $(this).addClass('nx-view-cart');
            $(this).removeClass('nx-add-to-cart');
            var url = site_url + '/lottie-cart';
            $(this).attr("href", url);
            

        $.ajax({
            url : nx_lottie_public_ajax_url.ajaxurl,
            method :"POST",
            data :{
                action  : 'nx_lottie_add_to_cart',
                dataid  : dataid
            },
            success:function(data){
                
            }
        });

        // add 1 every click with existing total cart product 
        var current_num = parseFloat($('.nx-count-product-in-cart').text());
        $('.nx-count-product-in-cart').text(++current_num);
    })
    // End add to cart ==========================================

    // Add to cart from wishlist modal ================================================
    $(document).on('click', '.nx-wishlist-on-modal a.add-to-cart', function(e){
        e.preventDefault();
        var dataid = $(this).attr('data-id');

        $(this).text('View Cart');
        $(this).removeClass('add-to-cart');
        $('a.nx-add-to-cart').addClass('nx-view-cart');
        $('a.nx-add-to-cart').removeClass('nx-add-to-cart');
        var url = site_url + '/lottie-cart/';
        $('a.nx-add-to-cart').attr("href", url);
        $(this).attr("href", url);
            

        $.ajax({
            url : nx_lottie_public_ajax_url.ajaxurl,
            method :"POST",
            data :{
                action  : 'nx_lottie_add_to_cart',
                dataid  : dataid
            },
            success:function(data){
                
            }
        });

        // add 1 every click with existing total cart product 
        var current_num = parseFloat($('.nx-count-product-in-cart').text());
        $('.nx-count-product-in-cart').text(++current_num);
    })
    // Add to cart from wishlist modal ==========================================
 

    // Remove item from cart page ===============================
    $(document).on('click', '.nx-cart-page i.remove-item-from-cart', function(e){
        e.preventDefault();
        var con = confirm('Are you sure want to remove from cart?');
        if (con) {

            var dataid = $(this).attr('data-id');
            // Remove 1 every click from existing total cart
            var current_num_cart = parseInt($('.nx-cart-page .count-total-product').text());
            $('.nx-cart-page .count-total-product').text(--current_num_cart);
            
            // remove from header cart menu
            var current_num_header = parseInt($('.nx-count-product-in-cart').text());
            $('.nx-count-product-in-cart').text(--current_num_header);

            // Remove from total amount
            var total_amount = parseInt($('.nx-cart-page .total-amount').text());
            var single_amount = parseInt($('.price-' + dataid).text());
            var current_amount = (total_amount) - (single_amount);
            $('.nx-cart-page .total-amount').text(current_amount);

            $.ajax({
                url : nx_lottie_public_ajax_url.ajaxurl,
                method :"POST",
                data :{
                    action  : 'nx_lottie_remove_item_from_cart',
                    dataid  : dataid
                },
                success:function(data){}
            });

            var card = $(this).closest(".card");
            card.css("background-color", "#FF3700");
            card.fadeOut(1000, function() {
                card.remove();
            });
        }
    })
    // End Remove item from cart page ===============================

    // Add to Wishlist ================================================
    
    $(document).on('click', 'a.nx-wishlist', function(){

        var dataid = $(this).attr('data-id');

        var tt = bootstrap.Tooltip.getInstance(this);
            tt.dispose();
            this.setAttribute('title', 'Remove from wishlist')
            tt = bootstrap.Tooltip.getOrCreateInstance(this);
            tt.show();
        $(this).html('<i class="ri-heart-fill"></i>');
        $(this).addClass('nx-remove-wishlist');

        $.ajax({
            url : nx_lottie_ajax_url,
            method :"POST",
            data :{
                action  : 'nx_lottie_add_to_wishlist',
                dataid  : dataid
            },
            success:function(data){}
        });

        // add 1 every click with existing total wishlist 
        var current_num = parseFloat($('.nx-count-wishlist').text());
        $('.nx-count-wishlist').text(++current_num);
    })

    // End add to wishlist ==========================================


    // Show all Wishlist on modal ================================================
    $(document).on('click', 'a.nx-lottie-wishlist-btn', function(){

        $.ajax({
            url : nx_lottie_public_ajax_url.ajaxurl,
            method :"POST",
            data :{
                action  : 'nx_lottie_show_wishlist_on_modal',
            },
            success:function(data){
                $('.nx-wishlist-modal .modal-body').html(data);
                $('.nx-wishlist-modal').modal('show');
            }
        });
        //$('#download')[0].click();

    })

    $(document).ready(function(){
        $('a#download').on('click', function(e){
            e.preventDefault();

            return false;
        })
    })

    // End Show all Wishlist on modal ==========================================


    // Remove wishlist from product cart ================================================
    
    $(document).on('click', '.nx-remove-wishlist', function(){

        // Remove 1 every click with existing total wishlist 
        var current_num = parseInt($('.nx-count-wishlist').text());
        var add_one = parseInt(1);
        var sub = (current_num) - (add_one);
        $('.nx-count-wishlist').text(--sub);

        var dataid = $(this).attr('data-id');

        var tt = bootstrap.Tooltip.getInstance(this);
            tt.dispose();
            this.setAttribute('title', 'Add to wishlist')
            tt = bootstrap.Tooltip.getOrCreateInstance(this);
            tt.show();
        $(this).html('<i class="ri-heart-line"></i>');
        $(this).removeClass('nx-remove-wishlist');

        $.ajax({
            url : nx_lottie_public_ajax_url.ajaxurl,
            method :"POST",
            data :{
                action  : 'nx_lottie_remove_from_wishlist',
                dataid  : dataid
            },
            success:function(data){}
        });

        
    })
    // End Remove wishlist from product cart ==========================================

    // Remove wishlist form modal ================================================
    
   $(document).on('click', '.remove-wishlist-from-modal', function(){

        // Remove 1 every click with existing total wishlist 
        var current_num = parseInt($('.nx-count-wishlist').text());
        $('.nx-count-wishlist').text(--current_num);

        var dataid = $(this).attr('data-id');

        $('.nx-lottie-product-card a.nx-wishlist').html('<i class="ri-heart-line"></i>');
        $('.nx-lottie-product-card a.nx-wishlist').removeClass('nx-remove-wishlist');

        $.ajax({
            url : nx_lottie_public_ajax_url.ajaxurl,
            method :"POST",
            data :{
                action  : 'nx_lottie_remove_from_wishlist',
                dataid  : dataid
            },
            success:function(data){}
        });

        var card = $(this).closest(".card");
            card.css("background-color", "#FF3700");
            card.fadeOut(1000, function() {
                card.remove();
            });
    })
   
    // End Remove wishlist form modal ==========================================

    // User or customer sing up ===================================
    $(document).ready(function(){
        $('.nx-lottie-signup-form button').on('click', function(e){
            e.preventDefault();
            $('.nx-lottie-signup-form button').html('Please wait ...')
            var postDate = $('.nx-lottie-signup-form').serialize() + "&action=nx_lottie_user_signup";
            $.post(nx_lottie_public_ajax_url.ajaxurl, postDate, function(res) {
    
                var data = $.parseJSON(res);
                if (data.status == 1) {
                    $(".nx-success-msg").html( data.message );
                    $(".nx-error-msg").hide();
                    $(".nx-lottie-signup-form").hide();
    
                }else {
                    $(".nx-error-msg").html( data.message );
                    $('.nx-lottie-signup-form button').html('Sing Up');
                }
    
            });

        })
    })
    // End User or customer sing up =======================================

    // User or customer Login ===========================================
    $(document).ready(function(){
        $('.nx-lottie-signin-form button').on('click', function(e){
            e.preventDefault();
            $('.nx-lottie-signin-form button').html('Please wait ...')
            var postDate = $('.nx-lottie-signin-form').serialize() + "&action=nx_lottie_user_signin";
            $.post(nx_lottie_public_ajax_url.ajaxurl, postDate, function(res) {
    
                var data = $.parseJSON(res);
                if (data.status == 1) {
                    $(".nx-success-msg").html( data.message );
                    $(".nx-error-msg").hide();
                    location.reload();
    
                }else {
                    $(".nx-error-msg").html( data.message );
                    $('.nx-lottie-signin-form button').html('Sing In');
                }
    
            });

        })
    })
    // End User or custom Login==============================================
  


})( jQuery );
