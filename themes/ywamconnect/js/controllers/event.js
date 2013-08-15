$ = jQuery;
$(document).ready(function(ev) {

	$('input#headingevent').on('keydown keyup', function(ev) {
		var valor = $(this).data('original');
		if ($(this).val().length != 0) valor = $(this).val();
		$('#addeventmodal').find('.modal-title').html(valor);


	});
	$('#bannerevent').on('change', function(ev) {
		var name = $(this).val();
		var index = name.lastIndexOf('\\');
		name = name.substring(index+1,name.length);
		$('input.triggerfile').val(name)
	});

	$('.triggerfile').on('click', function(ev) {

		var trig = $(this).data('trigger');
		console.log('trigger', trig);
		$('#' + trig).trigger('click');
	});
	$('#addeventbtn').on('click', function(ev) {
		var params = $('#addeventform').formParams();
		console.log('params', params);
		$.ajax({
			url: $wpapi + 'saveEditEvent',
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
				fileElementId: 'bannerevent',
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


	$('.viewvideo').on('click', function(ev) {
		var _this = this;
		$('#videoframe').html('');
		$('#videoframe').hide();
		var id = $(this).data('id');

		$.ajax({
			url: $wpapi + 'loadObject',
			data: {
				type: 'video',
				id: $(this).data('id')
			}
		}).done(function(res) {
			console.log('loaded', res);
			$('#viewvideomodal').find('.modal-title').html(res.post_title);
			$('#viewvideomodal').find('#description').html('Description: ' + res.post_content);
			$('#viewvideomodal').find('#base').html('YWAM Base: <a href="/base/' + res.basename + '">' + res.base + '</a>');
			$('#viewvideomodal').find('#from').html('From: <a href="' + res.video_link + '">' + res.video_link + '</a>');
			$('#viewvideomodal').find('#videourl').val(res.video_link);
			$('#viewvideomodal').modal('show');
		});
		return false;
	});



});