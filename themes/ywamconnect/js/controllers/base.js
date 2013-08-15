$ = jQuery;
$(document).ready(function(ev) {
	jQuery('.followbtn').on('click', function(ev) {
		var _this = this;
		var action = '';
		if ($(this).data('follow') == '1')
			action = 'followBase';
		else action = 'unfollowBase';

		$(this).fadeOut('slow');
		$.ajax({
			url: $wpapi + action,
			data: {
				bid: $(this).data('id')
			}
		}).done(function(res) {
			if (action == 'followBase') {
				$(_this).data('follow', '0');

				$(_this).removeClass('btn-info');
				$(_this).addClass('btn-default');

				$(_this).removeClass('follow');
				$(_this).addClass('unfollow');

				$(_this).find('i').removeClass('icon-heart');
				$(_this).find('i').addClass('icon-heart-empty');

				$(_this).find('span').html('Unfollow Base');
				//check if in followers page
				if($('#followerlist').length >0){
					//follower page
					var html = '<li class="singlefollower col-lg-6" data-id="'+res.uid+'">'; 
						html+='<div class="row">';
						   html+='<div class="col-lg-4">';
							html+='	<a href="'+res.userlink+'"><img src="'+res.useravatar+'"></a>';
						 html+=' </div>';
						   html+='<div class="col-lg-8 userdatacaption">';
						    html+='<a href="'+res.userlink+'" class="usernamecaption">'+res.username+'</a> ';
						   	  html+='<p class="locationusercaption"> Current Location:  </p>';
						   html+='</div>';
						html+='</li>';
						$('#followerlist').prepend(html);
				}
				
			} else {
				$(_this).data('follow', '1');

				$(_this).removeClass('btn-default');
				$(_this).addClass('btn-info');

				$(_this).removeClass('unfollow');
				$(_this).addClass('follow');

				$(_this).find('i').removeClass('icon-heart-empty');
				$(_this).find('i').addClass('icon-heart');

				$(_this).find('span').html('Follow Base');

				var rem = $('li.singlefollower[data-id="'+ res.uid+'"]');
				console.log('rem',rem);
				if(rem.length > 0) rem.fadeOut();
			}
			$(_this).fadeIn('slow');
		});
		ev.stopPropagation();
		ev.preventDefault();
		return false;
	});

});