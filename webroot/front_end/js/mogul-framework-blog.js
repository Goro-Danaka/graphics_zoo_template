/** Mogul Framework Blog Javascript **/
 
jQuery(document).ready(function($){

	//Category and Archive Dropdown
	$('.blog-filter .level-1 a[data-filter]').click(function(event){

		event.preventDefault();

		if( !$(this).hasClass('open') ){

			//slider others up first
			$('.blog-filter .level-1 a').removeClass('open');
			$('.blog-filter .level-2 ul.open').removeClass('open').slideUp();

		}

		//change the target element
		var target = '#'+$(this).attr('data-filter'); 
		$(this).toggleClass('open');

		$(target).slideToggle(function(){

			$(target).addClass('open');

		});

	});

	//Get URL parts for ajax activities below
	var url = window.location.href;	

	var searchterm = getUrlParameter('s'); //if we are searching, get search term

	var qstring = ''; //if we are *not* searching, we will put any other query string we might have in here

	if(searchterm === false) { //not searching
		//Preserve qstring
		qstring = url.substr(url.lastIndexOf("/"));
	}

	url = url.substr(0, url.lastIndexOf("/")); //now remove the whole query string from our ajax URL, to keep things tidy as we manipulate the url

	//Ajax load more posts
	$('.load-more[data-page]').click(function(event){		

		event.preventDefault();
		var articleWrapper = '#load-posts'; //the element we use for an ajax target

		if( $(articleWrapper).length == 0 ){ //ajax target cannot be found
			console.log('"'+articleWrapper+'" not found');
		}
		else{

			if( !$(this).hasClass('loading') ){ //don't proceed if we are already loading

				//update loading button class and text
				$(this).addClass('loading').text('Loading...');

				//get next page number to ajax new posts
				var pageNumber = parseInt( $(this).attr('data-page') ) + 1;
				var postsPerPage = $(this).attr('data-ppp');

				//start rebuilding the URL we are going to do an ajax request to
				var link = url + "/page/" + pageNumber + qstring; 

				if(searchterm) {
					link = link + '?s=' + searchterm; //we can assume s is the first and only parameter because if we have a searchterm, we left qstring empty
				}

				console.log(link);

				//Do the ajax call
				$.get( link, function(data){
				  	
				  	//prepare a container for our ajax data
				  	var $div = $('<div></div>');
				  	$(data).appendTo($div);

				  	//get contents of our ajax target from the new page
				  	var html = $div.find(articleWrapper).html();

				  	//amount of posts return was less than ppp
				  	if( $div.find('#load-posts > *').length < postsPerPage ){

				  		//hide load more button
				  		$('a.load-more[data-page]').removeClass('loading').text('No more posts');
				  		setTimeout(function(){ $('a.load-more[data-page]').remove(); }, 3000);

				  		console.log('No more posts available');

				  	}
				  	else{
						//update 'load more' button parameters and re-enable the button
						$('a.load-more[data-page]').attr('data-page',pageNumber).removeClass('loading').text('Load more'); //update load number
					}

					//inject new html into current page
				  	$(articleWrapper).append( html );

				}).fail(function() {
				    
				    //page doesn't exist or no more results
					$('a.load-more[data-page]').removeClass('loading').text('No more posts');
					setTimeout(function(){ $('a.load-more[data-page]').remove(); }, 3000);
				    console.log('Failed to load posts from url: '+url);
				
				});

			}//endif not loading

		}//endif

	});

});//jQuery

//http://stackoverflow.com/a/21903119
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
    return false;
};