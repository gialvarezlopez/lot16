<?php
    /*
     * Template Name: Template Building
     */
?>
<?php  get_header(); ?>

<div class="mainHolder page_bi main_building">

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

    <!-- endless  -->
    <?php $data_endless = get_field("block_endless");?>  
    <?php if($data_endless) { ?>  
        <section class="endless">
            <div class="wrapHolder mobile_full_width">
                <div class="setRow align-end addGap">
                    <div class="col_left">
                        <img src="<?php echo $data_endless['image_one']['sizes']['block_2']; ?>" class="img-fluid">
                    </div>
                    <div class="col_right">
                        <img src="<?php echo $data_endless['image_two']['sizes']['block_2']; ?>" class="img-fluid">
                    </div>
                </div>
            </div>    
            <div class="wrapHolder">
                <div class="copy">
                    <?php 
                        get_template_part('template-parts/block-article',
                            $arg, 
                            array( 
                                    'my_data' => array(
                                        'data_article' => $data_endless,
                                        'btn_class'=> 'btn  btn-white over-green',
                                        'one_header_only'=> true,
                                    )
                                ) 
                            ); 
                    ?>
                </div>
            </div>
        </section>
    <?php } ?>
 
   

    <?php $data_view = get_field("block_view");?>  
    <?php if($data_view) { ?> 
        <section class="content_blocks_bg vhx gb_green keep_bg">
            <div class="content">
                <div class="wrapHolder">
                    <div class="setRow list">
                        <div class="info">
                            <div class="description">

                                <div id="neighbourhood_features" class="neighbourhood_features  remove-aos-for-mobile">
                                    <div class="description" data-aos="zoom-in">

                                        <?php 
                                            get_template_part('template-parts/block-article',
                                                $arg, 
                                                array( 
                                                        'my_data' => array(
                                                            'data_article' => $data_view,
                                                            'btn_class'=> 'btn  btn-white over-green',
                                                            'one_header_only'=> true,
                                                        )
                                                    ) 
                                                ); 
                                        ?>
                                        <!-- <h2 class="sub_heading_article">THE Interiors</h2> -->
                                        <!-- 
                                        <h1 class="sub_heading_article"><span>A LOT</span><br> OF VIEWS</h1>
                                        <div class="description_article">
                                            <p class="">This unique property features modern architecture with open, functional spaces designed to put your needs first. Whether enjoying rooftop terraces, community green spaces or scenic ravine vistas, there is plenty of space for you and your family to grow and connect.</p>
                                        </div>
                                        -->
 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
            <div class="setRow parent_ken">
                <div class="holder_color"></div>
                <!-- <div class="holder_image ken" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)), url('<?php //echo $data_location['image']['url']; ?>');"> -->
                    <!-- <h3 class="spaceName">Co-working Space</h3> -->
                <div class="holder_image">    
                    <img src="<?php echo  $data_view['image']['sizes']['block_3'];?>" class="">
                </div>
            <div>
        </section>
    <?php } ?>


    




<div>

<?php get_footer(); ?>