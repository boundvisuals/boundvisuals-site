(function ($) {
	"use strict";
	
	$(document).ready(function () {
		qodefTwitterRequestToken();
	});
	
	function qodefTwitterRequestToken() {
		var holder = $('#qodef-tw-request-token-btn');
		
		if (holder.length) {
			holder.on('click', function (e) {
				e.preventDefault();
				
				var that = $(this);
				var currentPageUrl = $('input[data-name="current-page-url"]').val();
				
				//@TODO get this from data attr
				$(this).text('Working...');
				
				var data = {
					action: 'stockholm_qode_action_twitter_obtain_request_token',
					currentPageUrl: currentPageUrl,
					stockholm_qode_twitter_connect: $('input[name="stockholm_qode_twitter_connect"]').val()
				};
				
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: data,
					dataType: 'json',
					success: function (response) {
						if (typeof response.status !== 'undefined' && response.status) {
							$(that).text('Redirect to Twitter...');
							
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
