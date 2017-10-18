/* Author: Mogul
*/
jQuery(document).ready(function($) {
    
    //Pricing
    $('.price_type').click(function(e){
			e.preventDefault();

      $('.price_type').removeClass('current');
      $(this).addClass('current');

      var price_type = $(this).attr('data-price_type');

      $('.price').removeClass('show');
      $('.price.'+price_type).addClass('show');
    })

});
