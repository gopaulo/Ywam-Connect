$ = jQuery;
$(document).ready(function(ev) {

	$('input#headingevent').on('keydown keyup', function(ev) {
		var valor = $(this).data('original');
		if ($(this).val().length != 0) valor = $(this).val();
		$('#addeventmodal').find('.modal-title').html(valor);


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
				$('ul#peopleAttending li.singleattending[data-id="' + res.uid + '"]').fadeOut('fast', function(k) {
					$(this).remove();
				});
				//$('#attendbtn').html('<a href="#" class="btn btn-small btn-success attend" data-action="attendEvent" data-id="'+eid+'"> Yes </a>');
			} else {
				nmb++;
				$(_this).data('action', 'unAttendEvent');
				$(_this).removeClass('btn-success');
				$(_this).addClass('btn-danger');
				$(_this).html('No');
				console.log('res', res);
				$('ul#peopleAttending').prepend(res.html);
				$('ul#peopleAttending li').fadeIn();
				$('[rel="tooltip"]').tooltip();
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

	$('#editeventbtn').on('click', function(ev) {
		var params = $('#editeventform').formParams();
		console.log('params', params);
		$.ajax({
			url: $wpapi + 'editEvent',
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
					fileElementId: 'bannerevent',
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


	$('#addeventbtn').on('click', function(ev) {
		var params = $('#addeventform').formParams();
		console.log('params', params);
		$.ajax({
			url: $wpapi + 'editEvent',
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

	$('#deleteeventbtn').on('click', function(ev) {
		var id = $('#deleteevent').data('id');
		$.ajax({
			url: $wpapi + 'deleteObject',
			data: {
				type: 'event',
				id: id
			}
		}).done(function(res) {
			//console.log('res', res);
			window.location.reload();
		});
	});

	$('#nodeleteevent').on('click', function(ev) {
		$('#vieweventmodal').modal('show');
	});
	$('#deleteevent').on('click', function(ev) {
		var id = $(this).data('id');
		$('#vieweventmodal').modal('hide');
		$('#eventnamedelete').html($('#vieweventmodal').find('.modal-title').html());
		$('#deleteeventmodal').modal('show');

		console.log('delete', id);
		return false;

	});
	$('#editevent').on('click', function(ev) {
		var id = $(this).data('id');

		$.ajax({
			url: $wpapi + 'loadObject',
			data: {
				type: 'event',
				id: $(this).data('id')
			}
		}).done(function(res) {
			console.log('ed,t', res);
			$('#editeventmodal').find('#headingevent').val(res.post_title);
			$('#editeventmodal').find('.modal-title').html(res.post_title);
			$('#editeventmodal').find('#cost').val(res.cost);


			var time_event = res.time_event;
			time_event = time_event.replace(':', '');
			$('#editeventmodal').find('#time_event').val(time_event);

			var start = res.starting_date;
			start = start.split('/'); //m-d-Y
			$('#editeventmodal').find('#start_day').val(start[1].replace(/^0+/, ''));
			$('#editeventmodal').find('#start_month').val(start[0].replace(/^0+/, ''));
			$('#editeventmodal').find('#start_year').val(start[2]);


			var end = res.ending_date;
			end = end.split('/'); //m-d-Y
			$('#editeventmodal').find('#endint_day').val(end[1].replace(/^0+/, ''));
			$('#editeventmodal').find('#ending_month').val(end[0].replace(/^0+/, ''));
			$('#editeventmodal').find('#ending_year').val(end[2]);

			$('#editeventmodal').find('#id').val(res.ID);

			$('#editeventmodal').find('#category').val(res.category);
			$('#editeventmodal').find('#description').val(res.post_content);
			$('#editeventmodal').find('#postedby').val(res.username);
			$('#editeventmodal').find('#website').val(res.website);
			$('#editeventmodal').find('#imageevent').html('<img src="' + res.image + '" style="width:100%">');
			$('#editeventmodal').find('#videolink').val(res.raw_link);
			$('#editeventmodal').find('#uid').val(res.ownerid);
			$('#editeventmodal').find('#bid').val(res.bid);
			$('#editeventmodal').find('img.previewevent').attr('src', res.image);



			$('#editeventmodal').find('#promovideo').html(res.video_link.url);
			$('[rel="tooltip"]').tooltip();
			$('#editeventmodal').modal('show');

		});
	});
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

			$('#vieweventmodal').find('.attend[data-action="attendEvent"]').data('id', res.ID);
			$('#vieweventmodal').find('.attend[data-action="unAttendEvent"]').data('id', res.ID);
			console.log('no button', $('#vieweventmodal').find('.attend[data-action="unAttendEvent"]'));
			if (res.owner) {
				$('#vieweventmodal').find('#deleteevent').data('id', res.ID);
				$('#vieweventmodal').find('#editevent').data('id', res.ID);

				$('#vieweventmodal').find('#deleteevent').show();
				$('#vieweventmodal').find('#editevent').show();

			} else {

				$('#vieweventmodal').find('#deleteevent').hide();
				$('#vieweventmodal').find('#editevent').hide();
			}
			$('#vieweventmodal').find('#number').html(res.total);

			if (res.current_attending) {
				$('#vieweventmodal').find('.attend[data-action="attendEvent"]').hide();
			} else {
				$('#vieweventmodal').find('.attend[data-action="unAttendEvent"]').hide();
			}
			$('#vieweventmodal').find('#promovideo').html(res.video_link.url);
			$('#vieweventmodal').find('ul#peopleAttending').html(res.attending);
			$('[rel="tooltip"]').tooltip();
			$('#vieweventmodal').modal('show');
		});
		return false;
	});



});