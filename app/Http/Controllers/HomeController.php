<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

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
        ];

        //Creating a Array of Data to send
        $data = ['user'=>$this->loggedUser,'header'=> $header , 'subheader'=> $subheader];
        return view('Pages.index')->with('data',$data);
    }
}
