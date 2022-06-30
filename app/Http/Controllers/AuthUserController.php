<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class AuthUserController extends Controller
{
    public function login(Request $request)
    {
        $auth = Auth::attempt(["email" => $request->input('email'), "password" => $request->input('password')]);

        if (!$auth) {
            //user is not found
            return response([
                'message' => 'Error: This user does not exist.'
            ], 400);
        }
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $request->session()->regenerate();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie("jwt", $token, 60 * 24); //one day

        return response(Auth::user(), 200)->withCookie($cookie);
    }


    public function user()
    {
        return Auth::user();
    }


    public function logout(Request $request)
    {
        $cookie = Cookie::forget("jwt");
        $request->session()->invalidate();
        return response([
            "message" => "You have been successfully logged out."
        ], 200)->withCookie($cookie);
    }

    public function edit(Request $request, int $id)
    {
        $attributes = request()->validate([
            'nickname' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'signature' => ['required']
        ]);
        $user = new User();
        $user = User::where(['id' => $id])->first();
        $user->nickname = $attributes['nickname'];
        $user->email = $attributes['email'];
        $user->password =  Hash::make($attributes['password']);
        $user->signature = $attributes['signature'];
        $user->update();
        return response($user->toJson(), 200);
    }
}
