@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Order Complete</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>Order Complete</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- order-complete content section start -->
<section class="pages checkout order-complete section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="complete-title">
                    <p>Thank you. Your order has been received!</p>
                </div>
                <div class="order-no clearfix">
                    <ul>
                        <li>order no <span>m 2653257</span></li>
                        <li>Date<span>aug 15, 2021</span></li>
                        <li>total<span>Rs.{{ $totalWithShipping }}</span></li>
                        <li>payment method<span>cash on delivery</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="padding60 marginBottom30">
                    <div class="log-title">
                        <h3><strong>your order</strong></h3>
                    </div>
                    <div class="cart-form-text pay-details table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cartItems != null)
                                    @foreach($cartItems as $item)
                                    <tr>
                                        <th>{{ $item->title }}</th>
                                        <td>Rs. {{ $item->price }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th style="color: #0052AD">Cart Subtotal</th>
                                        <td style="color: #0052AD">Rs.{{ $totalPrice }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping and Handing</th>
                                        <td>Rs.{{ $setting->shippingCharge }}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>Rs. 0</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td style="text-align: center">
                                            Your Cart is Empty.
                                        </td>
                                    </tr>
                                @endif                              
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Order total</th>
                                    <td>Rs.{{ $totalWithShipping }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="order-address bill padding60">
                    <div class="log-title">
                        <h3><strong>Billing address</strong></h3>
                    </div>
                    <p>{{ Auth::user()->address }}, {{ Auth::user()->city }}, {{ Auth::user()->country }}</p>
                    <p>Phone:  (+977) {{ Auth::user()->phone }},</p>
                    <p>Email:  {{ Auth::user()->email }}</p>
                </div>
                <div class="order-details padding60">
                    <div class="log-title">
                        <h3><strong>customer details</strong></h3>
                    </div>
                    <div class="por-dse clearfix">
                        <ul>
                            <li><span>Name<strong>:</strong></span> {{Auth::user()->first_name}}{{ Auth::user()->last_name }}</li>
                            <li><span>Email<strong>:</strong></span> {{ Auth::user()->email }}</li>
                            <li><span>Phone<strong>:</strong></span> +977 {{ Auth::user()->phone }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- order-complete content section end -->

@endsection
