<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kasthamandap | Unsubscribed</title>

  <!-- Favicon --> 
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}"> 
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <style>
      .container{
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center         
      }

      .card{
          padding: 10px 20px;
          box-shadow: 0px 5px 5px #ccc;
      }
  </style>
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="card text-center">
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <img src="{{ asset('frontend/assets/images/favicon.png') }}" class="img-fluid">
                </div>
            </div>
            <h3 class="mb-3">Unsubscribe Successful!</h3>
            <p class="mb-5">You have been successfully removed from our subscriber list and won't receive any more emails from us.</p>
        </div>
    </div>
</body>

</html>