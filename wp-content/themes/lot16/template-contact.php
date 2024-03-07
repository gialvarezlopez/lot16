<?php
    /*
     * Template Name: Template Contact
     */
?>
<?php  get_header(); ?>

<div class="mainHolder page_contact">

    <!-- Hero -->
    <?php 
        get_template_part('template-parts/block-hero',
            $arg, 
            array( 
                'my_data' => array(
                    'classes_btn' => "btn btn-white over-dark",
                )
            ) 
        ); 
    ?>

    <?php 
        $contect_heading = get_field("c_heading");
        $data_form_page = get_field("contact_form_id");
        $desktop_image = get_field("desktop_image");
        $mobile_image = get_field("mobile_image");
    ?>


    <section id="holder_contact">
        <div class="holder_get_img">
            <!--
            <picture>
                
                <?php if($mobile_image){ ?>
                    <source 
                        media="(max-width: 768px)"
                        srcset="<?php echo  $mobile_image['url'];?>"
                    >
                <?php } ?>
                   
                    <?php if($desktop_image){ ?>
                        <img src="<?php echo  $desktop_image['url'];?>" class="img-fluid">
                    <?php } ?>
                    
            </picture>
            -->

            <div id="map"></div>

            
            
        </div>

        <div class="wrapHolder">
            <div class="setRow">
                <div class="col_left">
                    
                </div>
                <div class="col_right">
                        <div class="global_register_form">                 
                                    <h1 class="heading_article"><?php echo $contect_heading; ?></h1>
                                    <div class="col_form"> 
                                        <div id="holder_form_booking" class="holder_form_booking " >  
                                            <div class="fields">
                                                <div class="holderFields">
                                                    <?php 
                                                        if($data_form_page)
                                                        {
                                                            //echo do_shortcode('[gravityforms id="1" field_values="placement=footer"]');
                                                            //[gravityform id="1" title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice" theme="orbital"];

                                                            if( isset($data_form_page) && $data_form_page > 0)
                                                            {
                                                                //echo "<input type='hidden' id='form_register_exist' value='".$data_form_page['form_id']."'>"; //This is to validate if it's loaded the form to set style in labels and select options;
                                                                gravity_form( $data_form_page, false, false, true, '', true, 12 );
                                                            }
                                                        }
                                                    ?>
                                                    <?php 
                                                        //gravity_form( 1, false, false, true, '', true, 12 );
                                                        //[gravityform id="form id" title="true/false" description="true/false" ajax="true/false"] //shorcode
                                                    ?>
                                                </div>    
                                            </div>  
                                        </div>
                                    </div> 
                                
                
                        </div>   
                </div>
            </div>
        </div>
    </section>
   
<div>

<script>
    /**
 * @license
 * Copyright 2019 Google LLC. All Rights Reserved.
 * SPDX-License-Identifier: Apache-2.0
 */
// The following example creates a marker in Stockholm, Sweden using a DROP
// animation. Clicking on the marker will toggle the animation between a BOUNCE
// animation and no animation.
let marker;
//43.156272370061586, -79.2317424759366
//43.156117514843054, -79.23170409335532

let lat = <?php echo get_field("latitude");?>;
let lng = <?php echo get_field("longitude");?>;
let zoom = <?php echo get_field("zoom");?>;

function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: zoom,
    center: { lat: lat, lng: lng },
  });

  marker = new google.maps.Marker({
    map,
    draggable: false,
    animation: google.maps.Animation.DROP,
    position: { lat: lat, lng: lng },
  });
  marker.addListener("click", toggleBounce);
}

function toggleBounce() {
  if (marker.getAnimation() !== null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

window.initMap = initMap;

</script>

<?php get_footer(); ?>