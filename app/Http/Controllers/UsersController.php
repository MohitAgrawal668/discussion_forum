<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function notifications()
        {
            auth()->user()->unreadNotifications->markAsRead();
            $notifications = auth()->user()->notifications;
            $data = compact('notifications');
            return view("users.notifications")->with($data);
        }
}
