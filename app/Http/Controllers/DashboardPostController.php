<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'My Posts',
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ];

        return view('dashboard.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Post',
            'categories' => Category::all()
        ];

        return view('dashboard.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validateData = $request->validate([
            'title' => ['required', 'max:255'],
            'slug' => ['required', 'unique:posts'],
            'category_id' => 'required',
            'image' => ['image', 'file', 'max:1024'],
            'body' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        Post::create($validateData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $data = [
            "title" => "Post " . $post->category->name,
            "post" => $post
        ];

        return view('dashboard.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $data = [
            'title' => "Edit post",
            "post" => $post,
            "categories" => Category::all()
        ];

        return view('dashboard.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        // validation rules
        $rules = [
            'title' => ['required', 'max:255'],
            'category_id' => 'required',
            'image' => ['image', 'file', 'max:1024'],
            'body' => 'required'
        ];

        // check slug
        if ($request->slug !== $post->slug) {
            $rules['slug'] = ['required', 'unique:posts'];
        }

        // validate data
        $validateData = $request->validate($rules);
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 250, '...');

        // check image
        if ($request->file('image')) {
            // if image is changed
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        // update data
        Post::where('slug', $post->slug)->update($validateData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        if ($post->image) {
            // delete image in storage
            Storage::delete($post->image);
        }

        // delete data
        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request): JsonResponse
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
