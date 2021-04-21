<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $notifications = $user->notifications;
        $user->unreadNotifications->markAsRead();
        return view('notifications', [
            'notifications' => $notifications,
        ]);
    }
}
