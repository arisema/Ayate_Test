<?php

namespace App\Http\Controllers;

use App\debunk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Submission;
use App\Remedy;
use DB;
use Carbon\Carbon;
   

class postController extends Controller
{
    //
    public function index(){
     $this->call(GET,'posts');
     $this->assertViewHas('posts');
     
         }
         
        
        
        
        
        
        
}