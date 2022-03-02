<?php

namespace App\Http\Controllers;

use App\Models\CheckIn;
use App\Models\Group;

use App\Models\Submission;

use App\Models\Room;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function membersCreate(Request $request) {

        $request->validate([
            'user_id' => 'required|unique:groups',
            'group_name'   => 'required|unique:groups',
            'member1' => 'required|unique:groups',
            'member2' => 'required|unique:groups',
            'member3' => 'required|unique:groups',
            'member4' => 'required|unique:groups',
            'yearnsection' => 'required',
        ]);

        $memdata = new group;
        $memdata->user_id = $request->input('user_id');
        $memdata->group_name = $request->input('group_name');
        $memdata->member1 = $request->input('member1');
        $memdata->member2 = $request->input('member2');
        $memdata->member3 = $request->input('member3');
        $memdata->member4 = $request->input('member4');
        $memdata->section = $request->input('yearnsection');
        $memdata->save();

        return redirect()->back()->with('status', 'Group Member Added Successfully');
    }

    /**
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fileUpload(Request $req) {

        $req->validate([
            'file' => 'required|mimes:csv,docx,txt,xlx,xls,pdf|max:2048'
        ]);
        $fileModel = new Submission;
        $fileModel->user_id = $req->input('user_id');
        $fileModel->room_id = $req->input('room_name');
        //dd($fileModel->room_id);
        //$room = Auth::user()->room;
        //$fileModel->room_id = Room::where('user_id','LIKE','%'.$room.'%')->first();
        if($req->file()) {
            $fileName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
        }
    }

    /**
     * @return Application|Factory|View
     */
    public function displayStudentDashboard() {
        //$groups   = Group::all();
        // $files = File::all();
        $user = Auth::user();
        $groups = Auth::user()->groups;
        $files    = Auth::user()->files;
        $check_ins = $user->check_ins;
        return view('/dashboard', compact('groups', 'files', 'check_ins'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function searchRoom(Request $request) {

        $request->validate([
            'search_room' => 'required',
        ]);

        $term = $request->input('search_room');
        $filterData = Room::where('rname','LIKE','%'.$term.'%')
            ->get();
        //dd($filterData);
        if($filterData == true) {
            return view('student.classroom', compact('filterData'));
        }
        else{
            return redirect('/classroom')->with('again', 'No data found please search again');
        }

        //dd($filterData);

    }

    public function joinRoom(Request $request) {

        $enroll = new checkin;

        $key = $request->input('mykey');
        $findKey = Room::where('rkey','LIKE','%'.$key.'%')->first();

        if($findKey == true){
            //$rooms = Auth::user()->rooms;
            $enroll->room_id = $findKey->id;
            $enroll->user_id = $request->input('user_id');
            $enroll->save();
            //dd($enroll->room_id);
            return back()
                ->with('success-join','You successfully join... back to the dashboard and transfer a document in the chose rooms.');
        }
        else {
            return back()
                ->with('wrongkey','Wrong key please type again');
        }
    }



}
