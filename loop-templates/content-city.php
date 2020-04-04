<div class="card mb-4">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

        <a class="badge badge-light p-0" href="<?php echo get_permalink(); ?>">
            <div class="card-header">
                <p><?php the_title(); ?></p>
                <?php if (has_post_thumbnail($post->ID)) : ?>
                    <?php the_post_thumbnail('medium'); ?>
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" alt="">
                <?php endif; ?>
            </div>
        </a>

        <div class="card-body">
            <?php the_excerpt(); ?>
        </div>

    </article><!-- #post-## -->
</div>