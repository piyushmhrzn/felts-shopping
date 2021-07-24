<!DOCTYPE html>
<html lang="en">

<head>
  	<title>{{ config('app.name', 'Kasthamandap') }} | Reset Password</title>
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
            <h3 class="mb-3">Your password has successfully been reset.</h3>
            <p class="mb-5">Click <strong><a href="{{route('adminLogin')}}">here</a></strong> to go back to login</p>
        </div>
    </div>

    <script src="{{ asset('admin/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
</body>

</html>
