$ = jQuery;
$(document).ready(function(ev) {

	$('input#headingvideo').on('keydown keyup', function(ev) {
		var valor = $(this).data('original');
		if ($(this).val().length != 0) valor = $(this).val();
		$('#addvideomodal').find('.modal-title').html(valor);


	});


	$('#deletevideobtn').on('click', function(ev) {
		var id = $('#deletevideo').data('id');
		$.ajax({
			type: "POST",
			url: $wpapi + 'deleteObject',
			data: {
				type: 'video',
				id: id
			}
		}).done(function(res) {
			//console.log('res', res);
			window.location.reload();
		});
	});

	$('#nodeletevideo').on('click', function(ev) {
		$('#viewvideomodal').modal('show');
	});
	$('#deletevideo').on('click', function(ev) {
		var id = $(this).data('id');
		console.log('here ', id);
		$('#viewvideomodal').modal('hide');
		$('#videonamedelete').html($('#viewvideomodal').find('.modal-title').html());
		$('#deletevideomodal').modal('show');

		return false;

	});



	$('#editvideobtn').on('click', function(ev) {
		var params = $('#editvideoform').formParams();
		if (params.headingvideo == '' || params.videolink == '') {
			//error -> empty video
		} else {
			console.log('params', params);
			$.ajax({
				type: "POST",
				url: $wpapi + 'editVideo',
				data: params
			}).done(function(res) {
				//console.log('res', res);
				window.location.reload();
			});
		}
	})


	$('#addvideobtn').on('click', function(ev) {
		var params = $('#addvideoform').formParams();
		params.bid = $('#masterbase').val();
		if (params.headingvideo == '' || params.videolink == '') {
			//error -> empty video
		} else {
			console.log('params', params);
			$.ajax({
				type: "POST",
				url: $wpapi + 'saveEditVideo',
				data: params
			}).done(function(res) {
				window.location.reload();
			});
		}
	})

	$('input#videolink').on('blur', function(ev) {
		if ($(this).val().length > 8) {
			var width = $('div.previewevent').width(),
				height = $('div.previewevent').height();
			var obj = {
				url: $(this).val(),
				width: width,
				height: height
			};
			$.ajax({
				type: "POST",
				url: $wpapi + 'oEmbedYC',
				type: 'post',
				data: obj
			}).done(function(res) {
				console.log('res', res);
				$('div.previewevent').html(res.url);
			})
		}
	});

	$('#editvideo').on('click', function(ev) {
		var _this = this;
		$('#editvideomodal').find('#videoframe').html('');
		$('#editvideomodal').find('#videoframe').hide();
		var id = $(this).data('id');

		$.ajax({
			type: "POST",
			url: $wpapi + 'loadObject',
			data: {
				type: 'video',
				id: $(this).data('id')
			}
		}).done(function(res) {
			console.log('loaded', res);
			$('#editvideomodal').find('.modal-title').html(res.post_title);
			$('#editvideomodal').find('#headingvideo').val(res.post_title);
			$('#editvideomodal').find('#description').val(res.post_content);
			$('#editvideomodal').find('#bid').val(res.bid);
			$('#editvideomodal').find('#uid').val(res.ownerid);
			$('#editvideomodal').find('#videolink').val(res.video_link);
			$('#editvideomodal').find('.previewevent').html(res.embed.url);
			$('#editvideomodal').find('#id').val(res.ID);


			$('#editvideomodal').find('#category').val(res.category);


			$('#editvideomodal').modal('show');
		});
		return false;
	});

	$('.viewvideo').on('click', function(ev) {
		var _this = this;
		$('#videoframe').html('');
		$('#videoframe').hide();
		var id = $(this).data('id');

		$.ajax({
			type: "POST",
			url: $wpapi + 'loadObject',
			data: {
				type: 'video',
				id: $(this).data('id')
			}
		}).done(function(res) {
			console.log('loaded', res);

			var el = document.getElementById('facebook-jssdk');
			$('#viewvideomodal').find('.fbplace').html(res.fb)
			if (!el) loadSDK();

			$('#viewvideomodal').find('.modal-title').html(res.post_title);
			$('#viewvideomodal').find('#description').html('Description: ' + res.post_content);
			$('#viewvideomodal').find('#base').html('YWAM Base: <a href="/base/' + res.basename + '">' + res.base + '</a>');
			$('#viewvideomodal').find('#from').html('From: <a href="' + res.video_link + '">' + res.video_link + '</a>');
			$('#viewvideomodal').find('#videourl').val(res.video_link);

			if (res.owner) {
				$('#viewvideomodal').find('#deletevideo').data('id', res.ID);
				$('#viewvideomodal').find('#editvideo').data('id', res.ID);

				$('#viewvideomodal').find('#deletevideo').show();
				$('#viewvideomodal').find('#editvideo').show();

			} else {

				$('#viewvideomodal').find('#deletevideo').hide();
				$('#viewvideomodal').find('#editvideo').hide();
			}

			$('#viewvideomodal').modal('show');
		});
		return false;
	});

	$('#viewvideomodal').on('shown.bs.modal', function(e) {
		$('#videoframe').hide();
		$('#videoframe').height($('#videoframe').closest('.modal-body').width() * 38);
		var url = $('#viewvideomodal').find('#videourl').val(),
			width = $('#videoframe').width(),
			height = $('#videoframe').height();

		var obj = {
			url: url,
			width: width,
			height: height
		};
		$.ajax({
			url: $wpapi + 'oEmbedYC',
			type: 'post',
			data: obj
		}).done(function(res) {

			$('#videoframe').html(res.url);
		})
		$('#videoframe').slideDown();

	});

});