<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
