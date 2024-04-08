<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) 
    {

       // unread notifications
          
       $notifications = auth()->user()->unreadNotifications; 

       return view("notifications.index", compact('notifications'));

    }
}
