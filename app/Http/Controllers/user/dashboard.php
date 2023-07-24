<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboard extends Controller
{
    public function index()
    {
        return view('users.dashboard', [
            'title' => "Dashboard | " . Auth::user()->name,
        ]);
    }
}
