<?php get_header(); ?>

<div class="mainHolder">

    <section class="blockTop">

        <section class="no-hero hide-mobilex">
            <?php $logo_dark = true; ?>
            <?php include("inc/header.php"); ?>  
            <div class="wrapHolder">
                <div class="holder_info posCenter"  data-aos="fade-up" data-aos-delay="400">
                    
                    <h1><?php the_title(); ?></h1>
                    
                    <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                </div>
            </div>
        </section>
    </section>

	<section class="">
		<div class="wrapHolder">

			<?php 
				$beds=  get_field("beds");
				$baths = get_field("baths");
				$sqft = get_field("sqft");
			?>
		</div>
	</section>
	<section class="floorplans_holder single">
		<div class="wrapHolder">		
			<!-- Content Post Project -->
			<?php while(have_posts()): the_post(); ?>

				<?php $fields = get_field('information', get_the_ID(), true); ?>
				<?php 
					$url_poster = "";
					if ( has_post_thumbnail() ) {
						//the_post_thumbnail_url ( );// this no return the url
						$url_poster= get_the_post_thumbnail_url( null, 'block_3' ); //This return the url
						$large_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
						if($url_poster)
						{
							?>
							<div class="text-center">
								<img src="<?php echo $large_image; ?>" class="img-fluid">
								<!--
								<div class="features">
									<div>2 Bed</div>
									<div>2 Bath</div>
									<div>718 Sq. ft</div>
								</div>
								-->
							</div>
							<?php
						}
					}
					$logo = "";
					$classInfo = "col-flex content info child";
					$classImage= "col-flex bg-image";

				?>	

			<?php endwhile; ?>
		</div>
	</section>	
</div>

	

<?php get_footer(); ?>
