jQuery(function ($) {
//$(document).on('ready', function() {
    $(window).on('load', function(){

        //$("#holder_form_booking .wpcf7-spinner").appendTo("#holder_form_booking #extend-wpcf7-spinner")
        //setTimeout(closeLoading(), 3000); //wait for page load PLUS two seconds.
        setMaxHightHolderVideoHome();
        
    });

    function setMaxHightHolderVideoHome(){
        /*
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
            //var hight = $("#video_desktop").height(); //this = window
            $("#holder_dinamic_hight").css({"max-height":"100vh"})
            $("#video_desktop").hide();
            $("#video_mobile").show();
        }else{
            var hight = $("#video_desktop").height(); //this = window
            $("#holder_dinamic_hight").css({"max-height": hight+"px"})
            $("#video_desktop").show();
            $("#video_mobile").hide();
        }
        */

        if( $("#video_desktop").length == 1)
        {
            var hight = $("#video_desktop").height(); //this = window
            $("#holder_dinamic_hight").css({"max-height": hight+"px"})
        }
    }

    /*
    function detectMaxHight(z){
        if (z.matches) { // If media query matches
            if ( $(".h_building .holder_info").length == 1 )
            {
                var hight = $(".h_building .holder_info").height(); //this = window
                $(".h_building holder_bg").css({"max-height": (hight +20)+"px"})
                console.log(hight);
            }
        }
    }

    var z = window.matchMedia("(max-width: 768px)")
    detectMaxHight(z) // Call listener function at run time
    z.addListener(detectMaxHight) 
    */


    $(window).on('resize', function(){
        setMaxHightHolderVideoHome();
    });

    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            center: true,
            dots: false,
            nav:true,
            navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
            items:2,
            loop:true,
            margin:10,
            responsive:{
                600:{
                    items:1.8
                }
            }
        });
    });

   

    /*
    $(window).scroll(function(){
        var sticky = $('#holder_main_menu'),
            scroll = $(window).scrollTop();
      
        if (scroll >= 100) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
    });
    */
    //====================================================================
    //Contact form 7
    //====================================================================
    $('.wpcf7').on('wpcf7invalid wpcf7spam wpcf7mailsent wpcf7mailfailed', function (response) { 

        //let status = response.target.wpcf7.status 
        //let message = response.target.wpcf7.message;
        //message = message.replace("|", "<br><br>");
        //$("#extraMessage").html(message);
        //console.log(response)
    })
    $('.wpcf7').on('wpcf7submit', function (response) { 

        let status = response.target.wpcf7.status 
        let message = response.target.wpcf7.message;
        //message = message.replace("|", "<br><br>");
        //$("#extraMessage").html(message);
        console.log(response)
    })
    $('.wpcf7').on('wpcf7mailsent', function (response) {      
        // your code here
        //console.log(response)
        //console.log(data)
        let status = response.target.wpcf7.status 
        console.log(status)
        if( status != "failed")
        {
            //$(".holderTitleModal .title").hide();
            //let anotherMessage = "Keep an eye on your inbox for the latest updates on Reside, brought to you by Originate Developments & Harlo Capital.";
            //$("#extraMessage").html(anotherMessage);
            //$("#holderPopupBooking").addClass("bgSentMailOk")
        }
    });

    //==============================================================
    //Menu
    //==============================================================
    function myFunction(x) {
        if (x.matches) { // If media query matches
            $("header #icon-menu-open, .holder-icon-main-menu").show();
            $("header #icon-menu-close").hide();
            $("#nav-parent").hide().addClass("mobile-menu");
        } else {
            $("header #icon-menu-open, header #icon-menu-close, .holder-icon-main-menu").hide();
            $("#nav-parent").show().removeClass("mobile-menu");
        }
    }
    
    var x = window.matchMedia("(max-width: 990px)")
    myFunction(x) // Call listener function at run time
    x.addListener(myFunction) // Attach listener function on state changes


    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        $(".remove-aos-for-mobile").each(function(){
            //$(this).removeAttr("data-aos");
        })
    }


    $('.icon-action-menu').on('click', function(e)
    {
        var subMenu = $("#nav-parent");
        if(subMenu.is(':visible'))
        {
            //subMenu.addClass("closeright");
            //subMenu.slideUp( "90000", function() {
                // Animation complete.
            //});

            subMenu.toggle();

            //subMenu.toggle( "slide", {}, 500 );
            
            $('.icon-action-menu').hide();
            $("header #icon-menu-open").show();
            console.log("if");
        } else {
            //subMenu.removeClass("closeright");
            console.log("else");
            subMenu.slideDown(function(){
                //subMenu.addClass("closeright");
            }); //Open the menu
            $('.icon-action-menu').hide();
            $("header #icon-menu-close").show();
            //subMenu.removeClass("closeright");
        }
    });

    //==========================================
    //Modal Booking Form
    //==========================================
    $("body").on("click",".btn-open-register, .holder_btn_register a", function(event){
        //alert();
        event.preventDefault();

        $(".page_home #holder_form_booking").prependTo("#holderPopupBooking .content_body");

        //$(".modal-overlay.registerForm, #holderPopupBooking.registerFormxxx").show();
        $(".modal-overlay.registerForm").show();
        $( "#holderPopupBooking.registerForm" ).animate(
                {
                    opacity: "show",
                    top: "0%",
                    //opacity: 0.25
                },
            
                // Duration
                600,
            
                // Callback to invoke when the animation is finished
                function() {
                    //console.log( "done!" );
                    $("body").addClass("noScrollbar");
                }
        );
        //$(".details-modal").show();
    });

    $("body").on("click","#closePopupBooking", function(event){
        event.preventDefault();
        
        if($(".global_register_form .col_form").length > 0)
        {
            $("#holderPopupBooking .content_body #holder_form_booking").prependTo(".page_home .global_register_form .col_form");
        }

        $( "#holderPopupBooking.registerForm" ).animate(
                {
                    opacity: "hide",
                    top: "-100%",
                },
            
                // Duration
                600,
            
                // Callback to invoke when the animation is finished
                function() {
                    $(".modal-overlay.registerForm").hide();
                    if( $("#holder_form_booking form").length == 1 )
                    {
                        $("#holder_form_booking form")[0].reset();
                    }
                    $("#book_slots").empty();
                    $("#from, #to").attr("disabled", true);

                    $("body").removeClass("noScrollbar");
                }
            );
        });


    //==========================================
    //Modal Floorplans
    //==========================================
    $("body").on("click", ".opemModalFloorplan", function(event){
        event.preventDefault();
        $(".modal-overlay.floorplans").show();

        $( "#holderPopupBooking.floorplans" ).slideDown( "slow", function() {
            // Animation complete.
            $("body").addClass("noScrollbar");
        });

        let url = $(this).attr("data-fullimage");
        console.log(url);
        if(url){
            $("#content_floorplan").html("<img src='"+url+"' class='img-fluid'>");
        }

    })

    $("body").on("click","#closePopupFloorplans", function(event){
        event.preventDefault();
        //$(".modal-overlay.floorplans, #holderPopupBooking.floorplans").hide();

        $( "#holderPopupBooking.floorplans" ).slideUp( "slow", function() {
            // Animation complete.
            $(".modal-overlay.floorplans").hide();
            $("body").removeClass("noScrollbar");
        });
        
    });

    //==========================================
    //Modal Play Video
    //==========================================
    var playButton = document.getElementById("btnPlayVideo");
    var video = document.getElementById("video");
    // Event listener for the play/pause button
    /*
    playButton.addEventListener("click", function() {
        if (video.paused == true) {
            // Play the video
            video.play();

            // Update the button text to 'Pause'
            playButton.innerHTML = "Pause";
            video.attr

        } else {
            // Pause the video
            video.pause();

            // Update the button text to 'Play'
            playButton.innerHTML = "Play Video";
        }
    })
    */
    $("body").on("click", "#btnPlayVideo", function(event){
        event.preventDefault();
        $(".modal-overlay.playvideo").show();

        $( "#holderPopupBooking.playvideo" ).slideDown( "slow", function() {
            // Animation complete.
            $('#video')[0].play();
        });

        //let url = $(this).attr("data-fullimage");
        //console.log(url);
        //if(url){
            //$("#content_playvideo").html("<img src='"+url+"' class='img-fluid'>");
        //}

    })

    $("body").on("click","#closePopupPlayVideo", function(event){
        event.preventDefault();
        $( "#holderPopupBooking.playvideo" ).slideUp( "slow", function() {
            // Animation complete.
            $(".modal-overlay.playvideo").hide();
            video.pause();
            //$('#video').removeAttr('controls');
            //$('#video').load(); 
        });
    });


    /*
    $("body").on("click","#btnPlayVideo", function(event){
        event.preventDefault();
    })
    */
    /*
    $('#btnPlayVideo').on('click', function(){
        $('#video')[0].play();
        //$(this).hide();
        $(".holderInfoVideo").slideUp("slow");
    });
    */
  
    $('#video').on('play', function (e) {
        $(this).attr('controls','true');
    });

    /*
    let vid = document.getElementById("video");
    if(vid){
        vid.onpause = function() {
            $(".holderInfoVideo").slideDown("slow");
        };

        vid.onplay = function() {
            $(".holderInfoVideo").slideUp("slow");
        }

        vid.onended =  function() {
        
            $('#video').removeAttr('controls');
            $('#video').load(); 
        }
    }
    */

    /*
    
    */



    //Open features of neigbourhood
    $(".neighbourhood_features .feature h4").on("click",function(){

        if( !$(this).hasClass("current"))
        {
            $("body").on(".neighbourhood_features h4.current").find(".items").slideUp("slow");

            $(".neighbourhood_features .feature h4").each(function(){
                $(this).removeClass("current");
            })

            $(this).addClass("current");
            $(this).closest("div").find(".items").slideDown( "slow", function() {
                // Animation complete.
                ///$(this).removeClass("opened");
            });
        }else{
           
            $("body").on(".neighbourhood_features h4.current").find(".items").slideUp("slow");
            $(this).removeClass("current");
            
        }

        

        

        /*
        if( $(this).closest("div").find(".items").hasClass("opened") ){

            $(this).closest("div").find(".items").slideUp( "slow", function() {
                // Animation complete.
                $(this).removeClass("opened");
            });
            return false;
        }

        $(".neighbourhood_features .feature").find(".opened").hide();
        
       
        $(this).closest("div").find(".items").slideDown( "slow", function() {
            // Animation complete.
            $(this).addClass("opened");
        });
        */
    })

    $("#holder_form_booking .option_right, #holder_form_booking .option_left").each(function(){
        let name = $(this).find(".gfield_description").text();
        $(this).find("select").prepend("<option>"+name+"</option>");
        $(this).find("select option").each(function(index){
            if(index == 0)
            {
                $(this).prop('disabled', true);
                console.log(index) 
            }
           
        })
    })


    // Iterate over each select element
    let renderNumber = 1;
    function apply_style_select_options(sum){
        $("body").find('#holder_form_booking select').each(function () {

            // Cache the number of options
            var $this = $(this),
                numberOfOptions = $(this).children('option').length;

            // Hides the select element
            $this.addClass('s-hidden');

            // Wrap the select element in a div
            $this.wrap('<div class="select"></div>');

            // Insert a styled div to sit over the top of the hidden select element
            $this.after('<div class="styledSelect"></div>');

            // Cache the styled div
            var $styledSelect = $this.next('div.styledSelect');

            //if($(this).find("select"))
            

            let setFirstOption = ""
            if(renderNumber == 1)
            {
                setFirstOption =  $this.children('option').eq(0).text()
            }else{
                setFirstOption = $(this).find(":selected").text()
            }
            console.log(renderNumber);
            //console.log(conceptName);
            // Show the first select option in the styled div
            $styledSelect.text(setFirstOption);

            // Insert an unordered list after the styled div and also cache the list
            var $list = $('<ul />', {
                'class': 'options'
            }).insertAfter($styledSelect);

            // Insert a list item into the unordered list for each select option
            for (var i = 0; i < numberOfOptions; i++) {
                if(i > 0){ //this validates the first name of the select
                    
                
                    $('<li />', {
                        text: $this.children('option').eq(i).text(),
                        rel: $this.children('option').eq(i).val()
                    }).appendTo($list);

                }
            }

            // Cache the list items
            var $listItems = $list.children('li');

            // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
            $styledSelect.click(function (e) {
                e.stopPropagation();
            
                $('div.styledSelect.active').each(function () {
                    $(this).removeClass('active').next('ul.options').hide();
                });
                $(this).toggleClass('active').next('ul.options').toggle();

                //Add menu close
                $(".closeMenu").remove()
                if( $(this).closest(".select").find(".closeMenu").length == 0)
                {
                    $(this).closest(".select").append("<div style='position: absolute; right: 5px; top:10px; width: 20px; height:20px; background: #fff; border-radius:100%; z-index: 100000000' class='closeMenu'><span class='dashicons dashicons-remove'></span></div>");
                }
            
            });

            // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
            // Updates the select element to have the value of the equivalent option
            $listItems.click(function (e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
                $list.hide();
                $(this).closest(".select").find(".closeMenu").remove();

                //Added by gio
                $(this).closest("ul").find('.selected').each(function(){
                    $(this).removeClass("selected");
                }) 
                $(this).addClass("selected")
                /* alert($this.val()); Uncomment this for demonstration! */
            });

            // Hides the unordered list when clicking outside of it
            $(document).click(function () {
                $styledSelect.removeClass('active');
                $list.hide();
                $(".closeMenu").remove()
                $(this).remove();
            });


            

        });

        if(sum)
        {
            renderNumber = renderNumber + 1;
        }
    }


    
    //-----------------------------------
    //After render the form
    //-----------------------------------
    jQuery(document).on('gform_post_render', function(event, form_id, current_page){
       
        if( $("body").find("#dinamic_div_insert").length == 0 ){
            $( "<div id='dinamic_div_insert' class='gfield gfield--width-half  field_sublabel_below field_description_below'></div>" ).insertAfter( ".brokerage_name" );
        }
    });

    //-----------------------------------
    //After submit form
    //-----------------------------------
    $(document).on("gform_confirmation_loaded", function (e, form_id) {
        // code to run upon successful form submission
        $(".hide_after_submit").hide();
        $(".page_register_now .page_register_form").css({"background-image":"none"});

        $(".show-img-after-submit").show();
        $(".global_register_form .setRow .col_form, #holder_form_booking .fields").css({"width":"100%"});
    });


});