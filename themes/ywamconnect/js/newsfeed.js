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
 
			$('#newsfeed_list').prepend(res.html);
			$('#newsfeed_list > li:first-child').hide().fadeIn('slow');
			document.getElementById("newsfeed_post").reset();

			$('button.deletefeed').on('click', function(ev) {
				$('#deletefeedmodal').find('#deletefeedbtn').data('id', $(this).data('id'));
				$('#deletefeedmodal').modal('show');
			});
		});
	});

	$('#deletefeedbtn').on('click', function(ev) {
		var fid = $(this).data('id');
 		$.ajax({
			url: $wpfeedapi + 'delete_feed',
			data: {
				fid: fid
			}
		}).done(function(res) {
 			$('#deletefeedmodal').modal('hide');
			$('li.feed_single[data-id="' + res.id + '"]').fadeOut('fast', function(k) {
				$(this).remove();
			});
		});

	});

	$('button.deletefeed').on('click', function(ev) {
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