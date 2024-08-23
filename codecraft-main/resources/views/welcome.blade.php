<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>CodeCraft - Homepage</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('mainsite-template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('mainsite-template/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('mainsite-template/assets/css/templatemo-cyborg-gaming.css') }}">
    <link rel="stylesheet" href="{{ asset('mainsite-template/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('mainsite-template/assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <h4><span style="color: white;">&lt;/&gt;</span>CODE<span
                                    style="color: lightpink;">CRAFT</span></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Search End ***** -->
                        {{-- <div class="search-input">
                      <form id="search" action="#">
                        <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                        <i class="fa fa-search"></i>
                      </form>
                    </div> --}}
                        <!-- ***** Search End ***** -->
                        <!-- ***** Menu Start ***** -->
                        @auth
                            <ul class="nav">
                                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li>
                                        <a :href="route('logout')"
                                            onclick="event.preventDefault();
                                      this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a>
                                    </li>

                                </form>
                            </ul>
                        @endauth

                        @guest
                            <ul class="nav">
                                <li><a href="{{ route('becometeacher') }}">Become a Teacher</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                <li><a href="{{ route('login') }}">Login</a></li>

                            </ul>
                        @endguest

                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    <!-- ***** Banner Start ***** -->
                    <div class="main-banner">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="header-text">
                                    <h4> Welcome to <em>CodeCraft!</em></h4>
                                    <h6>Welcome To CodeCraft! an online Platform for Programming with Personal
                                        programming coaches</h6>
                                    <h6><span style="color: lightpink;">LETS DIVE INTO THE MASTERY OF CODING!</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->

                    <!-- ***** Most Popular Start ***** -->
                    <div class="most-popular">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section">
                                    <h5>Learn programming for academic journey with our trusted instructors</h5>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="{{ asset('mainsite-template/assets/images/popular-01.jpg') }}"
                                                alt="">
                                            <h4>Alyxsis Salac<br><span>BSIT</span></h4>
                                            <ul>
                                                <li><i class="fa fa-star"></i> 4.8</li>
                                                <li><i class="fa fa-download"></i> 2.3M</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="{{ asset('mainsite-template/assets/images/popular-02.jpg') }}"
                                                alt="">
                                            <h4>Charmaine Cacho<br><span>BSIT</span></h4>
                                            <ul>
                                                <li><i class="fa fa-star"></i> 4.8</li>
                                                <li><i class="fa fa-download"></i> 2.3M</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="{{ asset('mainsite-template/assets/images/popular-03.jpg') }}"
                                                alt="">
                                            <h4>John Doe<br><span>CpE</span></h4>
                                            <ul>
                                                <li><i class="fa fa-star"></i> 4.8</li>
                                                <li><i class="fa fa-download"></i> 2.3M</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="item">
                                            <img src="{{ asset('mainsite-template/assets/images/popular-04.jpg') }}"
                                                alt="">
                                            <h4>Joselito Mandap<br><span>MSCpE</span></h4>
                                            <ul>
                                                <li><i class="fa fa-star"></i> 4.8</li>
                                                <li><i class="fa fa-download"></i> 2.3M</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="main-button">
                                            <a href="">Discover More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Most Popular End ***** -->

                    <!-- ***** Gaming Library Start ***** -->
                    <div class="gaming-library">
                        <div class="col-lg-12">
                            <div class="heading-section">
                                <h4><em>Explore</em> Different Fields</h4>
                            </div>
                            <div class="item">
                                <ul>
                                    <li><img src="{{ asset('mainsite-template/assets/images/game-01.jpg') }}"
                                            alt="" class="templatemo-item"></li>
                                    <li>
                                        <h4>Python</h4>
                                    </li>
                                    <li>
                                      <h4><span><span>Programming Language</span></span></h4>
                                    </li>
                                    <li><div class="main-border-button"><a href="#">Learn More</a></div></li>
                                </ul>
                            </div>
                            <div class="item">
                                <ul>
                                    <li><img src="{{ asset('mainsite-template/assets/images/game-02.jpg') }}"
                                            alt="" class="templatemo-item"></li>
                                    <li>
                                        <h4>PHP</h4>
                                    </li>
                                    <li>
                                      <h4><span>Backend Programming Language</span></h4>
                                    </li>
                                    <li><div class="main-border-button"><a href="#">Learn More</a></div></li>
                                </ul>
                            </div>
                            <div class="item last-item">
                                <ul>
                                    <li><img src="{{ asset('mainsite-template/assets/images/game-03.jpg') }}"
                                            alt="" class="templatemo-item"></li>
                                    <li>
                                        <h4>Ruby On Rails</h4>
                                    </li>
                                    <li>
                                        <h4><span>Backend Programming Language</span></h4>
                                    </li>

                                    
                                    <li><div class="main-border-button"><a href="#">Learn More</a></div></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="main-button">
                                <a href="profile.html">View All</a>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Gaming Library End ***** -->
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2024 <a href="#">CodeCraft</a> Company. All rights reserved.
                </div>
            </div>
        </div>
    </footer>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('mainsite-template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('mainsite-template/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('mainsite-template/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('mainsite-template/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('mainsite-template/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('mainsite-template/assets/js/popup.js') }}"></script>
    <script src="{{ asset('mainsite-template/assets/js/custom.js') }}"></script>


</body>

</html>
