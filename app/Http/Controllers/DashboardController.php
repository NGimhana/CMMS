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


        //First Event
        $events[] = \Calendar::event(
            "Event 1 ",//Title
            true,      //FullDAy
            '2018-2-12',//Start Time
            '2018-2-13',//End Time
            0//event ID
        );

        $caledar = \Calendar::addEvents($events)// Add and Array With Add Events
        ->setOprions([
            'firstDay' => 1
        ])->setCallbacks([

        ]);

        $data = ['title' => $title, 'calendar' => $caledar];


        return view('dashboard')->with('data', $data);
    }
}
