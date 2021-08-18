@extends('layouts.website')
@section('content')

<style>
    .popup-model {
        display: none;
        position: fixed;
        top: 0;
        width: 100%;
        background: #18D26E;
        /* border-bottom: 2px solid #F59B5C; */
        z-index: 999999;
    }

    .popup-model p {
        font-size: 13px;
        font-weight: 400;
        color: #fff;
        text-align: center;
        padding: 10px 0;
    }

    .show {
        display: block !important;
    }
</style>

<div id="myPopup" class="popup-model">
    <p>Item has been successfully added to your wishlist!.</p>
</div>

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Shop</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- product-list-view content section start -->
<section class="pages products-page section-padding section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-3">
                <div class="sidebar left-sidebar">
                    <div class="s-side-text">
                        <div class="sidebar-title clearfix">
                            <h4 class="floatleft">Categories</h4>
                            <h5 class="floatright"><a href="#">All</a></h5>
                        </div>
                        <div class="categories left-right-p">
                            <ul id="accordion" class="panel-group clearfix">
                                <li class="panel">
                                    <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                                        <div class="medium-a">
                                            Clothing
                                        </div>
                                    </div>
                                    <div class="panel-collapse collapse in" id="collapse1">
                                        <div class="normal-a">
                                            <a href="#">Bag</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">T-shirt</a>
                                            <a href="#">shirt</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel">
                                    <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
                                        <div class="medium-a">
                                            Decorative
                                        </div>
                                    </div>
                                    <div class="paypal-dsc panel-collapse collapse" id="collapse2">
                                        <div class="normal-a">
                                            <a href="#">Bag</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">Keyring</a>
                                            <a href="#">T-shirt</a>
                                            <a href="#">shirt</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel">
                                    <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
                                        <div class="medium-a">
                                            Accessories
                                        </div>
                                    </div>
                                    <div class="paypal-dsc panel-collapse collapse" id="collapse3">
                                        <div class="normal-a">
                                            <a href="#">Bag</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">T-shirt</a>
                                            <a href="#">shirt</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="panel">
                                    <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse4">
                                        <div class="medium-a">
                                            Others
                                        </div>
                                    </div>
                                    <div class="paypal-dsc panel-collapse collapse" id="collapse4">
                                        <div class="normal-a">
                                            <a href="#">Bag</a>
                                            <a href="#">Shoes</a>
                                            <a href="#">T-shirt</a>
                                            <a href="#">shirt</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="s-side-text">
                        <div class="sidebar-title">
                            <h4>price</h4>
                        </div>
                        <div class="range-slider clearfix">
                            <form>
                                <label><span>You range</span> 
                                <input type="text" id="amount" readonly /></label>
                                <div id="slider-range"></div>
                            </form>
                        </div>
                    </div>
                    <div class="s-side-text">
                        <div class="sidebar-title clearfix">
                            <h4 class="floatleft">color</h4>
                            <h5 class="floatright"><a href="#">All</a></h5>
                        </div>
                        <div class="color-select clearfix">
                            <span></span>
                            <span></span>
                            <span class="outline"></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="s-side-text">
                        <div class="banner clearfix">
                            <a href="#"><img src="{{ asset('frontend/img/products/product.jpg') }}" alt="" /></a>
                            <div class="banner-text">
                                <h2>best</h2> <br />
                                <h2 class="banner-brand">brand</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-md-9">
                <div class="right-products">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title clearfix">
                                <ul>
                                    <li>
                                        <ul class="nav-view">
                                            <li class="active">
                                                <a data-toggle="tab" href="#grid"> <i class="mdi mdi-view-module"></i> </a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" href="#list"> <i class="mdi mdi-view-list"></i> </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sort-by floatright">
                                        Showing 1-9 of 89 Results
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="tab-content grid-content">
                            <div class="tab-pane fade active in text-center" id="grid">
                                @isset($products)
                                    @foreach($products as $product)
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="single-product">
                                            <div class="product-img embed-responsive embed-responsive-4by3">
                                                <div class="pro-type">
                                                    <span>new</span>
                                                </div>
                                                <a href="{{ route('single-product-view',[$product->slug]) }}">
                                                    <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="product" class="embed-responsive-item img-responsive" style="object-fit: cover" />
                                                </a>
                                                <div class="actions-btn">
                                                    <a href="{{ route('add-to-cart',[$product->id]) }}"><i class="mdi mdi-cart"></i></a>
                                                    <a href="{{ route('single-product-view',[$product->slug]) }}"><i class="mdi mdi-eye"></i></a>
                                                    <a href="{{ route('add-to-wishlist',[$product->id]) }}"><i class=" mdi mdi-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-dsc">
                                                <p><a href="{{ route('single-product-view',[$product->slug]) }}">{{$product->title}}</a></p>
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
                                    @endforeach
                                @else
                                    <p>No any products to show.</p>
                                @endif
                            </div>
                            <div class="tab-pane fade in" id="list">
                                <div class="col-xs-12">
                                    @isset($products)
                                        @foreach($products as $product)
                                        <div class="single-list-view">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-4">
                                                    <div class="list-img">
                                                        <div class="product-img embed-responsive embed-responsive-4by3">
                                                            <div class="pro-type sell">
                                                                <span>sell</span>
                                                            </div>
                                                            <a href="{{ route('single-product-view',[$product->slug]) }}">
                                                                <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="product" class="embed-responsive-item img-responsive" style="object-fit: cover" />
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-8">
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
                                                        <div class="list-btn">
                                                            <a href="{{ route('add-to-cart',[$product->id]) }}" class="product-btn">add to cart</a>
                                                            <a onclick="myFunction()" style="cursor:pointer" class="product-btn">wishlist</a>
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
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="pagnation-ul">
                                <ul class="clearfix">
                                    <li><a href="#"><i class="mdi mdi-menu-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#">10</a></li>
                                    <li><a href="#"><i class="mdi mdi-menu-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- row -->
    </div><!-- container -->
</section>
<!-- product-list-view content section end -->

<script>
    function myFunction(el) {
        console.log('success');
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
        setTimeout(() => {
            popup.classList.remove("show");
        }, 2000)
    }
</script>

@endsection