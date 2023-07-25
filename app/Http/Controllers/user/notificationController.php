<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function index()
    {
        return view('users.notification', [
            'title' => 'Notification',
        ]);
    }
}
