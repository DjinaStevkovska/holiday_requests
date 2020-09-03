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
        return view('/holiday-request', compact('user'));
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
            'remark'       => ''
        ]);

        auth()->user()->HolidayRequests()->create([
            'firstName'    => $data['firstName'],
            'lastName'     => $data['lastName'],
            'email'        => $data['email'],
            'phoneNumber'  => $data['phoneNumber'],
            'holidayStart' => $data['holidayStart'],
            'holidayEnd'   => $data['holidayEnd'],
            'remark'       => $data['remark']
        ]);

        return redirect('/all-requests');
        // return(alert('request sent'));
        // need to represent the request
        // return redirect('/profile/' . auth()->user()->id);

    } 

    public function edit(\App\HolidayRequests $HolidayRequests, $id)
    {
        // $this->authorize('update', $HolidayRequests->HolidayRequests);
        $HolidayRequests=\App\HolidayRequests::find($id);
        // dd($HolidayRequests);
        return view('edit-request', compact('HolidayRequests', 'id'));

    }

    public function show(\App\HolidayRequests $HolidayRequests)
    {
        // dd($HolidayRequests->HolidayRequests());
        // dd($HolidayRequests->count());
        $HolidayRequests=\App\HolidayRequests::all();
        // $user = App\Http\Controllers\Auth::user();
        // dd($user);
        // dd($user->HolidayRequests[0]->id);
    //  need to make auth for can update
        return view('all-requests', compact('HolidayRequests'));
    }



    public function update()
    {
        // dd(request()->all());

        $data = request()->validate([
            'email'        => 'required',
            'phoneNumber'  => 'required',
            'holidayStart' => 'required',
            'holidayEnd'   => 'required',
            'remark'       => 'required'
        ]);

        auth()->user()->HolidayRequests()->update([
            'email' => $data['email'],
            'phoneNumber' => $data['phoneNumber'],
            'holidayStart' => $data['holidayStart'],
            'holidayEnd' => $data['holidayEnd'],
            'remark' => $data['remark'],
        ]);
   
        return redirect('/all-requests');
    }




}
