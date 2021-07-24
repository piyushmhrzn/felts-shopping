@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Profile / Enter Code</a>
@endsection

@section('content')

<div class="message">
    @include('.inc/message')
</div>

<div class="container-fluid">
  <div class="row d-flex justify-content-center">
    <div class="col-md-6 col-sm-10">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Enter Code</h4>
          <p class="card-category">A 6-digit verification code was just sent to your email address</p>
        </div>
        <div class="card-body">
            <form action="{{route('checkOTP')}}" method="post" role="form" autocomplete="off" data-parsley-validate>
            @csrf
              <!-- Check OTP -->
              <div class="form-group mt-4">
                  <label class="bmd-label-floating">Enter your Code</label>
                  <input type="text" id="otp" name="otp" class="form-control" required="required">
              </div>
              <div class="form-group">
                <!-- Didn't get code? Click &nbsp;<a href="{{route('resendOTP')}}">here</a>&nbsp; to resend the code. -->
                <button type="submit" class="btn btn-primary btn-round float-right">Next</button>
              </div>
          </form>
        </div>
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container-fluid -->

@endsection