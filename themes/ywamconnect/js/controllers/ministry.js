$ = jQuery;
$(document).ready(function(ev) {

	$('input#headingministry').on('keydown keyup', function(ev) {
		var valor = $(this).data('original');
		if ($(this).val().length != 0) valor = $(this).val();
		$('#addministrymodal').find('.modal-title').html(valor);


	});

	$('#bannerministry').on('change', function(ev) {
		var name = $(this).val();
		var index = name.lastIndexOf('\\');
		name = name.substring(index + 1, name.length);
		$('input.triggerfileministry').val(name)
	});

	$('.triggerfileministry').on('click', function(ev) {

		var trig = $(this).data('trigger');
		$('#' + trig).trigger('click');
	});



	$('.viewministry').on('click', function(ev) {
		var _this = this;
		$('#ministryVideo').html('');

		var id = $(this).data('id');

		$.ajax({
			url: $wpapi + 'loadObject',
			data: {
				type: 'ministry',
				id: $(this).data('id')
			}
		}).done(function(res) {
			console.log('loaded', res);
			$('#viewministrymodal').find('.modal-title').html(res.post_title);
			$('#viewministrymodal').find('#email').html(res.email);
			$('#viewministrymodal').find('#date').html(res.date);
			$('#viewministrymodal').find('#description').html(res.post_content);
			$('#viewministrymodal').find('#website').html(res.website);
			$('#viewministrymodal').find('#phone').html(res.phone);
			$('#viewministrymodal').find('#postedby').html(' <a href="' + res.userlink + '">' + res.username + '</a>');
			$('#viewministrymodal').find('#imageministry').html('<img src="' + res.image + '" style="width:100%">');
			$('#viewministrymodal').find('#ministryvideo').html(res.video_link.url);

			$('#viewministrymodal').find('#number').html(res.total);

			if (res.video_link.url == '') {
				$('#viewministrymodal').find('#videotitle').hide();
			} else{
				$('#viewministrymodal').find('#videotitle').show();
				$('#viewministrymodal').find('#ministryVideo').html(res.video_link.url);
			}
			$('#viewministrymodal').find('ul#peopleFollowing').html(res.following);
			$('#viewministrymodal').modal('show');
		});
		return false;
	});


	$('#addministrybtn').on('click', function(ev) {
		var params = $('#addministryform').formParams();
		console.log('params', params);
		$.ajax({
			url: $wpapi + 'saveEditMinistry',
			data: params
		}).done(function(res) {
			console.log('add event res', res);
			$.ajaxFileUpload({
				url: $wpapi + 'uploadBanner',
				secureuri: false,
				data: {
					eid: res.eid
				},
				dataType: 'json',
				fileElementId: 'bannerministry',
				success: function(data, status) {
					//console.log('data', data, status);
				},
				error: function(data, status, e) {
					//console.log('error', data, status, e);
					window.location.reload();
				}
			});
		});

	})

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