<?php

namespace App\Http\Controllers;
use App\Submission;
use Illuminate\Http\Request;

class submissionViewController extends Controller
{
    
     public function view($s=null){
         if($s==null){
            $subs=Submission::orderBy('created_at','desc')->get();
             $submissions = array(
            'data' => $subs);
           return view('submissions',$submissions)->with('message','no');
        
         }
         else{
               
                $search=$_GET["search"];
                return redirect('/submissions')->with('message',$search);
           
         
         }
         
         
     }
}
