@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Notifications</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-tabs card-header-rose" style="z-index: 0 !important">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title" id="nav-tabs-title">Messages:</span>
              <ul class="nav nav-tabs" data-tabs="tabs" id="myTab">
                <li class="nav-item">
                  <a class="nav-link" href="#shopping_cart" data-toggle="tab">
                    <i class="material-icons">shopping_cart</i> Item Cart
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#contact_messages" data-toggle="tab">
                    <i class="material-icons">phone</i> Contact
                    <div class="ripple-container"></div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#subscribers" data-toggle="tab">
                    <i class="material-icons">mark_as_unread</i> Subscriber
                    <div class="ripple-container"></div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content">

            <!-- Shopping Cart -->
            <div class="tab-pane" id="shopping_cart">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </td>
                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="">
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </td>
                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="">
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </td>
                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                    </td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" value="" checked>
                          <span class="form-check-sign">
                            <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    </td>
                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                    <td class="td-actions text-right">
                      <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                        <i class="material-icons">edit</i>
                      </button>
                      <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                        <i class="material-icons">close</i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Contact Form Messages -->
            <div class="tab-pane active" id="contact_messages">
              <div class="table-responsive">
                <table class="table table-hover">
                @if(count($contacts)>0)
                  <thead class="thead">
                    <tr>
                      <th scope="col" class="read">Task</th>
                      <th scope="col" class="title">Content</th>
                      <th scope="col" class="date">Date</th>
                      <th scope="col" class="action">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($contacts as $contact)
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" data-id="{{$contact->id}}" {{ $contact->job_done == true ? 'checked' : ''}}>
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        @if(($contact->seen) == true)
                          <td style="opacity:0.7">
                            <a href="{{ route('contacts.viewContactMessage',[$contact->id]) }}">
                              <p class="text-muted font-weight-light mt-auto mb-auto">
                                <b class="text-dark">{{ $contact->name }}</b> - {{ $contact->subject }}
                                @if(($contact->job_done) == true) 
                                  ✅ 
                                @endif
                              </p>
                            </a>
                          </td>
                        @else
                          <td>
                            <a href="{{ route('contacts.viewContactMessage',[$contact->id]) }}">
                              <p class="text-muted font-weight-bold mt-auto mb-auto">
                                <b class="text-dark">{{ $contact->name }}</b> - {{ $contact->subject }} 
                                <small class="bg-danger text-white pl-1 pr-1">New</small>
                              </p>
                            </a>
                          </td>          
                        @endif
                        <td class="contacts-created_at">
                          <p class="mt-auto mb-auto small">{!! date('l, h:i A - d/M/Y', strtotime($contact->created_at)) !!}</p>
                        </td>
                        <td class="td-actions text-right">
                          <a href="{{ route('contacts.viewContactMessage',[$contact->id]) }}" type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm view">
                            <i class="material-icons">visibility</i>
                          </a>
                          <a href="#deleteContactModal{{$contact->id}}" data-toggle="modal" type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">clear</i>
                          </a>
                        </td>
                      </tr>

                      <!-- Modal for Delete -->
                      <div class="modal fade" id="deleteContactModal{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteContactModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <!-- Modal Content -->
                            <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                  <h5 class="modal-title font-weight-bold" id="deleteContactModalLabel">Delete Confirmation</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>

                              <!-- Modal Body -->
                              <div class="modal-body">
                                  <p>Are you sure, you want to delete this contact message?</p>
                              </div>

                              <!-- Modal Footer -->
                              <div class="modal-footer">
                                  <a href="{{route('deleteContactMessage',[$contact->id])}}" class="btn btn-danger btn-sm btn-round">Delete</a>
                                  <button type="button" class="btn btn-muted btn-sm btn-round" data-dismiss="modal">Close</button>
                              </div>
                            </div>                  
                          </div>
                      </div><!-- Modal Ends -->
                    @endforeach
                    <div class="row ml- mr-3">
                        <div class="col-md-12  d-flex justify-content-end">
                          {{$contacts->links()}}
                        </div>
                      </div>   
                  </tbody>
                @else
                  <tbody>
                    <tr>
                      <td><p class="text-center">No Any Messages</p></td>
                    </tr>
                  </tbody>                 
                @endif
                </table>
              </div><!-- table-responsive -->
            </div><!-- tab-pane -->
            
            <!-- Subscribers -->
            <div class="tab-pane" id="subscribers">
              <div class="row">
                <div class="col-md-12 d-flex flex-wrap justify-content-center">
                  <a href="{{ route('contacts.createSubscriberContent') }}" class="btn btn-sm btn-primary btn-round mr-1">
                    <i class="material-icons">email</i>&nbsp; Create Content
                  </a>
                  <a href="{{ route('contacts.previousSubscriberContents') }}" class="btn btn-sm btn-primary btn-round ml-1">
                    <i class="material-icons">unarchive</i>&nbsp;Previous Contents
                  </a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-hover">
                @if(count($subscribers)>0)
                  <thead class="thead">
                    <tr>
                      <th scope="col" class="read">Status</th>
                      <th scope="col" class="title">Email Address</th>
                      <th scope="col" class="date">Subscription Date</th>
                      <th scope="col" class="action">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($subscribers as $subscriber)
                      <tr>
                        <td>
                          @if(($subscriber->status) == 1)
                            <p class="btn btn-success btn-sm btn-round">ON</p>
                          @else
                            <p class="btn btn-danger btn-sm btn-round">OFF</p>                          
                          @endif
                        </td>
                        <td>{{ $subscriber->email}}</td>
                        <td class="small">{!! date('l, h:i A - d/M/Y', strtotime($subscriber->created_at)) !!}</td>
                        <td class="td-actions text-right">
                          <a href="#deleteSubscriberModal{{$subscriber->id}}" data-toggle="modal" type="button" rel="tooltip" class="btn btn-danger btn-link btn-sm">
                            <i class="material-icons">clear</i>
                          </a>
                        </td>
                      </tr>

                      <!-- Modal for Delete -->
                      <div class="modal fade" id="deleteSubscriberModal{{$subscriber->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteSubscriberModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <!-- Modal Content -->
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title font-weight-bold" id="deleteSubscriberModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <p>Are you sure, you want to delete this Subscriber?</p>
                                </div>

                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <a href="{{route('deleteSubscriber',[$subscriber->id])}}" class="btn btn-danger btn-sm btn-round">Delete</a>
                                    <button type="button" class="btn btn-muted btn-sm btn-round" data-dismiss="modal">Close</button>
                                </div>
                            </div>                  
                          </div>
                      </div><!-- Modal Ends -->
                    @endforeach
                      <div class="row ml- mr-3">
                        <div class="col-md-12  d-flex justify-content-end">
                          {{$subscribers->links()}}
                        </div>
                      </div>  
                  </tbody>
                @else
                  <tbody>
                    <tr>
                      <td><p class="text-center">No Any Subscribers</p></td>
                    </tr>
                  </tbody>   
                @endif
                </table>
              </div><!-- table-responsive -->
            </div><!-- tab pane -->

            

          </div><!-- tab-content -->
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container-fluid -->

<script type="text/javascript">
  $(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
  });
</script>

<script>
  $('.form-check-input').on('change',function() {
        var job_done = $(this).prop('checked') == true ? 1 : 0;
        var contact_id =  $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('contactMessageJobDone') }}",
            data: {
                'job_done': job_done, 
                'contact_id': contact_id
              }
        });
    });
</script>

@endsection

