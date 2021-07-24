@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Profile</a>
@endsection

@section('content')

<div class="message">
    @include('.inc/message')
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Profile</h4>
          <p class="card-category">Complete your profile</p>
        </div>
        <div class="card-body">
          <form action="{{route('updateAdminProfile')}}" method="post" role="form" autocomplete="off" data-parsley-validate>
            @csrf
            <div class="row mb-4 mt-4">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">First Name</label>
                  <input type="text" name="first_name" class="form-control" value="{{Auth::user()->first_name}}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Last Name</label>
                  <input type="text" name="last_name" class="form-control" value="{{Auth::user()->last_name}}">
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Street Address</label>
                  <input type="text" name="address" class="form-control" value="{{Auth::user()->address}}"> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">City</label>
                  <input type="text" name="city" class="form-control" value="{{Auth::user()->city}}">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Country</label>
                  <input type="text" name="country" class="form-control" value="{{Auth::user()->country}}">
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Phone No.</label>
                  <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                </div>
              </div>
            </div>
            <div class="row mb-4">              
              <div class="col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">Age</label>
                  <input type="number" name="age" class="form-control" value="{{Auth::user()->age}}"> 
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
            <div class="clearfix"></div>
          </form>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->

    <!-- Image Section -->
    <div class="col-md-4">
      <div class="card card-profile">
        <div class="card-avatar">
          <a href="#uploadModal" data-toggle="modal">
            <img class="img" src="{{ asset('uploads/Admin/'.Auth::user()->image) }}" />
          </a>
        </div>
        <div class="card-body">
          <h6 class="card-category text-gray">
          @if(Auth::user()->type==0)
            Super Admin
          @else
            Normal Admin
          @endif
          </h6>
          <h3 class="card-title">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
          <p class="card-description">
            {{Auth::user()->email}}
            <br>
            <i class="small">{{Auth::user()->address}}, {{Auth::user()->city}}</i>
          </p>
          <a href="{{route('adminProfile.enterPassword')}}" class="btn btn-primary btn-round">Change Password</a>
        </div>
      </div>

    </div><!-- Col -->

    <!-- Modal for Uploading Image -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title" id="updateModalLabel">Upload Image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">                
            <form action="{{route('changeAdminImage')}}" method="post" enctype="multipart/form-data" class="mb-0">
              @csrf
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div>
                  <input type="file" id="image" name="image" required="required" class="form-control"/>
                </div>
              </div>
              <div class="form-group text-center">
                <input class="btn btn-rose btn-round" type="submit" value="Upload">
              </div> 
              <span class="form-text small text-muted">
                  Choose your profile picture. Note* <em>Square Images</em>
              </span>             
            </form>
          </div>

          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm btn-round" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div><!-- Modal Ends -->
  </div><!-- row -->
</div><!-- container-fluid -->

@endsection