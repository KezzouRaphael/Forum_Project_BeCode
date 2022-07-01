<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthUserController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function create()
    {
        $attributes = request()->validate([
            'nickname' => ['required', 'max:255', Rule::unique('users', 'nickname')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255'],
            'signature' => ['required', 'max:255']
        ]);
        $user = new User();
        $user->nickname = $attributes['nickname'];
        $user->email = $attributes['email'];
        $user->signature = $attributes['signature'];
        $user->password = Hash::make($attributes['password']);
        $user->save();
        //! not tested but this should let the user login after the registration
        auth()->login($user);
        //Auth::attempt(["email" => $user->email , "password" =>$user->password ]);
        return response(Auth::user(), 200);
    }
}
