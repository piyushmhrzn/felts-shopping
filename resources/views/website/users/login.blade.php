@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Login / Register</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- login content section start -->
<section class="pages login-page section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="main-input padding60">
                    <div class="log-title">
                        <h3><strong>registered customers</strong></h3>
                    </div>
                    <div class="login-text">
                        <div class="custom-input">
                            <p>If you have an account with us, Please log in!</p>
                            <form action="{{ route('verifyUser') }}" method="post">
                                @csrf
                                <input type="email" name="email" placeholder="Email" required="required"/>
                                <input type="password" name="password" placeholder="Password" required="required"/>
                                <a class="forget" href="#">Forget your password?</a>
                                <div class="message">@include('.inc/message')</div>
                                <div class="submit-text">
                                    <input type="submit" value="Login" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="main-input padding60 new-customer">
                    <div class="log-title">
                        <h3><strong>new customers</strong></h3>
                    </div>
                    <div class="custom-input">
                        <form class="register-form" id="register-form">
                            @csrf
                            <input type="text" name="name" placeholder="Name here.." />
                            <input type="email" name="email" placeholder="Email Address.." />
                            <input type="text" name="phone" placeholder="Phone Number.." />
                            <input type="password" name="password" placeholder="Password" />
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                            <label class="first-child">
                                <input type="checkbox" name="subscription">
                                Sign up for our newsletter!
                            </label>
                            <div id="register_message"></div>
                            <div class="submit-text coupon">
                                <input type="submit" id="button" value="Register" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- login content section end -->

<!-- Loader -->
<div class="loader loader-bouncing"></div>

<!-- User Register -->
<script>
      $("form.register-form").on("submit", function (e) {
        var user_data = $(this).serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          type: "POST",
          url: "{{route('userRegister')}}",
          data: user_data,
          success: function () {
            $('.loader').removeClass('is-active');
            $("#register-form")[0].reset();
            $("#register_message").html("<div id='message' style='margin-top:20px;padding:20px 15px;background:#18D26E;color:#fff'></div>");
            $("#message")
              .html("<h5>Registration Successful!</h5>")
              .append("<p style='color:#fff'>Thank you for signing up with Kasthamandap Felts Shopping. You can now proceed to login.</p><br>")
              .hide()
              .slideDown(250, function () {
                $("#message")
              });
          },
          error: function(response){
            $('.loader').removeClass('is-active');
            $('#register_message').html("<div id='error-msg' style='margin-top:20px;padding:10px;text-align:left;background:#ED3C0D;color:#fff'></div>")
            $("#error-msg")
              .html(response.responseJSON.errors.name)
              .append('<br>')
              .html(response.responseJSON.errors.email)
              .append('<br>')
              .append(response.responseJSON.errors.password)
              .append('<br>')
              .append(response.responseJSON.errors.phone)
              .hide()
              .slideDown(250, function () {
                $("#error-msg")
              });
          }
        });
    
        e.preventDefault();
    });
</script>

<script>
    $("#button").click(function(){
        $(".loader").addClass("is-active");
    });
</script>

@endsection
