@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Wishlist</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- wishlist content section start -->
<section class="pages wishlist-page section-padding">
    <div class="container">
    <div class="message">@include('.inc/message')</div>
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive padding60">
                    <table class="wishlist-table text-center">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Stock Status </th>
                                <th>Add To Cart</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($wishlistItems != null)
                                @foreach($wishlistItems as $item)
                                <tr>
                                    <td class="td-img text-left">
                                        <a><img src="{{ asset('/uploads/Products/'.$item->image) }}" alt="Product" /></a>
                                        <div class="items-dsc">
                                            <h5><a>{{ $item->title }}</a></h5>
                                            <p class="itemcolor">Color : <span>Mixed</span></p>
                                        </div>
                                    </td>
                                    <td>Rs. {{ $item->price }}</td>
                                    <td>@if(($item->availability) == 0)
                                            Out of Stock*
                                        @else
                                            In Stock*
                                        @endif</td>
                                    <td>
                                        <div class="submit-text">
                                            <a href="{{ route('add-to-cart-from-wishlist',[$item->id]) }}">Add to cart</a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('delete-wishlist-item',[$item->id]) }}">
                                            <i class="mdi mdi-close" title="Remove this product"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right">
                                        Your Wishlist is Empty.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- wishlist content section end -->

@endsection