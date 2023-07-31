<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $posts = User::find(Auth::user()->id)->blogPosts()->orderBy('created_at', 'desc')->paginate(5);

        return view('users.dashboard', [
            'title' => "Dashboard | " . Auth::user()->name,
            'posts' => $posts,
        ]);
    }
    public function about()
    {
        return view('users.about', [
            'title' => 'About',
        ]);
    }
    public function guestProfile(Request $request)
    {
        $user = User::where('username', $request->username)->firstOrFail();
        $posts = $user->blogPosts()->orderBy('created_at', 'desc')->paginate(5);

        return view('users.guestProfile.guest_profile', [
            'title' => 'Guest Profile',
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    public function guestProfileAbout(Request $request)
    {
        $user = User::where('username', $request->username)->firstOrFail();

        return view('users.guestProfile.guest_profile_about', [
            'title' => 'About',
            'user' => $user,
        ]);
    }
}
