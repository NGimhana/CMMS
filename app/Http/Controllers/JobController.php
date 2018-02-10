<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $title = "Jobs";
        $jobs = Job::all();
        $data = ['title' => $title, 'jobs' => $jobs];
        return view('job.jobs')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Jobs";
        $jobs = Job::all();
        $data = ['title' => $title, 'jobs' => $jobs];
        $title = "Jobs";
        return view('job.create')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'des' => 'bail|required|max:255',
        ]);

        $job = new Job;

        $job->type = $request->type;
        $job->place = $request->place;
        $job->sector = $request->sector;
        $job->description = $request->des;
        $job->priority = $request->priority;

        $job->save();

        return redirect('/job/')->with('success', 'Job Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
