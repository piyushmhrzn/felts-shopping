@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>My Account</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- My account content section start -->
<section class="pages my-account-page section-padding">
    <div class="container">
        <div class="message">@include('.inc/message')</div>
        <div class="row">
            <div class="col-sm-9">
                <div class="padding60">
                    <div class="log-title">
                        <h3><strong>My Account</strong></h3>
                    </div>
                    <div class="prament-area main-input">
                        <ul class="panel-group" id="accordion">
                            <li class="panel">
                                <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse1">
                                    <label>
                                        <input type="radio" checked value="forever" name="rememberme"/>
                                        my personal information
                                    </label>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="single-log-info">
                                        <div class="bulling-title">
                                            <h5>Personal Information</h5>
                                            <p>Please be sure to update your personal information if it has changed</p><br>
                                        </div>
                                        <div class="custom-input">
                                            <form action="{{ route('updateUserInformation') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Username:</label>
                                                        <input type="text" name="name" value="{{ Auth::user()->first_name }}" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6">
                                                        <label>Email Address:</label>
                                                        <input type="email" name="email" value="{{ Auth::user()->email }}" disabled/>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6">
                                                        <label>Age:</label>                                                   
                                                        <input type="number" name="age" value="{{ Auth::user()->age }}"/>
                                                    </div>
                                                </div>  
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Address:</label>                                                   
                                                        <input type="text" name="address" value="{{ Auth::user()->address }}"/> 
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Town / City:</label>                                                   
                                                        <input type="text" name="city" value="{{ Auth::user()->city }}"/>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Country:</label>                                                   
                                                        <input type="text" name="country" value="{{ Auth::user()->country }}"/> 
                                                    </div>
                                                </div>                                                                                                                                                                                                                                                                                                                      
                                                <label>Phone Number:</label>                                                   
                                                <p class="red-color">** You must register your phone number.</p>
                                                <input type="text" name="phone" value="{{ Auth::user()->phone }}" required="required" />
                                                <div class="submit-text">
                                                    <button type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div class="account-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapse2">
                                    <label>
                                        <input type="radio" value="forever" name="rememberme"/>
                                        my password
                                    </label>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="single-log-info">
                                        <div class="bulling-title">
                                            <h5>Change Password</h5>
                                        </div>
                                        <div class="custom-input">
                                            <form action="{{ route('updateUserPassword') }}" method="post">
                                                @csrf
                                                <label>Current Password:</label>
                                                <input type="password" placeholder="Current Password" name="old_password" />
                                                <label>New Password:</label>
                                                <input type="password" placeholder="New Password" name="password" />
                                                <label>Confirm Password:</label>
                                                <input type="password" placeholder="Confirm Password" name="password_confirmation" />
                                                <div class="submit-text">
                                                    <button type="submit">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="my-right-side">
                    <a href="{{ route('my-wishlist') }}">My wishlists</a>
                    <a href="{{ route('order-complete') }}">Order history</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account content section end -->

@endsection
