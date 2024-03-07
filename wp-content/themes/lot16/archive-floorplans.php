<?php 
    $url = get_permalink( get_page_by_path( 'floorplan' ) );
    wp_redirect( $url );
    exit;
?>
