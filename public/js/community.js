
$(document).ready(function() {

	$(".community-filter").keyup(function() {
		var pattern = $(this).val();

		$(".results *").each(function() {
			$(this).remove();
		});

		if(pattern.length < 3)
			return;

		$(".results").append(
			'<h5 class="center grey-text area-2">' +
				'<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>' +
			'</h5>'
		);

		$.ajax({
			url: '/community/filter',
			method: 'post',
			data: { 
				pattern: pattern,
				_token: $("input[name='_token']").val()
			}
		}).done(function(data) {
	    	data = jQuery.parseJSON(data);

			$(".results *").each(function() {
				$(this).remove();
			});

			if(data === '403')
				return false;

	    	/* if no users, say it */
	    	if (data[0] === undefined) {
	    		$(".results").append(
	    			'<h5 class="center grey-text area-2">No user found</h5>'
	    		);
	    	}

	    	for(key in data) {
	    		$(".results").append(
	    			'<div class="col-3 area-2">' + 
	    				'<a href="/community/detail/' + data[key].id + '/' + data[key].username + '">' +
		    				'<div class="member">' +
		    					'<img class="profile-pic" src="//graph.facebook.com/' + data[key].fbid + '/picture?width=300&height=300">' +
        						'<p>' + data[key].first_name + ' ' + data[key].last_name + '</p>' +
        						'<p>@' + data[key].username + '</p>' +
		    				'</div>' +
	    				'</a>' +
	    			'</div>'
	    		);	    		
	    	}
		});
	});

	$(".follow").click(function() {
		var id = $(this).data('id');

		$.ajax({
			url: '/community/follow',
			method: 'post',
			data: { 
				id: id,
				_token: $("input[name='_token']").val()
			}
		}).done(function(data) {

			if(data === '403')
				return false;

			$(".follow").hide().next().show();

		});
	});

	$(".followed").click(function() {
		$(this).hide().next().show();
	})
	$(".unfollow").click(function() {
		var id = $(this).data('id');

		$.ajax({
			url: '/community/unfollow',
			method: 'post',
			data: { 
				id: id,
				_token: $("input[name='_token']").val()
			}
		}).done(function(data) {

			if(data === '403')
				return false;

			$(".unfollow").hide().next().show();

		});
	});
});