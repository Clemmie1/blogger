
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{$infoPost->title}}</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Silicon - Multipurpose Technology Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, creative agency, mobile app showcase, saas, fintech, finance, online courses, software, medical, conference landing, services, e-commerce, shopping cart, multipurpose, shop, ui kit, marketing, seo, landing, blog, portfolio, html5, css3, javascript, gallery, slider, touch, creative">
    <meta name="author" content="Createx Studio">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/favicon/safari-pinned-tab.svg')}}" color="#6366f1">
    <link rel="shortcut icon" href="{{asset('assets/favicon/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#080032">
    <meta name="msapplication-config" content="{{asset('assets/favicon/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- Vendor Styles -->
    <link rel="stylesheet" media="screen" href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/vendor/lightgallery/css/lightgallery-bundle.min.css')}}"/>
    <link rel="stylesheet" media="screen" href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}"/>

    <!-- Main Theme Styles + Bootstrap -->
    <link rel="stylesheet" media="screen" href="{{asset('assets/css/theme.min.css')}}">

    <!-- Page loading styles -->
    <style>
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }
        .dark-mode .page-loading {
            background-color: #0b0f19;
        }
        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }
        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }
        .page-loading.active > .page-loading-inner {
            opacity: 1;
        }
        .page-loading-inner > span {
            display: block;
            font-size: 1rem;
            font-weight: normal;
            color: #9397ad;
        }
        .dark-mode .page-loading-inner > span {
            color: #fff;
            opacity: .6;
        }
        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #b4b7c9;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }
        .dark-mode .page-spinner {
            border-color: rgba(255,255,255,.4);
            border-right-color: transparent;
        }
        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>

    <!-- Theme mode -->
    <script>
        let mode = window.localStorage.getItem('mode'),
            root = document.getElementsByTagName('html')[0];
        if (mode !== null && mode === 'dark') {
            root.classList.add('dark-mode');
        } else {
            root.classList.remove('dark-mode');
        }
    </script>

    <!-- Page loading scripts -->
    <script>
        (function () {
            window.onload = function () {
                const preloader = document.querySelector('.page-loading');
                preloader.classList.remove('active');
                setTimeout(function () {
                    preloader.remove();
                }, 1000);
            };
        })();
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WKV3GT5');
    </script>
    @livewireStyles
</head>


<!-- Body -->
<body>

<!-- Google Tag Manager (noscript)-->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
</noscript>

<!-- Page loading spinner -->
<div class="page-loading active">
    <div class="page-loading-inner">
        <div class="page-spinner"></div>
    </div>
</div>


<!-- Page wrapper for sticky footer -->
<!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
<main class="page-wrapper">


    <!-- Navbar -->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page -->
    <header class="header navbar navbar-expand-lg bg-light navbar-sticky">
        <div class="container px-3">
            <a href="index.html" class="navbar-brand pe-3">
                <img src="assets/img/logo.svg" width="47" alt="Silicon">
                Silicon
            </a>
            <div id="navbarNav" class="offcanvas offcanvas-end">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Landings</a>
                            <div class="dropdown-menu p-0">
                                <div class="d-lg-flex">
                                    <div class="mega-dropdown-column d-flex justify-content-center align-items-center rounded-3 rounded-end-0 px-0" style="margin: -1px; background-color: #f3f6ff;">
                                        <img src="assets/img/landings.jpg" alt="Landings">
                                    </div>
                                    <div class="mega-dropdown-column pt-lg-3 pb-lg-4">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="index.html" class="dropdown-item">Template Intro Page</a></li>
                                            <li><a href="landing-mobile-app-showcase-v1.html" class="dropdown-item">Mobile App Showcase v.1</a></li>
                                            <li><a href="landing-mobile-app-showcase-v2.html" class="dropdown-item">Mobile App Showcase v.2</a></li>
                                            <li><a href="landing-product.html" class="dropdown-item d-flex align-items-center">Product Landing</a></li>
                                            <li><a href="landing-startup.html" class="dropdown-item d-flex align-items-center">Startup</a></li>
                                            <li><a href="landing-saas-v1.html" class="dropdown-item">SaaS v.1</a></li>
                                            <li><a href="landing-saas-v2.html" class="dropdown-item">SaaS v.2</a></li>
                                            <li><a href="landing-saas-v3.html" class="dropdown-item">SaaS v.3</a></li>
                                            <li><a href="landing-saas-v4.html" class="dropdown-item">SaaS v.4<span class="badge bg-success ms-2">New</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-dropdown-column pt-lg-3 pb-lg-4" style="--si-mega-dropdown-column-width: 16rem;">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="landing-financial.html" class="dropdown-item">Financial Consulting</a></li>
                                            <li><a href="landing-online-courses.html" class="dropdown-item">Online Courses</a></li>
                                            <li><a href="landing-medical.html" class="dropdown-item">Medical</a></li>
                                            <li><a href="landing-software-dev-agency-v1.html" class="dropdown-item">Software Dev Agency v.1</a></li>
                                            <li><a href="landing-software-dev-agency-v2.html" class="dropdown-item">Software Dev Agency v.2<span class="badge bg-success ms-2">New</span></a></li>
                                            <li><a href="landing-software-dev-agency-v3.html" class="dropdown-item">Software Dev Agency v.3<span class="badge bg-success ms-2">New</span></a></li>
                                            <li><a href="landing-conference.html" class="dropdown-item">Conference</a></li>
                                            <li><a href="landing-digital-agency.html" class="dropdown-item">Digital Agency</a></li>
                                            <li><a href="landing-blog.html" class="dropdown-item">Blog Homepage</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <div class="d-lg-flex pt-lg-3">
                                    <div class="mega-dropdown-column">
                                        <h6 class="px-3 mb-2">About</h6>
                                        <ul class="list-unstyled mb-3">
                                            <li><a href="about-v1.html" class="dropdown-item py-1">About v.1</a></li>
                                            <li><a href="about-v2.html" class="dropdown-item py-1">About v.2</a></li>
                                            <li><a href="about-v3.html" class="dropdown-item py-1">About v.3</a></li>
                                        </ul>
                                        <h6 class="px-3 mb-2">Blog</h6>
                                        <ul class="list-unstyled mb-3">
                                            <li><a href="blog-list-with-sidebar.html" class="dropdown-item py-1">List View with Sidebar</a></li>
                                            <li><a href="blog-grid-with-sidebar.html" class="dropdown-item py-1">Grid View with Sidebar</a></li>
                                            <li><a href="blog-list-no-sidebar.html" class="dropdown-item py-1">List View no Sidebar</a></li>
                                            <li><a href="blog-grid-no-sidebar.html" class="dropdown-item py-1">Grid View no Sidebar</a></li>
                                            <li><a href="blog-simple-feed.html" class="dropdown-item py-1">Simple Feed</a></li>
                                            <li><a href="blog-single.html" class="dropdown-item py-1">Single Post</a></li>
                                            <li><a href="blog-podcast.html" class="dropdown-item py-1">Podcast</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-dropdown-column">
                                        <h6 class="px-3 mb-2">Portfolio</h6>
                                        <ul class="list-unstyled mb-3">
                                            <li><a href="portfolio-grid.html" class="dropdown-item py-1">Grid View</a></li>
                                            <li><a href="portfolio-list.html" class="dropdown-item py-1">List View</a></li>
                                            <li><a href="portfolio-slider.html" class="dropdown-item py-1">Slider View</a></li>
                                            <li><a href="portfolio-courses.html" class="dropdown-item py-1">Courses</a></li>
                                            <li><a href="portfolio-single-project.html" class="dropdown-item py-1">Single Project</a></li>
                                            <li><a href="portfolio-single-course.html" class="dropdown-item py-1">Single Course</a></li>
                                        </ul>
                                        <h6 class="px-3 mb-2">Services</h6>
                                        <ul class="list-unstyled mb-3">
                                            <li><a href="services-v1.html" class="dropdown-item py-1">Services v.1</a></li>
                                            <li><a href="services-v2.html" class="dropdown-item py-1">Services v.2</a></li>
                                            <li><a href="services-single-v1.html" class="dropdown-item py-1">Service Details v.1</a></li>
                                            <li><a href="services-single-v2.html" class="dropdown-item py-1">Service Details v.2</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-dropdown-column">
                                        <h6 class="px-3 mb-2">Pricing</h6>
                                        <ul class="list-unstyled mb-3">
                                            <li><a href="pricing.html" class="dropdown-item py-1">Pricing Page</a></li>
                                        </ul>
                                        <h6 class="px-3 mb-2">Contacts</h6>
                                        <ul class="list-unstyled mb-3">
                                            <li><a href="contacts-v1.html" class="dropdown-item py-1">Contacts v.1</a></li>
                                            <li><a href="contacts-v2.html" class="dropdown-item py-1">Contacts v.2</a></li>
                                            <li><a href="contacts-v3.html" class="dropdown-item py-1">Contacts v.3</a></li>
                                        </ul>
                                        <h6 class="px-3 mb-2">Specialty</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="404-v1.html" class="dropdown-item py-1">404 Error v.1</a></li>
                                            <li><a href="404-v2.html" class="dropdown-item py-1">404 Error v.2</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-current="page">Account</a>
                            <ul class="dropdown-menu">
                                <li><a href="account-details.html" class="dropdown-item">Account Details</a></li>
                                <li><a href="account-security.html" class="dropdown-item">Security</a></li>
                                <li><a href="account-notifications.html" class="dropdown-item">Notifications</a></li>
                                <li><a href="account-messages.html" class="dropdown-item">Messages</a></li>
                                <li><a href="account-saved-items.html" class="dropdown-item">Saved Items</a></li>
                                <li><a href="account-collections.html" class="dropdown-item">My Collections</a></li>
                                <li><a href="account-payment.html" class="dropdown-item">Payment Details</a></li>
                                <li><a href="account-signin.html" class="dropdown-item">Sign In</a></li>
                                <li><a href="account-signup.html" class="dropdown-item">Sign Up</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="components/typography.html" class="nav-link">UI Kit</a>
                        </li>
                        <li class="nav-item">
                            <a href="docs/getting-started.html" class="nav-link">Docs</a>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-header border-top">
                    <a href="https://themes.getbootstrap.com/product/silicon-business-technology-template-ui-kit/" class="btn btn-primary w-100" target="_blank" rel="noopener">
                        <i class="bx bx-cart fs-4 lh-1 me-1"></i>
                        &nbsp;Buy now
                    </a>
                </div>
            </div>
            <div class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4" data-bs-toggle="mode">
                <input type="checkbox" class="form-check-input" id="theme-mode">
                <label class="form-check-label d-none d-sm-block" for="theme-mode">Light</label>
                <label class="form-check-label d-none d-sm-block" for="theme-mode">Dark</label>
            </div>
            <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="https://themes.getbootstrap.com/product/silicon-business-technology-template-ui-kit/" class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex" target="_blank" rel="noopener">
                <i class="bx bx-cart fs-5 lh-1 me-1"></i>
                &nbsp;Buy now
            </a>
        </div>
    </header>


    <!-- Breadcrumb -->
    <nav class="container pt-4 mt-lg-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="bx bx-home-alt fs-lg me-1"></i>Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="blog-list-with-sidebar.html">Blog</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Single Post</li>
        </ol>
    </nav>


    <!-- Post title + Meta  -->
    <section class="container mt-4 pt-lg-2 pb-3">
        <h1 class="pb-3" style="max-width: 970px;">{{$infoPost->title}}</h1>
        <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3">
            <div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4">
                <div class="fs-xs border-end pe-3 me-3 mb-2">
                    <span class="badge bg-faded-primary text-primary fs-base">{{$infoPost->category}}</span>
                </div>
                <div class="fs-sm border-end pe-3 me-3 mb-2">Опубликовано {{\App\Http\Controllers\ConvertTime::convert($infoPost->created_at, true)}}</div>
                <div class="d-flex mb-2">
                    <div class="d-flex align-items-center me-3">
                        <i class="bx bx-low-vision fs-base me-1"></i>
                        <span class="fs-sm">{{$infoPost->total_views}}</span>
                    </div>
                    <div class="d-flex align-items-center me-3">
                        <i class="bx bx-like fs-base me-1"></i>
                        <span class="fs-sm">{{$tL}}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bx bx-comment fs-base me-1"></i>
                        <span class="fs-sm">{{$infoPost->total_comments}}</span>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center position-relative ps-md-3 pe-lg-5 mb-2">
                <img src="{{asset('storage/avatar_channle/'.$infoChannle->avatar)}}" class="rounded-circle" width="60" alt="Avatar">
                <div class="ps-3">
                    <h6 class="mb-1">Автор</h6>
                    <a href="#" class="fw-semibold stretched-link text-decoration-none">{{$infoChannle->name}} @if($infoChannle->verified)<i class='bx bxs-badge-check text-primary'></i>@endif</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Post image (parallax) -->
    <div class="jarallax mb-lg-5 mb-4" data-jarallax data-speed="0.35" style="height: 36.45vw; min-height: 300px;">
        <div class="jarallax-img" style="background-image: url({{asset('storage/avatar_channle/pRrDMZJtHdVIfOBTJ9y373HUy9X3HeyMq6Lo0JqBJs09PAAEUGq6qZaEcHtW.jpg')}});"></div>
    </div>


    <!-- Post content + Sharing -->
    <section class="container mb-5 pt-4 pb-2 py-mg-4">
        <div class="row gy-4">
            <!-- Content -->
            <div class="col-lg-9">

                {!! $infoPost->content !!}

            </div>

            <!-- Sharing -->
            <div class="col-lg-3 position-relative">
                <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
                    <span class="d-block mb-3">{!! $readingTime !!} минут чтения</span>
                    <h6>Поделиться этой записью:</h6>
                    <div class="mb-4 pb-lg-3">
                        <a href="#" class="btn btn-icon btn-secondary btn-linkedin me-2 mb-2">
                            <i class="bx bxl-linkedin"></i>
                        </a>
                        <a href="#" class="btn btn-icon btn-secondary btn-facebook me-2 mb-2">
                            <i class="bx bxl-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-icon btn-secondary btn-twitter me-2 mb-2">
                            <i class="bx bxl-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-icon btn-secondary btn-instagram me-2 mb-2">
                            <i class="bx bxl-instagram"></i>
                        </a>
                    </div>
                    @livewire('post.send-like-post', [
                        'likes' => $tL,
                        'postId' => $infoPost->id,
                    ])
                </div>
            </div>
        </div>
    </section>

    @livewire('post.send-comment-post', [
       'postId' => $infoPost->id,
    ])

</main>


<!-- Footer -->
<footer class="footer dark-mode bg-dark border-top border-light pt-5 pb-4 pb-lg-5">
    <div class="container pt-lg-4">
        <div class="row pb-5">
            <div class="col-lg-4 col-md-6">
                <div class="navbar-brand text-dark p-0 me-0 mb-3 mb-lg-4">
                    <img src="assets/img/logo.svg" width="47" alt="Silicon">
                    Silicon
                </div>
                <p class="fs-sm text-light opacity-70 pb-lg-3 mb-4">Proin ipsum pharetra, senectus eget scelerisque varius pretium platea velit. Lacus, eget eu vitae nullam proin turpis etiam mi sit. Non feugiat feugiat egestas nulla nec. Arcu tempus, eget elementum dolor ullamcorper sodales ultrices eros.</p>
                <form class="needs-validation" novalidate>
                    <label for="subscr-email" class="form-label">Subscribe to our newsletter</label>
                    <div class="input-group">
                        <input type="email" id="subscr-email" class="form-control rounded-start ps-5" placeholder="Your email" required>
                        <i class="bx bx-envelope fs-lg text-muted position-absolute top-50 start-0 translate-middle-y ms-3 zindex-5"></i>
                        <div class="invalid-tooltip position-absolute top-100 start-0">Please provide a valid email address.</div>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </div>
                </form>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-5 offset-xl-2 offset-md-1 pt-4 pt-md-1 pt-lg-0">
                <div id="footer-links" class="row">
                    <div class="col-lg-4">
                        <h6 class="mb-2">
                            <a href="#useful-links" class="d-block text-dark dropdown-toggle d-lg-none py-2" data-bs-toggle="collapse">Useful Links</a>
                        </h6>
                        <div id="useful-links" class="collapse d-lg-block" data-bs-parent="#footer-links">
                            <ul class="nav flex-column pb-lg-1 mb-lg-3">
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Home</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Services</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Our Works</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">About</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Blog</a></li>
                            </ul>
                            <ul class="nav flex-column mb-2 mb-lg-0">
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Terms &amp; Conditions</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3">
                        <h6 class="mb-2">
                            <a href="#social-links" class="d-block text-dark dropdown-toggle d-lg-none py-2" data-bs-toggle="collapse">Socials</a>
                        </h6>
                        <div id="social-links" class="collapse d-lg-block" data-bs-parent="#footer-links">
                            <ul class="nav flex-column mb-2 mb-lg-0">
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Facebook</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">LinkedIn</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Twitter</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-inline-block px-0 pt-1 pb-2">Instagram</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 pt-2 pt-lg-0">
                        <h6 class="mb-2">Contact Us</h6>
                        <a href="mailto:email@example.com" class="fw-medium">email@example.com</a>
                    </div>
                </div>
            </div>
        </div>
        <p class="nav d-block fs-xs text-center text-md-start pb-2 pb-lg-0 mb-0">
            <span class="text-light opacity-50">&copy; All rights reserved. Made by </span>
            <a class="nav-link d-inline-block p-0" href="https://createx.studio/" target="_blank" rel="noopener">Createx Studio</a>
        </p>
    </div>
</footer>


<!-- Back to top button -->
<a href="#top" class="btn-scroll-top" data-scroll>
    <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
</a>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
@livewireScripts
<!-- Vendor Scripts -->
<script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>
<script src="{{asset('assets/vendor/jarallax/dist/jarallax.min.js')}}"></script>
<script src="{{asset('assets/vendor/lightgallery/lightgallery.min.js')}}"></script>
<script src="{{asset('assets/vendor/lightgallery/plugins/zoom/lg-zoom.min.js')}}"></script>
<script src="{{asset('assets/vendor/lightgallery/plugins/fullscreen/lg-fullscreen.min.js')}}"></script>
<script src="{{asset('assets/vendor/lightgallery/plugins/video/lg-video.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('fdc7a7647abd71a16960', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
    });
</script>
<!-- Main Theme Script -->
<script src="{{asset('assets/js/theme.min.js')}}"></script>
</body>
</html>
