<?php

$ads = new WP_Query(array(
    'post_type' => 'nedvizhimost',
    'posts_per_page' => 10,
    'meta_query' => array(
        array(
            'key' => 'gorod',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
        )
    )
));

?>

<div class="card mb-4">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <h1 class="text-center">Объявления города <?php the_title(); ?></h1>

        <div class="card-header text-center">
            <?php if (has_post_thumbnail($post->ID)) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" alt="">
            <?php endif; ?>
        </div>

        <div class="card-body">
            <?php the_content(); ?>
        </div>

        <div class="card-footer">
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
        </div>

    </article><!-- #post-## -->
</div>