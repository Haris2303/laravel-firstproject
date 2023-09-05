<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Category",
            "categories" => Category::all()
        ];

        return view('dashboard.categories.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $credential = $request->validate(["name" => "unique:categories"]);
        $credential['name'] = Str::ucfirst($request->name);
        $credential['slug'] = Str::lower($request->name);

        Category::create($credential);

        return redirect('/dashboard/categories')->with('success', 'Category has been created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // delete category
        Category::destroy($id);
        // delete all posts have $id
        Post::where('category_id', $id)->delete();

        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }
}
