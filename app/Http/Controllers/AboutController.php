<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about', [
            "title" => "About",
            "active" => "About",
            "name" => "Ucup Surucup",
            "email" => "ucupsurucup@bing.com",
            "img_name" => "gambar.jpg"
        ]);
    }
}
