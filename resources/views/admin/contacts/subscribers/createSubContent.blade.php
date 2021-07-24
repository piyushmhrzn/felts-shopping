@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Notifications / Create Subscriber Content</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('contacts') }}" class="btn btn-sm btn-muted btn-round" title="Send Mail">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>

  <div class="row d-flex justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Subscriber Content</h4>
          <p class="card-category">Create content for your subscribers & send them via email</p>
        </div>
        <div class="card-body">
          <form class="form" action="{{route('subscriberContent')}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
            @csrf
            <!--- Main Title -->
            <div class="form-group mb-4 mt-4">
                <label class="bmd-label-floating">Title *</label>
                <input type="text" id="title" name="title" required="required" class="form-control">
            </div>
            <!-- Primary Image -->
            <div class="d-flex justify-content-center mb-5">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <label class="bmd-label-floating">Primary Image: &nbsp; &nbsp;</label>               
                  <input type="file" id="image" name="image"/>         
              </div>
            </div>
            <!-- Long Description -->
            <div class="form-group mb-4">
              <label class="bmd-label">Content *</label><br>
              <textarea class="form-control" name="long_description" id="long_description" rows="6" required="required"></textarea>
            </div>
            
            <div class="form-group d-flex justify-content-center">
                <button type="submit" id="button" class="btn btn-success btn-round">
                  <i class="material-icons">ios_share</i>&nbsp; Send
                </button>
            </div>
          </form>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->

  <!-- Loader -->
  <div class="loader loader-border" data-text="Sending.... Please Wait!" data-blink></div>

</div><!-- container-fluid -->

<script>CKEDITOR.replace( 'long_description' );</script>
<script>
    $("#button").click(function(){
        $(".loader").addClass("is-active");
    });
</script>

@endsection