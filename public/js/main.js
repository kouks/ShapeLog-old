
$(document).ready(function() {
    $(".toggle-photo").click(function() {
        $("#" + $(this).data("id")).toggle();
        $('.grid').masonry('reloadItems');
    })

	$('.verify').click(function() {
		if(!confirm("Do you really want to delete this?"))
			return false;
	});

	if($('body').has('.message')) {
		window.setTimeout(function() {
			$('.message').fadeOut();
		}, 3000);
	}

	$(window).load(function() {
        $('.grid').masonry({
            itemSelector: '.grid-item'
        }).masonry('reloadItems');
    });

    $('.add div').click(function() {
    	$(this).parent().hide();
    });
	
});
