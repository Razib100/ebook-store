@extends('frontend.layouts.index')

@section('content')
<!--==============================
    Breadcrumb
  ============================== -->
<div class="breadcumb-wrapper" data-bg-src="{{ asset('/frontend/assets/img/bg/breadcumb-bg.png') }}">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Shop</h1>
            <div class="breadcumb-menu-wrap">
                <div class="breadcumb-menu">
                    <span><a href="/">Home</a></span>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
    Shop Area
  ==============================-->
@if($products->isEmpty())
<section class="books-layout1 space-extra-bottom">
    <div class="w-100 text-center my-5">
        <h2 class="text-muted">We don't have enough books.</h2>
    </div>
</section>
@else
<section class="books-layout1 space-top space-extra-bottom">
    <div class="container">
        <div class="vs-sort-bar">
            <div class="row gap-4 align-items-center">
                <div class="col-md-auto flex-grow-1">
                    <p class="woocommerce-result-count">
                        Showing <span>1-{{ $products->count() }} of {{ $products->count() }}</span> results
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <form method="GET" action="{{ url()->current() }}" id="filters-form">
                    <div class="mb-3">
                        <label for="orderby" class="form-label">Sort by</label>
                        <select name="orderby" class="orderby" aria-label="Shop order">
                            <option value="desc">Sort By Latest</option>
                            <option value="asc">Sort By Oldest</option>
                            <option value="price-low-to-high">Sort by price: low to high</option>
                            <option value="price-high-to-low">Sort by price: high to low</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Minimum price</label>
                        <input type="number" min="0" step="0.01" name="price_min" value="{{ request('price_min') }}" class="form-control" placeholder="0">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Maximum price</label>
                        <input type="number" min="0" step="0.01" name="price_max" value="{{ request('price_max') }}" class="form-control" placeholder="∞">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        @foreach([5,4,3,2,1] as $star)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="rating_min" id="rating_{{ $star }}" value="{{ $star }}" {{ request('rating_min') == $star ? 'checked' : '' }}>
                            <label class="form-check-label" for="rating_{{ $star }}">
                                @for ($i=1; $i <= 5; $i++)
                                    @if($i <=$star)
                                    <i class="fas fa-star text-warning"></i>
                                    @else
                                    <i class="far fa-star text-warning"></i>
                                    @endif
                                    @endfor
                            </label>
                        </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Format</label>
                        @php
                        $formats = ['epub', 'mobi', 'pdf'];
                        $selectedFormats = request('formats', []);
                        @endphp
                        @foreach ($formats as $format)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="formats[]" id="format_{{ $format }}" value="{{ $format }}" {{ in_array($format, $selectedFormats) ? 'checked' : '' }}>
                            <label class="form-check-label" for="format_{{ $format }}">
                                {{ strtoupper($format) }}
                            </label>
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                </form>
                <a href="{{ route('search') }}"><button class="btn btn-danger w-100 mt-1">Reset</button></a>
            </div>
            <div class="col-md-9">
                <div class="row g-4">
                    @foreach($products as $index => $product)
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.{{ 3 + $index * 1 }}0s">
                            <div class="product-img">
                                <img src="{{ asset($product->cover_image) }}" alt="{{ $product->title }}">
                                <div class="product-btns">
                                    @php
                                    $isPurchased = \App\Helpers\Various::isPurchased($product->id);
                                    $isAuthorProduct = \App\Helpers\Various::isAuthorProduct($product->id);
                                    @endphp
                                    @if(!$isPurchased && !$isAuthorProduct)
                                    <a href="javascript:void(0);" class="icon-btn cart add-to-cart" data-id="{{ $product->id }}">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                    </a>
                                    @endif
                                </div>
                                <ul class="post-box">
                                    @if($product->is_trending)
                                    <li>Hot</li>
                                    @endif
                                    @if($product->percentage && $product->percentage > 0)
                                    <li>-{{ $product->percentage }}%</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="product-content">
                                <div class="product-rating">
                                    <span class="star"><i class="fas fa-star"></i> ({{ \App\Helpers\Various::reviewCount($product->id) }})</span>
                                    <ul class="price-list">
                                        @if($product->percentage && $product->percentage > 0)
                                        <li><del>${{ number_format($product->price, 2) }}</del></li>
                                        <li>${{ number_format($product->price - ($product->price * $product->percentage / 100), 2) }}</li>
                                        @else
                                        <li>${{ number_format($product->price, 2) }}</li>
                                        @endif
                                    </ul>
                                </div>
                                <span class="product-author">
                                    <strong>By:</strong> {{ $product->author_name ?? $product->author->name ?? '' }}<br>
                                    <strong>Sales:</strong> {{ \App\Helpers\Various::salesCount($product->id) }}
                                </span>
                                <h2 class="product-title">
                                    <a href="{{ route('book.byId', $product->id) }}">{{ $product->title }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- Pagination --}}
            <div class="row justify-content-center wow animate__fadeInUp" data-wow-delay="0.95s">
                <div class="col-auto">
                    <div class="vs-pagination mt-55">
                        {{-- Previous Page Link --}}
                        @if ($products->onFirstPage())
                        <a class="pagi-btn disabled"><i class="fa-solid fa-arrow-left"></i></a>
                        @else
                        <a href="{{ $products->previousPageUrl() }}" class="pagi-btn"><i class="fa-solid fa-arrow-left"></i></a>
                        @endif

                        <ul>
                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                            <li><a href="{{ $url }}" class="active">{{ $page }}</a></li>
                            @elseif($page == 1 || $page == $products->lastPage() || ($page >= $products->currentPage() - 1 && $page <= $products->currentPage() + 1))
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @elseif($page == 2 || $page == $products->lastPage() - 1)
                                <li><span>...</span></li>
                                @endif
                                @endforeach
                        </ul>

                        {{-- Next Page Link --}}
                        @if ($products->hasMorePages())
                        <a href="{{ $products->nextPageUrl() }}" class="pagi-btn"><i class="fa-solid fa-arrow-right"></i></a>
                        @else
                        <a class="pagi-btn disabled"><i class="fa-solid fa-arrow-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</section>
@endif

<!--==============================
    Shop Area End
    ==============================-->
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