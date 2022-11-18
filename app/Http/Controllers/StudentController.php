<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class StudentController extends Controller
{
    public function login(Request $request){
        if($request -> method() == "POST"){

           if(Auth::guard('student')->attempt(['email' => $request -> email, 'password' => $request -> password])){
                return redirect()->route('student.dashboard');
           }else{
                return redirect()->route('student.login');
           }

        }else{
            return view("student.login");
        }
    }

    public function dashboard(Request $request){
        if($request -> method() == "POST"){

        }else{
            return view("student.dashboard");
        }
    }
}
