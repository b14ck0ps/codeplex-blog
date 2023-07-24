<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    public function store(Request $request)
    {
        // validate the request
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        // sign the user in
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        }

        // redirect
        return redirect()->route('dashboard');
    }
}
