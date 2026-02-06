<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.berita.index', compact('posts'));
    }
    public function create()
    {
        return view('admin.berita.create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
        ]);

        $validatedData['path'] = $request->file('image')->store('berita', 'public');

        $post = Post::create([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']),
            'image' => $validatedData['path'],
            'body' => $validatedData['body'],
        ]);


        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }
    public function edit(Post $post)
    {
        return view('admin.berita.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
        ]);

        $validatedData['path'] = $request->file('image')->store('berita', 'public');

        $post = Post::create([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']),
            'image' => $validatedData['path'],
            'body' => $validatedData['body'],
        ]);


        return redirect()->route('berita.index')->with('success', 'Berita berhasil diedit.');
    }
}
