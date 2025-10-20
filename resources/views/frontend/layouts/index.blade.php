<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-Book Store</title>
    <meta name="author" content="vecuro">
    <meta name="description" content="The Largest Bookstore Service Html template">
    <meta name="keywords" content="The Largest Bookstore Service Html template">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('/frontend/') }}assets/img/favicons/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="{{ asset('/frontend/assets/img/favicons/favicon.png') }}" type="image/png" sizes="32x32">
    <link rel="shortcut icon" href="{{ asset('/frontend/assets/img/favicons/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('/frontend/assets/img/favicons/favicon.png') }}">
    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--==============================
	    All CSS File
	============================== -->
    @yield('head')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/slick.min.css') }}">
    <!-- nice-select -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/nice-select.min.css') }}">
    <!-- animate js -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/animate.min.css') }}">
    <!-- nouislider js -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/nouislider.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/frontend/assets/css/custom.css') }}">
</head>

<body>
    @include('frontend.layouts.header')
    @yield('content')
    <!-- Blog Area End  -->
    <!--==============================
	  Footer Area
	============================== -->
    @include('frontend.layouts.footer')
    <!--********************************
			Code End  Here 
	******************************** -->
    <!-- Cookie start -->
    <div class="position-fixed bottom-0 start-0 w-100 bg-dark py-5 cookie__box d-none" id="cookieBox" style="z-index: 9999;">
        <div class="container">
            <div class="row g-3 gx-lg-5 align-items-center">
                <div class="col-sm-9">
                    <p class="text-white mb-0">
                        We use cookies on this website to show you relevant information, understand
                        how you use the site, and ensure the site functions properly.
                        Manage your cookie preferences | Our privacy information
                    </p>
                </div>
                <div class="col-sm-3 text-end">
                    <button class="btn btn-primary" type="button" id="cookieBtn">ACCEPT</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:9998;"></div>
    <!-- Cookie End -->
    <!-- Bootstrap Toast Notification Container -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div id="globalToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage">Notification message</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('/frontend/assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('/frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('/frontend/assets/js/slick.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('/frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- imagesloaded -->
    <script src="{{ asset('/frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('/frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Gsap -->
    <script src="{{ asset('/frontend/assets/js/gsap.min.js') }}"></script>
    <!-- ScrollTrigger -->
    <script src="{{ asset('/frontend/assets/js/ScrollTrigger.min.js') }}"></script>
    <!-- Gsap ScrollTo Plugin -->
    <script src="{{ asset('/frontend/assets/js/gsap-scroll-to-plugin.js') }}"></script>
    <!-- Split Text -->
    <script src="{{ asset('/frontend/assets/js/SplitText.js') }}"></script>
    <!-- lenis -->
    <script src="{{ asset('/frontend/assets/js/lenis.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('/frontend/assets/js/wow.min.js') }}"></script>
    <!-- nice-select -->
    <script src="{{ asset('/frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <!-- nouislider -->
    <script src="{{ asset('/frontend/assets/js/nouislider.min.js') }}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('/frontend/assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            const cookiesAccepted = getCookie('cookiesAccepted');
            const cookieBox = $('#cookieBox');
            const overlay = $('#overlay');

            if (cookiesAccepted !== 'true') {
                // Show cookie box & overlay
                cookieBox.removeClass('d-none');
                overlay.show();
                $('body').css('pointer-events', 'none'); // Disable all clicks
                cookieBox.css('pointer-events', 'auto'); // Allow clicks on the cookie box only
            }

            $('#cookieBtn').on('click', function() {
                setCookie('cookiesAccepted', 'true', 30);
                cookieBox.addClass('d-none');
                overlay.hide();
                $('body').css('pointer-events', 'auto'); // Enable page clicks again
            });
        });

        // Helper: Set cookie
        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            document.cookie = `${name}=${value}; expires=${date.toUTCString()}; path=/`;
        }

        // Helper: Get cookie
        function getCookie(name) {
            const cookies = document.cookie.split(';');
            for (let i = 0; i < cookies.length; i++) {
                let cookie = cookies[i].trim();
                if (cookie.startsWith(name + '=')) {
                    return cookie.split('=')[1];
                }
            }
            return null;
        }
    </script>
    <script>
        // Global function to show toast
        function showToast(message, type = 'success') {
            const toastEl = document.getElementById('globalToast');
            const toastBody = document.getElementById('toastMessage');

            toastBody.textContent = message;

            // Remove previous classes
            toastEl.classList.remove('bg-success', 'bg-danger', 'bg-warning', 'bg-info');

            // Set class based on type
            switch (type) {
                case 'success':
                    toastEl.classList.add('bg-success');
                    break;
                case 'error':
                case 'danger':
                    toastEl.classList.add('bg-danger');
                    break;
                case 'warning':
                    toastEl.classList.add('bg-warning');
                    break;
                default:
                    toastEl.classList.add('bg-info');
            }

            // Show toast (auto-hide in 2 sec)
            const toast = new bootstrap.Toast(toastEl, {
                delay: 2000
            });
            toast.show();
        }
    </script>
    @if(session('toast'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast("{{ session('toast.message') }}", "{{ session('toast.type') }}");
        });
    </script>
    @endif
    @yield('script')
</body>

</html>