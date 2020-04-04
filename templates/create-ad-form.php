<?php

$realtyTypes = get_terms(array(
    'taxonomy' => 'nedvizhimost_type'
));

$cities = new WP_Query(array(
    'post_type' => 'gorod',
    'posts_per_page' => -1
));

?>
<h2>Подать объявление</h2>

<form method="post" id="create-ad" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" class="form-control" id="title" name="title" required>
    </div>

    <div class="form-group">
        <label for="text">Текст объявления</label>
        <textarea class="form-control" id="text" name="text" required></textarea>
    </div>

    <div class="form-group">
        <div class="row">

            <div class="col-sm-6">
                <label for="realty_type">Тип недвижимости</label>
                <select class="form-control" id="realty_type" name="realty_type" required>
                    <?php foreach ($realtyTypes as $realtyType) : ?>
                        <option value="<?php echo $realtyType->slug ?>"><?php echo $realtyType->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-sm-6">
                <label for="city">Город</label>
                <select class="form-control" id="city" name="city" required>
                    <?php if ($cities->have_posts()) : ?>

                        <?php while ($cities->have_posts()) : $cities->the_post(); ?>
                            <option value="<?php echo $post->ID; ?>"><?php the_title(); ?></option>
                        <?php endwhile; ?>

                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </select>
            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="row">

            <div class="col-sm-4">
                <label for="stoimost">Цена</label>
                <input type="number" class="form-control" id="stoimost" name="stoimost" required>
            </div>

            <div class="col-sm-4">
                <label for="ploshhad">Площадь</label>
                <input type="number" class="form-control" id="ploshhad" name="ploshhad" required>
            </div>

            <div class="col-sm-4">
                <label for="zhilaya_ploshhad">Жилая площадь</label>
                <input type="number" class="form-control" id="zhilaya_ploshhad" name="zhilaya_ploshhad">
            </div>

        </div>
    </div>

    <div class="form-group">
        <div class="row">

            <div class="col-sm-4">
                <label for="etazh">Этаж</label>
                <input type="number" class="form-control" id="etazh" name="etazh" required>
            </div>

            <div class="col-sm-4">
                <label for="adres">Адрес</label>
                <input type="text" class="form-control" id="adres" name="adres" required>
            </div>

            <div class="col-sm-4">
                <label class="custom-file-label" for="image">Выбрать файл</label>
                <input type="file" class="custom-file-input" id="image" name="image">
            </div>

        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-secondary">
    </div>

</form>