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
        return view('forum.create');
    }
    public function store()
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
    }

    public function show(Forums $forum)
    {
        return view('forum.show', [
            'forum' => $forum,
        ]);
    }
}
