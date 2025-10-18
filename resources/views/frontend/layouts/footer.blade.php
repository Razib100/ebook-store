<footer class="footer-layout1 style2 z-index-common">
    <!-- Cta Area -->
    <div class="container">
        <div class="cta-layout1 style2 z-index-common blog-title">
            <div class="row gx-60 align-items-center">
                <div class="col-lg-3">
                    <div class="cta-logo">
                        <a href="index.html">
                            <img src="{{ asset('frontend/assets/img/logo.svg') }}" alt="Ebukz" class="logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row justify-content-xl-between justify-content-center align-items-center">
                        <div class="col-lg-5">
                            <div class="newsletter-inner">
                                <span class="newsletter-icon">
                                    <img src="{{ asset('frontend/assets/img/icons/mail-2.svg') }}" alt="icon">
                                </span>
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
                        <h3 class="widget_title">Explore Us<span class="title-shape"><img src="{{ asset('frontend/assets/img/shapes/footer-line-shape.svg') }}" alt="Shape Image"></span></h3>
                        <ul class="menu">
                            <li><a href="/about-us"><i class="far fa-angle-right"></i> About Us</a></li>
                            <li><a href="/register"><i class="far fa-angle-right"></i> Sign in / Join</a></li>
                            <li><a href="#"><i class="far fa-angle-right"></i> Track Your Order</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Services <span class="title-shape"><img src="{{ asset('frontend/assets/img/shapes/footer-line-shape.svg') }}" alt="Shape Image"></span></h3>
                        <ul class="menu">
                            <li><a href="#"><i class="far fa-angle-right"></i> Help Center</a></li>
                            <li><a href="contact.html"><i class="far fa-angle-right"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Categories<span class="title-shape"><img src="{{ asset('frontend/assets/img/shapes/footer-line-shape.svg') }}" alt="Shape Image"></span></h3>
                        <ul class="menu footer-menu">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('book.byCategory', $category->id) }}">
                                    <i class="far fa-angle-right"></i>
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Contact<span class="title-shape"><img src="{{ asset('frontend/assets/img/shapes/footer-line-shape.svg') }}" alt="Shape Image"></span></h3>
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
                        <a href="#">
                            <img src="{{ asset('frontend/assets/img/others/credit-payment.png') }}" alt="payment img">
                        </a>
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