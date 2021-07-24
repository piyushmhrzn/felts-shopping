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
                    <p>Thank you. Your order has been received.</p>
                </div>
                <div class="order-no clearfix">
                    <ul>
                        <li>order no <span>m 2653257</span></li>
                        <li>Date<span>jun 15, 2016</span></li>
                        <li>total<span>$ 325.00</span></li>
                        <li>payment method<span>check payment</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="padding60">
                    <div class="log-title">
                        <h3><strong>your order</strong></h3>
                    </div>
                    <div class="cart-form-text pay-details">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Men’s White Shirt  x 2</th>
                                    <td>$86.00</td>
                                </tr>
                                <tr>
                                    <th>Men’s Black Shirt  x 1</th>
                                    <td>$69.00</td>
                                </tr>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>$155.00</td>
                                </tr>
                                <tr>
                                    <th>Shipping and Handing</th>
                                    <td>$15.00</td>
                                </tr>
                                <tr>
                                    <th>Vat</th>
                                    <td>$00.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Order total</th>
                                    <td>$325.00</td>
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
                    <p>Flat no 01, House no 02, New Road, Kathmandu-44600, Nepal</p>
                    <p>Phone:  (+977) 19453 821758,</p>
                    <p>Email:  info@companyname.com</p>
                </div>
                <div class="order-details padding60">
                    <div class="log-title">
                        <h3><strong>customer details</strong></h3>
                    </div>
                    <div class="por-dse clearfix">
                        <ul>
                            <li><span>Name<strong>:</strong></span> MD: James Shrestha</li>
                            <li><span>Email<strong>:</strong></span> info@domainname.com</li>
                            <li><span>Phone<strong>:</strong></span> +977 1905  381858</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- order-complete content section end -->

@endsection
