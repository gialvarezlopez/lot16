<?php  
    //linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),     
    $classes_btn = $args['my_data']['classes_btn'];
    $data_hero = $args['my_data']['data_video'];
    //$data_global_hero = get_field("hero_global");


    if(   $data_hero ) { ?>
        <section class="blockTopDark holder_hero ">
            <div class="video-wrapper">
                    <section id="holder_dinamic_hight" class="elem_table hero heightMainHero " style="background-image: url('<?php //echo $data_global_hero['image']['sizes']['hero_v1']; ?>');">
                        <?php  require_once ( get_template_directory() . "/inc/header.php"); ?> 
                        
                        <?php 
                            $user_agent = $_SERVER["HTTP_USER_AGENT"];
                            if(preg_match("/(android|webos|avantgo|iphone|ipod|ipad|bolt|boost|cricket|docomo|fone|hiptop|opera mini|mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",$user_agent ))
                            {
                                //"mobile device detected";
                                ?>
                                <video playsinline autoplay muted loop poster="" id="video_mobile">
                                        <source src="<?php echo $data_hero['video_for_mobile']['url']; ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                </video>
                                <?php
                            }
                            else{
                                //"Desktop detected";
                                ?>
                                 <video playsinline autoplay muted loop poster="" id="video_desktop">
                                        <source src="<?php echo $data_hero['video_for_desktop']['url']; ?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                </video>
                                <?php
                            }
                        ?>
                        <div class="holder_info leftBottom" data-aos="fade-up">
                            <div class="wrapHolder">
                                <div class="data">
                                    <?php if($data_hero['heading']) {?>
                                        <h1 data-aos="zoom-in-up" ><?php echo $data_hero['heading']; ?></h1>
                                    <?php } ?>
                                    <?php if($data_hero['sub_heading']) {?>
                                        <h3 data-aos="zoom-in-up" ><?php echo $data_hero['sub_heading']; ?></h3>
                                    <?php } ?>

                                    <?php if($data_hero['link']) {?>
                                            <div class="holder-link">
                                                <?php echo printBtn($data_hero['link'], $classes_btn, ""); ?>
                                                <!-- <a href="#" class="btn  btn-white over-green btn-open-register">REGISTER NOW</a> -->
                                            </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div> 
                
                        <div></div>
            </section>
            </div>
            
        </section>
<?php }else{
    ?>
    <section class="holder_no_hero">
        <?php //require_once ( get_template_directory() . "/inc/header.php"); ?>
    </section>
    <?php
} ?>