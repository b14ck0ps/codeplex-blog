<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index()
    {
        $post = BlogPost::all();

        return view('home', [
            'posts' => $post,
        ]);
    }

    function content(Request $request)
    {
        $post = BlogPost::find($request->id);
        if ($post == null) {
            return redirect()->route('home');
        }

        return view('blog.content', [
            'post' => $post,
        ]);
    }

    function storePost(Request $request)
    {
        $request->validate([
            'title' => 'required|max: 100',
            'content' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $uuid = Str::uuid()->toString();

        // Get the file extension from the uploaded image
        $extension = $request->file('cover')->getClientOriginalExtension();
        // Combine the UUID and extension to create the new filename
        $filename = $uuid . '.' . $extension;

        $coverPhotoPath = $request->file('cover')->storeAs('blog_covers', $filename, 'public');

        BlogPost::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'cover' => $coverPhotoPath,
        ]);

        return redirect()->route('home');
    }
}
