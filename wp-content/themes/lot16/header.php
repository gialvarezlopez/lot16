<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<?php $seo =  get_field("seo");
	if (isset($seo) && $seo['active_metadata']) {
		//Open Graph 
	?>
		<?php if (isset($seo['description']) && $seo['description'] != "" ) { ?>
			<meta name="description" content="<?php echo $seo['description']; ?>">
			<meta property="og:description" content="<?php echo $seo['description']; ?>"> <!-- Facebook -->
			<meta name="twitter:description" content="<?php echo $seo['description']; ?>"> <!-- Twitter -->
		<?php } ?>
		<?php if (isset($seo['keywords']) && $seo['keywords'] != "") { ?>
			<meta name="keywords" content="<?php echo $seo['keywords']; ?>">
		<?php } ?>

		<?php if (isset($seo['image']) && $seo['keywords'] != "" ) { ?>
			<meta property="og:image" content="<?php echo $seo['image']['sizes']['single_v1']; ?>" /> <!-- Facebook -->
			<meta name="twitter:image" content="<?php echo $seo['image']['sizes']['single_v1']; ?>"> <!-- Twitter -->
		<?php } ?>

		<meta property="og:title" content="<?php the_title(); ?>" /> <!-- Facebook -->
		<meta property="og:type" content="<?php echo (get_post_type() == "page") ? "Page" : "Article" ?>" /> <!-- Facebook -->
		<meta property="og:url" content="<?php echo get_permalink(); ?>" /> <!-- Facebook -->

		<meta name="twitter:title" content="<?php the_title(); ?>"> <!-- Twitter -->
		<meta name="twitter:card" content="summary_large_image"> <!-- Twitter -->


		
	<?php
	}
	// exit();
	?>
	<?php 
		$gtm =  @get_field('gs_google_tag_manager', 'option'); //Google tag Manager - Head code
		echo @$gtm['head'];
	?>
	<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.png">
	<title><?php wp_title('| ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>

	<?php //echo @get_field('gs_google_analytics', 'option')['code']; // Google Analytics - Head code 
	?>
	<?php wp_head(); ?>
</head>

<body>
	<?php echo @$gtm['body']; //Google tag Manager - Body code?>