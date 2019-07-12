<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function index(Request $request){

	$user = $request->session()->get('userInfo');

    $cur_time   = time();
    $time_elapsed   = $cur_time - $user->loggedin;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
	    // Seconds
	    if($seconds <= 60){
	    	$request->session()->put('loggedin', $seconds.' seconds ago');
	    }
	    //Minutes
	    else if($minutes <=60){
	        if($minutes==1){
	            $request->session()->put('loggedin', 'one minute ago');
	        }
	        else{
	            $request->session()->put('loggedin', $minutes.' minutes ago');
	        }
	    }
	    //Hours
	    else if($hours <=24){
	        if($hours==1){
	            $request->session()->put('loggedin', 'an hour ago');
	        }else{
	            $request->session()->put('loggedin', $hours.' hours ago');
	        }
	    }
	    //Days
	    else if($days <= 7){
	        if($days==1){
	            $request->session()->put('loggedin', 'yesterday');
	        }else{
	            $request->session()->put('loggedin', $days.' days ago');
	        }
	    }
	    //Weeks
	    else if($weeks <= 4.3){
	        if($weeks==1){
	            $request->session()->put('loggedin', 'a week ago');
	        }else{
	            $request->session()->put('loggedin', $weeks.' weeks ago');
	        }
	    }
	    //Months
	    else if($months <=12){
	        if($months==1){
	            $request->session()->put('loggedin', 'a month ago');
	        }else{
	            $request->session()->put('loggedin', $months.' months ago');
	        }
	    }
	    //Years
	    else{
	        if($years==1){
	            $request->session()->put('loggedin', 'one year ago');
	        }else{
	            $request->session()->put('loggedin', $years.'years ago');
	        }
	    }

	    return redirect('home');

	}
}

