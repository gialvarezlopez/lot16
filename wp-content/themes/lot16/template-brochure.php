<?php
    /*
     * Template Name: Template Brochure
     */
?>
<?php  get_header(); ?>

<div class="mainHolder">

    <!-- Hero section -->
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

    <!-- Bruchre Block -->
    <section class="holder_brochure">
        <div class="wrapHolder">
            <div class="">
                <!--
                <div class="col_left">
                    <h1>HAVE IT ALL,<br>
                        <span>FROM HOME.</span>
                    </h1>
                </div>
                -->
                <div class="col_right">
                    <section class="flip container-iframe" data-aos="zoom-in">
                        <?php 
                            $data = get_field("brochure");
                            if($data)
                            {
                                echo $data['code'];
                            }
                        ?>
                    </section>    
                        <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/from_xd/brochure/Brochure_Spread.jpg" class="full-cover"> -->
                </div>
            </div>
        </div>
    </section>

    
<div>

<?php get_footer(); ?>