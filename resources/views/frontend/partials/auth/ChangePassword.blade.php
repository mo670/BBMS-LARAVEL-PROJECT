@extends('frontend.master.master')
@section('main_frontend')

<div class="col-12">
    <div class="col-6 text-center" style="margin: auto">
        @include('frontend.layouts.errorAndSuccessMessage')
    </div>
</div>
<div class="col-12">
    <div class="col-md-6 my-5" style="margin: auto">
        <form action="{{route('updatePasswordPatient')}}" method="post">
            @method('put')
            @csrf
            <h3 class="text-center">Change your password</h3>

            <label for="">Current password</label>
            <input type="password" class="form-control" name="OldPassword" placeholder="your current password">

            <label for="">New password</label>
            <input type="password" class="form-control" name="NewPassword" placeholder="Enter new password">
            
            <label for="">Confirm password</label>
            <input type="password" class="form-control" name="NewPasswordConfirm" placeholder="Confirm new password">

            <button type="submit" class="btn btn-sm btn-success mt-3">Update Password</button>

        </form>
    </div>
</div>
    
@endsection