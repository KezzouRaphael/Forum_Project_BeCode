<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Boards;



class BoardController extends Controller
{
    
    

    // create board 
    public function create(Request $request){


        $attributes = request()->validate([
            'description' => ['required']
        ]);
        $board=new Boards();
        $board->description = $attributes['description'];
        $board->create_id = Auth::id();;
        $board->update_id = Auth::id();;
        $board->created_at = now();
        $board->updated_at = now();
        $board->save();
    }



    // edit board





    // delete board


    // show board




    //show boards

}
