<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Authentication;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class submissionViewPageController extends Controller
{
 
      /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    
    public function view($id=null){
      if($id==null){
        return view('submissionViewPage');
  
      } 
      else{
          
        $curr=Carbon::now();
        
        $comment=$_GET["comment"]; 
        $name=$_GET["commentorName"]; 
        $email=$_GET["commentorEmail"]; 
        $rate=$_GET["rating"]; 
           DB::table('subcomments')->insert(array('subid'=> $id,'comment'=>$comment , 'username'=>$name, 'email'=> $email,'rating'=>$rate, 'time'=> $curr
     ));
        return view('submissionViewPage');
      } 
     
     
    }
   
     
        
   

}
