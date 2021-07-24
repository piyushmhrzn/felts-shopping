@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Settings / Company Name</a>
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
    <div class="col-md-10 col-sm-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Company Name</h4>
          <p class="card-category">Set company name, sub-name & its meta description</p>
        </div>
        <div class="card-body">
            @if(isset($setting))
                <form class="form" action="{{route('updateCompanySetting')}}" method="post" role="form" autocomplete="off" data-parsley-validate>
                    @csrf
                    <!--- Company Name -->
                    <div class="form-group mb-4 mt-3">
                        <label class="bmd-label-floating">Company Name *</label>
                        <input type="text" id="company_name" name="company_name" value="{{ $setting->company_name }}" required="required" class="form-control">
                    </div>
                    <!--- Meta Description -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="bmd-label">Meta Description</label>
                            <div class="form-group">
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="6">{{ $setting->meta_description }}</textarea>
                            </div>
                        </div>
                    </div>   
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-round">Save</button>
                    </div>           
                </form>
            @else
                <form class="form" action="{{route('storeCompanySetting')}}" method="post" role="form" autocomplete="off" data-parsley-validate>
                    @csrf
                    <!--- Company Name -->
                    <div class="form-group mb-4 mt-3">
                        <label class="bmd-label-floating">Company Name *</label>
                        <input type="text" id="company_name" name="company_name" required="required" class="form-control">
                    </div>
                    <!--- Meta Description -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="bmd-label">Meta Description</label>
                            <div class="form-group">
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="6"></textarea>
                            </div>
                        </div>
                    </div> 
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-round">Save</button>
                    </div>             
                </form>
            @endif
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->

  </div><!-- row -->
</div><!-- container-fluid -->

@endsection