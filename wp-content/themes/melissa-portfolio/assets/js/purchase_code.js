(function($) {
    "use strict";
    $( document ).ready( function () { 
    		$("body").on("click",".melissa-button-active",function(e){
				e.preventDefault();
				var _this = $(this);
				var _input = _this.prev().val();
				_this.text('Checking ...');
				var data = {
					'action': 'melissa_check_purchase_code',
					'code': _input,
				};
				jQuery.post(ajaxurl, data, function(response) {
					_this.text('Active');
					if(response == 'false') {
						alert('false');
					} else if(response == 'valid') {
						alert('Active successfully, thank you for purchasing the premium version.');
					}
				});
    		});
    })
})(jQuery);