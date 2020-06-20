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
    $('body').on('click','#post_delete',function () {
        var post_id = $(this).data('id');

        $.ajax({
            type: 'DELETE',
            dataType: 'json',
            url: 'post/delete/'+post_id,
            data: post_id,
            success: function (data) {
                console.log(data);
                window.location.reload();
            },
        });
    });

    //ajax data get no reload
    // setInterval(function () {
    //     $.ajax({
    //         url:'post',
    //         dataType:'json',
    //         type: 'GET',
    //         success: function (data) {
    //             if (data.posts.length > 0){
    //                 var posts_data = '';
    //                 for (var i = 0; i < data.posts.length; i++){
    //                     posts_data += '<tr>\n' +
    //                                     '<th scope="row">'+data.posts[i]['id']+'</th>\n' +
    //                                     '<td>'+data.posts[i]['title']+'</td>\n' +
    //                                     '<td>'+data.posts[i]['details']+'</td>\n' +
    //                                     '<td>\n' +
    //                                     '    <a href="javascript:void(0)" class="btn btn-sm btn-info" data-id="'+data.posts[i]['id']+'" id="edit_data" data-toggle="modal" data-target="#Edit-post">Edit</a>\n' +
    //                                     '    <a href="javascript:void(0)" class="btn btn-sm btn-danger" data-id="'+data.posts[i]['id']+'" id="post_delete" >Delete</a>\n' +
    //                                     '</td>\n' +
    //                                 '</tr>';
    //                     $('#post_data').empty();
    //                     $('#post_data').append(posts_data);
    //                 }
    //             }
    //         }
    //     });
    // }, 15000);
});
