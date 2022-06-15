<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Boards;



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


    public function delete(Request $request)
    {
        $board = Boards::where(['create_id' => Auth::id(), 'board_id' => $request->input('board_id')])->first();
        $board->delete();
    }


    // delete board



    // show board
 
    public function board(Request $request, int $id)
    {
        $board = Boards::where(['board_id' => $id])->get();
        if($board->count()> 0){
            return response(
                [
                        "board" => $board->toJson()
                ]
                ,200);
        }else{
            return response(
                [
                        "message" => "failed",
                        "data" => null
                ]
                ,400);
        }
       
 
    }



    //show boards
 
    public function boards(Request $request){
        $board=Boards::all();
        return response(
            [
                    "message" => "success",
                    "data" => $board->toJson()
            ]
            ,200);
             
    }
    
 
 
}
