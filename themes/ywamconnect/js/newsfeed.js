$ = jQuery;

$(document).ready(function(ev) {
	$('#postfeedyc').on('click', function(ev) {
		console.log('posting feed');
		var params = $('#newsfeed_post').formParams();
		$.ajax({
			url: $wpfeedapi + 'post_feed',
			data: params
		}).done(function(res) {
			//$('#newsfeed_post')[0].reset();
			console.log('posted', res);
			document.getElementById("newsfeed_post").reset();
		});
	});

	$('#deletefeedbtn').on('click', function(ev) {
		var fid = $(this).data('id');
		console.log('delete', fid);
		$.ajax({
			url: $wpfeedapi + 'delete_feed',
			data: {
				fid: fid
			}
		}).done(function(res) {
			console.log('res',res);
			$('#deletefeedmodal').modal('hide');
			$('li.feed_single[data-id="' + res.id + '"]').fadeOut();
		});

	});

	$('.deletefeed').on('click', function(ev) {
		$('#deletefeedmodal').find('#deletefeedbtn').data('id', $(this).data('id'));
		$('#deletefeedmodal').modal('show');
	});
});

function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}