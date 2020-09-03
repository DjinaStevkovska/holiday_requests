<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HolidayRequests;
use Illuminate\Support\Facades\Auth;

class HolidayRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $manager = \App\Managers::all();
        return view('/holiday-request', compact('user', 'manager'));
    }
    public function store()
    {
        $data = request()->validate([
            'firstName'    => 'required | min:2 | max:100',
            'lastName'     => 'required | min:2 | max:100',
            'email'        => 'required',
            'phoneNumber'  => 'required',
            'holidayStart' => 'required',
            'holidayEnd'   => 'required',
            'manager_id'   => 'required',
            'remark'       => ''
        ]);

        auth()->user()->HolidayRequests()->create([
            'firstName'    => $data['firstName'],
            'lastName'     => $data['lastName'],
            'email'        => $data['email'],
            'phoneNumber'  => $data['phoneNumber'],
            'holidayStart' => $data['holidayStart'],
            'holidayEnd'   => $data['holidayEnd'],
            'manager_id'   => $data['manager_id'],
            'remark'       => $data['remark']
        ]);

        return redirect('/all-requests');
    } 

    public function edit(\App\HolidayRequests $HolidayRequests, $id)
    {
        $HolidayRequests=\App\HolidayRequests::find($id);
        return view('edit-request', compact('HolidayRequests', 'id'));

    }

    public function show(\App\HolidayRequests $HolidayRequests)
    {

        $HolidayRequests=\App\HolidayRequests::all();
        return view('all-requests', compact('HolidayRequests'));
    }



    public function update(HolidayRequests $holidayRequests, $id)
    {
        $data = request()->validate([
            'email'        => 'required',
            'phoneNumber'  => 'required',
            'holidayStart' => 'required',
            'holidayEnd'   => 'required',
            'remark'       => ''
        ]);

        auth()->user()->HolidayRequests()->find($id)->update([
            'email' => $data['email'],
            'phoneNumber' => $data['phoneNumber'],
            'holidayStart' => $data['holidayStart'],
            'holidayEnd' => $data['holidayEnd'],
            'remark' => $data['remark'],
        ]);
   
        return redirect('/all-requests');
    }

}
