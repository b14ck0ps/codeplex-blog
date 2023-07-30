<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class registrationController extends Controller
{
    public function index()
    {
        return view('auth/registration', [
            'title' => 'Registration',
        ]);
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($request->hasFile('profile-picture')) {
            $request->validate([
                'profile-picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $uuid = Str::uuid()->toString();
            // Get the file extension from the uploaded image
            $extension = $request->file('profile-picture')->getClientOriginalExtension();
            // Combine the UUID and extension to create the new filename
            $filename = $uuid . '.' . $extension;

            $profile_picture = $request->file('profile-picture')->storeAs('profile_picture', $filename, 'public');
        } else {
            $profile_picture = 'profile_picture/default.png';
        }


        // store user to database
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_photo_path' => $profile_picture,
        ]);

        // sign the user in
        auth()->attempt($request->only('email', 'password'));
        // redirect
        return redirect()->route('dashboard');
    }
}
