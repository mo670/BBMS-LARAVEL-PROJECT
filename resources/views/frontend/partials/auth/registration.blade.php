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
    {{-- <div class="row"> --}}
        
        <div class="col-lg-12 col-md-12 footer-form ml-5  my-5 ">
            <div class="col-md-6" style="margin:0 auto">
                <div class="form-card" >
                    <div class="form-title">
                        <h2 class="text-center"style="color: aliceblue">Patient Registration</h2>
                    </div>
                    <form action="{{ route('submitRegistration') }}" method="post">
                        @csrf
                        <div class="form-body">
                            <label for="" style="color: aliceblue">Email</label>
                            <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                            <label for="" style="color: aliceblue">Patient Name</label>
                            <input type="text" name="patient_name" placeholder="Enter Name" class="form-control">
                            <label for=""style="color: aliceblue">Patient Address</Address></label>
    
                            <input type="text" name="patient_address" placeholder="Enter Address" class="form-control">
                            <label for=""style="color: aliceblue">Patient reason</label>
    
                            <input type="text" name="patient_reason" placeholder="Your Reason" class="form-control">
                            <label for=""style="color: aliceblue">Patient age</label>
                            <input type="number" name="patient_age" placeholder="age" min="18" class="form-control">
                            <label for=""style="color: aliceblue">Patient mobile</label>
                            <input type="number" name="patient_mobile" placeholder="Enter Mobile no" class="form-control">
                            <label for=""style="color: aliceblue">patient Password</label>
                            <input type="password" name="password" placeholder="Enter password" class="form-control">
    
                            <input type="hidden" name="position" value="Patient">
    
                            <button type="submit" class="btn btn-sm btn-primary w-100">Register</button>
                        </div>
                    </form>
                </div>   
        </div>
            {{-- <div class="form-card" style="margin:0 auto">
                <div class="form-title">
                    <h4 class="text-center"style="color: aliceblue">Patient Registration</h4>
                </div>
                <form action="{{ route('submitRegistration') }}" method="post">
                    @csrf
                    <div class="form-body">
                        <label for="" style="color: aliceblue">Email</label>
                        <input type="email" name="email" placeholder="Enter Email Address" class="form-control">
                        <label for="" style="color: aliceblue">Patient Name</label>
                        <input type="text" name="patient_name" placeholder="Enter Name" class="form-control">
                        <label for=""style="color: aliceblue">Patient Address</Address></label>

                        <input type="text" name="patient_address" placeholder="Enter Address" class="form-control">
                        <label for=""style="color: aliceblue">Patient reason</label>

                        <input type="text" name="patient_reason" placeholder="Your Reason" class="form-control">
                        <label for=""style="color: aliceblue">Patient age</label>
                        <input type="number" name="patient_age" placeholder="age" min="18" class="form-control">
                        <label for=""style="color: aliceblue">Patient mobile</label>
                        <input type="number" name="patient_mobile" placeholder="Enter Mobile no" class="form-control">
                        <label for=""style="color: aliceblue">patient Password</label>
                        <input type="password" name="password" placeholder="Enter password" class="form-control">

                        <input type="hidden" name="position" value="Patient">

                        <button type="submit" class="btn btn-sm btn-primary w-100">Register</button>
                    </div>
                </form>
            </div> --}}
        </div> 
        @endsection
