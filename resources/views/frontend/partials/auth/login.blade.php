@extends('frontend.master.master')
@section('main_frontend')
      <div class="col-12">
        <div class="col-6 text-center"  style="margin: auto" >
           @include('frontend.layouts.errorAndSuccessMessage')
        </div>
    </div>
    <div id="banner-area" class="banner-area" style="background-image:url(frontend/assets/images/slider/banner1.jpg)">
        <div class="banner-text" text-center>
            <div class="container" text-center>
                <div class="row"text-center>
                    <div class="col-lg-6" text-center>
                        <div class="banner-heading">
                            {{-- <h1 class="banner-title"text-center>Login</h1> --}}
                        </div>
                    </div>
                 </div>
                </div>
            
        </div>
    {{-- <div class="row">
        <div class="col-lg-5 col-md-12 footer-form ml-5  my-5 text-center">
            <div class="form-card">
                <div class="form-title">
                    <h4>Patient Registration</h4>
                </div>
                <form action="{{ route('submitRegistration') }}" method="post">
                    @csrf
                    <div class="form-body">
                        <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                        <input type="text" name="patient_name" placeholder="Enter Name" class="form-control">
                        <input type="text" name="patient_address" placeholder="Enter Address" class="form-control">

                        <input type="text" name="patient_reason" placeholder="Your Reason" class="form-control">
                        <input type="number" name="patient_age" placeholder="age" min="1" class="form-control">
                        <input type="number" name="patient_mobile" placeholder="Enter Mobile no" class="form-control">
                        <input type="password" name="password" placeholder="Enter password" class="form-control">

                        <input type="hidden" name="position" value="Patient">

                        <button type="submit" class="btn btn-sm btn-primary w-100">Register</button>
                    </div>
                </form>
            </div>
        </div>  --}}




        {{----------------------- Login -------------- --}}
        <div class="col-12 py-5">
        <div class="col-lg-5 col-md-2 footer-form ml-5 my-5 text-center">
            <div class="form-card text-center">
                <div class="form-title">
                    <h1 style="color:rgb(250, 249, 249)"> Patient Login</h1>
                </div>
                <form action="{{ route('submitLogin') }}" method="post">
                    @csrf
                    <div class="form-body">
                        <input type="email" name="email" placeholder="Enter Email" class="form-control">
                        <input type="password" name="password" placeholder="Enter password" class="form-control">
                        {{-- <button type="submit" class="btn btn-sm btn-primary w-150">Login</button>
                        <button type="submit" class="btn btn-sm btn-primary w-150" href="{{ route('registration')}}">Registration</button> --}}
                        
                            <button class="btn btn-primary w-100 mb-1" type="submit"> Login</button>
                            <a href="{{ route('registration') }}" class="btn btn-primary w-100 ">new here?Registration now</a>
                        

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
