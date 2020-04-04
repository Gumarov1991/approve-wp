<?php
get_header();

$ads = new WP_Query(array(
    'post_type' => 'nedvizhimost',
    'posts_per_page' => 10
));

$cities = new WP_Query(array(
    'post_type' => 'gorod',
    'posts_per_page' => -1
));

?>

    <div class="wrapper" id="index-wrapper">

        <div class="container" id="content">

            <section>
                <h2>Последние объявления</h2>
                <div class="row">
                    <!-- Do the left sidebar check and opens the primary div -->
                    <?php get_template_part('global-templates/left-sidebar-check'); ?>

                    <main class="site-main" id="main">
                        <div class="row justify-content-between">
                            <?php if ($ads->have_posts()) : ?>

                                <?php while ($ads->have_posts()) : $ads->the_post(); ?>
                                    <div class="col-lg-4">
                                        <?php get_template_part('loop-templates/content', 'estate'); ?>
                                    </div>
                                <?php endwhile; ?>

                            <?php else : ?>

                                <?php get_template_part('loop-templates/content', 'none'); ?>

                            <?php endif; ?>

                            <?php wp_reset_postdata(); ?>
                        </div>
                    </main>
            </section>

            <section class="bg-light pt-4 mb-5">
                <h2>Города</h2>
                <div class="row justify-content-center">
                    <?php if ($cities->have_posts()) : ?>

                        <?php while ($cities->have_posts()) : $cities->the_post(); ?>
                            <div class="col-lg-6">
                                <?php get_template_part('loop-templates/content', 'city'); ?>
                            </div>
                        <?php endwhile; ?>

                    <?php else : ?>

                        <?php get_template_part('loop-templates/content', 'none'); ?>

                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>
            </section>

            <section>
                <?php get_template_part('templates/create-ad-form'); ?>
            </section>

        </div>
        <!-- Do the right sidebar check -->
        <?php get_template_part('global-templates/right-sidebar-check'); ?>

    </div>

<?php
get_footer();
