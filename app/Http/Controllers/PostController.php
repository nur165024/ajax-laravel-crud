<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::orderBy('id','desc')->get();

        return view('post.index',$data);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());

        return response()->json([
            'error'=>false,
            'post'=>$post,
        ]);
    }
}
