<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
?>

<?php get_header(); ?>

<main id="content">
    <div class="mainHolder">
        <section class="blockTop">

            <section class="no-hero hide-mobilex">
                <?php $logo_dark = true; ?>
                <?php include("inc/header.php"); ?>  
                <div class="wrapHolder">
                    <div class="holder_info posCenter">
                        
                        
                        
                        <!-- <h3>Condominiums coming to Bathurst & Richmond</h3> -->
                    </div>
                </div>
            </section>
        </section>
        <article id="post-0" class="post not-found">
            <!--
            <header class="header">
                <h1 class="entry-title"><?php //esc_html_e( 'Not Found', 'blankslate' ); ?></h1>
            </header>
            -->
            <!--
            <div class="entry-content">
                <p><?php //esc_html_e( 'Nothing found for the requested page. Try a search instead?', 'blankslate' ); ?></p>
                <?php //get_search_form(); ?>
            </div>
            -->

            <div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h3>Oops! Page not found</h3>
                        <h1><span>4</span><span>0</span><span>4</span></h1>
                    </div>
                    <h2>we are sorry, but the page you requested was not found</h2>
                </div>
            </div>

            <style>
                /*
                * {
                -webkit-box-sizing: border-box;
                        box-sizing: border-box;
                }
                */
                /*
                body {
                padding: 0;
                margin: 0;
                }
                */
                /*
                #notfound {
                    position: relative;
                    height: 100vh;
                }

                #notfound .notfound {
                position: absolute;
                left: 50%;
                top: 50%;
                -webkit-transform: translate(-50%, -50%);
                    -ms-transform: translate(-50%, -50%);
                        transform: translate(-50%, -50%);
                }
                */

                .notfound {
                    max-width: 520px;
                    width: 100%;
                    line-height: 1.4;
                    text-align: center;
                    margin: 0 auto;
                    padding-top: 75px;
                    padding-bottom: 75px;
                }

                .notfound .notfound-404 {
                    position: relative;
                    height: 240px;
                }

                .notfound .notfound-404 h1 {
                    font-family: 'Montserrat', sans-serif;
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    -webkit-transform: translate(-50%, -50%);
                        -ms-transform: translate(-50%, -50%);
                            transform: translate(-50%, -50%);
                    font-size: 252px;
                    font-weight: 900;
                    margin: 0px;
                    color: #404040;
                    text-transform: uppercase;
                    letter-spacing: -40px;
                    margin-left: -20px;
                }

                .notfound .notfound-404 h1>span {
                    text-shadow: -8px 0px 0px #fff;
                }

                .notfound .notfound-404 h3 {
                    font-family: "Filson Pro", Sans-serif;
                    position: relative;
                    font-size: 16px;
                    font-weight: 700;
                    text-transform: uppercase;
                    color: #404040;
                    margin: 0px;
                    letter-spacing: 3px;
                    padding-left: 6px;
                }

                .notfound h2 {
                    font-family: "Filson Pro", Sans-serif;
                    font-size: 20px;
                    font-weight: 400;
                    text-transform: uppercase;
                    color: #404040;
                    margin-top: 0px;
                    margin-bottom: 25px;
                }

                @media only screen and (max-width: 767px) {
                    .notfound .notfound-404 {
                        height: 200px;
                    }
                    .notfound .notfound-404 h1 {
                        font-size: 200px;
                    }

                    .notfound {
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }
                }

                @media only screen and (max-width: 480px) {
                    .notfound .notfound-404 {
                        height: 162px;
                    }
                    .notfound .notfound-404 h1 {
                        font-size: 162px;
                        height: 150px;
                        line-height: 162px;
                    }
                    .notfound h2 {
                        font-size: 16px;
                    }
                }

            </style>

        </article>
    </div>
</main>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>