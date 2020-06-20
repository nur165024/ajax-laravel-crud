<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::orderBy('id','desc')->get();

        if ($request->ajax()){
            return response()->json([
                'posts'=>$posts,
            ]);
        }

        return view('post.index',compact('posts'));
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

    public function delete($id)
    {
        $post = Post::destroy($id);

        return response()->json([
            'error'=>false,
            'post'=>$post,
        ]);
    }
}
