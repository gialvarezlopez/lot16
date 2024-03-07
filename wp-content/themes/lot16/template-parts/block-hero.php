<?php  
    //linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),     
    $classes_btn = $args['my_data']['classes_btn'];
    $data_global_hero = get_field("hero_global");
    if($data_global_hero && $data_global_hero['active'] ) { ?>
        <section class="blockTopDark holder_hero">

            <section class="elem_table hero heightMainHero " style="background-image: url('<?php echo $data_global_hero['image']['sizes']['hero_v1']; ?>');">
                <?php  require_once ( get_template_directory() . "/inc/header.php"); ?>  



                <div class="holder_info leftBottom" data-aos="fade-up">
                    <div class="wrapHolder">
                        <div class="data">
                            <?php if($data_global_hero['heading']) {?>
                                <h1 data-aos="zoom-in-up" ><?php echo $data_global_hero['heading']; ?></h1>
                            <?php } ?>
                            <?php if($data_global_hero['sub_heading']) {?>
                                <h3 data-aos="zoom-in-up" ><?php echo $data_global_hero['sub_heading']; ?></h3>
                            <?php } ?>

                            <?php if($data_global_hero['link']) {?>
                                    <div class="holder-link">
                                        <?php echo printBtn($data_global_hero['link'], $classes_btn, ""); ?>
                                        <!-- <a href="#" class="btn  btn-white over-green btn-open-register">REGISTER NOW</a> -->
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>   
            </section>
        </section>
<?php }else{
    ?>
    <section class="holder_no_hero">
        <?php require_once ( get_template_directory() . "/inc/header.php"); ?>
    </section>
    <?php
} ?>