<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function render_login()
    {
        return view('auth.login');
    }


    public function render_register()
    {
        return view('auth.register');
    }
    public function store_user(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'name' => 'required|max:255',
            'password' => 'required|string|min:6|max:20|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')), // Hash the password
            'role_id'=>2
        ]);

        // Log in the user using username and password
        Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);

        return redirect('/dashboard')->with('info', 'Your account was created');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store_login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('info','Welcome');
        }
        else
        {
            return back()->with('error','Wrong password or  username');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
