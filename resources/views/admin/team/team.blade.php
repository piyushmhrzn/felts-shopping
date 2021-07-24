@extends('layouts.admin')

@section('header')
  <a class="navbar-brand" href="javascript:;">Our Team</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <div class="row pb-5">
    <div class="col-md-12 d-flex justify-content-end">
      <a href="{{ route('team.addMember') }}" class="btn btn-primary btn-round">
        <i class="material-icons">add_box</i>&nbsp; Add Member
      </a>
    </div>
  </div>

  @if(count($members)>0)
    <div class="row">
        @foreach($members as $member)
        <div class="col-md-4 col-sm-6 mb-5 pb-3">
            <div class="card card-profile pb-3 h-100">
                <div class="card-avatar">
                    <img class="img" src="{{ asset('uploads/TeamMembers/'.$member->image) }}" />
                </div>
                <div class="card-body pb-0">
                    <h6 class="card-category text-gray">{{$member->post}}</h6>
                    <h3 class="card-title">{{$member->name}}</h3>
                    <p class="card-description mb-0">{{$member->description}}</p>
                    <div class="pt-3">
                      <a href="https://www.facebook.com/{{$member->facebook}}" title="facebook" target="blank"><i class="fa fa-facebook p-2"></i></a>
                      <a href="https://www.instagram.com/{{$member->instagram}}" title="instagram" target="blank"><i class="fa fa-instagram p-2"></i></a>
                      <a href="https://twitter.com/{{$member->twitter}}" title="twitter" target="blank"><i class="fa fa-twitter p-2"></i></a>
                    </div>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-center">
                    <a href="{{route('team.editMember',[$member->id])}}" class="btn btn-info btn-sm btn-round mr-2">Edit</a>
                    <a href="#deleteModal{{$member->id}}" data-toggle="modal" class="btn btn-danger btn-sm btn-round mr-2">Delete</a>
                    <!-- Toggle Button -->
                    <input type="checkbox" data-id="{{$member->id}}" class="toggle-class" data-toggle="toggle" data-onstyle="warning" 
                          data-style="ios" data-size="small" {{ $member->status == true ? 'checked' : ''}}>
                </div>
            </div>

            <!-- Modal for Delete -->
            <div class="modal fade" id="deleteModal{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                          <p>Are you sure, you want to delete this member?</p>
                      </div>

                      <!-- Modal Footer -->
                      <div class="modal-footer">
                          <a href="{{route('deleteMember',[$member->id])}}" class="btn btn-danger btn-sm btn-round">Delete</a>
                          <button type="button" class="btn btn-muted btn-sm btn-round" data-dismiss="modal">Close</button>
                      </div>
                  </div>                  
                </div>
            </div><!-- Modal Ends -->
        </div><!-- Col -->
        @endforeach
    </div><!-- Row -->

    <div class="row d-flex justify-content-center pt-5">
      {{$members->links()}}
    </div>
  @endif
</div><!-- container-fluid -->

<script>
  $('.toggle-class').on('change',function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var member_id =  $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('memberStatus') }}",
            data: {
                'status': status, 
                'member_id': member_id
              }
        });
    });
</script>

@endsection
