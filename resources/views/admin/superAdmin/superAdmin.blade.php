@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Super Admin Settings</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <div class="row pb-5">
    <div class="col-md-12 d-flex justify-content-end">
      <a href="{{ route('superAdmin.addAdmin') }}" class="btn btn-primary btn-round">
        <i class="material-icons">add_box</i>&nbsp; Add Admin
      </a>
    </div>
  </div>

  <div class="row">
    @foreach($admins as $admin)
      <div class="col-md-4 col-sm-6 mb-5 pb-3">
          <div class="card card-profile pb-3 h-100">
            <div class="card-avatar">
                <img class="img" src="{{ asset('uploads/Admin/'.$admin->image) }}" />
            </div>
            <div class="card-body">
              <h6 class="card-category text-gray">
                @if($admin->type==0)
                  Super Admin
                @else  
                  Normal Admin
                @endif
              </h6>
              <h3 class="card-title">{{$admin->first_name}} {{$admin->last_name}}</h3>
              <p class="card-description mb-0">
                {{$admin->email}}
              </p>
            </div>
            <div class="card-footer d-flex justify-content-center">
              @if(Auth::user()->id != $admin->id)
                <a href="{{route('superAdmin.editAdmin',[$admin->id])}}" class="btn btn-info btn-sm btn-round">Edit</a>
                  &nbsp; &nbsp; &nbsp;
                <a href="#deleteModal{{$admin->id}}" data-toggle="modal" class="btn btn-danger btn-sm btn-round">Delete</a>
              @else
                <a href="{{route('adminProfile')}}" class="btn btn-warning btn-sm btn-round">Me</a>
              @endif
            </div>
          </div>

            <!-- Modal for Delete -->
            <div class="modal fade" id="deleteModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <!-- Modal Content -->
                  <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                          <h5 class="modal-title font-weight-bold" id="deleteModalLabel">Delete Confirmation</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>

                      <!-- Modal Body -->
                      <div class="modal-body">
                          <p>Are you sure, you want to delete this admin?</p>
                      </div>

                      <!-- Modal Footer -->
                      <div class="modal-footer">
                          <a href="{{route('deleteAdmin',[$admin->id])}}" class="btn btn-danger btn-sm btn-round">Delete</a>
                          <button type="button" class="btn btn-muted btn-sm btn-round" data-dismiss="modal">Close</button>
                      </div>
                  </div>                  
                </div>
            </div><!-- Modal Ends -->
      </div><!-- Col -->
    @endforeach
  </div><!-- Row -->
</div><!-- container-fluid -->

@endsection
