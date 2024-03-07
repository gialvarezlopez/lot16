<?php
/*
    Plugin Name: Floor Plans - Post Types
    Plugin URI: expertel.ca
    Description: Add Post Types into website
    Version: 1.0.0
    Author: Gio Alvarez
    Author URI: 
    Text Domain: GAFL
*/

if(!defined('ABSPATH')) die();

function dev_ga_floorplans()
{
	wp_enqueue_script('jquery');
	wp_enqueue_style('ga_fl_style.css', plugin_dir_url( __FILE__ ).'css/style.css', array(), '1.0');
	wp_enqueue_script('ga_fl_scripts.js', plugin_dir_url((__FILE__)).'js/script.js', array('jquery'), '1.0');
}

add_action('wp_enqueue_scripts', 'dev_ga_floorplans');
// add_action('admin_enqueue_scripts', 'ctrn_js_css_files');

// Registrar Custom Post Type
function do_floorplans_post_type() {

	$labels = array(
		'name'                  => _x( 'Floor Plans', 'Post Type General Name', 'GAFL' ),
		'singular_name'         => _x( 'Floor Plan', 'Post Type Singular Name', 'GAFL' ),
		'menu_name'             => __( 'Floor Plans', 'GAFL' ),
		'name_admin_bar'        => __( 'Floor plans', 'GAFL' ),
		'archives'              => __( 'Archives', 'GAFL' ), 
		'attributes'            => __( 'Attributes', 'GAFL' ), 
		'parent_item_colon'     => __( 'Parent Floor Plan', 'GAFL' ), 
		'all_items'             => __( 'Floor Plans', 'GAFL' ), 
		'add_new_item'          => __( 'Add New Floor Plan', 'GAFL' ),
		'add_new'               => __( 'Add New', 'GAFL' ), 
		'new_item'              => __( 'New Floor Plan', 'GAFL' ), 
		'edit_item'             => __( 'Edit Floor Plan', 'GAFL' ), 
		'update_item'           => __( 'Update Floor Plan', 'GAFL' ),
		'view_item'             => __( 'View Floor Plan', 'GAFL' ), 
		'view_items'            => __( 'View Floor Plans', 'GAFL' ),
		'search_items'          => __( 'Buscar Clase', 'GAFL' ), 
		'not_found'             => __( 'No floor Plans found.', 'GAFL' ), 
		'not_found_in_trash'    => __( 'No floor Plans found in Trash.', 'GAFL' ), 
		'featured_image'        => __( 'Featured Image', 'GAFL' ),
		'set_featured_image'    => __( 'Save Featured Image', 'GAFL' ), 
		'remove_featured_image' => __( 'Remove Featured Image', 'GAFL' ),
		'use_featured_image'    => __( 'Use as Featured Image', 'GAFL' ),
		'insert_into_item'      => __( 'Insert into floor plans', 'GAFL' ),
		'uploaded_to_this_item' => __( 'Uploaded to this floor plans', 'GAFL' ), 
		'items_list'            => __( 'Floor plans list', 'GAFL' ), 
		'items_list_navigation' => __( 'Floor plans list navigation', 'GAFL' ),
		'filter_items_list'     => __( 'Filter Floor Plans', 'GAFL' ), 
	);
	$args = array(
		'label'                 => __( 'Floor Plan', 'GAFL' ),
		'description'           => __( 'Floor plans for website', 'GAFL' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail'),
		'hierarchical'          => true, // true = posts , false = paginas
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        //'menu_position'         => 6,
        'menu_icon'             => 'dashicons-grid-view',
		//'menu_icon' 			=> get_stylesheet_directory_uri() . '/article16.png', 
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',

		// This is where we add taxonomies to our CPT
        //'taxonomies'          => array( 'category', 'post_tag' ),
	);
	register_post_type( 'floorplans', $args ); //wporg_ is required before the name
	//flush_rewrite_rules();// If that doesn’t work you can add a line of code after you register the post type:

	//This add categories only for the custom post type
	register_taxonomy("categories", array("floorplans"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => array( 'slug' => 'floorplans', 'with_front'=> false )));
}
add_action( 'init', 'do_floorplans_post_type', 0 );


add_action("admin_init", "admin_init");

function admin_init(){
	//add_meta_box("year_completed-meta", "Year Completed", "year_completed", "floorplans", "side", "low");
	add_meta_box("credits_meta", "Features", "credits_meta", "floorplans", "normal", "low");
}

  
function credits_meta() {
	global $post;
	$custom = get_post_custom($post->ID);
	$beds = $custom["beds"][0];
	$baths = $custom["baths"][0];
	$sqft = $custom["sqft"][0];
	?>
	<p>
		<label>Beds:</label>
		<input type="text" name="beds" value="<?php echo $beds; ?>">
  	</p>
	<p>
		<label>Baths:</label>
		<input type="text" name="baths" value="<?php echo $baths; ?>">
	</p>
	<p>
		<label>Sq ft:</label>
		<input type="text" name="sqft" value="<?php echo $sqft; ?>">
	</p>
	<?php
}


//Save data
add_action('save_post', 'save_details');
function save_details(){
	global $post;
	if(isset($_POST["beds"]) || isset($_POST["baths"])){
		//update_post_meta($post->ID, "year_completed", $_POST["year_completed"]);
		update_post_meta($post->ID, "beds", $_POST["beds"]);
		update_post_meta($post->ID, "baths", $_POST["baths"]);
		update_post_meta($post->ID, "sqft", $_POST["sqft"]);
	}
}

function sync_post($paramenters) {
	ob_start();
	$url_template_pdf = plugin_dir_path( __FILE__ )."inc/get_posts.php";
	require($url_template_pdf);
	$output = ob_get_clean();
  	// now what ever you echoed in the file.php is inside the output variable
	return $output;
}

/**
 * The [wporg] shortcode.
 *
 * Accepts a title and will display a box.
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @param string $content Shortcode content. Default null.
 * @param string $tag     Shortcode tag (name). Default empty.
 * @return string Shortcode output.
 */
function wporg_shortcode( $atts = [], $content = null/*, $tag = ''*/ ) {
	
	// normalize attribute keys, lowercase
	$atts = array_change_key_case( (array) $atts, CASE_LOWER );

	
	// override default attributes with user attributes
	$wporg_atts = shortcode_atts(
		array(
			'title' => '',
			'item_to_show' => false,
			'order_by' => false,
			'show_more'=> false,
			'show_btn' => true,
			'features' => false,
			'col'=> 4,
		), 
		$atts, 
		//$tag
	);
	
	echo sync_post($wporg_atts);
	?>
	<?php
}

/**
 * Central location to create all shortcodes.
 */
function wporg_shortcodes_init() {
	
	add_shortcode('floorplans', 'wporg_shortcode' );
}

add_action( 'init', 'wporg_shortcodes_init' );

//[floorplan col='https://www.facebook.com/Hostinger/']


//===============================================================================================
//Pagination
//===============================================================================================
add_action( 'wp_ajax_pagination-load-posts', 'pagination_load_posts' );

add_action( 'wp_ajax_nopriv_pagination-load-posts', 'pagination_load_posts' ); 

function pagination_load_posts() {

    global $wpdb;
    // Set default variables
    $msg = '';

    if(isset($_POST['page'])){
        // Sanitize the received page   
        $per_page = sanitize_text_field($_POST['page']);
        $order_by = sanitize_text_field($_POST['order_by']);
        $start = sanitize_text_field($_POST['startFrom']);;
        //$cur_page = $page;
        //$page -= 1;
        // Set the number of results to display
        //$per_page = 4;
        //$previous_btn = true;
        //$next_btn = true;
        //$first_btn = true;
        //$last_btn = true;
        //echo $start = $page * $per_page;

        // Set the table where we will be querying data
        $table_name = $wpdb->prefix . "posts";

        // Query the necessary posts
        //echo  "SELECT * FROM  $table_name WHERE post_type = 'floorplans' AND post_status = 'publish' ORDER BY post_date DESC LIMIT  $start $per_page";

        $all_blog_posts = $wpdb->get_results($wpdb->prepare("
            SELECT * FROM " . $table_name . " WHERE post_type = 'floorplans' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );

        // At the same time, count the number of queried posts
        //$count = $wpdb->get_var($wpdb->prepare("
            //SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'floorplans' AND post_status = 'publish'", array() ) );

        /*
         * Use WP_Query:
         **/
        $all_blog_posts = new WP_Query(
            array(
                'post_type'         => 'floorplans',
                'post_status '      => 'publish',
                'posts_per_page'    => $per_page,
                'offset'            => $start,
                'orderby'           => 'post_date',
                'order'             => $order_by, //'DESC',
                
            )
        );
        /*
        $count = new WP_Query(
            array(
                'post_type'         => 'post',
                'post_status '      => 'publish',
                'posts_per_page'    => -1
            )
        );
        */

        // Loop into all the posts
        //var_dump($all_blog_posts);
        $numPros = 0;
        //foreach($all_blog_posts as $key => $post):
        $html = "";
        while ( $all_blog_posts->have_posts() ) : $all_blog_posts->the_post(); 

            // Set the desired output into a variable 
           

            $html .="<div class='child'>";
             
                    $url_poster = "";
                    if ( has_post_thumbnail() ) {
                                            //the_post_thumbnail_url ( 'gallery_project' ); this no return the url
                        $url_poster = get_the_post_thumbnail_url( null, 'single_v1' ); //This return the url
                        $large_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    }
                
                $html .= "<div class='holder_image'>";
                    $html .= "<img src='".$large_image."' class='img-fluid'>";
                $html .="</div>";
                
                $html .="<div class='features'>";
                $html .="<div>".get_field("beds")." Bed</div>";
                $html .="<div>".get_field("baths")." Bath</div>";
                $html .="<div>".get_field("sqft")." Sq. ft</div>";
                $html .="</div>";
				//$html .="<h3>".get_the_title()."</h3>";
                $html .="<a href='#' class='btn btn-brown opemModalFloorplan' data-fullimage='".$large_image."'><h3>".get_the_title()."</h3></a>";
            $html .="</div>";
        
            $numPros++;       
        endwhile;
        wp_reset_postdata();
        //endforeach;
       

        wp_send_json( 
            array( 
              'html' =>  $html,
              'items' => $numPros,
            )
        );
        // Always exit to avoid further execution
        wp_die();

    }
    
   
}
