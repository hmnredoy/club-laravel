<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreClub;

class ClubController extends Controller
{
    public function create() {

        $last_data = DB::table('club_info')
            ->latest('id')
            ->first();
        $new_club_id = intval($last_data->id)+1;

        return view('club.create', compact('new_club_id'));
    }

    public  function store(StoreClub $request) {
        dd($request);
        return "done";
    }
}
