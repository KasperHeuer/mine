<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\comments;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::latest()->with('comments')->get(); // Load comments with posts

        return view('blog', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view("blog/create");
    }
    public function store(Request $request)
    {
        // Validate input fields
        $attributes = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Added image validation
        ]);

        // Add authenticated user ID
        $attributes['user_id'] = auth()->id();

        // Handle image upload
        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('uploads', 'public');
        } else {
            $attributes['image'] = null;
        }

        // Create post
        Posts::create([
            'user_id' => $attributes['user_id'],
            'head' => $attributes['title'],
            'text' => $attributes['description'],
            'image' => $attributes['image'],
        ]);

        return redirect('/blog')->with('success', 'Post created successfully!');
    }
}
