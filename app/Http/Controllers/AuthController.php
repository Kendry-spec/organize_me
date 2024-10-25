<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    /**
     * Store a newly registered user in storage.
     */
    public function store(Request $request)
    {
        // validate user input data
        $inputs = $request->validate([
            'username' => ['bail', 'required', 'max:255'],
            'email' => ['bail', 'required', 'max:255', 'email', 'unique:users'],
            'password' => ['bail', 'required', 'min:4', 'confirmed']
        ]);

        // Registering users
        $user = User::create($inputs);

        //Redirecting users to home page
        return redirect()->route('category.index');
    }

    public function login(Request $request)
    {
        // validate user input data
        $inputs = $request->validate([
            'email' => ['bail', 'required', 'max:255', 'email'],
            'password' => ['bail', 'required']
        ]);
       
        if (
            Auth::attempt($inputs, $request->remember)
        ) {
            return redirect()->intended(route('category.index'));
        } else {
            return back()->withErrors([
                'fields' => 'The provided credentials don\'t match our Records.Please try again!'
            ]);
        }
    }

    // Destroying user's session
    public function logout(Request $request)
    {
        //Auth facade with logout method, allowing users to delete their session
        Auth::logout();

        $request->session()->invalidate();
        
        //Regenerating csfr token
        $request->session()->regenerateToken();

        //Redirecting the user to the welcome page after logging out
        return redirect('/');
    }

}
