@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Holiday Request') }}</div>

                <div class="card-body">
                    <form action="/holiday-request" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group">
                          <label for="exampleInputFirstName">First Name</label>
                        <input type="text" class="form-control" name="firstName" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputLastName">Last Name</label>
                            <input type="text" class="form-control" name="lastName">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="{{$user->email}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" name="phoneNumber" value="Phone Number">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                        <label for="start">Start date:</label>
                        <input type="date" id="start" name="holidayStart"
                            min="<?php echo date('Y-m-d'); ?>"
                            value="<?php echo date('Y-m-d'); ?>">

                        <label for="start">End date:</label>
                        <input type="date" id="end" name="holidayEnd"
                            min="<?php echo date('Y-m-d'); ?>">

                        <div class="checkbox">
                            <label for="managers">Choose manager:</label><br>
                            @foreach ($manager as $item)
                            <label><input name="manager_id" type="checkbox" value="{{ $item->id }}">{{ $item->name }}</label>
                            @endforeach
                        </div>
                               

                        <div class="form-group">
                            <label for="remarks">Remarks:</label>
                            <textarea class="form-control" rows="5" name="remark"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection