// JavaScript for themezinho
(function($) {
    $(document).ready(function() {
        "use strict";


        $('.loading').hide();
        $('.hide-until-load').fadeIn('slow');
        $('.hide-until-load').removeClass('hide-until-load');


        $(function() {
            $("img").lazyload({
                effect : "fadeIn"
            });
        });

        // Youtube video
        $.ajaxSetup ({ cache: false});
        $('.video-caption').each(function() {
            var id = $(this).attr('data-id');
            var url = 'https://www.googleapis.com/youtube/v3/videos?id='+id+'&part=contentDetails&key=AIzaSyCWMfT6RGA3nCyWlW-pM3d6_4YqJkcIJT8';
            $.ajax( url, {
                context: this,
                crossDomain: true,
                error: function(){
                    // Not successful
                },
                success: function( data ){

                    var duration = data.items[0].contentDetails.duration;
                    duration = duration.substring(2);
                    duration = duration.replace('M', ':');
                    duration = duration.replace('S', '');

                    var durations = duration.split(':');

                    var minute = parseInt(durations[0]);
                    var second = parseInt(durations[1]);

                    if(minute < 10){
                        minute = '0' + minute;
                    }

                    if(second < 10){
                        second = '0' + second;
                    }

                    // update the time in page
                    $(this).find('span.video-time').html(minute+':'+second);

                }});
        });

        // Litebox
        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title');
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function(element) {
                    return element.find('img');
                }
            }

        });


        // Hamburger Menu
        $('.menu-btn').on('click', function(e) {
            $('.side-menu').addClass('reveal');
            $(".menu-btn").toggleClass("active");
            $(".bars .bar").toggleClass("rotated");
            $("main").toggleClass("move-left");
            $("body").toggleClass("overflow-hidden");
        });


        // Search Form
        $('header .search-icon').on('click', function(e) {
            $(".search-wrapper").toggleClass("active");
        });


        // Carousel 4 Col
        $('.carousel-4col').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpointc: 769,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });


        // Carousel Single
        $('.single-item').slick();

        // News Ticker
        $('.breaking-news').css('display', 'block');


        $('.news-ticker').slick({
            vertical: true,
            autoplay: true,
            autoplaySpeed: 3000
        });

        // Circle Progress
        $('.circle').circleProgress({
            value: 0.9
        }).on('circle-animation-progress', function(event, progress) {
            $(this).find('strong').html(parseInt(90 * progress) + '<i>%</i>');
        });

        // NIRMAL

        /*LIKE BUTTON*/
        $( document ).on( 'click', '.single-perform .love-button', function(){

            var previous_count = +$('.single-perform .like-number').html();
            //console.log(previous_count);

            $('.single-perform .likes').addClass('soft-hide');
            $('.single-perform .like-loading-wrapper').addClass('reveal-load');

            $.ajax({
                type:"POST",
                url: new_paper_ntx_ajax_vars.ajaxurl, // our PHP handler file
                data: {
                    action: "new_paper_ntx_set_like_count",
                    post_id : new_paper_ntx_ajax_vars.post_id
                },
                success:function(data){

                    var latest_count = +data;

                    if(previous_count < latest_count){

                        // post has been liked
                        $('.single-perform .liked-post').removeClass('gone');
                        $('.single-perform .unliked-post').removeClass('appear');
                        $('.single-perform .unliked-post').addClass('gone');
                    }else{
                        // post has been unliked
                        $('.single-perform .liked-post').removeClass('appear');
                        $('.single-perform .liked-post').addClass('gone');
                        $('.single-perform .unliked-post').removeClass('gone');
                    }

                    $('.single-perform .like-number').html(data);

                    $('.single-perform .likes').removeClass('soft-hide');
                    $('.single-perform .like-loading-wrapper').removeClass('reveal-load');

                },
                error: function(errorThrown){
                    //console.log(errorThrown);
                }

            });
            return false;

        });



        // -- NIRMAL

        //Sticky Sidebar
        (function(){
            $( '.sidebar' ).wrap( '<div class="wrap"></div>' ); // wrap it up
            $( '<div class="sticky-stop"></div>' ).insertAfter( '.candy-wrapper' );// stop it!
            var sidebarheight, mainheight;
            var cushion = 0; // cushion for spapping to the bottom
            function measureheight() {
                sidebarheight = $('.sidebar').outerHeight() + cushion;
                mainheight = $('.main').outerHeight();
                if (mainheight - sidebarheight > 0) {
                    $('.candy-wrapper').waypoint(function(direction) {
                        $(this).toggleClass('sticky', direction === 'down');
                    });
                    $('.sticky-stop').waypoint(function(direction) {
                        $('.candy-wrapper').toggleClass('at-bottom', direction === 'down');
                    }, {
                        offset: function() {
                            return sidebarheight;
                        }
                    })
                } else {
                    $.waypoints('destroy');
                }
            };
            measureheight();
            $(window).resize(measureheight);
        })();

    });


    // Masonry
    $(window).load(function(){
        var $container = $('.masonry');
        $container.masonry({
            columnWidth: 0,
            itemSelector: '.masonry li'
        });
    });


})(jQuery);