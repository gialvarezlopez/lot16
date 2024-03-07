<div id="holder_main_menu">
    <?php  $header = get_field("gs_header","option"); ?>
    <div class="wrapHolder">
        <?php if($header['phone_number']) { ?>
            <div id="phone_number_menu"><a href="tel:+1<?php echo preg_replace('/[^0-9]/', '', $header['phone_number']); ?>"><?php echo $header['phone_number']; ?></a></div>
        <?php } ?>
        <header id="main_menu">
            
            <a href="<?php echo home_url(); ?>">
                <?php if($header['logo']) { ?>
                    <img src="<?php echo $header['logo']['url']; ?>" class="logo_top"> 
                <?php  } ?>  
            </a>    
            <div id="holder_items_menu">
                <div class="holder-icon-main-menu">
                    <img class="icon-action-menu" id="icon-menu-open" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_open.svg">
                    <img class="icon-action-menu" id="icon-menu-close" src="<?php echo get_stylesheet_directory_uri(); ?>/images/menu_close.svg">
                </div>
                
                <div id="nav-parent">
                    <div class="holderMenuItems">
                        <?php 
                            $args = array(
                                'theme_location' => 'header-menu',
                                'menu_class'=>'h-menu',
                                'menu_id'=> '',
                                'add_li_class'  => 'nav-item'
                            );
                            wp_nav_menu($args);
                        ?>
                        <!--
                        <ul class="no-style">
                            <li><a href="story.php" class="">Story</a></li>
                            <li><a href="neighbourhood.php">Neighbourhood</a></li>
                            <li><a href="amenities.php">Amenities</a></li>
                            <li><a href="suites.php">Suites</a></li>
                            <li><a href="floorplans.php">Floorplans</a></li>
                            <li><a href="thecollab.php">The Collab</a></li>
                            <li><a href="team.php">Team</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="#" class="btn btn-yellow btn-open-register">Register</a></li>
                        </ul>
                        -->
                    </div>
                </div>
            </div>
            
        </header>
    </div>
</div>