@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Our Partners / Add Partner</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('partners') }}" class="btn btn-sm btn-muted btn-round">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>
  <div class="row d-flex justify-content-center">
    <div class="col-md-8 col-sm-10">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Add Partner</h4>
          <p class="card-category">Super Admin Setting</p>
        </div>
        <div class="card-body">
          <form class="form" action="{{route('storePartner')}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
            @csrf
            <!--- Company Name -->
            <div class="form-group mb-4 mt-4">
                <label class="bmd-label-floating">Company Name *</label>
                <input type="text" id="name" name="name" required="required" class="form-control">
            </div>
            <!-- Company Address -->
            <div class="form-group mb-4">
                <label class="bmd-label-floating">Company Address *</label>
                <input type="text" id="address" name="address" required="required" required="required" class="form-control">
            </div>
            <!-- Company Logo -->
            <div class="d-flex justify-content-center mb-4">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <label class="bmd-label-floating">Company Logo: &nbsp; &nbsp;</label>               
                  <input type="file" id="image" name="image" required="required"/>         
              </div>
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