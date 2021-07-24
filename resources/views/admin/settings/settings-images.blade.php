@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Settings / Company Images</a>
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
      <div class="card mb-5">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Company Images</h4>
          <p class="card-category">Set company images favicon & logo</p>
        </div>
        <div class="card-body">
            <form class="form" action="{{route('updateCompanyImages')}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
                @csrf
                <div class="row mb-5 mt-4">
                  <!-- Company Favicon -->
                  <div class="col-md-6">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                          <label class="bmd-label-floating">Favicon: &nbsp; &nbsp;</label>               
                          <input type="file" id="favicon" name="favicon"/>   
                          <span class="form-text small text-muted text-left pl-4">
                              Current Favicon:
                              <img class="img-thumbnail" src="{{ asset('uploads/Settings/Favicon/'.$setting->favicon) }}" style="height:100px"/>
                          </span>      
                      </div>
                  </div>
                  <!-- Company Logo -->
                  <div class="col-md-6">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                          <label class="bmd-label-floating">Logo: &nbsp; &nbsp;</label>               
                          <input type="file" id="logo" name="logo"/>   
                          <span class="form-text small text-muted text-left pl-4">
                              Current Logo:
                              <img class="img-thumbnail" src="{{ asset('uploads/Settings/Logo/'.$setting->logo) }}" style="height:100px"/>
                          </span>        
                      </div>
                  </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-round">Save</button>
                </div>           
            </form>
        </div><!-- card-body -->
      </div><!-- card -->

        <!-- Banner First -->
      <div class="card mt-5">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Homepage First Banner Section</h4>
          <p class="card-category">Set company homepage slideshow banner image information</p>
        </div>
        <div class="card-body">
            <form class="form" action="{{route('updateFirstBanner')}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
                @csrf
                <!-- Banner Image 1 -->
                <div class="d-flex justify-content-center mb-4 mt-4">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <label class="bmd-label-floating">Homepage First Banner Image: &nbsp; &nbsp;</label>               
                        <input type="file" id="homepage_banner1" name="homepage_banner1"/>  
                        <span class="form-text small text-muted text-left pl-4">
                            Current Image:
                            <img class="img-thumbnail" src="{{ asset('uploads/Settings/FirstBanner/'.$setting->homepage_banner1) }}" style="height:100px"/>
                        </span>        
                    </div>
                </div>
                <!-- Main Header-->
                <div class="row mb-5">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Main Heading *</label>
                            <input type="text" id="main_heading1" name="main_heading1" value="{{ $setting->main_heading1 }}" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Sub Header-->
                <div class="row mb-5">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Sub Heading *</label>
                            <input type="text" id="sub_heading1" name="sub_heading1" value="{{ $setting->sub_heading1 }}" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-round">Save</button>
                </div>           
            </form>
        </div><!-- card-body -->
      </div><!-- card -->

        <!-- Banner Second -->
      <div class="card mt-5">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Homepage Second Banner Section</h4>
          <p class="card-category">Set company homepage slideshow banner image information</p>
        </div>
        <div class="card-body">
            <form class="form" action="{{route('updateSecondBanner')}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
                @csrf
                <!-- Banner Image 2 -->
                <div class="d-flex justify-content-center mb-4 mt-4">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <label class="bmd-label-floating">Homepage Second Banner Image: &nbsp; &nbsp;</label>               
                        <input type="file" id="homepage_banner2" name="homepage_banner2" /> 
                        <span class="form-text small text-muted text-left pl-4">
                            Current Image:
                            <img class="img-thumbnail" src="{{ asset('uploads/Settings/SecondBanner/'.$setting->homepage_banner2) }}" style="height:100px"/>
                        </span>       
                    </div>
                </div>
                <!-- Main Header-->
                <div class="row mb-5">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Main Heading *</label>
                            <input type="text" id="main_heading2" name="main_heading2" value="{{ $setting->main_heading2 }}" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Sub Header-->
                <div class="row mb-5">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Sub Heading *</label>
                            <input type="text" id="sub_heading2" name="sub_heading2" value="{{ $setting->sub_heading2 }}" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Title-->
                <div class="row mb-5">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Title *</label>
                            <input type="text" id="title2" name="title2" value="{{ $setting->title2 }}" required="required" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Description-->
                <div class="row mb-5">            
                    <div class="col-md-12">
                        <label class="bmd-label">Description *</label>
                        <div class="form-group">
                            <textarea class="form-control" id="description2" name="description2" rows="3">{{ $setting->description2 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-round">Save</button>
                </div>           
            </form>
        </div><!-- card-body -->
      </div><!-- card -->
      
</div><!-- container-fluid -->

@endsection