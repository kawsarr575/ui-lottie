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

	/**
	 * Data table
	 */
	 $(document).ready(function () {
		$('.nx-lottie-datatable').DataTable();
	});

	/**
	 * Select 2 input
	 */
	$(document).ready(function() {
		$('select.nx-lottie-select-two').select2({
			insertTag: function (data, tag) {
				// Insert the tag at the end of the results
				data.push(tag);
			},
			tags: true,
		
	  	})
	});

	/**
	 * Toottip
	 */
	$(document).ready(function() {
		$("body").tooltip({ selector: '[data-toggle=tooltip]' });
	});

	/* Animation gif file uploader function */
	$(document).ready(function(){
		$('.nx-lottie-gif-upload-btn').on('click', function() {
			var image = wp.media({
				title: "Upload Lottie Gif Animation",
				multiple: false,
				library: { type: "image/gif"}
			}).open().on("select", function() {
				var files = image.state().get("selection").first();
				var jsonFiles = files.toJSON();
				$('.nx-lottie-preview-gif').attr('src', jsonFiles.url);
				$('.nx-lottie-gif-link').val(jsonFiles.url);
			});
		}); 
	});

	/* Animation source and zip file uploader function */
	$(document).ready(function(){
		$('.nx-lottie-aep-file-upload-btn').on('click', function() {
			var image = wp.media({
				title: "Upload Lottie Gif Animation",
				multiple: false,
				library: { type: "application/zip"}
			}).open().on("select", function() {
				var files = image.state().get("selection").first();
				var jsonFiles = files.toJSON();
				$('.nx-lottie-aep-file-link').val(jsonFiles.url);
			});
		}); 
	});

	// Check animation type free or premium
	$(document).ready(function() {
		
		// if product type premium then remmove disabled attr from the price and file input filed
		$("input.anitypepremium").on( 'click', function(){
			$('.price-field').removeAttr('readonly');
			$('.ae-file-field button').removeAttr('disabled');
			$('.price-field, .ae-file-field input').attr('required',true);
			$('.price-field, .ae-file-field').removeAttr('title');
		});
		// if product type free then add disabled attr (price and file) input filed
		$("input.anitypefree").on( 'click', function(){
			$('.price-field').attr('readonly', true);
			$('.ae-file-field button').attr('disabled', true);
			$('.price-field, .ae-file-field input').removeAttr('required');
			$('.price-field, .ae-file-field').attr('title', 'Select premium type');
		});

	});



})( jQuery );
