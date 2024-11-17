<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    // Store a newly registered user in storage
    public function store(Request $request)
    {
        // Validate user input data
        $request->validate([
            'username' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:4', 'confirmed', Password::defaults()]
        ]);
        
        // Create a new user
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //Login the user
        auth()->login($user);

        //Redirecting the user after registering
        return to_route('category.index');
    }
}
