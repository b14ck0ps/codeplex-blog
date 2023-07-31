<?php

namespace App\Http\Controllers\user\util;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class searchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->q;

        $posts = BlogPost::where('title', 'LIKE', '%' . $search . '%')->orWhere('content', 'LIKE', '%' . $search . '%')->paginate(5);

        return view('users.util.search', [
            'title' => 'Search',
            'posts' => $posts,
            'search' => $search,
        ]);
    }
}
