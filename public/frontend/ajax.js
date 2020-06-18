$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.product_create').click(function () {
        var title = $('#title').val();
        var details = $('#details').val();
        $(this).html('Sending..');

        $.ajax({
            type: 'POST',
            url: 'post/create',
            dataType: 'json',
            data: {title:title,details:details},
            success: function (data) {
                $('#create_post').trigger('reset');
                $('#Create-post .close').click();
                window.location.reload();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});
