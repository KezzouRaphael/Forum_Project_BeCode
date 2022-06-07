<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Posts;


class PostController extends Controller
{


    // create post
    public function create(Request $request)
    {

        //! Todo a board should be created only by admin
        $attributes = request()->validate([
            'content' => ['required'],
            'topic' => ['required']
        ]);
        $post = new Posts();
        $post->content = $attributes['content'];
        $post->topic = $attributes['topic'];
        $post->create_id = Auth::id();
        $post->update_id = Auth::id();
        $post->created_at = now();
        $post->updated_at = now();
        $post->save();
    }



    // edit post
    public function edit(Request $request)
    {

        $attributes = request()->validate([
            'content' => ['required'],
            'topic' => ['required'],
            'post' => ['required']
        ]);
        $post = Posts::where(['create_id' => Auth::id(), 'post_id' => $request->input('post_id')])->first();
        $post->content = $attributes['content'];
        $post->topic = $attributes['topic'];
        $post->post = $attributes['post'];
        $post->update_id = Auth::id();
        $post->updated_at = now();
        $post->update();
        //return response($post->toJson(),200);

    }


    // delete post
    public function delete(Request $request)
    {
        $post = Posts::where(['create_id' => Auth::id(), 'post_id' => $request->input('post_id')])->first();
        $post->delete();
    }

    // show post
    public function post(Request $request, int $id)
    {
        $post = Posts::where(['post_id' => $id])->get();
        return response($post->toJson(), 200);
    }

    //show posts

    public function posts()
    {
        $post = Posts::all();

        return response($post->toJson(), 200);
    }
}
