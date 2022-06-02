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
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'max:255']
        ]);

        $user = User::create($attributes);

        Auth()->login($user);
        return redirect('/')->with('success', 'Your account has been created.'); //another way
    }
}
