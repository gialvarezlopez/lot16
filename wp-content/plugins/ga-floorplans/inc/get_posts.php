<?php
$dataPost = $paramenters;
//$set_first_title = $dataPost
?>
<div class="floorplans_holder">
    <?php
    //var_dump($dataPost);
    if ($dataPost['item_to_show'] != "" && $dataPost['order_by'] != "" &&  $dataPost['show_more']) {
        $item_to_show = $dataPost['item_to_show'];
        $order_by =  $dataPost['order_by'];
    }else{
        $item_to_show = -1;
        $order_by =  'DESC';
    }

    $args = array(
        'post_type' => 'floorplans',
        'post_status' => 'publish',
        'posts_per_page' => $item_to_show,
        //'posts_per_page' => -1,
        'orderby'     => 'post_date',
        'order'       => $order_by, //'DESC',
        //'orderby'     => 'ID'

    );

    //var_dump($args);
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) : ?>
        
            <div class="grid" id="list_flooplants">
                <?php $numberProject = 1; ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <div class="child">
                        <?php
                        $url_poster = "";
                        if (has_post_thumbnail()) {
                            //the_post_thumbnail_url ( 'gallery_project' ); this no return the url
                            $url_poster = get_the_post_thumbnail_url(null, 'single_v1'); //This return the url
                            $large_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        }
                        ?>
                        <div class="holder_image">
                            <img src="<?php echo $large_image; ?>" class="img-fluid">
                        </div>

                        <?php if ($dataPost['features']) { ?>

                            <div class="features">
                                <div><?php echo get_field("beds"); ?> Bed</div>
                                <div><?php echo get_field("baths"); ?> Bath</div>
                                <div><?php echo get_field("sqft"); ?> Sq. ft</div>
                            </div>

                        <?php } ?>

                        <h3><a href="#" class="btn-link dark opemModalFloorplan" data-fullimage='<?php echo $large_image; ?>'><?php the_title(); ?></a></h3>

                        <?php if ($dataPost['show_btn']) { ?>
                            <a href="#" class="btn-link dark opemModalFloorplan" data-fullimage='<?php echo $large_image; ?>'>View More</a>
                        <?php } ?>
                    </div>

                <?php endwhile;
                wp_reset_postdata();
                ?>
            </div>
        
    <?php endif;
    ?>
    <?php //} 
    ?>

    <?php if ($dataPost['show_more']) { ?>
        <div class="holder_load_more">
            <input type="hidden" id="load_item" value="<?php echo $item_to_show; ?>">
            <input type="hidden" id="order_by" value="<?php echo $order_by; ?>">
            <div class="content">
                <a href="#" class="btn btn-white over-green" id="view_more_floorplans">View More</a>
                <img src="<?php echo plugin_dir_url(__FILE__); ?>../images/loading.svg" class="loading_floorplans">
            </div>
        </div>
    <?php } ?>
</div>

<div class="modal-overlay floorplans" style=""></div>
<div id="holderFoorPlanPopup" class="floorplans" style="">
    <div class="contentFoorPlanPopup">
        <div class="holderTitleModal">
            <div>
                <h1 class="title  bar-white" style="margin-bottom: 0px; background-size: 35px 8px;"></h1>
            </div>
            <div><a href="#" id="closePopupFloorplans" class="closePopup"><img src="<?php echo plugin_dir_url(__FILE__); ?>../images/Close_PopUp.svg"></a></div>
        </div>
        <div class="content_body_floorplan text-center"></div>
    </div>
</div>