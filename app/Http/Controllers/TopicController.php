<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topics;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TopicController extends Controller
{
    public function create()
    {
        $attributes = request()->validate([
            'content' => ['required'],
            'forum' => ['required', Rule::exists("forums", "forum_id")],
        ]);
        $topic = new Topics();
        $topic->content = $attributes['content'];
        $topic->forum = $attributes['forum'];
        $topic->create_id = Auth::id();
        $topic->update_id = Auth::id();
        $topic->created_at = now();
        $topic->updated_at = now();
        $topic->save();
        return response($topic->toJson(), 200);
    }

    public function topic(Request $request)
    {
        $topic = Topics::where(['topic_id' => $request->input('topic_id')])->first();
        return response($topic->toJson(), 200);
        return view('topic.show', [
            'topic' => $topic,
        ]);
    }
    public function edit(Request $request)
    {
        $attributes = request()->validate([
            'content' => ['required'],
            'forum' => ['required', Rule::exists("forums", "forum_id")],
        ]);
        $topic = new Topics();
        $topic = Topics::where(['create_id' => Auth::id(), 'topic_id' => $request->input('topic_id')])->first();
        $topic->content = $attributes['content'];
        $topic->forum = $attributes['forum'];
        $topic->create_id = Auth::id();
        $topic->update_id = Auth::id();
        $topic->updated_at = now();
        $topic->save();
        return response($topic->toJson(), 200);
    }

    public function delete(Request $request)
    {
        $forum = Topics::where(['create_id' => Auth::id(), 'topic_id' => $request->input('topic_id')])->first()->delete();
        return response($forum, 200);
    }
}
