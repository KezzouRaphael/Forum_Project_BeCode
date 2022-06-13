<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;



class AuthUserController extends Controller
{
    public function login(Request $request)
    {
        $auth = Auth::attempt(["email" => $request->input('email'), "password" => $request->input('password')]);

        if (!$auth) {
            //user is not found
            return response([
                'message' => 'error'
            ], 401);
        }
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie("jwt", $token, 60 * 24); //one day

        return response(["message" => $token], 200)->withCookie($cookie);
    }


    public function user()
    {
        return Auth::user();
    }


    public function logout()
    {
        $cookie = Cookie::forget("jwt");
        return response([
            "message" => "success"
        ], 200)->withCookie($cookie);
    }
}
