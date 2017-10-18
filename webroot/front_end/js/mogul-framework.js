/** Mogul Framework Javascript **/

// ---------------------------- Enable Console.log always
// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function f() {
    log.history = log.history || [];
    log.history.push(arguments);
    if (this.console) {
        var args = arguments, newarr;
        args.callee = args.callee.caller;
        newarr = [].slice.call(args);
        if (typeof console.log === 'object')
            log.apply.call(console.log, console, newarr);
        else
            console.log.apply(console, newarr);
    }
};
(function (a) {
    function b() {}
    for (var c = "assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,markTimeline,profile,profileEnd,time,timeEnd,trace,warn".split(","), d; !!(d = c.pop()); ) {
        a[d] = a[d] || b;
    }
})
        (function () {
            try {
                console.log();
                return window.console;
            } catch (a) {
                return (window.console = {});
            }
        }());


jQuery(document).ready(function ($) {

    //scroll to
    // HTML e.g <a href="#footer" data-offset="100">Go to footer</a>
    $('a[href*="#"]:not([href="#"])').click(function () {

        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {

                //lets us set the vertical offest in px e.g data-offset="100"
                var attr = $(this).attr('data-offset');
                if (attr == undefined) {
                    attr = 0;
                }

                //console.log(attr);

                $('html,body').animate({scrollTop: target.offset().top - attr}, 600);
                return false;

            }
        }
    });


    //lets you overide the scrolljacking/stops janky stuff happening
    $('html,body').on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function () {
        $('html,body').stop();
    });

    var googleMaps = 'iframe[src*="google.com"][src*="map"][src*="embed"]';
    $(googleMaps).wrap('<div class="google-map-wrapper disable-pointer-events"></div>').after('<style>.disable-pointer-events iframe{pointer-events:none;}</style>');
    $('.google-map-wrapper').on('mousedown', function () {
        $(this).removeClass('disable-pointer-events');
    });
    $('.google-map-wrapper').on('mouseleave', function () {
        $(this).addClass('disable-pointer-events');
    });

    //Magnific 
    $('.popup-video').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        iframe: {
            patterns: {
                wistia: {
                    index: 'wistia.com',
                    id: function (url) {
                        var m = url.split('/');
                        if (m !== null) {
                            return m[4];
                        }
                        return null;
                    },
                    src: '//fast.wistia.net/embed/iframe/%id%'
                }
            }
        }
    });


    //Content Tabs
    $('ul.tabs li').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#" + tab_id).addClass('current');
        window.location.hash = tab_id.substring(4);
    })


    // Toggle search form
    $('i.icon-search').click(function (e) {
        e.preventDefault();
        $('.search-form').slideToggle("fast", function () {});
        $('input[type="search"]').focus()
    });
    // Toggle search form (close button)
    $('form a[href="#close"]').click(function (e) {
        e.preventDefault();
        $('.search-form').slideToggle("fast", function () {});
    });
    // Toggle mobile nav
    $('i[class="icon-nav"]').on('click touchstart', function (event) {
        event.preventDefault();
        $('body').toggleClass('nav-open');
    });
    // Toggle mobile nav (close button)
    $('.mobile-nav i[class="icon-close"]').on('click touchstart', function (event) {
        event.preventDefault();
        $('body').toggleClass('nav-open');
    });


    // Accordions
    $('.accordion').find('.accordion-head').click(function () {
        if ($(this).hasClass('open')) {
            $(this).removeClass('open');
            $(this).next().slideToggle('fast');
        } else {
            $('.accordion-head').removeClass('open');
            $(this).addClass('open');
            $(this).next().slideToggle('fast');
            $('.accordion-body').not($(this).next()).slideUp('fast');
        }
    });


    // Slick slider (home-slider)
    $('.home-slider').slick({
        dots: true,
        speed: 500,
        arrows: true,
    });


    // Slick slider (gallery-slider)
    $('.gallery-slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: true,
        arrows: true,
    });

    // Slick slider (testimonials)
    $('.slider').slick({
        dots: true,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 2,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    // Magnific (gallery-slider)
    $('.gallery-slider').magnificPopup({
        delegate: 'a.img-link',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, // change the duration also in CSS
            opener: function (element) {
                return element;
            }

        }
    });

    // Gallery popup
    $('.gallery-thumbnail').magnificPopup({
        delegate: '.gallery-thumbnail-image',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
        },
        gallery: {
            enabled: true,
        },
        zoom: {
            enabled: true,
            duration: 300, // change the duration also in CSS
            opener: function (element) {
                return element;
            }

        }

    });

    // Modal Popup
    $(document).on('click', 'a', function (event, ui) {
        var popup_data_id = $(this).attr("href");
        if ($("[data-id='" + popup_data_id + "']").length != 0) {
            event.preventDefault();
            $('.popup').fadeOut();
            $('.popup').fadeIn();
            $('html').addClass('popup-open');
        }
    });

    //close popup
    $('.popup .close').click(function (event) {
        event.preventDefault();
        $(this).parents('.popup').fadeOut();
        $('html').removeClass('popup-open');

    });

    //random home background image
    if ($("#random-home-background").length != 0) {
        var time = new Date().getTime();
        $.ajax({
            type: 'GET',
            url: window.location + '/wp-content/themes/mogul_framework/ajax/random-home-background.php?=' + time,
            success: function (url) {
                $('#random-home-background').css('background-image', 'url(' + url + ')');
            },
            error: function (error) {
                console.log(error);
                console.log("Something went wrong");
            }
        });
    }


    // Slick - product image slider
    $('.product-showcase-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-nav-slider'
    });
    $('.product-nav-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-showcase-slider',
        dots: true,
        focusOnSelect: true
    });


    function filter() {
        console.log(window.location.hash);
        var initial_load = 'all';
        if (window.location.hash) {
            var filter_hash = window.location.hash.split('_');
            console.log(filter_hash[1]);
            if (filter_hash[0] == '#filter')
                initial_load = '.' + filter_hash[1];
        }
        console.log(initial_load);
        // Instantiate MixItUp:
        $('.container').mixItUp({
            animation: {
                duration: 400,
                effects: 'fade scale(0.97)',
                easing: 'ease'
            },
            load: {
                filter: initial_load
            }
        });
    }
    filter(); //run filter

    $('.tile-filter').click(function (e) {
        e.preventDefault();
        chosen_filter = $(this).data('filter');
        $('button[data-filter="' + chosen_filter + '"]').addClass('active');
    });


    // Video Background
    // debouncing function from John Hann
    (function ($, sr) {
        var debounce = function (func, threshold, execAsap) {
            var timeout;
            return function debounced() {
                var obj = this, args = arguments;
                function delayed() {
                    if (!execAsap)
                        func.apply(obj, args);
                    timeout = null;
                }
                ;
                if (timeout)
                    clearTimeout(timeout);
                else if (execAsap)
                    func.apply(obj, args);
                timeout = setTimeout(delayed, threshold || 100);
            };
        }
        // smartresize
        jQuery.fn[sr] = function (fn) {
            return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
        };
    })(jQuery, 'smartresize');

    (function (jQuery) {
        // Video background parent
        function resize_background_video() {
            jQuery('.bg-vid-parent .bg-video').each(function () {
                var $vid = jQuery(this),
                        $bgvidparent = $vid.parent(),
                        windowWidth = $bgvidparent.width(),
                        windowHeight = $bgvidparent.outerHeight(),
                        r_w = windowHeight / windowWidth,
                        i_w = $vid.width(),
                        i_h = $vid.height(),
                        r_i = i_h / i_w, new_w, new_h;
                if (r_w > r_i) {
                    new_h = windowHeight;
                    new_w = windowHeight / r_i;
                } else {
                    new_h = windowWidth * r_i;
                    new_w = windowWidth;
                }
                $vid.css({
                    width: new_w,
                    height: new_h,
                    left: (windowWidth - new_w) / 2,
                    top: (windowHeight - new_h) / 2
                });
            });
        }

        // Video Background 
        jQuery('.bg-vid-parent .bg-video').load();
        jQuery('.bg-vid-parent .bg-video').on("loadedmetadata", function () {
            jQuery(this).css({
                width: this.videoWidth,
                height: this.videoHeight
            });
            resize_background_video();
            jQuery(this).css('display', 'block');
        });

        jQuery(window).smartresize(function () {
            resize_background_video();
        });

    }(jQuery));
    // End Video Background 

});
