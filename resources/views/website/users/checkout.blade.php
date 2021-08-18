@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Checkout</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- Checkout content section start -->
<section class="pages checkout section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="main-input single-cart-form padding60 marginBottom30">
                    <div class="log-title">
                        <h3><strong>billing details</strong></h3>
                        <p class="labelContent">Your default address.</p>
                    </div>
                    <div class="custom-input">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Full Name:</label>
                                    <input type="text" name="name" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" placeholder="Your Full Name..."  disabled/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="Your Phone Number..." disabled/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email Address:</label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Your Email Address..." disabled/>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Country:</label>
                                    <input type="text" name="country" value="{{ Auth::user()->country }}" placeholder="Your Country..." disabled/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>City:</label>
                                    <input type="text" name="city" value="{{ Auth::user()->city }}" placeholder="Your City..." disabled/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Address:</label>
                                    <input type="text" name="address" value="{{ Auth::user()->address }}" placeholder="Your Address..." disabled/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="main-input single-cart-form padding60">
                    <div class="log-title">
                        <h3><strong>ship to different address</strong></h3>
                        <p class="labelContent">Fill up the form if you want to ship the product in different address.</p>
                    </div>
                    <div class="custom-input">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Full Name:</label>
                                    <input type="text" name="name" placeholder="Your Full Name..." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Phone Number:</label>
                                    <input type="text" name="phone" placeholder="Your Phone Number..." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Email Address:</label>
                                    <input type="email" name="email" placeholder="Your Email Address..." />   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Country:</label>
                                    <input type="text" name="country" placeholder="Your Country..." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>City:</label>
                                    <input type="text" name="city" placeholder="Your City..." />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Address:</label>
                                    <input type="text" name="address" placeholder="Your Address..." />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row margin-top">
            <div class="col-xs-12 col-sm-6">
                <div class="padding60 marginBottom30">
                    <div class="log-title">
                        <h3><strong>order summary</strong></h3>
                    </div>
                    <div class="cart-form-text pay-details table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Products</th>
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
                <div class="padding60">
                    <div class="log-title">
                        <h3><strong>Payment method</strong></h3>
                    </div>
                    <div class="categories">
                        <ul id="accordion" class="panel-group clearfix">
                            <li class="panel">
                                <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                                    <div class="medium-a">
                                        cash on delivery
                                    </div>
                                </div>
                                <div class="panel-collapse collapse in" id="collapse1">
                                    <div class="normal-a">
                                        <p>
                                            <input type="radio" id="cod" name="payment" value="cod" checked>
                                            &nbsp;&nbsp;<label for="cod">Cash On Delivery</label>
                                        </p>                                    
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
                                    <div class="medium-a">
                                        fone pay
                                    </div>
                                </div>
                                <div class="paypal-dsc panel-collapse collapse" id="collapse2">
                                    <div class="normal-a">
                                        <p>
                                            <input type="radio" id="fonepay" name="payment" value="fonepay">
                                            &nbsp;&nbsp;<label for="fonepay">Fone Pay</label>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse3">
                                    <div class="medium-a">
                                        eSewa
                                    </div>
                                </div>
                                <div class="paypal-dsc panel-collapse collapse" id="collapse3">
                                    <div class="normal-a">
                                        <p>
                                            <input type="radio" id="eSewa" name="payment" value="eSewa">
                                            &nbsp;&nbsp;<label for="eSewa">eSewa</label>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div data-toggle="collapse" data-parent="#accordion" data-target="#collapse4">
                                    <div class="medium-a">
                                        khalti
                                    </div>
                                </div>
                                <div class="paypal-dsc panel-collapse collapse" id="collapse4">
                                    <div class="normal-a">
                                        <p>
                                            <input type="radio" id="khalti" name="payment" value="khalti">
                                            &nbsp;&nbsp;<label for="khalti">khalti</label>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="submit-text">
                            <a href="{{ route('order-complete') }}" class="place-order">place order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout content section end -->

@endsection
