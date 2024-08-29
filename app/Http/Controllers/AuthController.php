<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register User
    public function register(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            // Check if the request is AJAX
            if ($request->ajax()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // If not AJAX, redirect back with errors
            return back()->withErrors($validator)->withInput();
        }

        // Here you can handle the registration logic
        // For example, creating a new user:

        // $user = User::create([
        //     'username' => $request->input('username'),
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')),
        // ]);

        // Optionally, you could log in the user:
        // Auth::login($user);

        // Respond to AJAX requests
        if ($request->ajax()) {
            return response()->json(['message' => 'Registration successful', 'redirect' => route('home')]);
        }

        // Redirect for non-AJAX requests
        return redirect()->route('home')->with('success', 'Registration successful');
    }
}

