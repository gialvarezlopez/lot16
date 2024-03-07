



<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php get_header(); ?>

    <div class="page-blog-detail">

        <section class="holderTopMenu blue">
            <div class="wrapHolder"><?php include("inc/_header.php"); ?></div>
        </section>


        <section class="holder-back-blog">
            <div class="wrapHolder">
                <a href="<?php echo home_url( '/blog/' ) ?>"> > go back to blog</a>
            </div>
        </section>



        <div class="text-center page-name">
            <div class="wrapHolder">
                <h1 class="title-xl uppercase"><?php the_title(); ?></h1>
                <div class="description"><?php the_content(); ?></div>
            </div>
        </div>



        <section class="holder-detail">
            <div class="wrapHolder">
                <div class="content">

                    <?php 
                        if ( has_post_thumbnail() ) { 
                            
                            ?>
                            <div class="picture"><?php echo the_post_thumbnail( 'hero_v3'); ?></div>
                            <?php
                        }
                    ?>
                    <!-- <div class="picture"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/images/blog/detail/hero-038-_D756222.png"></div> -->

                    <?php 
                        $data = get_field("content");
                        if( $data && count($data) > 0)
                        {
                            foreach($data as $value)
                            {
                                if($value['is_active'])
                                {
                                    $image_position = $value['image_position'];
                                    if( $image_position == "left")
                                    {
                                        ?>
                                        <div class="holderBody">

                                            <div class="flex-">
                                                <div class="image">
                                                    <img src="<?php echo $value['image']['sizes']['gallery_blog_detail']; ?>" >
                                                </div>
                                                <div class="blok-info">
                                                    <?php 
                                                        if( $value['description'] )
                                                        {
                                                            foreach($value['description'] as $index)
                                                            {
                                                                ?>
                                                                <div class="item">
                                                                    <?php if($index['heading']) { ?>
                                                                        <h3 class="heading"><?php echo $index['heading']; ?></h3>
                                                                    <?php } ?>

                                                                    <?php if( $index['content']) { ?>
                                                                        <div class="description"> 
                                                                            <?php echo $index['content']; ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                         </div>
                                        <?php
                                    }
                                    else if($image_position == "right")
                                    {
                                        ?>
                                        <div class="holderBody">

                                            <div class="flex-">
                                                
                                                <div class="blok-info">
                                                    <?php 
                                                        if( $value['description'] )
                                                        {
                                                            foreach($value['description'] as $index)
                                                            {
                                                                ?>
                                                                <div class="item">
                                                                    <?php if($index['heading']) { ?>
                                                                        <h3 class="heading"><?php echo $index['heading']; ?></h3>
                                                                    <?php } ?>

                                                                    <?php if( $index['content']) { ?>
                                                                        <div class="description"> 
                                                                            <?php echo $index['content']; ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>

                                                <div class="image">
                                                    <img src="<?php echo $value['image']['sizes']['gallery_blog_detail']; ?>" >
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        ?>
                                        <div class="holderBody">

                                            <div class="flex-">
                                                
                                                <div class="blok-info">
                                                    <?php 
                                                        if( $value['description'] )
                                                        {
                                                            foreach($value['description'] as $index)
                                                            {
                                                                ?>
                                                                <div class="item">
                                                                    <?php if($index['heading']) { ?>
                                                                        <h3 class="heading"><?php echo $index['heading']; ?></h3>
                                                                    <?php } ?>

                                                                    <?php if( $index['content']) { ?>
                                                                        <div class="description"> 
                                                                            <?php echo $index['content']; ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                        
                    ?>
                </div>
            </div>
        </section>


        <section class="share">
            <div class="wrapHolder">
                <div class="holderIcons">
                    <div class="body">
                        <span>share</span>
                        <ul>
                            <!-- Online Facebook Social Media -->
                            <li>
                                <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/facebook-small-icon.png" alt="Facebook share link" />
                                </a>
                            </li>
                            <li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/instagram-small-icon.png"/></a></li>
                            
                            <!-- Online LinkedIn Social Media -->
                            <li>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icons/linkeding-small-icon.png" alt="LinkedIn share link" />
                                </a>
                            </li>
                            <li></li>
                        </ul>
                    </div>
                <div>
            </div>   
        </section>






        <!--last-new -->
        <?php 
            $post_per_page = 3;
            $paged = 1;
            $args = array(  
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => $post_per_page, 
                //'paged' => $paged,
                //'orderby' => 'date',
                //'order' => 'DESC',
                'post__not_in'		=>array(get_the_ID()),
    			'orderby'			=>'rand'                            
            );
            $publications = new WP_Query( $args );
        ?>
        <section class="">
            <div class="holder-news default">
                <div class="wrapHolder">
                    

                    <div class="cards-news">
                        <?php if($publications->have_posts()): ?>
                            
                            <?php  while ($publications->have_posts()): $publications->the_post(); ?>
                                <?php get_template_part( 'template-parts/content','blog' ); ?>
                            <?php endwhile;  ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>

                       
                    </div>

                    <!--                
                    <div class="holderBtns text-center">
                        <a href="#" class="btn btn-border-blue" id="load_more_post">LOAD MORE</a>
                    </div>
                                    
                    -->


                </div>    

                
            </div>
        </section>

    </div>

<?php get_footer(); ?>

