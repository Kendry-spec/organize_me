<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login()
    {
        return 'Login method is working.';
        // return view('auth.login');
    }

    public function store(Request $request)
    {
        // validate user form-input data
        $inputs = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'min:4', 'string']
        ]);

        if (Auth::guard('web')->attempt($inputs, $request->remember)) {
            // if successful, redirect to their intended location
            return redirect()->intended(route('category.index'));
        } else {
            // if unsuccessful, then redirect back to the same page with errors
            return back()->withErrors([
                'fields' => 'The provided credentials don\'t match our Records.Please try again!'
            ]);
        }
    }

    // Destroying user's session
    public function logout(Request $request)
    {
        //Auth facade with logout method, allowing users to delete their session
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        //Regenerating csfr token
        $request->session()->regenerateToken();

        //Redirecting the user to the welcome page after logging out
        return redirect('/');
    }
}
