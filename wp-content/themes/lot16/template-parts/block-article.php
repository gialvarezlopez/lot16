
<?php 
    $classes_article = $args['my_data']['data_article']; 
    $classes_btn = $args['my_data']['btn_class'];
    $one_header_only = $args['my_data']['one_header_only'];
?>

<?php if( $one_header_only) { ?>

    <?php if( isset($classes_article['heading']) && $classes_article['heading'] != "") { ?>
        <h2 class="sub_heading_article"><?php echo $classes_article['heading']; ?></h2>
    <?php } ?>

<?php }else{ ?>

    <?php if( isset($classes_article['heading']) && $classes_article['heading'] != "") { ?>
        <h1 class="heading_article"><?php echo $classes_article['heading']; ?></h1>
    <?php } ?>

    <?php if( isset($classes_article['sub_heading']) && $classes_article['sub_heading'] != "") { ?>
        <h2 class="sub_heading_article"><?php echo $classes_article['sub_heading']; ?></h2>
    <?php } ?>
<?php } ?>



<?php if( isset($classes_article['description']) && $classes_article['description'] != "") { ?>
    <div class="description_article">
        <?php echo $classes_article['description']; ?>
    </div>
<?php } ?>    

<?php if( isset($classes_article['link']) && $classes_article['link'] != "") { ?>
    <div class="holder-link">
        <?php echo printBtn($classes_article['link'], $classes_btn, ""); ?>
    </div>
<?php } ?>

