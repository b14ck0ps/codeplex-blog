<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('users.dashboard', [
            'title' => "Dashboard | " . Auth::user()->name,
        ]);
    }
    public function about()
    {
        return view('users.about', [
            'title' => 'About',
        ]);
    }
    public function guestProfile()
    {
        return view('users.guestProfile.guest_profile', [
            'title' => 'Guest Profile',
        ]);
    }
    public function guestProfileAbout()
    {
        return view('users.guestProfile.guest_profile_about', [
            'title' => 'About',
        ]);
    }
}
