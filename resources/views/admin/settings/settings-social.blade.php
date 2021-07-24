@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">companySocials / Company Social Media</a>
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
          <h4 class="card-title">Company Social Media</h4>
          <p class="card-category">Set company social media sites like facebook,instagram,...</p>
        </div>
        <div class="card-body">
            <form class="form" action="{{route('updateCompanySocialMedia')}}" method="post" role="form" autocomplete="off" data-parsley-validate>
                @csrf
                <!-- Company Facebook -->
                <div class="row mb-4 mt-4">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Facebook</label>
                            <input type="text" id="facebook" name="facebook" value="https://www.facebook.com/{{$companySocial->facebook}}" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Company Instagram -->
                <div class="row mb-4 mt-4">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Instagram</label>
                            <input type="text" id="instagram" name="instagram" value="https://www.instagram.com/{{$companySocial->instagram}}" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Company Twitter -->
                <div class="row mb-4 mt-4">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Twitter</label>
                            <input type="text" id="twitter" name="twitter" value="https://twitter.com/{{$companySocial->twitter}}" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- Company Youtube -->
                <div class="row mb-4 mt-4">            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Company Youtube</label>
                            <input type="text" id="youtube" name="youtube" value="https://youtube.com/{{$companySocial->youtube}}"class="form-control">
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