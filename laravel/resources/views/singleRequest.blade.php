@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card m-4">
                <div class="card-header d-flex">
                    <h4 class="card-text mr-5">{{$HolidayRequests->firstName}}&nbsp;{{$HolidayRequests->lastName}}</h4>
                    <p class="ml-3 mr-3">Request number: #{{ $id }}</p>
                    {{-- @can('update', $user->HolidayRequests) --}}
                    <a class="float-right" href="/edit/{{ $HolidayRequests->id }}">Edit Request</a>
                    {{-- @endcan --}}
                </div>

                <form action="/allRequests" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('post')
                    
                    <div class="card-body p-5 mx-auto">        
                        <div class="row m-5">
                            <h4 style="width:150px;">Email:</h4> 
                            <textarea name="email">
                                {{$HolidayRequests->email}}
                            </textarea>
                        </div>
                        <div class="row m-5 d-flex">
                            <h4 style="width:150px;">Number:</h4> 
                            <textarea name="phoneNumber">
                                {{$HolidayRequests->phoneNumber}}
                            </textarea>
                        </div>
                        <div class="row m-5 d-flex">
                            <h4 style="width:150px;">Start Date:</h4>
                            <textarea name="holidayStart">
                                {{$HolidayRequests->holidayStart}}
                            </textarea>
                        </div>
                        <div class="row m-5 d-flex">
                            <h4 style="width:150px;">End Date:</h4> 
                            <textarea name="holidayEnd">
                                {{$HolidayRequests->holidayEnd}}
                            </textarea>
                        </div>
                        <div class="row m-5 d-flex">
                            <h4 style="width:150px;">Remark:</h4> 
                            <textarea name="remark">
                                {{$HolidayRequests->remark}}
                            </textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mx-auto float-right m-3">Update</button>

                </form>
            </div>


        <div class="card-body">
                    

    </div>
</div>
@endsection