<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LogoutController extends Controller
{
    public function index(Request $request){

    	//Auth::logout();
    	//Session::flush();

    	$request->session()->forget('userInfo');
    	$request->session()->flush();
    	return redirect('/login');
    }
}
