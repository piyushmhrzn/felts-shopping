@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Our Team / Add Team Member</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('team') }}" class="btn btn-sm btn-muted btn-round" title="Send Mail">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>
  <div class="row d-flex justify-content-center">
    <div class="col-md-8 col-sm-10">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Add Team Member</h4>
          <p class="card-category">Super Admin Setting</p>
        </div>
        <div class="card-body">
          <form class="form" action="{{route('storeMember')}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
            @csrf
            <!--- Full Name -->
            <div class="form-group mb-4 mt-4">
                <label class="bmd-label-floating">Name *</label>
                <input type="text" id="name" name="name" required="required" class="form-control">
            </div>
            <!-- Profile Picture -->
            <div class="d-flex justify-content-center mb-4">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <label class="bmd-label-floating">Profile Picture: &nbsp; &nbsp;</label>               
                  <input type="file" id="image" name="image"/>  
                  <span class="form-text small text-danger text-left">
                    *Please enter a square image.
                  </span>       
              </div>
            </div>
            <!-- Designation -->
            <div class="form-group mb-4">
                <label class="bmd-label-floating">Designation *</label>
                <input type="text" id="designation" name="designation" required="required" class="form-control">
            </div>
            <!-- Short Bio -->
            <div class="form-group mb-4">
                <label class="bmd-label-floating">Short Bio </label>
                <textarea id="bio" name="bio" rows="3" class="form-control"></textarea>
            </div>
            <!-- Facebook -->
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-facebook-square"></i>
                    </span>
                </div>
                <input type="text" id="facebook" name="facebook" class="form-control" placeholder="Facebook">
            </div>
            <!-- Instagram -->
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-instagram"></i>
                    </span>
                </div>
                <input type="text" id="instagram" name="instagram" class="form-control" placeholder="Instagram">
            </div>
            <!-- Twitter -->
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-twitter-square"></i>
                    </span>
                </div>
                <input type="text" id="twitter" name="twitter" class="form-control" placeholder="Twitter">
            </div>
            <div class="form-group d-flex justify-content-center pt-4">
                <button type="submit" class="btn btn-success btn-round">Save</button>
            </div>
          </form>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->

  </div><!-- row -->
</div><!-- container-fluid -->

@endsection