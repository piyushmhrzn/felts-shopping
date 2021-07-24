@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Products / Edit Product</a>
@endsection

@section('content')

<div class="message">
  @include('.inc/message')
</div>

<div class="container-fluid">
  <a href="{{ route('products') }}" class="btn btn-sm btn-muted btn-round">
    <i class="material-icons">arrow_back_ios</i> Go Back
  </a>

  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-sm-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Product</h4>
          <p class="card-category">Super Admin Setting</p>
        </div>
        <div class="card-body">
          <form class="form" action="{{route('updateProduct',[$product->id])}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
            @csrf
            <!--- Product Name -->
            <div class="form-group mb-4 mt-3">
                <label class="bmd-label-floating">Product Name *</label>
                <input type="text" id="title" name="title" value="{{ $product->title }}" required="required" class="form-control">
            </div>
            <!-- Product Image -->
            <div class="d-flex justify-content-center mb-4">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <label class="bmd-label-floating">Product Image: &nbsp; &nbsp;</label>               
                  <input type="file" id="image" name="image"/>   
                  <span class="form-text small text-muted text-left pl-4">
                    Current Image:
                    <img class="img-thumbnail" src="{{ asset('uploads/Products/'.$product->image) }}" style="height:100px"/>
                  </span>      
              </div>
            </div>
            <div class="row mb-4">            
              <!-- Product Price -->
              <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Product Price * <em>(Upto 2 decimal place)</em></label>
                    <input type="text" id="price" name="price" value="{{ $product->price }}" required="required" class="form-control">
                </div>
              </div>
              <!--- Product Model -->
              <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Product Model</label>
                    <input type="text" id="model" name="model" value="{{ $product->model }}" class="form-control">
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <!--- Product Availability -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="formControlSelect">Product Availability *</label>
                    <select name="availability" class="custom-select" required="required" id="formControlSelect">
                        <option {{($product->availability==1)?'selected':''}} value="1">In Stock</option>
                        <option {{($product->availability==0)?'selected':''}} value="0">Out of Stock</option>
                    </select>
                </div>
              </div>
              <!--- Product Colors -->
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label">Product Colors </label><br>
                  <div class="col-sm-12">
                    @if(($product->color)>0)
                      @foreach($product->color as $key => $value) 
                        <div class="multi-field-wrapper">               
                            <div class="multi-fields">
                                <div class="multi-field d-flex">                                            
                                  <input type="text" name="color[]" id="color" value="{{$value}}" placeholder="New Color" class="form-control">                    
                                  <button type="button" class="remove-field btn btn-sm btn-dark btn-round">X</button>                             
                                </div>
                            </div>             
                          <button type="button" class="add-field btn btn-sm btn-rose btn-round">+ More Color</button>
                        </div>
                      @endforeach
                    @else
                      <div class="multi-field-wrapper">               
                          <div class="multi-fields">
                              <div class="multi-field d-flex">                  
                                  <input type="text" name="color[]" id="color" placeholder="New Color" class="form-control">                    
                                  <button type="button" class="remove-field btn btn-sm btn-dark btn-round">X</button>
                              </div>
                          </div>             
                        <button type="button" class="add-field btn btn-sm btn-rose btn-round">+ More Color</button>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <!-- Product Type -->
            <div class="row d-flex justify-content-center mb-4">            
              <div class="col-md-8 text-center">
                <div class="form-group">                  
                    <label class="bmd-label pb-2">Product Type</label><br>
                    @if(isset($product->type))
                      @foreach($product->type as $type)
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="product_type[]" value="{{$type}}" checked> {{$type}}
                            <span class="form-check-sign">
                                <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      @endforeach
                      <span class="form-text small text-muted">
                        To add more types, please uncheck all, save & redo the edit.
                      </span>
                    @else
                      <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="product_type[]" value="clothing"> clothing
                          <span class="form-check-sign">
                              <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="product_type[]" value="accessories"> accessories
                          <span class="form-check-sign">
                              <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="product_type[]" value="decorative"> decorative
                          <span class="form-check-sign">
                              <span class="check"></span>
                          </span>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <label class="form-check-label">
                          <input class="form-check-input" type="checkbox" name="product_type[]" value="others"> others
                          <span class="form-check-sign">
                              <span class="check"></span>
                          </span>
                        </label>
                      </div>
                    @endif
                </div>
              </div>
            </div>
            <!--- Short Description -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Short Description *</label>
                        <textarea class="form-control" id="short_description" name="short_description" required="required" rows="3">{{ $product->short_description }}</textarea>
                    </div>
                </div>
            </div>
            <!--- Long Description -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <label class="bmd-label">Long Description</label>
                    <div class="form-group">
                        <textarea class="form-control" id="long_description" name="long_description" rows="6">{{ $product->long_description }}</textarea>
                    </div>
                </div>
            </div>
            <!-- Metadata -->
            <div class="row mb-4">
              <!-- SEO Title -->
              <div class=" col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">SEO Title <em>(Search Engine Optimization)</em></label>
                  <input type="text" id="seo_title" name="seo_title" value="{{$product->seo_title}}" class="form-control">
                </div>
              </div>
              <!-- Meta Description -->
              <div class=" col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Meta Description</label>
                  <textarea id="meta_description" rows="3" name="meta_description" class="form-control">{{$product->meta_description}}</textarea>
                </div>
              </div>
            </div>
            <!-- Multiple Product Image Gallery-->
            <div class="d-flex justify-content-center mb-4">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <label class="bmd-label-floating">Product Gallery: &nbsp; &nbsp;</label>               
                  <input type="file" id="product_gallery" name="product_gallery[]" multiple/>    
                  <span class="form-text small text-muted">
                      You can choose multiple images for <b>{{$product->title}}</b> image gallery.
                  </span>     
              </div>
            </div>
            <div class="form-group d-flex justify-content-center pt-4">
                <button type="submit" class="btn btn-success btn-round">Save</button>
            </div>
          </form>
        </div><!-- card-body -->
      </div><!-- card -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container-fluid -->

<script>CKEDITOR.replace( 'long_description' );</script>
<script>
  $('.multi-field-wrapper').each(function() {
      var $wrapper = $('.multi-fields', this);
      $(".add-field", $(this)).click(function(e) {
          $('.multi-field:first-child', $wrapper).clone(true).appendTo($wrapper).find('input').val('').focus();
      });
      $('.multi-field .remove-field', $wrapper).click(function() {
          if ($('.multi-field', $wrapper).length > 1)
              $(this).parent('.multi-field').remove();
      });
  });
</script>

@endsection