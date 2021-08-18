@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>{{$product->title}}</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span><a href="{{ route('our-products') }}">shop </a></li>
                        <li><span> // </span>{{$product->title}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- product-details-section-start -->
<div class="product-details pages section-padding-top">
    <div class="container">
        <div class="row">
            <div class="single-list-view">
                <div class="col-xs-12 col-sm-5 col-md-4">
                    <div class="quick-image">
                        <div class="single-quick-image text-center">
                            <div class="list-img">
                                <div class="product-img tab-content">
                                    <div class="simpleLens-container tab-pane active fade in" id="sin-2">
                                        <div class="pro-type sell">
                                            <span>sell</span>
                                        </div>
                                        <a class="simpleLens-image" data-lens-image="img/products/z2.jpg') }}" href="#">
                                            <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="" class="embed-responsive-item img-responsive simpleLens-big-image" style="object-fit: cover">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quick-thumb">
                            <ul class="product-slider">
                                @isset($product->productGalleries)
                                    @foreach($product->productGalleries as $image)
                                        @if($image->status == 1)
                                            <li class="product-small-images">
                                                <a data-toggle="tab" href="#sin-2">
                                                    <img src="{{ asset('/uploads/Products/ProductsGallery/'.$image->image) }}" style="object-fit:cover" alt="small image" />
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-8">
                    <div class="quick-right">
                        <div class="list-text">
                            <h3>{{$product->title}}</h3>
                            <span>Kasthamandap Felts Colllection</span>
                            <div class="ratting floatright">
                                <p>( 27 Rating )</p>
                                <i class="mdi mdi-star"></i>
                                <i class="mdi mdi-star"></i>
                                <i class="mdi mdi-star"></i>
                                <i class="mdi mdi-star-half"></i>
                                <i class="mdi mdi-star-outline"></i>
                            </div>
                            <h5>Rs. {{$product->price}}</h5>
                            <p>{{$product->short_description}}</p>
                            <div class="all-choose">
                                <div class="s-shoose">
                                    <h5>Color</h5>
                                    <div class="color-select clearfix">
                                        <span></span>
                                        <span class="outline"></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                                <div class="s-shoose">
                                    <h5>qty</h5>
                                    <form>
                                        <div class="plus-minus">
                                            <a class="dec qtybutton">-</a>
                                            <input type="text" value="02" name="qtybutton" class="plus-minus-box">
                                            <a class="inc qtybutton">+</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="list-btn">
                                <a href="{{ route('add-to-cart',[$product->id]) }}">add to cart</a>
                                <a href="{{ route('add-to-wishlist',[$product->id]) }}">wishlist</a>
                            </div>
                            <div class="share-tag clearfix">
                                <ul class="blog-share floatleft">
                                    <li>
                                        <h5>share </h5>
                                    </li>
                                    <li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>                                    
                                    <li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
                                    <li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single-product item end -->
        <!-- reviews area start -->
        <div class="row">
            <div class="col-xs-12">
                <div class="reviews padding60 margin-top">
                    <ul class="reviews-tab clearfix">
                        <li><a data-toggle="tab" href="#moreinfo">more info</a></li>
                        <li class="active"><a data-toggle="tab" href="#reviews">Reviews</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="info-reviews moreinfo tab-pane fade in" id="moreinfo">
                            <p>{!! nl2br(e($product->long_description)) !!}</p>
                        </div>
                        <div class="info-reviews review-text tab-pane fade in active" id="reviews">
                            <div class="about-author">
                                <div class="autohr-text">
                                    <img src="{{ asset('frontend/img/blog/author1.png') }}" alt="" />
                                    <div class="author-des">
                                        <h4><a href="#">Gregory Hernandez</a></h4>
                                        <span class="floatright ratting">
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star-half"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                        </span>
                                        <span>27 Jun, 2016 at 2:30pm</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas eleifend. Phasellus a felis at est bibenes dum feugiat ut eget eni Praesent et messages in consectetur.</p>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="about-author">
                                <div class="autohr-text">
                                    <img src="{{ asset('frontend/img/blog/author2.png') }}" alt="" />
                                    <div class="author-des">
                                        <h4><a href="#">Gregory Hernandez</a></h4>
                                        <span class="floatright ratting">
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star-half"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                        </span>
                                        <span>27 Jun, 2016 at 2:30pm</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas eleifend. Phasellus a felis at est bibenes dum feugiat ut eget eni Praesent et messages in consectetur.</p>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="about-author">
                                <div class="autohr-text">
                                    <img src="{{ asset('frontend/img/blog/author3.png') }}" alt="" />
                                    <div class="author-des">
                                        <h4><a href="#">Gregory Hernandez</a></h4>
                                        <span class="floatright ratting">
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star-half"></i>
                                            <i class="mdi mdi-star-outline"></i>
                                        </span>
                                        <span>27 Jun, 2016 at 2:30pm</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas eleifend. Phasellus a felis at est bibenes dum feugiat ut eget eni Praesent et messages in consectetur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="your-rating log-title">
                                <h3>leave your review</h3>
                                <h5>Your rating</h5>
                                <div class="rating clearfix">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-star-outline"></i>
                                            </a>
                                            <span>|</span>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                            </a>
                                            <span>|</span>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                            </a>
                                            <span>|</span>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                            </a>
                                            <span>|</span>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                                <i class="mdi mdi-star-outline"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="custom-input">
                                @if(Auth::user())
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-mail">
                                                <input type="text" name="name" value="{{ Auth::user()->first_name }}" placeholder="Your Name" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-mail">
                                                <input type="text" name="email" value="{{ Auth::user()->email }}" placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="custom-mess">
                                                <textarea name="message" placeholder="Your Review" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="submit-text">
                                                <button type="submit">submit review</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-mail">
                                                <input type="text" name="name" placeholder="Your Name" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-mail">
                                                <input type="text" name="email" placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="custom-mess">
                                                <textarea name="message" placeholder="Your Review" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="submit-text">
                                                <button type="submit">submit review</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- reviews area end -->
    </div>
</div>
<!-- product-details section end -->
<!-- related-products section start -->
<section class="single-products section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>related Products</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @isset($products)
                @foreach($products as $relatedProduct)
                    @if($product->id != $relatedProduct->id)
                    <div class="col-xs-12 col-sm-6 col-md-3" style="padding-bottom:25px">
                        <div class="single-product">
                            <div class="product-img embed-responsive embed-responsive-4by3">
                                <a href="{{ route('single-product-view',[$relatedProduct->slug]) }}">
                                    <img src="{{ asset('/uploads/Products/'.$relatedProduct->image) }}" alt="Product" class="embed-responsive-item img-responsive" style="object-fit:cover" />
                                </a>
                                <div class="actions-btn">
                                    <a href="#"><i class="mdi mdi-cart"></i></a>
                                    <a href="{{ route('single-product-view',[$relatedProduct->slug]) }}"><i class="mdi mdi-eye"></i></a>
                                    <a href="#"><i class="mdi mdi-heart"></i></a>
                                </div>
                            </div>
                            <div class="product-dsc">
                                <p><a href="{{ route('single-product-view',[$relatedProduct->slug]) }}">{{$relatedProduct->title}}</a></p>
                                <span>Rs. {{$relatedProduct->price}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            @else
                <p>No any products to show.</p>
            @endif
        </div>
    </div>
</section>
<!-- related-products section end -->

@endsection