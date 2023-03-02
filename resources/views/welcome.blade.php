<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', 'Foottricks') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" sizes="114x114" href="{{ asset('assets/img/ic_launcher.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

        <div id="logo">
            <h1><a href="{{ url('/home') }}">{{ config('app.name', 'Foottricks') }}</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#features">Features</a></li>
                <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</li></a>



                @if (Route::has('login'))
                @auth
                <li><a class="nav-link scrollto" href="{{ url('/dashboard') }}">Dashboard</a></li>
                <li class="nav-link scrollto">
                    <a class="nav-link text-dark" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>


                @if (Route::has('register'))
                <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>

                @endif
                @endauth

    @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="hero-text" data-aos="zoom-out">
        <h2>Welcome to Foottrciks</h2>
        <p>We are team of talented developpers making apps for sports teams</p>
        <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>

    <div class="product-screens">

        <div class="product-screen-1" data-aos="fade-up" data-aos-delay="400">
            <img src="assets/img/product-screen-1.png" alt="">
        </div>

        <div class="product-screen-2" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/product-screen-2.png" alt="">
        </div>

        <div class="product-screen-3" data-aos="fade-up">
            <img src="assets/img/product-screen-3.png" alt="">
        </div>

    </div>

</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="section-bg">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">About Us</h3>
                <span class="section-divider"></span>
                <p class="section-description">
                    Welcome to the website developed by Yassin Kallouch <br>
                    for soccer teams to manage their teams and players!
                </p>
            </div>

            <div class="row">
                <div class="col-lg-6 about-img" data-aos="fade-right" dat-aos-delay="100">
                    <img src="assets/img/about-img.jpg" alt="">
                </div>

                <div class="col-lg-6 content" data-aos="fade-left" dat-aos-delay="100">
                    <h2>What your soccer team's management needs</h2>
                    <h3>As a soccer enthusiast and a skilled web developer, I understand the importance of having an efficient system to manage teams and players. Whether you're a coach, a player, or a team manager, my website provides you with the necessary tools to streamline your soccer team's activities.</h3>
                    <p>
                        My website is designed with user-friendliness in mind. It's easy to navigate and offers a clean and modern interface. You don't need any technical skills to use it, and it can be accessed from any device with an internet connection
                    </p>

                    <ul>
                        <li><i class="bi bi-check-circle"></i> Team's calendar
                        <li><i class="bi bi-check-circle"></i> Training schedules

                        </li>
                        <li><i class="bi bi-check-circle"></i> Manage your team's calendar
                        </li>
                    </ul>

                    <p>
                        With my website, you can easily manage your team's calendar, attendance, events, and training schedules. You can create events and training sessions, set reminders, and monitor attendance. This ensures that your team stays organized and everyone is on the same page.
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Featuress Section ======= -->
    <section id="features">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 offset-lg-4">
                    <div class="section-header">
                        <h3 class="section-title">Product Featuress</h3>
                        <span class="section-divider"></span>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 features-img">
                    <img src="assets/img/product-features.png" alt="" data-aos="fade-right">
                </div>

                <div class="col-lg-8 col-md-7 ">

                    <div class="row">

                        <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-briefcase"></i></div>
                            <h4 class="title"><a href="">Chat</a></h4>
                            <p class="description">Thanks to the Foottricks Android application, you can stay in touch with your team wherever you are.
                                All team members are on Foottricks, everyone wins, coaches save precious time in management and organization. Players and parents have the right information at the right time
                                They can increase the team atmosphere off the field (comments, photos, videos, etc.)</p>
                        </div>
                        <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-card-checklist"></i></div>
                            <h4 class="title"><a href="">Player info</a></h4>
                            <p class="description">Footricks allows you to centralize and update all your member information, and access it from anywhere on your smartphone. Include all types of information (swimsuit number, allergies, etc.) Also the information related to the parents of the players. Update this information at any time.</p>
                        </div>
                        <div class="col-lg-6 col-md-6 box" data-aos="fade-up" dat-aos-delay="100">
                            <div class="icon"><i class="bi bi-binoculars"></i></div>
                            <h4 class="title"><a href="">Creat events</a></h4>
                            <p class="description">Matches, practices, tournaments or dinners: Footricks allows you to create and share the team calendar to simplify the organization of any event. Make your team's schedule in just a few clicks. In addition, sharing important information (opponent, meeting place...) is also possible. Canceling or postponing an event is as easy as you made it. No more invitations by email, SMS, WhatsApp or Facebook - and comments in 4 different places.</p>
                        </div>
                        <div class="col-lg-6 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-brightness-high"></i></div>
                            <h4 class="title"><a href="">Managment</a></h4>
                            <p class="description">For all matches, Foottricks allows you to choose starters and substitutes, and the best tactical plan. Place available players in the best tactical schedule. Use multiple compositions for the same match. Coaches decide who can see the composition (eg: only starters). Sharing on social networks is also possible with Footricks..</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section><!-- End Featuress Section -->

    <!-- ======= Advanced Featuress Section ======= -->
    <section id="advanced-features">

        <div class="features-row section-bg" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img class="advanced-feature-img-right wow fadeInRight" src="assets/img/advanced-feature-1.jpg"
                             alt="">
                        <div>
                            <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                            <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="features-row" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img class="advanced-feature-img-left" src="assets/img/advanced-feature-2.jpg" alt="">
                        <div>
                            <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                            <i class="bi bi-calendar4-week"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            <i class="bi bi-bar-chart"></i>
                            <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            <i class="bi bi-brightness-high"></i>
                            <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="features-row section-bg" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img class="advanced-feature-img-right wow fadeInRight" src="assets/img/advanced-feature-3.jpg"
                             alt="">
                        <div>
                            <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                            <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                            <i class="bi bi-binoculars"></i>
                            <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Advanced Featuress Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-start">
                    <h3 class="cta-title">Call To Action</h3>
                    <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Call To Action</a>
                </div>
            </div>

        </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= More Features Section ======= -->
    <section id="more-features" class="section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h3 class="section-title">More Features</h3>
                <span class="section-divider"></span>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque</p>
            </div>

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="box">
                        <div class="icon"><i class="bi bi-briefcase"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                            excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a href="">Dolor Sitema</a></h4>
                        <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat tarad limino ata nodera clas.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box">
                        <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box">
                        <div class="icon"><i class="bi bi-binoculars"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                            deserunt mollit anim id est laborum rideta zanox satirente madera</p>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End More Features Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-md-2">
                    <img src="assets/img/clients/client-1.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="assets/img/clients/client-2.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="assets/img/clients/client-3.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="assets/img/clients/client-4.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="assets/img/clients/client-5.png" alt="">
                </div>

                <div class="col-md-2">
                    <img src="assets/img/clients/client-6.png" alt="">
                </div>

            </div>
        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h3 class="section-title">Pricing</h3>
                <span class="section-divider"></span>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque</p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="box">
                        <h3>Free</h3>
                        <h4><sup>$</sup>0<span> month</span></h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Quam adipiscing vitae proin</li>
                            <li><i class="bi bi-check-circle"></i> Nec feugiat nisl pretium</li>
                            <li><i class="bi bi-check-circle"></i> Nulla at volutpat diam uteera</li>
                            <li><i class="bi bi-check-circle"></i> Pharetra massa massa ultricies</li>
                            <li><i class="bi bi-check-circle"></i> Massa ultricies mi quis hendrerit</li>
                        </ul>
                        <a href="#" class="get-started-btn">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="box featured">
                        <h3>Business</h3>
                        <h4><sup>$</sup>29<span> month</span></h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Quam adipiscing vitae proin</li>
                            <li><i class="bi bi-check-circle"></i> Nec feugiat nisl pretium</li>
                            <li><i class="bi bi-check-circle"></i> Nulla at volutpat diam uteera</li>
                            <li><i class="bi bi-check-circle"></i> Pharetra massa massa ultricies</li>
                            <li><i class="bi bi-check-circle"></i> Massa ultricies mi quis hendrerit</li>
                        </ul>
                        <a href="#" class="get-started-btn">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="box">
                        <h3>Developer</h3>
                        <h4><sup>$</sup>49<span> month</span></h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Quam adipiscing vitae proin</li>
                            <li><i class="bi bi-check-circle"></i> Nec feugiat nisl pretium</li>
                            <li><i class="bi bi-check-circle"></i> Nulla at volutpat diam uteera</li>
                            <li><i class="bi bi-check-circle"></i> Pharetra massa massa ultricies</li>
                            <li><i class="bi bi-check-circle"></i> Massa ultricies mi quis hendrerit</li>
                        </ul>
                        <a href="#" class="get-started-btn">Get Started</a>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq">
        <div class="container">

            <div class="section-header">
                <h3 class="section-title">Frequently Asked Questions</h3>
                <span class="section-divider"></span>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque</p>
            </div>

            <ul class="faq-list">

                <li>
                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non consectetur a erat nam at
                        lectus urna duis? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                            curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat scelerisque varius
                        morbi enim nunc faucibus a pellentesque? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                            laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                            Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                            tincidunt dui.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit amet consectetur
                        adipiscing elit pellentesque habitant morbi? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar
                            elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus
                            pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at
                            elementum eu facilisis sed odio morbi quis
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio tempor orci dapibus.
                        Aliquam eleifend mi in nulla? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit
                            laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium.
                            Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                            tincidunt dui.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus quam pellentesque nec
                        nam aliquam sem et tortor consequat? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est
                            ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing
                            bibendum est. Purus gravida quis blandit turpis cursus in
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor vitae purus faucibus
                        ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i
                            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer
                            malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem
                            dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat
                            commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non
                            blandit massa enim nec.
                        </p>
                    </div>
                </li>

            </ul>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Our Team</h3>
                <span class="section-divider"></span>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="assets/img/team/team-1.jpg" alt=""></div>
                        <h4>Walter White</h4>
                        <span>Chief Executive Officer</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="assets/img/team/team-2.jpg" alt=""></div>
                        <h4>Sarah Jhinson</h4>
                        <span>Product Manager</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="assets/img/team/team-3.jpg" alt=""></div>
                        <h4>William Anderson</h4>
                        <span>CTO</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="assets/img/team/team-4.jpg" alt=""></div>
                        <h4>Amanda Jepson</h4>
                        <span>Accountant</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-header">
                <h3 class="section-title">Gallery</h3>
                <span class="section-divider"></span>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                    accusantium doloremque</p>
            </div>

            <div class="row g-0">

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-1.jpg" data-gall="portfolioGallery"
                           class="gallery-lightbox">
                            <img src="assets/img/gallery/gallery-1.jpg" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-2.jpg" data-gall="portfolioGallery"
                           class="gallery-lightbox">
                            <img src="assets/img/gallery/gallery-2.jpg" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-3.jpg" data-gall="portfolioGallery"
                           class="gallery-lightbox">
                            <img src="assets/img/gallery/gallery-3.jpg" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-4.jpg" data-gall="portfolioGallery"
                           class="gallery-lightbox">
                            <img src="assets/img/gallery/gallery-4.jpg" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-5.jpg" data-gall="portfolioGallery"
                           class="gallery-lightbox">
                            <img src="assets/img/gallery/gallery-5.jpg" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item">
                        <a href="assets/img/gallery/gallery-6.jpg" data-gall="portfolioGallery"
                           class="gallery-lightbox">
                            <img src="assets/img/gallery/gallery-6.jpg" alt="">
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact">
        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-4 col-md-4">
                    <div class="contact-about">
                        <h3>Foottricks</h3>
                        <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus.
                            Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc
                            congue.</p>
                        <div class="social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <div class="info">
                        <div>
                            <i class="bi bi-geo-alt"></i>
                            <p>Nijverheidskaai<br>Brussels, Anderlecht 1070</p>
                        </div>

                        <div>
                            <i class="bi bi-envelope"></i>
                            <p>yassin.kallouch@student.ehb.be</p>
                        </div>

                        <div>
                            <i class="bi bi-phone"></i>
                            <p>+32 489xxxxxx</p>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5 col-md-8">
                    <div class="form">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Your Name" data-rule="minlen:4"
                                           data-msg="Please enter at least 4 chars">
                                </div>
                                <div class="form-group col-lg-6 mt-3 mt-lg-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Your Email" data-rule="email"
                                           data-msg="Please enter a valid email">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       placeholder="Subject" data-rule="minlen:4"
                                       data-msg="Please enter at least 8 chars of subject">
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                          required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center">
                                <button type="submit" title="Send Message">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-lg-start text-center">
                <div class="copyright">
                    &copy; Copyright <strong>Foottricks</strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
                  -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                    <a href="#intro" class="scrollto">Home</a>
                    <a href="#about" class="scrollto">About</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Use</a>
                </nav>
            </div>
        </div>
    </div>
</footer><!-- End  Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-chevron-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
