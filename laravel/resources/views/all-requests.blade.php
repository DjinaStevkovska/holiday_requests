@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Holiday Request') }}</div>
                    <div class="p-2 m-2">
                        <h2>Here will be displayed your requests!</h2>
                    </div>
                    
                    
                    @foreach ($HolidayRequests as $item)

                    <div class="card m-4">
                        <div class="card-header d-flex">
                            <h4 class="card-text mr-5">{{$item->firstName}}&nbsp;{{$item->lastName}}</h4>
                            <p class="ml-5">Request number: #{{ $item->id}}</p>
                            {{-- @can('update', $user->HolidayRequests) --}}
                            @if (!$item->reportIsSent)
                                <a class="float-right" href="/edit/{{ $item->id }}">Edit Request</a>
                            @endif
                            {{-- @endcan --}}
                        </div>
                        <div class="card-body p-5">        
                            <div class="row">Email: {{$item->email}}</div>
                            <div class="row">Number: {{$item->phoneNumber}}</div>
                            <div class="row">Start Date: {{$item->holidayStart}}</div>
                            <div class="row">End Date: {{$item->holidayEnd}}</div>
                            <div class="row">Remark: {{$item->remark}}</div>
                        </div>
                    </div>

                    @endforeach
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection