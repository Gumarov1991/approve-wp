jQuery(document).ready(function ($) {
    $('#create-ad').submit(function (e) {
        e.stopPropagation()
        e.preventDefault()

        let textData = $('#create-ad')[0],
            data = new FormData(textData),
            imageData = $('#create-ad #image').prop('files')[0]

        data.append('image', imageData)
        data.append('action', 'create_ad')

        $.ajax({
            type: 'post',
            url: window.wp_data.ajax_url,
            data: data,
            processData: false,
            contentType: false,
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Объявление создано',
                    text: data,
                    onClose: function () {
                        window.location.href = window.wp_data.site_url
                    }
                })
            },
            error: function (jqXHR, status) {
                console.log(status)
            }
        })
    })
})
