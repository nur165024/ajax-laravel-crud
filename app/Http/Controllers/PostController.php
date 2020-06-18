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

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return response()->json([
            'error'=>false,
            'post'=>$post,
        ]);
    }

    public function update(Request $request,$id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return response()->json([
            'error'=>false,
            'post'=>$post,
        ]);
    }
}
