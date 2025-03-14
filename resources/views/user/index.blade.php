<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Saigon Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/et-line-icons.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/ytplayer.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/theme-chipotle.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Lato:300,400%7CRaleway:100,400,300,500,600,700%7COpen+Sans:400,500,600') }}"
        rel='stylesheet' type='text/css'>
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Titillium+Web:100,300,400,600,700') }}"
        rel="stylesheet" type="text/css">
    <link href="{{ asset('css/font-titillium.css') }}" rel="stylesheet" type="text/css">
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            font-size: 14px;
        }
            /* Styling for the footer */
            /* Styling for the footer */
.footer-1 {
    padding: 40px 0 20px;
    background: linear-gradient(135deg, #4a5568, #2d3748); /* Gradient cho bg-secondary */
    color: #fff;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
}

.footer-1 .title {
    color: #fff;
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.footer-1 hr {
    border-color: rgba(255, 255, 255, 0.2);
    margin-bottom: 20px;
}

.footer-1 .link-list a {
    color: #e2e8f0;
    text-decoration: none;
    font-size: 0.95rem;
    transition: color 0.3s ease, transform 0.3s ease;
    display: block;
    padding: 5px 0;
}

.footer-1 .link-list a:hover {
    color: #a0aec0;
    transform: translateX(5px); /* Hiệu ứng dịch sang phải khi hover */
}

.footer-1 .sub {
    font-size: 0.9rem;
    line-height: 1.6;
}

.footer-1 .sub a {
    color: #e2e8f0;
    text-decoration: underline;
    transition: color 0.3s ease;
}

.footer-1 .sub a:hover {
    color: #a0aec0;
}

/* Social Icons */
.social-list .social-icon {
    color: #e2e8f0;
    font-size: 1.5rem;
    margin-left: 15px;
    transition: color 0.3s ease, transform 0.3s ease;
}

.social-list .social-icon:hover {
    color: #a0aec0;
    transform: scale(1.2); /* Phóng to nhẹ khi hover */
}

.social-list .social-icon:first-child {
    margin-left: 0;
}

/* Back to Top Button (giữ nguyên như hiện tại) */
.back-to-top {
    position: absolute;
    bottom: 20px;
    right: 20px;
    background: rgba(255, 255, 255, 0.1);
    border: none;
    color: #fff;
    padding: 8px 15px;
    border-radius: 50px;
    transition: background 0.3s ease, transform 0.3s ease;
}

.back-to-top:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

/* Styling for Latest Updates (Twitter Feed) */
.twitter-feed .tweets-feed {
    list-style: none;
    padding: 0;
}

.tweet-item {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 10px;
    transition: background 0.3s ease, transform 0.3s ease;
}

.tweet-item:hover {
    background: rgba(255, 255, 255, 0.1);
    transform: translateY(-3px);
}

.tweet-content {
    display: flex;
    align-items: flex-start;
}

.tweet-icon {
    color: #1DA1F2; /* Màu Twitter */
    font-size: 1.3rem;
    margin-right: 10px;
}

.tweet-text p {
    margin: 0;
    font-size: 0.9rem;
    color: #e2e8f0;
}

.tweet-date {
    display: block;
    font-size: 0.8rem;
    color: #a0aec0;
    margin-top: 5px;
}

/* Styling for Instagram Feed */
.instafeed .insta-posts {
    list-style: none;
    padding: 0;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.insta-post {
    position: relative;
    width: 80px;
    height: 80px;
    overflow: hidden;
    border-radius: 5px;
}

.insta-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.insta-post:hover .insta-img {
    transform: scale(1.1); /* Phóng to nhẹ khi hover */
}

.insta-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.insta-post:hover .insta-overlay {
    opacity: 1;
}

.insta-overlay i {
    color: #fff;
    font-size: 1.2rem;
    margin-bottom: 5px;
}

.insta-overlay span {
    color: #fff;
    font-size: 0.8rem;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-1 .row > div {
        margin-bottom: 20px;
    }
    .footer-1 .social-list .social-icon {
        margin: 0 10px;
    }
    .insta-post {
        width: 60px;
        height: 60px;
    }
    .insta-overlay span {
        font-size: 0.7rem;
    }
}
.footer-1 {
    padding: 40px 0 20px;
    background: linear-gradient(135deg, #4a5568, #2d3748); /* Gradient cho bg-secondary */
    color: #fff;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
}

.footer-1 .title {
    color: #fff;
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 15px;
}

.footer-1 hr {
    border-color: rgba(255, 255, 255, 0.2);
    margin-bottom: 20px;
}

.footer-1 .link-list a {
    color: #e2e8f0;
    text-decoration: none;
    font-size: 0.95rem;
    transition: color 0.3s ease, transform 0.3s ease;
    display: block;
    padding: 5px 0;
}

.footer-1 .link-list a:hover {
    color: #a0aec0;
    transform: translateX(5px); /* Hiệu ứng dịch sang phải khi hover */
}

.footer-1 .sub {
    font-size: 0.9rem;
    line-height: 1.6;
}

.footer-1 .sub a {
    color: #e2e8f0;
    text-decoration: underline;
    transition: color 0.3s ease;
}

.footer-1 .sub a:hover {
    color: #a0aec0;
}

/* Social Icons */
.social-list .social-icon {
    color: #e2e8f0;
    font-size: 1.5rem;
    margin-left: 15px;
    transition: color 0.3s ease, transform 0.3s ease;
}

.social-list .social-icon:hover {
    color: #a0aec0;
    transform: scale(1.2); /* Phóng to nhẹ khi hover */
}

.social-list .social-icon:first-child {
    margin-left: 0;
}

/* Back to Top Button */

/* Responsive Design */

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .ratings {
            bottom: 4px;
            position: relative
        }

        .ratings i {
            color: #aba8a88c
        }

        .listing {
            background: #eee
        }

        .modal-content {
            border: none
        }

        .listing-child {
            background: #00000012
        }

        .room-spec span {
            margin-right: 10px;
            font-size: 12px
        }

        .spec-text-color {
            color: #8bc34a;
            font-weight: 800
        }

        .info span {
            margin-right: 10px
        }

        .more {
            text-decoration: none;
            font-size: 15px
        }

        .info span i {
            font-size: 12px;
            color: #9e9e9e8f !important
        }

        .spec span {
            margin-right: 10px
        }

        .date {
            line-height: 17px;
            margin-bottom: 8px
        }

        .date-o {
            color: green
        }

        .booking {
            padding-left: 150px !important;
            padding-right: 150px !important
        }
        
    </style>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
</head>

<body>

    <div class="nav-container">
        <nav class="absolute transparent">
            <div class="nav-bar">
                <div class="module left">
                    <a href="#top" class="inner-link" target="_self">
                        <i class="material-icons">hotel_class</i>
                        <samp>Saigon Hotel</samp>
                    </a>
                </div>
                <div class="module widget-handle mobile-toggle right visible-sm visible-xs">
                    <i class="ti-menu"></i>
                </div>
                <div class="module-group right">
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#about" class="inner-link" target="_self">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#rooms" class="inner-link" target="_self">Rooms</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#map" class="inner-link" target="_self">Map & Directions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#roofbar" class="inner-link" target="_self">Roof Terrace</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#tours" class="inner-link" target="_self">Tours</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#contact" class="inner-link" target="_self">Contact</a>
                            </li>
                        </ul>
                    </div>
                    @if (Auth::guest())
                        <div class="module left">
                            <ul class="menu">
                                <li>
                                    <a class="inner-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="module left">
                            <ul class="menu">
                                <li>
                                    <a class="inner-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="module left">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (Auth::guard('web')->check())
                                        {{ Auth::user()->kh_hoTen }} <span class=""></span> @endif
                                    @if (Auth::guard('admin')->check())
                                        {{ Auth::user()->nv_hoTen }} <span class=""></span>@endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('/user') }} ">Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }} "
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </div>
    <class="main-container">
        <section class="cover fullscreen image-slider slider-arrow-controls kenburns parallax">
            <ul class="slides">
                <li class="image-bg pt-xs-240 pb-xs-240">
                    <div class="background-image-holder">
                        <img alt="Saigon Superior Room" class="background-image" src="img/a1.jpg">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Saigon Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Ho Chi Minh City</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms feature double or single beds, private bathrooms with showers and toilets, fans, air conditioning, and telephones. All rooms have windows offering views of the bustling city streets or nearby landmarks. Located at 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, Vietnam. Contact us for more details.
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <a class="btn btn btn-white mt16 btn-filled" href="{{ route('orders.listlp') }}"
                                    target="_self">Book Now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="image-bg pt-xs-240 pb-xs-240">
                    <div class="background-image-holder">
                        <img alt="Saigon Hotel Front Desk" class="background-image" src="img/desk2.jpg">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Saigon Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Ho Chi Minh City</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms feature double or single beds, private bathrooms with showers and toilets, fans, air conditioning, and telephones. All rooms have windows offering views of the bustling city streets or nearby landmarks. Located at 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, Vietnam. Contact us for more details.
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <a class="btn btn btn-white mt16 btn-filled" href="{{ route('orders.listlp') }}"
                                    target="_self">Book Now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="image-bg pt-xs-240 pb-xs-240">
                    <div class="background-image-holder">
                        <img alt="Saigon Hotel Exterior" class="background-image" src="img/desk1.JPG">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Saigon Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Ho Chi Minh City</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms feature double or single beds, private bathrooms with showers and toilets, fans, air conditioning, and telephones. All rooms have windows offering views of the bustling city streets or nearby landmarks. Located at 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, Vietnam. Contact us for more details.
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <a class="btn btn btn-white mt16 btn-filled" href="{{ route('orders.listlp') }}"
                                    target="_blank">Book Now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="image-bg pt-xs-240 pb-xs-240">
                    <div class="background-image-holder">
                        <img alt="Saigon Hotel Front Desk" class="background-image" src="img/desk4.jpg">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Saigon Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Ho Chi Minh City</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms feature double or single beds, private bathrooms with showers and toilets, fans, air conditioning, and telephones. All rooms have windows offering views of the bustling city streets or nearby landmarks. Located at 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, Vietnam. Contact us for more details.
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <a class="btn btn btn-white mt16 btn-filled" href="{{ route('orders.listlp') }}"
                                    target="_self">Book Now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="image-bg pt-xs-240 pb-xs-240">
                    <div class="background-image-holder">
                        <img alt="Saigon Hotel Exterior" class="background-image" src="img/desk3.JPG">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Saigon Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Ho Chi Minh City</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms feature double or single beds, private bathrooms with showers and toilets, fans, air conditioning, and telephones. All rooms have windows offering views of the bustling city streets or nearby landmarks. Located at 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, Vietnam. Contact us for more details.
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <a class="btn btn btn-white mt16 btn-filled" href="{{ route('orders.listlp') }}"
                                    target="_blank">Book Now</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="image-bg pt-xs-240 pb-xs-240">
                    <div class="background-image-holder">
                        <img alt="Saigon Hotel Front Desk" class="background-image" src="img/desk5.jpg">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Saigon Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Ho Chi Minh City</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms feature double or single beds, private bathrooms with showers and toilets, fans, air conditioning, and telephones. All rooms have windows offering views of the bustling city streets or nearby landmarks. Located at 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, Vietnam. Contact us for more details.
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <a class="btn btn btn-white mt16 btn-filled" href="{{ route('orders.listlp') }}"
                                    target="_self">Book Now</a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </section>
        <section>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if (Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#"
                                class="close" data-dismiss="alert" aria-label="close">×</a></p>
                    @endif
                @endforeach
            </div>
            <div class="container">
                <div class="row v-align-children">
                    <div class="col-sm-5">
                        <h3>Book a Room at Saigon Hotel</h3>
                        <p class="lead mb40">
                            Our mango-yellow painted rooms feature private bathrooms, showers, toilets, fans, air conditioning, and telephones. Luggage can be conveniently stored beneath the slightly elevated beds. The Budget Single and Budget Double options offer a basic yet comfortable setup for international travelers. Superior Double rooms provide more space, a larger bed, a desk, chair, and a large window. Deluxe Double rooms come with additional amenities like a PC, closet, shelves, refrigerator, and water kettle.
                        </p>
                        <div class="overflow-hidden mb32 mb-xs-24">
                            <i class="icon pull-left ti ti-star icon-sm"></i>
                            <h6 class="uppercase mb0 inline-block p32">Consistently High Guest Satisfaction <br>Since 2012</h6>
                        </div>
                        <div class="overflow-hidden mb32 mb-xs-24">
                            <i class="ti-medall-alt icon icon-sm pull-left"></i>
                            <h6 class="uppercase mb0 inline-block p32">Top Ranked Value Hotel in Ho Chi Minh City</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="pricing-table pt-1 text-center emphasis">
                            <h5 class="uppercase bold"><br>Starting FROM</h5>
                            <span class="price">900.000 VND<br></span>
                            <a class="btn btn-white btn-lg" href="{{ route('orders.listlp') }}" target="_blank">Book Now</a>
                            <p>
                                <a href="/cdn-cgi/l/email-protection#b0999e969fb0989f84959c889f9199de939f9d"    
                                    target="_self">Contact Us for</a>
                                <br> large group bookings <br>Contact us<br><br><br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section><a id="rooms" class="in-page-link"></a>
        <div class="container">
        <!-- Tiêu đề -->
        <div class="row text-center mb-5">
            <div class="col-12">
                <h3 style="margin-top:-25px; color: #1E3A8A; font-weight: 700; font-size: 2.5rem;">Room List of Saigon Hotel</h3>
            </div>  
        </div>
        </div>
<!-- Room list -->
        <section style="margin-top: -150px" class="projects">
    <div class="container">
        <div class="row g-4">
            <!-- Single Room -->
            <div class="col-md-4">
                <div class="room-card">
                    <img src="img/rooms/singleRoom.jpg" class="room-img" alt="Single Room">
                    <div class="room-info">
                        <h3 class="room-title">Single Room</h3>
                        <p>Queen bed (1.60m width), private bathroom, AC, WiFi, desk, chair, fridge.</p>
                        <a href="{{ route('orders.listlp') }}" class="btn">Book Now</a>
                    </div>
                </div>
            </div>
            
            <!-- Superior Room -->
            <div class="col-md-4">
                <div class="room-card">
                    <img src="img/rooms/superiorRoom.jpg" class="room-img" alt="Superior Room">
                    <div class="room-info">
                        <h3 class="room-title">Superior Room</h3>
                        <p>Bed (1.5m width), private bathroom, AC, desk, chair, WiFi.</p>
                        <a href="{{ route('orders.listlp') }}" class="btn">Book Now</a>
                        
                    </div>
                </div>
            </div>

            <!-- Standard Room -->
            <div class="col-md-4">
                <div class="room-card">
                    <img src="img/rooms/standardRoom.jpg" class="room-img" alt="Standard Room">
                    <div class="room-info">
                        <h3 class="room-title">Standard Room</h3>
                        <p>Two single beds (0.8m width), private bathroom, AC, WiFi.</p>
                        <a href="{{ route('orders.listlp') }}" class="btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <!-- Single Room -->
            <div class="col-md-4">
                <div class="room-card">
                    <img src="img/rooms/suiteRoom.jpg" class="room-img" alt="Suite Room">
                    <div class="room-info">
                        <h3 class="room-title">SuiteSuite Room</h3>
                        <p>LUXYRY, Queen bed (1.60m width), private bathroom, AC, WiFi, desk, chair, fridge.</p>
                        <a href="{{ route('orders.listlp') }}" class="btn">Book Now</a>
                    </div>
                </div>
            </div>
            
            <!-- Superior Room -->
            <div class="col-md-4">
                <div class="room-card">
                    <img src="img/rooms/TwinRoom.jpg" class="room-img" alt="Twin Room">
                    <div class="room-info">
                        <h3 class="room-title">Twin Room</h3>
                        <p>Bed (1.5m width), private bathroom, AC, desk, chair, WiFi.</p>
                        <a href="{{ route('orders.listlp') }}" class="btn">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Standard Room -->
            <div class="col-md-4">
                <div class="room-card">
                    <img src="img/rooms/standardRoom.jpg" class="room-img" alt="Standard Room">
                    <div class="room-info">
                        <h3 class="room-title">Standard Room</h3>
                        <p>Two single beds (0.8m width), private bathroom, AC, WiFi.</p>
                        <a href="{{ route('orders.listlp') }}" class="btn">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Cố định kích thước ảnh */
.room-img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 8px;
}

/* Tạo khung chứa ảnh + thông tin */
.room-card {
    margin-top: 25px;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
}

/* Thiết lập thông tin ban đầu ẩn đi */
.room-info {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8); /* Đậm hơn để chữ nổi bật */
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.4s ease, visibility 0.4s ease;
    padding: 15px;
}

/* Hiển thị thông tin khi hover vào ảnh */
.room-card:hover .room-info {
    opacity: 1;
    visibility: visible;
}

/* Màu chữ tiêu đề phòng */
.room-title {
    color:rgb(232, 235, 244); /* Vàng kim */
    font-size: 1.5rem;
    font-weight: bold;
}

/* Nút đặt phòng */
.room-info .btn {
    margin-top: 10px;
    font-size: 1rem;
    font-weight: bold;
}
</style>




        <section class="about-section" style=" background-color: #F9FAFB;">
    <div class="container">
        <!-- Tiêu đề -->
        <div class="row text-center mb-5">
            <div class="col-12">
                <h3 style="color: #1E3A8A; font-weight: 700; font-size: 2.5rem; margin-bottom: 10px;">About Saigon Hotel</h3>
                <p style="color: #6B7280; font-size: 1.1rem;">Discover the essence of our family-run mini-hotel in Ho Chi Minh City</p>
            </div>
        </div>

        <!-- Nội dung -->
        <div class="row" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <!-- Compact and Comfortable Rooms -->
            <div class="about-card" style="background: #FFFFFF; border-radius: 15px; padding: 30px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); transition: transform 0.3s;">
                <i class="ti-layers" style="font-size: 2rem; color: #F59E0B; margin-bottom: 20px; display: block;"></i>
                <h4 style="color: #1E3A8A; font-weight: 600; font-size: 1.5rem; margin-bottom: 15px;">Compact and Comfortable Rooms</h4>
                <p style="color: #4B5563; font-size: 1rem; line-height: 1.6;">
                    Saigon Hotel opened in 2012 as a family-run value mini-hotel in the heart of Ho Chi Minh City. Our mango-yellow painted rooms feature private bathrooms, showers, toilets, fans, air conditioning, and telephones. Luggage can be stored conveniently beneath the elevated beds. Our concept is "no frills, but clean and relaxed."
                </p>
            </div>

            <!-- Friendly Service and Fair Prices -->
            <div class="about-card" style="background: #FFFFFF; border-radius: 15px; padding: 30px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); transition: transform 0.3s;">
                <i class="ti-heart" style="font-size: 2rem; color: #F59E0B; margin-bottom: 20px; display: block;"></i>
                <h4 style="color: #1E3A8A; font-weight: 600; font-size: 1.5rem; margin-bottom: 15px;">Friendly Service and Fair Prices</h4>
                <p style="color: #4B5563; font-size: 1rem; line-height: 1.6;">
                    At Saigon Hotel, we aim to provide excellent service at a fair price, just as we would expect when traveling abroad. Our family and staff are dedicated to maintaining high standards and assisting with your travel plans, from restaurant recommendations to tour bookings.
                </p>
            </div>

            <!-- Light, Air, and Clean Design -->
            <div class="about-card" style="background: #FFFFFF; border-radius: 15px; padding: 30px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); transition: transform 0.3s;">
                <i class="pe-7s-sun" style="font-size: 2rem; color: #F59E0B; margin-bottom: 20px; display: block;"></i>
                <h4 style="color: #1E3A8A; font-weight: 600; font-size: 1.5rem; margin-bottom: 15px;">Light, Air, and Clean Design</h4>
                <p style="color: #4B5563; font-size: 1rem; line-height: 1.6;">
                    Built on a typical narrow Vietnamese plot, Saigon Hotel emphasizes light, air circulation, and eco-friendly design. Our architecture blends Eastern and Western concepts of space, creating a unique artistic budget hotel experience. The interior is designed for practicality and cleanliness, ensuring guest comfort.
                </p>
            </div>

            <!-- Promoting Eco-Tourism and Healthy Living -->
            <div class="about-card" style="background: #FFFFFF; border-radius: 15px; padding: 30px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); transition: transform 0.3s;">
                <i class="fa fa-pagelines" style="font-size: 2rem; color: #F59E0B; margin-bottom: 20px; display: block;"></i>
                <h4 style="color: #1E3A8A; font-weight: 600; font-size: 1.5rem; margin-bottom: 15px;">Promoting Eco-Tourism and Healthy Living</h4>
                <p style="color: #4B5563; font-size: 1rem; line-height: 1.6;">
                    Saigon Hotel supports eco-tourism with energy-saving lamps and solar-powered hot water. Our compact rooms cool quickly with AC, balancing comfort and sustainability. All rooms have windows for fresh air, and we encourage guests to conserve energy by reusing towels when possible.
                </p>
            </div>
        </div>
    </div>

    <!-- CSS inline bổ sung -->
    <style>
        .about-card:hover {
            transform: translateY(-10px);
        }
        @media (max-width: 768px) {
            .about-card {
                margin-bottom: 20px;
            }
        }
    </style>
</section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-1">
                        <div class="feature bordered">
                            <h1 class="large uppercase mb64 mb-xs-24">Xin Chào!</h1>
                            <p class="mb80 mb-xs-24">
                                Our compact rooms feature double or single beds, private bathrooms with showers and toilets, fans, air conditioning, and telephones. All rooms have windows with views of Ho Chi Minh City’s vibrant streets. Free WiFi is available throughout, and an elevator takes you to our relaxing roof terrace with hammocks.
                            </p>
                            <a class="btn btn-lg btn-filled" href="{{ route('orders.listlp') }}" target="_blank">Book A Room</a>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <img class="mt80 mt-xs-0 mb24" alt="Pic" src="img/a1.jpg">
                        <img class="col-md-pull-4 relative" alt="Pic" src="img/a2.jpg">
                    </div>
                </div>
            </div>
        </section><a id="roofbar" class="in-page-link"></a>

        <section class="image-slider slider-all-controls controls-inside pt0 pb0 height-70 parallax">
            <ul class="slides">
                <li class="overlay image-bg">
                    <div class="background-image-holder">
                        <img alt="Roof Bar Saigon Hotel" class="background-image" src="img/saigonrooftop.jpg">
                    </div>
                    <div class="container v-align-transform">
                        <div class="row text-center">
                            <div class="col-md-10 col-md-offset-1">
                                <h2 class="mb-xs-16">Saigon Hotel Roof Terrace</h2>
                                <p class="lead mb40">Relax on our sixth-floor Roof Terrace with a cold drink and stunning views of Ho Chi Minh City. Order drinks at the front desk and enjoy free internet during the day. In the evenings, join fellow travelers at occasional rooftop parties.</p>
                                <a class="btn btn-lg" href="{{ route('orders.listlp') }}" target="_blank">Call Contact Us</a>
                                <a class="btn btn-lg btn-filled" href="{{ route('orders.listlp') }}" target="_blank">Book a Room</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="overlay image-bg">
                    <div class="background-image-holder">
                        <img alt="View from Saigon Hotel" class="background-image" src="img/saigonrooftop2.jpg">
                    </div>
                    <div class="container v-align-transform">
                        <div class="row text-center">
                            <div class="col-md-10 col-md-offset-1">
                                <h2 class="mb-xs-16">Saigon Hotel Roof Terrace</h2>
                                <p class="lead mb40">Enjoy a fresh breeze and watch the bustling streets of Ho Chi Minh City from our rooftop. Opposite the hotel lies the Quang Duc Pagoda, a notable landmark. Spot the mango trees among our rooftop plants!</p>
                                <a class="btn btn-lg btn-filled" href="{{ route('orders.listlp') }}" target="_blank">Call Contact Us</a>
                                <a class="btn btn-lg" href="{{ route('orders.listlp') }}" target="_blank">Book a Room</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="overlay image-bg">
                    <div class="background-image-holder">
                        <img alt="View from Saigon Hotel" class="background-image" src="img/saigonrooftop1.jpg">
                    </div>
                    <div class="container v-align-transform">
                        <div class="row text-center">
                            <div class="col-md-10 col-md-offset-1">
                                <h2 class="mb-xs-16">Saigon Hotel Roof Terrace</h2>
                                <p class="lead mb40">Enjoy a fresh breeze and watch the bustling streets of Ho Chi Minh City from our rooftop. Opposite the hotel lies the Quang Duc Pagoda, a notable landmark. Spot the mango trees among our rooftop plants!</p>
                                <a class="btn btn-lg btn-filled" href="{{ route('orders.listlp') }}" target="_blank">Call Contact Us</a>
                                <a class="btn btn-lg" href="{{ route('orders.listlp') }}" target="_blank">Book a Room</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h4 class="uppercase mb16">Saigon Hotel Gallery</h4>
                        <p class="lead mb64">Impressions</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="lightbox-grid square-thumbs" data-gallery-title="Gallery">
                            <ul>
                                <li>
                                    <a href="img/a1.jpg" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/a1.jpg">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/a2.jpg" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/a2.jpg">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/a3.JPG" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/a3.JPG">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/a4.JPG" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/a4.JPG">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/a5.JPG" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/a5.JPG">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/rooms/standardRoom.JPG" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/rooms/standardRoom.JPG">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/rooms/suiteRoom.jpg" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/rooms/suiteRoom.jpg">
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/rooms/superiorRoom.jpg" data-lightbox="Gallery" data-title="Bathroom Saigon Hotel">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="Bathroom Saigon Hotel" class="background-image" src="img/rooms/superiorRoom.jpg">
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section><a id="contact" class="in-page-link"></a>

        <section class="bg-dark pt64 pb64">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="mb8">Enjoy Your Stay in Ho Chi Minh City</h2>
                        <p class="lead mb40 mb-xs-24">
                            Since 2012, we’ve earned high rankings and excellent guest reviews for our value mini-hotel.<br>Our address is:<br><br>Saigon Hotel<br>12 Trinh Dinh Thao Street<br>Tan Phu District<br>Ho Chi Minh City, Vietnam<br>Email: contact@saigonhotel.com<br>Call: 0833 736 809
                        </p>
                        <a class="btn btn-lg mb0" href="{{ route('orders.listlp') }}" target="_blank">Book Online</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row v-align-children">
                    <div class="col-sm-6 col-md-5">
                        <h2 class="uppercase color-primary">The Perfect Place to Stay in Ho Chi Minh City</h2>
                        <hr>
                        <p>
                            Our family loves mangoes, which inspired the mango-yellow paint and the small mango trees behind the hotel. We also love art—explore our collection of Libre Graphics, Open Source computer art, and traditional Vietnamese paintings throughout the building.
                        </p>
                    </div>
                    <div class="col-sm-6 col-md-offset-1 p0">
                        <div class="col-sm-6 text-center">
                            <div class="feature bordered mb30">
                                <h1 class="large uppercase">23</h1>
                                <h5 class="uppercase">Bedrooms</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <div class="feature bordered mb30">
                                <h1 class="large">7</h1>
                                <h5 class="uppercase">Floors</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <div class="feature bordered mb30">
                                <h1 class="large">2</h1>
                                <h5 class="uppercase">Roof Terraces</h5>
                            </div>
                        </div>
                        <div class="col-sm-6 text-center">
                            <div class="feature bordered mb30">
                                <h1 class="large">42</h1>
                                <h5 class="uppercase">Wall Arts</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-1 text-right text-left-xs col-sm-5">
                        <h1 class="uppercase mb24 bold italic">Saigon Hotel</h1>
                        <h5 class="uppercase italic fade-1-4">"Friendly Family Hotel With a Fair Price"</h5>
                        <hr class="visible-xs">
                    </div>
                    <div class="col-md-5 col-sm-7">
                        <p>
                            Saigon Hotel has welcomed international travelers since 2012, striving to make every stay comfortable. As the top-ranked value hotel in Ho Chi Minh City, we offer small, cozy rooms, a stunning roof terrace, and heartfelt service at a fair price.
                        </p>
                        <p>
                            Located in Tan Phu District near Ho Chi Minh City University and the Quang Duc Pagoda, our compact rooms feature double or single beds, private bathrooms, fans, air conditioning, and telephones. All rooms have windows with city views, and free WiFi is available throughout. Our elevator takes you to the roof terrace, a perfect spot to relax and meet others.
                        </p>
                        <p>
                            We use energy-saving lamps and solar-powered hot water, reflecting our commitment to sustainability.<br>
                        </p>
                        <p>
                            Thank you for choosing Saigon Hotel. We look forward to welcoming you to Ho Chi Minh City!<br>
                        </p>
                        <p>Mr. Duy<br>Hotel Manager<br></p>
                        <img alt="signature" src="img/fitness1.png" class="image-small">
                    </div>
                </div>
            </div>
        </section>

        <a id="tours" class="in-page-link"></a>

        <section>
            <div class="container">
                <div class="feed-item mb96 mb-xs-48">
                    <div class="row mb16 mb-xs-0">
                        <div class="col-md-offset-2 col-sm-10 col-sm-offset-1 text-center col-md-9">
                            <h6 class="uppercase mb16 mb-xs-8">Saigon Tours</h6>
                            <h3>Food Tours and City Adventures in Ho Chi Minh City</h3>
                        </div>
                    </div>
                    <div class="row mb32 mb-xs-16">
                        <div class="col-md-offset-2 col-sm-10 col-sm-offset-1 col-md-9">
                            <img alt="Saigon Street Food" class="mb32 mb-xs-16" src="img/hochiminhcitydesk.jpg">
                            <p class="lead">
                                Explore Ho Chi Minh City with Saigon Tours, your friendly local tour provider since 2009. We offer food tours, motorbike adventures with young guides, pay-what-you-like experiences, and customized city tours.
                            </p>
                            <p class="lead">
                                Our goal is to provide enjoyable, authentic, and eco-friendly experiences. Let us know what you love about our tours or how we can improve—we’d be thrilled to hear your feedback!<br>
                            </p>
                            <p class="lead">Thank you for visiting Ho Chi Minh City. Enjoy its vibrant charm!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
                            <a class="mb48 mb-xs-32 btn btn-lg btn-filled" href="http://saigontours.info" target="_blank">Book a Tour in Ho Chi Minh City</a>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </section><a id="map" class="in-page-link"></a>

        <section class="p0">
            <div class="map-holder pt180 pb180">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.669673092374!2d106.62831461462257!3d10.759917162443404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752be4c19c215b%3A0x13d2c8e8b8b8b8b8!2s12%20Tr%E1%BB%8Bnh%20%C4%90%C3%ACnh%20Th%E1%BA%A3o%2C%20T%C3%A2n%20Ph%C3%BA%2C%20Qu%E1%BA%ADn%207%2C%20H%E1%BB%93%20Ch%C3%AD%20Minh%2C%20Vietnam!5e0!3m2!1sen!2s!4v1698765432109!5m2!1sen!2s"></iframe>
            </div>
        </section><a id="location" class="in-page-link"></a>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-sm-12 col-md-9">
                        <h4 class="uppercase mb80">How to Get to Saigon Hotel</h4>
                        <div class="tabbed-content button-tabs">
                            <ul class="tabs">
                                <li class="active">
                                    <div class="tab-title">
                                        <span>By Bus Within Ho Chi Minh City</span>
                                    </div>
                                    <div class="tab-content">
                                        <p>
                                            Ho Chi Minh City has an extensive bus network. To reach Saigon Hotel in Tan Phu District, take a bus to the Tan Phu area (e.g., Bus No. 69 or 139 from Ben Thanh Market). Get off near Ho Chi Minh City University and walk to 12 Trinh Dinh Thao Street. Alternatively, use a taxi or ride-hailing app like Grab for convenience. The fare should be 30,000–50,000 VND (1.5–2 USD) depending on traffic and distance. Provide the driver with our address: Saigon Hotel, 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, 0833 736 809.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tab-title">
                                        <span>By Taxi or Motorbike</span>
                                    </div>
                                    <div class="tab-content">
                                        <p>
                                            Taxis and motorbike taxis (xe om) are widely available in Ho Chi Minh City. From District 1 (e.g., Ben Thanh Market), a taxi ride to Saigon Hotel takes about 20–30 minutes, costing 100,000–150,000 VND (4–6 USD). Motorbikes are cheaper, around 50,000–80,000 VND (2–3 USD). Provide the driver with our address: Saigon Hotel, 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, 0833 736 809. Look for our seven-story yellow building near the university.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tab-title">
                                        <span>From Tan Son Nhat Airport</span>
                                    </div>
                                    <div class="tab-content">
                                        <p>
                                            Tan Son Nhat International Airport is just 7 km from Saigon Hotel. A taxi ride takes about 15–25 minutes, costing around 150,000–200,000 VND (6–9 USD). Alternatively, use a ride-hailing app like Grab. Provide the driver with our address: Saigon Hotel, 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, 0833 736 809. Our seven-story yellow building is easily recognizable near the university.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section><a id="services" class="in-page-link"></a>

        <section class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="uppercase">Saigon Hotel Services</h6>
                        <hr class="mb160 mb-xs-24">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="thin">Friendly, Comfortable, and a Fair Price.</h1>
                    </div>
                </div>
                <div class="row mb160 mb-xs-0">
                    <div class="col-md-6 col-sm-8">
                        <p class="lead">
                            Saigon Hotel is the top-ranked value hotel in Ho Chi Minh City, offering cozy rooms, a beautiful roof terrace, and warm service.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-xs-24">
                        <i class="icon mb32 ti ti-crown"></i>
                        <h6 class="uppercase">What's Included</h6>
                        <ul>
                            <li>Free City Maps<br>Free Luggage Storage<br>Free Computers in Lobby<br>Free WiFi in Hotel<br>Free Wired LAN in Rooms<br>Free Media Library<br>Free Hot and Cold Water Dispenser<br></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-xs-24">
                        <i class="icon mb32 ti ti-home"></i>
                        <h6 class="uppercase">Facilities</h6>
                        <ul>
                            <li>24-Hour Security<br>24-Hour Reception<br>Air Conditioning<br>Bicycle Parking<br>Cafe<br>Computers in Lobby<br>Currency Exchange<br></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-xs-24">
                        <i class="icon mb32 ti ti-shift-right"></i>
                        <h6 class="uppercase">Check-In/Out Details</h6>
                        <ul>
                            <li>Check-in: 14:00<br>Early check-ins (1–2 hours) possible if rooms are available; additional rates apply for earlier times.<br>Latest Check-out: 12:00<br>Late check-outs incur additional rates; confirm with the front desk.</li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-xs-24">
                        <i class="icon mb32 et-line-search"></i>
                        <h6 class="uppercase">Policy</h6>
                        <ul>
                            <li>Non-Smoking<br>No Curfew<br>No Minimum Stay Required<br>Child-Friendly<br>Eco-Friendly</li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </section>

        <footer class="footer-1 bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="widget">
                    <h6 class="title">More Info on Ho Chi Minh City</h6>
                    <hr>
                    <ul class="link-list recent-posts">
                        <li><a href="https://en.wikipedia.org/wiki/Ho_Chi_Minh_City" target="_blank">Ho Chi Minh City on Wikipedia</a></li>
                        <li><a href="https://en.wikivoyage.org/wiki/Ho_Chi_Minh_City" target="_blank">Ho Chi Minh City on Wikivoyage</a></li>
                        <li><a href="http://wikitravel.org/en/Ho_Chi_Minh_City" target="_blank">Ho Chi Minh City on Wikitravel</a></li>
                        <li><a href="https://travelfish.org/location/vietnam/southern_vietnam/ho_chi_minh/ho_chi_minh" target="_blank">Ho Chi Minh City on Travelfish</a></li>
                        <li><a href="https://lonelyplanet.com/vietnam/southern-vietnam/ho-chi-minh-city" target="_blank">Ho Chi Minh City on Lonely Planet</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="widget">
                    <h6 class="title">Latest Updates</h6>
                    <hr>
                    <div class="twitter-feed">
                        <ul class="tweets-feed">
                            <li class="tweet-item">
                                <div class="tweet-content">
                                    <i class="ti-twitter-alt tweet-icon"></i>
                                    <div class="tweet-text">
                                        <p>🎉 Just hosted a rooftop party at Saigon Hotel! Amazing views and great vibes. Join us next time! #SaigonHotel #HCMC</p>
                                        <span class="tweet-date">Mar 10, 2025</span>
                                    </div>
                                </div>
                            </li>
                            <li class="tweet-item">
                                <div class="tweet-content">
                                    <i class="ti-twitter-alt tweet-icon"></i>
                                    <div class="tweet-text">
                                        <p>🌟 New tour package available! Explore Ho Chi Minh City with Saigon Tours. Book now at saigontours.info #TravelHCMC</p>
                                        <span class="tweet-date">Mar 5, 2025</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="widget">
                    <h6 class="title">Instagram</h6>
                    <hr>
                    <div class="instafeed" data-user-name="saigonhotel">
                        <ul class="insta-posts">
                            <li class="insta-post">
                                <a href="https://instagram.com/saigonhotel" target="_blank">
                                    <img src="img/a2.jpg" alt="Rooftop view at Saigon Hotel" class="insta-img">
                                    <div class="insta-overlay">
                                        <i class="ti-instagram"></i>
                                        <span>Stunning rooftop view 🌆</span>
                                    </div>
                                </a>
                            </li>
                            <li class="insta-post">
                                <a href="https://instagram.com/saigonhotel" target="_blank">
                                    <img src="img/saigonrooftop.jpg" alt="Rooftop view at Saigon Hotel" class="insta-img">
                                    <div class="insta-overlay">
                                        <i class="ti-instagram"></i>
                                        <span>Stunning rooftop view 🌆</span>
                                    </div>
                                </a>
                            </li>
                            <li class="insta-post">
                                <a href="https://instagram.com/saigonhotel" target="_blank">
                                    <img src="img/saigonrooftop2.jpg" alt="Rooftop view at Saigon Hotel" class="insta-img">
                                    <div class="insta-overlay">
                                        <i class="ti-instagram"></i>
                                        <span>Stunning rooftop view 🌆</span>
                                    </div>
                                </a>
                            </li>
                            <li class="insta-post">
                                <a href="https://instagram.com/saigonhotel" target="_blank">
                                    <img src="img/saigonrooftop1.jpg" alt="Rooftop view at Saigon Hotel" class="insta-img">
                                    <div class="insta-overlay">
                                        <i class="ti-instagram"></i>
                                        <span>Stunning rooftop view 🌆</span>
                                    </div>
                                </a>
                            </li>
                            <li class="insta-post">
                                <a href="https://instagram.com/saigonhotel" target="_blank">
                                    <img src="img/rooms/superiorRoom.jpg" alt="Superior Room at Saigon Hotel" class="insta-img">
                                    <div class="insta-overlay">
                                        <i class="ti-instagram"></i>
                                        <span>Cozy Superior Room 🛏️</span>
                                    </div>
                                </a>
                            </li>
                            <li class="insta-post">
                                <a href="https://instagram.com/saigonhotel" target="_blank">
                                    <img src="img/hochiminhcitydesk.jpg" alt="Street food tour with Saigon Tours" class="insta-img">
                                    <div class="insta-overlay">
                                        <i class="ti-instagram"></i>
                                        <span>Street food adventure 🍜</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center mt-4">
            <div class="col-md-6 col-sm-12">
                <div class="contact-info">
                    <span class="sub text-white">Saigon Hotel | 12 Trinh Dinh Thao, Tan Phu District, Ho Chi Minh City, Vietnam<br>
                        Web: <a href="https://saigonhotel.com" target="_blank" class="text-white">saigonhotel.com</a> | 
                        Email: <a href="mailto:contact@saigonhotel.com" class="text-white">contact@saigonhotel.com</a><br>
                        Phone: <a href="tel:0833736809" class="text-white">0833 736 809</a>
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-md-right text-center mt-3 mt-md-0">
                <ul class="list-inline social-list">
                    <li><a href="https://twitter.com" target="_self" class="social-icon"><i class="ti-twitter-alt"></i></a></li>
                    <li><a href="http://facebook.com" target="_blank" class="social-icon"><i class="ti-facebook"></i></a></li>
                    <li><a href="https://google.com/" target="_blank" class="social-icon"><i class="ti-google"></i></a></li>
                    <li><a href="https://instagram.com/kd_solivagantsolivagant" target="_blank" class="social-icon"><i class="ti-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
    <a class="btn inner-link" href="#top">Back to Top </a>
</div>
</footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/flexslider.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/masonry.min.js"></script>
    <script src="js/twitterfetcher.min.js"></script>
    <script src="js/spectragram.min.js"></script>
    <script src="js/ytplayer.min.js"></script>
    <script src="js/countdown.min.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/parallax.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>