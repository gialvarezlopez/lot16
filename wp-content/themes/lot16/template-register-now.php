<?php
    /*
     * Template Name: Template Register Now
     */
?>
<?php  get_header(); ?>

<div class="mainHolder page_register_now">

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
        $heading_address = get_field("c_heading_address");
        $contact_address = get_field("c_address");
    ?>
    

    <section class="page_register_form">
        
        <img src="<?php echo  get_stylesheet_directory_uri();?>/images/register-form-left.png" class="img-fluid img-left-submit show-img-after-submit">
        <img src="<?php echo  get_stylesheet_directory_uri();?>/images/register-form-right.png" class="img-fluid img-right-submit show-img-after-submit">
        
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
<div>

<?php get_footer(); ?>