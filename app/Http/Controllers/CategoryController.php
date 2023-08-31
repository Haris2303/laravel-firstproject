<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Categories",
            "active" => "Category",
            "categories" => Category::all()
        ];

        return view('categories', $data);
    }
}
