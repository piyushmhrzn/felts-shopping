@extends('layouts.admin')

@section('header')
  <a class="navbar-brand" href="javascript:;">Products</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 d-flex flex-wrap justify-content-end">
      <a href="{{ route('sortProduct') }}" class="btn btn-primary btn-round mr-2">
        <i class="material-icons">sort</i>&nbsp; Sorting
      </a>
      <a href="{{ route('products.addProduct') }}" class="btn btn-primary btn-round">
        <i class="material-icons">add_box</i>&nbsp; Add Product
      </a>
    </div>
  </div>

  @if(count($products)>0)
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card card-profile pb-2 h-100">
                <div class="embed-responsive embed-responsive-4by3">
                  <img class="card-img-top embed-responsive-item img-responsive" style="object-fit: contain" src="{{url('/uploads/Products/'.$product->image)}}" alt="product image">
                </div>
                <hr class="m-0">
                <div class="card-body pb-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">{{$product->title}}</h3>
                    <h5 class="card-description mt-2">Rs. {{$product->price}}</h5>
                  </div>                
                  <div class="d-flex justify-content-end">
                    <em class="text-primary small">
                      @if(($product->availability) == 0)
                        Out of Stock*
                      @else
                        In Stock*
                      @endif
                    </em>
                  </div>
                  <div class="d-flex justify-content-center mb-3">
                    <a href="{{ route('products.productGallery',[$product->id]) }}" class="btn btn-sm btn-rose btn-round">
                    Image Gallery - 
                      @if(isset($product->productGalleries))
                        @foreach($product->productGalleries as $key=>$gallery)                   
                        @endforeach
                        {{($key+1)}}
                      @else
                        (0)
                      @endif
                    </a>
                  </div> 
                  <p class="card-description mb-0">{{$product->short_description}}</p>               
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-center">
                    <a href="{{route('products.editProduct',[$product->id])}}" class="btn btn-info btn-sm btn-round mr-2">Edit</a>
                    <a href="#deleteModal{{$product->id}}" data-toggle="modal" class="btn btn-danger btn-sm btn-round mr-2">Delete</a>
                    <!-- Toggle Button -->
                    <input type="checkbox" data-id="{{$product->id}}" class="toggle-class" data-toggle="toggle" data-onstyle="warning" 
                          data-style="ios" data-size="small" {{ $product->status == true ? 'checked' : ''}}>
                </div>
            </div>

            <!-- Modal for Delete -->
            <div class="modal fade" id="deleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                          <p>Are you sure, you want to delete this product?</p>
                      </div>

                      <!-- Modal Footer -->
                      <div class="modal-footer">
                          <a href="{{route('deleteProduct',[$product->id])}}" class="btn btn-danger btn-sm btn-round">Delete</a>
                          <button type="button" class="btn btn-muted btn-sm btn-round" data-dismiss="modal">Close</button>
                      </div>
                  </div>                  
                </div>
            </div><!-- Modal Ends -->
        </div><!-- Col -->
        @endforeach
    </div><!-- Row -->

    <div class="row d-flex justify-content-center pt-5">
      {{$products->links()}}
    </div>
    @endif
</div><!-- container-fluid -->

<script>
  $('.toggle-class').on('change',function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var product_id =  $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('productStatus') }}",
            data: {
                'status': status, 
                'product_id': product_id
              }
        });
    });
</script>

@endsection