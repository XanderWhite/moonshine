<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function showRegisterForm()
    {
        return view('auth.register', ['roles' => Role::all()]);
    }

    public function register(Request $request)
    {
      $validated =  $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|confirmed',
            'name' => 'string|required|max:255',
            'role_id' => 'nullable|exists:roles,id',
    ]);

    $roleId = $request->role_id ?? Role::where('name', 'User')->first()->id;

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role_id' => $roleId,
    ]);

        Auth::login($user);
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Неверный логин или пароль']);
    }

    public function logout()
    {
        Auth::logout();
       return redirect(route('login'));
    }
}
