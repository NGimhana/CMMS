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
    return JobResource::collection(Immediate_Job::all());
});

//List All Events
Route::get('calendar', function () {
    return CalendarResource::collection(Calendar::all());
});

//Add Calendar Event
Route::post('calendar','CalendarController@store');

Route::post('job','JobController@store');


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

//Buildings Corresponding Sectors
Route::get('sector/{id}','SectorController@getBuildings');