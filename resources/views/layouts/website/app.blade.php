<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $setting->site_name }} | @yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- Css Styles -->
    <style>
        #whatsappBtn {
            position: fixed;
            bottom: 120px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: #25D366;
            color: white;
            font-size: 30px;
            text-align: center;
            line-height: 60px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        #whatsappBtn:hover {
            background: #1ebea5;
        }

        /* Phone Call Button */
        #phoneBtn {
            position: fixed;
            bottom: 60px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: #007bff;
            color: white;
            font-size: 30px;
            text-align: center;
            line-height: 60px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        #phoneBtn:hover {
            background: #0056b3;
        }

        /* Catalog Button */
        #catalogBtn {
            position: fixed;
            bottom: 0px;
            right: 20px;
            width: 60px;
            height: 60px;
            background: #ff9800;
            color: white;
            font-size: 30px;
            text-align: center;
            line-height: 60px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        #catalogBtn:hover {
            background: #e68900;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/website') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/website') }}/css/style.css" type="text/css">
    @stack('css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>

        <div class="offcanvas__logo">
            <a href="{{ route('website.home') }}"><img src="{{ asset($setting->site_logo) }}" width="120px"
                    alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>

    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('layouts.website.__header')
    <!-- Header Section End -->

    @yield('content')


    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>{{ __('dashboard.quiq_contact') }}</h6>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>{{ __('dashboard.solve_problems') }} </h6>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6> {{ __('dashboard.online_support') }} 24/7</h6>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer Section Begin -->
    @include('layouts.website.__footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->
    <!-- Scroll to Top Button -->

    <!-- WhatsApp Floating Button -->
    <a style="margin-bottom: 50px" class="" href="https://wa.me/{{ $setting->site_whatsapp }}" target="_blank" id="whatsappBtn">
        <i class="fa fa-whatsapp"></i>
    </a>

    <!-- Phone Call Floating Button -->
    <a style="margin-bottom: 40px" href="tel:+{{ $setting->site_phone }}" id="phoneBtn">
        <i class="fa fa-phone"></i>
    </a>

    @if(!empty($catalog))
    @if($catalog->file_path != null)
     <!-- Catalog Floating Button -->
     <a style="margin-bottom:30px" href="{{ asset('uploads/settings/' . $catalog->file_path) }}" target="_blank" id="catalogBtn">
        <i class="fa fa-book"></i>
    </a>
    @endif
    @endif

    <!-- Js Plugins -->
    <script src="{{ asset('assets/website') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('assets/website') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/website') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('assets/website') }}/js/jquery-ui.min.js"></script>
    <script src="{{ asset('assets/website') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('assets/website') }}/js/jquery.countdown.min.js"></script>
    <script src="{{ asset('assets/website') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('assets/website') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/website') }}/js/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('assets/website') }}/js/main.js"></script>



    @stack('scripts')
</body>

</html>
