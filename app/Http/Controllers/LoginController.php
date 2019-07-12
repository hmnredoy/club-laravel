<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function index(){
    	return view('login.index');
    }

    public function verify(Request $request){


        if($request->username == null || $request->password == null)
            {
               return redirect('login')->with("message","Empty fields!")->with('style','alert alert-warning');
            }
            else{

            $response = DB::table('users')
                ->where('username', $request->username)
                ->first();

            if($response){
              //  if (Hash::check($request->password,  $response->password)) {
                if ($request->password === $response->password) { //to be removed
                    
                    $request->session()->put('userInfo', $response);

                    DB::table('users')
                    ->where('username', $response->username)
                    ->update(['loggedIn' => time()]);

                    return redirect('helper');

                }
                else{

                    return redirect('login')->with("message","Wrong Password!")->with('style','alert alert-danger'); 
                }
   
            }
            else{

                return redirect('login')->with("message","Username is not registered.")->with('style','alert alert-danger'); 
            }
            
        }

    }
}
