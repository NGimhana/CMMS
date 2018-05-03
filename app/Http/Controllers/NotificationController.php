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
                $job = json_decode(json_encode($notification->data));
                $notification->markAsRead();
                app('\App\Http\Controllers\JobController')->specificJob($job->id);
                break;


            }else{
                echo "Error";
            }
        }
    }
    /*Get All Unread Notifications*/
    public function getAllUnreadNotifications($userid){
        $user = app('\App\Http\Controllers\UserController')->show($userid);
        $notifications = json_decode(json_encode($user->unreadNotifications)) ;
        return $notifications;
    }
}
