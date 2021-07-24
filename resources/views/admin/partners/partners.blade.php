@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Our Partners</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 d-flex justify-content-end">
      <a href="{{ route('partners.addPartner') }}" class="btn btn-primary btn-round"><i class="material-icons">add_box</i>&nbsp; Add Partner</a>
    </div>
  </div>

  @if(count($partners)>0)
    <div class="row">
        @foreach($partners as $partner)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card card-profile pb-2 h-100">
                <div class="embed-responsive embed-responsive-4by3">
                  <img class="card-img-top embed-responsive-item img-responsive p-5" style="object-fit: contain" src="{{ asset('/uploads/Partners/'.$partner->image) }}" alt="partner image">
                </div>
                <hr class="m-0">
                <div class="card-body pb-0">
                    <h3 class="card-title">{{$partner->name}}</h3>
                    <p class="card-description mb-0">{{$partner->address}}</p>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-center">
                    <a href="{{route('partners.editPartner',[$partner->id])}}" class="btn btn-info btn-sm btn-round mr-2">Edit</a>
                    <a href="#deleteModal{{$partner->id}}" data-toggle="modal" class="btn btn-danger btn-sm btn-round mr-2">Delete</a>
                    <!-- Toggle Button -->
                    <input type="checkbox" data-id="{{$partner->id}}" class="toggle-class" data-toggle="toggle" data-onstyle="warning" 
                          data-style="ios" data-size="small" {{ $partner->status == true ? 'checked' : ''}}>
                </div>
            </div>

            <!-- Modal for Delete -->
            <div class="modal fade" id="deleteModal{{$partner->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                          <p>Are you sure, you want to delete this partner?</p>
                      </div>

                      <!-- Modal Footer -->
                      <div class="modal-footer">
                          <a href="{{route('deletePartner',[$partner->id])}}" class="btn btn-danger btn-sm btn-round">Delete</a>
                          <button type="button" class="btn btn-muted btn-sm btn-round" data-dismiss="modal">Close</button>
                      </div>
                  </div>                  
                </div>
            </div><!-- Modal Ends -->
        </div><!-- Col -->
        @endforeach
    </div><!-- Row -->

    <div class="row d-flex justify-content-center pt-5">
      {{$partners->links()}}
    </div>
  @endif
</div><!-- container-fluid -->

<script>
  $('.toggle-class').on('change',function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var partner_id =  $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('partnerStatus') }}",
            data: {
                'status': status, 
                'partner_id': partner_id
              }
        });
    });
</script>

@endsection

