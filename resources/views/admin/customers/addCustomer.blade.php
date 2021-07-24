@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Our Customers / Add Customer</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('customers') }}" class="btn btn-sm btn-muted btn-round">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>
  <div class="row d-flex justify-content-center">
    <div class="col-md-8 col-sm-10">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Add Customer</h4>
          <p class="card-category">Super Admin Setting</p>
        </div>
        <div class="card-body">
          <form class="form" action="{{route('storeCustomer')}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
            @csrf
            <!--- Customer Name -->
            <div class="form-group mb-4 mt-4">
                <label class="bmd-label-floating">Customer Name *</label>
                <input type="text" id="name" name="name" required="required" class="form-control">
            </div>
            <!-- Customer Address -->
            <div class="form-group mb-4">
                <label class="bmd-label-floating">Customer Address *</label>
                <input type="text" id="address" name="address" required="required" required="required" class="form-control">
            </div>
            <div class="row mb-4">            
              <!-- Customer Phone -->
              <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Customer Phone *</label>
                    <input type="text" id="phone" name="phone" required="required" class="form-control">
                </div>
              </div>
              <!--- Customer Email -->
              <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Customer Email <small>(Optional)</small></label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
              </div>
            </div>
            <!-- Customer Logo -->
            <div class="d-flex justify-content-center mb-4">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <label class="bmd-label-floating">Customer Logo: &nbsp; &nbsp;</label>               
                  <input type="file" id="image" name="image"/>         
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