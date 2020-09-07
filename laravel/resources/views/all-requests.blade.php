@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h1>{{ __('All Holiday Requests') }}</h1>
                <a href="/home" class="nav-link">
                    <button class="btn btn-success">Make New Request</button>
                </a>
            </div>

            @if(sizeof($HolidayRequests) == 0) 
                <div class="p-2 m-2">
                    <h2>Here will be displayed all your requests!</h2>
                </div>
            @else

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Request no:</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Remark</th>
                    </tr>
                </thead>  

                <tbody>
                    @foreach ($HolidayRequests as $item)
                    <tr>
                        <th scope="row">#{{ $item->id}}</th>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phoneNumber}}</td>
                        <td>{{$item->holidayStart}}</td>
                        <td>{{$item->holidayEnd}}</td>
                        <td>{{$item->remark}}</td>
                        
                            @if (!$item->reportIsSent)
                            <td class="table-primary">
                                <a class="float-right" href="/edit/{{ $item->id }}">Edit Request</a>
                            </td>
                            @else
                            <td class="table-danger">
                                <span class="text-danger"><strong>Request sent</strong></span>         
                            </td>                       
                            @endif
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @endif 

        </div>
    </div>
</div>
@endsection