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


	$('#deleteministrybtn').on('click', function(ev) {
		var id = $('#deleteministry').data('id');
		$.ajax({
			type: "POST",
			url: $wpapi + 'deleteObject',
			data: {
				type: 'ministry',
				id: id
			}
		}).done(function(res) {
			//console.log('res', res);
			window.location.reload();
		});
	});

	$('#nodeleteministry').on('click', function(ev) {
		$('#viewministrymodal').modal('show');
	});
	$('#deleteministry').on('click', function(ev) {
		var id = $(this).data('id');
		console.log('here ', id);
		$('#viewministrymodal').modal('hide');
		$('#ministrynamedelete').html($('#viewministrymodal').find('.modal-title').html());
		$('#deleteministrymodal').modal('show');

		return false;

	});



	$('#editministry').on('click', function(ev) {
		var _this = this;
		$('#editministry').find('#ministryVideo').html('');

		var id = $(this).data('id');

		$.ajax({
			type: "POST",
			url: $wpapi + 'loadObject',
			data: {
				type: 'ministry',
				id: $(this).data('id')
			}
		}).done(function(res) {
			console.log('loaded', res);
			$('#editministrymodal').find('.modal-title').html(res.post_title);
			$('#editministrymodal').find('#headingministry').val(res.post_title);
			$('#editministrymodal').find('img.previewevent').attr('src', res.image);

			$('#editministrymodal').find('#email').val(res.email);
			$('#editministrymodal').find('#date').val(res.date);
			$('#editministrymodal').find('#description').val(res.post_content);
			$('#editministrymodal').find('#website').val(res.website);

			$('#editministrymodal').find('#facebook').val(res.facebook);
			$('#editministrymodal').find('#twitter').val(res.twitter);
			$('#editministrymodal').find('#videolink').val(res.raw_link);
			$('#editministrymodal').find('#phone').val(res.phone);
			$('#editministrymodal').find('#postedby').val(res.username);
			$('#editministrymodal').find('#ministryvideo').val(res.video_link.url);

			var start = res.starting_date;
			start = start.split('/'); //m-d-Y
			$('#editministrymodal').find('#start_day').val(start[1].replace(/^0+/, ''));
			$('#editministrymodal').find('#start_month').val(start[0].replace(/^0+/, ''));
			$('#editministrymodal').find('#start_year').val(start[2]);

			$('#editministrymodal').find('#id').val(res.ID);

			$('#editministrymodal').find('#category').val(res.category);

			$('#editministrymodal').find('#uid').val(res.ownerid);
			$('#editministrymodal').find('#bid').val(res.bid);


			//$('#editministrymodal').find('#ministryVideo').html(res.video_link.url);


			$('#editministrymodal').modal('show');
		});
		return false;
	});



	$('.viewministry').on('click', function(ev) {
		var _this = this;
		$('#ministryVideo').html('');

		var id = $(this).data('id');

		$.ajax({
			type: "POST",
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


			var el = document.getElementById('facebook-jssdk');
			$('#viewministrymodal').find('.fbplace').html(res.fb)
			if (!el) loadSDK();

			$('#viewministrymodal').find('#number').html(res.total);

			if (res.video_link.url == '') {
				$('#viewministrymodal').find('#videotitle').hide();
			} else {
				$('#viewministrymodal').find('#videotitle').show();
				$('#viewministrymodal').find('#ministryVideo').html(res.video_link.url);
			}
			$('#viewministrymodal').find('ul#peopleFollowing').html(res.following);

			if (res.owner) {
				$('#viewministrymodal').find('#deleteministry').data('id', res.ID);
				$('#viewministrymodal').find('#editministry').data('id', res.ID);

				$('#viewministrymodal').find('#deleteministry').show();
				$('#viewministrymodal').find('#editministry').show();

			} else {

				$('#viewministrymodal').find('#deleteministry').hide();
				$('#viewministrymodal').find('#editministry').hide();
			}

			$('[rel="tooltip"]').tooltip();
			$('#viewministrymodal').modal('show');
		});
		return false;
	});

	$('#editministrybtn').on('click', function(ev) {
		var params = $('#editministryform').formParams();
		console.log('params', params);
		$.ajax({
			type: "POST",
			url: $wpapi + 'editMinistry',
			data: params
		}).done(function(res) {
			console.log('add event res', res);
			if (params.image != '') {
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
			} else window.location.reload();
		});

	})


	$('#addministrybtn').on('click', function(ev) {
		var params = $('#addministryform').formParams();
		params.bid = $('#masterbase').val();
		console.log('params', params);
		$.ajax({
			type: "POST",
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
			type: "POST",
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