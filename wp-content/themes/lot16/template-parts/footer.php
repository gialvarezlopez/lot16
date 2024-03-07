<!-- Footer -->



<selection id="holderFooter">
    <!-- Community  -->
    <?php $footer = get_field("gs_footer","option"); ?>
    <?php if ( is_front_page() || is_page('contact') || is_page('register-now') ) {  } else {?>
        <?php if($footer['gs_townhome']) { ?>
            <section class="community">
                <div class="wrapHolder">
                    <div class="setRow space-between addGap">
                        <div class="col_left ">
                            <?php if($footer['gs_townhome']['heading']) { ?>
                                <h2 class="sub_heading_article"><?php echo $footer['gs_townhome']['heading']; ?></h2>
                            <?php } ?>
                        </div>
                        <div class="col_right">
                            <div class="content">
                                <?php if($footer['gs_townhome']['description']) { ?>
                                    <?php echo $footer['gs_townhome']['description']; ?>
                                <?php } ?>

                                <?php if($footer['gs_townhome']['link']) { ?>
                                    <div class="holder-link">
                                        <?php echo printBtn($footer['gs_townhome']['link'], "btn  btn-white over-green", ""); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section> 
        <?php } ?>
    <?php } ?>
    <section class="holderData"> 
        
        <?php $register_form = get_field('gs_register_form',"option"); ?>
        <?php $logos = $footer['gs_logos']; ?>
        <?php $contact = $footer['gs_contact'];?>
        <?php $partner = $logos['partner'];?>
        <div class="wrapHolder">
            <footer>
                <div class="wrapFooter">
                    <!-- Centre -->
                    <div class="col_left">
                        <!-- Address -->
                        <div>
                            <?php 
                            $data_presentation = $footer["gs_presentation"];
                            if($data_presentation)
                            {
                                if($footer["gs_presentation"]['heading'])
                                {
                                    ?>
                                    <h4><?php echo $footer["gs_presentation"]['heading']; ?></h4>
                                    <?php
                                }

                                if($footer["gs_presentation"]['phone_number'])
                                {
                                    ?>
                                    <p><?php echo $footer["gs_presentation"]['phone_number']; ?></p>
                                    <?php
                                }

                                if($footer["gs_presentation"]['address'])
                                {
                                    ?>
                                    <p><?php echo $footer["gs_presentation"]['address']; ?></p>
                                    <?php
                                }

                                if($footer["gs_presentation"]['schedule'])
                                {
                                    ?>
                                    <p><?php echo $footer["gs_presentation"]['schedule']; ?></p>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Social network-->
                    <div class="col_center">
                            <?php 
                                if($contact['heading'])
                                {
                                    ?>
                                    <h4><?php echo  $contact['heading']; ?></h4>
                                    <?php
                                }

                                if($contact['email'])
                                {
                                    ?>
                                    <p><?php echo $contact['email']; ?></p>
                                    <?php
                                }

                                $socialNetwork = $contact['social_network'];
                                if($socialNetwork) 
                                { 
                                    foreach($socialNetwork as $item)
                                    {
                                        ?>
                                            <a href="<?php echo $item['url']; ?>" target="_new"><image src="<?php echo $item['icon']['url']; ?>"></a>
                                        <?php
                                    } 
                                }       
                            ?>
                    </div>

                    <!-- Copyright -->
                    <div class="col_right">
                        <!-- Brands -->   
                        <div class="brands">
                            <a href="<?php echo home_url(); ?>"><image src="<?php echo $logos['main_logo']['url']; ?>" class="logo_footer"></a>
                            <?php 
                                if($partner)
                                {
                                    foreach($partner as $item)
                                    {
                                        ?>
                                            <a href="<?php echo $item['url']; ?>"><image src="<?php echo $item['logo']['url']; ?>" style="max-width:147px"></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <!-- Copyright -->
                        <div class="copyright">        
                            <?php if($footer['gs_copyright']) { ?>
                                <div><?php echo $footer['gs_copyright']['description']; ?></div>
                                
                            <?php } ?>
                        </div>

                        <?php if($footer['gs_copyright']['link']) { ?>
                            <div class="privacy_police">
                                <a href="<?php echo $footer['gs_copyright']['link']['url']; ?>" target="<?php echo $footer['gs_copyright']['link']['target']; ?>">
                                    <?php echo $footer['gs_copyright']['link']['title']; ?>
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </footer>
        </div>
    </section>
</section>