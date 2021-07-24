@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>Contact Us</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- contact content section start -->
<div class="pages contact-page section-padding">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12">
                <iframe width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Balkhu%20Khola%20-%20Amritnagar%20Chowk%20Rd,%20Kirtipur%2044600+(Kasthamandap)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                    <!-- <div class="googleMap-info">
                        <div id="googleMap"></div>
                        <div class="map-info">
                            <p><strong>Kasthamandap</strong></p>
                        </div>
                    </div> -->
                </iframe>                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 col-text-center">
                <div class="contact-details">
                    <div class="row contact-info">
                        <div class="col-sm-4">
                            <div class="single-contact">
                                <i class="mdi mdi-map-marker"></i>
                                <p>{{$setting->street}},</p>
                                <p>{{$setting->city}}, {{$setting->country}}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-contact">
                                <i class="mdi mdi-phone"></i>
                                <p>(+01) {{$setting->primary_phone}}</p>
                                <p>(+977) {{$setting->secondary_phone}}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-contact">
                                <i class="mdi mdi-email"></i>
                                <p>{{$setting->primary_email}}</p>
                                <p>{{$setting->secondary_email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="get-touch">
                            <h3>get in touch</h3>
                            <form class="contact-email-form" id="contact-email-form">
                                <label class="contact-label">Full Name</label>
                                <input type="text" name="name" placeholder="Enter your Name..." required="required"/>
                                <label class="contact-label">Email Address</label>
                                <input type="email" name="email" placeholder="Enter your Email..." required="required"/>
                                <label class="contact-label">Phone Number</label>
                                <input type="text" name="phone" placeholder="Enter your Number..." required="required"/>
                                <label class="contact-label">Subject</label>
                                <input type="text" name="subject" placeholder="Enter your Subject..." required="required"/>
                                <label class="contact-label">Message</label>
                                <textarea name="message" rows="3" placeholder="Enter your Message...." required="required"></textarea>
                                <div id="contactFormMessage"></div>
                                <input type="submit" value="send your message"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact content section end -->

    <script>
        $("form.contact-email-form").on("submit", function (e) {
        var contact = $(this).serialize();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
          type: "POST",
          url: "{{route('storeContactMessage')}}",
          data: contact,
          success: function () {
            $("#contact-email-form")[0].reset();
            $("#contactFormMessage").html("<div id='success-message' style='margin-bottom:12px;padding:10px;background:#18D26E;color:#fff'></div>")
            $("#success-message")
              .html("Your message has been sent. Thank you!")
              .hide()
              .slideDown(300, function () {
                $("#success-message")
              });
          },
          error: function(response){
            console.log(response);
            var error_msg = "Form submission failed!<br>";

            if(response.responseText) {
              var myObj = JSON.parse(response.responseText);
                $(myObj).each(function (i, val) {
                  $.each(val, function (k, v) {
                    if(k==='errors'){
                      error_msg += 'errors : <br>';
                      for (let x in v) {
                        for(let i in v[x]){
                          error_msg += '->';
                          error_msg += v[x][i] + '<br>';
                        }
                      }
                    }else{
                      error_msg += (k + " : " + v);
                      error_msg += '<br>';
                    }
                  });
              });
            }

            $('#contactFormMessage').html("<div id='error-message' style='margin-bottom:12px;padding:10px;text-align:left;background:#D4380F;color:#fff'></div>");
            $("#error-message")
              .html(error_msg)
              .hide()
              .slideDown(300, function () {
                $("#error-message")
              });
          }
        });
    
        e.preventDefault();
    });
  </script>

@endsection