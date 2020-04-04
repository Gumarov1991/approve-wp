<?php
get_header();
?>

    <div class="wrapper" id="single-wrapper">

        <div class="container" id="content">

            <div class="row">

                <!-- Do the left sidebar check -->
                <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

                <main class="site-main" id="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content-estate', 'single' ); ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

                <!-- Do the right sidebar check -->
                <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

            </div><!-- .row -->

        </div>

    </div><!-- #single-wrapper -->

<?php get_footer();
