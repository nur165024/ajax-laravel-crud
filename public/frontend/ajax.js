$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // post create code
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

    // edit code
    $('body').on('click','#edit_data',function () {
        var post_id = $(this).data('id');

        $.ajax({
            type:'GET',
            dataType: 'json',
            url: 'post/edit/'+post_id,
            data: post_id,
            success: function (data) {
                $('#edit_post #post_id').val(data.post.id);
                $('#edit_post #title').val(data.post.title);
                $('#edit_post #details').val(data.post.details);
            }
        });
    });

    // update code
    $('.product_update').click(function () {
        var title = $('#edit_post #title').val();
        var details = $('#edit_post #details').val();
        var post_id = $('#edit_post #post_id').val();
        $(this).html('Sending..');

        $.ajax({
            type:'PUT',
            url: 'post/update/'+post_id,
            dataType: 'json',
            data: {title:title,details:details},
            success: function (data) {
                $('#edit_post').trigger('reset');
                $('#Edit-post .close').click();
                window.location.reload();
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    // delete code
    $('#post_delete').click(function () {
        var post_id = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            url: 'post/delete/'+post_id,
            data: post_id,
            success: function (data) {
                window.location.reload();
            }
        });
    });
});
