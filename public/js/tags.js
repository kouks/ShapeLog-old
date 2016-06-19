
$(document).ready(function() {
	$("#new-tag").submit(function() {

		if($('input[name="name"]').val() === '' || $('input[name="name"]').val().length > 12) {
			alert("Field 'name' has to be filled and has to be up to 12 letters long");
			return false;
		}

		/* building ajax request */
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

		return false;
	});



});
