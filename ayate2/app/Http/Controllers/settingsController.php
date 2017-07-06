<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;
class settingsController extends Controller
{
    //

    use RegistersUsers;
    public function index(){
        if(Auth::check()) {
            //echo Auth::user()->fName;

            $variable = 0;

            $data = array(
                'data' => $variable);


            return view('/prof/settings',$data);
            //return view('/home',$data1);
        }
        else{
            //echo 'not found';
            return redirect('/login');
        }

    }



    public function general(){

        $user = User::find(Auth::user()->id);
        if(strlen(Input::get('name'))>50){
            return redirect('/settings')->with('message',"Name is too long!");
        }


        else if(strlen(Input::get('workAddress'))>50){
            return redirect('/settings')->with('message',"Work Address is too long!");
        }

        else if(strlen(Input::get('occupation'))>50){
            return redirect('/settings')->with('message',"occupation is too long!");
        }

        else if(strlen(Input::get('experience'))>150){
            return redirect('/settings')->with('message',"Experience is too long!");
        }
        
        $FullName = Input::get('name');
        $mName = "";
        $lName = "";
        $fName = "";
        $Name = preg_split("/[\s,]+/", $FullName);
        if(sizeof($Name) == 3){
            $fName = $Name[0];
            $mName = $Name[1];
            $lName = $Name[2];
        }
        elseif (sizeof($Name) ==2){
            $fName = $Name[0];
            $mName = $Name[1];
        }
        else{
            $fName = $Name[0];
        }
        $user->fName = $fName;
        $user->lName = $lName;
        $user->mName = $mName;
        $user->email = Input::get('email');
        $user->phone = Input::get('phone');
        $user->workAddress = Input::get('workAddress');
        $user->occupation = Input::get('occupation');
        $user->experience = Input::get('experience');
        $user->save();
        $variable = 0;

        $data = array(
            'data' => $variable);
        return redirect('/profile');
    }

    public function specific(){
        $user = User::find(Auth::user()->id);
        if(Input::get('password') == Input::get('password_confirm')){
            $user->password = bcrypt(Input::get('password'));
            $user->save();
            $variable = 1;

            $data = array(
                'data' => $variable);
            return redirect('/settings/{'.$data.'}');
        }
        else{

            $variable = 2;

            $data = array(
                'data' => $variable);
            return redirect('/settings/{'.$data.'}');
        }

    }
}
