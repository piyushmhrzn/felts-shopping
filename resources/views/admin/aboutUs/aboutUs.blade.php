@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">About Us</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="page-categories">
        <ul class="nav nav-pills justify-content-center" role="tablist" id="myTab">
          <li class="nav-item active">
            <a class="nav-link" data-toggle="tab" href="#content" role="tablist">
              <i class="material-icons">edit</i> Content Section
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#gallery" role="tablist">
              <i class="material-icons">photo_camera</i> Image Gallery
            </a>
          </li>
        </ul>

        <div class="tab-content tab-space tab-subcategories">

          <!-- Main Content -->
          <div class="tab-pane active" id="content">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit About Us</h4>
                <p class="card-category">Complete About Us Content Section</p>
              </div>
              <div class="card-body">
                @if(isset($aboutUs))
                  <form action="{{ route('updateAboutUs') }}" method="post" role="form" autocomplete="off" data-parsley-validate>
                @else
                  <form action="{{ route('storeAboutUs') }}" method="post" role="form" autocomplete="off" data-parsley-validate>
                @endif            
                    @csrf
                    <div class="row mb-4 mt-4">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" id="title" value="{{ ($aboutUs->title) ?? '' }}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Short Description</label>
                          <textarea class="form-control" name="short_description" id="short_description" rows="4">{{ ($aboutUs->short_description) ?? '' }}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Long Description</label>
                          <textarea class="form-control" name="long_description" id="long_description" rows="6">{{ ($aboutUs->long_description) ?? '' }}</textarea>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
                </form>
              </div><!-- card-body -->
            </div><!-- card -->
          </div>

          <!-- Image Gallery -->
          <div class="tab-pane" id="gallery">
            <div class="card">
              @if(isset($aboutUs))
                <div class="card-header d-flex flex-wrap justify-content-end">
                  <a href="#uploadModal" data-toggle="modal" class="btn btn-info btn-sm btn-round mr-2">
                    Upload
                  </a>

                  <!-- Modal for Uploading Image -->
                  <div class="modal fade mt-5" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h5 class="modal-title" id="updateModalLabel">Upload Image</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="modal-body">                
                          <form class="form-inline" action="{{route('aboutUsGallery')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                              <div>
                                <input type="file" id="image" name="image[]" required="required" class="form-control" multiple />
                              </div>
                            </div>
                            <div class="form-group text-center">
                              <input class="btn btn-rose btn-round" type="submit" value="Upload">
                            </div>
                            <span class="form-text small text-muted">
                                You can choose <em>multiple</em> images.
                            </span>             
                          </form>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-sm btn-muted btn-round" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div><!-- Modal Ends -->
                </div><!-- card-header -->
                <hr class="m-0">

                <div class="card-body">
                  <h4 class="card-title text-center">About Us Image Gallery</h4>
                  <hr class="m-0">
                  @if(isset($aboutUs->aboutUsGalleries))
                    <div class="row">
                      @foreach($aboutUs->aboutUsGalleries as $image)            
                        <div class="col-md-4 col-sm-6 d-flex justify-content-around">
                          <div class="card text-center" style="width:100%">

                            <!-- Image -->
                            <div class="embed-responsive embed-responsive-4by3">
                              <img class="card-img-top embed-responsive-item" style="object-fit: cover" src="{{url('/uploads/AboutUs/AboutUsGallery/'.$image->image)}}"  alt="gallery"><br>
                            </div>

                            <!-- Update Title -->
                            <div class="card-body p-1">
                                <form class="form-inline justify-content-center" action="{{route('updateImageName',[$image->id])}}" method="post" style="width:100% !important">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input class="form-control" type="name" name="imageName" value="{{$image->title}}">
                                        <div class="input-group-append">
                                            <input class="btn btn-sm btn-success btn-round" type="submit" value="✓">
                                        </div> 
                                    </div>              
                                </form>
                            </div>

                            <!-- Delete /Status-->
                            <div class="card-footer justify-content-center">
                                <input type="checkbox" data-id="{{$image->id}}" class="toggle-class" data-toggle="toggle" data-onstyle="warning" data-style="ios" 
                                  data-size="small" {{ $image->status == true ? 'checked' : ''}}>
                                <button type="button" class="btn btn-sm btn-danger btn-round ml-2" data-toggle="modal" data-target="#deleteModal{{$image->id}}">
                                    Delete
                                </button>

                                <!-- Modal for Delete -->
                                <div class="modal fade" id="deleteModal{{$image->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <!-- Modal Content -->
                                    <div class="modal-content">
                                      <!-- Modal Header -->
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>

                                      <!-- Modal Body -->
                                      <div class="modal-body">
                                          <p>Are you sure, you want to delete this image?</p>
                                      </div>

                                      <!-- Modal Footer -->
                                      <div class="modal-footer">
                                          <a href="{{route('deleteAboutUsGallery',[$image->id])}}" class="btn btn-sm btn-danger btn-round">Delete</a>
                                          <button type="button" class="btn btn-sm btn-muted btn-round" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>                  
                                  </div>
                                </div><!-- Modal Ends -->
                            </div><!-- Card Footer -->

                          </div><!-- Card -->
                        </div>
                      @endforeach
                    </div><!-- Row -->
                  @endif
                </div>
              @else
                <p class="d-flex justify-content-center text-secondary m-5">No Image Gallery</p>
              @endif
            </div><!-- card -->
          </div><!-- tab-pane -->

        </div><!-- tab-content -->
      </div><!-- page-categories -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container-fluid -->

<script>CKEDITOR.replace( 'long_description' );</script>

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
  $('.toggle-class').on('change',function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var image_id =  $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('aboutUsImageStatus') }}",
            data: {
                'status': status, 
                'image_id': image_id
              }
        });
    });
</script>

@endsection
