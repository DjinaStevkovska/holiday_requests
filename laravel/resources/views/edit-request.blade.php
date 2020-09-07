@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


            <div class="card m-4">
                <div class="card-header d-flex justify-content-between">
                    <h1 class="card-text">{{$HolidayRequests->firstName}}&nbsp;{{$HolidayRequests->lastName}}</h1>
                    <p>Request number: #{{ $id }}</p>

                </div>

                <form action="/update/{{$id}}" method="POST">
                    @csrf

                    {{-- @if($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif --}}
                   
                    <div class="card-body"> 
                        <div class="form-group m-3">
                            <label  for="email" style="width:150px;"><strong>Email:</strong></label> 
                            <input type="text" 
                                class="form-control @error('Email') is-invalid @enderror"
                                name="email" 
                                value="{{$HolidayRequests->email}}">
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                        </div>

                        <div class="form-group m-3">
                            <label  for="phoneNumber" style="width:150px;"><strong>Phone Number:</strong></label> 
                            <input type="text" 
                                class="form-control @error('phoneNumber') is-invalid @enderror"
                                name="phoneNumber" 
                                value="{{$HolidayRequests->phoneNumber}}">        

                                @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                        </div>

                        <div class="form-group m-3">
                            <label  for="startDate" style="width:150px;"><strong>Start Date:</strong></label>
                            <input type="text" 
                                class="form-control @error('startDate') is-invalid @enderror"
                                name="holidayStart" 
                                value="{{$HolidayRequests->holidayStart}}">     
                                
                                @error('startDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                        </div>

                        <div class="form-group m-3">
                            <label  for="endDate" style="width:150px;"><strong>End Date:</strong></label> 
                            <input type="text" 
                                class="form-control @error('endDate') is-invalid @enderror"
                                name="holidayEnd" 
                                value="{{$HolidayRequests->holidayEnd}}">     

                                @error('endDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                        </div>

                        <div class="form-group m-3">
                            <label  for="remark" style="width:150px;"><strong>Remark:</strong></label> 
                            <input type="text" 
                                class="form-control @error('remark') is-invalid @enderror"
                                name="remark" 
                                value="{{$HolidayRequests->remark}}">   
                    
                                @error('remark')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                        </div>

                    </div>

                    <div class="form-group m-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50">Update</button>
                    </div>
                </form>
            </div>


        <div class="card-body">
                    

    </div>
</div>
@endsection