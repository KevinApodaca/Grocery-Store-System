/*

[BizLinks Core Script]

Project: BizLinks - Material Design Agency and Business Template
Version: 1.2
Author : themelooks.com

*/

(function ($) {
    "use strict"; // this function is executed in strict mode
    
    $(function () {
        /* -------------------------------------------------------------------------*
         * SCOPE VARIABLES
         * -------------------------------------------------------------------------*/
        var wn = $(window);
        
        /* ------------------------------------------------------------------------- *
         * ADJUST TOP NAV
         * ------------------------------------------------------------------------- */
        var topNav = $('#topNav2');

        var topNavToggle = function () {
            if ( wn.scrollTop() > 1 ) {
                topNav.addClass('sticky');
            } else {
                topNav.removeClass('sticky');
            }
        };
        
        topNavToggle();
        
        wn.on('scroll', function () {
            topNavToggle();
        });
        
        /* -------------------------------------------------------------------------*
         * MAP
         * -------------------------------------------------------------------------*/
        var map, marker, myLatLng;
        
        function initMap() {
            myLatLng = {lat: 23.790546, lng: 90.375583};
            
            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 16,
                scrollwheel: false,
                disableDefaultUI: true,
                zoomControl: true
            });
            
            marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                animation: google.maps.Animation.DROP,
                draggable: true
            });
        }
        
        if ( $("#map").length ) {
            initMap();
        }

        /* ------------------------------------------------------------------------- *
         * TWITTER WIDGET
         * ------------------------------------------------------------------------- */
        var $footerTwitter = $('#footerTwitter');

        if ( $footerTwitter.length ) {
            twttr.widgets.createTimeline({
                sourceType: "profile",
                screenName: $footerTwitter.data('user-name')
            }, document.getElementById('footerTwitter'));
        }
        
        /* -------------------------------------------------------------------------*
         * FORM VALIDATION
         * -------------------------------------------------------------------------*/
        if ( $('#contactFrom').length ) {
            $('#contactFrom').validate({
                rules: {
                    contactName: "required",
                    contactEmail: {
                        required: true,
                        email: true
                    },
                    contactMessage: "required"
                },
                errorPlacement: function (error, element) {
                    return true;
                },
                submitHandler: function () {
                    $('.contact-form-status').show().html('<div class="alert alert-success"  role="alert">Thanks! Your message has been sent.</div>').delay(1000).fadeOut("slow");
                }
            });
        }
        
        if ( $('#subscribeFormFooter').length ) {
            $('#subscribeFormFooter').validate({
                rules: {
                    EMAIL: {
                        required: true,
                        email: true
                    }
                },
                errorPlacement: function (error, element) {
                    return true;
                }
            });
        }
        
        if ( $('#subscribeForm').length ) {
            $('#subscribeForm').validate({
                rules: {
                    EMAIL: {
                        required: true,
                        email: true
                    }
                },
                errorPlacement: function (error, element) {
                    return true;
                }
            });
        }
        
        var postCommentForm = $('#postCommentForm');
        if ( postCommentForm.length ) {
            postCommentForm.validate({
                rules: {
                    commenterName: "required",
                    commenterComments: "required",
                    commenterEmail: {
                        required: true,
                        email: true
                    }
                },
                errorPlacement: function (error, element) {
                    return true;
                }
            });
        }
        
        var loginForm = $('#loginForm')
        ,   signupForm = $('#signupForm');
        
        if ( loginForm.length ) {
            loginForm.validate({
                rules: {
                    loginUsername: "required",
                    loginPassword: "required"
                },
                errorPlacement: function (error, element) {
                    return true;
                }
            });
        }
        
        if ( signupForm.length ) {
            signupForm.validate({
                rules: {
                    singupName: "required",
                    singupUsername: "required",
                    singupEmail: {
                        required: true,
                        email: true
                    },
                    singupPassword: "required",
                    singupPasswordAgain: {
                        equalTo: "#singupPassword"
                    }
                },
                errorPlacement: function (error, element) {
                    return true;
                }
            });
        }
        
        /* -------------------------------------------------------------------------*
         * OWL CARSOUSEL
         * -------------------------------------------------------------------------*/
        var homeSlider = $('.header-items')
        ,   teamSlider = $('.team-items')
        ,   aboutPageTeamSlider = $('.about-page-team-items')
        ,   projectItemSlider = $('.project-item-slider')
        ,   testimonialSlider = $('.testimonial-slider')
        ,   testimonialCustomPagination = function () {
                $.each(this.owl.userItems, function (i) {
                    var recommenderThumb = jQuery(this).data('recommender-thumb');
                    var paginationLinks = jQuery('.testimonial-slider .owl-page span');

                    $(paginationLinks[i]).html('<img src="'+ recommenderThumb +'" alt="" class="img-responsive img-circle" />');
                });
        }
        ,   brandsSlider = $('.brands-slider');

        if ( homeSlider.length ) {
            homeSlider.owlCarousel({
                itemsSelector: '.header-item',
                slideSpeed: 1200,
                singleItem: true,
                autoPlay: true,
                addClassActive: true
            });
        }

        if ( teamSlider.length ) {
            teamSlider.owlCarousel({
                itemsSelector: '.team-item',
                slideSpeed: 1200,
                items: 4,
                itemsTablet: [768, 3],
                itemsTabletSmall: [480, 2],
                itemsMobile: [320, 1],
                autoPlay: true
            });
        }

        if ( aboutPageTeamSlider.length ) {
            aboutPageTeamSlider.owlCarousel({
                itemsSelector: '.team-item',
                slideSpeed: 1200,
                items: 2,
                autoPlay: true,
                navigation: false
            });
        }

        if ( projectItemSlider.length ) {
            projectItemSlider.owlCarousel({
                itemsSelector: 'img',
                slideSpeed: 1200,
                singleItem: true,
                autoPlay: true
            });
        }

        if ( testimonialSlider.length ) {
            testimonialSlider.owlCarousel({
                slideSpeed: 1200,
                singleItem: true,
                autoPlay: true,
                addClassActive: true,
                afterInit: testimonialCustomPagination
            });
        }

        if ( brandsSlider.length ) {
            brandsSlider.owlCarousel({
                slideSpeed: 1200,
                items: 4,
                autoPlay: true,
                addClassActive: true,
                pagination: false
            });
        }

        /* -------------------------------------------------------------------------*
         * PORTFOLIO ITEMS IMAGE
         * -------------------------------------------------------------------------*/
        $('[data-img-src]').each(function () {
            var imgValue = $(this).data('img-src');
            $(this).css('background-image', 'url(' + imgValue + ')');
        });
        
        /* -------------------------------------------------------------------------*
         * COUNTER
         * -------------------------------------------------------------------------*/
        if ( $('.facts-number').length ) {
            $('.facts-number').counterUp({
                delay: 10,
                time: 1000
            });
        }
        
        /* -------------------------------------------------------------------------*
         * MAGNIFIC POPUP
         * -------------------------------------------------------------------------*/
        if ( $('#bgVideo').length ) {
            $('#bgVideo .play-button').magnificPopup({
                delegate: 'a',
                type: 'iframe',
                mainClass: 'my-mfp-zoom-in'
            });
        }
        
        if ( $('.portfolio-items').length ) {
            $('.portfolio-img-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'my-mfp-zoom-in'

            });
        }
        
        /* -------------------------------------------------------------------------*
         * POPUP NAV BUTTON
         * -------------------------------------------------------------------------*/
        var popupNavButton = $('#popupNavButton');
        
        if ( popupNavButton.length ) {
            popupNavButton.appendTo(popupNav);
        }
        
        /* -------------------------------------------------------------------------*
         * MAIN NAV
         * -------------------------------------------------------------------------*/
        $('.mainNavButton').on('click', function () {
            var drawer = $('.mainNav .mdl-layout__drawer, .mainNav .mdl-layout__obfuscator, .mdl-layout__container');
            
            drawer.toggleClass('is-visible');
        });
        
        $('.mainNav').on('click', '.mdl-layout__obfuscator, .form-button', function () {
            $('.mainNav .mdl-layout__drawer, .mainNav .mdl-layout__obfuscator, .mdl-layout__container').removeClass('is-visible');
        });
        
        $('.mainNav .nav > li > a').one('click', function () {
            if ( $(this).parent('li').hasClass('opened') ) {
                $(this).parent('li').toggleClass('opened open');
            } else {
                $(this).parent('li').siblings('li.opened').toggleClass('opened open');
            }
        });
        
        /* -------------------------------------------------------------------------*
         * ANIMATE SCROLL
         * -------------------------------------------------------------------------*/
        $('.animateScroll2 li a').on('click', function (e) {
            e.preventDefault();
            var attr = $(this).attr('href');
            
            $(attr).animatescroll({
                padding: -1,
                easing: 'easeInOutExpo', //swing, easeInQuad, easeOutQuad, easeInOutQuad, easeInCubic, easeOutCubic, easeInOutCubic, easeInQuart, easeOutQuart, easeInOutQuart, easeInQuint, easeOutQuint, easeInOutQuint, easeInSine, easeOutSine, easeInOutSine, easeInExpo, easeOutExpo, easeInOutExpo, easeInCirc, easeOutCirc, easeInOutCirc, easeInElastic, easeOutElastic, easeInOutElastic, easeInBack, easeOutBack, easeInOutBack, easeInBounce, easeOutBounce, easeInOutBounce
                scrollSpeed: 1000
            });
        });
        
        $('.animateScroll li a').on('click', function (e) {
            e.preventDefault();
            var attr = $(this).attr('href');
            
            $(attr).animatescroll({
                padding: 58,
                easing: 'easeInOutExpo', //swing, easeInQuad, easeOutQuad, easeInOutQuad, easeInCubic, easeOutCubic, easeInOutCubic, easeInQuart, easeOutQuart, easeInOutQuart, easeInQuint, easeOutQuint, easeInOutQuint, easeInSine, easeOutSine, easeInOutSine, easeInExpo, easeOutExpo, easeInOutExpo, easeInCirc, easeOutCirc, easeInOutCirc, easeInElastic, easeOutElastic, easeInOutElastic, easeInBack, easeOutBack, easeInOutBack, easeInBounce, easeOutBounce, easeInOutBounce
                scrollSpeed: 1000
            });
        });
        
        /* -------------------------------------------------------------------------*
         * BACKGROUND VIDEO
         * -------------------------------------------------------------------------*/
        var sliderVideoEl = $('.slider-3-video');
        
        if ( sliderVideoEl.length ) {
            sliderVideoEl.tubular({videoId: sliderVideoEl.data('video-id'), mute: true});
            $('#tubular-player').css('height', wn.outerHeight());
            $('#tubular-container, #tubular-shield').appendTo(sliderVideoEl);
        }
        
        /* -------------------------------------------------------------------------*
         * Directional Hover
         * -------------------------------------------------------------------------*/
        if ( $('.dh-container').length ) {
            $('.dh-container').directionalHover();
        }
    });
    
    $(window).on('load', function () {
        /* -------------------------------------------------------------------------*
         * VARIABLES
         * -------------------------------------------------------------------------*/
        var wn = $(window);
        
        /* -------------------------------------------------------------------------*
         * PROTFOLIO GALLERY
         * -------------------------------------------------------------------------*/
        if ( $('#portfolio').length ) {
            var gallery = $('.portfolio-items')
            ,   galleryItem = '.portfolio-item';

            gallery.isotope({
                animationEngine: 'best-available',
                itemSelector: galleryItem
            });

            $('.portfolio-filter-menu ul').on('click', function(e) {
                if ( $(e.target).is('li') ) {
                    var selector = $(e.target).data('filter');
                    var sel_it;
                    
                    if (selector !== '*') {
                        var sel_it = '.' + selector;
                    } else {
                        var sel_it = selector;
                    }
                    gallery.isotope({
                        filter: sel_it
                    });
                    
                    /* Add An Active Class */
                    $(e.target).siblings().removeClass('active');
                    $(e.target).addClass('active');
                }
            });
        
            $('.load-more-btn').one('click', function (e) {
                e.preventDefault();
                
                var hiddenItems = $('.hidden-items').html();
                $('.portfolio-items').append(hiddenItems).isotope('reloadItems').isotope({ sortBy: 'original-order' });
                
                $(this).addClass('disabled');
                
                if ( $('.dh-container').length ) {
                    $('.dh-container').directionalHover();
                }
            }).on('click', function (e) {
                e.preventDefault();
            });
        }
        
        /* -------------------------------------------------------------------------*
         * PRELOADER
         * -------------------------------------------------------------------------*/
        $('#preloader .circle').fadeOut(1000);
        setTimeout((function() {
            $('#preloader .left-door, #preloader .right-door').animate({
                width: ["toggle", "swing"]
            }, 1000);
        }), 1000);
    });
})(jQuery);
