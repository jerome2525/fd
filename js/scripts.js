jQuery(document).ready(function($){
		
	$(window).scroll(function(){
		if ($(window).scrollTop() >= 300) {
	        $('header').addClass('sticky');
	    }
	    else {
	        $('header').removeClass('sticky');
	    }

	});

	$('.mobile-menu').click(function(e) {
		e.preventDefault();
		$('header .nav ul').toggle('fast');
	});

	$('.close-menu').click(function(e) {
		e.preventDefault();
		$('header .nav ul').hide('fast');
	});

	$('header .nav a').addClass('hvr-wobble-vertical');
	$('header .top-row a').addClass('hvr-wobble-vertical');
		
});
