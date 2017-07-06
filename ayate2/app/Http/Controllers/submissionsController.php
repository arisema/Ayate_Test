<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Authentication;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use App\Submission;
use Illuminate\Session\TokenMismatchException;
use Psy\Exception\ErrorException;

class submissionsController extends Controller
{
        protected $email;
        protected $dName;
        protected  $rName;
        protected $desc;
        protected $cat;
     /* public function __construct()
    {
         
         string $email,string $dName,string $rName,string $cat,string $desc
        $this->email=$email;
        $this->dName=$dName;
        $this->rName=$rName;
        $this->cat=$cat;
        $this->desc=$desc;
        */
      
        
        //$this->middleware('auth');
        
   // }
    public function __construct()
    {
          
    }
        
    
    
    public function getdName(){
        return $this->dName;
    }
      public function getrName(){
        return $this->rName;
    }
     public function getDesc(){
        return $this->desc;
    }
    
   public function setrName($name){

         $this->rName=$name;

   }
    public function setdName($name){
      

         $this->dName=$name;

   }
    public function setDesc($name){
      


         $this->desc=$name;

   }
   public function setEmail($name){
        $this->email=$name;
       
       
   }
    public function setCategory($name){
        $this->cat=$name;
       
       
   }
   
  
     
     
    
  
    public function submit(){
      try{
          $subs=Submission::all();
          $submissions = array(
              'submissions' => $subs);
          $this->setrName($_POST["remedyName"] );
          $this->setdName($_POST["diseaseName"] );
          $this->setDesc($_POST["diseaseName"] );

          $this->email=$_POST["email"];

          $this->cat=$_POST["category"];

          if(strlen($this->getrName())>50){
              return redirect('/submissions')->with('message',"Remedy name over 50 characters");
          }
          else if(strlen($this->getdName())>50){
              return redirect('/submissions')->with('message',"Disease name over 50 characters");
          }
          else if(strlen($this->getDesc())>500){
              return redirect('/submissions')->with('message',"Description over 500 characters");
          }
          else {

              $curr = Carbon::now();


              DB::table('submissions')->insert(array('submitterEmail' => $this->email, 'diseaseName' => $this->dName, 'remedyName' => $this->rName, 'description' => $this->desc, 'category' => $this->cat, 'created_at' => $curr
              ));
              return redirect('/submissions')->with('message', 'You have submitted successfully!');
          }
      }
      catch(InvalidDateException $e){
          return redirect('/submissions')->with('message','oops!something happened!');
      }
        catch (TokenMismatchException $t){
            return redirect('/submissions')->with('message','oops!something happened!');
        }
       }
       //return redirect('/submissions')->with('message',$name);
       
     
     
     
    
     
        
   

}
