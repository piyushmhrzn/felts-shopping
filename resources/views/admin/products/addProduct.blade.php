@extends('layouts.admin')

@section('header')
  <a class="navbar-brand">Products / Add Product</a>
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
          <h4 class="card-title">Add Product</h4>
          <p class="card-category">Super Admin Setting</p>
        </div>
        <div class="card-body">
          <form class="form" action="{{route('storeProduct')}}" method="post" enctype="multipart/form-data" role="form" autocomplete="off" data-parsley-validate>
            @csrf
            <!--- Product Name -->
            <div class="form-group mb-4 mt-3">
                <label class="bmd-label-floating">Product Name *</label>
                <input type="text" id="title" name="title" required="required" class="form-control">
            </div>
            <!-- Product Image -->
            <div class="d-flex justify-content-center mb-4">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <label class="bmd-label-floating">Product Image: &nbsp; &nbsp;</label>               
                  <input type="file" id="image" name="image" required="required"/>   
                  <span class="form-text small text-muted text-center">
                    Your Primary/Main Image.
                  </span>      
              </div>
            </div>
            <div class="row mb-4">            
              <!-- Product Price -->
              <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Product Price * <em>(Upto 2 decimal place)</em></label>
                    <input type="text" id="price" name="price" required="required" class="form-control">
                </div>
              </div>
              <!--- Product Model -->
              <div class="col-md-6">
                <div class="form-group">
                    <label class="bmd-label-floating">Product Model</label>
                    <input type="text" id="model" name="model" class="form-control">
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <!--- Product Availability -->
              <div class="col-md-6">
                <div class="form-group">
                    <label for="formControlSelect">Product Availability *</label>
                    <select name="availability" class="custom-select" required="required" id="formControlSelect">
                        <option value="1">In Stock</option>
                        <option value="0">Out of Stock</option>
                    </select>
                </div>
              </div>
              <!--- Product Colors -->
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label">Product Colors </label><br>
                    <div class="col-md-12">
                      <div class="multi-field-wrapper">               
                          <div class="multi-fields">
                              <div class="multi-field d-flex">                  
                                  <input type="text" name="color[]" id="color" placeholder="New Color" class="form-control">                    
                                  <button type="button" class="remove-field btn btn-sm btn-dark btn-round">X</button>
                              </div>
                          </div>             
                        <button type="button" class="add-field btn btn-sm btn-rose btn-round">+ More Color</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <!-- Product Type -->
            <div class="row d-flex justify-content-center mb-4">            
              <div class="col-md-8 text-center">
                <div class="form-group">                  
                    <label class="bmd-label pb-2">Product Type</label><br>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="clothing"> Clothing
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="accessories"> Accessories
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="decorative"> Decorative
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="product_type[]" value="others"> Others
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                      </label>
                    </div>
                </div>
              </div>
            </div>
            <!--- Short Description -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Short Description *</label>
                        <textarea class="form-control" id="short_description" name="short_description" required="required" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <!--- Long Description -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <label class="bmd-label">Long Description</label>
                    <div class="form-group">
                        <textarea class="form-control" id="long_description" name="long_description" rows="6"></textarea>
                    </div>
                </div>
            </div>
            <!-- Metadata -->
            <div class="row mb-4">
              <!-- SEO Title -->
              <div class=" col-md-4">
                <div class="form-group">
                  <label class="bmd-label-floating">SEO Title <em>(Search Engine Optimization)</em></label>
                  <input type="text" id="seo_title" name="seo_title" class="form-control">
                </div>
              </div>
              <!-- Meta Description -->
              <div class=" col-md-8">
                <div class="form-group">
                  <label class="bmd-label-floating">Meta Description</label>
                  <textarea id="meta_description" rows="3" name="meta_description" class="form-control"></textarea>
                </div>
              </div>
            </div>
            <!-- Multiple Product Image Gallery-->
            <div class="d-flex justify-content-center mb-4">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                  <label class="bmd-label-floating">Product Gallery: &nbsp; &nbsp;</label>               
                  <input type="file" id="product_gallery" name="product_gallery[]" multiple/>    
                  <span class="form-text small text-muted">
                      You can choose multiple images for this product gallery.
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