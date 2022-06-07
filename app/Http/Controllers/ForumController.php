<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forums;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ForumController extends Controller
{
 
    public function create()
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            //todo images
            'board_id' => ['required', Rule::exists("boards", "board_id")],
        ]);
        $forum = new Forums();
        $forum->title = $attributes['title'];
        $forum->description = $attributes['description'];
        $forum->board_id = $attributes['board_id'];
        $forum->create_id = Auth::id();
        $forum->update_id = Auth::id();
        $forum->created_at = now();
        $forum->updated_at = now();
        $forum->save();
        return response($forum->toJson(), 200);
    }


        // show forums
    public function forums(Request $request)
    {
        $forum = Forums::all();
        return response($forum->toJson(), 200);
    }


        // show forum
        public function forum(Request $request, int $id){
            $forum = Forums::where(['forum_id' => $id])->get();
            return response($forum->toJson(),200);
             
        }


    public function edit(Request $request)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            //todo images
            'board_id' => ['required', Rule::exists("boards", "board_id")],
        ]);
        $forum = new Forums();
        $forum = Forums::where(['create_id' => Auth::id(), 'forum_id' => $request->input('forum_id')])->first();
        $forum->title = $attributes['title'];
        $forum->description = $attributes['description'];
        $forum->board_id = $attributes['board_id'];
        $forum->create_id = Auth::id();
        $forum->update_id = Auth::id();
        $forum->updated_at = now();
        $forum->save();
        return response($forum->toJson(), 200);
    }

    public function delete(Request $request)
    {
        $forum = Forums::where(['create_id' => Auth::id(), 'forum_id' => $request->input('forum_id')])->first()->delete();
        return response($forum, 200);
    }
}
