<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Room;

class InstructorController extends Controller
{
    public function roomCreate(Request $request)
    {
    	$data = new room;

        $data->user_id = $request->input('user_id');
    	$data->rname = $request->input('name');
    	$data->rkey = $request->input('key');
    	$data->description = $request->input('desc');
    	//$data->user_id = $request->input('user_id');
    	$data->save();

    	return redirect()->back()->with('status', 'Room Added Successfully');
    }

    public function roomList()
    {
    	$room = Room::all();
    	return view('instructor.roomlist', ['rlist' => $room]);
    }
}
