<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Boards;
use App\Models\Forums;
use App\Models\Topics;



class BoardController extends Controller
{
    // create board
    public function create(Request $request)
    {

        //! Todo a board should be created only by admin
        $attributes = request()->validate([
            'description' => ['required']
        ]);
        $board = new Boards();
        $board->description = $attributes['description'];
        $board->create_id = Auth::id();
        $board->update_id = Auth::id();
        $board->created_at = now();
        $board->updated_at = now();
        $board->save();
    }

    // edit boards
    public function edit(Request $request)
    {

        $attributes = request()->validate([
            'description' => ['required']
        ]);
        $board = Boards::where(['create_id' => Auth::id(), 'board_id' => $request->input('board_id')])->first();
        $board->description = $attributes['description'];
        $board->update_id = Auth::id();
        $board->updated_at = now();
        $board->update();
        //return response($board->toJson(),200);

    }

    // delete board
    public function delete(Request $request)
    {
        $board = Boards::where(['create_id' => Auth::id(), 'board_id' => $request->input('board_id')])->first();
        $board->delete();
        return response($board, 200);
    }

    // show board

    public function board(Request $request, int $id)
    {
        $board = Boards::where(['board_id' => $id])->get();
        if ($board->count() > 0) {
            return response(
                [
                    "board" => $board->toJson()
                ],
                200
            );
        } else {
            return response(
                [
                    "message" => "failed",
                    "data" => null
                ],
                400
            );
        }
    }

    public function getBoardsInfo(Request $request, int $id)
    {
        $forum = Forums::select('forum_id')->where(['board_id' => $id])->count();
        $topic = Topics::select('topic_id')
            ->whereIn('forum', function ($query) {
                $query->select('forum_id')->from('forums')
                    ->Where('board_id', '=', 1);
            })->count();
    }
    public function boards(Request $request)
    {
        $board = Boards::all();
        return response(
            [
                "message" => "success",
                "data" => $board->toJson()
            ],
            200
        );
    }
}
// public function getBoardsTopics(Request $request, int $id)
    // {
    //     $number = Topics::select('*')->where(['board_id' => $id])->count()
    //         ->join('boards', 'boards.board_id', '=', 'forums.board_id')
    //         ->get();
    //     return response($number->toJson(), 200);
    // }
