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
                            <label  for="holidayStart"><strong>Start Date:</strong></label>
                            <input type="date" 
                                name="holidayStart" 
                                min="<?php echo date('Y-m-d'); ?>"
                                value="{{$HolidayRequests->holidayStart}}"
                                class="form-control @error('holidayStart') is-invalid @enderror">     
                                
                                @error('holidayStart')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 

                            <label  for="holidayEnd"><strong>End Date:</strong></label> 
                            <input type="date" 
                                name="holidayEnd" 
                                value="{{$HolidayRequests->holidayEnd}}"
                                class="form-control @error('holidayEnd') is-invalid @enderror">     

                                @error('holidayEnd')
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

                    {{-- @if($errors->any())
                    {{ implode('', $errors->all(':message')) }}
                    @endif --}}
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection