jQuery(document).ready(function($){
								
	
	
	$('.img-cover').hover(function() {
		$(this).find('.icons').stop().fadeTo(200, 1);
		$(this).find('i').stop().fadeTo(200, 1);
	}, function() {
		$(this).find('.icons').stop().fadeTo(150, 0);
		$(this).find('i').stop().delay(50).fadeTo(200, 0);
	});
	
	

});