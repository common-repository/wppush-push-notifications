(function($) {
	if (!$) {
		return;
	}
	var notShow = 0;
	jQuery(document).ready(function() {


		/* Scripts */

		// Add Color Picker 
		
		var i = "";


		/* Scripts */
		// toastr settings
/*
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		};
*/
		//

		jQuery('#b-bell').click(function() {
			showNotipan();
		});
		jQuery('#b-hide-noti-pan').click(function() {
			hideNotipan();
		});

		jQuery('#notitabs .tab-item').click(function(e) {
			var id = $(this).data('target-id');
			showNotiTab(id);
		});

		jQuery('.noti-list .noti-item .b-noti-item-hide').click(function(e) {
			hideNotiItem(e);
		});

		jQuery('#b-noti-clear-all').click(function(e) {
			clearNotItems(e);
		});

		
		showNotiTab($('#notitabs .tab-item').first().data('target-id'));

	});




	jQuery(document).mouseup(function(e) {
		var container = $("#notipan");

		if (!container.is(e.target) && container.has(e.target).length === 0 && notShow === 0) {
			jQuery('#notipan').removeClass('noti-visible');
		}
	});


})(jQuery);



function showNotipan() {
	jQuery('#notipan').addClass('noti-visible');
	notShow = 1;
}

function hideNotipan() {
	jQuery('#notipan').removeClass('noti-visible');
	notShow = 0;
}

function hideNotiItem(e) {
	var b = e.target;
	b.closest('.noti-item').remove();
}

function clearNotItems(e) {
	jQuery('#notipan .noti-item').remove();
	jQuery('.b-clear-all-noti').hide();
}


function showNotiTab(id) {
	// tabs
	jQuery('#notitabs .tab-item[data-target-id!=' + id + ']').removeClass('current');
	jQuery('#notitabs .tab-item[data-target-id=' + id + ']').addClass('current');
	// content
	jQuery('#notipan .noti-tab-content').hide();
	jQuery('.noti-tab-content#' + id).show();
}