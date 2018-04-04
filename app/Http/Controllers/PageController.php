<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        return view('welcome');
    }


    // public function job(){
    //     $header="JobTasks";
    //     $subheader="Maintenace Job Board";
    //     $data = ['header'=> $header , 'subheader'=>$subheader];
    //     return view('Pages.job')->with('data',$data);
    // }
}
