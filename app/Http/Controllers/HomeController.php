<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index(Request $request)
    {

        if ($request->session()->has('userInfo'))
        {
            //$request->session()->put('login_status','loggedIn');

            $user = $request->session()->get('userInfo');

            if($user->user_type == "admin"){

               // $request->session()->flash('success_login','Welcome Admin! You have been signed in successfully!'); 
           
                return view('home.admin.index')->with('success_login', 'Welcome Admin! You have been signed in successfully!');
            }
            else if($user->user_type == "moderator"){
                return view('home.moderator.index', ['success_login' => 'Welcome Moderator! You have been signed in successfully!']);
            }
            else if($user->user_type == "student"){

                return view('home.student.index', ['success_login' => 'Welcome Student! You have been signed in successfully!']);
            }
            else{
               return redirect('/login')->with("message","Something went wrong! Cause : User Type was not found!")->with('style','alert alert-danger'); 
            }
        }
        else{
            return redirect('/login'); 
        }
    }

}
