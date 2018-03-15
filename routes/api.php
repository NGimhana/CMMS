<?php

use Illuminate\Http\Request;
use App\Job;
use App\Http\Resources\JobResource;

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

Route::post('/job','JobController@store');


