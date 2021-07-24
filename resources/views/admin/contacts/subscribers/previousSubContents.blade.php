@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Notifications / Previous Subscriber Contents</a>
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
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-rose" style="z-index: 0 !important">
          <h4 class="card-title">Subsrciber Contents</h4>
          <p class="card-category">Previously Sent all Subscriber Contents</p>
        </div>
        <div class="card-body table-responsive">
                <table class="table table-hover">
                @if(count($subscriberContents)>0)
                  <thead class="thead">
                    <tr>
                      <th scope="col" class="read">S.N.</th>
                      <th scope="col" class="title">Title</th>
                      <th scope="col" class="date">Date Created</th>
                      <th scope="col" class="action">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subscriberContents as $key=>$subscriberContent)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            <a href="{{ route('contacts.previousContentDetail',[$subscriberContent->id])}}" class="text-dark">
                                {{ $subscriberContent->title}}
                            </a>
                        </td>
                        <td class="small">{!! date('l, h:i A - d/M/Y', strtotime($subscriberContent->created_at)) !!}</td>
                        <td class="td-actions text-center">
                          <a href="#deleteModal{{$subscriberContent->id}}" data-toggle="modal" type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">clear</i>
                          </a>
                        </td>
                      </tr>

                      <!-- Modal for Delete -->
                      <div class="modal fade" id="deleteModal{{$subscriberContent->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
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
                                    <p>Are you sure, you want to delete this Subscriber Content?</p>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <a href="{{route('deleteSubscriberContent',[$subscriberContent->id])}}" class="btn btn-danger btn-sm btn-round">Delete</a>
                                    <button type="button" class="btn btn-muted btn-sm btn-round" data-dismiss="modal">Close</button>
                                </div>
                            </div>                  
                          </div>
                      </div><!-- Modal Ends -->

                    @endforeach
                      <div class="row ml- mr-3">
                        <div class="col-md-12  d-flex justify-content-end">
                          {{$subscriberContents->links()}}
                        </div>
                      </div>  
                  </tbody>
                @else
                  <tbody>
                    <tr>
                      <td><p class="text-center">No Any Subscriber Contents</p></td>
                    </tr>
                  </tbody>   
                @endif
                </table>
        </div>
      </div>
    </div>
  </div><!-- row -->
</div><!-- container-fluid -->


@endsection