(function ($) {
	
	var $window = $(window); 
	var $body = $('body'); 
	
	/* Hero Slider JS */
	$('.hero-slider').slick({
		infinite: true,
		dots: true,
		arrows: true,
		prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
		nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>",
		autoplay: true,
		autoplaySpeed: 2500,
		speed: 1000,
		slidesToShow: 1,
		slidesToScroll: 1
	});

	/* Home Page Services Slider JS */
	// $('.service-list').slick({
	// 	infinite: true,
	// 	dots: false,
	// 	arrows: true,
	// 	prevArrow:"<button type='button' class='navigation-btn slick-prev pull-left'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
	// 	nextArrow:"<button type='button' class='navigation-btn slick-next pull-right'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>",
	// 	autoplay: true,
	// 	autoplaySpeed: 2500000,
	// 	speed: 1000,
	// 	slidesToShow: 4,
	// 	slidesToScroll: 1,
	// 	responsive: [
	// 		{
	// 		  breakpoint: 991,
	// 		  settings: {
	// 			slidesToShow: 3,
	// 			slidesToScroll: 1
	// 		  }
	// 		},
	// 		{
	// 		  breakpoint: 767,
	// 		  settings: {
	// 			slidesToShow: 1,
	// 			slidesToScroll: 1
	// 		  }
	// 		}
	// 	  ]
	// });

	/* Client Review */
	$('.client-review-list').slick({
		infinite: true,
		dots: false,
		arrows: true,
		prevArrow:"<button type='button' class='navigation-btn slick-prev'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
		nextArrow:"<button type='button' class='navigation-btn slick-next'><i class='fa fa-chevron-right' aria-hidden='true'></i></button>",
		autoplay: true,
		autoplaySpeed: 25000,
		speed: 1000,
		slidesToShow: 2,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 991,
				settings: {
					slidesToShow: 1,
					slidesTOScroll: 1
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

})(jQuery);