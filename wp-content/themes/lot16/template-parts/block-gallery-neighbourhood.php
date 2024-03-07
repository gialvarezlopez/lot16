
<?php 
    $data_gallery = $args['my_data']['data_gallery']; 
?>
<div class="setRow space-between">
    <div class="col_left">
        <div>
            <?php
            $g_pro = 0;
            if ($data_gallery) {

                foreach ($data_gallery as $value => $item) {
                    $g_pro++;
                    if ($g_pro > 3) {
                        break;
                    } else {
            ?>
                        <div class="item order_<?php echo $g_pro; ?>"><img class="img_fluid" src="<?php echo  $item['url']; ?>"></div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <div class="col_right">
        <?php
        $g_pro = 0;
        foreach ($data_gallery as $value => $item) {
            $g_pro++;
            if ($g_pro > 3 && $g_pro <= count($data_gallery)) {
        ?>
                <div class="item order_<?php echo $g_pro; ?>  <?php echo ($g_pro == 4) ? " big_img " : '' ?>"><img class="img_fluid" src="<?php echo  $item['url']; ?>"></div>
        <?php
            }
        }
        ?>
    </div>
</div>