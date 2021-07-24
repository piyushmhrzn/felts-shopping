@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Notifications / Previous Subscriber Contents/ Content Details</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('contacts.previousSubscriberContents') }}" class="btn btn-sm btn-muted btn-round" title="Send Mail">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>

  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-rose" style="z-index: 0 !important">
          <h4 class="card-title">{{ $subscriberContent->title }}</h4>
          <p class="card-category">Date Sent: {!! date('l, h:i A - d/M/Y', strtotime($subscriberContent->created_at)) !!}</p>
        </div>
        <div class="card-body table-responsive">
            <div class="col-md-12">
                {!! $subscriberContent->long_description !!}
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center pb-4">
            <a href="{{ route('resendPreviousContent',[$subscriberContent->id]) }}" id="button" class="btn btn-info btn-sm btn-round">
                <i class="material-icons">reply</i>&nbsp; Resend
            </a>
        </div>
      </div>
    </div>
  </div><!-- row -->

  <!-- Loader -->
  <div class="loader loader-border" data-text="Sending.... Please Wait!" data-blink></div>
</div><!-- container-fluid -->

<script>
    $("#button").click(function(){
        $(".loader").addClass("is-active");
    });
</script>

@endsection
