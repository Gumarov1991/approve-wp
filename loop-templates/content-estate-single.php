<div class="card mb-4">
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

        <div class="card-header text-center">
            <h1 class="badge badge-light"><?php the_title(); ?></h1>
            <?php if (has_post_thumbnail($post->ID)) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
                <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/placeholder.png' ?>" alt="">
            <?php endif; ?>
        </div>

        <table class="table table-striped mt-3">
            <tbody>
            <tr>
                <th>Город</th>
                <th>
                    <a href="<?php echo get_field('gorod')[0]->guid; ?>"><?php echo get_field('gorod')[0]->post_title; ?></a>
                </th>
            </tr>
            <tr>
                <th>Тип</th>
                <th><?php the_terms($post->ID, 'nedvizhimost_type'); ?></th>
            </tr>
            <tr>
                <th>Цена</th>
                <th><?php the_field('stoimost'); ?> р.</th>
            </tr>
            <tr>
                <th>Площадь</th>
                <th><?php the_field('ploshhad'); ?> кв.м</th>
            </tr>
            <tr>
                <th>Адрес</th>
                <th><?php the_field('adres'); ?></th>
            </tr>
            <tr>
                <th>Этаж</th>
                <th><?php the_field('etazh'); ?></th>
            </tr>
            <?php if (get_field('zhilaya_ploshhad') !== '') : ?>
                <tr>
                    <th>Жил площадь</th>
                    <th><?php the_field('zhilaya_ploshhad'); ?> кв.м.</th>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

        <div class="card-body">
            <?php the_content(); ?>
        </div>

    </article><!-- #post-## -->
</div>