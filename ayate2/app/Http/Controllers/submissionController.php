<?php

namespace App\Http\Controllers;

use App\submission;
use Illuminate\Http\Request;

class submissionController extends Controller
{
    //
    public function index(){
        $submission = submission::orderBy('created_at', 'desc')->get();
        $data = array(
            'data' => $submission);
        return view('submissions',$data);
    }
}
