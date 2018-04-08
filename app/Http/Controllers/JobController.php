<?php

namespace App\Http\Controllers;
use App\Immediate_Job;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\JobResource as JobResource;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    protected $loggedUser;

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

        //loggedUser
        $this->loggedUser = [
            //User Name
            'username' => \auth()->user()->name,
            'userid' => \auth()->user()->id,
            'useremail' => \auth()->user()->email,
        ];

        //Creating a Array of Data to send
        $data = ['user'=>$this->loggedUser,'header'=> $header , 'subheader'=> $subheader];

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

        $job->id = $request->input('id');
        $job->type = $request->input('type');
        $job->asset_id = $request->input('asset_id');
        $job->priority = $request->input('priority');
        $job->description = $request->input('description');

        $job->Started_Date = $request->input('starteddate');
        $job->Scheduled_End_Date = $request->input('scheduled_end_date');
        //$job->Ended_Date = $request->input('Ended_Date');
        $job->created_user_id = $request->input('created_user_id');
        $job->Assigned_Person_id = $request->input('assigned_person');

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
