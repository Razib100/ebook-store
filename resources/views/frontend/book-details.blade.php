@extends('frontend.layouts.index')

@section('content')
<!-- Shop Details Area Start-->
<div class="vs-product-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-60">
            <div class="col-lg-6">
                @php
                $galleryImages = json_decode($product->product_gallery, true) ?? [];
                @endphp

                @php
                $galleryImages = json_decode($product->product_gallery, true);
                @endphp

                <div class="product-slide-row wow animate__fadeInUp" data-wow-delay="0.30s">
                    <div class="product-big-img">
                        <div class="img">
                            <img id="mainProductImage"
                                src="{{ asset($product->cover_image) }}"
                                data-cover="{{ asset($product->cover_image) }}"
                                alt="{{ $product->title }}">
                        </div>

                        @if(!empty($galleryImages))
                        <div id="galleryCarousel" style="margin-bottom: -63px;" class="carousel slide mt-3" data-bs-ride="carousel" data-bs-interval="false">
                            <div class="carousel-inner">

                                @foreach(array_chunk($galleryImages, 4) as $index => $chunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="product-gallery-thumbs d-flex gap-2 flex-wrap justify-content-center">
                                        @foreach($chunk as $image)
                                        <div class="thumb-img"
                                            style="width: 80px; height: 80px; overflow: hidden; border-radius: 8px; border: 1px solid #ddd;">
                                            <img src="{{ asset($image) }}"
                                                alt="Gallery Image"
                                                class="gallery-thumb"
                                                style="width: 100%; height: 100%; object-fit: cover; cursor: pointer;">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            {{-- Custom arrow area --}}
                            @if(count($galleryImages) > 3)
                            <div class="arraw-area mt-3">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <button class="icon-btn border-none gallery-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </button>
                                    <button class="icon-btn gallery-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>



            </div>
            <div class="col-lg-6">
                <div class="product-about wow animate__fadeInUp" data-wow-delay="0.30s">
                    <div class="product-rating">
                        <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                            <span></span>
                        </div>
                        <span class="product-rating__total">Reviews ({{ \App\Helpers\Various::reviewCount($product->id) }})</span>
                    </div>
                    <h2 class="product-title">{{ $product->title }}</h2>
                    <span class="product-author"><strong>By:</strong> {{ $product->author->name ?? 'Unknown Author' }}</span>
                    <p class="product-price">

                        @if(!empty($product->percentage) && $product->percentage > 0)
                        @php
                        $discountPrice = $product->price - ($product->price * $product->percentage / 100);
                        @endphp
                        ${{ number_format($discountPrice, 2) }}
                        <del>${{ number_format($product->price, 2) }}</del>
                        @else
                        ${{ number_format($product->price, 2) }}
                        @endif

                    </p>
                    <p class="text">
                        {{ \Illuminate\Support\Str::limit($product->short_description, 500, '...') }}
                    </p>
                    <span class="product-instock">
                        <p>Availability Format:</p>
                        <span>
                            {!! $product->pdf_file ? '<i class="fas fa-check-square"></i> PDF ' : '' !!}
                            {!! $product->epub_file ? '<i class="fas fa-check-square"></i> EPUB ' : '' !!}
                            {!! $product->mobi_file ? '<i class="fas fa-check-square"></i> MOBI' : '' !!}
                        </span>

                    </span>
                    <div class="actions">
                        @php
                        $isPurchased = \App\Helpers\Various::isPurchased($product->id);
                        $isAuthorProduct = \App\Helpers\Various::isAuthorProduct($product->id);
                        @endphp

                        @if(!$isPurchased && !$isAuthorProduct)
                        <a href="javascript:void(0);" class="vs-btn cart add-to-cart" data-id="{{ $product->id }}">
                            <i class="fa-solid fa-basket-shopping"></i> Add to Cart
                        </a>
                        @else
                        <button class="vs-btn cart" disabled style="background-color: #ccc; cursor: not-allowed;">
                            <i class="fa-solid fa-check"></i> Already Purchased
                        </button>
                        @endif
                    </div>
                    <div class="product_meta">
                        <h4 class="h5">Information:</h4>
                        <span class="posted_in">
                            <p>Category: </p>{{ $product->category->name ?? 'Unknown Author' }}
                        </span>
                        <span>
                            <p>Tags:</p> {{ implode(', ', $product->tags ?? []) }}
                        </span>
                        <span class="posted_in">
                            <p>Number Of Words: </p>{{ $product->no_of_words }}
                        </span>
                        <span class="posted_in">
                            <p>Number Of Images: </p>&nbsp;{{ $product->no_of_images }}
                        </span>
                        <span class="posted_in">
                            <p>Number Of Chapters: </p>&nbsp;{{ $product->no_of_chapters }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-description wow animate__fadeInUp" data-wow-delay="0.50s">
            <div class="product-description__tab">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews ({{ \App\Helpers\Various::reviewCount($product->id) }})</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="description" id='product-description'>
                        <p class="text">{!! $product->description !!}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="woocommerce-reviews">
                        <div class="vs-comments-wrap">
                            @if($reviews->count() > 0)
                            <ul class="comment-list">
                                @foreach($reviews as $review)
                                <li class="review vs-comment-item mb-4">
                                    <div class="vs-post-comment d-flex">
                                        <div class="comment-avater me-3 d-flex align-items-center justify-content-center"
                                            style="width:50px; height:50px; background:#f0f0f0; border-radius:50%;">
                                            <i class="fas fa-user" style="font-size:24px; color:#555;"></i>
                                        </div>


                                        <div class="comment-content">
                                            <div class="comment-content__header d-flex align-items-center justify-content-between mb-2">
                                                <div class="review-rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star" style="color: {{ $i <= $review->rating ? '#ffc107' : '#e4e5e9' }};"></i>
                                                        @endfor
                                                </div>
                                                <h4 class="name h4 mb-0">{{ $review->customer->first_name . ' ' . $review->customer->last_name ?? 'Anonymous' }}</h4>
                                            </div>

                                            <!-- <p class="text mb-2">{{ $review->comment }}</p> -->

                                            <span class="commented-on text-muted mt-3">
                                                Published {{ $review->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p class="text-muted">No reviews yet. Be the first to review this product!</p>
                            @endif
                        </div>

                        <div class="vs-comment-form review-form">
                            @if($canReview)
                            <div id="respond" class="comment-respond">
                                <div class="form-title">
                                    <h3 class="blog-inner-title">Add A Review</h3>
                                </div>
                                <form action="{{ route('review.store', ['id' => $product->id]) }}" method="POST">
                                    @csrf
                                    <div class="rating-select mb-3">
                                        <label class="d-block mb-2">Your Rating</label>
                                        <p class="stars d-flex gap-1" style="cursor:pointer;">
                                            <span>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star star-select" data-value="{{ $i }}" style="color:#ccc; font-size:20px;"></i>
                                                    @endfor
                                            </span>
                                        </p>
                                        <input type="hidden" name="rating" id="rating" value="0">
                                    </div>
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <!-- <textarea name="review" class="form-control" placeholder="Write your review..." required></textarea> -->
                                        </div>
                                        <div class="col-12 form-group mb-0">
                                            <button type="submit" class="vs-btn" {{ $isReview ? 'disabled' : '' }}>
                                                <span class="vs-btn__bar"></span>
                                                {{ $isReview ? 'Already Reviewed' : 'Submit' }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @else
                            <p class="text-muted mt-3">
                                ⚠️ Only verified customers who purchased this product can leave a review.
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Details Area End -->
<!-- Book Of The Month End -->
<section class="books-layout1 style2 space-bottom">
    <div class="container">
        <div class="title-area2 animation-style1 title-anime">
            <h2 class="sec-title title-anime__title">Related Book</h2>
            <div class="arraw-area">
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <button class="icon-btn border-none" data-slick-prev=".book-carousel">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                    <button class="icon-btn" data-slick-next=".book-carousel">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
        @if($relatedProducts->isEmpty())
        <div class="w-100 text-center my-5">
            <h2 class="text-muted">We don't have enough related books.</h2>
        </div>
        @else
        <div class="row vs-carousel g-4 book-carousel wow animate__fadeInUp" data-wow-delay="0.30s" data-slide-show="4" data-autoplay="true">
            @foreach($relatedProducts as $index => $product)
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
                            <span class="star"><i class="fas fa-star"></i> ({{ $product->rating ?? '4.5' }})</span>
                            <ul class="price-list">
                                @if($product->percentage && $product->percentage > 0)
                                <li><del>${{ number_format($product->price, 2) }}</del></li>
                                <li>${{ number_format($product->price - ($product->price * $product->percentage / 100), 2) }}</li>
                                @else
                                <li>${{ number_format($product->price, 2) }}</li>
                                @endif
                            </ul>
                        </div>
                        <span class="product-author"><strong>By:</strong> {{ $product->author_name ?? $product->author->name ?? '' }}</span>
                        <h2 class="product-title">
                            <a href="{{ route('book.byId', $product->id) }}">{{ $product->title }}</a>
                        </h2>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>
</section>
<!-- Book Of The Month End -->

@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mainImage = document.getElementById('mainProductImage');
        const coverImageSrc = mainImage.dataset.cover;

        document.querySelectorAll('.gallery-thumb').forEach(img => {
            img.addEventListener('click', function() {
                const newSrc = this.src;
                const currentSrc = mainImage.src;

                // Swap clicked image with main image
                mainImage.src = newSrc;
                this.src = currentSrc;

                // Highlight border of active thumb
                document.querySelectorAll('.gallery-thumb').forEach(t => t.style.border = '1px solid #ddd');
                this.style.border = '2px solid #007bff';
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-select');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                ratingInput.value = value;

                stars.forEach(s => s.style.color = '#ccc');
                for (let i = 0; i < value; i++) {
                    stars[i].style.color = '#FFD700';
                }
            });
        });
    });
</script>
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