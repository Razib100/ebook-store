@extends('frontend.layouts.index')

@section('content')
<!--==============================
    Breadcrumb
============================== -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('/frontend/assets/img/bg/breadcumb-bg.png') }}">
  <div class="container z-index-common">
    <div class="breadcumb-content">
      <h1 class="breadcumb-title">About Us</h1>
      <div class="breadcumb-menu-wrap">
        <div class="breadcumb-menu">
          <span><a href="index.html">Home</a></span>
          <span>About Us</span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About Area  -->
<section class="about-layout1 space-top">
  <div class="container space-bottom">
    <div class="row g-5 justify-content-center align-items-center">
      <div class="col-lg-4">
        <div class="about-img wow animate__fadeInUp" data-wow-delay="0.45s">
          <img src="{{ asset('/frontend/assets/img/about/about-img-1-1.jpg') }}" alt="about image">
        </div>
      </div>
      <div class="col-lg-8">
        <div class="about-content">
          <div class="wow animate__fadeInUp" data-wow-delay="0.35s">
            <div class="title-area animation-style1 title-anime">
              <h2 class="sec-title text-title title-anime__title">We Are The Best Online Book Selling Store In The World</h2>
            </div>
            <p class="about-text wow animate__fadeInUp" data-wow-delay="0.30s">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
          <div class="list-style1 wow animate__fadeInUp" data-wow-delay="0.50s">
            <ul class="list-unstyled">
              <li><i class="fa-solid fa-badge-check"></i>Lorem ipsum dolor sit amet, qua. </li>
              <li><i class="fa-solid fa-badge-check"></i>Lorem ipsum dolor sit qua. </li>
              <li><i class="fa-solid fa-badge-check"></i>Lorem ipsum dolor sit amet </li>
              <li><i class="fa-solid fa-badge-check"></i>Lorem ipsum dolor sit.</li>
            </ul>
          </div>
          <div class="about-content wow animate__fadeInUp" data-wow-delay="0.75s">
            <div class="about-box">
              <div class="about-img wow animate__fadeInUp" data-wow-delay="0.55s">
                <img src="{{ asset('/frontend/assets/img/about/about-img-1-2.jpg') }}" alt="about image">
              </div>
              <div class="about-inner mb-0 wow animate__fadeInUp" data-wow-delay="0.95s">
                <p class="about-text mb-20">
                  Lorem ipsum dolor sit amet, consecteturdvnd adipiscing elit, sed do jdvj eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <a class="vs-btn" href="about.html">Explore More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About Area End -->
<!-- Video Area Start -->
<div class="video-style1" data-bg-src="assets/img/bg/video-bg1.jpg">
  <div class="container">
    <div class="title-area text-center animation-style1 title-anime">
      <h2 class="sec-title text-white title-anime__title">We are providing Best Services</h2>
    </div>
    <div class="video-btn text-center">
      <a href="https://www.youtube.com/watch?v=moYayPRgaY0" class="play-btn popup-video">
        <i class="fas fa-play"></i>
      </a>
    </div>
  </div>
</div>
<!-- Video Area End -->
<!-- counter Area -->
@php
$counts = \App\Helpers\Various::getDashboardCounts();

function formatCount($count) {
if($count >= 1000){
return round($count / 1000, 1) . 'K';
}
return $count . '+';
}
@endphp
<section class="counter-layout1 bg-theme">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="counter-style1">
        <div class="media-inner wow animate__fadeInUp" data-wow-delay="0.35s">
          <div class="media-inner wow animate__fadeInUp" data-wow-delay="0.35s">
            <div class="media-counter text-center">
              <div class="media-count">
                <h2 class="media-title counter-number" data-count="{{ $counts['products'] }}">{{ formatCount($counts['products']) }}</h2>
                <span class="count-icon">+</span>
              </div>
              <p class="media-text">Book Collection</p>
            </div>
          </div>
        </div>
        <div class="media-inner wow animate__fadeInUp" data-wow-delay="0.35s">
          <div class="media-counter text-center">
            <div class="media-count">
            <h2 class="media-title counter-number" data-count="{{ $counts['customers'] }}">{{ formatCount($counts['customers']) }}</h2>
              <span class="count-icon">+</span>
            </div>
            <p class="media-text">Happy Customers</p>
          </div>
        </div>
        <div class="media-inner wow animate__fadeInUp" data-wow-delay="0.35s">
        <div class="media-counter text-center">
              <div class="media-count">
                <h2 class="media-title counter-number" data-count="{{ $counts['authors'] }}">{{ formatCount($counts['authors']) }}</h2>
                <span class="count-icon">+</span>
              </div>
              <p class="media-text">Book Authors</p>
            </div>
        </div>
        <div class="media-inner wow animate__fadeInUp" data-wow-delay="0.35s">
          <div class="media-counter text-center">
            <div class="media-count">
              <h2 class="media-title counter-number" data-count="100">00</h2>
              <span class="count-icon">+</span>
            </div>
            <p class="media-text">Team Members</p>
          </div>
        </div>
        <div class="media-inner wow animate__fadeInUp" data-wow-delay="0.35s">
        <div class="media-counter text-center">
              <div class="media-count">
                <h2 class="media-title counter-number" data-count="{{ $counts['categories'] }}">{{ formatCount($counts['categories']) }}</h2>
                <span class="count-icon">+</span>
              </div>
              <p class="media-text">Book Category</p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Facts Area End -->
<!-- Testimonial Area  -->
<!-- Testimonial Area End  -->
<!-- Brand Area Start  -->
<div class="brand-style1 space-bottom mt-3">
  <div class="container">
    <div class="row vs-carousel wow animate__fadeInUp" data-wow-delay="0.35s" data-slide-show="5" data-lg-slide-show="4" data-md-slide-show="3" data-sm-slide-show="2" data-xs-slide-show="2" data-autoplay="true">
      <div class="col-xl-2">
        <div class="brand-item">
          <img src="assets/img/brand/brand-1-1.png" alt="brand image">
        </div>
      </div>
      <div class="col-xl-2">
        <div class="brand-item">
          <img src="assets/img/brand/brand-1-2.png" alt="brand image">
        </div>
      </div>
      <div class="col-xl-2">
        <div class="brand-item">
          <img src="assets/img/brand/brand-1-3.png" alt="brand image">
        </div>
      </div>
      <div class="col-xl-2">
        <div class="brand-item">
          <img src="assets/img/brand/brand-1-4.png" alt="brand image">
        </div>
      </div>
      <div class="col-xl-2">
        <div class="brand-item">
          <img src="assets/img/brand/brand-1-5.png" alt="brand image">
        </div>
      </div>
      <div class="col-xl-2">
        <div class="brand-item">
          <img src="assets/img/brand/brand-1-1.png" alt="brand image">
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Brand Area End  -->
@endsection