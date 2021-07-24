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
</head>

<body>

    <div class="container-fluid">
        <div class="text-center mt-5">
            <i class="material-icons" style="font-size:60px;">done_all</i>
            <h3 class="mb-3">The password reset link has been sent to your email address.</h3>
            <p class="mb-5">
              Check your email address <strong><a href="https://mail.google.com/">here</a></strong>.<br>OR<br>
              Return back to <strong><a href="{{route('adminLogin')}}">login</a></strong>.</p>
        </div>
	</div>

    <script src="{{ asset('admin/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
</body>

</html>
