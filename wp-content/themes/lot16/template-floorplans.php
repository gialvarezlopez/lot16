<?php
    /*
     * Template Name: Template Floorplans
     */
?>
<?php  get_header(); ?>

<?php $data_options = get_field("fl_options");?>
<div class="mainHolder floorplan_page">
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


    <?php $display_item = get_field('fl_options')['display_item_to_show']; ?>
    <?php $item_to_show = ($display_item)?$display_item:4;?>
    <?php $order_by =  get_field('fl_options')['order_by']; ?>
    <?php $order_by =  isset($order_by)?$order_by:"ASC"; ?>

    <!-- Floorplans -->
    <section>
        <div class="wrapHolder">

                <?php 
                    //$newData = array("item_to_show"=>$item_to_show, "order_by"=>$order_by, "query"=>$args); //"item_to_show"='".$item_to_show."' order_by='".$order_by."'
                    echo do_shortcode('[floorplans features="true" show_btn="" show_more="true" item_to_show='.$item_to_show.' order_by='.$order_by.' ]'); 
                ?>

        </div>
    </section>

<div>

<?php get_footer(); ?>