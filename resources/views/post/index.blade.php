<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Post List</h2>
                    <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#Create-post">Create Post</a>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Title</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody id="post_data">
                            @foreach($posts as $post)
                                <tr>
                                    <th scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->details }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-info" data-id="{{ $post->id }}" id="edit_data" data-toggle="modal" data-target="#Edit-post">Edit</a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" data-id="{{ $post->id }}" id="post_delete" >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal post create -->
        <div class="modal fade" id="Create-post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Post Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="create_post">
                            <div class="form-group">
                                <label for="title"></label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="details"></label>
                                <textarea name="details" id="details" rows="4" placeholder="Details" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info product_create">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal post create -->

        <!-- Modal post edit -->
        <div class="modal fade" id="Edit-post">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Post Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form id="edit_post">

                            <input type="hidden" name="post_id" id="post_id">

                            <div class="form-group">
                                <label for="title"></label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="details"></label>
                                <textarea name="details" id="details" rows="4" placeholder="Details" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info product_update">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal post edit -->
    </section>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend/ajax.js') }}"></script>
</body>
</html>
