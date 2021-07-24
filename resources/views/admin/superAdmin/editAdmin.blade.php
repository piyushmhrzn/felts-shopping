@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Super Admin Settings / Edit Admin</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('superAdmin') }}" class="btn btn-sm btn-muted btn-round">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>

  <div class="row d-flex justify-content-center">
    <div class="col-md-8 col-sm-10">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Admin</h4>
          <p class="card-category">Super Admin Setting</p>
        </div>
        <div class="card-body">
          <form class="form" action="{{route('updateAdmin',[$admin->id])}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
            @csrf
              <!--- Admin First Name -->
              <div class="form-group mb-4 mt-4">
                  <label class="bmd-label-floating">Admin First Name *</label>
                  <input type="text" id="first_name" name="first_name" value="{{$admin->first_name}}" required="required" class="form-control">
              </div>
              <!--- Admin Last Name -->
              <div class="form-group mb-4">
                  <label class="bmd-label-floating">Admin Last Name *</label>
                  <input type="text" id="last_name" name="last_name" value="{{$admin->last_name}}" required="required" class="form-control">
              </div>
              <!-- Admin Email -->
              <div class="form-group mb-4">
                <label class="bmd-label-floating">Admin Email *</label>
                <input type="email" id="email" name="email" value="{{$admin->email}}" required="required" class="form-control">
            </div>
            <div class="form-group">
                <label for="formControlSelect">Admin Type *</label>
                <select name="type" class="custom-select" id="formControlSelect">
                    <option {{($admin->type==1)?'selected':''}} value="1">Normal Admin</option>
                    <option {{($admin->type==0)?'selected':''}} value="0">Super Admin</option>
                </select>
            </div>
            <br>
            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-round">Save</button>
            </div>
          </form>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->

  </div><!-- row -->
</div><!-- container-fluid -->

@endsection
