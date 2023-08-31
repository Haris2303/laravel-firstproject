<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Register",
            "active" => "register"
        ];

        return view('register.index', $data);
    }

    public function store(Request $request): RedirectResponse
    {
        User::add($request);

        return redirect('/login')->with('success', 'Registration successfully! Please login');
    }
}
