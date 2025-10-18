<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>The Largest Bookstore Service Html template - Home</title>
    <meta name="author" content="vecuro">
    <meta name="description" content="The Largest Bookstore Service Html template">
    <meta name="keywords" content="The Largest Bookstore Service Html template">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('frontend/assets/img/favicons/favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('frontend/assets/img/favicons/favicon.png') }}" type="image/png" sizes="32x32">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/img/favicons/favicon.png') }}">

    <!--==============================
      Google Fonts
  ============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!--==============================
      All CSS File
  ============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.min.css') }}">
    <!-- nice-select -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.min.css') }}">
    <!-- animate js -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <!-- nouislider js -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nouislider.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
</head>


<body>
    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
    <!--********************************
   		Code Start From Here 
	******************************** -->
    <!--==============================
	Preloader
	==============================-->
    <!-- Preloader -->
    <div class="preloader">
        <button class="vs-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner">
            <img src="{{ asset('frontend/assets/img/dark-logo.svg') }}" alt="logo">
            <span class="loader"></span>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to Top">
        <span class="progress-circle">
            <svg viewBox="0 0 100 100">
                <circle class="bg" cx="50" cy="50" r="40"></circle>
                <circle class="progress" cx="50" cy="50" r="40"></circle>
            </svg>
            <span class="progress-percentage" id="progressPercentage">0%</span>
        </span>
    </button>

    <!--==============================
    	Mobile Menu
  	============================== -->
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            <div class="mobile-logo">
                <a href="index.html">
                    <img src="{{ asset('frontend/assets/img/logo.svg') }}" alt="ebukz" class="logo">
                </a>
                <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            </div>
            <div class="vs-mobile-menu">
                <ul>
                    <li class="menu-item-has-children">
                        <a href="index.html">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home 1</a></li>
                            <li><a href="index-2.html">Home 2</a></li>
                            <li><a href="index-3.html">Home 3</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="shop.html">Shop</a>
                        <ul class="sub-menu">
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                            <li><a href="shop-details.html">Shop Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="about.html">Vendor</a>
                        <ul class="sub-menu">
                            <li><a href="vendor.html">Vendor</a></li>
                            <li><a href="vendor-details.html">Vendor Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children mega-menu-wrap">
                        <a href="#">Pages</a>
                        <ul class="mega-menu">
                            <li><a href="shop.html">Page List 1</a>
                                <ul>
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Page List 2</a>
                                <ul>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                    <li><a href="blog-sidebar-2.html">Blog Sidebar 2</a></li>
                                    <li><a href="Blog-Standard.html">Blog Standard</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Page List 3</a>
                                <ul>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                    <li><a href="shop-details.html">Shop Details</a></li>
                                    <li><a href="404.html">Error Page</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Page List 4</a>
                                <ul>
                                    <li><a href="wishlist.html">wishlist</a></li>
                                    <li><a href="checkout.html">checkout</a></li>
                                    <li><a href="author.html">All Authors</a></li>
                                    <li><a href="author-details.html">Author Details</a></li>
                                    <li><a href="vendor.html">Vendor</a></li>
                                    <li><a href="vendor-details.html">Vendor Details</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="blog.html">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                            <li><a href="blog-sidebar-2.html">Blog Sidebar 2</a></li>
                            <li><a href="Blog-Standard.html">Blog Standard</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--==============================
    Popup Search Box
    ============================== -->
    <div class="popup-search-box d-none d-lg-block  ">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" class="border-theme" placeholder="What are you looking for">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <!--==============================
        Header Area
    ==============================-->
    <header class="vs-header header-layout1 style2">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-md-between justify-content-center align-items-center">
                    <div class="col-auto">
                        <div class="header-links d-md-inline d-none">
                            <ul>
                                <li><i class="fa-solid fa-truck-fast"></i>Fastest Delivery In Your City</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-right">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><span class="globe-icon"><i class="fal fa-globe"></i></span>English</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Arabic</a></li>
                                    <li><a class="dropdown-item" href="#">German</a></li>
                                    <li><a class="dropdown-item" href="#">French</a></li>
                                    <li><a class="dropdown-item" href="#">Italian</a></li>
                                    <li><a class="dropdown-item" href="#">Slobac</a></li>
                                    <li><a class="dropdown-item" href="#">Russian</a></li>
                                    <li><a class="dropdown-item" href="#">Spanish</a></li>
                                </ul>
                            </div>
                            <div class="header-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                            <div class="user-login">
                                <a href="#"><i class="fa-solid fa-user"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row justify-content-sm-between justify-content-center align-items-center gx-sm-0">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="index.html"><img src="{{ asset('frontend/assets/img/dark-logo.svg') }}" alt="Ebukz" class="logo"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-inner">
                            <form class="header-search">
                                <button class="searchBoxTggler" aria-label="search-button">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <div class="d-flex align-items-center">
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                                            Categories
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                    <input type="text" placeholder="Search yourProduct’s.....">
                                </div>
                            </form>
                            <div class="header-buttons">
                                <a href="wishlist.html" class="vs-icon wishlist"><i class="fal fa-heart"></i></a>
                                <div class="header-info">
                                    <div class="header-info_icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <span class="header-info_label">Call Us 24/7</span>
                                        <div class="header-info_link"><a href="tel:+1234567890">(00) 3349 0491 887</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper header-bottom">
            <div class="sticky-active">
                <div class="container">
                    <div class="menu-top">
                        <div class="row justify-content-between align-items-center gx-sm-0">
                            <div class="col-xl-auto">
                                <div class="menu-inner">
                                    <div class="header-category">
                                        <button class="category-toggler"><i class="fa-solid fa-bars-sort"></i>Categories</button>
                                        <div class="vs-box-nav">
                                            <ul>
                                                <li><a href="shop.html"><img src="{{ asset('frontend/assets/img/icons/categori-i-1.svg') }}" alt="icon">Romance</a></li>
                                                <li><a href="shop.html"><img src="{{ asset('frontend/assets/img/icons/categori-i-2.svg') }}" alt="icon">Thriller</a></li>
                                                <li><a href="shop.html"><img src="{{ asset('frontend/assets/img/icons/categori-i-3.svg') }}" alt="icon">Fantasy</a></li>
                                                <li><a href="shop.html"><img src="{{ asset('frontend/assets/img/icons/categori-i-4.svg') }}" alt="icon">Since Fiction</a></li>
                                                <li><a href="shop.html"><img src="{{ asset('frontend/assets/img/icons/categori-i-5.svg') }}" alt="icon">Since</a></li>
                                                <li><a href="shop.html"><img src="{{ asset('frontend/assets/img/icons/categori-i-6.svg') }}" alt="icon">Adventure</a></li>
                                                <li><a href="shop.html"><img src="{{ asset('frontend/assets/img/icons/categori-i-7.svg') }}" alt="icon">Kids</a></li>
                                                <li><a href="shop.html"><img src="{{ asset('frontend/assets/img/icons/categori-i-8.svg') }}" alt="icon">Cartoon & Story</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                    <div class="header-logo">
                                        <a href="/"><img src="{{ asset('frontend/assets/img/dark-logo.svg') }}" alt="Ebukz" class="logo"></a>
                                    </div>
                                    <div class="menu-area">
                                        <nav class="main-menu menu-style1 d-none d-lg-block">
                                            <ul>
                                                <li class="menu-item-has-children">
                                                    <a href="index.html">Home</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="index.html">Home 1</a></li>
                                                        <li><a href="index-2.html">Home 2</a></li>
                                                        <li><a href="index-3.html">Home 3</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="shop.html">Shop</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="shop.html">Shop</a></li>
                                                        <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                        <li><a href="shop-details.html">Shop Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="vendor.html">Vendor</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="vendor.html">Vendor</a></li>
                                                        <li><a href="vendor-details.html">Vendor Details</a></li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children mega-menu-wrap">
                                                    <a href="#">Pages</a>
                                                    <ul class="mega-menu">
                                                        <li><a href="shop.html">Page List 1</a>
                                                            <ul>
                                                                <li><a href="index.html">Home 1</a></li>
                                                                <li><a href="index-2.html">Home 2</a></li>
                                                                <li><a href="index-3.html">Home 3</a></li>
                                                                <li><a href="about.html">About</a></li>
                                                                <li><a href="contact.html">Contact</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Page List 2</a>
                                                            <ul>
                                                                <li><a href="blog.html">Blog</a></li>
                                                                <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                                                <li><a href="blog-sidebar-2.html">Blog Sidebar 2</a></li>
                                                                <li><a href="Blog-Standard.html">Blog Standard</a></li>
                                                                <li><a href="blog-details.html">Blog Details</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Page List 3</a>
                                                            <ul>
                                                                <li><a href="cart.html">Cart</a></li>
                                                                <li><a href="shop.html">Shop</a></li>
                                                                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                                <li><a href="shop-details.html">Shop Details</a></li>
                                                                <li><a href="404.html">Error Page</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="#">Page List 4</a>
                                                            <ul>
                                                                <li><a href="wishlist.html">wishlist</a></li>
                                                                <li><a href="checkout.html">checkout</a></li>
                                                                <li><a href="author.html">All Authors</a></li>
                                                                <li><a href="author-details.html">Author Details</a></li>
                                                                <li><a href="vendor.html">Vendor</a></li>
                                                                <li><a href="vendor-details.html">Vendor Details</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="menu-item-has-children">
                                                    <a href="blog.html">Blog</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="blog-sidebar.html">Blog Sidebar</a></li>
                                                        <li><a href="blog-sidebar-2.html">Blog Sidebar 2</a></li>
                                                        <li><a href="Blog-Standard.html">Blog Standard</a></li>
                                                        <li><a href="blog-details.html">Blog Details</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="contact.html">Contact</a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto d-xl-block d-none">
                                <div class="header-cart">
                                    <a href="cart.html" class="vs-icon has-badge"><i class="fa-solid fa-basket-shopping"></i><span class="badge">0</span></a>
                                    <div class="woocommerce widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <ul class="cart_list">
                                                <li class="mini_cart_item">
                                                    <a href="#" class="remove"><i class="far fa-times"></i></a>
                                                    <a href="shop-details.html" class="img"><img src="{{ asset('frontend/assets/img/cart/cat-img-1.jpg') }}" alt="Cart Image"></a>
                                                    <a href="shop-details.html" class="product-title">Smart Watch</a>
                                                    <span class="amount">$99.00</span>
                                                    <div class="quantity">
                                                        <button class="quantity-minus qut-btn"><i class="far fa-minus"></i></button>
                                                        <input type="number" class="qty-input" value="1" min="1" max="99">
                                                        <button class="quantity-plus qut-btn"><i class="far fa-plus"></i></button>
                                                    </div>
                                                    <div class="subtotal">
                                                        <span>Subtotal:</span>
                                                        <span class="amount">$99.00</span>
                                                    </div>
                                                </li>
                                                <li class="mini_cart_item">
                                                    <a href="#" class="remove"><i class="far fa-times"></i></a>
                                                    <a href="shop-details.html" class="img"><img src="{{ asset('frontend/assets/img/cart/cat-img-2.jpg') }}" alt="Cart Image"></a>
                                                    <a href="shop-details.html" class="product-title">Boss Chair</a>
                                                    <span class="amount">$80.00</span>
                                                    <div class="quantity">
                                                        <button class="quantity-minus qut-btn"><i class="far fa-minus"></i></button>
                                                        <input type="number" class="qty-input" value="2" min="1" max="99">
                                                        <button class="quantity-plus qut-btn"><i class="far fa-plus"></i></button>
                                                    </div>
                                                    <div class="subtotal">
                                                        <span>Subtotal:</span>
                                                        <span class="amount">$160.00</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <p class="total">
                                                <strong>Subtotal:</strong>
                                                <span class="amount">$259.00</span>
                                            </p>
                                            <p class="buttons">
                                                <a href="cart.html" class="vs-btn">View cart</a>
                                                <a href="checkout.html" class="vs-btn checkout">Checkout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--==============================
  Hero Area
  ==============================-->
    <section class="hero-layout1" data-wow-delay="0.25s" aria-hidden="true">
        <div class="hero-item" data-bg-src="{{ asset('frontend/assets/img/bg/hero-bg1.jpg') }}">
            <div class="container position-relative z-index">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 position-relative">
                        <div class="hero-content">
                            <h1 class="hero-title wow animate__fadeInUp" data-wow-delay="0.50s">The Most Biggest <span class="title-highlight">Bookstore</span> in the world</h1>
                            <p class="hero-text wow animate__fadeInUp" data-wow-delay="0.75s">We deliver books all over the world 10,000+ books in stock.</p>
                            <a class="vs-btn wow animate__flipInX" data-wow-delay="0.95s" href="shop.html">Explore More</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-img">
                            <img src="{{ asset('frontend/assets/img/hero/hero-img-1-1.png') }}" alt="hero image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="shape-mockup element1 z-index1  d-xxl-block d-none" data-wow-delay="0.80s" style="right: 0px; top: -10px;"><img src="assets/img/shapes/hero-shape2.svg" alt="Hero shape"></span>
        <span class="shape-mockup element2 z-index1  d-xxl-block d-none" data-wow-delay="0.80s" style="left: 0px; bottom: -10px;"><img src="assets/img/shapes/hero-shape3.svg" alt="Hero shape"></span>
        <span class="shape-mockup z-index1 wow animate__fadeInLeft d-xxl-block d-none" data-wow-delay="0.80s" style="left: 0px; top: 0px;"><img src="assets/img/shapes/hero-shape1.svg" alt="Hero shape"></span>
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
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.30s">
                        <div class="product-img">
                            <img src="{{ asset('frontend/assets/img/product/product-img-1-1.jpg') }}" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Rat Phnory Mttke</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.40s">
                        <div class="product-img">
                            <img src="{{ asset('frontend/assets/img/product/product-img-1-2.jpg') }}" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> H Abdul</span>
                            <h2 class="product-title"> <a href="shop.html">Ali Tofail Tu</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.50s">
                        <div class="product-img">
                            <img src="{{ asset('frontend/assets/img/product/product-img-1-3.jpg') }}" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> D Bellingham</span>
                            <h2 class="product-title"><a href="shop.html">Green Journy</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.60s">
                        <div class="product-img">
                            <img src="{{ asset('frontend/assets/img/product/product-img-1-4.jpg') }}" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Alex Jhon</span>
                            <h2 class="product-title"><a href="shop.html">Fefcenting Pesentin</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.70s">
                        <div class="product-img">
                            <img src="{{ asset('frontend/assets/img/product/product-img-1-5.jpg') }}" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Nicola joi</span>
                            <h2 class="product-title"><a href="shop.html">Tevely Entiamile</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.80s">
                        <div class="product-img">
                            <img src="{{ asset('frontend/assets/img/product/product-img-1-6.jpg') }}" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Gmerll Femed</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending Product End -->
    <!-- Offer section Start -->
    <div class="offer-layout1 space-bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-6 col-lg-6">
                    <div class="offer-style1 wow animate__fadeInLeft" data-wow-delay="0.30s" data-bg-src="assets/img/bg/offer-bg1.jpg">
                        <div class="offer-img">
                            <img src="{{ asset('frontend/assets/img/offer/offer-img1.png') }}" alt="offer image">
                        </div>
                        <div class="offer-content">
                            <div class="star-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <h2 class="offer-title">E Emeher Mme</h2>
                            <p class="offer-price">Only From <span>$85.00</span></p>
                            <a class="vs-btn" href="shop.html">Shop Now</a>
                        </div>
                        <span class="shape-mockup element1 z-index1  d-xxl-block d-none" data-wow-delay="0.80s" style="right: 0px; bottom: -5px;"><img src="assets/img/shapes/offer-shape1.png" alt="offer shape"></span>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="offer-style1 white-style wow animate__fadeInRight" data-wow-delay="0.30s" data-bg-src="assets/img/bg/offer-bg2.jpg">
                        <div class="offer-img">
                            <img src="{{ asset('frontend/assets/img/offer/offer-img1.png') }}" alt="offer image">
                        </div>
                        <div class="offer-content">
                            <div class="star-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <h2 class="offer-title">Viving Moneme</h2>
                            <p class="offer-price">Only From <span>$85.00</span></p>
                            <a class="vs-btn" href="shop.html">Shop Now</a>
                        </div>
                        <span class="shape-mockup element1 z-index1  d-xxl-block d-none" data-wow-delay="0.80s" style="right: 0px; bottom: -5px;"><img src="assets/img/shapes/offer-shape2.png" alt="offer shape"></span>
                    </div>
                </div>
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
                <div class="col-xl-2 col-lg-3 col-md-4 col-6 ">
                    <div class="categorie-style1 active wow animate__fadeInUp" data-filter="*" data-wow-delay="0.30s">
                        <img src="{{ asset('frontend/assets/img/categoris/catigori-1-1.png') }}" alt="categorie image">

                        <h4 class="categorie-title">Romance</h4>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-filter=".thriller">
                    <div class="categorie-style1  wow animate__fadeInUp" data-wow-delay="0.40s">
                        <img src="assets/img/categoris/catigori-1-2.png" alt="categorie image">
                        <h4 class="categorie-title">Thriller</h4>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-filter=".fantasy">
                    <div class="categorie-style1 wow animate__fadeInUp" data-wow-delay="0.50s">
                        <img src="assets/img/categoris/catigori-1-3.png" alt="categorie image">
                        <h4 class="categorie-title">fantasy</h4>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-filter=".since-fiction">
                    <div class="categorie-style1 wow animate__fadeInUp" data-wow-delay="0.60s">
                        <img src="assets/img/categoris/catigori-1-4.png" alt="categorie image">
                        <h4 class="categorie-title">Since Fiction</h4>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-filter=".since">
                    <div class="categorie-style1 wow animate__fadeInUp" data-wow-delay="0.70s">
                        <img src="assets/img/categoris/catigori-1-5.png" alt="categorie image">
                        <h4 class="categorie-title">Since</h4>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6" data-filter=".adventure">
                    <div class="categorie-style1 wow animate__fadeInUp" data-wow-delay="0.80s">
                        <img src="assets/img/categoris/catigori-1-6.png" alt="categorie image">
                        <h4 class="categorie-title">Adventure</h4>
                    </div>
                </div>
            </div>
            <div class="row gy-30 mb-40 filter-active">
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item fantasy adventure">
                    <div class="product-style1 style2 wow animate__fadeInUp" data-wow-delay="0.30s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-2-1.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="star-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Feel The Bloosme Session</a></h2>
                            <ul class="price-list">
                                <li><del>$124</del></li>
                                <li>$100</li>
                            </ul>
                            <div class="product-btn">
                                <a class="vs-btn" href="cart.html">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item thriller since-fiction adventure">
                    <div class="product-style1 style2 wow animate__fadeInUp" data-wow-delay="0.40s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-2-2.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="star-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">World Adventure Trekking</a></h2>
                            <ul class="price-list">
                                <li><del>$124</del></li>
                                <li>$100</li>
                            </ul>
                            <div class="product-btn">
                                <a class="vs-btn" href="cart.html">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item since-fiction fantasy">
                    <div class="product-style1 style2 wow animate__fadeInUp" data-wow-delay="0.50s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-2-3.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="star-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="product-author"><strong>By:</strong>Keep Clam Mountain</span>
                            <h2 class="product-title"><a href="shop.html">Feel The Bloosme Session</a></h2>
                            <ul class="price-list">
                                <li><del>$124</del></li>
                                <li>$100</li>
                            </ul>
                            <div class="product-btn">
                                <a class="vs-btn" href="cart.html">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item adventure since-fiction">
                    <div class="product-style1 style2 wow animate__fadeInUp" data-wow-delay="0.60s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-2-4.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="star-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="product-author"><strong>By:</strong>Learn From Nature</span>
                            <h2 class="product-title"><a href="shop.html">Feel The Bloosme Session</a></h2>
                            <ul class="price-list">
                                <li><del>$124</del></li>
                                <li>$100</li>
                            </ul>
                            <div class="product-btn">
                                <a class="vs-btn" href="cart.html">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item thriller since-fiction since fantasy">
                    <div class="product-style1 style2 wow animate__fadeInUp" data-wow-delay="0.70s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-2-5.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="star-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="product-author"><strong>By:</strong>Rat Phnory Mttke Srial</span>
                            <h2 class="product-title"><a href="shop.html">Feel The Bloosme Session</a></h2>
                            <ul class="price-list">
                                <li><del>$124</del></li>
                                <li>$100</li>
                            </ul>
                            <div class="product-btn">
                                <a class="vs-btn" href="cart.html">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 filter-item since since-fiction">
                    <div class="product-style1 style2 wow animate__fadeInUp" data-wow-delay="0.80s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-2-6.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="star-rating">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <span class="product-author"><strong>By:</strong>Negated Story Life</span>
                            <h2 class="product-title"><a href="shop.html">Feel The Bloosme Session</a></h2>
                            <ul class="price-list">
                                <li><del>$125</del></li>
                                <li>$100</li>
                            </ul>
                            <div class="product-btn">
                                <a class="vs-btn" href="cart.html">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="vs-btn wow animate__flipInX" data-wow-delay="0.40s" href="shop.html">View More</a>
            </div>
        </div>
    </section>
    <!-- Top Categories End -->
    <!-- Best selling start -->
    <section class="selling-layout1 space" data-bg-src="assets/img/bg/selling-bg.jpg">
        <div class="container">
            <div class="row g-4 gx-40 align-items-center">
                <div class="col-xl-5">
                    <div class="selling-content">
                        <h2 class="selling-title wow animate__fadeInUp" data-wow-delay="0.20s">Best Seller Author Of The Month</h2>
                        <h4 class="author-name wow animate__fadeInUp" data-wow-delay="0.30s">Joseph Martin</h4>
                        <span class="published wow animate__fadeInUp" data-wow-delay="0.40s">30+ Published Book</span>
                        <p class="selling-text wow animate__fadeInUp" data-wow-delay="0.50s">Lorem ipsum dolor a amet, consectetur adipiscing elit, eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut eim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        <a class="vs-btn wow animate__flipInX" data-wow-delay="0.60s" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="selling-img-tag wow animate__fadeInUp" data-wow-delay="0.30s">
                        <div class="wow animate__fadeInDownBig" data-wow-delay="0.30s">
                            <div class="tag" data-wow-delay="0.30s">
                                <img src="assets/img/selling/selling-icon.png" alt="selling icon">
                                <h4 class="tag-title">no.1 Best Seller Of The Month</h4>
                            </div>
                        </div>
                        <img src="assets/img/selling/selling-img.jpg" class="w-100" alt="selling images">
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="selling-books">
                        <div class="book-item wow animate__fadeInDown" data-wow-delay="0.30s">
                            <img src="assets/img/selling/book-img1.jpg" alt="book image">
                        </div>
                        <div class="book-item wow animate__fadeInDown" data-wow-delay="0.40s">
                            <img src="assets/img/selling/book-img2.jpg" alt="book image">
                        </div>
                        <div class="book-item wow animate__fadeInUp" data-wow-delay="0.50s">
                            <img src="assets/img/selling/book-img3.jpg" alt="book image">
                        </div>
                        <div class="book-item wow animate__fadeInUp" data-wow-delay="0.60s">
                            <img src="assets/img/selling/book-img4.jpg" alt="book image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Best selling End -->
    <!-- Romance Product Start -->
    <section class="romance-layout1 space-top">
        <div class="container space-bottom position-relative">
            <div class="title-area2 animation-style1 title-anime">
                <h2 class="sec-title title-anime__title">Best Selling Romance Books</h2>
                <a class="vs-btn wow animate__flipInX" data-wow-delay="0.70s" href="shop.html">View More</a>
            </div>
            <div class="row g-4">
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.30s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-3-1.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Rivetmane 10An</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.40s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-3-2.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> H Abdul</span>
                            <h2 class="product-title"> <a href="shop.html">Love Nature</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.50s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-3-3.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> D Bellingham</span>
                            <h2 class="product-title"><a href="shop.html">Love Story</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.60s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-3-4.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Alex Jhon</span>
                            <h2 class="product-title"><a href="shop.html">Stotc Stoite Ust...</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.70s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-3-5.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Nicola joi</span>
                            <h2 class="product-title"><a href="shop.html">Cook Design Psvter</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.80s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-3-6.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Cover Design</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <span class="border-line"></span>
        </div>
    </section>
    <!-- Romance Product End -->
    <!-- Kids Product Start -->
    <section class="Kids-layout1 space">
        <div class="container">
            <div class="title-area2 animation-style1 title-anime">
                <h2 class="sec-title title-anime__title">Best Selling Kids Books</h2>
                <a class="vs-btn wow animate__flipInX" data-wow-delay="0.50s" href="shop.html">View More</a>
            </div>
            <div class="row g-4">
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.30s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-4-1.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Aelon Nacedile</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.40s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-4-2.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> H Abdul</span>
                            <h2 class="product-title"> <a href="shop.html">Parer Book</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.50s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-4-3.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> D Bellingham</span>
                            <h2 class="product-title"><a href="shop.html">Every Thought Sed</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.60s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-4-4.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Alex Jhon</span>
                            <h2 class="product-title"><a href="shop.html">A Sunny Day</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.70s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-4-5.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Nicola joi</span>
                            <h2 class="product-title"><a href="shop.html">Present Trop Ical</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.80s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-4-6.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Whispers of Wild</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kids Product End -->
    <!-- Book Of The Month End -->
    <section class="books-layout1 space" data-bg-src="assets/img/bg/section-bg1.jpg">
        <div class="container">
            <div class="title-area text-center animation-style1 title-anime">
                <h2 class="sec-title title-anime__title">Book Of The Month</h2>
            </div>
            <div class="row g-4">
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.30s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-5-1.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">The Muke Guy</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.40s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-5-2.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> H Abdul</span>
                            <h2 class="product-title"> <a href="shop.html">Levtimeline</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.50s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-5-3.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> D Bellingham</span>
                            <h2 class="product-title"><a href="shop.html">Mick Weive Mockchapu</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.60s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-5-4.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Alex Jhon</span>
                            <h2 class="product-title"><a href="shop.html">Fuarcnusk Preentine</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.70s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-5-5.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Nicola joi</span>
                            <h2 class="product-title"><a href="shop.html">L Art Du Subtiliste</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.80s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-5-6.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Vqirk Teur Mocgkcup</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.90s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-5-7.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Nicola joi</span>
                            <h2 class="product-title"><a href="shop.html">Hd Pry Balir Ptonnrnle</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class="product-style1 wow animate__fadeInUp" data-wow-delay="0.95s">
                        <div class="product-img">
                            <img src="assets/img/product/product-img-5-8.jpg" alt="product image">
                            <div class="product-btns">
                                <a href="wishlist.html" class="icon-btn wishlist">
                                    <i class="far fa-heart"></i>
                                </a>
                                <a href="cart.html" class="icon-btn cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                            <ul class="post-box">
                                <li>Hot</li>
                                <li>-30%</li>
                            </ul>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="star"><i class="fas fa-star"></i> (4.5)</span>
                                <ul class="price-list">
                                    <li><del>$39.99</del></li>
                                    <li>$30.00</li>
                                </ul>
                            </div>
                            <span class="product-author"><strong>By:</strong> Fahim Al Bashar</span>
                            <h2 class="product-title"><a href="shop.html">Beuto minimal Cork</a></h2>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a class="vs-btn mt-10 wow animate__flipInX" data-wow-delay="0.40s" href="shop.html">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Book Of The Month End -->
    <!-- Testimonial Area  -->
    <section class="vs-testi__layout1 space">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-5">
                    <div class="banner-img">
                        <img src="assets/img/others/banner1.jpg" alt="banner image">
                        <div class="banner-content">
                            <span class="sub-title">Best offer</span>
                            <h2 class="banner-title">Save Up to $15</h2>
                            <a class="vs-btn" href="shop.html">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="vs-testi__inner">
                        <div class="title-area text-left wow animate__fadeInUp title-anime animation-style5" data-wow-delay="0.25s">
                            <span class="sec-subtitle  left-shape justify-content-center title-anime__title">Testimonials</span>
                            <h2 class="sec-title title-anime__title">What Our Clint’s Feedback And review</h2>
                            <p class="sec-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor inc ididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="vs-testi__items wow animate__fadeInUp" data-wow-delay="0.35s">
                            <div class="vs-carousel testi-slider" data-autoplay="true" data-fade="true">
                                <div class="vs-testi__style1">
                                    <span class="vs-testi__icon"><img src="assets/img/icons/quote-icon.svg" alt="icon"></span>
                                    <div class="vs-testi__top">
                                        <div class="vs-testi__image">
                                            <img class="img1" src="assets/img/testimonial/testi-1-1.jpg" alt="testimonials">
                                        </div>
                                        <div class="vs-testi__author">
                                            <div class="star-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-regular fa-star"></i>
                                            </div>
                                            <h3 class="vs-testi__title">rodja hartmann</h3>
                                            <span class="vs-testi__desi">Designer, Vecurosoft</span>
                                        </div>
                                    </div>
                                    <div class="vs-testi__content">
                                        <p class="vs-testi__text">
                                            <span class="text-highlight"><img class="icon" src="assets/img/testimonial/testi-icon1.png" alt="icon"> Lorem ipsum dolor sit a met!</span>
                                            “ When you work with Los Angeles House Cleaners Refal Agen cleaning room breathe easy because your
                                            home will soon When yowork with Angeles House Cleaners Referal Agency cleaning breathe ”
                                        </p>
                                    </div>
                                </div>
                                <div class="vs-testi__style1">
                                    <span class="vs-testi__icon"><img src="assets/img/icons/quote-icon.svg" alt="icon"></span>
                                    <div class="vs-testi__top">
                                        <div class="vs-testi__image">
                                            <img class="img1" src="assets/img/testimonial/testi-1-1.jpg" alt="testimonials">
                                        </div>
                                        <div class="vs-testi__author">
                                            <div class="star-rating">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h3 class="vs-testi__title">alaxander pall</h3>
                                            <span class="vs-testi__desi">Designer, Vecurosoft</span>
                                        </div>
                                    </div>
                                    <div class="vs-testi__content">
                                        <p class="vs-testi__text">
                                            <span class="text-highlight"><img class="icon" src="assets/img/testimonial/testi-icon1.png" alt="icon"> Lorem ipsum dolor sit a met!</span>
                                            “ When you work with Los Angeles House Cleaners Refal Agen cleaning room breathe easy because your
                                            home will soon When yowork with Angeles House Cleaners Referal Agency cleaning breathe ”
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="custom-arraw wow animate__fadeInUp" data-wow-delay="0.45s">
                            <div class="icon-arraw slick-prev" data-slick-prev=".testi-slider">
                                <button class="icon-btn">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                            <div class="icon-arraw slick-next" data-slick-next=".testi-slider">
                                <button class="icon-btn">
                                    <i class="fa-regular fa-arrow-left"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End  -->
    <!-- Blog Area Start  -->
    <section class="custom-space-bottom">
        <div class="container">
            <div class="title-area2 animation-style1 title-anime">
                <h2 class="sec-title title-anime__title">Blog And News</h2>
                <a class="vs-btn wow animate__flipInX" data-wow-delay="0.50s" href="blog.html">View More</a>
            </div>
            <div class="row vs-carousel blog-carousel wow animate__fadeInUp" data-wow-delay="0.25s" data-arrows="true" data-autoplay="true" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" data-center-mode="true">
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <a href="blog-details.html"><img class="blog-img__img" src="assets/img/blog/blog-img-1-1.jpg" alt="Blog Image"></a>
                            <div class="blog-date">
                                <span class="day"><strong class="month">15</strong>may</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fa-solid fa-user"></i>By Admin</a>
                                <a href="blog.html"><i class="fa-solid fa-comments"></i>2 Comments</a>
                            </div>
                            <h2 class="blog-title">
                                <a href="blog-details.html">Lorem ipsum dolor sit amet consectetur.</a>
                            </h2>
                            <div class="btn-area">
                                <a class="vs-btn" href="blog-details.html">Read More<i class="fa-regular fa-arrow-right"></i></a>
                                <div class="social-media">
                                    <div class="member-links">
                                        <a href="#" tabindex="-1"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" tabindex="-1"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-instagram"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-behance"></i></a>
                                    </div>
                                    <span class="icon-btn"><i class="fas fa-share-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <a href="blog-details.html"><img class="blog-img__img" src="assets/img/blog/blog-img-1-2.jpg" alt="Blog Image"></a>
                            <div class="blog-date">
                                <span class="day"><strong class="month">16</strong>may</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fa-solid fa-user"></i>By Admin</a>
                                <a href="blog.html"><i class="fa-solid fa-comments"></i>2 Comments</a>
                            </div>
                            <h2 class="blog-title">
                                <a href="blog-details.html">Lorem ipsum dolor sit amet consectetur.</a>
                            </h2>
                            <div class="btn-area">
                                <a class="vs-btn" href="blog-details.html">Read More<i class="fa-regular fa-arrow-right"></i></a>
                                <div class="social-media">
                                    <div class="member-links">
                                        <a href="#" tabindex="-1"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" tabindex="-1"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-instagram"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-behance"></i></a>
                                    </div>
                                    <span class="icon-btn"><i class="fas fa-share-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <a href="blog-details.html"><img class="blog-img__img" src="assets/img/blog/blog-img-1-3.jpg" alt="Blog Image"></a>
                            <div class="blog-date">
                                <span class="day"><strong class="month">16</strong>may</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fa-solid fa-user"></i>By Admin</a>
                                <a href="blog.html"><i class="fa-solid fa-comments"></i>2 Comments</a>
                            </div>
                            <h2 class="blog-title">
                                <a href="blog-details.html">Lorem ipsum dolor sit amet consectetur.</a>
                            </h2>
                            <div class="btn-area">
                                <a class="vs-btn" href="blog-details.html">Read More<i class="fa-regular fa-arrow-right"></i></a>
                                <div class="social-media">
                                    <div class="member-links">
                                        <a href="#" tabindex="-1"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" tabindex="-1"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-instagram"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-behance"></i></a>
                                    </div>
                                    <span class="icon-btn"><i class="fas fa-share-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <a href="blog-details.html"><img class="blog-img__img" src="assets/img/blog/blog-img-1-4.jpg" alt="Blog Image"></a>
                            <div class="blog-date">
                                <span class="day"><strong class="month">16</strong>may</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fa-solid fa-user"></i>By Admin</a>
                                <a href="blog.html"><i class="fa-solid fa-comments"></i>2 Comments</a>
                            </div>
                            <h2 class="blog-title">
                                <a href="blog-details.html">Lorem ipsum dolor sit amet consectetur.</a>
                            </h2>
                            <div class="btn-area">
                                <a class="vs-btn" href="blog-details.html">Read More<i class="fa-regular fa-arrow-right"></i></a>
                                <div class="social-media">
                                    <div class="member-links">
                                        <a href="#" tabindex="-1"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" tabindex="-1"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-instagram"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-behance"></i></a>
                                    </div>
                                    <span class="icon-btn"><i class="fas fa-share-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="vs-blog blog-style1">
                        <div class="blog-img">
                            <a href="blog-details.html"><img class="blog-img__img" src="assets/img/blog/blog-img-1-5.jpg" alt="Blog Image"></a>
                            <div class="blog-date">
                                <span class="day"><strong class="month">16</strong>may</span>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="fa-solid fa-user"></i>By Admin</a>
                                <a href="blog.html"><i class="fa-solid fa-comments"></i>2 Comments</a>
                            </div>
                            <h2 class="blog-title">
                                <a href="blog-details.html">Lorem ipsum dolor sit amet consectetur.</a>
                            </h2>
                            <div class="btn-area">
                                <a class="vs-btn" href="blog-details.html">Read More<i class="fa-regular fa-arrow-right"></i></a>
                                <div class="social-media">
                                    <div class="member-links">
                                        <a href="#" tabindex="-1"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" tabindex="-1"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-instagram"></i></a>
                                        <a href="#" tabindex="-1"><i class="fab fa-behance"></i></a>
                                    </div>
                                    <span class="icon-btn"><i class="fas fa-share-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Area End  -->
    <!--==============================
	  Footer Area
	============================== -->
    <footer class="footer-layout1 style2 z-index-common">
        <!-- Cta Area -->
        <div class="container">
            <div class="cta-layout1 style2 z-index-common blog-title">
                <div class="row gx-60 align-items-center">
                    <div class="col-lg-3">
                        <div class="cta-logo">
                            <a href="index.html"><img src="assets/img/logo.svg" alt="Ebukz" class="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row justify-content-xl-between justify-content-center align-items-center">
                            <div class="col-lg-5">
                                <div class="newsletter-inner">
                                    <span class="newsletter-icon"><img src="assets/img/icons/mail-2.svg" alt="icon"></span>
                                    <div class="newsletter-content">
                                        <h4 class="newsletter_title">Get In Touch</h4>
                                        <p class="newsletter-text">Subscribe for more Update</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="newsletter-form">
                                    <div class="search-btn">
                                        <input class="form-control" type="email" placeholder="Your Email Address">
                                        <button type="submit" class="vs-btn"><i class="fa-solid fa-paper-plane"></i> Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cta Area End -->
        <div class="footer-top">
            <div class="container">
                <div class="row g-5 justify-content-between">
                    <div class="col-md-6 col-lg-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Explore Us<span class="title-shape"><img src="assets/img/shapes/footer-line-shape.svg" alt="Shape Image"></span></h3>
                            <ul class="menu">
                                <li><a href="about.html"><i class="far fa-angle-right"></i> About Us</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Loyalty Program</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Bookmarks</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Sign in / Join</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Delivery Information</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Track Your Order</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Services <span class="title-shape"><img src="assets/img/shapes/footer-line-shape.svg" alt="Shape Image"></span></h3>
                            <ul class="menu">
                                <li><a href="#"><i class="far fa-angle-right"></i> Help Center</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Returns</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Products Recalls</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Store Pickup</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Accessibility</a></li>
                                <li><a href="contact.html"><i class="far fa-angle-right"></i> Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Categories<span class="title-shape"><img src="assets/img/shapes/footer-line-shape.svg" alt="Shape Image"></span></h3>
                            <ul class="menu footer-menu">
                                <li><a href="#"><i class="far fa-angle-right"></i> Action</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Comedy</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Kids</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Adventure</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Trips</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Suspense</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Suspense</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Love</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Thrillers</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Since Friction</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> General</a></li>
                                <li><a href="#"><i class="far fa-angle-right"></i> Astronomy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Contact<span class="title-shape"><img src="assets/img/shapes/footer-line-shape.svg" alt="Shape Image"></span></h3>
                            <div class="list-style1">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-map-marked-alt"></i> <a href="#">Willow Creek, # 32/65 Colorado United State Of America</a></li>
                                    <li><i class="fas fa-envelope"></i><a href="mailto:example@ebokz.com">example@ebokz.com</a></li>
                                    <li><i class="fa-solid fa-headset"></i> <a href="tel:+0061365000299">+(006) 1365 000 29</a> <a href="tel:+0061365000299">+(006) 1365 000 29</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-info">
            <div class="container">
                <div class="row g-4 justify-content-lg-around align-items-center justify-content-center">
                    <div class="col-lg-4">
                        <div class="contact-body">
                            <ul class="social-links">
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="copyright-menu">
                            <ul class="list-unstyled">
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Policy</a></li>
                                <li><a href="#">Terms &amp; Conditions </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="copyright-img">
                            <a href="#"><img src="assets/img/others/credit-payment.png" alt="payment img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <p class="copyright-text">Copyright <i class="fal fa-copyright"></i>
                    <script>
                        document.write(new Date().getFullYear())
                    </script> <a href="index.html">Ebukz</a>.
                    All Rights Reserved By <a href="https://themeforest.net/user/vecuro">Vecuro</a>
                </p>
            </div>
        </div>
    </footer>
    <!--********************************
			Code End  Here 
	******************************** -->
    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- imagesloaded -->
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Gsap -->
    <script src="{{ asset('frontend/assets/js/gsap.min.js') }}"></script>
    <!-- ScrollTrigger -->
    <script src="{{ asset('frontend/assets/js/ScrollTrigger.min.js') }}"></script>
    <!-- Gsap ScrollTo Plugin -->
    <script src="{{ asset('frontend/assets/js/gsap-scroll-to-plugin.js') }}"></script>
    <!-- Split Text -->
    <script src="{{ asset('frontend/assets/js/SplitText.js') }}"></script>
    <!-- lenis -->
    <script src="{{ asset('frontend/assets/js/lenis.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <!-- nice-select -->
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- nouislider -->
    <script src="{{ asset('frontend/assets/js/nouislider.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>