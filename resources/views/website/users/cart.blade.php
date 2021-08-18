@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Cart</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- cart content section start -->
<section class="pages cart-page section-padding">
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
                                <th>quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cartItems != null)
                                @foreach($cartItems as $item)
                                <tr>
                                    <td class="td-img text-left">
                                        <a><img src="{{ asset('/uploads/Products/'.$item->image) }}" alt="Product" /></a>
                                        <div class="items-dsc">
                                            <h5><a>{{ $item->title }}</a></h5>
                                            <p class="itemcolor">Color : <span>Mixed</span></p>
                                        </div>
                                    </td>
                                    <td>Rs. {{ $item->price }}</td>
                                    <td>
                                        <form>
                                            <div class="plus-minus">
                                                <a class="dec qtybutton">-</a>
                                                <input type="text" value="{{ ($item->quantity)*1 }}" name="qtybutton" class="plus-minus-box">
                                                <a class="inc qtybutton">+</a>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <strong>Rs. {{ ($item->price)*($item->quantity)*1 }}</strong>
                                    </td>
                                    <td>
                                        <a href="{{ route('delete-cart-item',[$item->id]) }}">
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
                                    Your Cart is Empty.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row margin-top">
            <div class="col-sm-6">
                <div class="single-cart-form padding60 marginBottom30">
                    <div class="log-title">
                        <h3><strong>coupon discount</strong></h3>
                    </div>
                    <div class="cart-form-text custom-input">
                        <p>Enter your coupon code if you have one!</p>
                        <form>
                            <input type="text" name="coupon" placeholder="Enter your code here..." />
                            <div class="submit-text coupon">
                                <button type="submit">apply coupon </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="single-cart-form padding60">
                    <div class="log-title">
                        <h3><strong>payment details</strong></h3>
                    </div>
                    <div class="cart-form-text pay-details table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>Rs.{{ $totalPrice }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping and Handing</th>
                                    <td>Rs.{{ $setting->shippingCharge }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="tfoot-padd">Order total</th>
                                    <td class="tfoot-padd">Rs.{{ $totalWithShipping }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="continue">
                    <a href="{{ route('my-checkout') }}" class="continue-cart-button">continue </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cart content section end -->

@endsection