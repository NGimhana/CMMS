<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Http\Resources\CalendarResource;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Header is the title of the Page
        $header="Calendar";

        //SubHeader is the Subtitle of the Page
        $subheader='@JobCalendar';

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
        
        //Return a Page with With values
        return view('Pages.calendar')->with('data',$data);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calendar = new Calendar;

        $calendar->id = $request->id;
        $calendar->job_id = $request->job_id;
        $calendar->scheduled_job_id = $request->scheduled_job_id;


        if($calendar->save()){
            return new CalendarResource($calendar);
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
