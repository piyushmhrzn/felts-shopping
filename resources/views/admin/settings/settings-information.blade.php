@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Settings / Company Information</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('settings') }}" class="btn btn-sm btn-muted btn-round">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>

  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Company Information</h4>
          <p class="card-category">Set company email, phone numbers & address</p>
        </div>
        <div class="card-body">
            <form class="form" action="{{route('updateCompanyInformation')}}" method="post" role="form" autocomplete="off" data-parsley-validate>
                @csrf
                <div class="row mb-5 mt-4">            
                    <!-- Company Primary Email -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Primary Email *</label>
                            <input type="text" id="primary_email" name="primary_email" value="{{ $companyInfo->primary_email }}" required="required" class="form-control">
                        </div>
                    </div>
                    <!-- Company Secondary Email -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Secondary Email<small>(optional)</small></label>
                            <input type="text" id="secondary_email" name="secondary_email" value="{{ $companyInfo->secondary_email }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-5">            
                    <!-- Company Primary Phone Number -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Primary Phone Number *</label>
                            <input type="text" id="primary_phone" name="primary_phone" value="{{ $companyInfo->primary_phone }}" required="required" class="form-control">
                        </div>
                    </div>
                    <!-- Company Secondary Phone Number -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Secondary Phone Number<small>(optional)</small></label>
                            <input type="text" id="secondary_phone" name="secondary_phone" value="{{ $companyInfo->secondary_phone }}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mb-5">            
                    <!-- Company Street -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Street / Address</label>
                            <input type="text" id="street" name="street" value="{{ $companyInfo->street }}" class="form-control">
                        </div>
                    </div>
                    <!-- Company City -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company City</label>
                            <input type="text" id="city" name="city" value="{{ $companyInfo->city }}" class="form-control">
                        </div>
                    </div>
                    <!-- Company Country -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Country</label>
                            <input type="text" id="country" name="country" value="{{ $companyInfo->country }}" class="form-control">
                        </div>
                    </div>
                </div>
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