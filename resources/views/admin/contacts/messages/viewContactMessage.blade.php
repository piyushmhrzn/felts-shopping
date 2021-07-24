@extends('layouts.admin')

@section('header')
  <a class="navbar-brand" href="javascript:;">Notifications/Contacts</a>
@endsection

@section('content')
<div class="container-fluid">

  <a href="{{ route('contacts') }}" class="btn btn-sm btn-muted btn-round">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h3 class="card-title">{{ $contact->name }}</h3>
          <h5 class="card-category">{{ $contact->email }}</h5>
        </div>
        <div class="card-body">
          <div class="row m-1">
            <div class="col-md-8 col-sm-6 mb-1">
              <a href="mailto:{{ $contact->email }}" class="btn btn-sm btn-rose btn-round" title="Send Mail" target="_blank">
                <i class="material-icons">reply</i> Reply
              </a>
            </div>
            <div class="col-md-4 col-sm-6">
                <p class="text-muted mb-0"><b>Date</b>: {!! date('l, h:i A - d/M/Y', strtotime($contact->created_at)) !!}</p>
                <p class="text-muted mb-0"><b>Phone No.</b>: {{ $contact->phone }}</p>
            </div>
          </div>
          <hr>
          <div class="col-md-12">
              <h5><b>Subject</b>: {{ $contact->subject }}</h5>
          </div>
          <hr>
          <div class="col-md-12">
              <h5><b>Message</b>:</h5>
              <p>{!! nl2br(e($contact->message)) !!}
              </p>
          </div>
        </div>
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container-fluid -->

@endsection
