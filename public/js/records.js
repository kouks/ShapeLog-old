
$(document).ready(function() {

    $(".toggle-photo").click(function() {
        $("#" + $(this).data("id")).toggle();
        $('.grid').masonry('reloadItems');
    })

    $(".editable .row span").click(function() {
    	var cat = $(this).data("cat");
    	
    	if(cat !== undefined) {
    		$(this).hide().next().show().focus().attr('placeholder', 'Enter a new value');
    	}
    });


    $('.editable .edit').blur(function() {
    	$(this).hide().prev().show();
    });

    $(window).keyup(function(e) {
    	if(e.keyCode == 13 && $(e.target).is(".editable .edit")) {
    		console.log($(e.target).val());
		    $.ajax({
		    	url: '/profile/edit',
		    	method: 'post',
		    	data: { 
		    		id: $(e.target).prev().data("id"), 
		    		cat: $(e.target).prev().data("cat"), 
		    		value: $(e.target).val(),
		    		_token: $("input[name='_token']").val()
		    	}
		    }).done(function(data) {

		    	if(data === '403')
		    		return false;

		    	var el = $(e.target).hide().prev();
		    	var arr = $(el).text().split(" ");
		    	arr.shift();
		    	arr.unshift($(e.target).val());
		    	$(el).show().text(arr.join(" "));
		    	
	    	});
    	}
    });

    $(window).click(function(e) {
        if(!$(e.target).is(".page-shadow") && !$(e.target).is(".close"))
            return;

    	$(".page-shadow").fadeOut();
    });

    $(".record-thumbnail").click(function() {
    	$("#record-" + $(this).data("id")).show().parent().fadeIn();
    });

    $(".new-record").click(function() {
    	$(".record-form").show().parent().fadeIn();
    });
});
