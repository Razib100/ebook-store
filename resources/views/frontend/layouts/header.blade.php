<!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
<!--********************************
   		Code Start From Here 
	******************************** -->
<!--==============================
	Preloader
	==============================-->
<div class="preloader">
    <button class="vs-btn preloaderCls">Cancel Preloader </button>
    <div class="preloader-inner">
        <img src="{{ asset('/frontend/assets/img/dark-logo.svg') }}" alt="logo">
        <span class="loader"></span>
    </div>
</div>
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
            <a href="index.html"><img src="{{ asset('/frontend/assets/img/logo.svg') }}" alt="ebukz" class="logo"></a>
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        </div>
        <div class="vs-mobile-menu">
            <ul>
                <li class="menu-item-has-children">
                    <a href="/">Home</a>
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
    <!-- <div class="header-top">
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
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><span class="globe-icon"><i class="fa-solid fa-user"></i></span>English</a>
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
    </div> -->
    <div class="header-middle">
        <div class="container">
            <div class="row justify-content-sm-between justify-content-center align-items-center gx-sm-0">
                <div class="col-auto">
                    <div class="header-logo">
                        <a href="/"><img src="{{ asset('/frontend/assets/img/dark-logo.svg') }}" alt="Ebukz" class="logo"></a>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-inner">
                        <form class="header-search" action="{{ route('search') }}" method="GET">
                            <div class="d-flex align-items-center">
                                <div class="dropdown me-2">
                                    <select name="category_id">
                                        <option value="">All Categories</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="text" name="search" placeholder="Search your Book’s....."
                                    value="{{ request('search') }}">
                                <button type="submit" class="searchBoxTggler1" aria-label="search-button">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>

                        <div class="header-buttons">
                            <div class="dropdown">
                                <a href="wishlist.html" class="vs-icon wishlist" class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user"></i></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    @auth('customer')
                                    <li><a class="dropdown-item" href="{{ route('customer.dashboard') }}">Dashboard</a></li>
                                    <li>
                                        <form id="customer-logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('customer-logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                    @else
                                    <li><a class="dropdown-item" href="{{ route('customer.login') }}">Login</a></li>
                                    <li><a class="dropdown-item" href="{{ route('customer.register') }}">Register</a></li>
                                    @endauth
                                </ul>
                            </div>
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
                                            @foreach($categories as $category)
                                            <li>
                                                <a href="{{ route('book.byCategory', $category->id) }}">
                                                    <img src="{{ asset('frontend/assets/img/icons/categori-i-' . $loop->iteration . '.svg') }}" alt="icon">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                                <div class="header-logo">
                                    <a href="index.html"><img src="{{ asset('/frontend/assets/img/dark-logo.svg') }}" alt="Ebukz" class="logo"></a>
                                </div>
                                <div class="menu-area">
                                    <nav class="main-menu menu-style1 d-none d-lg-block">
                                        <ul>
                                            <li class="menu-item-has-children">
                                                <a href="/">Home</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="{{ route('search') }}">Books</a>
                                            </li>
                                            <li class="menu-item-has-children">
                                                <a href="/about-us">About Us</a>
                                            </li>
                                            <li>
                                                <a href="/contact">Contact</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto d-xl-block d-none">
                            <div class="header-cart">
                                <a href="{{ route('cart.index') }}" class="vs-icon has-badge">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="badge" id="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                                </a>

                                <div class="woocommerce widget_shopping_cart">
                                    <div class="widget_shopping_cart_content" id="mini-cart-wrapper">
                                        {{-- initial mini cart render --}}
                                        @includeIf('frontend.partials.header_mini_cart', [
                                        'cartItems' => collect(session('cart', [])),
                                        'subtotal' => collect(session('cart', []))->sum('final_price')
                                        ])
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