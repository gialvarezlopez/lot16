
<?php //echo ( $args['my_data']['sections'] ); ?>
<?php
$num = $args['my_data']['startFrom'];
$leftContentPosition = $args['my_data']['leftContentPosition'];
foreach($args['my_data']['sections'] as $item){
    if ($num%2==0){
        //"El $num es par";
        $set_classes_holder = "content_blocks_bg vh content-left content-align-left";
        $set_class_info = "";
    }else{
        //echo "El $num es impar";
        $set_classes_holder = "content_blocks_bg vh content-align-left";
        $set_class_info = $leftContentPosition;
    }
    ?>
    <section class="<?php echo $set_classes_holder; ?>">
        <div class="content">
            <div class="wrapHolder">
                <div class="setRow">
                    <div class="info <?php echo $set_class_info; ?>">
                        <div class="description" data-aos="fade-down">
                            <h3 class="big"><?php echo $item['title']; ?></h3>
                            <?php echo $item['description']; ?>
                        </div>
                    </div>
                    <div class=""></div>
                </div>
            </div>
        </div>
        <div class="setRow" data-aos="zoom-in-up">

            <?php   if ($num%2==0){ //par ?>
                <!--<div class="holder_image" style="background-image: url('<?php //echo $item['image']['sizes']['block_3']; ?>');"> -->
                <div class="holder_image">       
                    <img src="<?php echo  $item['image']['sizes']['block_3']; ?>" class="">
                    <!-- <h3 class="spaceName">Co-working Space</h3> -->
                </div>
                <div class="holder_color"></div>
            <?php }else{?>
                <div class="holder_color"></div>
                <!-- <div class="holder_image" style="background-image: url('<?php //echo $item['image']['sizes']['block_3']; ?>');">-->
                <div class="holder_image">
                    <img src="<?php echo  $item['image']['sizes']['block_3']; ?>" class="">
                    <!-- <h3 class="spaceName">Co-working Space</h3> -->
                </div>
            <?php } ?>
                                
        <div>
    </section>
<?php 
    $num++;
} 
?>                    