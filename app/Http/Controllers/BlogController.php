<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index()
    {
        return view('home');
    }

    function content()
    {
        return view('blog.content');
    }
}
