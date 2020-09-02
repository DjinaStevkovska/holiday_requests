@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Holiday Request') }}</div>

                <div class="card-body">
                    <form action="/holidayRequest" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="form-group">
                          <label for="exampleInputFirstName">First Name</label>
                          <input type="text" class="form-control" name="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputLastName">Last Name</label>
                          <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" class="form-control" name="phoneNumber" placeholder="Phone Number">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <label for="start">Start date:</label>

                        <input type="date" id="start" name="holidayStart"
                            value="2018-07-22"
                            min="2018-01-01" max="2018-12-31">
                            {{-- hardcoded min and mac --}}

                        <label for="start">End date:</label>

                        <input type="date" id="end" name="holidayEnd"
                            value="2018-07-22"
                            min="2018-01-01" max="2018-12-31">
                            {{-- hardcoded min and mac --}}

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