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
        if(strlen(Input::get('detailedExplanation'))>50){
            return redirect('/profile')->with('message',"detailed explanation over 50 characters");
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

        return redirect('/profile');
         }
         
        
        
        
        
        
        
}