<?php

use App\Calendar;
use App\Http\Resources\CalendarResource;
use App\Http\Resources\JobResource;
use App\Immediate_Job;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//List All Jobs
Route::get('job', function () {
    $jobs = Immediate_Job::orderBy("id","DESC")->paginate(3);
    return JobResource::collection($jobs);
    //return JobResource::collection($jobs[0]);
});

//List All Calendar Events
Route::get('calendars', function () {
    return CalendarResource::collection(Calendar::all());
});

//Get Immediate Job Details
Route::get('job/{id}','JobController@show');

//Create immediate Job task
Route::post('job','JobController@store');

//Update immediate Job Task
Route::put('job/{id}','JobController@update');

//Delete Asset
Route::delete('job/{id}','JobController@destroy');

//List Completed  Immediate Jobs
Route::get('jobs/completedjobs','JobController@completedJobs');

//List On Going Immediate Jobs
Route::get('jobs/ongoingjobs','JobController@onGoingJobs');

//Recently Added Jobs
Route::get('jobs/recentjobs','JobController@recentlyAddedJobs');

//OverDue Jobs
Route::get('jobs/overduejobs','JobController@overDueJobs');

//Add Calendar Event
Route::post('calendar','CalendarController@store');


//Filter Assests Mostly Maintained
Route::get('assets/maintainedmost','JobController@assetsMaintainedMost');

//Get  Assets
Route::get('assets','AssetController@index');

//Get Single Asset
Route::get('asset/{id}','AssetController@show');

//Create New  Asset
Route::post('asset','AssetController@store');

//Update  Asset
Route::put('asset/{id}','AssetController@store');

//Delete Asset
Route::delete('asset/{id}','AssetController@destroy');

//Get  Buildings
Route::get('buildings','BuildingController@index');

//Get Single Building
Route::get('building/{id}','BuildingController@show');

//Create New  Building
Route::post('building','BuildingController@store');

//Update  Building
Route::put('building/{id}','BuildingController@store');

//Delete Building
Route::delete('building/{id}','BuildingController@destroy');

//Get  Sectors
Route::get('sectors','SectorController@index');

//Get Single Sector
Route::get('sector/{id}','SectorController@show');

//Create New  Sector
Route::post('sector','SectorController@store');

//Update  Sector
Route::put('sector/{id}','SectorController@store');

//Delete Sector
Route::delete('sector/{id}','SectorController@destroy');

//Buildings Corresponding Sectors
Route::get('sector/building/{id}','SectorController@getBuildings');

//Get  Users
Route::get('users','UserController@index');

//Get Single User
Route::get('user/{id}','UserController@show');

//Update  User
Route::put('user/{id}','UserController@store');

//Delete User
Route::delete('user/{id}','UserController@destroy');

//Get  Scheduled Jobs
Route::get('scheduledjobs','ScheduledJobController@index');

//Get Single Scheduled Job
Route::get('scheduledjob/{id}','ScheduledJobController@show');

//Create  Scheduled Job
Route::post('scheduledjob','ScheduledJobController@store');

//Update  Scheduled Job
Route::put('scheduledjob/{id}','ScheduledJobController@update');

//Delete Scheduled Job
Route::delete('scheduledjob/{id}','ScheduledJobController@destroy');

//Read Notifications as Read
Route::get('markasread/notification/{id}/{userid}','NotificationController@MarkAsRead');