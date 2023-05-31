<?php

namespace App\Http\Controllers\Sistema;

use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return view('sistema.login');
    }

    public function dashboard()
    {
        if (auth()->check()) {
            return view('sistema.dashboard');
        }

        return redirect('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $loginType = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user';

        $credentials = [
            $loginType => $request->input('login'),
            'password' => $request->input('password'),
        ];

        if (auth()->attempt($credentials)) {
            return redirect('dashboard');
        }

        return redirect()->back()->withInput()->withErrors([
            'Os dados informados não conferem!'
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        return redirect('login');
    }

    public function permissionDenied()
    {
        return view('permission-denied');
    }

    public function redirect()
    {
        return redirect('login');
    }
}
