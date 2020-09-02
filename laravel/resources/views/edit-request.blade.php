@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card m-4">
                <div class="card-header d-flex">
                    <h4 class="card-text mr-5">{{$HolidayRequests->firstName}}&nbsp;{{$HolidayRequests->lastName}}</h4>
                    <p class="ml-3 mr-3">Request number: #{{ $id }}</p>

                </div>

                <form action="/update/{{$id}}" method="POST">
                    @csrf

                    @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                   
                    <div class="card-body p-5 mx-auto">        
                        <div class="row m-5">
                            <h4 style="width:150px;">Email:</h4> 
                            <input name="email" value="{{$HolidayRequests->email}}">
                        </div>
                        <div class="row m-5 d-flex">
                            <h4 style="width:150px;">Phone Number:</h4> 
                            <input name="phoneNumber" value="{{$HolidayRequests->phoneNumber}}">        
                        </div>
                        <div class="row m-5 d-flex">
                            <h4 style="width:150px;">Start Date:</h4>
                            <input name="holidayStart" value="{{$HolidayRequests->holidayStart}}">     
                        </div>
                        <div class="row m-5 d-flex">
                            <h4 style="width:150px;">End Date:</h4> 
                            <input name="holidayEnd" value="{{$HolidayRequests->holidayEnd}}">     
                        </div>
                        <div class="row m-5 d-flex">
                            <h4 style="width:150px;">Remark:</h4> 
                            <input name="remark" value="{{$HolidayRequests->remark}}">   
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mx-auto float-right m-3">Update</button>

                </form>
            </div>


        <div class="card-body">
                    

    </div>
</div>
@endsection