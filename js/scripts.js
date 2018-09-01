
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

	// counter
	$('.counter').counterUp({
	    delay: 10,
	    time: 1000
	});

	$('.gallery-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        infinite: true,
        asNavFor: '.gallery-slider-nav'
    });

    $('.gallery-slider-nav').slick({
        slidesToShow: 4,
        infinite: true,
        slidesToScroll: 1,
        asNavFor: '.gallery-slider',
        arrows: false,
        focusOnSelect: true,
        responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 3,
            centerMode: false,
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 2,
            centerMode: false,
          }
        }
      ]
    });

    $('.related-gallery-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        nextArrow: '.arrow .fa-angle-left',
        prevArrow: '.arrow .fa-angle-right',
        infinite: true
    });


})(jQuery);