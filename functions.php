<?php

/**
 * Подключение стилей и скриптов
 */

function realty_scripts()
{
    wp_enqueue_style('realty-main', get_stylesheet_uri());
    wp_enqueue_script('realty-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '', true);
    wp_enqueue_script('realty-notifications', 'https://cdn.jsdelivr.net/npm/sweetalert2@9', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'realty_scripts');// подключение стилей и скриптов

/**
 * Изменяеим длину отрывка
 */
function realty_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'realty_excerpt_length', 999);

/**
 * Изменяем родительскую функцию вывода кнопки отрывка
 */
function understrap_all_excerpts_get_more_link($post_excerpt)
{
    if (!is_admin()) {
        $post_excerpt = $post_excerpt . ' [...]<p><a class="btn btn-secondary understrap-read-more-link" href="'
            . esc_url(get_permalink(get_the_ID())) . '">' . __('Посмотреть объявления города', 'understrap') . '</a></p>';
    }

    return $post_excerpt;
}

/**
 * Добавляем переменные на фронт
 */
function js_variables(){

    $variables = array (
        'ajax_url'  => admin_url('admin-ajax.php'),
        'site_url'  => get_site_url()
    );

    echo '<script type="text/javascript">window.wp_data = ' . json_encode($variables) . '</script>';
}
add_action('wp_head','js_variables');

/**
 * Обработка формы добавления объявления
 */
require_once get_stylesheet_directory() . '/inc/ajax-form.php';