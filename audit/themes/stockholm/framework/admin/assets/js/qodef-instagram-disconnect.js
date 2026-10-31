(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefInstagramDisconnect();
	});
	
	function qodefInstagramDisconnect() {
		var holder = $('#qodef-instagram-disconnect-button');
		
		if (holder.length) {
			holder.on('click', function (e) {
				e.preventDefault();
				
				var currentPageUrl = $('input[data-name="current-page-url"]').val();
				
				//@TODO get this from data attr
				$(this).text('Working...');
				
				var data = {
					action: 'stockholm_qode_action_instagram_disconnect',
					currentPageUrl: currentPageUrl,
					stockholm_qode_disconnect_from_instagram: $('input[name="stockholm_qode_disconnect_from_instagram"]').val()
				};
				
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: data,
					dataType: 'json',
					success: function (response) {
						if (typeof response.status !== 'undefined' && response.status) {
							if (typeof response.redirectURL !== 'undefined' && response.redirectURL !== '') {
								window.location = response.redirectURL;
							}
						} else {
							alert(response.message);
						}
					}
				});
			});
		}
	}
})(jQuery);
