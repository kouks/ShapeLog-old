
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
			url: '/profile/community/filter',
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

			console.log(data);
	    	/* if no users, say it */
	    	if (data[0] === undefined) {
	    		$(".results").append(
	    			'<h5 class="center grey-text area-2">No user found</h5>'
	    		);
	    	}

	    	for(key in data) {
	    		$(".results").append(
	    			'<div class="col-3 area-2">' + 
	    				'<a href="/profile/community/detail/' + data[key].id + '">' +
		    				'<div class="member">' +
		    					'<img class="profile-pic" src="//graph.facebook.com/' + data[key].fbid + '/picture?width=300&height=300">' +
        						'<span>' + data[key].first_name + ' ' + data[key].last_name + '</span>' +
		    				'</div>' +
	    				'</a>' +
	    			'</div>'
	    		);	    		
	    	}
		});
	});

});

/* building ajax request 
$.ajax({
	url: '/profile/tags/add',
	method: 'post',
	data: { 
		user: $("input[name='user']").val(), 
		name: $("input[name='name']").val().toUpperCase(),
		unit: $("input[name='unit']").val(),
		_token: $("input[name='_token']").val()
	}
}).done(function(data) {

	if(data === '403')
		return false;

	$("#new-tag").parent().before(
		'<tr>' + 
			'<td class="bold">' + $('input[name="name"]').val().toUpperCase() + '</td>' +
			'<td>' + $('input[name="unit"]').val() + '</td>' +
			'<td></td>' +
		'</tr>'
	);

	$("input[name='name']").val('');
	$("input[name='unit']").val('');
});
*/