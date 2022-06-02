<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'nickname' => ['required', 'max:255', Rule::unique('users', 'nickname')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255'],
            'signature' => ['required', 'max:255']
        ]);

        $user = User::create($attributes);

        Auth()->login($user);
        //return redirect()->route('login', []);
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
