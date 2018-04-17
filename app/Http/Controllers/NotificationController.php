<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /*Marks Notification as Read*/
    public function MarkAsRead($id,$userid){
        $user = app('\App\Http\Controllers\UserController')->show($userid);

        foreach ($user->unreadNotifications as $notification) {
            if($notification->id == $id){
                $notification->markAsRead();
            }else{
                echo "Error";
            }
        }
    }
}
