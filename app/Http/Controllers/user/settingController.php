<?php

namespace App\Http\Controllers\user;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class settingController extends Controller
{
    public function index()
    {
        return view('users.setting.setting', [
            'title' => 'Setting',
        ]);
    }
    public function security()
    {
        return view(
            'users.setting.security',
            [
                'title' => 'security',
            ]
        );
    }

    public function UpdateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
        ]);

        User::where('id', Auth::user()->id)->update([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Email Updated');
    }
    public function UpdateUsername(Request $request)
    {
        $request->validate([
            'username' => 'required|max:10|alpha_num|unique:users',
        ]);

        User::where('id', Auth::user()->id)->update([
            'username' => $request->username,
        ]);

        return redirect()->back()->with('success', 'Email Updated');
    }
    public function UpdateProfileInfo(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30|regex:/^[a-zA-Z\s]+$/',
        ], [
            'name.regex' => 'The name field must only contain letters and spaces.',
        ]);

        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Name Updated');
    }

    public function UpdateAbout(Request $request)
    {
        $request->validate([
            'about' => 'required|max:160',
        ]);

        User::where('id', Auth::user()->id)->update([
            'about' => $request->about,
        ]);

        return redirect()->back()->with('success', 'About Updated');
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Check Old Password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['not_matched' => 'Old Password Not Matched']);
        }

        User::where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'About Updated');
    }
}
