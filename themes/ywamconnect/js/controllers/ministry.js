$ = jQuery;
$(document).ready(function(ev) {
	jQuery('.followministry').on('click', function(ev) {
		var _this = this;
		var action = '';
		if ($(this).data('follow') == '1')
			action = 'followMinistry';
		else action = 'unfollowMinistry';

		$(this).fadeOut('slow');
		$.ajax({
			url: $wpapi + action,
			data: {
				mid: $(this).data('id')
			}
		}).done(function(res) {
			if (action == 'followMinistry') {
				$(_this).data('follow', '0');

				$(_this).removeClass('btn-info');
				$(_this).addClass('btn-default');

				$(_this).removeClass('follow');
				$(_this).addClass('unfollow');

				$(_this).find('i').removeClass('icon-heart');
				$(_this).find('i').addClass('icon-heart-empty');

				$(_this).find('span').html('Unfollow ' + $(_this).data('name'));
			} else {
				$(_this).data('follow', '1');

				$(_this).removeClass('btn-default');
				$(_this).addClass('btn-info');

				$(_this).removeClass('unfollow');
				$(_this).addClass('follow');

				$(_this).find('i').removeClass('icon-heart-empty');
				$(_this).find('i').addClass('icon-heart');

				$(_this).find('span').html('Follow ' + $(_this).data('name'));
			}
			$(_this).fadeIn('slow');
		});
		ev.stopPropagation();
		ev.preventDefault();
		return false;
	});

});