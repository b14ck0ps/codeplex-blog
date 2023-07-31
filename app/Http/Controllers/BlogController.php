<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use App\Models\PostComments;
use App\Models\PostLikes;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index(Request $request)
    {

        $post = BlogPost::orderByDesc('created_at')->paginate(5);
        $selected = 'latest';

        if ($request->sortBy == 'oldest') {
            $post = BlogPost::orderBy('created_at')->paginate(5);
            $selected = 'oldest';
        }

        if ($request->sortBy == 'likes') {
            $post = BlogPost::orderByDesc(
                PostLikes::whereColumn('blog_posts.id', 'blog_post_id')->selectRaw('count(*)')
            )->paginate(5);
            $selected = 'likes';
        }

        return view('home', [
            'posts' => $post,
            'selected' => $selected,
        ]);
    }

    function content(Request $request)
    {
        $post = BlogPost::find($request->id);
        if ($post == null) {
            return redirect()->route('home');
        }

        $likes = $post->likes->count();

        //check if the user has liked the post
        $existingLike = $post->likes->where('user_id', auth()->user()->id)->first();
        if ($existingLike != null) {
            $existingLike = true;
        } else {
            $existingLike = false;
        }

        $comments = $post->comments->sortByDesc('created_at');

        return view('blog.content', [
            'post' => $post,
            'existingLike' => $existingLike,
            'likes' => $likes,
            'comments' => $comments,
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

    function likePost(Request $request)
    {
        $post = BlogPost::find($request->id);
        if ($post == null) {
            return redirect()->route('home');
        }

        $existingLike = $post->likes->where('user_id', auth()->user()->id)->first();
        if ($existingLike != null) {
            $existingLike->delete();
            return redirect()->route('blog.content', ['id' => $post->id]);
        }

        $post->likes()->create([
            'user_id' => auth()->user()->id,
            'blog_post_id' => $post->id,
        ]);

        return redirect()->route('blog.content', ['id' => $post->id]);
    }

    function commentPost(Request $request)
    {
        $post = BlogPost::find($request->id);
        if ($post == null) {
            return redirect()->route('home');
        }

        $request->validate([
            'comment' => 'required|max: 1000',
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'blog_post_id' => $post->id,
            'comment' => $request->comment,
        ]);

        return redirect()->route('blog.content', ['id' => $post->id]);
    }

    function deleteComment(Request $request)
    {
        $comment = PostComments::find($request->id);
        if ($comment == null) {
            return redirect()->route('home');
        }

        $comment->delete();

        return redirect()->route('blog.content', ['id' => $comment->blog_post_id]);
    }
}
