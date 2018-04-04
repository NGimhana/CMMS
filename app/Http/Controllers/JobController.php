<?php

namespace App\Http\Controllers;
use App\Immediate_Job;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;;
use App\Http\Resources\JobResource;



class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Header is the title of the Page
        $header="JobTasks";

        //SubHeader is the Subtitle of the Page
        $subheader='@MaintenaceJobBoard';
                
        //Creating a Array of Data to send
        $data = (['header'=> $header , 'subheader'=> $subheader]);        
        
        //Return a Page with With values
        return view('Pages.job')->with('data',$data);                                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job = new Immediate_Job();

        $job->id = $request->id;
        $job->type = $request->type;
        $job->asset_id = $request->asset_id;
        $job->priority = $request->priority;
        $job->description = $request->description;

        $job->Started_Date = $request->Started_Date;
        $job->Scheduled_End_Date = $request->Scheduled_End_Date;
        $job->Ended_Date = $request->Ended_Date;
        $job->created_user_id = $request->created_user_id;
        $job->Assigned_Person_id = $request->Assigned_Person_id;


        if($job->save()){
            return new JobResource($job);
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
