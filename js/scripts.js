
(function($){
  "use strict";

	// Toggle menu
	 $(".navbar-toggle").click(function() {
	  	$(this).toggleClass('in');
	});

	 $('.banner').slick({
    	arrows: true,
    	infinite: true
	  });

	 $('.testimonial').slick({
    	arrows: true,
    	infinite: true
	  });

	/*** Sticky header */
	$(window).scroll(function() {
		if ($(window).scrollTop() > 30) {
			$(".header").addClass("sticky");
		} 
		else {
			$(".header").removeClass("sticky");
		}
	});
	
	/*** Header height = gutter height */
	function setGutterHeight(){
	 	var header = document.querySelector('.header'),
	 		gutter = document.querySelector('.header_gutter');
		 	gutter.style.height = header.offsetHeight + 'px';
	}

	window.onload = setGutterHeight;
	window.onresize = setGutterHeight;

	$('.counter').counterUp({
	    delay: 10,
	    time: 1000
	});


})(jQuery);