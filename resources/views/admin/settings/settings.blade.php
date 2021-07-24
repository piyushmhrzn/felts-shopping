@extends('layouts.admin')

@section('header')
  <a class="navbar-brand" href="javascript:;">Settings</a>
@endsection

@section('content')
<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary" >
            <div class="row">
              <div class="col-sm-6">
                <h4 class="card-title">Company Name</h4>
              </div>
              <div class="col-sm-6 d-flex justify-content-end">
              <a href="{{ route('settings.companySetting') }}" class="btn btn-sm btn-round mr-2" style="background:#000">Edit</a>
              </div>
            </div>
            <p class="card-category">Settings for Company Name & description</p>
          </div>
          <div class="card-body pt-4">
            <p class="card-description"><b>Company Name</b>: {{ ($setting->company_name) ?? '' }}</p>
            <hr>
            <p class="card-description"><b>Meta Description</b>: {{ ($setting->meta_description) ?? '' }}</p>
          </div>
        </div>
    </div><!-- Col -->
  </div><!-- Row -->

  @if(isset($setting))
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-rose" >
            <div class="row">
                <div class="col-sm-6">
                  <h4 class="card-title">Company Images</h4>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                  <a href="{{ route('settings.companyImages') }}" class="btn btn-sm btn-round mr-2" style="background:#000">Edit</a>
                </div>
              </div>
              <p class="card-category">Settings for Website Images</p>
            </div>
            <div class="card-body pt-4">             
              <div class="row">
                <div class="col-sm-6">
                  <p class="card-description h5">Favicon</p>
                    <img class="img-thumbnail" src="{{ asset('/uploads/Settings/Favicon/'.$setting->favicon) }}" style="height:150px">
                </div>
                <div class="col-sm-6">
                  <p class="card-description h5">Logo</p>
                    <img class="img-thumbnail" src="{{ asset('/uploads/Settings/Logo/'.$setting->logo) }}" style="height:150px">
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-md-6">
                  <p class="card-description h5">Homepage First Banner Section</p>
                  <div class="card card-profile">
                      <!-- Image Top -->
                      <div class="embed-responsive embed-responsive-16by9">
                          <img class="card-img-top embed-responsive-item img-responsive p-1" style="object-fit: cover" src="{{ asset('/uploads/Settings/FirstBanner/'.$setting->homepage_banner1) }}" >
                      </div>
                      <hr class="m-0">

                      <div class="card-body p-3 text-left">
                        <h5 class="card-description text-dark"><b>Main Heading</b>: {{$setting->main_heading1}}</h5>
                        <hr>
                        <h5 class="card-description text-dark"><b>Sub Heading</b>: {{$setting->sub_heading1}}</h5>
                      </div>

                  </div><!-- card -->
                </div><!--col1-->

                <div class="col-md-6">
                  <p class="card-description h5">Homepage Second Banner Section</p>
                  <div class="card card-profile">
                      <!-- Image Top -->
                      <div class="embed-responsive embed-responsive-16by9">
                          <img class="card-img-top embed-responsive-item img-responsive p-1" style="object-fit: cover" src="{{ asset('/uploads/Settings/SecondBanner/'.$setting->homepage_banner2) }}" >
                      </div>
                      <hr class="m-0">

                      <div class="card-body p-3 text-left">
                        <h5 class="card-description text-dark"><b>Main Heading</b>: {{$setting->main_heading2}}</h5>
                        <hr>
                        <h5 class="card-description text-dark"><b>Sub Heading</b>: {{$setting->sub_heading2}}</h5>
                        <hr>
                        <h5 class="card-description text-dark"><b>Heading Title</b>: {{$setting->title2}}</h5>
                        <hr>
                        <h5 class="card-description text-dark"><b>Description</b>: {{$setting->description2}}</h5>
                      </div>
                  </div><!-- card -->
                </div><!--col2-->

              </div><!--row-->              

            </div><!-- Card Body -->
          </div><!-- Card -->
      </div><!-- Col -->
    </div><!-- Company Images Row -->

    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-info" >
            <div class="row">
                <div class="col-sm-6">
                  <h4 class="card-title">Company Information</h4>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                  <a href="{{ route('settings.companyInformation') }}" class="btn btn-sm btn-round mr-2" style="background:#000">Edit</a>
                </div>
              </div>
              <p class="card-category">Settings for various Company Infromation</p>
            </div>
            <div class="card-body pt-4">
              <p class="card-description h5"><b>Primary Email</b>: {{$setting->primary_email}}</p>
              <hr>
              <p class="card-description h5"><b>Secondary Email</b>: {{$setting->secondary_email}}</p>
              <hr>
              <p class="card-description h5"><b>Primary Phone No.</b>: {{$setting->primary_phone}}</p>
              <hr>
              <p class="card-description h5"><b>Secondary Phone No.</b>: {{$setting->secondary_phone}}</p>
              <hr>
              <p class="card-description h5"><b>Company Street</b>: {{$setting->street}}</p>
              <hr>
              <p class="card-description h5"><b>Company City</b>: {{$setting->city}}</p>
              <hr>
              <p class="card-description h5"><b>Company Country</b>: {{$setting->country}}</p>
            </div>
          </div>
      </div><!-- Col -->
    </div><!-- Company Detail Row -->

    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-warning" >
            <div class="row">
                <div class="col-sm-6">
                  <h4 class="card-title">Company Social Media</h4>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                  <a href="{{ route('settings.companySocialMedia') }}" class="btn btn-sm btn-round mr-2" style="background:#000">Edit</a>
                </div>
              </div>
              <p class="card-category">Settings for different social media of company </p>
            </div>
            <div class="card-body pt-4">
              <p class="card-description h5"><b>Facebook</b>: 
                <a href="https://www.facebook.com/{{$setting->facebook}}" title="facebook" target="blank">
                  <i class="fa fa-facebook p-2"></i>
                </a>
              </p>
              <hr>
              <p class="card-description h5"><b>Instagram</b>: 
                <a href="https://www.instagram.com/{{$setting->instagram}}" title="instagram" target="blank">
                  <i class="fa fa-instagram p-2"></i>
                </a>
              </p>
              <hr>
              <p class="card-description h5"><b>Twitter</b>: 
                <a href="https://twitter.com/{{$setting->twitter}}" title="twitter" target="blank">
                  <i class="fa fa-twitter p-2"></i>
                </a>
              </p>
              <hr>
              <p class="card-description h5"><b>Youtube</b>: 
                <a href="https://youtube.com/{{$setting->youtube}}" title="youtube" target="blank">
                  <i class="fa fa-youtube p-2"></i>
                </a>
              </p>
            </div>
          </div>
      </div><!-- Col -->
    </div><!-- Company Social Media Row -->
  @endif

</div><!-- container-fluid -->

@endsection
