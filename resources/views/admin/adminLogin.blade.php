<!DOCTYPE html>
<html lang="en">

<head>
  	<title>{{ config('app.name', 'Kasthamandap') }} | Log in</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link href="{{ asset('admin/assets/img/icon.png') }}" rel="icon" type="image/x-icon">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Material Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/material-dashboard.min.css') }}">

	<!-- Custom Style -->
	<link rel="stylesheet" href="{{ asset('custom/style.css') }}">
	<style>
	.container-fluid{
		height: 100vh;
	}

	.centered {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}
	</style>
</head>

<body>
  <div class="message" id="message">
    @include('.inc/message')
  </div>

  <div class="container-fluid">
	  <div class="row d-flex justify-content-center">
	    <div class="col-lg-4 col-md-6 col-sm-8 centered">
	      <div class="d-flex justify-content-center">
	         <a href="javascript:;">
	            <img class="img" src="{{ asset('admin/assets/img/icon.png') }}" height="70px"/>
	         </a>
	      </div>

	      <div class="card">
			<div class="card-header card-header-rose card-header-icon mb-3">
				<div class="card-icon">
					<i class="material-icons">contacts</i>
				</div>
				<h4 class="card-title">Login to Kasthamandap</h4>
			</div>
	        <div class="card-body">	          	
	          	<form action="{{route('verifyAdmin')}}" method="post">  
	          		@csrf          
		              <div class="input-group mb-4">
			            <input type="email" class="form-control pl-2" placeholder="Email Address*" name="email" required="required" style="border-radius:4px"> 
			            <div class="input-group-append">
			              <div class="input-group-text">
			                <span class="material-icons">account_circle</span>
			              </div>
			            </div>
			          </div>
			          <div class="input-group mb-4">
			            <input type="password" class="form-control pl-2" placeholder="Password*" name="password" required="required" style="border-radius:4px">
			            <div class="input-group-append">
			              <div class="input-group-text">
			                <span class="material-icons">vpn_key</span>
			              </div>
			            </div>
			          </div>
			          <div class="input-group">
					  	<div class="ml-auto mr-auto">
							<input type="submit" class="btn btn-rose btn-block" value="Login">
						</div>			            
			          </div>
					  <div class="d-flex justify-content-start">
			              <a href="{{route('forgotPassword')}}" class="text-rose"><small>I forgot my password</small></a>
			          </div>
	          	</form>
	        </div>
	      </div>
	    </div>

	  </div>
	</div>

    <script src="{{ asset('admin/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
</body>

</html>
