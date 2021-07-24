@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Products / {{ $product->title}} Gallery</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
    <a href="{{ route('products') }}" class="btn btn-sm btn-muted btn-round">
        <i class="material-icons">arrow_back_ios</i> Go Back
    </a>
    
  @if(count($product->productGalleries)>0)
    <div class="row">
        @foreach($product->productGalleries as $image)
            <div class="col-md-4 col-sm-6">
                <div class="card card-profile mb-0">
                    <div class="embed-responsive embed-responsive-4by3">
                        <img class="card-img-top embed-responsive-item img-responsive p-1" src="{{url('/uploads/Products/ProductsGallery/'.$image->image)}}" style="object-fit:cover" >
                    </div>
                    <hr class="m-0">
                    <div class="card-footer d-flex flex-wrap justify-content-center">
                        <a href="#deleteModal{{$image->id}}" data-toggle="modal" class="btn btn-danger btn-sm btn-round mr-2">Delete</a>
                        <!-- Toggle Button -->
                        <input type="checkbox" data-id="{{$image->id}}" class="toggle-class" data-toggle="toggle" data-onstyle="warning" 
                                data-style="ios" data-size="small" {{ $image->status == true ? 'checked' : ''}}>
                    </div>
                </div><!-- card -->

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
                                <a href="{{route('deleteProductGallery',[$image->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                <button type="button" class="btn btn-sm btn-muted" data-dismiss="modal">Close</button>
                            </div>
                        </div>                  
                    </div>
                </div><!-- Modal Ends -->

            </div><!-- col -->
        @endforeach
    </div><!-- row -->

    @else
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-12">
                <h3 class="text-center">No Image Gallery Found!</h3>
            </div>           
            <div class="col-md-12">
                <p class="text-center">Add {{ $product->title}} Gallery Images in Edit Section 
                    <a href="{{ route('products.editProduct',[$product->id]) }}" class="btn btn-sm btn-primary btn-round">here</a>
                </p>
            </div>           
        </div>
    @endif
</div><!-- container-fluid -->

<script>
  $('.toggle-class').on('change',function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var image_id =  $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('productGalleryImageStatus') }}",
            data: {
                'status': status, 
                'image_id': image_id
              }
        });
    });
</script>

@endsection