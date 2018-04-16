<?php

use App\Immediate_Job;
use Illuminate\Http\Request;
use App\Calendar;
use App\Http\Resources\JobResource;
use App\Http\Resources\CalendarResource;

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
   // $jobs = Immediate_Job::paginate(15);
    return JobResource::collection(Immediate_Job::all());
    //return JobResource::collection($jobs[0]);
});

//Create immediate Job task
Route::post('job','JobController@store');

//Update immediate Job Task
Route::put('job/{id}','JobController@update');

//Delete Asset
Route::delete('job/{id}','JobController@destroy');

//List Completed  Immediate Jobs
Route::get('job/completedjobs','JobController@completedJobs');

//List On Going Immediate Jobs
Route::get('job/ongoingjobs','JobController@onGoingJobs');

//Recently Added Jobs
Route::get('job/recentjobs','JobController@recentlyAddedJobs');

//OverDue Jobs
Route::get('job/overduejobs','JobController@overDueJobs');

//List All Events
Route::get('calendar', function () {
    return CalendarResource::collection(Calendar::all());
});

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