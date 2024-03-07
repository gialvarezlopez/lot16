<?php
    /*
     * Template Name: Template Interiors
     */
?>
<?php  get_header(); ?>

<div class="mainHolder page_bi main_interiors">

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

<?php $data_kitchen = get_field("kitchen");?>  
<?php if($data_kitchen) { ?> 
    <section id="holder_kitchen" class="content_blocks_bg  block_content fifti content-left content-align-left">
        <div class="content">
            <div class="wrapHolder">
                <div class="setRow">
                    <div class="info">
                        <div class="description_v2 left" data-aos="zoom-in">

                        <?php 
                            get_template_part('template-parts/block-article',
                                $arg, 
                                array( 
                                    'my_data' => array(
                                        'data_article' => $data_kitchen,
                                        //'btn_class'=> 'btn  btn-white over-green',
                                        'one_header_only'=> true,
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
            <div class="holder_image">       
                <img src="<?php echo  $data_kitchen['image']['sizes']['block_2']; ?>" class="">
            </div>
            <div></div>

            <div class="holder_color"></div>
        </div>
    </section>
<?php } ?>


<?php $data_living_room = get_field("living_room");?>  
<?php if($data_living_room) { ?> 
    <section class="livingroom">
        <img src="<?php echo  $data_living_room['image']['sizes']['hero_v1']; ?>" class="full-cover">
        <div class="wrapHolder">
            <div class="setRow">
                <div class="col_left">
                    <?php if($data_living_room['heading']) { ?>
                        <h2 class="sub_heading_article"><?php echo $data_living_room['heading']; ?></h2>
                    <?php } ?>
                </div>
                <div class="col_right">
                    <div class="description_article">
                        <?php if($data_living_room['description']) { ?>
                            <?php echo $data_living_room['description']; ?>
                        <?php } ?>
                        <div class="holder-link">
                            <?php echo printBtn($data_living_room['link'], "btn  btn-white over-green", ""); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<!-- Block Bedroom -->
<?php $data_bedroom = get_field("bedroom");?>  
<?php if($data_bedroom) { ?> 
    <section class="content_blocks_bg right_content  gb_green keep_bg">
        <div class="content">
            <div class="wrapHolder">
                <div class="setRow list">
                    <div class="info">
                        <div class="description">
                            <div id="neighbourhood_features" class="neighbourhood_features  remove-aos-for-mobile">
                                <div class="" data-aos="zoom-in">
                                    <?php 
                                        get_template_part('template-parts/block-article',
                                            $arg, 
                                            array( 
                                                'my_data' => array(
                                                    'data_article' => $data_bedroom,
                                                    //'btn_class'=> 'btn  btn-white over-green',
                                                    'one_header_only'=> true,
                                                )
                                            ) 
                                        ); 
                                    ?>
                                    <!--
                                    <div class="holder-link">
                                            
                                        <a href="#" class="btn  btn-white over-green btn-open-register">REGISTER NOW</a>
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
            <div class="holder_image">    
                <img src="<?php echo $data_bedroom['image']['sizes']['block_3']; ?>" class="">
            </div>
            <div class="holder_color"></div> 
        <div>
    </section>
<?php } ?>

<?php get_footer(); ?>