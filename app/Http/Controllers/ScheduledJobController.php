<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Resources\ScheduledJobResource;
use App\Notifications\ScheduledJobNotification;
use App\Scheduled_Job;
use App\User;
use Illuminate\Http\Request;

class ScheduledJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduledJobs = Scheduled_Job::orderBy("id","DESC")->paginate(3);
        return ScheduledJobResource::collection($scheduledJobs);
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
        $job = new Scheduled_Job();

        $job->id = $request->input('id');
        $job->type = $request->input('type');
        $job->asset_id = $request->input('asset_id');
        $job->priority = $request->input('priority');
        $job->description = $request->input('description');

        $job->Scheduled_Date = $request->input('Scheduled_Date');
        $job->End_Year= $request->input('End_Year');
        $job->frequency= $request->input('frequency');
        $job->Ended_Date = $request->input('Ended_Date');
        //$job->Last_Updated_Date= $request->input('Last_Updated_Date');
        $job->created_user_id = $request->input('created_user_id');
        $job->Assigned_Person_id = $request->input('assigned_person');


        if($job->save()){

            //Send Notification to Created Person
//            $user = User::findOrFail($job->created_user_id);

//            //Send Notification to Assigned Person
            $user = User::findOrFail($job->Assigned_Person_id);
//
            $user->notify(new ScheduledJobNotification($job));
            return new ScheduledJobResource($job);
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
        //Get Scheduled Job
        $job = Scheduled_Job::findOrFail($id);

        //return single Scheduled Job as a resource
        return new ScheduledJobResource($job);
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
        $job = Scheduled_Job::findOrFail($id);

        $job->type = $request->input('type');
        $job->asset_id = $request->input('asset_id');
        $job->priority = $request->input('priority');
        $job->description = $request->input('description');

        $job->Scheduled_Date = $request->input('Scheduled_Date');
        $job->End_Year= $request->input('End_Year');
        $job->frequency= $request->input('frequency');
        $job->Ended_Date = $request->input('Ended_Date');
        $job->Last_Updated_Date= $request->input('Last_Updated_Date');
        $job->created_user_id = $request->input('created_user_id');
        $job->Assigned_Person_id = $request->input('assigned_person');


        if($job->update()){
            return new ScheduledJobResource($job);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get Scheduled Job
        $job = Scheduled_Job::findOrFail($id);

        if($job->delete()){
            return new ScheduledJobResource($job);
        }
    }
}
