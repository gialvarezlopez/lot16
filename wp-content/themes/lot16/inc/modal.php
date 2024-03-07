<div class="modal-overlay registerForm" style=""></div>
<div id="holderPopupBooking" class="registerForm" style="">
	<div class="contentPopup">

        <?php $data_form = get_field("gs_register_form", "option"); ?>

        <div class="holderTitleModal">
            <div><h1 class="title  bar-yellow" style="margin-bottom: 0px; background-size: 35px 8px;"><?php echo $data_form['title']; ?></h1></div>
            <div><a href="#" id="closePopupBooking" class="closePopup"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Close_PopUp.svg"></a></div>
        </div>
		
        
		<div class="content_body">
            <?php  
                //Its check if is on the register form with the variable $form_register_on
                
            ?>  
            <?php if ( ( is_front_page() || is_page('register-form') ) && $form_register_on ) {  } else { ?>
            <div id="holder_form_booking" class="holder_form_booking">    
                <div class="fields">
                    <?php if($data_form['heading']) { ?>
                        <div class="form_heading"><br><?php //echo $data_form['heading']; ?></div>
                    <?php } ?>
                    <div class="holderFields">
                    <?php 
                        
                        if($data_form)
                        {

                            if( isset($data_form['form_id']) && $data_form['form_id'] > 0)
                            {
                                //echo "<input type='hidden' id='form_register_exist' value='".$data_form['form_id']."'>"; //This is to validate if it's loaded the form to set style in labels and select options;
                                //echo do_shortcode('[gravityforms id="1" field_values="placement=modal"]');
                                gravity_form( $data_form['form_id'], false, false, true, '', true, 12 );
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
            <?php } ?>
            <?php  ?>
	    </div>
        
	</div>
</div>





