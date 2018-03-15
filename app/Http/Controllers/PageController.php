<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $header="Dashboard";
        $subheader="@SystemDashboard";
        $data=['header'=>$header,'subheader'=>$subheader];
        return view('Pages.index')->with('data',$data);
    }

    public function start(){        
        return view('Pages.HomePage');
    }
    // public function job(){
    //     $header="JobTasks";
    //     $subheader="Maintenace Job Board";
    //     $data = ['header'=> $header , 'subheader'=>$subheader];
    //     return view('Pages.job')->with('data',$data);
    // }
}
