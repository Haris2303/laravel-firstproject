<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Login",
            "active" => "login"
        ];

        return view('login.index', $data);
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credential = $request->validate([
            "email" => ['required', 'email:dns'],
            "password" => ['required']
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            echo "OKE";
            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
