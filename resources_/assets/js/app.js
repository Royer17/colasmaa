(function ($) {
    "use strict";


    //Hide Loading Box (Preloader)
    function handlePreloader() {
        if ($('.preloader').length) {
            $('body').addClass('page-loaded');
            $('.preloader').delay(1000).fadeOut(0);
        }
    }
    
    //Update Header Style and Scroll to Top
    function headerStyle() {
        if ($('.main-header').length) {
            var windowpos = $(window).scrollTop();
            var siteHeader = $('.main-header');
            var scrollLink = $('.scroll-to-top');
            var sticky_header = $('.main-header .sticky-header');
            if (windowpos > 52) {
                siteHeader.addClass('fixed-header');
                sticky_header.addClass("animated slideInDown");
                scrollLink.fadeIn(300);
            } else {
                siteHeader.removeClass('fixed-header');
                sticky_header.removeClass("animated slideInDown");
                scrollLink.fadeOut(300);
            }
        }
    }
    headerStyle();

    //Submenu Dropdown Toggle
    if ($('.main-header li.dropdown ul').length) {
        $('.main-header .navigation li.dropdown').append('<div class="dropdown-btn"><i class="material-icons">chevron_right</i></div>');
    }

    //Mobile Nav Hide Show
    if ($('.mobile-menu').length) {
        var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
        $('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
        $('.sticky-header .main-menu').append(mobileMenuContent);
        //Dropdown Button
        $('.mobile-menu li.dropdown .dropdown-btn').on('click', function() {
            $(this).toggleClass('open');
            $(this).prev('ul').slideToggle(500);
        });
        //Menu Toggle Btn
        $('.mobile-nav-toggler').on('click', function() {
            $('body').addClass('mobile-menu-visible');
        });
        //Menu Toggle Btn
        $('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });
        $(document).on('keydown', function(e) {
            if (e.key === 27) {
                $('#search-popup').removeClass('mobile-menu-visible');
                $('body').removeClass('mobile-menu-visible');
            }
        });
    }

    //Hidden Bar Menu Config
    function hiddenBarMenuConfig() {
        var menuWrap = $('.hidden-bar .side-menu');
        menuWrap.find('.dropdown').children('ul').hide();
        menuWrap.find('li.dropdown > a').each(function() {
            $(this).on('click', function(e) {
                e.preventDefault();
                $(this).parent('li.dropdown').children('ul').slideToggle();
                $(this).parent().toggleClass('open');
                return false;
            });
        });
    }
    hiddenBarMenuConfig();

    //Hidden Sidebar
    if ($('.hidden-bar').length) {
        var hiddenBar = $('.hidden-bar');
        var hiddenBarOpener = $('.max-nav-toggler .toggle-btn');
        var hiddenBarCloser = $('.hidden-bar-closer');
        $('.hidden-bar-wrapper').mCustomScrollbar();
        //Show Sidebar
        hiddenBarOpener.on('click', function() {
            hiddenBar.addClass('visible-sidebar');
        });
        //Hide Sidebar
        hiddenBarCloser.on('click', function() {
            hiddenBar.removeClass('visible-sidebar');
        });
        $(document).on('keydown', function(e) {
            if (e.key === 27) {
                hiddenBar.removeClass('visible-sidebar');
            }
        });
    }


    //Highlights Carousel
    if ($('.hi-carousel').length) {
        $('.hi-carousel').on('initialized.owl-carousel translate.owl-carousel', function(e) {
            idx = e.item.index;
            $('.owl-item.inview').removeClass('inview');
            $('.owl-item.previous').removeClass('previous');
            $('.owl-item').eq(idx).addClass('inview');
            $('.owl-item').eq(idx - 1).addClass('previous');
        });

        $('.hi-carousel').owlCarousel({
            center: true,
            loop: true,
            margin: 50,
            autoplay: true,
            autoPlay: 5000,
            dots: false,
            nav: true,
            navText: ['<span class="icon flaticon-left-1"></span>', '<span class="icon flaticon-right-1"></span>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1024: {
                    items: 1
                }
            }
        })
    }

    //Links Carousel
    if ($('.links-carousel').length) {
        $('.links-carousel').owlCarousel({
            loop: false,
            margin: 30,
            nav: false,
            smartSpeed: 500,
            autoplay: 5000,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1024: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    }


    $(window).on('scroll', function() {
        headerStyle();
    });

    $(window).on('load', function() {
        handlePreloader();
    });

})(jQuery);