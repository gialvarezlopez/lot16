//jQuery(function ($) {
alert();    
$(document).on('ready', function() {
    $(window).on('load', function(){
      //setTimeout(closeLoading(), 3000); //wait for page load PLUS two seconds.
    });

    alert();
    if( $("#unparalleled_performance").length == 1 )
    {
        $("#unparalleled_performance").slick({
                arrows: true,
                infinite: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true,
                //prevArrow: $('#hero_arrow_left'),
                //nextArrow: $('#hero_arrow_right'),
                /*
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        //dots: true,
                        //arrows: false,
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        //arrows: false,
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        //arrows: false,
                    }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
                */
        })
    }


});