<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
class InsertRemedy extends Controller
{
    //
    public function index(){
        $remedy_name = Input::get('RemedyName');
        $disease_name = Input::get('DiseaseName');
        $content = Input::get('content');
        echo $remedy_name + " " + $disease_name;
    }
    
}
