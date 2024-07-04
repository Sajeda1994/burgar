<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">

    <title> PASTA & BURGER</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css')}}" rel="stylesheet" />

</head>

<body class="{{App::islocale('ar') ? 'rtl' : ''}}">

    @include('sweetalert::alert')
    <div class="hero_area" style="min-height:75vh;">
        <div class="bg-box">
            <img src="{{asset('images/hero-bg.jpg')}}" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <span>
                            {{__('trans.PASTA & BURGER')}}
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  mx-auto ">

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    @auth
                                        <a href="{{ url('/home') }}" class="nav-link">{{__('trans.Home')}}</a>
                                    @else
                                            <a href="{{ route('login') }}" class="nav-link">{{__('trans.Login')}}</a>
                                        </li>
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a href="{{ route('register') }}" class="nav-link">{{__('trans.Register')}}</a>
                                            </li>
                                        @endif
                                    @endauth

                            @endif

                            <li class="nav-item">
                                <a class="nav-link" href="/allmenu">{{__('trans.Menu')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/aboutus">{{__('trans.About')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/booktable">{{__('trans.BookTable')}}</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse"
                                    data-target="#lang">{{__('trans.Languages')}}</a>
                                <ul class="collapse" id="lang" style="list-style:none">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <div class="user_option">

                            <a class="cart_link" href="/user.order.orderdetailsforuser">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path
                                                d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                             C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                              c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                             C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path
                                                d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                               c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                        </g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                    <g>
                                    </g>
                                </svg>
                                <span class="badge bg-danger rounded-circle w-5" style="position:absolute; top:10px; right:40px; ">{{$count ?? 0}}</span>
                            </a>
                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                            <a href="" class="order_online">
                                {{__('trans.ContactUs')}}
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            {{__('trans.Fast Food Restaurant')}}
                                        </h1>
                                        
                                            <p>{{__('trans.In our restaurant we serve fast and delicious food, as we have different meals from
                                         delicious burgers with French cheese. For more, browse the meals from here..')}}</p>
                                        
                                        <div class="btn-box">
                                            <a href="/burgerpage" class="btn1">
                                                {{__('trans.Browse Burgers')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            {{__('trans.Fast Food Restaurant')}}
                                        </h1>
                                        
                                            <p>{{__('trans.In our restaurant we serve fast and delicious food, as we have different meals from
                                         delicious pasta with meat and cheese. For more, browse the meals from here..')}}</p>

                                        
                                        <div class="btn-box">
                                            <a href="/pastapage" class="btn1">
                                                {{__('trans.Browse pasta')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            {{__('trans.Fast Food Restaurant')}}
                                        </h1>
                                        
                                         <p>{{__('trans.In our restaurant we serve fast and delicious food as we have different
                                         and delicious appetizersFor more browse the appetizers from here')}}</p>

                                        
                                        <div class="btn-box">
                                            <a href="/appetizerspage" class="btn1">
                                                {{__('trans.Browse Appetizers')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <ol class="carousel-indicators">
                        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#customCarousel1" data-slide-to="1"></li>
                        <li data-target="#customCarousel1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>

        </section>
        <!-- end slider section -->
    </div>


    <!-- end about section -->

    <!-- book section -->
    <section class="book_section layout_padding">
       @yield('bodysection')
    </section>
    <!-- end book section -->

    <!-- client section -->

    
    <!-- end client section -->

    <!-- footer section -->
    <footer class="footer_section mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            {{__('trans.Contact Us')}}
                        </h4>
                        <div class="contact_link_box">
                            <a href="#"  data-toggle="collapse"
                                    data-target="#loc">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span  >
                                    {{__('trans.Location')}}
                                </span>
                            </a>
                            <span class="collapse" id="loc">{{__('trans.Irbid-AmmanCenter-behined Mac restaurant')}}

                            </span>
                            <a href="#" data-target="#call" data-toggle="collapse">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    {{__('trans.Call')}} 
                                </span>
                            </a>
                            <span class="collapse" id="call">+9627700220022

                            </span>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    burgar_pasta@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            {{__('trans.Pasta & Burgur')}}
                        </a>
                        <p>
                           {{__('trans.You Can Follow our in social media facebook,twwiter,linkedin and instagram')}}
                        </p>
                        <div class="footer_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        {{__('trans.Opening Hours')}}
                    </h4>
                    <p>
                       {{__('trans.Everyday')}} 
                    </p>
                    <p>
                        9.00 {{__('trans.Am')}} -12.00 {{__('trans.Pm')}}
                    </p>
                </div>
            </div>
           
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>