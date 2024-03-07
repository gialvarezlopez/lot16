jQuery(function ($) {
//$(document).on('ready', function() {
    $(window).on('load', function(){
       
    });

    /*
    $(window).scroll(function(){
        var sticky = $('#holder_main_menu'),
            scroll = $(window).scrollTop();
      
        if (scroll >= 100) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
    });
    */


    //==========================================
    //Modal Floorplans
    //==========================================
    $("body").on("click", ".opemModalFloorplan", function(event){
        event.preventDefault();
        $(".modal-overlay.floorplans").show();

        $( "#holderFoorPlanPopup" ).slideDown( "slow", function() {
            // Animation complete.
            $("body").addClass("noScrollbar");
        });

        let url = $(this).attr("data-fullimage");
        console.log(url);
        if(url){
            $(".content_body_floorplan").html("<img src='"+url+"' class='img-fluid'>");
        }

    })

    $("body").on("click","#closePopupFloorplans", function(event){
        event.preventDefault();
        //$(".modal-overlay.floorplans, #holderPopupBooking.floorplans").hide();

        $( "#holderFoorPlanPopup" ).slideUp( "slow", function() {
            // Animation complete.
            $(".modal-overlay.floorplans").hide();
            $("body").removeClass("noScrollbar");
        });
        
    });

    //=======================================================
    //Ajax pagination
    //=======================================================
    $("body").on("click","#view_more_floorplans", function(event){
        let startFrom = $("body").find("#list_flooplants").find(".child").length;
        event.preventDefault();
        $(".loading_floorplans").show();
        $.ajax({
            type: "post",
            url: ajax_var.url,
            dataType: 'JSON',
            data: {
                action: "pagination-load-posts",
                page: $("#load_item").val(),
                order_by: $("#order_by").val(),
                startFrom: startFrom,
            },
            success: function(result){
                //option.closest(".middle").find(".optStorage").remove();
                console.log(result);
            
                $("#list_flooplants").append(result.html);
                $(".loading_floorplans").hide();
                if(result.items != $("#load_item").val())
                {
                    $(".holder_load_more").hide();
                }
                //
            },
            error: function(){
                $(".loading_floorplans").hide();
            }
        });
    })

});