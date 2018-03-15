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

// Route::get('/', function () {
//     return view('welcome');
// });

//Routing To index
Route::get('/','PageController@index');


//Routing to Jobs Page
Route::resource('job', 'JobController');

//Authentication Routes
Auth::routes();

//Routing to Calendar Pages
Route::resource('calendar','CalendarController');

Route::get('/home', 'HomeController@index')->name('home');


