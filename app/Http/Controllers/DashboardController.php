<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
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
        $title = "Dashboard";
        $data = ['title' => $title];
        return view('dashboard')->with('data', $data);
    }
}
