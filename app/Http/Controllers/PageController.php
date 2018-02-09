<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function jobs(){
        $title = "Jobs";
        return view('Pages.jobs')->with('title', $title);
    }
}
