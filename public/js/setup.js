
var verified = false;

$(document).ready(function() {
	$("input[name='username']").blur(function() {
		if($(this).val().length < 4 || $(this).val().length > 20 || !$(this).val().match(/^[a-z0-9]+$/i)) {
			verified = false;
	    	$("input[name='username']").css({'border-color': '#b23432'})
			$(".error").show().text("Your username has to be 4 - 20 characters long and has to contain only numbers and English letters.");
			return false;
		}

		$(".error").hide()

		/* building ajax request */
	    $.ajax({
	    	url: '/setup/check-name',
	    	method: 'post',
	    	data: { 
	    		username: $(this).val(),
	    		_token: $("input[name='_token']").val()
	    	}
	    }).done(function(data) {

	    	if(data === '403')
	    		return false;

	    	if(data > 0) {
	    		verified = false;
	    		$("input[name='username']").css({'border-color': '#b23432'})
				$(".error").show().text("This username is alread taken");
	    	} else {
	    		verified = true;
	    		$("input[name='username']").css({'border-color': '#7AAA78'})
				$(".error").hide();
	    	}
    	});
	});

	$("#setup-form").submit(function() {
		
		if(!verified) {
			if($(".error").show().text() === '') {
	    		$("input[name='username']").css({'border-color': '#b23432'})
				$(".error").show().text("Your username has to be 4 - 20 characters long and has to contain only numbers and English letters.");
			} else {
	    		$("input[name='username']").css({'border-color': '#b23432'})
				$(".error").show();
			}
		}

		return verified;
	});
});
