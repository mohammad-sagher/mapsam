@extends('dashboard.master')
        @section('title')
            registeration Doctor
        @endsection
    @section('sidebar')
        @include('partials.sidebar')


    @endsection

@section('content')


    <div class="mt-3 row">
        <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
            <div class="card-title">Vertical Form</div>
            <hr>
            <form action="{{route('doctor.Register')}}" method="post">
                @csrf
            <div class="form-group">
            <label for="input-1">Name</label>
            <input type="text" name="name" class="form-control" id="input-1" placeholder="Enter Your Name" value="{{old('name')}} ">
            </div>
            <div class="form-group">
            <label for="input-2">Email</label>
            <input type="text" name="email" class="form-control" id="input-2" placeholder="Enter Your Email Address" value="{{old('email')}}">
            </div>
            <div class="form-group">
            <label for="input-3">phone</label>
            <input type="text" name="phone" class="form-control" id="input-3" placeholder="Enter Your Mobile Number" value="{{old('phone')}}    ">
            </div>
            <div class="form-group">
                <label for="input-3">address</label>
                <input type="text" name="address" class="form-control" id="input-3" placeholder="Enter Your address" value="{{old('address')}}    ">
            </div>
            <div class="form-group">
                <label for="input-3">speciality</label>
                <input type="text" name="speciality" class="form-control" id="input-3" placeholder="Enter Your speciality" value="{{old('speciality')}}    ">
            </div>
            <div class="form-group">
            <label for="input-4">Password</label>
            <input type="text" name="password" class="form-control" id="input-4" placeholder="Enter Password" value="{{old('password')}}">
            </div>
            <div class="form-group">
            <label for="input-5">Confirm Password</label>
            <input type="text" name="confirm_password" class="form-control" id="input-5" placeholder="Confirm Password" value="{{old('confirm_password')}}">
            </div>

            </div>
            <div class="form-group">
            <button type="submit" class="px-5 btn btn-light"><i class="icon-lock"></i> Register</button>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection
