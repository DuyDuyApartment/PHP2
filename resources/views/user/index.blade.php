<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" <link
        href="{{ asset('css/app.css') }}" rel="stylesheet" />
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

        /**/
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
                        <samp>Hotel</samp>

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
                                <a href="#map" class="inner-link" target="_self">Map &amp; Directions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#roofbar" class="inner-link" target="_self">RooF Terrace</a>
                            </li>
                        </ul>
                    </div>
                    <div class="module left">
                        <ul class="menu">
                            <li>
                                <a href="#tours" class="inner-link" target="_self">Tours </a>
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
                                    {{-- <a class="dropdown-item" href="{{ route('user') }}">Profile</a> --}}
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
        

                    @if (Auth::guest())
                    <script>
                        var a =document.getElementById("dropdownMenuButton");
                        function initFreshChat() {
                          window.fcWidget.init({
                            token: "e962a1f8-fa16-4514-bc05-e78b5bbc0ede",
                            host: "https://wchat.freshchat.com"
                          });

                        }
                        function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"Freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
                      </script>
                    @else
                    <?php  $ten= Auth::user()->kh_hoTen ;  ?>
                        <!-- Head -->
<script src="https://wchat.freshchat.com/js/widget.js"></script>
<!-- Head -->

<script>
    var a =document.getElementById("dropdownMenuButton");
    function initFreshChat() {
      window.fcWidget.init({
        token: "e962a1f8-fa16-4514-bc05-e78b5bbc0ede",
        host: "https://wchat.freshchat.com"
      });
      window.fcWidget.user.setFirstName('{{$ten}}');
    }
    function initialize(i,t){var e;i.getElementById(t)?initFreshChat():((e=i.createElement("script")).id=t,e.async=!0,e.src="https://wchat.freshchat.com/js/widget.js",e.onload=initFreshChat,i.head.appendChild(e))}function initiateCall(){initialize(document,"Freshchat-js-sdk")}window.addEventListener?window.addEventListener("load",initiateCall,!1):window.attachEvent("load",initiateCall,!1);
  </script>

                    @endif












                    <!-- logio  -->
                    <div class="collapse navbar-collapse module left" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                    </div>
                    <!-- logio -->
                </div>
            </div>



        </nav>
    </div>
    <div class="main-container">
        <section class="cover fullscreen image-slider slider-arrow-controls kenburns parallax">
            <ul class="slides">
                <li class="image-bg pt-xs-240 pb-xs-240">
                    <div class="background-image-holder">
                        <img alt="PhamTuanHotel Superior Room" class="background-image" src="img/a1.jpg">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Can Tho</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms have double or single beds, a private bathroom with shower and
                                    toilet, fan, air conditioning and telephone. All rooms have windows with direct
                                    views of the Pagoda or University. 132 Metro, An Khanh Ninh Kieu, Can Tho, Vietnam,
                                    Contact us
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <!-- aa -->

                                <!-- bbb -->
                            </div>
                        </div>

                    </div>

                </li>
                <li class="image-bg pt-xs-240 pb-xs-240">
                    <div class="background-image-holder">
                        <img alt="Can Tho PhamTuanHotel, Mekong Vietnam, Front Desk" class="background-image"
                            src="img/IMG_6790-1.JPG">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Can Tho</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms have double or single beds, a private bathroom with shower and
                                    toilet, fan, air conditioning and telephone. All rooms have windows with direct
                                    views of the Pagoda or University. 132 Metro, An Khanh Ninh Kieu, Can Tho, Vietnam,
                                    Contact us
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
                        <img alt="PhamTuanHotel, Can Tho, Mekong Delta, Vietnam" class="background-image"
                            src="img/IMG_04471.JPG">
                    </div>
                    <div class="align-bottom">
                        <div class="row">
                            <div class="col-sm-12">
                                <hr class="mb24">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 text-center-xs mb-xs-24">
                                <h4 class="uppercase mb0 bold">Hotel</h4>
                                <span>Top Ranked Value Mini-Hotel in Can Tho</span>
                            </div>
                            <div class="hidden-sm hidden-xs col-md-6">
                                <p>
                                    Our compact rooms have double or single beds, a private bathroom with shower and
                                    toilet, fan, air conditioning and telephone. All rooms have windows with direct
                                    views of the Pagoda or University. 132 Metro, An Khanh Ninh Kieu, Can Tho, Vietnam,
                                    Contact us
                                </p>
                            </div>
                            <div class="col-sm-6 col-xs-12 text-right text-center-xs col-md-3">
                                <a class="btn btn btn-white mt16 btn-filled" href="{{ route('orders.listlp') }}"
                                    target="_blank">Book Now</a>
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
                                class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <div class="container">
                <div class="row v-align-children">
                    <div class="col-sm-5">
                        <h3>Book a Room at Hotel</h3>

                        <p class="lead mb40">
                            The mango-yellow painted rooms have a private bathroom, shower, toilet, fan, air
                            conditioning and telephone. Below the slightly elevated beds luggage can be stored
                            conveniently. The very small and basic option - Budget Single and Budget Double - already
                            offer a convenient set up many international travelers are looking for. Superior Double
                            rooms offer more space and a bigger bed, a desk, chair, a large window. Deluxe Double rooms
                            additionally offer a PC and facilities such as a closet, shelves, a refrigerator and a water
                            kettle.
                        </p>
                        <div class="overflow-hidden mb32 mb-xs-24">
                            <i class="icon pull-left ti ti-star icon-sm"></i>
                            <h6 class="uppercase mb0 inline-block p32">consistently High Guest Satisfaction <br>Since
                                2012</h6>
                        </div>
                        <div class="overflow-hidden mb32 mb-xs-24">
                            <i class="ti-medall-alt icon icon-sm pull-left"></i>
                            <h6 class="uppercase mb0 inline-block p32">Top Ranked Value Hotel in Can Tho City</h6>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="pricing-table pt-1 text-center emphasis">
                            <h5 class="uppercase bold"><br>Starting FROM</h5>
                            <span class="price">200.000 VND<br></span>
                            <a class="btn btn-white btn-lg" href="{{ route('orders.listlp') }}" target="_blank">Book Now</a>
                            <p>
                                <a href="/cdn-cgi/l/email-protection#f0999e969fb0989f84959c889f9199de939f9d"
                                    target="_self">Contact Us for</a>
                                <br> large group bookings&nbsp;<br>Contact us<br><br><br>
                            </p>
                        </div>

                    </div>
                </div>

            </div>

        </section><a id="rooms" class="in-page-link"></a>

        <section class="projects">
            <div class="container">
                <div class="masonry-loader">
                    <div class="col-sm-12 text-center">
                        <div class="spinner"></div>
                    </div>
                </div>
                <div class="row masonry masonryFlyIn">
                    <div class="col-sm-6 masonry-item project" data-filter="People">
                        <div class="image-tile hover-tile text-center">
                            <img alt="Delux Room" class="background-image"
                                src="img/3-rooms-size-L-with-fan-ac-size-s-m-economy1.JPG">
                            <div class="hover-state">
                                <a href="{{ route('orders.listlp') }}" target="_blank">
                                    <h3 class="uppercase mb8">Deluxe Double</h3>
                                    <h6 class="uppercase">Beautiful room, mango-yellow painted, queen bed (1.60m width),
                                        large window, private bathroom, fan, AC, desk, chair, shelves, wardrobe,
                                        computer with screen or laptop, media library with over 100 movies,
                                        refrigerator, water kettle, free coffee, additional facilities, free toiletries,
                                        WiFi Internet and LAN</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 masonry-item project" data-filter="People">
                        <div class="image-tile hover-tile text-center">
                            <img alt="Superior Room" class="background-image" src="img/2013_01_25_s100_2881.jpg">
                            <div class="hover-state">
                                <a href="{{ route('orders.listlp') }}" target="_blank">
                                    <h3 class="uppercase mb8">Superior Double</h3>
                                    <h6 class="uppercase">Mango-yellow painted room, double bed (1.5m width), large
                                        window, private bathroom, fan, AC, desk, chair, free toiletries, WiFi Internet
                                        and LAN, water kettle, free coffee, free toiletries.</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 masonry-item project" data-filter="People">
                        <div class="image-tile hover-tile text-center">
                            <img alt="Twin Room" class="background-image" src="img/2013_01_25_s100_3041.jpg">
                            <div class="hover-state">
                                <a href="{{ route('orders.listlp') }}" target="_blank">
                                    <h3 class="uppercase mb8">Superior Twin</h3>
                                    <h6 class="uppercase">Mango-yellow painted room with two extra-long single beds
                                        (0.8m width), large window, private bathroom, fan, AC, desk, chair, free
                                        toiletries, WiFi Internet and LAN.</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 masonry-item project" data-filter="People">
                        <div class="image-tile hover-tile text-center">
                            <img alt="Budget Double Room" class="background-image" src="img/2013_01_25_s100_2821.jpg">
                            <div class="hover-state">
                                <a href="{{ route('orders.listlp') }}" target="_blank">
                                    <h3 class="uppercase mb8">Small Double Budget</h3>
                                    <h6 class="uppercase">Very small beautiful budget double room, double bed (1.40m
                                        width), mango-yellow painted with window, private bathroom, fan, AC, free
                                        toiletries, WiFi.</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 masonry-item project" data-filter="People">
                        <div class="image-tile hover-tile text-center">
                            <img alt="Single Budget Room" class="background-image" src="img/IMG_67041.JPG">
                            <div class="hover-state">
                                <a href="{{ route('orders.listlp') }}" target="_blank">
                                    <h3 class="uppercase mb8">Small Single Budget</h3>
                                    <h6 class="uppercase">Very small and nice budget single room, double bed (1.20m
                                        width), mango-yellow painted with window, private bathroom, fan, AC, free
                                        toiletries, WiFi.</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section><a id="about" class="in-page-link"></a>

        <section class="bg-secondary">
            <?php $phong = DB::select(' SELECT * from phong as p INNER JOIN loai_phong as lp ON
            p.lp_ma=lp.lp_ma;
            '); ?>
            <div class="container">
                <div class="row mb64 mb-xs-24">
                    <div class="col-md-10 col-md-offset-1 col-sm-12 text-center">
                        <h3>About Hotel</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 col-md-offset-1 col-sm-6 mb40 mb-xs-24">
                        <i class="ti-layers icon inline-block mb16 fade-3-4"></i>
                        <h4>Compact and Comfortable Rooms</h4>
                        <p style="color: #fff">Hotel opened 2012 as a family-run value mini-hotel. The
                            mango-yellow painted rooms have a private bathroom, shower, toilet, fan, air conditioning
                            and telephone. Below the slightly elevated beds luggage can be stored conveniently. The
                            concept of Hotel is "no frills, but clean and relaxed".</p>
                    </div>
                    <div class="col-md-5 col-sm-6 mb40 mb-xs-24">
                        <i class="icon inline-block mb16 fade-3-4 ti ti-heart"></i>
                        <h4>Friendly Service&nbsp;and Fair Prices</h4>
                        <p style="color: #fff">At Hotel we want to provide a good service at a fair price for
                            you - just like what we hope to experience if we would go abroad. We are constantly working
                            hard to keep our standards up and train new staff. Whoever is taking care of you, be it a
                            family member or staff, we are always eager to help you and assist you in your travel plans.
                            You will get information on restaurants, tours, bus coaches and more.<br><br><br> </p>
                    </div>
                    <div class="col-md-5 col-md-offset-1 col-sm-6 mb40 mb-xs-24">
                        <i class="icon inline-block mb16 fade-3-4 pe-7s-sun"></i>
                        <h4>Light, Air, Clean Design and Art Exhibition</h4>
                        <p style="color: #fff">Where there used to be a Mango orchard eighty years ago we constructed a
                            hotel on the typical Vietnamese building width of only 4 metres. The design of the
                            construction focuses - within the limits of the climate and possibilities in Vietnam - on
                            light, air circulation and environmentally friendliness. The architectural design also
                            embodies the contradiction of the concept of private and public spaces in East and West and
                            merges these concepts in a place where different cultures meet, a place defined by a setting
                            of a hotel. Nonetheless, it is an artistic budget hotel that is less defined by conventions
                            like any five start hotel and therefore offers the opportunity to try out new approaches,
                            however small they may be. Another goal of the building's design is the aim for
                            practicality, efficiency and usefulness that reference the idea of design thinking or
                            following early concepts of the Bauhaus. One of those small practical aspects is how the
                            interior design&nbsp;facilitates the house keeping activities. All areas in the rooms can be
                            easily reached by the staff. All furniture offers spiel to the floor. A clean and healthy
                            room can be easily achieved to ensure the guests well-being.&nbsp;Extending on the goal of
                            light and air, the hotel uses the floors as a constant exhibition space to inspire guests
                            and staff to travel even further with their mind or maybe just home or hence wherever the
                            free spirit would like to go? Pieces of the exhibition range from Open Source Libre Graphics
                            computer designs to traditional Vietnamese paintings again merging different worlds in a new
                            context.</p>
                    </div>
                    <div class="col-md-5 col-sm-6 mb40 mb-xs-24">
                        <i class="icon inline-block mb16 fade-3-4 fa fa-pagelines"></i>
                        <h4>Promoting Eco-Tourism and Healthy Living</h4>
                        <p style="color: #fff">The 'Xoai' promotes Eco tourism. The house uses exclusively energy-saving
                            lamps. The hot water supply is carried completely by solar collectors. It may take a few
                            minutes for hot water to come through sometimes, but you can shower with the good conscience
                            of using solar heated water. Most rooms are small which allows guests to cool them down
                            quickly with the AC, and at the same time providing comfort and combining an ecological and
                            economic approach. Windows in all rooms offer healthy fresh air. Small bathroom windows help
                            to avoid swamp and to solve pressure substitutions with potential odor issues in the pipe
                            system which is a common challenge in the Vietnamese climate.&nbsp;Please help to save the
                            environment. Use the air-condition and electrical appliances only when you need them and
                            re-use towels, if possible. Thank you.<br></p>
                    </div>
                </div>

            </div>

        </section>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-1">
                        <div class="feature bordered">
                            <h1 class="large uppercase mb64 mb-xs-24">xin chào!</h1>
                            <p class="mb80 mb-xs-24">
                                Our compact rooms have double or single beds, a private bathroom with shower and toilet,
                                fan, air conditioning and telephone. All rooms have windows with direct views of the
                                Pagoda or University. Computers with Internet access are in the lobby and free WiFi
                                throughout the hotel. An elevator brings you up to the roof terrace, where you can relax
                                in a hammock.
                            </p>
                            <a class="btn btn-lg btn-filled" href="{{ route('orders.listlp') }}" target="_blank">Book A
                                Room</a>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <img class="mt80 mt-xs-0 mb24" alt="Pic" src="img/2013_01_25_s100_306.jpg">
                        <img class="col-md-pull-4 relative" alt="Pic" src="img/2013_01_25_s100_287.jpg">
                    </div>
                </div>

            </div>

        </section><a id="roofbar" class="in-page-link"></a>

        <section class="image-slider slider-all-controls controls-inside pt0 pb0 height-70 parallax">
            <ul class="slides">
                <li class="overlay image-bg">
                    <div class="background-image-holder">
                        <img alt="Roof bar Can Tho PhamTuanHotel" class="background-image" src="img/IMG_01971.JPG">
                    </div>
                    <div class="container v-align-transform">
                        <div class="row text-center">
                            <div class="col-md-10 col-md-offset-1">
                                <h2 class="mb-xs-16">Hotel Roof Terrace</h2>
                                <p class="lead mb40">The Roof Terrace on the sixth floor is the place to relax, have a
                                    cold drink and enjoy the view over the city. Drinks can be ordered at the ground
                                    floor front desk. During days guests can enjoy browsing the Internet. In the
                                    evenings you can meet other travelers at parties that are organized from time to
                                    time.</p>
                                <a class="btn btn-lg" href="{{ route('orders.listlp') }}" target="_blank">CALL Contact us</a>
                                <a class="btn btn-lg btn-filled" href="{{ route('orders.listlp') }}" target="_blank">Book a
                                    ROOM</a>
                            </div>
                        </div>

                    </div>

                </li>
                <li class="overlay image-bg">
                    <div class="background-image-holder">
                        <img alt="View from Can Tho PhamTuanHotel" class="background-image" src="img/IMG_01911.JPG">
                    </div>
                    <div class="container v-align-transform">
                        <div class="row text-center">
                            <div class="col-md-10 col-md-offset-1">
                                <h2 class="mb-xs-16">Hotel Roof Terrace</h2>
                                <p class="lead mb40">Enjoy a fresh breeze on the roof and observe activities on one of
                                    the busiest streets in Cantho. Just opposite the hotel you find the Quang Duc
                                    Pagoda. On the roof there are typical plants from Vietnam. <br>Do you recognize
                                    which trees are Mango trees?</p>
                                <a class="btn btn-lg btn-filled" href="{{ route('orders.listlp') }}" target="_blank">Call Contact us</a>
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
                        <h4 class="uppercase mb16">Hotel Gallery</h4>
                        <p class="lead mb64">
                            Impressions</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="lightbox-grid square-thumbs" data-gallery-title="Gallery">
                            <ul>
                                <li>
                                    <a href="img/2013_01_25_s100_282.jpg" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/2013_01_25_s100_282.jpg">
                                            <div class="vnw">
                                                <div data-glyph="image" class="oi vnv" title="Edit Image"
                                                    vof="vjs-1441313488878-12"></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/2013_01_25_s100_310.jpg" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/2013_01_25_s100_310.jpg">
                                            <div class="vnw">
                                                <div data-glyph="image" class="oi vnv" title="Edit Image"
                                                    vof="vjs-1441313488878-16"></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/3-rooms-size-L-with-fan-ac-size-s-m-economy1small.JPG"
                                        data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image"
                                                src="img/3-rooms-size-L-with-fan-ac-size-s-m-economy1small.JPG">
                                            <div class="vnw">
                                                <div data-glyph="image" class="oi vnv" title="Edit Image"
                                                    vof="vjs-1441313488878-20"></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/IMG_6617guests.JPG" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/IMG_6617guests.JPG">
                                            <div class="vnw">
                                                <div data-glyph="image" class="oi vnv" title="Edit Image"
                                                    vof="vjs-1441313488878-24"></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/IMG_6629room.JPG" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/IMG_6629room.JPG">
                                            <div class="vnw">
                                                <div data-glyph="image" class="oi vnv" title="Edit Image"
                                                    vof="vjs-1441313488878-28"></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/freewater.JPG" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/freewater.JPG">
                                            <div class="vnw">
                                                <div data-glyph="image" class="oi vnv" title="Edit Image"
                                                    vof="vjs-1441313488878-32"></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/2013_01_25_s100_290.jpg" data-lightbox="Gallery" data-title="image">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="image" class="background-image" src="img/2013_01_25_s100_290.jpg">
                                            <div class="vnw">
                                                <div data-glyph="image" class="oi vnv" title="Edit Image"
                                                    vof="vjs-1441313488878-36"></div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="img/2013_01_25_s100_291.jpg" data-lightbox="Gallery"
                                        data-title="Bathroom Can Tho PhamTuanHotel">
                                        <div class="background-image-holder fadeIn">
                                            <img alt="Bathroom Can Tho PhamTuanHotel" class="background-image"
                                                src="img/2013_01_25_s100_291.jpg">
                                            <div class="vnw">
                                                <div data-glyph="image" class="oi vnv" title="Edit Image"
                                                    vof="vjs-1441313488878-40"></div>
                                            </div>
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
                        <h2 class="mb8">Enjoy your stay in the center of the Mekong Delta</h2>
                        <p class="lead mb40 mb-xs-24">
                            Since 2012 we consistently achieve high rankings and outstanding guest reviews for our value
                            mini hotel.&nbsp;<br>Our address is:&nbsp;<br><br>Hotel Cantho&nbsp;<br>93 Mau Than
                            Street&nbsp;<br>Xuan Khanh, Ninh Kieu&nbsp;<br>92000 Can Tho
                            City&nbsp;<br>Vietnam&nbsp;<br>Email:phamquoctuanezg@gmail.com&nbsp;<br>CALL Contact us<br></p>
                        <a class="btn btn-filled btn-lg mb0" href="{{ route('orders.listlp') }}" target="_blank">Book
                            Online</a>
                    </div>
                </div>

            </div>

        </section>
        <section>
            <div class="container">
                <div class="row v-align-children">
                    <div class="col-sm-6 col-md-5">
                        <h2 class="uppercase color-primary">The Perfect Place To Stay In Can Tho</h2>
                        <hr>
                        <p>
                            Our family loves mangoes. Behind the house are small mango trees and we also painted the
                            building in beautiful mango-yellow color. We also love art. From Libre Graphics and Open
                            Source computer art to traditional Vietnamese paintings you will find some interesting art
                            pieces in the house.</p>
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
                                <h1 class="large">7 </h1>
                                <h5 class="uppercase">Floors</h5>
                            </div>
                        </div>

                        <div class="col-sm-6 text-center">
                            <div class="feature bordered mb30">
                                <h1 class="large">2 </h1>
                                <h5 class="uppercase">ROOF Terraces</h5>
                            </div>
                        </div>

                        <div class="col-sm-6 text-center">
                            <div class="feature bordered mb30">
                                <h1 class="large">42</h1>
                                <h5 class="uppercase">WALL Arts</h5>
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
                        <h1 class="uppercase mb24 bold italic">Hotel</h1>
                        <h5 class="uppercase italic fade-1-4">"friendly Family Hotel With a fair price"</h5>
                        <hr class="visible-xs">
                    </div>
                    <div class="col-md-5 col-sm-7">
                        <p>
                            The Can Tho Hotel welcomes International travelers since 2012 and we are working hard to
                            make every guests' stay as comfortable as possible. Our family hotel is the top ranked value
                            hotel in Cantho city. We offer small and comfortable rooms, a beautiful roof terrace and a
                            wholehearted service. One of our slogans is fair and friendly service for a fair price.</p>

                        <p>
                            The hotel is located in the Xuan Khanh quarter in vicinity to Can Tho University, the Tham
                            Tuong church and the famous Quang Duc Pagoda. Our compact rooms have double or single beds,
                            a private bathroom with shower and toilet, fan, air conditioning and telephone. All rooms
                            have windows with direct views of the Pagoda or University. Computers with Internet access
                            are in the lobby and free WiFi throughout the hotel. An elevator brings you up to the roof
                            terrace, where you can relax in a hammock. It is a perfect spot to escape from the crowded
                            street, to catch up with other travelers and locals.</p>

                        <p>
                            The house uses exclusively energy-saving lamps. The hot water supply is carried completely
                            by solar collectors.<br>
                        </p>
                        <p>Thank you for your interest in our hotel. We hope to welcome you soon at the Xoai and in the
                            Mekong Delta and we wish you an excellent trip.<br>
                        </p>
                        <p>Ms. Hong Phuc Dang<br>Hotel Manager<br>
                        </p>
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
                            <h6 class="uppercase mb16 mb-xs-8">Mekong Tours</h6>
                            <h3>Food Tours and Floating Market Tours in Can Tho</h3>
                        </div>
                    </div>

                    <div class="row mb32 mb-xs-16">
                        <div class="col-md-offset-2 col-sm-10 col-sm-offset-1 col-md-9">
                            <img alt="Floating Market in Can Tho" class="mb32 mb-xs-16" src="img/floatingmarket.jpg">
                            <p class="lead">
                                Enjoy beautiful tours in Cantho and the delta with the Mekong Tours Information Bureau.
                                Mekong Tours is your friendly local tour and hotel provider operated from Can Tho city
                                since 2009. We offer tours to floating markets, motorbike tours with young guides, pay
                                what you like food tours, kids tours and customized travel tours in the Mekong Delta.
                            </p>
                            <p class="lead">We thrive to provide visitors of the Mekong Delta with an enjoying, truthful
                                and environmentally friendly experience. If we hear that you found our tours 'lovely'
                                and 'amazing', it will make us amazingly happy as well. So, please let us know anything
                                that you found lovely and liked a lot and ideas you have to improve our service.<br></p>
                            <p class="lead">Thank you for your interest in Vietnam. We hope you enjoy the beauty of the
                                Mekong Delta.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
                            <a class="mb48 mb-xs-32 btn btn-lg btn-filled" href="http://mekongtours.info"
                                target="_blank">Book a Tour in Can Tho</a>
                            <hr>
                        </div>
                    </div>
                </div>

            </div>
        </section><a id="map" class="in-page-link"></a>

        <section class="p0">
            <div class="map-holder pt180 pb180">
                <iframe src="https://www.google.com/maps/d/embed?mid=zixPfRnqJQps.kr_qew2t12kE"></iframe>
            </div>
        </section><a id="location" class="in-page-link"></a>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-sm-12 col-md-9">
                        <h4 class="uppercase mb80">How To Get To Hotel</h4>
                        <div class="tabbed-content button-tabs">
                            <ul class="tabs">
                                <li class="active">
                                    <div class="tab-title">
                                        <span>By Bus from <br>Ho Chi Minh City</span>
                                    </div>
                                    <div class="tab-content">
                                        <p>Go to Le Hong Phong Street in the center of Ho Chi Minh City. There are
                                            plenty of small bus operators and two big bus operators servicing Can Tho:
                                            Thanh Buoi and Phuong Trang. Thanh Buoi buses travel faster - about 3.5
                                            hours - due to shorter stop overs. The company is located in 202 Le Hong
                                            Phong Street. You can book by phone +84 (0)8 38 333 999 (in Vietnamese). The
                                            price in Spring 2015 is 120.000 VND (~6 USD) per person. From Le Hong Phong
                                            the operators will bring you to Ben Xe Mien Tay, the main bus station for
                                            the Mekong Delta, where the tour buses leave. Alternatively you can go
                                            directly to Ben Xe Mien Tai Bus Station by yourself.&nbsp;<br><br>Inside the
                                            bus the customer assistant will ask you, where you want to be dropped off in
                                            Cantho. Please tell him the name of the hotel and hand him the address (most
                                            of them will already know the hotel). Small shuttles of the bus operators
                                            will bring you directly to the hotel after you arrive at the central bus
                                            station. This is included in your bus fair from Ho Chi Minh City. You do not
                                            need to take a taxi or motorbike, if you arrive by bus. <br><br>In case you
                                            are not arriving with a major bus operator you may need to&nbsp;to get a
                                            ride directly to the hotel, please take a taxi or motorbike. Usually, taxi
                                            is the same price as a motorbike. Please hand over the driver the address
                                            written on a paper, otherwise it might happen that the driver puts you off
                                            in another area or drives around the city. The address: Hotel, 132
                                            Metro, An Khanh Ninh Kieu, 0921 277 127.&nbsp;The charge should be in any
                                            case between 30-50,000VND (1.5-3 USD) depending on the day time, size and
                                            standard of the vehicle you are using.&nbsp;<br><br>The hotel is centrally
                                            located near the university. Please look out for a seven storey yellow
                                            building. If the driver has difficulties, please ask him to call the hotel
                                            to get directions. Please do not forget to point out the district 'Xuan
                                            Khanh'. Mau Than street is the longest street of the Mekong Delta and the
                                            house number "93" appears several times in the street in different
                                            areas.&nbsp;</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tab-title">
                                        <span>By Bus From the<br>Mekong&nbsp;Delta<br></span>
                                    </div>
                                    <div class="tab-content">
                                        <p>Many bus companies operate in the Mekong Delta. The major bus companies will
                                            have a service to bring you directly to your destination in Cantho. Please
                                            hand the driver the address and telephone number of the hotel and he/she
                                            will take care to put you off at the hotel: Hotel, 132 Metro, An
                                            Khanh Ninh Kieu, 0921 277 127.&nbsp;<br><br>There are two main bus stations
                                            in Cantho. If you happen not to get a ride directly to the hotel, please
                                            take a taxi or motorbike. Hand over the driver the address written on a
                                            paper, otherwise it might happen that the driver puts you off in another
                                            area or drives around the city. The charge should be in any case between
                                            30-50,000VND (1.5-3 USD) depending on the day time, size and standard of the
                                            vehicle you are using. <br><br>The hotel is centrally located near the
                                            university. Please look out for a seven storey yellow building. If the
                                            driver has difficulties, please ask him to call to get directions. Please do
                                            not forget note down and point out the district 'Xuan Khanh'. Mau Than
                                            street is the longest street of the Mekong Delta and the house number "93"
                                            appears several times in the street in different areas.&nbsp;</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="tab-title">
                                        <span>By Air Plane<br><br></span>
                                    </div>
                                    <div class="tab-content">
                                        <p>
                                            Cantho has a new and very modern airport. The first flight services
                                            introduced are from Hanoi, Ho Chi Minh City (Saigon) and Phu Quoc. There are
                                            taxis available at the exit. A taxi ride from the airport takes
                                            approximately 20 minutes. The fare is approximately 9 USD (200,000VND).
                                            Please hand the driver the address and telephone number of the
                                            hotel:&nbsp;Hotel,&nbsp;132 Metro, An Khanh Ninh Kieu,&nbsp;0921 277
                                            127.&nbsp;<br><br>The hotel is centrally located near the university. Please
                                            look out for a seven storey yellow building. If the driver has difficulties,
                                            please ask him to call to get directions. <br><br>Please do not forget to
                                            note down and point out the district 'Xuan Khanh'. Mau Than street is the
                                            longest street of the Mekong Delta and the house number "93" appears several
                                            times in the street in different areas.&nbsp;</p>
                                    </div>
                                </li>
                                <li>

                                    <div class="tab-content">
                                        <p>
                                            Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit
                                            quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda
                                            est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis
                                            debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae
                                            sint et molestiae non recusandae.
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
                        <h6 class="uppercase">Hotel Services</h6>
                        <hr class="mb160 mb-xs-24">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-10">
                        <h1 class="thin">Friendly, Comfortable and a Fair Price.</h1>
                    </div>
                </div>

                <div class="row mb160 mb-xs-0">
                    <div class="col-md-6 col-sm-8">
                        <p class="lead">
                            Family hotel Hotel Can Tho is the top ranked value hotel in Cantho city. We offer small and
                            comfortable rooms, a beautiful roof terrace and a wholehearted service.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-xs-24">
                        <i class="icon mb32 ti ti-crown"></i>
                        <h6 class="uppercase">What's Included</h6>
                        <ul>
                            <li>Free City Maps&nbsp;<br>Free Luggage Storage&nbsp;<br>Free Computers in
                                Lobby&nbsp;<br>Free Wifi in Hotel&nbsp;<br>Free Wired Lan in Rooms&nbsp;<br>Free Media
                                Library&nbsp;<br>Free Hot and Cold Water from Water Dispenser&nbsp;<br>Free Towels and
                                Linen&nbsp;<br>Free Hairdryers&nbsp;<br>Free Iron and Iron Board at Reception
                                Desk&nbsp;<br>Free Phone Chargers&nbsp;<br>Free International Adapters&nbsp;<br></li>





                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-xs-24">
                        <i class="icon mb32 ti ti-home"></i>
                        <h6 class="uppercase">Facilities</h6>
                        <ul>
                            <li>24 Hour Security&nbsp;<br>24 Hour Reception&nbsp;<br>Air Conditioning&nbsp;<br>Bicycle
                                Parking&nbsp;<br>Cafe&nbsp;<br>Computers in Lobby&nbsp;<br>Currency
                                Exchange&nbsp;<br>Elevator&nbsp;<br>Private bathroom for each unit&nbsp;<br>Hot
                                Showers&nbsp;<br>Housekeeping&nbsp;<br>Internet Access (Wifi/LAN)&nbsp;<br>Key Card
                                Access&nbsp;<br>Laundry Service&nbsp;<br>Meeting Rooms&nbsp;<br>Pets upon
                                Request&nbsp;<br>Roof Terrace&nbsp;<br>Safe Deposit Box (Front
                                Desk)&nbsp;<br>Tours/Travel Desk&nbsp;<br>Wall Art throughout Building&nbsp;<br>Wall
                                Fan&nbsp;</li>





                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-xs-24">
                        <i class="icon mb32 ti ti-shift-right"></i>
                        <h6 class="uppercase">Check-In/Out Details</h6>
                        <ul>
                            <li>Check-in: 14:00 pm&nbsp;<br>Early Check-ins of one to two hours are possible, if rooms
                                available. For earlier checkins additional rates apply.&nbsp;<br>Latest Check-out: 12:00
                                pm&nbsp;<br>For late check-outs, additional rates apply. Guests who would like to check
                                out later please confirm with the front desk.</li>





                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-xs-24">
                        <i class="icon mb32 et-line-search"></i>
                        <h6 class="uppercase">Policy</h6>
                        <ul>
                            <li>Non Smoking&nbsp;<br>No curfew&nbsp;<br>No minimum stay required&nbsp;<br>Child
                                Friendly&nbsp;<br>Eco Friendly&nbsp;</li>




                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-xs-24">

                        <h6 class="uppercase">Cancellation Policy</h6>
                        <ul>
                            <li>Different booking websites have different policies. Please refer to the information
                                provided during the booking process.&nbsp;</li>

                        </ul>
                    </div>
                </div>

            </div>

        </section>

        <footer class="footer-1 bg-secondary">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-md-6">
                        <div class="widget">
                            <h6 class="title">More Info on Can tho</h6>
                            <hr>
                            <ul class="link-list recent-posts">
                                <li>
                                    <a href="http://mekongtours.info/" target="_blank">Mekong Tours Information:
                                        mekongtours.info</a>

                                </li>
                                <li>
                                    <a href="https://en.wikipedia.org/wiki/C%E1%BA%A7n_Th%C6%A1" target="_blank">Cantho
                                        in the Wikipedia: en.wikipedia.org/wiki/Cần_Thơ</a>

                                </li>
                                <li>
                                    <a href="https://en.wikivoyage.org/wiki/Can_Tho" target="_blank">Cantho on
                                        Wikivoyage: en.wikivoyage.org/wiki/Can_Tho</a>

                                </li>
                                <li>
                                    <a href="http://wikitravel.org/en/Can_Tho" target="_blank">Cantho on Wikitravel:
                                        wikitravel.org/en/Can_Tho</a>

                                </li>
                                <li>
                                    <a href="http://travelfish.org/location/vietnam/mekong_delta/can_tho/can_tho"
                                        target="_blank">Cantho in Travelfish.org:
                                        travelfish.org/location/vietnam/mekong_delta/can_tho/can_tho</a>

                                </li>
                                <li>
                                    <a href="https://lonelyplanet.com/vietnam/mekong-delta/can-tho"
                                        target="_blank">Cantho on the Lonely Planet:
                                        lonelyplanet.com/vietnam/mekong-delta/can-tho</a>

                                </li>
                                <li>
                                    <a href="http://www.canthoinfo.com/" target="_blank">Cantho Information Portal
                                        canthoinfo.com</a>

                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h6 class="title">Latest Updates</h6>
                            <hr>
                            <div class="twitter-feed">
                                <div class="tweets-feed" data-widget-id="639896312280948736">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h6 class="title">Instagram</h6>
                            <hr>
                            <div class="instafeed" data-user-name="xoaiv">
                                <ul></ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <span class="sub" style="color: #fff">Hotel Cantho | 132 Metro, An Khanh Ninh Kieu,
                            92000 Can Tho City, Vietnam<br>Web Hotel.com | Email 
                            <a href="mailto:contact@hotel.com">contact@hotel.com</a><br>Phone
                            Contact us</span>
                    </div>
                    <div class="col-sm-6 text-right">
                        <ul class="list-inline social-list">
                            <li>
                                <a href="https://twitter.com" target="_self">
                                    <i class="ti-twitter-alt"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://facebook" target="_blank">
                                    <i class="ti-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://google.com/" target="_blank">
                                    <i class="ti ti-google"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/" target="_blank">
                                    <i class="ti ti-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <a class="btn btn-sm fade-half back-to-top inner-link" href="#top">Top</a>
        </footer>
    </div>


    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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


    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
