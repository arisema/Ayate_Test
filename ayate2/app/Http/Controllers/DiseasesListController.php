<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class DiseasesListController extends Controller
{
  public function index(){
    return view('index');
  }


  public function getAjax()
{
    $id = $_POST['id'];

    $diseases = DB::table('Diseases')->where('Catagory', $id)->get() ;

    foreach ($diseases as $row)


        {

          echo "<table id='table'>";
          echo "<tr><td><a href='#' onclick='getRemedies(this.id)' id=".$row->Name."  class='Disease'>". $row->Name."</td></a></tr>";
          echo "</table>";

        }

}
}
