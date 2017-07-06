<?php

namespace App\Http\Controllers;

use App\debunk;
use App\submission;
use App\User;
use App\Remedy;
use Illuminate\Http\Request;

use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;

class professionalController extends Controller
{
    //
    public function index(){
        //$item = User::find($id);
        if(Auth::check()) {
            //echo Auth::user()->fName;

           // return View::make('/prof/profile.index')
           // ->with('/prof/profile',$this->getSubmission());
                        
           return view('/prof/profile',$this->getSubmission());
            //return view('/home',$data1);
        }
        else{
            //echo 'not found';
            return redirect('/login');
        }

    }
    public static function getSubmission(){
        $data = submission::all();
        $debunk = debunk::all();
        $remedies = Remedy::all();
        $data1 = array(
            'data' => $data,
            'debunk' => $debunk,
            'remedies'=>$remedies
            );
        return $data1;
    }
   
    
}
