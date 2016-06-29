
$(document).ready(function() {

	$(document).on('click', '.verify', function() {
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
