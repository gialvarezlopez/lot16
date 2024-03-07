<?php  get_header(); ?>


<div class="mainHolder">

    <section class="blockTop holder_no_hero">

        <section class="no-hero hide-mobilex">
            <?php $logo_dark = true; ?>
            <?php include("inc/header.php"); ?>  
            <div class="wrapHolder">
                <div class="holder_info posCenter">
                    <h1 class="sub_heading_article"><?php the_title(); ?></h1>
                </div>
            </div>
        </section>
    </section>

    <section class="commun_single_page">
        <div class="wrapHolder">
            <div class="data"><?php the_content(); ?></div>
        </div>
    </section>
<div>


<?php
  //get_template_part('template_inc/inc','footer');
  get_footer();
?>