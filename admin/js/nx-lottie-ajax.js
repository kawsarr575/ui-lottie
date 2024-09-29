(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
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

    // Insert new animation product
    $(document).on('submit', 'form', function(e){

        e.preventDefault();

        $('.nx-submit-btn').text('Please Wait ...');
        $('.nx-submit-btn').attr('disabled');

        var postDate = $(this).serialize() + "&action=nx_lottie_insert_new_product";
        $.post(nx_lottie_admin_ajax_url, postDate, function(response) {
            console.log(response);
            location.reload();
        });
        return false;
    });

    // Show product on modal for updating
    $(document).on('click', 'a.nx-lottie-edit-icon', function(){

        var dataId = $(this).attr('data-id');

        // $.ajax({
        //     url : nx_lottie_admin_ajax_url,
        //     method :"POST",
        //     data :{
        //         action  : 'nx_lottie_show_product_data_on_modal',
        //         dataid  : dataId
        //     },
        //     success:function(data){
        //         $('.nx-update-product .modal-body').html(data);
        //         $('.nx-update-product').modal('show');
        //     }
        // });
        var postDate = "action=nx_lottie_show_product_data_on_modal&dataid=" + dataId;
        $.post(nx_lottie_admin_ajax_url, postDate, function(response) {

            $('.nx-update-product .modal-body').html(response);
            $('.nx-update-product').modal('show');
            
        });

    });


   // trush lottie product
   $('.nx-lottie-delete-icon.product').on('click', function() {
        var con = confirm('Are you sure want to delete?');
        if (con) {
            var dataId = $(this).attr('data-id');
            var postDate = "action=nx_lottie_trash_product&id=" + dataId;
            $.post(nx_lottie_ajax_url, postDate, function(response) {

            });
            var tr = $(this).closest("tr");
            tr.css("background-color", "#FF3700");
            tr.fadeOut(1000, function() {
                tr.remove();
            });
        }
        return false;
    });
    
    // Delete category
   $('.nx-lottie-delete-icon.delete-cat').on('click', function() {
        var con = confirm('Are you sure want to delete?');
        if (con) {
            var dataId = $(this).attr('data-id');
            var postDate = "action=nx_lottie_delete_category&id=" + dataId;
            $.post(nx_lottie_ajax_url, postDate, function(response) {

            });
            var tr = $(this).closest("tr");
            tr.css("background-color", "#FF3700");
            tr.fadeOut(1000, function() {
                tr.remove();
            });
        }
        return false;
    });


})( jQuery );
