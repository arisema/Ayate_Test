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
   

class debunkController extends Controller
{
    //
    public function index($id){
        if(strlen(Input::get('detailedExplanation'))>500){
            return redirect('/profile')->with('message',"detailed explanation too long");
        }
        $debunk_data = new debunk();
        $explanation = Input::get('detailedExplanation');
        $rate = Input::get('rating');
        $debunk_data->submissionId = $id;
        $debunk_data->explanation = $explanation;
        $debunk_data->verifyDebunk = 'verify';
        $debunk_data->rate = $rate;
        $debunk_data->verifyBy = Auth::user()->id;
        $debunk_data->save();
         $curr=Carbon::now();
         
               return redirect('/profile');
         }
         
        
        
        
        
        
        
}