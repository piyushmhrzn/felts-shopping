@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Profile / Change Password</a>
@endsection

@section('content')

<div class="message">
    @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('adminProfile') }}" class="btn btn-sm btn-muted btn-round">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>
  
  <div class="row d-flex justify-content-center">
    <div class="col-md-6 col-sm-10">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Change Password</h4>
          <p class="card-category">Please enter your current password to proceed further</p>
        </div>
        <div class="card-body">
            <form action="{{route('checkPassword')}}" method="post" role="form" autocomplete="off" data-parsley-validate>
            @csrf
              <!-- Current Password -->
              <div class="form-group mt-4">
                  <label class="bmd-label-floating">Enter your Current Password</label>
                  <input type="password" class="form-control" id="old_password" name="old_password" required="required">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-round float-right">Next</button>
              </div>
          </form>
        </div>
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container-fluid -->

@endsection