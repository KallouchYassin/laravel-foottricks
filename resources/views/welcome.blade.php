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
                <li><a class="nav-link scrollto" href="#contact">Contact</li>
                </a>


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
                    <h3>As a soccer enthusiast and a skilled web developer, I understand the importance of having an
                        efficient system to manage teams and players. Whether you're a coach, a player, or a team
                        manager, my website provides you with the necessary tools to streamline your soccer team's
                        activities.</h3>
                    <p>
                        My website is designed with user-friendliness in mind. It's easy to navigate and offers a clean
                        and modern interface. You don't need any technical skills to use it, and it can be accessed from
                        any device with an internet connection
                    </p>

                    <ul>
                        <li><i class="bi bi-check-circle"></i> Team's calendar
                        <li><i class="bi bi-check-circle"></i> Training schedules

                        </li>
                        <li><i class="bi bi-check-circle"></i> Manage your team's calendar
                        </li>
                    </ul>

                    <p>
                        With my website, you can easily manage your team's calendar, attendance, events, and training
                        schedules. You can create events and training sessions, set reminders, and monitor attendance.
                        This ensures that your team stays organized and everyone is on the same page.
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
                            <p class="description">Thanks to the Foottricks Android application, you can stay in touch
                                with your team wherever you are.
                                All team members are on Foottricks, everyone wins, coaches save precious time in
                                management and organization. Players and parents have the right information at the right
                                time
                                They can increase the team atmosphere off the field (comments, photos, videos, etc.)</p>
                        </div>
                        <div class="col-lg-6 col-md-6 box" data-aos="fade-up">
                            <div class="icon"><i class="bi bi-card-checklist"></i></div>
                            <h4 class="title"><a href="">Player info</a></h4>
                            <p class="description">Footricks allows you to centralize and update all your member
                                information, and access it from anywhere on your smartphone. Include all types of
                                information (swimsuit number, allergies, etc.) Also the information related to the
                                parents of the players. Update this information at any time.</p>
                        </div>
                        <div class="col-lg-6 col-md-6 box" data-aos="fade-up" dat-aos-delay="100">
                            <div class="icon"><i class="bi bi-binoculars"></i></div>
                            <h4 class="title"><a href="">Creat events</a></h4>
                            <p class="description">Matches, practices, tournaments or dinners: Footricks allows you to
                                create and share the team calendar to simplify the organization of any event. Make your
                                team's schedule in just a few clicks. In addition, sharing important information
                                (opponent, meeting place...) is also possible. Canceling or postponing an event is as
                                easy as you made it. No more invitations by email, SMS, WhatsApp or Facebook - and
                                comments in 4 different places.</p>
                        </div>
                        <div class="col-lg-6 col-md-6 box" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon"><i class="bi bi-brightness-high"></i></div>
                            <h4 class="title"><a href="">Managment</a></h4>
                            <p class="description">For all matches, Foottricks allows you to choose starters and
                                substitutes, and the best tactical plan. Place available players in the best tactical
                                schedule. Use multiple compositions for the same match. Coaches decide who can see the
                                composition (eg: only starters). Sharing on social networks is also possible with
                                Footricks..</p>
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
                            <h2>Football is a popular sport around the world, with millions of players and fans alike.
                            </h2>
                            <h3> Football teams require a lot of coordination, planning, and management to operate
                                successfully.</h3>
                            <p> However, managing a football team can be challenging, especially when
                                dealing with large groups of players, coaches, and team managers. Fortunately,
                                technology has provided solutions to streamline and improve football team
                                management.</p>
                            <p>This app represents a comprehensive football team management application that aims to
                                revolutionize the way football teams operate. Overview of the Application: The football
                                team management application is a web-based and mobile-based platform that provides
                                coaches, players, and team managers with an all-in-one solution for managing their
                                teams. The web application is designed for coaches and team managers, while the Android
                                app is designed for players and coaches. </p>
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
                            <h2>The application caters to the needs of various users involved in football team
                                management. </h2>
                            <i class="bi bi-calendar4-week"></i>
                            <p> As a coach, I want to be able to manage my team's schedule, including matches, training
                                sessions, and events, so that I can plan and prepare efficiently.
                            </p>
                            <i class="bi bi-bar-chart"></i>
                            <p> As a team manager, I want to be able to monitor the attendance of players during
                                training sessions, matches, and events, so that I can ensure the team's participation
                                and engagement.
                            </p>
                            <i class="bi bi-brightness-high"></i>
                            <p> As a player, I want to be able to track my progress and performance through the
                                application's statistics and graphs, so that I can improve my skills and contribute more
                                effectively to the team.
                            </p>
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
                            <h2>Statistics with Graphs:

                            </h2>
                            <h3> The statistics feature of the application provides coaches and players with a way to
                                track their team's performance over time. T
                            </h3>
                            <p>his feature includes the ability to view
                                statistics such as goals scored, assists, and yellow/red cards, and view them in graph
                                format. </p>
                            <i class="bi bi-binoculars"></i>
                            <p>This feature can be useful for identifying areas of strength and weakness, and
                                for setting goals for improvement.</p>
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
                    <h3 class="cta-title">Download the android app now on the google play store!</h3>
                    <p class="cta-text"> Try the app</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="https://play.google.com/store/games">Download now</a>
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
                <p class="section-description">Here are some features that the app can provide you depending on your
                    plan</p>
            </div>

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="box">
                        <div class="icon"><i class="bi bi-briefcase"></i></div>
                        <h4 class="title"><a href="">Training Management</a></h4>
                        <p class="description">
                            The training management feature of the application provides coaches and team managers with a
                            way to plan and organize training sessions. This feature includes the ability to create
                            training plans, add exercises, and track progress over time. This feature can be useful for
                            ensuring that training sessions are well-structured and productive, and for ensuring that
                            players are developing their skills effectively.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h4 class="title"><a href="">Attendance Tracking</a></h4>
                        <p class="description">
                            The attendance tracking feature of the application provides coaches and team managers with a
                            way to monitor the participation of players in training sessions, matches, and team events.
                            This feature includes the ability to mark players as present, absent, or late, and to view
                            attendance records over time. This feature can be useful for identifying patterns of
                            behavior among players and for addressing attendance issues.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box">
                        <div class="icon"><i class="bi bi-bar-chart"></i></div>
                        <h4 class="title"><a href="">>Statistics with Graphs</a></h4>
                        <p class="description">
                            The statistics feature of the application provides coaches and players with a way to track
                            their team's performance over time. This feature includes the ability to view statistics
                            such as goals scored, assists, and yellow/red cards, and view them in graph format. This
                            feature can be useful for identifying areas of strength and weakness, and for setting goals
                            for improvement.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="box">
                        <div class="icon"><i class="bi bi-binoculars"></i></div>
                        <h4 class="title"><a href="">Chat</a></h4>
                        <p class="description">
                            The chat feature of the application allows coaches, players, and team managers to
                            communicate with each other instantly. This feature is particularly useful for discussing
                            last-minute changes to training schedules or match arrangements. The chat feature can be
                            accessed through both the web application and the Android app, allowing users to communicate
                            on the go. Calendar: The calendar feature of the application provides coaches, players, and
                            team managers with a centralized location for managing their team's schedule. This feature
                            includes the ability to add events such as matches, training sessions, and team meetings,
                            and view them in a calendar format. The calendar can be customized to suit the needs of each
                            team, and notifications can be set up to remind users of upcoming events.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End More Features Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="section-header">
                    <h3 class="section-title">Possible Clients</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">here are future or possible clients we aim </p>
                </div>

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
                <p class="section-description">three different service solutions for your football team management </p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="box">
                        <h3>Free plan</h3>
                        <h4><sup>$</sup>0<span> month</span></h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Event creating</li>
                            <li><i class="bi bi-x-circle"></i> No chat</li>
                            <li><i class="bi bi-x-circle"></i> 10 members</li>
                            <li><i class="bi bi-x-circle"></i> No attendance</li>
                            <li><i class="bi bi-x-circle"></i> No web app</li>
                            <li><i class="bi bi-x-circle"></i>One team</li>

                        </ul>
                        <a href="#" class="get-started-btn">Get Started</a>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="box featured">
                        <h3>Coach plan</h3>
                        <h4><sup>$</sup>85<span> month</span></h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Chat</li>
                            <li><i class="bi bi-check-circle"></i> Attendance tracking</li>
                            <li><i class="bi bi-check-circle"></i> web app</li>
                            <li><i class="bi bi-x-circle"></i> only 20 members</li>
                            <li><i class="bi bi-x-circle"></i> No complete team statisctics</li>
                            <li><i class="bi bi-x-circle"></i> One team</li>


                        </ul>
                        <a href="#" class="get-started-btn">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="box">
                        <h3>Premium plan</h3>
                        <h4><sup>$</sup>250<span> month</span></h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Chat</li>
                            <li><i class="bi bi-check-circle"></i> Attendance tracking</li>
                            <li><i class="bi bi-check-circle"></i> complete team statisctics</li>
                            <li><i class="bi bi-check-circle"></i> web app</li>
                            <li><i class="bi bi-check-circle"></i> Possiblity to create more teams</li>
                            <li><i class="bi bi-check-circle"></i> complete team statisctics</li>

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
                <p class="section-description">Here are some frequently asked questions that users may have about the
                    football team management application</p>
            </div>

            <ul class="faq-list">

                <li>
                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">What devices is the football
                        team management application compatible with? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            The web application is compatible with most web browsers, while the Android app is
                            compatible with Android devices. </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">How do I create an account
                        for the football team management application? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            You can create an account by visiting our website or downloading the Android app and
                            following the prompts to sign up.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Can multiple users access the
                        same team account?
                        <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Yes, multiple users can access the same team account with different levels of access
                            (coaches, players, team managers).
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Can I customize the team's
                        calendar?<i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            Yes, you can customize the team's calendar by adding or removing events and setting
                            reminders.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">How do I communicate with my
                        team members through the app? <i class="bi bi-chevron-down icon-show"></i><i
                            class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            You can communicate with team members through the chat feature, which is available on both
                            the web application and the Android app.
                        </p>
                    </div>
                </li>

                <li>
                    <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">How do I track attendance for
                        my team members? <i
                            class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                    <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                        <p>
                            You can track attendance by marking team members as present, absent, or late in the
                            attendance tracking feature.
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
                <h3 class="section-title">The Team</h3>
                <span class="section-divider"></span>

            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="member">
                        <div class="pic"><img src="https://firebasestorage.googleapis.com/v0/b/foottricks-5a2f5.appspot.com/o/profile.png?alt=media&token=51f4ddbd-c439-4f10-b754-551d6b6b10ab" alt=""></div>
                        <h4>Kallouch Yassin</h4>
                        <span>Developer</span>
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
