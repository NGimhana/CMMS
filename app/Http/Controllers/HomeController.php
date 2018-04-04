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
        $username=Auth::user()->name;
        $header="Dashboard";
        $subheader="@SystemDashboard";
        $data=['username'=>$username,'header'=>$header,'subheader'=>$subheader];
        return view('Pages.index')->with('data',$data);
    }
}
