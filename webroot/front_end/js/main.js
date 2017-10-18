(function ($) {
	"use strict";
jQuery("#carousel-example-generic").carousel();    

    jQuery(document).ready(function($){

        $(".embed-responsive iframe").addClass("embed-responsive-item");
        $(".carousel-inner .item:first-child").addClass("active");
        
        $('[data-toggle="tooltip"]').tooltip();


		$('.portfolio-items').slick({
		  centerMode: true,
		  centerPadding: '60px',
		  slidesToShow: 3,
		  responsive: [
			{
			  breakpoint: 768,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 3
			  }
			},
			{
			  breakpoint: 480,
			  settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 1
			  }
			}
		  ]
		});
        
		
		$('.portfolio-item-wrapper').mixItUp({
		animation: {
				effects: 'fade'	
			}
		});
		
		$('a.notJump').on('click', function(e) {
		  e.preventDefault();
		});
		
		function toggleIcon(e) {
			$(e.target)
			.prev('.panel-heading')
			.find(".more-less")
			.toggleClass('glyphicon-plus glyphicon-minus');
		}
		$('.panel-group').on('hidden.bs.collapse', toggleIcon);
		$('.panel-group').on('shown.bs.collapse', toggleIcon);

    });


    jQuery(window).load(function(){

        
    });


}(jQuery));	

