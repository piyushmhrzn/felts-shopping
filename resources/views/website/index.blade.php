@extends('layouts.website')
@section('content')

<!-- slider-section-start -->
<div class="main-slider-one main-slider-two slider-area">
    <div id="wrapper">
        <div class="slider-wrapper">
            <div id="mainSlider" class="nivoSlider">
                <img src="{{url('/uploads/Settings/FirstBanner/'.$setting->homepage_banner1)}}" alt="main slider" title="#htmlcaption" />
                <img src="{{url('/uploads/Settings/SecondBanner/'.$setting->homepage_banner2)}}" alt="main slider" title="#htmlcaption2" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption slider-caption">
                <div class="container">
                    <div class="slider-left slider-right">
                        <div class="slide-text animated zoomInUp">
                            <h3>{{$setting->sub_heading1}}</h3>
                            <h1>{{$setting->main_heading1}}</h1>
                        </div>
                        <div class="animated slider-btn fadeInUpBig">
                            <a class="shop-btn" href="{{ route('our-products') }}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="htmlcaption2" class="nivo-html-caption slider-caption">
                <div class="container">
                    <div class="slider-left two-caption-text slider-right">
                        <div class="slide-text animated zoomInUp">
                            <h3>{{$setting->sub_heading2}}</h3>
                            <h1>{{$setting->main_heading2}}</h1>
                            <span>{{$setting->title2}}</span>
                        </div>
                        <div class="one-p animated bounceInLeft">
                            <p>{{$setting->description2}}</p>
                        </div>
                        <div class="animated slider-btn fadeInUpBig">
                            <a class="shop-btn" href="{{ route('our-products') }}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider section end -->

<!-- featured-products section start -->
<section class="single-products  products-two section-padding">
    <div class="container">
        <div class="row" style="padding-bottom:20px">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <ul class="load-list load-list-one">
                <li>
                    <div class="row text-center featured-products">
                        <div class="splide" id="card-slider">
                            <div class="splide__track" style="margin:25px">
                                <ul class="splide__list">
                                    @isset($featuredProducts)
                                        @foreach($featuredProducts as $product)
                                        <li class="splide__slide">
                                            <div class="col-md-12">
                                                <div class="single-product">
                                                    <div class="product-img embed-responsive embed-responsive-4by3">
                                                        <a href="{{ route('single-product-view',[$product->slug]) }}">
                                                            <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="Featured" class="embed-responsive-item img-responsive" style="object-fit:cover" />
                                                        </a>
                                                        <div class="actions-btn">
                                                            <a href="{{ route('add-to-cart',[$product->id]) }}"><i class="mdi mdi-cart"></i></a>
                                                            <a href="{{ route('single-product-view',[$product->slug]) }}"><i class="mdi mdi-eye"></i></a>
                                                            <a href="{{ route('add-to-wishlist',[$product->id]) }}"><i class="mdi mdi-heart"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-dsc">
                                                        <p style="line-height:15px">
                                                            <a href="{{ route('single-product-view',[$product->slug]) }}">{{$product->title}}</a>
                                                        </p>
                                                        <div class="ratting">
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star"></i>
                                                            <i class="mdi mdi-star-half"></i>
                                                            <i class="mdi mdi-star-outline"></i>
                                                        </div>
                                                        <span>Rs. {{$product->price}}</span>
                                                        <p class="short-dsc">{{$product->short_description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    @else
                                        <p>No any products to show.</p>
                                    @endif
                                </ul>
                            </div>

                            <div class="splide__progress">
                                <div class="splide__progress__bar"></div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- featured-products section end -->

<!-- tab-products section start -->
<div class="tab-products single-products products-new section-padding extra-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <div class="product-tab nav nav-tabs">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#arrival">New Arrival <span>//</span></a></li>
                            <li><a data-toggle="tab" href="#popular">Popular Product </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center tab-content">

            <!-- New Arrival -->
            <div class="tab-pane  fade in active" id="arrival">
                <div class="wrapper">
                    <ul class="load-list load-list-two">
                        <li>
                            <div class="row text-center new-arrivals">
                                @isset($newProducts)
                                    @foreach($newProducts as $product)
                                    <div class="col-xs-12 col-sm-6 col-md-3" style="margin-bottom: 30px">
                                        <div class="single-product">
                                            <div class="product-img embed-responsive embed-responsive-4by3">
                                                <div class="pro-type">
                                                    <span>new</span>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#quick-view{{$product->id}}">
                                                    <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="Product" class="embed-responsive-item img-responsive" style="object-fit:cover" />
                                                </a>
                                                <div class="actions-btn">
                                                    <a href="{{ route('add-to-cart',[$product->id]) }}"><i class="mdi mdi-cart"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#quick-view{{$product->id}}"><i class="mdi mdi-eye"></i></a>
                                                    <a href="{{ route('add-to-wishlist',[$product->id]) }}"><i class="mdi mdi-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-dsc">
                                                <p><a href="#" data-toggle="modal" data-target="#quick-view{{$product->id}}">{{$product->title}}</a></p>
                                                <div class="ratting">
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star-half"></i>
                                                    <i class="mdi mdi-star-outline"></i>
                                                </div>
                                                <span>Rs. {{$product->price}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- newProducts quick view start -->
                                    <div class="product-details quick-view modal animated zoomInUp" id="quick-view{{$product->id}}">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="d-table">
                                                        <div class="d-tablecell">
                                                            <div class="modal-dialog">
                                                                <div class="main-view modal-content">
                                                                    <div class="modal-footer" data-dismiss="modal">
                                                                        <span>x</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-5 col-md-4">
                                                                            <div class="quick-image">
                                                                                <div class="single-quick-image text-center">
                                                                                    <div class="list-img">
                                                                                        <div class="product-img tab-content">
                                                                                            <div class="simpleLens-container tab-pane active fade in" id="sin-2">
                                                                                                <div class="pro-type new">
                                                                                                    <span>new</span>
                                                                                                </div>
                                                                                                <a class="simpleLens-image" data-lens-image="uploads/Products/{{$product->image}}.jpg" href="#">
                                                                                                    <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="Product" class="embed-responsive-item img-responsive simpleLens-big-image" style="object-fit:cover">
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
                                                                                    <span class="floatleft">Our latest arrivals</span>
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
                                                                                    <p>{!! $product->long_description !!}</p>
                                                                                    <div class="all-choose" style="text-align:left">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- quick view end -->
                                    @endforeach
                                @else
                                    <p>No any products to show.</p>
                                @endif
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('our-products') }}" class="view-more-button" id="load-more-two">View More</a>
                </div>
            </div>
            <!-- new arrival end -->

            <!-- Popular Product -->
            <div class="tab-pane fade" id="popular">
                <div class="wrapper">
                    <ul class="load-list load-list-three">
                        <li>
                            <div class="row text-center popular-products">
                                @isset($popularProducts)
                                    @foreach($popularProducts as $product)
                                    <div class="col-xs-12 col-sm-6 col-md-3" style="margin-bottom: 30px">
                                        <div class="single-product">
                                            <div class="product-img embed-responsive embed-responsive-4by3">
                                                <div class="pro-type">
                                                    <span>new</span>
                                                </div>
                                                <a href="#" data-toggle="modal" data-target="#popularProducts{{$product->id}}">
                                                    <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="product" class="embed-responsive-item img-responsive" style="object-fit: cover" />
                                                </a>
                                                <div class="actions-btn">
                                                    <a href="{{ route('add-to-cart',[$product->id]) }}"><i class="mdi mdi-cart"></i></a>
                                                    <a href="#" data-toggle="modal" data-target="#popularProducts{{$product->id}}"><i class="mdi mdi-eye"></i></a>
                                                    <a href="{{ route('add-to-wishlist',[$product->id]) }}"><i class="mdi mdi-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-dsc">
                                                <p><a href="#" data-toggle="modal" data-target="#popularProducts{{$product->id}}">{{$product->title}}</a></p>
                                                <div class="ratting">
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star"></i>
                                                    <i class="mdi mdi-star-half"></i>
                                                    <i class="mdi mdi-star-outline"></i>
                                                </div>
                                                <span>Rs. {{$product->price}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- popularProducts quick view start -->
                                    <div class="product-details popularProducts modal animated zoomInUp" id="popularProducts{{$product->id}}">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="d-table">
                                                        <div class="d-tablecell">
                                                            <div class="modal-dialog">
                                                                <div class="main-view modal-content">
                                                                    <div class="modal-footer" data-dismiss="modal">
                                                                        <span>x</span>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-sm-5 col-md-4">
                                                                            <div class="quick-image">
                                                                                <div class="single-quick-image text-center">
                                                                                    <div class="list-img">
                                                                                        <div class="product-img tab-content">
                                                                                            <div class="simpleLens-container tab-pane active fade in" id="sin-2">
                                                                                                <div class="pro-type sell">
                                                                                                    <span>popular</span>
                                                                                                </div>
                                                                                                <a class="simpleLens-image" data-lens-image="uploads/Products/{{$product->image}}.jpg" href="#">
                                                                                                    <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="Product" class="embed-responsive-item img-responsive simpleLens-big-image" style="object-fit:cover">
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
                                                                                    <span class="floatleft">Our latest arrivals</span>
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
                                                                                    <p>{!! $product->long_description !!}</p>
                                                                                    <div class="all-choose" style="text-align:left">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p>No any products to show.</p>
                                @endif
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('our-products') }}" class="view-more-button" id="load-more-three">View More</a>
                </div>
            </div>
            <!-- popular product end -->
        </div>
    </div>
</div>
<!-- tab-products section end -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#card-slider', {
            type: 'loop',
            speed: 3000,
            interval: 4000,
            resetProgress: false,
            autoplay: true,
            cover: true,
            perPage: 4,
            perMove: 1,
            swipeDistanceThreshold: 700,
            breakpoints: {
                1200: {
                    perPage: 3,
                    interval: 3000
                },
                991: {
                    perPage: 2,
                    interval: 2000
                },
                600: {
                    perPage: 1,
                    interval: 2000
                }
            }
        }).mount();
    });
</script>


@endsection