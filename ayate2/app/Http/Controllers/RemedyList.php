<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RemedyList extends Controller
{
    //get method retrieves the index view
    public function index(){

      return view('index');

    }
    // post method publishes the data or result of execution
    public function getAjax(){
      $id=$_POST['id'];
      //performs database query selection
        $remedies=DB::table('remedies')->where('diseaseName', $id)->get();

        foreach ($remedies as $row)


        {

          echo "<table id='table'>";
          echo "<tr><td><a href='remedyViewPage?name=$row->remedyName' id=".$row->remedyName." onclick='viewRemedy(this.id)' class='Disease'>". $row->remedyName."</td></a></tr>";
          echo "</table>";

        }


    }
}
