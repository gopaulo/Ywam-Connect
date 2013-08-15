$ = jQuery;
$(document).ready(function(ev) {

	$('input#headingevent').on('keydown keyup', function(ev) {
		var valor = $(this).data('original');
		if ($(this).val().length != 0) valor = $(this).val();
		$('#addeventmodal').find('.modal-title').html(valor);


	});
	$('.unattend').on('click', function(ev) {
		var eid = $(this).data('id');
		console.log('attending event', eid);
		$.ajax({
			url: $wpapi + 'unAttendEvent',
			data: {
				eid: eid
			}
		}).done(function(res) {
			var nmb = $('#vieweventmodal').find('#number').html();
			$('#vieweventmodal').find('#number').html(nmb - 1);
			$('#attendbtn').fadeOut();
			$('#attendbtn').html('<a href="#" class="btn btn-small btn-success attend" data-action="attendEvent" data-id="' + eid + '"> Yes </a>');
			$('#attendbtn').fadeIn();
		});
	});

	$('.attend').on('click', function(ev) {
		var _this = this;
		var eid = $(this).data('id');
		var action = $(this).data('action');
		console.log('attending event', eid);
		$.ajax({
			url: $wpapi + action,
			data: {
				eid: eid
			}
		}).done(function(res) {
			$('#attendbtn').hide();
			var nmb = $('#vieweventmodal').find('#number').html();
			if (action == 'unAttendEvent') {
				nmb--;
				$(_this).data('action', 'attendEvent');
				$(_this).removeClass('btn-danger');
				$(_this).addClass('btn-success');
				$(_this).html('Yes');
				$('ul#peopleAttending li.singleattending[data-id="'+res.uid+'"]').fadeOut();
				//$('#attendbtn').html('<a href="#" class="btn btn-small btn-success attend" data-action="attendEvent" data-id="'+eid+'"> Yes </a>');
			} else {
				nmb++;
				$(_this).data('action', 'unAttendEvent');
				$(_this).removeClass('btn-success');
				$(_this).addClass('btn-danger');
				$(_this).html('No');
				$('ul#peopleAttending').prepend(res.html);
				$('ul#peopleAttending li').fadeIn();
				//$('#attendbtn').html('<a href="#" class="btn btn-small btn-danger attend" data-action="unAttendEvent" data-id="'+eid+'"> No </a>');
			}
			$('#vieweventmodal').find('#number').html(nmb);
			$('#attendbtn').fadeIn();
		});
	});


	$('#bannerevent').on('change', function(ev) {
		var name = $(this).val();
		var index = name.lastIndexOf('\\');
		name = name.substring(index + 1, name.length);
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


	$('.viewevent').on('click', function(ev) {
		var _this = this;
		$('#promovideo').html('');

		var id = $(this).data('id');

		$.ajax({
			url: $wpapi + 'loadObject',
			data: {
				type: 'event',
				id: $(this).data('id')
			}
		}).done(function(res) {
			console.log('loaded', res);
			$('#vieweventmodal').find('.modal-title').html(res.post_title);
			$('#vieweventmodal').find('#cost').html(res.cost);
			$('#vieweventmodal').find('#date').html(res.date);
			$('#vieweventmodal').find('#description').html(res.post_content);
			$('#vieweventmodal').find('#location').html('<a href="/base/' + res.basename + '">' + res.base + '</a>');
			$('#vieweventmodal').find('#postedby').html(' <a href="' + res.userlink + '">' + res.username + '</a>');
			$('#vieweventmodal').find('#website').val(res.website);
			$('#vieweventmodal').find('#imageevent').html('<img src="' + res.image + '" style="width:100%">');
			$('#vieweventmodal').find('#promovideo').html(res.video_link.url);

			$('#vieweventmodal').find('a.attend[data-action="attendEvent"]').data('id', res.ID);
			$('#vieweventmodal').find('a.unattend[data-action="unAttendEvent"]').data('id', res.ID);
			$('#vieweventmodal').find('#number').html(res.total);

			if (res.current_attending) {
				$('#vieweventmodal').find('a.attend[data-action="attendEvent"]').hide();
			} else {
				$('#vieweventmodal').find('a.unattend[data-action="unAttendEvent"]').hide();
			}
			$('#vieweventmodal').find('#promovideo').html(res.video_link.url);
			$('#vieweventmodal').find('ul#peopleAttending').html(res.attending);
			$('#vieweventmodal').modal('show');
		});
		return false;
	});



});