@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('Make a Holiday Request') }}</h1></div>

                <div class="card-body">
                    <form action="/holiday-request" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group m-3">
                            <label for="firstName"><strong>First Name</strong></label>
                            <input type="text" 
                                class="form-control @error('firstName') is-invalid @enderror"
                                name="firstName" 
                                value="{{$user->name}}"
                                autofocus>

                                @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        {{-- value="{{ old('firstName') ?? $user->name}}" required autocomplete="firstName" autofocus> --}}

                        <div class="form-group m-3">
                            <label for="lastName"><strong>Last Name</strong></label>
                            <input type="text" 
                                class="form-control @error('lastName') is-invalid @enderror" 
                                name="lastName"
                                autofocus>

                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror   
                        </div>

                        
                        <div class="form-group m-3">
                            <label for="email"><strong>Email address</strong></label>
                            <input type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                aria-describedby="emailHelp" 
                                value="{{$user->email}}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror   
                        </div>
                        

                        <div class="form-group m-3">
                            <label for="phoneNumber"><strong>Phone Number</strong></label>
                            <input type="tel" 
                                class="form-control @error('phoneNumber') is-invalid @enderror" 
                                name="phoneNumber" 
                                value="Phone Number">
                                <small class="form-text text-muted">We'll never share your email with anyone else.</small>

                                @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror  
                        </div>


                        <div class="form-group m-3 d-flex justify-content-between">
                            <label for="holidayStart"><strong>Start date:</strong></label>
                            <input type="date" id="start" 
                                name="holidayStart"
                                min="<?php echo date('Y-m-d'); ?>"
                                value="<?php echo date('Y-m-d'); ?>"
                                class="@error('holidayStart') is-invalid @enderror" >
    
                                @error('holidayStart')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
    
    
                            <label for="holidayEnd"><strong>End date:</strong></label>
                            <input type="date" id="end" name="holidayEnd"
                                min="<?php echo date('Y-m-d'); ?>"
                                class="@error('holidayEnd') is-invalid @enderror" >
                                
                                @error('holidayEnd')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                        </div>



                        <div class="checkbox m-3">
                            <label for="manager_id"><strong>Choose manager:</strong></label><br>
                            @foreach ($manager as $item)
                            <label><input name="manager_id" 
                                type="checkbox" 
                                value="{{ $item->id }}"
                                {{-- class="form-control @error('manager_id') is-invalid @enderror" --}}
                                >
                                {{ $item->name }}
                            </label>
                            @endforeach
                        </div>
                               

                        <div class="form-group m-3">
                            <label for="remark"><strong>Remarks:</strong></label>
                            <textarea class="form-control" rows="5" name="remark"></textarea>
                        </div>


                        <div class="form-group m-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary w-50">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection