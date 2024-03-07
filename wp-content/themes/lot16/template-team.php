<?php
    /*
     * Template Name: Template Team
     */
?>
<?php  get_header(); ?>

<div class="mainHolder">

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



    <section class="team_companies">
        <div class="wrapHolder">
            <div class="info">

                <?php $data_companies = @get_field("t_company");
                    if(isset($data_companies) && count($data_companies) > 0)
                    {
                        $num = 0;
                        $delay = 0;
                        foreach($data_companies as $item)
                        {
                            if($num == 3)
                            {
                                $delay = 0;
                            }
                            ?>
                            <div class="item" data-aos="fade-down" data-aos-delay="<?php echo $delay; ?>">
                                <div class="holder_img">
                                    <img src="<?php echo $item['logo_v1']['url']; ?>" class="img-fluid">
                                </div>
                                <?php if($item['heading']) { ?>
                                    <h3 class="heading"><?php echo $item['heading']; ?></h3>
                                <?php } ?>
                                <div class="description"><?php echo $item['description']; ?></div>
                            </div>
                            <?php
                            $num++;
                            $delay = $delay + 100;
                        }
                    }
                ?>        

            </div>
        </div>
    </section>

<div>

<?php get_footer(); ?>