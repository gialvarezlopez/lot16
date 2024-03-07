<?php
    /*
     * Template Name: Template Home
     */
?>

<?php  get_header(); ?>

<div class="mainHolder page_home">

    

    <!-- Hero -->
    <?php $data_video = get_field("hero_video");?>
    <?php 
        get_template_part('template-parts/block-video',
            $arg, 
            array( 
                'my_data' => array(
                    'classes_btn' => "btn btn-white over-dark",
                    'data_video' => $data_video,
                    'get_last_letter'=> 'get_last_letter',
                )
            ) 
        ); 
    ?>

    <!-- Building - Section  -->
    <?php $data_building = get_field("building");?>
    <?php if($data_building) { ?>
        <section class=" h_building  set-bg-primary">
            <div class="holder_data ">
                <div class="info">
                    <div class="wrapHolder holder_info">
                        <?php 
                            get_template_part('template-parts/block-article',
                                $arg, 
                                array( 
                                    'my_data' => array(
                                        'data_article' => $data_building,
                                        'btn_class'=> '',
                                    )
                                ) 
                            ); 
                        ?>
                    </div>
                </div>
                <div class="wrapHolder holder_bg">
                    <img src="<?php echo $data_building['image']['sizes']['hero_v1'];?>" class="banner img-fluid">
                </div>
                <img class="img_pos_right" src="<?php echo  get_stylesheet_directory_uri();?>/images/home/b_right.png">
            </div>
        </section>
    <?php } ?>

    <!-- Interiors -->   
    <?php $data_interiors = get_field("interiors");?>  
    <?php if($data_interiors) { ?>                   
        <section class="h_interiors">    
            <section class="content_blocks_bg dark">
                <div class="content">
                    <div class="wrapHolder">
                        <div class="setRow">
                            <div class="info dark">
                                <div class="description" data-aos="zoom-in">
                                <?php 
                                    get_template_part('template-parts/block-article',
                                        $arg, 
                                        array( 
                                            'my_data' => array(
                                                'data_article' => $data_interiors,
                                                'btn_class'=> 'btn btn-white over-green',
                                            )
                                        ) 
                                    ); 
                                ?>
                                </div>
                            </div>
                            <div class=""></div>
                        </div>
                    </div>
                </div>
                <div class="setRow" data-aos="fade-up">
                    <div class="holder_color"></div>
                    <div class="holder_image" style="position:relative">  
                            <img id="shadow_img_slider" src="<?php echo  get_stylesheet_directory_uri();?>/images/shadow-slider.png" style="">    
                            <div class="carousel-wrapper">
                                <div class="owl-carousel">
                                    <?php if($data_interiors['gallery']) { ?>
                                        <?php foreach( $data_interiors['gallery'] as $value => $item) { ?>
                                            <div> <img class="img_fluid" src="<?php echo  $item['sizes']['block_1'];?>"> </div>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div> 
                    </div>
                    <div></div>
                </div>
            </section>
        </section>
    <?php } ?>

    <!-- THE Neighbourhood -->
    <?php $data_neighbourhood = get_field("neighbourhood");?>  
    <?php if($data_neighbourhood) { ?>
        <section class="h_neigbourhood">
            <div class="wrapHolder mobile_full_width">
                    <div class="setRow center-content">
                        <div class="col_left">
                            <!-- <img src="<?php //echo  $data_neighbourhood['image']['url'];?>" class="img-fluid"> -->
                            <div id="map"></div>
                        </div>
                        <div class="col_right">
                            <div class="description">
                                <?php 
                                    get_template_part('template-parts/block-article',
                                        $arg, 
                                        array( 
                                            'my_data' => array(
                                                'data_article' => $data_neighbourhood,
                                                'btn_class'=> 'btn btn-white over-green',
                                            )
                                        ) 
                                    ); 
                                ?>
                            </div>
                        </div>
                    </div>
            </div>                     
        </section>   
    <?php } ?>                     
                       
    
    <!-- Floor Plans -->
    <?php $data_floor_plans = get_field("floor_plans");?>  
    <?php if($data_floor_plans) { ?>                            
        <section class="h_floor_plans">
            <div class="wrapHolder">
                <div class="holderLayouts">                
                    <div class="setRow space-between align-end addGap gb_green ">
                        <div class="col_left">
                            <div class="holderImg">
                                <img src="<?php echo  $data_floor_plans['image']['url'];?>" class="img-fluid">
                            </div>
                        </div>
                        <div class="col_right">
                            <div class="description">

                                <?php 
                                    get_template_part('template-parts/block-article',
                                        $arg, 
                                        array( 
                                            'my_data' => array(
                                                'data_article' => $data_floor_plans,
                                                'btn_class'=> 'btn  btn-dark over-green',
                                            )
                                        ) 
                                    ); 
                                ?>
                            </div>
                        </div>                
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

   <!-- Team section --> 
   <?php $data_team = get_field("team");?>  
    <?php if($data_team) { ?>  
    <div>     
        <section class="h_team">
                <div class="gb_icon">                      
                    <div class="wrapHolder gb_green">
                        <div class="setRow aling-center">
                            <div class="col_left">
                                <div class="description">
                                    <?php 
                                        get_template_part('template-parts/block-article',
                                            $arg, 
                                            array( 
                                                'my_data' => array(
                                                    'data_article' => $data_team,
                                                    'btn_class'=> 'btn  btn-dark over-green',
                                                )
                                            ) 
                                        ); 
                                    ?>
                                </div>
                            </div>
                            <div class="col_right">
                                <div class="grid-icons">
                                    <?php 
                                        $page_obj = get_page_by_path('team', OBJECT, 'page');// <-- change the posttype 
                                        $page_id = $page_obj->ID;
                                        $data_companies = get_field('t_company', $page_id);
                                        foreach($data_companies as $item)
                                        {
                                            ?>
                                            <div>
                                                <img src="<?php echo $item['logo_v2']['url']; ?>" class="img-fluid">
                                                <?php if($item['heading']) { ?>
                                                    <h3><?php echo $item['heading']; ?></h3>
                                                <?php } ?>
                                            </div>
                                            <?php
                                        }
                                    ?>   
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>   
        </section> 
    </div> 
    <?php } ?>
    
    <!-- Register Form  -->
    
    <?php $data_register_form = get_field("register_form"); 
        $data_register_form['active'];

        $form_register_on = false;
        if($data_register_form && $data_register_form['active']){
            $form_register_on = true;
        }
    ?>  
    <?php if( $data_register_form && $data_register_form['active'] ) { ?> 
        <section class="page_register_form">
            <?php /* ?>
            <img src="<?php echo  get_stylesheet_directory_uri();?>/images/register-form-left.png" class="img-fluid img-left-submit show-img-after-submit">
            <img src="<?php echo  get_stylesheet_directory_uri();?>/images/register-form-right.png" class="img-fluid img-right-submit show-img-after-submit">
            <?php */ ?>
            <div class="wrapHolder">
                <?php $data_form_page = get_field("gs_register_form", "option"); ?>
                <div class="global_register_form">                 
                        <div class="setRow">
                            <div class="hide_after_submit">
                                <h1 class="heading_article"><?php echo $data_form_page['title']; ?></h1>
                                <p class="description_article">
                                    <?php echo $data_form_page['heading']; ?>
                                </p>
                            </div>
                            <div class="col_form"> 
                                <div id="holder_form_booking" class="holder_form_booking " >  
                                    <div class="fields">
                                        <div class="holderFields">
                                            <?php 
                                                if($data_form_page)
                                                {
                                                    //echo do_shortcode('[gravityforms id="1" field_values="placement=footer"]');
                                                    //[gravityform id="1" title="false" description="false" ajax="true" tabindex="49" field_values="check=First Choice,Second Choice" theme="orbital"];

                                                    if( isset($data_form_page['form_id']) && $data_form_page['form_id'] > 0)
                                                    {
                                                        //echo "<input type='hidden' id='form_register_exist' value='".$data_form_page['form_id']."'>"; //This is to validate if it's loaded the form to set style in labels and select options;
                                                        gravity_form( $data_form_page['form_id'], false, false, true, '', true, 12 );
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
        </section>
     <?php } ?>                                       
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

let lat = <?php echo $data_neighbourhood["n_latitude"];?>;
let lng = <?php echo $data_neighbourhood["n_longitude"];?>;
let zoom = <?php echo $data_neighbourhood["n_zoom"];?>;

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
