<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Authentication;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class remedyViewPageController extends Controller
{
 
      /*public function __construct()
    {
        $this->middleware('auth');
    }*/
    
    public function view($id=null){
      if($id==null){
        return view('remedyViewPage');
  
      } 
      else{
          
        $curr=Carbon::now();
        
        $comment=$_GET["comment"]; 
        $name=$_GET["commentorName"]; 
        $email=$_GET["commentorEmail"]; 
        $rate=$_GET["rating"]; 
           DB::table('comments')->insert(array('remedyid'=> $id,'comment'=>$comment , 'username'=>$name, 'email'=> $email,'rating'=>$rate, 'time'=> $curr
     ));
        return view('remedyViewPage');
      } 
     
     
    }
    public function comment($id){
        
        $curr=Carbon::now();
        
        $comment=$_GET["comment"]; 
        $name=$_GET["commentorName"]; 
        $email=$_GET["commentorEmail"]; 
           DB::table('comments')->insert(array('remedyid'=> $id,'comment'=>$comment , 'username'=>$name, 'email'=> $email, 'time'=> $curr
     ));
        return view('remedyViewPage');
       
     
     
     
    }
     
        
   

}
