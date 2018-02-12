<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','PageController@index');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


Route::resource('job', 'JobController');
Route::resource('building', 'BuildingController');
Route::resource('sector', 'SectorController');

Route::get('/calendar', function () {
    $title = "Calendar";
    $data = ['title' => $title];
    return view('calendar')->with('data', $data);
});