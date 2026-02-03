<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.berita.index');
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
}
