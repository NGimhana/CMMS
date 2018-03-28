<?php

use Illuminate\Http\Request;
use App\Job;
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
Route::get('/job', function () {
    return JobResource::collection(Job::all());
});

//List All Events
Route::get('/calendar', function () {
    return CalendarResource::collection(Calendar::all());
});

//Add Calendar Event
Route::post('/calendar','CalendarController@store');

Route::post('/job','JobController@store');


