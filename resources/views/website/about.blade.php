@extends('layouts.website')
@section('content')

<!-- pages-title-start -->
<div class="pages-title section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="pages-title-text text-center">
                    <h2>About Us</h2>
                    <ul class="text-left">
                        <li><a href="{{ route('index') }}">Home </a></li>
                        <li><span> // </span>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pages-title-end -->
<!-- about-us-section-start -->
<div class="pages about-us section-padding">
    <div class="container">
        <div class="row">
            <div class="main-padding section-padding clearfix">
                <div class="col-sm-12 col-md-6">
                    <div class="about-img">
                        @isset($about->aboutUsGalleries)
                        <!-- Image Gallery Slider -->
                        <div id="image-slider" class="splide" style="box-shadow: 0px 2px 10px rgb(0 0 0 / 30%)">
                            <div class="splide__track">
                                <ul class="splide__list">
                                @foreach($about->aboutUsGalleries as $image)
                                    @if($image->status == 1)
                                        <li class="splide__slide">
                                            <img src="{{url('/uploads/AboutUs/AboutUsGallery/'.$image->image)}}"  alt="gallery" />
                                        </li>
                                    @endif
                                @endforeach     
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="about-text">
                        <div class="about-author">
                            <h4>{{$about->title}}</h4>
                        </div>
                        <p>{!! nl2br(e($about->short_description)) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-us section end -->
<!-- team-member section start -->
<section class="pages team-member section-padding-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title text-center">
                    <h3>Our Team</h3>
                </div>
            </div>
        </div>
        <div class="row text-center">
            @isset($members)
                @foreach($members as $member)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="single-member">
                        <div class="member-img">
                            <a href="#">
                                <img src="{{ asset('uploads/TeamMembers/'.$member->image) }}" class="img-thumbnail" alt="Member" style="width:100%"/>
                            </a>
                        </div>
                        <div class="share-member">
                            <div class="member-title">
                                <h4>{{$member->name}}</h4>
                                <p>{{$member->post}}</p>
                            </div>
                            <div class="member-btn">	
                                <a href="https://www.facebook.com/{{$member->facebook}}" title="facebook" target="blank"><i class="mdi mdi-facebook"></i></a>
                                <a href="https://www.instagram.com/{{$member->instagram}}" title="instagram" target="blank"><i class="mdi mdi-instagram"></i></a>
                                <a href="https://twitter.com/{{$member->twitter}}" title="twitter" target="blank"><i class="mdi mdi-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif            
        </div>
    </div>
</section>
<!-- team-member section end -->

<script>
  document.addEventListener( 'DOMContentLoaded', function () {
	new Splide( '#image-slider', {
        type : 'fade',
        rewind :true,
		cover : true,
		heightRatio : 0.5, 
        interval : 4000,
        speed : 1500,
        resetProgress : false,
        autoplay : true,
	} ).mount();
} );
</script>

@endsection
