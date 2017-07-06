<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetrieveArticleController extends Controller
{
    public function index(){
      return view(index);
    }
    public function getAjax(){

      $id = $_POST['id'];

      $articles = DB::table('randomArticles')->where('id', $id)->get() ;

        echo $articles->Header;
      //return response()->json(array('article'=>$articles->Article), array('header'=>$articles->Header));
    }

  }
