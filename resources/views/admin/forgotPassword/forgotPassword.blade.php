<!DOCTYPE html>
<html lang="en">

<head>
  	<title>{{ config('app.name', 'Kasthamandap') }} | Forgot Password</title>
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

	<!-- Form Input Style -->
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

	      <div class="card card-profile">
	        <div class="card-header card-header-rose mb-4">
	          <h4 class="card-title">Did you forgot your Password?</h4>
	          <p class="card-category">Enter your email address to reset your password.</p>
	        </div>
	        <div class="card-body">	          	
	          	<form action="{{ route('passwordResetMail') }}" method="post">  
	          		@csrf          
		            <div class="input-group mb-4">
			            <input type="email" class="form-control pl-2" placeholder="Email Address*" name="email" required="required"> 
			            <div class="input-group-append">
			              <div class="input-group-text">
			                <span class="material-icons">account_circle</span>
			              </div>
			            </div>
			          </div>
			          <div class="input-group mb-3">
					  	<div class="ml-auto mr-auto">
			            	<input type="submit" class="btn btn-rose btn-block" value="Reset Password">
						</div>
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
