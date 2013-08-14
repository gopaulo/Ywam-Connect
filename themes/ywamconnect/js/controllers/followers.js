$ = jQuery;
$(document).ready(function(ev) {
	jQuery('.addfriend').on('click', function(ev) {
		var _this = this;
		var action = '';
		if ($(this).data('friend') == '0')
			action = 'friend';
		else action = 'unfriend';

		console.log('friend ',$(this).data('friend'),action);

		$.ajax({
			url: $wpapi + action,
			data: {
				uid: $(this).data('id')
			}
		}).done(function(res) {
			console.log('res',res)
			if (action == 'friend') {
				$(_this).data('friend', '1');
				$(_this).attr('title','Unfriend');
				$(_this).attr('data-original-title', 'Unfriend');

			} else {
				$(_this).data('friend', '0');
				$(_this).attr('data-original-title', 'Add as Friend');

			}

			$(_this).find('img').fadeOut('slow', function() {
				$(_this).find('img').attr('src', res.img);
				$(_this).find('img').fadeIn();
			});


		});
		ev.stopPropagation();
		ev.preventDefault();
		return false;
	});

});