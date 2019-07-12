<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMembers;
use App\Http\Requests\UpdateMember;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index(Request $request){


    	// $users = DB::table('users')
     //    ->Rightjoin('joined_clubs', function($join)
     //    {
     //        $join->on('users.username', '=', 'joined_clubs.username')
     //        	 ->join('club_info', 'joined_clubs.club_id', '=', 'club_info.club_id')
     //             ->where('users.user_type', '<>', 'admin');
     //    })
     //    ->get();

        // $users = DB::table('users')
        //     ->join('joined_clubs', 'users.username', '=', 'joined_clubs.username')
        //     ->join('club_info', 'joined_clubs.club_id', '=', 'club_info.club_id')
        //     ->where('users.user_type', '<>', 'admin')
        //     ->distinct()
        //     ->get();

        $users = DB::table('users')
        	->where('user_type', '<>', 'admin')
        	->orderBy('id', 'desc')
            ->paginate(10);
        	// ->limit(10)
        	// ->get();

       	$club = DB::table('joined_clubs')
       		->join('club_info', 'joined_clubs.club_id', '=', 'club_info.club_id')
       		->get();


        // $comp = DB::table('users')
        //         ->select(DB::raw("CONCAT(`name`,' ',`username`) AS display_name"),'id')->get()->pluck('display_name','id');
        // dd($comp);


    	$request->session()->put('userData',$users);

    	return view('members.index')->with('userData',$users)->with('clubInfo',$club);
    }


    public function create(){

    	$club_data = DB::table('club_info')
       		->get();

    	return view('members.create')->with('clubData',$club_data);
    }


//This is store function for members
    public function store(StoreMembers $request){

    	   $request->flashExcept(['password', 'image']);

  
	    	$imageName = time().'.'.$request->image->getClientOriginalExtension();

	        $request->image->move(public_path('images'), $imageName);

	        if($request->designation== null){
	        	$designation = 'General Member';
	        }
	        else{
	        	$designation = $request->designation;
	        }

		    	$params = [
		            'user_type' => 'student',
		            'name' => $request->name,
		            'username' => $request->username,
		            'dob' => $request->dob,
		            'phone' => $request->phone,
		            'email' => $request->email,
		            'password' => Hash::make($request->password),
		            'active_status' => 'active',
		            'avatar' => $imageName,
		            'join_date' => date("d-m-Y"),
		            'designation' => $designation,
		            'gender' => $request->gender
		        ];
		        $res = DB::table('users')
		            ->insert($params);

		        foreach($request->club as $club){
		        	$clubinfo = [
		        	'club_id' => $club,
		            'username' => $request->username,
		            'status' => 'active'
		        	];


		    	 	DB::table('joined_clubs')
		            ->insert($clubinfo);
		    	}

                // $id = DB::getPdo()->lastInsertId();
		         
                // var_dump($id);

		         if($res){
		         	return redirect('/member')
                    ->with('message','Member Added Successfully')
                    ->with('style','alert alert-success');
		         }
		         else{
		         	return redirect()->back()->with('message','Something went wrong!')->with('style','alert alert-danger');
		         }
	       }


    public function delete($id)
    {
    	$res = DB::table('users')
    			->where('username',$id)
		        ->first();

		$club = DB::table('joined_clubs')
       		->join('club_info', 'joined_clubs.club_id', '=', 'club_info.club_id')
       		->where('joined_clubs.username','=',$id)
       		->get();
    	
    	return view('members.delete')->with('userInfo',$res)->with('clubInfo',$club);
    }

    public function destroy($id)
    {
    	$res_img = DB::table('users')
    			->where('username',$id)
		        ->first();

		if(file_exists(public_path("/images/".$res_img->avatar))){

	      unlink(public_path("/images/".$res_img->avatar));

	    }

    	$res = DB::table('users')->where('username', '=', $id)->delete();

    	DB::table('joined_clubs')->where('username', '=', $id)->delete();

    	if($res){
         	return redirect('/member')->with('message','Member Deleted Successfully')->with('style','alert alert-success');
         }
         else{
         	return redirect()->back()->with('message','Something went wrong!')->with('style','alert alert-danger');
         }
    	
    }

    public function show($id)
    {

    	$res = DB::table('users')
			->where('username',$id)
	        ->first();

		$club = DB::table('joined_clubs')
       		->join('club_info', 'joined_clubs.club_id', '=', 'club_info.club_id')
       		->where('joined_clubs.username','=',$id)
       		->get();


   		$join = DB::table('joined_clubs')
   			->where('username','=',$id)
   			->get();
  

		if($join->isEmpty())
		{
		$data = array('club_id' => '0' , 'club_name' => '0' );
		
		}
		else{

			foreach ($join as $key) {
   			$data[] = ['club_id' => $key->club_id ];		       		
			}
		}


		$clubList = DB::table('club_info')
     		->whereNotIn('club_id',$data)
     		->get();


    	return view('members.details')
	    	->with('userInfo',$res)
	    	->with('clubInfo',$club)
	    	->with('clubList',$clubList);
    }


    public function action(Request $request)
    {
    	if($request->action == 'club_remove'){

    		DB::table('joined_clubs')
	    		->where('username',$request->username)
	    		->where('club_id',$request->club_id)
	    		->delete();

	    	return redirect()->back()->with('message','Club Removed.')->with('style','alert alert-danger');
    	}
    	if($request->action == 'club_assign'){
    		DB::table('joined_clubs')
    		 ->insert(['club_id' => $request->club_id, 'username' => $request->username, 'status' => 'inactive']);

    		 return redirect()->back()->with('message','Successfully added to a club.')->with('style','alert alert-success');

    	}
    	if($request->action == 'deactivate_user_from_club'){
    		DB::table('joined_clubs')
    			->where('club_id', $request->club_id)
    			->where('username', $request->username)
    			->update(['status' => 'inactive']);

    		return redirect()->back()->with('message','This user is deactivated from the club.')->with('style','alert alert-danger');

    	}
    	if($request->action == 'activate_user_from_club'){

    		DB::table('joined_clubs')
    			->where('club_id', $request->club_id)
    			->where('username', $request->username)
    			->update(['status' => 'active']);

    		return redirect()->back()->with('message','The user has access to the club now.')->with('style','alert alert-success');
    	}
        if($request->action == 'change_image'){

            if ($request->hasFile('image')) {
                
                if(file_exists(public_path("/images/".$request->avatar))){

                unlink(public_path("/images/".$request->avatar));

                }

            $imageName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $imageName);

            DB::table('users')
                ->where('username',$request->username)
                ->update(['avatar' => $imageName]);

            return redirect()->back()->with('message','Image updated!')->with('style','alert alert-success');


            }

           return redirect()->back()->with('message','Select an image first!')->with('style','alert alert-danger');



        }

    	DB::table('users')
    		->where('username',$request->username)
		    ->update(['active_status' => $request->active_status]);

		return redirect()->back()->with('message','Action performed!')->with('style','alert alert-success');
	   

    }


    public function edit($id){

        $res = DB::table('users')
            ->where('username',$id)
            ->first();

           // var_dump($res->id);

        return view('members.edit')
            ->with('userInfo',$res);
    }

    public function update(UpdateMember $request){

   
        $params = [
            'name' => $request->name,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'email' => $request->email,
            'designation' => $request->designation,
            'gender' => $request->gender
        ];
        $res = DB::table('users')
            ->where('username',$request->username)
            ->update($params);

        if($res){
            return redirect()->back()->with('message','Member information updated successfully!')->with('style','alert alert-success');  
        }
        else{
            return redirect()->back()->with('message','Failed!')->with('style','alert alert-danger');                
        }
            
        
    }



    public function message($id){

        return view('members.message');
    }





}
