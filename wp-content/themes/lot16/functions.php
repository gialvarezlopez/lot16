<?php
//Implement Cookie with HTTPOnly and Secure flag in WordPress

function moment_settings(){
	//Featured Image
	add_theme_support('post-thumbnails');

	//===================
	//Sizes custom
    //===================
    add_image_size('hero_v1', 1680,834, true); //Crop with true, General, Home, story, neighbourhood, amenities, the collab


    
    add_image_size('block_1', 738,524, true); //Crop with true, Home(caroucel)
    add_image_size('block_2', 866,631, true); //Crop with true, (block square)
    add_image_size('block_3', 958,631, true); //Crop with true, (block green)


    add_image_size('floorplans', 331,352, true); //Crop with true, floorplans


}

add_action('after_setup_theme','moment_settings');

/* CSS and JS */
function moment_styles(){
	//==============================
	//Add style page
	//==============================
	wp_enqueue_style("fonts", get_template_directory_uri().'/fonts/stylesheet.css',array(),'1.0.0');
    wp_enqueue_style("reset", get_template_directory_uri().'/css/reset.css',array(),'1.0.0');


    //==============================
	//Add owlcarousel
	//==============================
    wp_enqueue_style("owlcarousel.css", get_template_directory_uri().'/assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.css',array(),'1.0.0');
    wp_enqueue_script('owlcarousel.js',get_template_directory_uri()."/assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js", array('jquery'), '1.0.0', true);

    wp_enqueue_script("map","https://maps.googleapis.com/maps/api/js?key=AIzaSyBCqlE5LPXWk10XZ2yHJpOKz2rAssty7gk&callback=initMap", array(), '1.0', true);

    //Main theme CSS
    wp_enqueue_style("theme", get_template_directory_uri().'/css/theme.css',array(),'1.0.13');

    //==============================
	//Main Scripts
	//==============================
    wp_enqueue_script('script-js',get_template_directory_uri()."/js/script.js", array('jquery'), '1.0.4', true);

    //Ajax
    wp_localize_script( 'script-js', 'ajax_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
        'nonce'  => wp_create_nonce( 'my-ajax-nonce' ),
    ) );
    
}
add_action("wp_enqueue_scripts", "moment_styles");



/*Menus*/
function moment_menus(){
    register_nav_menus( array(
        'header-menu' => 'Header Menu',
    ));
}
add_action("init","moment_menus" );


//add_action('acf/init', 'my_acf_op_init');

if( function_exists('acf_add_options_page') ) {
    
    $parent =  acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}



function printBtn($arrLink, $defaultClasses, $id="")
{
    
    $classLink = "";
    $openTarget = "";
    $link = $arrLink;
    if ($link) {
        //echo $link['url'];
        if ($link['url'] == "#") {
            if($id != "")
            {
                $classLink = "";
            }else{
                $classLink = "btn-open-register";
            }
            
        } else {
            $openTarget = "target='" . $link['target'] . "'";
        }

        $btnLink = "<a id='".$id."' href='" . $link['url'] . "' class='".$defaultClasses." ". $classLink . "' " . $openTarget . ">" . $link['title'] . "</a>";
        return $btnLink;
    }
    
}



function renderGrid($data_grid_item, $className="", $size, $delay)
{
    $html_grid = "";
    if($delay > 0){
        $data_delay = "data-aos-delay='".$delay."'";
    }
    if( $data_grid_item['option'] == "image")
    {    
        $html_grid .="<div class='".$className."' data-aos='fade-up'  $data_delay >";
            $html_grid .="<figure class='circleEffect'><img src='".$data_grid_item['image']['sizes'][$size]."' class='img-fluid'></figure>";
        $html_grid .="</div>";
    }else
    {
        $background_color = $data_grid_item['background_color'];
        $text_color = $data_grid_item['text_color'];
        $set_style = "background-color:$background_color; color:$text_color;";

        $html_grid .= "<div class='".$className."' style='".$set_style."' data-aos='fade-up' $data_delay>";
            $html_grid .= "<h2>".$data_grid_item['heading']."</h2>";
        $html_grid .= "</div>";
    }
    echo $html_grid;
}




function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');


function is_live()
{

    //return true;

	$the_website_ip = $_SERVER['SERVER_ADDR'];

	if (
		(strpos($the_website_ip, '127.0.0.1') !== false)
		||
		(strpos($the_website_ip, '::1') !== false)
		||
		(strpos($the_website_ip, '142.93.153.126') !== false)
		||
		(strpos($the_website_ip, '40.86.253.117') !== false)
	) {
		return false;
	}
	return true;
}


//After submit Register form
require get_theme_file_path('/inc/gravity-form.php');


