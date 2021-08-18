<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		@if(Request::is('product/*'))
			<title>{{$product->seo_title}}</title> 
			<meta name="description" content="{{$product->meta_description}}" />

			<meta property="og:title" content="{{$product->seo_title}}" />
			<meta property="og:url" content="{{Request::url()}}" />
			<meta property="og:description" content="{{$product->meta_description}}" />
			<meta property="og:image" content="{{asset('/uploads/Products/'.$product->image)}}"/>
		@else
			@if(isset($setting))   
				<title>{{$setting->company_name}} || Felts Shopping</title>   
				<meta name="description" content="{{$setting->meta_description}}" />

				<meta property="og:title" content="{{$setting->company_name}}" />
				<meta property="og:url" content="{{Request::url()}}" />
				<meta property="og:description" content="{{$setting->meta_description}}" />
				<meta property="og:image" content="{{asset('/uploads/Settings/Logo'.$setting->logo)}}"/>
			@endif
		@endif

		<!-- favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/uploads/Settings/Favicon/'.$setting->favicon) }}">

        <link rel="apple-touch-icon" href="{{ asset('frontend/apple-touch-icon.png') }}">
        <!-- Place favicon.ico in the root directory -->
		<!-- google fonts -->
		<link href='https://fonts.googleapis.com/css?family=Lato:400,900,700,300' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
		<!-- animate css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
		<!-- pe-icon-7-stroke -->
		<link rel="stylesheet" href="{{ asset('frontend/css/materialdesignicons.min.css') }}">
		<!-- pe-icon-7-stroke -->
		<link rel="stylesheet" href="{{ asset('frontend/css/jquery.simpleLens.css') }}">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/meanmenu.min.css') }}">
		<!-- nivo.slider css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/nivo-slider.css') }}">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}">
		<!-- style css -->
		<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
		<!-- responsive css -->
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
		<!-- modernizr js -->
        <script src="{{ asset('frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
		<!-- jQuery  -->
        <script src="{{ asset('frontend/js/vendor/jquery-1.12.3.min.js') }}"></script>

		<!-- Loader CSS-->
		<link rel="stylesheet" type="text/css" href="{{ asset('frontend/custom/css-loader/css-loader.css') }}"/>
		<!-- Splide CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/custom/splide/css/splide.min.css') }}">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- header section start -->
		<header class="header-one header-two">
			<div class="header-top-two">
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-12">
							<div class="middel-top info">
								<div class="left floatleft inline">
									<p>
                                        <i class="mdi mdi-phone"> +01 {{$setting->primary_phone}}</i>  &nbsp;&nbsp;&nbsp;
                                        <i class="mdi mdi-email"> {{$setting->primary_email}}</i> 
                                    </p>
								</div>
							</div>
							<div class="middel-top clearfix">
								<ul class="clearfix right floatright">
									<li>
										@if(Auth::user())
											<a href="{{ route('my-account') }}" style="text-transform:capitalize"> {{Auth::user()->first_name}}</a>
											<ul>
												<li><a href="{{ route('my-account') }}" class="{{ (request()->routeIs('my-account')) ? 'active' : '' }}">My account</a></li>
												<li><a href="{{ route('my-wishlist') }}" class="{{ (request()->routeIs('my-wishlist')) ? 'active' : '' }}">Whishlist</a></li>
												<li><a href="{{ route('userLogout') }}">Logout</a></li>
											</ul>
										@else
											<a href="{{ route('user-login') }}" class="{{ (request()->routeIs('user-login')) ? 'active' : '' }}"><i class="mdi mdi-account"></i></a>
											<ul>
												<li><a href="{{ route('user-login') }}" class="{{ (request()->routeIs('user-login')) ? 'active' : '' }}">Login</a></li>
												<li><a href="{{ route('user-login') }}" class="{{ (request()->routeIs('user-login')) ? 'active' : '' }}">Register</a></li>
											</ul>
										@endif					
									</li>
								</ul>
								<div class="right floatright">
									<form action="#" method="get">
										<button type="submit"><i class="mdi mdi-magnify"></i></button>
										<input type="text" placeholder="Search here..." />
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container text-center header-top-one">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo">
							<a href="{{ route('index') }}"><img src="{{ asset('/uploads/Settings/Logo/'.$setting->logo) }}" alt="{{$setting->company_name}}" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="header-middel">
							<div class="mainmenu">
								<nav>
									<ul>
										<li><a href="{{ route('index') }}" class="{{ (request()->routeIs('index')) ? 'active' : '' }}">Home</a></li>
										<li><a href="{{ route('our-products') }}" class="{{ (request()->routeIs('our-products')) ? 'active' : '' }}">Products</a></li>
										<li><a href="{{ route('about-us') }}" class="{{ (request()->routeIs('about-us')) ? 'active' : '' }}">About</a></li>
										<li><a href="{{ route('contact-us') }}" class="{{ (request()->routeIs('contact-us')) ? 'active' : '' }}">Contact</a></li>
									</ul>
								</nav>
							</div>
							<!-- mobile menu start -->
							<div class="mobile-menu-area">
								<div class="mobile-menu">
									<nav id="dropdown">
										<ul>
											<li><a href="{{ route('index') }}">Home</a></li>
											<li><a href="{{ route('our-products') }}" class="{{ (request()->routeIs('our-products')) ? 'active' : '' }}">Products</a></li>
											<li><a href="{{ route('about-us') }}">About</a></li>
											<li><a href="{{ route('contact-us') }}">Contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="cart-itmes">
							<a class="cart-itme-a" href="{{ route('my-cart') }}">
								<i class="mdi mdi-cart"></i>
								@if(Auth::user())
									@if($userCartItems != null)
										{{$totalItems}} items :  <strong>Rs.{{$totalPrice}}</strong>
									@else
										0 items :  <strong>Rs.0</strong>
									@endif									
								@else
									Add to Cart
								@endif
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>
        <!-- header section end -->   
               
        <!-- Page Content -->
        {{-- main content here --}}
            @yield('content')
        {{-- main content ends here --}}
              
        <!-- footer section start -->
		<footer class="footer-two">
			<!-- brand logo area start -->
			<div class="brand-logo">
				<div class="container">
					@isset($partners)
						<div class="row">
							<div class="col-xs-12">
								<div class="section-title partners text-center">
									<h2>Our Partners</h2>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="barnd-bg">
									@foreach($partners as $partner)
										<a href="#"><img src="{{ asset('/uploads/Partners/'.$partner->image) }}" alt="Brand Logo" /></a>
									@endforeach
								</div>
							</div>
						</div>
					@else
						<div class="row">
							<div class="col-xs-12">
								<div class="section-title partners text-center">
									<h2>{{$setting->company_name}}</h2>
								</div>
							</div>
						</div>
					@endif
				</div>
			</div>
			<!-- brand logo section end -->
			<!-- footer-top area start -->
			<div class="footer-top section-padding">
				<div class="footer-dsc">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-3">
								<div class="single-text">
									<div class="footer-title">
										<h4>newsletter</h4>
									</div>
									<div class="footer-newsletter">
										<div class="newsletter" id="subscription_form">
											<form id="subscription-email-form" class="subscription-email-form">
												@csrf
												<input type="email" name="email" placeholder="Enter your email..." required="required"/>
												<div id="error_message"></div>
												<input type="submit" value="subscribe"/>
											</form>
										</div>
										<div class="social-icons">
											<a href="https://www.facebook.com/{{$setting->facebook}}" target="blank"><i class="mdi mdi-facebook"></i></a>
											<a href="https://www.instagram.com/{{$setting->instagram}}" target="blank"><i class="mdi mdi-instagram"></i></a>
											<a href="https://twitter.com/{{$setting->twitter}}" target="blank"><i class="mdi mdi-twitter"></i></a>
											<a href="https://youtube.com/{{$setting->youtube}}" target="blank"><i class="mdi mdi-youtube-play"></i></a>
											<!-- <a href="#"><i class="mdi mdi-rss"></i></a> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3 wide-mobile">
								<div class="single-text useful-links">
									<div class="footer-title">
										<h4>useful links</h4>
									</div>
									<div class="footer-menu">
										<ul>
											<li><a href="{{ route('index') }}"><i class="mdi mdi-menu-right"></i>Home</a></li>
											<li><a href="{{ route('our-products') }}"><i class="mdi mdi-menu-right"></i>Shop</a></li>
											<li><a href="{{ route('about-us') }}"><i class="mdi mdi-menu-right"></i>About</a></li>
											<li><a href="{{ route('contact-us') }}"><i class="mdi mdi-menu-right"></i>Contact</a></li>
											<li><a href="#"><i class="mdi mdi-menu-right"></i></a>Terms & Conditions</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3 wide-mobile">
								<div class="single-text">
									<div class="footer-title">
										<h4>my account</h4>
									</div>
									<div class="footer-menu">
										<ul>
											<li><a href="{{ route('my-account') }}"><i class="mdi mdi-menu-right"></i>My Account</a></li>
											<li><a href="{{ route('my-wishlist') }}"><i class="mdi mdi-menu-right"></i>My Wishlist</a></li>
											<li><a href="{{ route('my-cart') }}"><i class="mdi mdi-menu-right"></i>My Cart</a></li>
											<li><a href="{{ route('user-login') }}"><i class="mdi mdi-menu-right"></i>Sign In</a></li>
											<li><a href="{{ route('my-checkout') }}"><i class="mdi mdi-menu-right"></i>Check out</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="single-text">
									<div class="footer-title">
										<h4>Contact us</h4>
									</div>
									<div class="footer-text">
										<ul>
											<li>
												<i class="mdi mdi-map-marker"></i>
												<p>{{$setting->street}},</p>
												<p>{{$setting->city}}, {{$setting->country}}</p>
											</li>
											<li>
												<i class="mdi mdi-phone"></i>
												<p>(+01) {{$setting->primary_phone}}</p>
												<p>(+977) {{$setting->secondary_phone}}</p>
											</li>
											<li>
												<i class="mdi mdi-email"></i>
												<p>{{$setting->primary_email}}</p>
												<p>{{$setting->secondary_email}}</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- footer-top area end -->
			<!-- footer-bottom area start -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>&copy; {{$setting->company_name}} 2021. All Rights Reserved.</p>
						</div>
						<!-- <div class="col-xs-12 col-sm-6 text-right">
							<a href="#"><img src="{{ asset('frontend/img/footer/payment.png') }}" alt="" /></a>
						</div> -->
					</div>
				</div>
			</div>
			<!-- footer-bottom area end -->
		</footer>
        <!-- footer section end -->
        
		<!-- bootstrap js -->
        <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
		<!-- owl.carousel js -->
        <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
		<!-- meanmenu js -->
        <script src="{{ asset('frontend/js/jquery.meanmenu.js') }}"></script>
		<!-- countdown JS -->
        <script src="{{ asset('frontend/js/countdown.js') }}"></script>
		<!-- nivo.slider JS -->
        <script src="{{ asset('frontend/js/jquery.nivo.slider.pack.js') }}"></script>
		<!-- simpleLens JS -->
        <script src="{{ asset('frontend/js/jquery.simpleLens.min.js') }}"></script>
		<!-- jquery-ui js -->
        <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
		<!-- load-more js -->
        <script src="{{ asset('frontend/js/load-more.js') }}"></script>
		<!-- plugins js -->
        <script src="{{ asset('frontend/js/plugins.js') }}"></script>
		<!-- main js -->
        <script src="{{ asset('frontend/js/main.js') }}"></script>
		<!-- Splide JS -->
		<script src="{{ asset('frontend/custom/splide/js/splide.min.js') }}"></script>
		<!-- Subscription -->
		<script>
		$("form.subscription-email-form").on("submit", function (e) {
			var subscriber = $(this).serialize();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			$.ajax({
				type: "POST",
				url: "{{route('emailSubscription')}}",
				data: subscriber,
				success: function () {
					$("#subscription_form").html("<div id='success-message'></div>");
					$("#success-message")
					.html("<h4>Subscription Successful!</h4>")
					.append("<p>Thanks for subscribing to Kasthamandap. We will be keeping you upto date on upcoming events and oppurtunities.</p><br>")
					.hide()
					.fadeIn(1000, function () {
						$("#success-message")
					});
				},
				error: function(response){
					$('#error_message').html("<div id='error-msg' style='margin-bottom:10px;padding: 5px 10px;color:#DC143C'></div>")
					$("#error-msg")
					.html(response.responseJSON.errors.email)
					.hide()
					.slideDown(250, function () {
						$("#error-msg")
					});
				}
			});
		
			e.preventDefault();
		});
	</script>
    </body>
</html>
