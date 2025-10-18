@extends('frontend.layouts.index')

@section('content')

<section class="hero-layout1" data-wow-delay="0.25s" aria-hidden="true">
  <div class="hero-item" data-bg-src="{{ asset('/frontend/assets/img/bg/hero-bg1.jpg') }}">
    <div class="container position-relative z-index">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6 position-relative">
          <div class="hero-content">
            <h1 class="hero-title wow animate__fadeInUp" data-wow-delay="0.50s">The Most Biggestn <span class="title-highlight">Bookstore</span> in the world</h1>
            <p class="hero-text wow animate__fadeInUp" data-wow-delay="0.75s">We deliver books alln over the world 10,000+ books in stock.</p>
            <a class="vs-btn wow animate__flipInX" data-wow-delay="0.95s" href="shop.html">Explore Moren</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="hero-img">
            <img src="{{ asset('/frontend/assets/img/hero/hero-img-1-1.png') }}" alt="hero image">
          </div>
        </div>
      </div>
    </div>
  </div>
  <span class="shape-mockup element1 z-index1  d-xxl-block d-none" data-wow-delay="0.80s" style="right: 0px; top: -10px;"><img src="{{ asset('frontend/assets/img/shapes/hero-shape2.svg') }}" alt="Hero shape"></span>
  <span class="shape-mockup element2 z-index1  d-xxl-block d-none" data-wow-delay="0.80s" style="left: 0px; bottom: -10px;"><img src="{{ asset('frontend/assets/img/shapes/hero-shape3.svg') }}" alt="Hero shape"></span>
  <span class="shape-mockup z-index1 wow animate__fadeInLeft d-xxl-block d-none" data-wow-delay="0.80s" style="left: 0px; top: 0px;"><img src="{{ asset('frontend/assets/img/shapes/hero-shape1.svg') }}" alt="Hero shape"></span>
</section>
<!-- Trending Product Start -->
<section class="trending-layout1 space">
  <div class="container">
    <div class="title-area2 animation-style1 title-anime">
      <span class="border-line d-xxl-block d-none"></span>
      <h2 class="sec-title title-anime__title">Trending On Ebukz</h2>
      <a class="vs-btn wow animate__flipInX" data-wow-delay="0.30s" href="shop.html">View More</a>
    </div>
    <div class="row g-4">
      @foreach($trendingProducts as $key => $product)
      <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.{{ $key+3 }}0s">
          <div class="product-img">
            <img src="{{ asset($product->cover_image) }}" alt="{{ $product->title }}">
            <div class="product-btns">
              @php
              $isPurchased = \App\Helpers\Various::isPurchased($product->id);
              @endphp
              @if(!$isPurchased)
              <a href="javascript:void(0);" class="icon-btn cart add-to-cart" data-id="{{ $product->id }}">
                <i class="fa-solid fa-basket-shopping"></i>
              </a>
              @endif
            </div>
            @if($product->percentage > 0)
            <ul class="post-box">
              <li>Hot</li>
              <li>-{{ $product->percentage }}%</li>
            </ul>
            @endif
          </div>
          <div class="product-content">
            <div class="product-rating">
              <span class="star"><i class="fas fa-star"></i> (5)</span>
              <ul class="price-list">
                @if(!empty($product->percentage) && $product->percentage > 0)
                @php
                $discountPrice = $product->price - ($product->price * $product->percentage / 100);
                @endphp
                <li><del>${{ number_format($product->price, 2) }}</del></li>
                <li>${{ number_format($discountPrice, 2) }}</li>
                @else
                <li>${{ number_format($product->price, 2) }}</li>
                @endif
              </ul>
            </div>
            <span class="product-author"><strong>By:</strong> {{ $product->author_name }}</span>
            <h2 class="product-title">
              <a href="{{ route('book.byId', $product->id) }}">{{ $product->title }}</a>
            </h2>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Trending Product End -->
<!-- Offer section Start -->
<div class="offer-layout1 space-bottom">
  <div class="container">
    <div class="row g-4">
      @foreach($authors->take(2) as $index => $author)
      <div class="col-xl-6 col-lg-6">
        <div
          class="offer-style1 {{ $index == 1 ? 'white-style' : '' }} wow {{ $index == 0 ? 'animate__fadeInLeft' : 'animate__fadeInRight' }}"
          data-wow-delay="0.30s"
          data-bg-src="{{ asset('frontend/assets/img/bg/offer-bg' . ($index + 1) . '.jpg') }}">
          <div class="offer-img">
            <img src="{{ $author->image ? asset('admin/assets/author/' . $author->image) : asset('frontend/assets/img/offer/offer-img1.png') }}" alt="{{ $author->name }}">
          </div>
          <div class="offer-content">
            <div class="star-rating">
              @for($i = 1; $i <= 5; $i++)
                <i class="fa-solid fa-star"></i>
                @endfor
            </div>
            <h2 class="offer-title">{{ $author->name }}</h2>
            <p class="offer-price">
              Only From
              <span>
                $11
              </span>
            </p>
            <a class="vs-btn" href="{{ route('search', ['author_id' => $author->id]) }}">Shop Now</a>
          </div>
          <span
            class="shape-mockup element1 z-index1 d-xxl-block d-none"
            data-wow-delay="0.80s"
            style="right: 0px; bottom: -5px;">
            <img src="{{ asset('frontend/assets/img/shapes/offer-shape' . ($index + 1) . '.png') }}" alt="offer shape">
          </span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<!-- Offer section End -->
<!-- Top Categories Start -->
<section class="categories-layout1 space" data-bg-src="{{ asset('frontend/assets/img/bg/categorie-bg1.jpg') }}">
  <div class="container">
    <div class="title-area text-center animation-style1 title-anime">
      <h2 class="sec-title title-anime__title">Top Categories</h2>
    </div>
    <div class="row g-4 mb-40 filter-menu-active">
      @foreach($topCategories as $index => $category)
      <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-filter=".{{ Str::slug($category->name) }}">
        <div class="categorie-style1 wow animate__fadeInUp {{ $loop->first ? 'active' : '' }}"
          data-wow-delay="0.{{ 3 + $index }}0s">

          <img src="{{ $category->image 
                          ? asset('admin/assets/category/' . $category->image) 
                          : asset('frontend/assets/img/categoris/catigori-1-' . (($index % 6) + 1) . '.png') }}"
            alt="{{ $category->name }}">

          <h4 class="categorie-title">{{ $category->name }}</h4>
        </div>
      </div>
      @endforeach

      @if($topCategories->isEmpty())
      <div class="col-12 text-center">
        <h3 class="text-muted mt-4">No categories available right now.</h3>
      </div>
      @endif
    </div>
    <div class="row gy-30 mb-40 filter-active">
      @foreach($topCategories as $category)
      @foreach($topCategoryProducts[$category->id] as $index => $product)
      <div class="col-xl-4 col-lg-6 col-md-6 filter-item 
                {{ strtolower(str_replace(' ', '-', $category->name)) }}">

        <div class="product-style1 style2 wow animate__fadeInUp"
          data-wow-delay="0.{{ 3 + $index }}0s">

          <div class="product-img">
            <img src="{{ asset($product->cover_image ?? 'frontend/assets/img/default.jpg') }}"
              alt="{{ $product->title }}">
            <div class="product-btns">
            </div>
            @if($product->percentage > 0)
            <ul class="post-box">
              <li>Hot</li>
              <li>-{{ $product->percentage }}%</li>
            </ul>
            @endif
          </div>

          <div class="product-content">
            <div class="star-rating">
              @for($i = 0; $i < 5; $i++)
                <i class="fa-solid fa-star"></i>
                @endfor
            </div>

            <span class="product-author">
              <strong>By:</strong> {{ $product->author->name ?? 'Unknown' }}
            </span>

            <h2 class="product-title">
              <a href="{{ route('book.byId', $product->id) }}">
                {{ $product->title }}
              </a>
            </h2>

            <ul class="price-list">
              @if(!empty($product->percentage) && $product->percentage > 0)
              @php
              $discountPrice = $product->price - ($product->price * $product->percentage / 100);
              @endphp
              <li><del>${{ number_format($product->price, 2) }}</del></li>
              <li>${{ number_format($discountPrice, 2) }}</li>
              @else
              <li>${{ number_format($product->price, 2) }}</li>
              @endif
            </ul>

            <div class="product-btn">
              @php
              $isPurchased = \App\Helpers\Various::isPurchased($product->id);
              @endphp
              @if(!$isPurchased)
              <a href="javascript:void(0);" class="icon-btn cart add-to-cart" data-id="{{ $product->id }}">
                <i class="fa-solid fa-basket-shopping"></i>
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
      @endforeach
    </div>

    <div class="text-center">
      <a class="vs-btn wow animate__flipInX" data-wow-delay="0.40s" href="{{ route('search') }}">View More</a>
    </div>
  </div>
</section>
<!-- Top Categories End -->
<!-- Best selling start -->
<section class="selling-layout1 space" data-bg-src="{{ asset('frontend/assets/img/bg/selling-bg.jpg') }}">
  <div class="container">
    <div class="row g-4 gx-40 align-items-center">
      @if($topSeller)
      <div class="col-xl-5">
        <div class="selling-content">
          <h2 class="selling-title wow animate__fadeInUp" data-wow-delay="0.20s">Best Seller Author Of The Month</h2>
          <h4 class="author-name wow animate__fadeInUp" data-wow-delay="0.30s">{{ $topSeller['name'] ?? 'Unknown' }}</h4>
          <span class="published wow animate__fadeInUp" data-wow-delay="0.40s">{{ $topSeller['total_products'] ?? 0 }}+ Published Book</span>
          <p class="selling-text wow animate__fadeInUp" data-wow-delay="0.50s">{!! $topSeller['short_description'] ?? '' !!}</p>
          <a class="vs-btn wow animate__flipInX" data-wow-delay="0.60s" href="#">Read More</a>
        </div>
      </div>

      <div class="col-xl-4">
        <div class="selling-img-tag wow animate__fadeInUp" data-wow-delay="0.30s">
          <div class="wow animate__fadeInDownBig" data-wow-delay="0.30s">
            <div class="tag" data-wow-delay="0.30s">
              <img src="{{ asset('frontend/assets/img/selling/selling-icon.png') }}" alt="selling icon">
              <h4 class="tag-title">no.1 Best Seller Of The Month</h4>
            </div>
          </div>
          <img src="{{ !empty($topSeller['image']) ? asset('admin/assets/author/' . $topSeller['image']) : asset('frontend/assets/img/selling/selling-img.jpg') }}" alt="selling images">
        </div>
      </div>

      <div class="col-xl-3">
        <div class="selling-books">
          @if(!empty($topSeller['products_cover_images']))
          @foreach($topSeller['products_cover_images'] as $topSellerpcimage)
          <div class="book-item wow animate__fadeInDown" data-wow-delay="0.30s">
            <img src="{{ asset($topSellerpcimage) }}" alt="book image">
          </div>
          @endforeach
          @else
          <p class="text-muted">No books available.</p>
          @endif
        </div>
      </div>
      @else
      <div class="col-12 text-center">
        <h3 class="text-muted mt-4">No best seller available right now.</h3>
      </div>
      @endif
    </div>

  </div>
</section>
<!-- Best selling End -->
<!-- Romance Product Start -->
@foreach ($productsByCategory as $categoryId => $products)
<section class="romance-layout1 space-top">
  <div class="container space-bottom position-relative">
    <div class="title-area2 animation-style1 title-anime">
      <h2 class="sec-title title-anime__title">
        {{ $products->first()->category->name ?? 'Unknown Category' }}
      </h2>
      <a class="vs-btn wow animate__flipInX" data-wow-delay="0.70s"
        href="{{ route('book.byCategory', $products->first()->category->id) }}">
        View More
      </a>
    </div>

    <div class="row g-4">
      @foreach ($products as $product)
      <div class="col-xl-2 col-md-4 col-sm-6">
        <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.30s">
          <div class="product-img">
            <img src="{{ asset($product->cover_image) }}" alt="{{ $product->title }}">
            <div class="product-btns">
              @php
              $isPurchased = \App\Helpers\Various::isPurchased($product->id);
              @endphp
              @if(!$isPurchased)
              <a href="javascript:void(0);" class="icon-btn cart add-to-cart" data-id="{{ $product->id }}">
                <i class="fa-solid fa-basket-shopping"></i>
              </a>
              @endif
            </div>
            @if($product->percentage > 0)
            <ul class="post-box">
              <li>Hot</li>
              <li>-{{ $product->percentage }}%</li>
            </ul>
            @endif
          </div>

          <div class="product-content">
            <div class="product-rating">
              <span class="star"><i class="fas fa-star"></i> ({{ $product->rating ?? '4.5' }})</span>
              <ul class="price-list">
                @if(!empty($product->percentage) && $product->percentage > 0)
                @php
                $discountPrice = $product->price - ($product->price * $product->percentage / 100);
                @endphp
                <li><del>${{ number_format($product->price, 2) }}</del></li>
                <li>${{ number_format($discountPrice, 2) }}</li>
                @else
                <li>${{ number_format($product->price, 2) }}</li>
                @endif
              </ul>
            </div>

            <span class="product-author">
              <strong>By:</strong> {{ $product->author->name ?? 'Unknown' }}
            </span>

            <h2 class="product-title">
              <a href="{{ route('book.byId', $product->id) }}">{{ $product->title }}</a>
            </h2>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <span class="border-line"></span>
  </div>
</section>
@endforeach

<!-- Kids Product End -->
<!-- Book Of The Month End -->
<section class="books-layout1 space" data-bg-src="assets/img/bg/section-bg1.jpg">
  <div class="container">
    <div class="title-area text-center animation-style1 title-anime">
      <h2 class="sec-title title-anime__title">Book Of The Month</h2>
    </div>
    <div class="row g-4">
      @foreach($mostDownloadedProducts as $key => $product)
      <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="product-style1 wow animate__fadeInUp" data-wow-delay="{{ 0.3 + ($key * 0.1) }}s">
          <div class="product-img">
            <img src="{{ asset($product->cover_image) }}" alt="{{ $product->title }}">
            <div class="product-btns">
              @php
              $isPurchased = \App\Helpers\Various::isPurchased($product->id);
              @endphp
              @if(!$isPurchased)
              <a href="javascript:void(0);" class="icon-btn cart add-to-cart" data-id="{{ $product->id }}">
                <i class="fa-solid fa-basket-shopping"></i>
              </a>
              @endif
            </div>
            @if($product->percentage > 0)
            <ul class="post-box">
              <li>Hot</li>
              <li>-{{ $product->percentage }}%</li>
            </ul>
            @endif
          </div>
          <div class="product-content">
            <div class="product-rating">
              <span class="star"><i class="fas fa-star"></i> ({{ number_format($product->rating ?? 4.5, 1) }})</span>
              <ul class="price-list">
                @if(!empty($product->percentage) && $product->percentage > 0)
                @php
                $discountPrice = $product->price - ($product->price * $product->percentage / 100);
                @endphp
                <li><del>${{ number_format($product->price, 2) }}</del></li>
                <li>${{ number_format($discountPrice, 2) }}</li>
                @else
                <li>${{ number_format($product->price, 2) }}</li>
                @endif
              </ul>
            </div>
            <span class="product-author">
              <strong>By:</strong> {{ $product->author->name ?? 'Unknown Author' }}
            </span>
            <h2 class="product-title">
              <a href="{{ route('book.byId', $product->id) }}">
                {{ Str::limit($product->title, 40) }}
              </a>
            </h2>
          </div>
        </div>
      </div>
      @endforeach

      @if($mostDownloadedProducts->count() > 0)
      <div class="text-center">
        <a class="vs-btn mt-10 wow animate__flipInX" data-wow-delay="0.40s" href="{{ route('search') }}">View More</a>
      </div>
      @endif
    </div>

  </div>
</section>
<!-- Book Of The Month End -->
<!-- Testimonial Area  -->

<!-- Testimonial Area End  -->
@endsection
@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // CSRF setup for fetch
    function getCsrf() {
      const token = document.querySelector('meta[name="csrf-token"]');
      return token ? token.getAttribute('content') : '';
    }

    // click handler
    document.body.addEventListener('click', function(e) {
      const el = e.target.closest('.add-to-cart');
      if (!el) return;
      e.preventDefault();

      const productId = el.getAttribute('data-id');
      if (!productId) return;

      fetch("{{ route('cart.add') }}", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': getCsrf(),
            'Accept': 'application/json'
          },
          body: JSON.stringify({
            product_id: productId
          })
        })
        .then(async res => {
          const data = await res.json();
          if (res.ok) {
            // update badge and mini cart HTML from response
            document.getElementById('cart-count').textContent = data.count ?? 0;
            if (data.html) {
              document.getElementById('mini-cart-wrapper').innerHTML = data.html;
            } else {
              refreshMiniCart();
            }
            // Show toast instead of alert
            showToast(data.message || 'Product added to cart successfully!', 'success');
          } else {
            showToast(data.message || 'Could not add to cart', 'danger');
            if (data.count !== undefined) document.getElementById('cart-count').textContent = data.count;
          }
        })
        .catch(err => {
          console.error(err);
          showToast('Request failed, try again.', 'danger');
        });

    });

    // helper to refresh mini cart (if needed)
    function refreshMiniCart() {
      fetch("{{ route('cart.mini') }}")
        .then(r => r.json())
        .then(data => {
          if (data.html) document.getElementById('mini-cart-wrapper').innerHTML = data.html;
          if (data.count !== undefined) document.getElementById('cart-count').textContent = data.count;
        });
    }
  });
</script>

@endsection