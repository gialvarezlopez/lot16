<?php
    /*
     * Template Name: Template Neighbourhood
     */
?>
<?php  get_header(); ?>

<div class="mainHolder page_neighbourhood">

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


    <!-- Locations - blocks 2 -->
    <?php $data_location = get_field("n_locations"); ?>
    <?php if($data_location) { ?>
        <div class="locations">
            <div class="wrapHolder holder_explore">
            
                <?php if ($data_location['heading']) { ?>
                    <h1 class="sub_heading_article"><?php echo $data_location['heading']; ?></h1>
                <?php } ?>
            </div>
            <section class="content_blocks_bg  set_scroll_description">

                <div class="content noTransform">
                    <div class="wrapHolder">
                        
                        <div class="setRow list justify-content-end aling-baseline">
                            
                            <div class="info">
                                <?php if ($data_location['sub_heading']) { ?>
                                    <h3 class="title"><?php echo $data_location['sub_heading']; ?></h3>
                                <?php } ?>

                                <div class="description">
                                
                                    <div id="neighbourhood_features" class="neighbourhood_features  remove-aos-for-mobile">

                                            
                                            <?php 
                                                if( isset($data_location['item']))
                                                {
                                                    foreach($data_location['item'] as $item)
                                                    {
                                                    ?>
                                                    <div class="feature">
                                                        <h4><?php echo $item['name']; ?></h4>
                                                        <div class="items">
                                                            <ul>
                                                                <li><?php echo $item['items']; ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }
                                                }
                                            
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class=""></div>
                        </div>
                    </div>
                </div>
                <div class="setRow parent_kenX">
                    
                    <!-- <div class="holder_image ken" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('<?php echo $data_location['image']['url']; ?>');"> -->
                        <!-- <h3 class="spaceName">Co-working Space</h3> -->
                    <div class="holder_image">    
                        <img src="<?php echo $data_location['image']['url']; ?>" class="">
                    </div>
                    <div class="holder_color"></div>
                <div>
            </section>
        </div>
    <?php } ?>

    

    <!-- conectivity -->
    <?php $data_connectivity = get_field("connectivity"); ?>
    <?php if($data_connectivity) { ?>
        <div class="conectivity">
            <section class="content_blocks_bg_2_colors">
                    <div class="content">
                        <div class="wrapHolder">
                            <div class="setRow list aling-center">
                                <div class="info">
                                    <div class="description">

                                        <div id="neighbourhood_features" class="neighbourhood_features  remove-aos-for-mobile" data-aosxxxxxx="fade-up">

                                            <?php 
                                                get_template_part('template-parts/block-article',
                                                    $arg, 
                                                    array( 
                                                        'my_data' => array(
                                                            'data_article' => $data_connectivity,
                                                            //'btn_class'=> 'btn  btn-white over-green',
                                                            'one_header_only'=> true,
                                                        )
                                                    ) 
                                                ); 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="holder_image"><img src="<?php echo $data_connectivity['image']['sizes']['block_2']; ?>" class=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="setRow parent_ken fifti">
                        <div class="holder_color "></div>
                        <!-- <div class="holder_image ken" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('');"> -->
                            <!-- <h3 class="spaceName">Co-working Space</h3> -->
                        <div class="holder_image gb_green">    
                            
                        </div>
                    <div>
                </div></div>
            </section>
        </div>
    <?php } ?>

    <!-- Sub hero -->
    <?php $data_second_hero = get_field("second_hero"); ?>
    <?php if($data_second_hero) { ?>
        <section class="sub_hero">
            <img src="<?php echo  $data_second_hero['image']['sizes']['hero_v1'];?>" class="full-cover">
        </section>
    <?php } ?>

    <!-- Grid 1-->
    <?php $data_gallery = get_field("gallery"); ?>
    <?php if($data_gallery) { ?>

        <?php if( $data_gallery['active_gallery_1']) { ?>
            <section class="holder_grid holder_grid_style_1">
                <div class="wrapHolder">
                    <?php if($data_gallery['heading_g_one']) { ?>
                        <h1 class="sub_heading_article"> <?php echo $data_gallery['heading_g_one']; ?></h1>
                    <?php } ?>
                </div>
                <div class=" mobile_full_width">

                    <?php 
                         get_template_part('template-parts/block-gallery-neighbourhood',
                         $arg, 
                         array( 
                             'my_data' => array(
                                 'data_gallery' => $data_gallery['gallery_g_one'],
                             )
                         ) 
                     ); 
                    ?>
                </div>
            </section>
        <?php } ?>
        
        

        <!-- Grid 2-->
        <?php if( $data_gallery['active_gallery_2']) { ?>
            <section class="holder_grid holder_grid_style_2">
                <div class="wrapHolder">
                    <?php if($data_gallery['heading_g_two']) { ?>
                        <h1 class="sub_heading_article"> <?php echo $data_gallery['heading_g_two']; ?></h1>
                    <?php } ?>
                </div>
                <?php 
                         get_template_part('template-parts/block-gallery-neighbourhood',
                         $arg, 
                         array( 
                             'my_data' => array(
                                 'data_gallery' => $data_gallery['gallery_g_two'],
                             )
                         ) 
                     ); 
                    ?>        
            </section>
        <?php } ?>

    <?php } ?>
    

<div>

<?php get_footer(); ?>