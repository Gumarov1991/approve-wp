<?php
add_action( 'wp_ajax_'.'create_ad',        'realty_ajax_create_ad' );
add_action( 'wp_ajax_nopriv_'.'create_ad', 'realty_ajax_create_ad' );
function realty_ajax_create_ad() {
    $queryForACFFieldKeyGorod = new WP_Query(array(
        'post_type' => 'nedvizhimost',
        'posts_per_page' => 1,
        'paged' => 1
    ));

    $ACFFieldKeyGorod = get_post_meta($queryForACFFieldKeyGorod->posts[0]->ID, '_gorod')[0];

    wp_reset_postdata();

    $adData = array(
        'post_title'    => wp_strip_all_tags( $_POST['title'] ),
        'post_content'  => wp_strip_all_tags( $_POST['text'] ),
        'post_status'   => 'publish',
        'post_type'     => 'nedvizhimost',
        'tax_input'     => array('nedvizhimost_type' => array($_POST['realty_type'])),
        'meta_input'    => array(
            'ploshhad'          => $_POST['ploshhad'],
            'stoimost'          => $_POST['stoimost'],
            'adres'             => $_POST['adres'],
            'zhilaya_ploshhad'  => $_POST['zhilaya_ploshhad'],
            'etazh'             => $_POST['etazh'],
            'gorod'             => array($_POST['city']),
            '_gorod'            => $ACFFieldKeyGorod
        )
    );

    $adId = wp_insert_post( $adData );

    if ($adId) {
        echo 'Поздравляем! Ваше объявление: "' . $_POST['title'] . '" успешно создано и доступно к просмотру!';
    }

    if ($_FILES && $adId) {
        require_once ABSPATH . 'wp-admin/includes/image.php';
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';

        add_filter( 'upload_mimes', function( $mimes ) {
            return array(
                'jpg|jpeg|jpe' => 'image/jpeg',
                'gif'          => 'image/gif',
                'png'          => 'image/png',
            );
        });

        $attachId = media_handle_upload( 'image', 0 );
        set_post_thumbnail($adId, $attachId);
    }

    die();
}