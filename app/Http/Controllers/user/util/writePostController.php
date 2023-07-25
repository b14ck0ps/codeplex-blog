<?php

namespace App\Http\Controllers\user\util;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class writePostController extends Controller
{
    public function index()
    {
        return view('users.util.writePost', [
            'title' => 'Write Post',
        ]);
    }
}
