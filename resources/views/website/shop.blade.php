@extends('layouts.website')
@section('content')

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
<!-- shop content section start -->
<div class="pages products-page section-padding text-center">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="right-products">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="section-title clearfix">
                                <ul>
                                    <li>
                                        <ul class="nav-view">
                                            <li><a href="{{ route('product-grid-view') }}"> <i class="mdi mdi-view-module"></i> </a></li>
                                            <li><a href="{{ route('product-list-view') }}"> <i class="mdi mdi-view-list"></i> </a></li>
                                        </ul>
                                    </li>
                                    <li class="sort-by floatright">
                                        Showing 1-12 of 89 Results
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="grid-content">
                        @isset($products)
                            @foreach($products as $product)
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="single-product">
                                    <div class="product-img embed-responsive embed-responsive-4by3">
                                        <div class="pro-type">
                                            <span>new</span>
                                        </div>
                                        <a href="{{ route('single-product-view',[$product->slug]) }}">
                                            <img src="{{ asset('/uploads/Products/'.$product->image) }}" alt="product" class="embed-responsive-item img-responsive" style="object-fit: cover"/>
                                        </a>
                                        <div class="actions-btn">
                                            <a href="#"><i class="mdi mdi-cart"></i></a>
                                            <a href="{{ route('single-product-view',[$product->slug]) }}"><i class="mdi mdi-eye"></i></a>
                                            <a href="#"><i class="mdi mdi-heart"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-dsc">
                                        <p><a href="#">{{$product->title}}</a></p>
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
        </div>
    </div>
</div>
<!-- shop content section end -->

@endsection
