@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Profile / Change Password</a>
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
          <h4 class="card-title">Change Password</h4>
          <p class="card-category">Enter your New Password</p>
        </div>
        <div class="card-body">
            <form action="{{route('updatePassword')}}" method="post" role="form" autocomplete="off" data-parsley-validate>
            @csrf
              <!-- New Password -->
              <div class="form-group mb-4 mt-4">
                    <label class="bmd-label-floating">New Password</label>
                    <input type="password" class="form-control" id="password" name="password" required="required">
                    <span class="form-text small text-muted">
                        The password must be 8-20 characters, and must <em>not</em> contain spaces.
                    </span>
                </div>
                <!-- New Password -->
                <div class="form-group">
                    <label class="bmd-label-floating">Confirm New Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="required">
                    <span class="form-text small text-muted">
                        To confirm, type the new password again.
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-round float-right">Save</button>
                </div>
          </form>
        </div>
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container-fluid -->

@endsection