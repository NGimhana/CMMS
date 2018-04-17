<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header="Dashboard";
        $subheader="@SystemDashboard";

        //loggedUser
        $this->loggedUser = [
            //User Name
            'username' => \auth()->user()->name,
            'userid' => \auth()->user()->id,
            'useremail' => \auth()->user()->email,
            'unreadNotifications' => \auth()->user()->unreadNotifications
        ];

        $notifications = json_decode($this->loggedUser['unreadNotifications']);


//        Creating a Array of Data to send
        $data = ['user' => $this->loggedUser, 'header' => $header, 'subheader' => $subheader, 'notifications' => $notifications];
        return view('Pages.index')->with('data',$data);
    }
}
